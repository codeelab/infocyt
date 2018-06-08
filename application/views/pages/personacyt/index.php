 <?php
      $user             = $this->session->userdata('id_usuario');
      $nombre           = $this->session->userdata('nombre');
      $a_paterno        = $this->session->userdata('a_paterno');
      $a_materno        = $this->session->userdata('a_materno');
      $email            = $this->session->userdata('correo_personal');
      $rol              = $this->session->userdata('rol_id');
      $sexo             = $this->session->userdata('sexo_id');
      $rim              = $this->session->userdata('num_rim');
      $nombre_completo  = $nombre .' '.$a_paterno .' '.$a_materno;


$rim_u = 1;
    $fecha1="2018";
    $fecha="12-08-2017";
    $diff = strtotime($fecha) - strtotime(date('d-m-Y'));
    $dias = $diff/(60*60*24);
    $ano = $fecha - date('Y');

    $a = intval($ano);
    $d = intval($dias); 

    if ($a >= 0) 
    {
        if ($a == 1 AND $rim_u == 1) {
            $verificacion = " En: <b>". $a ." Año</b>"; 
            $u_rim = '<i class="fas fa-check"></i><b class="text-green">Aprobado: </b> <a href="#" target="_blank">RIM_'.$rim.'</a>';
        } else {
            $verificacion = " En: <b>". $a ." Años</b>"; 
            $u_rim = '<i class="fas fa-check"></i><b class="text-green">Aprobado: </b> <a href="#" target="_blank">RIM_'.$rim.'</a>';
        }

        
    }
    if ($a <= 0) {
        if ($d == 1 AND $rim_u == 1) {
            $verificacion = " En: <b>". $d ." Día</b>";
            $u_rim = '<i class="fas fa-check"></i><span class="text-green"> Aprobado: </span> <a href="#" target="_blank">RIM_'.$rim.'</a>';
        } else {
            $verificacion = " En: <b>". $d ." Dias</b>";
            $u_rim = '<i class="fas fa-check"></i><span class="text-green"> Aprobado: </span> <a href="#" target="_blank">RIM_'.$rim.'</a>';
        }
    }

    if ($d == 0) {
        $verificacion = "<b class='text-orange'>Hoy último día</b>";
        $u_rim = '<i class="fas fa-times"></i><span class="text-green"> Aprobado: </span> <a href="#" target="_blank">RIM_'.$rim.'</a>';
    } else if($d <= 0 AND $rim_u == 1) {
        $verificacion = "<i class='fas fa-times'></i> <span class='text-red'> Vencido</span>";
        $u_rim = '<i class="fas fa-times"></i><span class="text-red"> Vencido: </span> <a href="#" target="_blank">RIM_'.$rim.'</a>';
    }

      

      if ( $a >= 0 AND $a <= 0 AND $d == 0) {
          
      }else if ($rim_u == 2) {
          $u_rim = '<i class="fas fa-times"></i> <b class="text-orange"> Pendiente: </b> RIM_'.$rim;
      }

    if(!$user)
    {
      redirect('login','refresh');
      exit();
    }
?>
<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">

<div class="c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold">
    <div class="container">
        <div class="c-page-title c-pull-left">
            <h3 class="c-font-uppercase c-font-bold c-font-dark c-font-20 c-font-slim">PERSONACYT</h3>
        </div>
        <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
            <li><a href="<?=base_url();?>" class="c-font-dark">Inicio</a></li>
        </ul>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-6 col-xs-12 col-sm-12">
            <?php if($d == 0 OR $d <= 0){ ?>
                    <!-- BEGIN: CONTENT/MISC/COOKIES-5 -->
                    <div class="c-cookies-bar c-cookies-bar-2 c-cookies-bar-top-left c-bg-red c-rounded wow animate fadeInLeft" data-wow-delay=".5s">
                        <div class="c-cookies-bar-container">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="c-cookies-bar-content c-font-white c-font-lowercase">
                                        Estimado usuario, el registro de investigador se encuentra próximo a vencer o actualmente esta vencido, le sugerimos realice la renovación del mismo.
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="c-cookies-bar-btn">
                                        <a class="c-cookies-bar-close btn c-btn-white c-btn-border-1x c-btn-square c-cookie-bar-link" href="javascript:;">Cerrar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- END: CONTENT/MISC/COOKIES-5 -->

            <?php } ?>

            </div>
        </div>
    </div>




