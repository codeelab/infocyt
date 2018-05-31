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
            <?php if($this->session->flashdata('success')){ ?>

                    <!-- BEGIN: CONTENT/MISC/COOKIES-5 -->
                    <div class="c-cookies-bar c-cookies-bar-2 c-cookies-bar-top-left c-theme-bg c-rounded wow animate fadeInLeft" data-wow-delay=".5s">
                        <div class="c-cookies-bar-container">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="c-cookies-bar-content c-font-white c-font-lowercase">
                                        <?php echo $this->session->flashdata('success'); ?>
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
                                    <p class="c-center c-font-15"> <span>Pendiente: </span>   RIM_<?=$rim?> </p>
                                    <p class="c-center c-font-15"> <span>Renovación: </span> <br> 
                                        <?php $fecha1="27-10-2011 09:49:10";
                                            $fecha="03-06-2018";
                                            $diff = strtotime($fecha) - strtotime(date('d-m-Y'));
                                            $dias = $diff/(60*60*24);
                                            $fecha1="2018";
                                            $ano = $fecha1 - date('Y');
                                            echo "".intval($ano)." Años ";
                                            echo "(".intval($dias)." dias) "; 
                                        ?>
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




                                        <div class="c-content-feature-2-grid" data-auto-height="true" data-mode="base-height">

                                            <div class="col-md-6 col-sm-6">
                                                <div class="c-content-feature-2 c-bg-grey-1 wow fadeInDown  c-center" data-height="height" style="height: 10px;">
                                                        <h3 class="c-font-uppercase c-title c-font-20 c-font-uppercase c-font-black c-font-bold c-center"> <i class="fas fa-cogs fa-3x"></i><br>Opciones</h3>
                                                        <a href="#" class="btn  c-btn-green c-font-uppercase c-font-bold c-btn-border-1x"><i class="far fa-share-square"></i> Ir</a>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="c-content-feature-2 c-bg-grey-1 wow fadeInDown  c-center" data-height="height" style="height: 20px;">
                                                        <h3 class="c-font-uppercase c-title c-font-20 c-font-uppercase c-font-black c-font-bold c-center"> <i class="fas fa-address-card fa-3x"></i><br>Datos Generales</h3>
                                                        <a href="#" class="btn  c-btn-green c-font-uppercase c-font-bold c-btn-border-1x"><i class="far fa-share-square"></i> Ir</a>
                                                </div>
                                            </div>

                                        </div>







                                </div>
                                <div class="tab-pane fade" id="tab_18_2">
                                    <p>
                                     Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. 
                                     Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson
                                      artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, 
                                      commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. 
                                      Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. 
                                      Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. 
                                      Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean .
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="tab_18_3">
                                    <p>
                                         Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="tab_18_4">
                                    <p>
                                     Trust fund seitan letterpress, keytar raw denim keffiyehluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <ul class="nav nav-tabs tabs-right c-font-sbold">
                                <li class="active">
                                    <a href="#tab_18_1" data-toggle="tab" aria-expanded="true">Generales</a>
                                </li>
                                <li>
                                    <a href="#tab_18_2" data-toggle="tab">Preparación Académica</a>
                                </li>
                                <li>
                                    <a href="#tab_18_3" data-toggle="tab">
                                    Actividad Profesional </a>
                                </li>
                                <li>
                                    <a href="#tab_18_4" data-toggle="tab">
                                    Publicaciones </a>
                                </li>
                                <li>
                                    <a href="#tab_18_4" data-toggle="tab">
                                    Investigación </a>
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
