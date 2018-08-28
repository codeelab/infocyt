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

    if(!$user)
    {
      redirect('login','refresh');
      exit();
    }

    if($rimm !== FALSE) 
    {
      foreach ($rimm as $r) 
      {
        $rim = $r->num_rim;
        $aprobacion = $r->fecha_aprobacion;
        $vigencia = $r->fecha_vigencia;
        $estado_rim = $r->status_rim;
      }
    }

///////////////////////////////////////////////////////////////////////////
//
// OPCIONES PARA FECHAS
//
///////////////////////////////////////////////////////////////////////////

      $fecha = $vigencia;
      $diff = strtotime($fecha) - strtotime(date('d-m-Y'));
      $dias = $diff/(60*60*24);
      $fech = date("Y", strtotime($fecha));
      $ano = $fech - date('Y');
      $a = intval($ano);
      $d = intval($dias);
      setlocale(LC_ALL,"es_ES");
      $vigencia = strftime("%d %B %Y", strtotime(str_replace('-','/', $vigencia)));

///////////////////////////////////////////////////////////////////////////
//
// OPCIONES DE AVISO REIM A USUARIO
//
///////////////////////////////////////////////////////////////////////////


//--------------------------------------------------------------------------
// MUESTRA LOS AVISOS DE VIGENCIA SEGUN EL ESTADO REIM
//--------------------------------------------------------------------------