<!-- BEGIN: PAGE CONTENT -->

<div class="c-content-box c-size-md c-bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="c-content-media-1 c-bordered wow  fadeInLeft animated" style="min-height: 380px; visibility: visible; animation-name: fadeInLeft; opacity: 1;">
                    <div class="owl-item active" style="width: 210px;margin-right: 0px;">
                        <div class="c-content-person-1 c-option-2">
                             <div class="c-caption c-content-overlay" style="width: 120px; display:block; margin:auto; ">
                                <?php if ($sexo == 'H'): ?>
                                    <img src="<?=base_url();?>assets/images/hombre.png" class="img-responsive c-overlay-object" alt="<?=$nombre_completo?>"> 
                                    <?php else: ?>
                                        <img src="<?=base_url();?>assets/images/mujer.png" class="img-responsive c-overlay-object" alt="<?=$nombre_completo?>">
                                <?php endif ?>
                            </div>
                            <div class="c-body">
                                <div class="c-head">
                                    <div class="c-name c-font-uppercase c-font-bold c-center"><?=$nombre_completo?></div>
                                </div>
                                    <p class="c-center"> <?=$u_rim?> </p>
                                    <p class="c-center"> <span style="font-size: 13px;">Próxima Renovación: </span> <br> 
                                        <?=$verificacion;?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-md-9">      
                <div class="c-content-media-2-slider wow  fadeInRight animated" data-slider="owl" style="visibility: visible; animation-name: fadeInRight; opacity: 1;">
                      
                        
                        
                       