// MUESTRA LOS AVISOS SI LA OPCIÓN ES PENDIENTE = 1

    if ($estado_rim == 1)
    {
    
      if ($aprobacion === '0000-00-00' && $fecha === '0000-00-00') 
      {
        $u_rim = '<i class="far fa-clock"></i><span class="text-orange"> Pendiente: REIM_'.$rim.'</span>';
        $verificacion = '<i class="far fa-clock"></i> [Pendiente]';
        $dura = '<i class="far fa-clock"></i> [Pendiente]';
        $info = 'Estimado usuario, el registro de investigador se encuentra Pendiente de aprobación, le sugerimos esté pendiente del mismo.';
        $color = 'yellow-1';

      }
      else if ($aprobacion != '0000-00-00' && $fecha === '0000-00-00') 
      {
        $u_rim = '<i class="far fa-clock"></i><span class="text-orange"> Pendiente: REIM_'.$rim.'</span>';
        $verificacion = '<i class="far fa-calendar-alt"></i> [Por Confirmar]';
        $dura = '<i class="far fa-calendar-alt"></i> [Por Confirmar]';
        $info = 'Estimado usuario, el registro de investigador se encuentra Pendiente de aprobación, le sugerimos esté pendiente del mismo.';
        $color = 'yellow-1';
      }
      else if ($aprobacion == '0000-00-00' && $fecha != '0000-00-00') 
      {
        $u_rim = '<i class="far fa-clock"></i><span class="text-orange"> Pendiente: REIM_'.$rim.'</span>';
        $verificacion = '<i class="far fa-calendar-alt"></i> [Por Confirmar]';
        $dura = '<i class="far fa-calendar-alt"></i> [Por Confirmar]';
        $info = 'Estimado usuario, el registro de investigador se encuentra Pendiente de aprobación, le sugerimos esté pendiente del mismo.';
        $color = 'yellow-1';
      }
      else
      {
        $u_rim = '<i class="far fa-clock"></i><span class="text-orange"> Pendiente: REIM_'.$rim.'</span>';
        $verificacion = '<i class="far fa-calendar-alt"></i> [Por Confirmar]';
        $dura = '<i class="far fa-calendar-alt"></i> [Por Confirmar]';
        $info = 'Estimado usuario, el registro de investigador se encuentra Pendiente de aprobación, le sugerimos esté pendiente del mismo.';
        $color = 'yellow-1';      
      }

// MUESTRA LOS AVISOS SI LA OPCIÓN ES APROBADO = 2
  
    }
    elseif ($estado_rim == 2) 
    {
      
        if ($aprobacion == '0000-00-00' && $fecha == '0000-00-00') 
        {
          $u_rim = '<i class="far fa-clock"></i><span class="text-orange"> No confirmado:</span> REIM_'.$rim;
          $verificacion = '<i class="far fa-calendar-alt"></i> [No Confirmado]';
          $dura = '<i class="far fa-calendar-alt"></i> [No Confirmado]';
          $info = 'Estimado usuario, el registro de investigador aún no está confirmado, le sugerimos esté pendiente del mismo.';
          $color = 'yellow-3';       
        }
        else if ($aprobacion != '0000-00-00' && $fecha == '0000-00-00') 
        {
          $u_rim = '<i class="fas fa-check"></i><span class="text-green">Aprobado: <a href="#" target="_blank">REIM_'.$rim.'</a>';
          $dura = '<i class="far fa-calendar-alt"></i>  ' . date("Y", strtotime($aprobacion)) . ' - <i class="far fa-question-circle"></i>'; 
          $verificacion = '<i class="far fa-calendar-alt"></i> [No Confirmado]';
          $info = 'Estimado usuario, el registro de investigador está aprobado, peró no cuenta con vigencía, le sugerimos esté pendiente del mismo.';
          $color = 'green-1';            
        }
        else if ($aprobacion == '0000-00-00' && $fecha != '0000-00-00') 
        {
          $u_rim = '<i class="far fa-clock"></i><span class="text-orange"> No confirmado:</span> REIM_'.$rim;
          $dura = '<i class="far fa-calendar-alt"></i>  <i class="far fa-question-circle"></i> - ' . date("Y", strtotime($fecha));
          $verificacion = '<i class="far fa-clock"></i> [No Confirmado]';
          $info = 'Estimado usuario, el registro de investigador actualmente cuenta con vigencia pero aún no está confirmado, le sugerimos esté pendiente del mismo.';
          $color = 'yellow-2';   
        }else
        {

            if ($a > 0) 
            {
                if ($a != 1) 
                {
                    $u_rim = '<i class="far fa-id-badge"></i>   <span class="text-green">Aprobado: </span> <a href="#" target="_blank">REIM_'.$rim.'</a>';
                    $dura = '<i class="far fa-calendar-alt"></i>   <b>' . date("Y", strtotime($aprobacion)) . '</b> a <b>' . date("Y", strtotime($fecha)) . '</b>';
                    $verificacion = " En: <b>". $a ." Años</b>";
                   
                }
                else
                {
                    $u_rim = '<i class="far fa-id-badge"></i>   <span class="text-green">Aprobado: </span> <a href="#" target="_blank">REIM_'.$rim.'</a>';
                    $dura = '<i class="far fa-calendar-alt"></i>   <b>' . date("Y", strtotime($aprobacion)) . '</b> a <b>' . date("Y", strtotime($fecha)) . '</b>';
                    $verificacion = 'En: <b>'. $a . ' Año</b>';
                }
          }

            if ($a <= 0) 
            {
                if ($d > 1) 
                {
                    $u_rim = '<i class="far fa-id-badge"></i>   <span class="text-green"> Aprobado: </span> <a href="#" target="_blank">REIM_'.$rim.'</a>';
                    $dura = '<i class="far fa-calendar-alt"></i>   <b>' . date("Y", strtotime($aprobacion)) . '</b> a <b>' . date("Y", strtotime($fecha)) . '</b>';
                    $verificacion = " En: <b>". $d ." Dias</b>"; 
                }
                else 
                {
                    $u_rim = '<i class="far fa-id-badge"></i>   <span class="text-green"> Aprobado: </span> <a href="#" target="_blank">REIM_'.$rim.'</a>';
                    $dura = '<i class="far fa-calendar-alt"></i>   <b>' . date("Y", strtotime($aprobacion)) . '</b> a <b>' . date("Y", strtotime($fecha)) . '</b>';
                    $verificacion = " En: <b>". $d ." Día</b>";
                }


                if ($d == 0) 
                {
                    $u_rim = '<i class="far fa-id-badge"></i>   <span class="text-green"> Aprobado: </span> <a href="#" target="_blank">REIM_'.$rim.'</a>';
                    $dura = '<i class="far fa-calendar-alt"></i>   <b>' . date("Y", strtotime($aprobacion)) . '</b> a <b>' . date("Y", strtotime($fecha)) . '</b>'; 
                    $verificacion = "<span class='text-orange'>Hoy último día</span>";
                }
                else if ($d < 0) 
                {
                    $u_rim = '<i class="far fa-id-badge"></i>   <span class="text-red"> Vencida: </span> REIM_'.$rim;
                    $dura = '<i class="far fa-calendar-alt"></i>   <b>' . date("Y", strtotime($aprobacion)) . '</b> a <b>' . date("Y", strtotime($fecha)) . '</b>';
                    $verificacion = '<i class="far fa-calendar"></i> Vencio el: <br><span class="text-red">'.$vigencia.'</span>';
                    $info = 'Estimado usuario, el registro de investigador actualmente perdio su vigencia, le sugerimos realize la renovación.';
                    $color = 'red-1';
                     
                }

            }//FIN DEL if ($a <= 0)        

        }//FIN DEL ELSE EN EL IF 2
    }// FIN DEL elseif ($estado_rim == 2) 
    elseif ($estado_rim == 3) 
    {

      // MUESTRA LOS AVISOS SI LA OPCIÓN ES VENCIDO = 3
      if ($aprobacion === '0000-00-00' && $fecha === '0000-00-00') 
      {
        $u_rim = '<i class="far fa-clock"></i><span class="text-danger"> Vencido: REIM_'.$rim.'</span>';
        $verificacion = '<i class="far fa-clock"></i> [Vencida]';
        $dura = '<i class="far fa-clock"></i> [Vencida]';
        $info = 'Estimado usuario, el registro de investigador actualmente no cuenta con vigencia, le sugerimos realize una renovación del mismo.';
        $color = 'red-1';
      }
      else if ($aprobacion != '0000-00-00' && $fecha === '0000-00-00') 
      {
        $u_rim = '<i class="far fa-clock"></i><span class="text-danger"> Vencido: REIM_'.$rim.'</span>';
        $verificacion = '<i class="far fa-calendar-alt"></i> [Por Confirmar]';
        $dura = '<i class="far fa-calendar-alt"></i> [Por Confirmar]';
        $info = 'Estimado usuario, el registro de investigador actualmente no cuenta con vigencia, le sugerimos realize una renovación del mismo.';
        $color = 'red-1';
      }
      else if ($aprobacion == '0000-00-00' && $fecha != '0000-00-00') 
      {
        $u_rim = '<i class="far fa-clock"></i><span class="text-danger"> Vencido: REIM_'.$rim.'</span>';
        $verificacion = '<i class="far fa-calendar-alt"></i> [Por Confirmar]';
        $dura = '<i class="far fa-calendar-alt"></i> [Por Confirmar]';
        $info = 'Estimado usuario, el registro de investigador actualmente no cuenta con vigencia, le sugerimos realize una renovación del mismo.';
        $color = 'red-1';
      }
      else
      {
        $u_rim = '<i class="far fa-clock"></i><span class="text-danger"> Vencido: REIM_'.$rim.'</span>';
        $verificacion = '<i class="far fa-calendar-alt"></i> [Por Confirmar]';
        $dura = '<i class="far fa-calendar-alt"></i> [Por Confirmar]';
        $info = 'Estimado usuario, el registro de investigador actualmente no cuenta con vigencia, le sugerimos realize una renovación del mismo.';
        $color = 'red-1';      
      } 

    }// FIN DEL elseif ($estado_rim == 3) 
    elseif ($estado_rim == 4)
    {
      // MUESTRA LOS AVISOS SI LA OPCIÓN ES CANCELADO = 4
      if ($aprobacion === '0000-00-00' && $fecha === '0000-00-00') 
      {
        $u_rim = '<i class="fas fa-ban"></i><span class="text-default"> Cancelado: REIM_'.$rim.'</span>';
        $verificacion = '<i class="fas fa-ban"></i> [Cancelado]';
        $dura = '<i class="fas fa-ban"></i> [Cancelado]';
        $info = 'Estimado usuario, el registro de investigador está cancelado, le sugerimos realize una renovación del mismo ó solicite asesoría.';
        $color = 'grey-3';
      }
      else if ($aprobacion != '0000-00-00' && $fecha === '0000-00-00') 
      {
        $u_rim = '<i class="fas fa-ban"></i><span class="text-default"> Cancelado: REIM_'.$rim.'</span>';
        $verificacion = '<i class="fas fa-ban"></i> [Cancelado]';
        $dura = '<i class="fas fa-ban"></i> [Cancelado]';
        $info = 'Estimado usuario, el registro de investigador está cancelado, le sugerimos realize una renovación del mismo ó solicite asesoría.';
        $color = 'grey-3';
      }
      else if ($aprobacion == '0000-00-00' && $fecha != '0000-00-00') 
      {
        $u_rim = '<i class="fas fa-ban"></i><span class="text-default"> Cancelado: REIM_'.$rim.'</span>';
        $verificacion = '<i class="fas fa-ban"></i> [Cancelado]';
        $dura = '<i class="fas fa-ban"></i> [Cancelado]';
        $info = 'Estimado usuario, el registro de investigador está cancelado, le sugerimos realize una renovación del mismo ó solicite asesoría.';
        $color = 'grey-3';
      }
      else
      {
        $u_rim = '<i class="fas fa-ban"></i>   <span class="text-default"> Cancelado: </span> REIM_'.$rim;
        $verificacion = '<i class="fas fa-ban"></i> [Cancelado]';
        $dura = '<i class="fas fa-ban"></i> [Cancelado]';
        $info = 'Estimado usuario, el registro de investigador está cancelado, le sugerimos realize una renovación del mismo ó solicite asesoría.';
        $color = 'grey-3';
      }     

    }// FIN DEL elseif ($estado_rim == 4)
    else
    {
        $u_rim = '<i class="fas fa-times"></i>   <span class="text-default"> ERROR </span>';
        $verificacion = '<i class="fas fa-times"></i> ERROR';
        $dura = '<i class="fas fa-times"></i> ERROR';
    }// FIN DEL ELSE
?>
<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">

<div class="c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold">
    <div class="container">
        <div class="c-page-title c-pull-left">
            <h3 class="c-font-uppercase c-font-bold c-font-dark c-font-20 c-font-slim">PERSONACYT</h3>
        </div>
        <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
            <li><a href="<?=base_url('personacyt');?>">Inicio</a></li>
        </ul>
    </div>
</div>




<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-6 col-xs-12 col-sm-12">
            <?php if($this->session->flashdata('success')){ ?>

                    <!-- BEGIN: CONTENT/MISC/COOKIES-5 -->
                    <div class="c-cookies-bar c-cookies-bar-2 c-cookies-bar-top-left c-theme-bg c-rounded wow animate fadeInLeft" data-wow-delay=".5s">
                        <div class="c-cookies-bar-container">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="c-cookies-bar-content c-font-white c-font-lowercase">
                                        <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="c-cookies-bar-btn">
                                        <a class="c-cookies-bar-close btn c-btn-white c-btn-border-1x c-btn-square c-cookie-bar-link" href="javascript:;">Cerrar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- END: CONTENT/MISC/COOKIES-5 -->

            <?php }else if($this->session->flashdata('error')){  ?>
                    <!-- BEGIN: CONTENT/MISC/COOKIES-5 -->
                    <div class="c-cookies-bar c-cookies-bar-2 c-cookies-bar-top-left c-bg-red c-rounded wow animate fadeInLeft" data-wow-delay=".5s">
                        <div class="c-cookies-bar-container">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="c-cookies-bar-content c-font-white c-font-lowercase">
                                            <?php echo $this->session->flashdata('error'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="c-cookies-bar-btn">
                                            <a class="c-cookies-bar-close btn c-btn-white c-btn-square" href="javascript:;">
                                            Reintentar</a>
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

                    <div class="col-lg-6 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>personacyt/opciones">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-file-pdf fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-17 c-font-bold c-font-uppercase c-center">
                                    Formato de Postulación
                                </div>
                                <br>
                                <a href="<?=base_url();?>personacyt/postulacion/<?=$user;?>" target="_blank" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Generar</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>personacyt/opciones">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-file-pdf fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-17 c-font-bold c-font-uppercase c-center">
                                    Formato de Solicitud
                                </div>
                                <br>
                                <a href="<?=base_url();?>personacyt/solicitud/<?=$user;?>" target="_blank" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Generar</a>
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
                            <a href="<?=base_url();?>personacyt/adscripcion">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-briefcase fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-16 c-font-bold c-font-uppercase c-center">
                                    Adscripción Actual
                                </div>
                                <br>
                                <a href="<?=base_url();?>personacyt/adscripcion" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>personacyt/desarrollos">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-rocket fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-15 c-font-bold c-font-uppercase c-center">
                                    Desarrollos Tecnológicos
                                </div>
                                <br>
                                <a href="<?=base_url();?>personacyt/desarrollos" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>personacyt/difusion">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-copy fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-16 c-font-bold c-font-uppercase c-center">
                                   Difusión y Divulgación
                                </div>
                                <br>
                                <a href="<?=base_url();?>personacyt/difusion" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>


                </div>
                                                    
        <div class="row" >
                    <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>personacyt/experiencia">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-graduation-cap fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-15 c-font-bold c-font-uppercase c-center">
                                    Experiencia Profesional
                                </div>
                                <br>
                                <a href="<?=base_url();?>personacyt/experiencia" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>personacyt/docencia">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-university fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-15 c-font-bold c-font-uppercase c-center">
                                    Docencia
                                </div>
                                <br>
                                <a href="<?=base_url();?>personacyt/docencia" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>personacyt/tesis">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-file-alt fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-15 c-font-bold c-font-uppercase c-center">
                                    Tesís
                                </div>
                                <br>
                                <a href="<?=base_url();?>personacyt/tesis" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>


                </div>








                                </div>
                                <div class="tab-pane fade" id="tab_18_4">




        <div class="row" >
                    <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>personacyt/capitulo">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-book fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-17 c-font-bold c-font-uppercase c-center">
                                    Captitulo de Libro
                                </div>
                                <br>
                                <a href="<?=base_url();?>personacyt/capitulo" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>personacyt/articulos">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-bookmark fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-17 c-font-bold c-font-uppercase c-center">
                                   Publicación de Articulos
                                </div>
                                <br>
                                <a href="<?=base_url();?>personacyt/articulos" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>personacyt/libro">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-book fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-17 c-font-bold c-font-uppercase c-center">
                                   Publicación de Libro
                                </div>
                                <br>
                                <a href="<?=base_url();?>personacyt/libro" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>


                </div>
                                                    
        <div class="row" >
                    <div class="col-lg-6 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>personacyt/reporte">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-clipboard fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-17 c-font-bold c-font-uppercase c-center">
                                    Reporte Técnico
                                </div>
                                <br>
                                <a href="<?=base_url();?>personacyt/reporte" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>personacyt/resena">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-file fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-18 c-font-bold c-font-uppercase c-center">
                                    Reseña
                                </div>
                                <br>
                                <a href="<?=base_url();?>personacyt/resena" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>


                </div>







                                </div>
                                <div class="tab-pane fade" id="tab_18_5">




        <div class="row" >
                    <div class="col-lg-6 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>personacyt/financiamiento">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-money-bill-alt fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-20 c-font-bold c-font-uppercase c-center">
                                    Financiamiento
                                </div>
                                <br>
                                <a href="<?=base_url();?>personacyt/financiamiento" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>personacyt/grupos">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-users fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-20 c-font-bold c-font-uppercase c-center">
                                   Grupos
                                </div>
                                <br>
                                <a href="<?=base_url();?>personacyt/grupos" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>


                </div>
                                                    
        <div class="row" >

                    <div class="col-lg-6 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>personacyt/patentes">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-certificate fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-20 c-font-bold c-font-uppercase c-center">
                                   Patentes
                                </div>
                                <br>
                                <a href="<?=base_url();?>personacyt/patentes" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?=base_url();?>personacyt/proyectos">
                                <div class="circle-tile-heading blue"">
                                   <i class="fas fa-list fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content blue"">
                                <div class="circle-tile-description text-faded c-font-uppercase c-title c-font-20 c-font-bold c-font-uppercase c-center">
                                   Proyectos
                                </div>
                                <br>
                                <a href="<?=base_url();?>personacyt/proyectos" class="c-btn-white c-btn-border-1x circle-tile-footer"><i class="far fa-share-square "></i>Acceder</a>
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