<div class="c-content-panel">
            <div class="c-body">
                <div class="c-content-tab-1">
                    <div class="row">                   
                        <div class="col-md-9 col-sm-12 col-xs-12">
                            <div class="tab-content c-padding-sm">
                                <div class="tab-pane active" id="tab_18_1">



        <div class="row" >
                    <div class="col-lg-6 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>personacyt/opciones">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-cogs fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-17 c-font-bold c-font-uppercase c-center">
                                    Opciones
                                </div>
                                <br>
                                <a href="<?=base_url();?>personacyt/opciones" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>personacyt/generales">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-address-card fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-17 c-font-bold c-font-uppercase c-center">
                                    Datos Generales
                                </div>
                                <br>
                                <a href="<?=base_url();?>personacyt/generales" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>


                </div>






                                </div>
                                <div class="tab-pane fade" id="tab_18_2">


                                             
        <div class="row" >
                    <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>personacyt/congresos">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-tags fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-16 c-font-bold c-font-uppercase c-center">
                                    Congresos
                                </div>
                                <br>
                                <a href="<?=base_url();?>personacyt/congresos" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>personacyt/reconocimientos">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-list-alt fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-15 c-font-bold c-font-uppercase c-center">
                                    Reconocimientos
                                </div>
                                <br>
                                <a href="<?=base_url();?>personacyt/reconocimientos" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>personacyt/idiomas">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-language fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-16 c-font-bold c-font-uppercase c-center">
                                   Idiomas
                                </div>
                                <br>
                                <a href="<?=base_url();?>personacyt/idiomas" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>


                </div>
                                                    
        <div class="row" >
                    <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>personacyt/academica">
                                <div class="circle-tile-heading blue"">
                                   <i class="far fa-id-badge fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-15 c-font-bold c-font-uppercase c-center">
                                    Preparación Académica
                                </div>
                                <br>
                                <a href="<?=base_url();?>personacyt/academica" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>personacyt/investigacion">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-list-alt fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-15 c-font-bold c-font-uppercase c-center">
                                    Estancias de Investigación
                                </div>
                                <br>
                                <a href="<?=base_url();?>personacyt/investigacion" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>


                </div>



                                </div>
                                <div class="tab-pane fade" id="tab_18_3">




        <div class="row" >
                    <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-briefcase fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-16 c-font-bold c-font-uppercase c-center">
                                    Adscripción Actual
                                </div>
                                <br>
                                <a href="#" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-rocket fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-15 c-font-bold c-font-uppercase c-center">
                                    Desarrollos Tecnológicos
                                </div>
                                <br>
                                <a href="#" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-copy fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-16 c-font-bold c-font-uppercase c-center">
                                   Difusión y Divulgación
                                </div>
                                <br>
                                <a href="#" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>


                </div>
                                                    
        <div class="row" >
                    <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-graduation-cap fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-15 c-font-bold c-font-uppercase c-center">
                                    Experiencia Profesional
                                </div>
                                <br>
                                <a href="#" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-university fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-15 c-font-bold c-font-uppercase c-center">
                                    Docencia
                                </div>
                                <br>
                                <a href="#" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-file-alt fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-15 c-font-bold c-font-uppercase c-center">
                                    Tesís
                                </div>
                                <br>
                                <a href="#" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>


                </div>








                                </div>
                                <div class="tab-pane fade" id="tab_18_4">




        <div class="row" >
                    <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-book fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-17 c-font-bold c-font-uppercase c-center">
                                    Captitulo de Libro
                                </div>
                                <br>
                                <a href="#" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-bookmark fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-17 c-font-bold c-font-uppercase c-center">
                                   Publicación de Articulos
                                </div>
                                <br>
                                <a href="#" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-book fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-17 c-font-bold c-font-uppercase c-center">
                                   Publicación de Libro
                                </div>
                                <br>
                                <a href="#" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>


                </div>
                                                    
        <div class="row" >
                    <div class="col-lg-6 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-clipboard fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-17 c-font-bold c-font-uppercase c-center">
                                    Reporte Técnico
                                </div>
                                <br>
                                <a href="#" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-file fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-18 c-font-bold c-font-uppercase c-center">
                                    Reseña
                                </div>
                                <br>
                                <a href="#" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>


                </div>







                                </div>
                                <div class="tab-pane fade" id="tab_18_5">




        <div class="row" >
                    <div class="col-lg-6 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-money-bill-alt fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-20 c-font-bold c-font-uppercase c-center">
                                    Financiamiento
                                </div>
                                <br>
                                <a href="#" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-users fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-20 c-font-bold c-font-uppercase c-center">
                                   Grupos
                                </div>
                                <br>
                                <a href="#" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>


                </div>
                                                    
        <div class="row" >

                    <div class="col-lg-6 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-certificate fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-20 c-font-bold c-font-uppercase c-center">
                                   Patentes
                                </div>
                                <br>
                                <a href="#" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-list fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-20 c-font-bold c-font-uppercase c-center">
                                   Proyectos
                                </div>
                                <br>
                                <a href="#" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>


                </div>





                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <ul class="nav nav-tabs tabs-right c-font-sbold">
                                <li class="active">
                                    <a href="#tab_18_1" data-toggle="tab" aria-expanded="true">Generales</a>
                                </li>
                                <li >
                                    <a href="#tab_18_2" data-toggle="tab">Preparación Académica</a>
                                </li>
                                <li >
                                    <a href="#tab_18_3" data-toggle="tab">Actividad Profesional </a>
                                </li>
                                <li>
                                    <a href="#tab_18_4" data-toggle="tab">Publicaciones </a>
                                </li>
                                <li>
                                    <a href="#tab_18_5" data-toggle="tab">Investigación </a>
                                </li>
                            </ul>
                        </div>  
                    </div>
                </div>
            </div>
        </div>








                </div>      
            </div>
        </div>
    </div>
</div>

  
<!-- END: PAGE CONTENT -->





</div><!-- END: PAGE CONTAINER -->
