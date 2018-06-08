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

foreach ($usuario as $us) 
{
    $nombree        = $us->nombre;
    $paterno        = $us->a_paterno;
    $materno        = $us->a_materno;
    $fechas         = $us->fecha_nac;
    $paiss          = $us->nombre;
    $edad           = $us->edad;
    $estado_c       = $us->nombre_civil;
    $nacionalida    = $us->nombre_nac;
    $estadoos       = $us->nombre_est;
    $municipios     = $us->nombre_mun;
    $localidad      = $us->localidad;
    $c_personal     = $us->correo_personal;
    $c_laboral      = $us->correo_laboral;
    $telpart        = $us->tel_part;
    $telcel         = $us->tel_cel;
    $tellabo        = $us->tel_lab;
    $dom            = $us->direccion;
    $nume           = $us->numero_dom;
    $colo           = $us->colonia;
    $cp             = $us->cp;
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
            <li><a href="<?=base_url('personacyt');?>">Inicio</a></li> | <li><a href="<?=base_url('personacyt/generales');?>" class="c-font-dark">Datos Generales</a></li>
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
                                <div class="col-md-8">
                                    <div class="c-cookies-bar-content c-font-white c-font-lowercase">
                                        <?php echo $this->session->flashdata('success'); ?>
                                        <a href="<?=base_url('login');?>" class="c-cookies-bar-close btn c-theme-btn c-btn-square">¿Iniciar Sesión?</a> 
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="c-cookies-bar-btn">
                                        <a class="c-cookies-bar-close btn c-btn-white c-btn-border-1x c-btn-square c-cookie-bar-link" href="javascript:;">¿Deseas un nuevo registro?</a>
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
                      
                        
                        
                    <div class="c-contact">
                        <div class="c-content-title-1">
                            <h3 class="c-font-uppercase c-font-bold">Actualización de Información</h3>
                            <div class="c-line-left"></div>
                        </div>
                            <?php $atrib = array('name' => 'form1', 'id' => 'registro', 'autocomplete'=> 'off');
                            echo form_open('registro/investigador', $atrib); ?>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-text" for="nombre">Nombre</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="nombre" name="nombre" placeholder="<?=$nombree;?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="a_paterno">Apellido Paterno</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="a_paterno" name="a_paterno" placeholder="<?=$paterno;?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="a_paterno">Apellido Materno</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="a_materno" name="a_materno" placeholder="<?=$materno;?>">
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-3">
                                            <label class="form-text" for="fecha_nac">Fecha de Nacimiento</label>
                                            <input type="text"  step="1" class="form-control c-theme c-square input-lg" id="fecha_nac" name="fecha_nac" placeholder="<?=$fechas;?>">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-text" for="pais">País de Nacimiento</label>
                                              <?php
                                                $options = array ('' => $paiss);
                                                foreach($pais as $pa)
                                                    $options[$pa->id_paises] = $pa->nombre;
                                                echo form_dropdown('pais_id', $options, ' ', 'class="form-control c-theme c-square input-lg" id="pais_id"');
                                                ?>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-text" for="edad">Edad</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="edad" name="edad" placeholder="<?=$edad;?>">
                                            <?php echo form_error('edad', '<div class="alert alert-danger">', '</div>'); ?>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-text" for="escolaridad">Estado Civil</label>
                                            <select name="estado_civil" id="estado_civil" class="form-control c-theme c-square input-lg">
                                            <option value=""><?=$estado_c;?></option>
                                            <?php
                                            foreach ($civil as $i => $civil)
                                               echo '<option value="',$i,'">',$civil,'</option>';
                                            ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-text" for="nacionalidad">Nacionalidad</label>
                                            <select name="nacionalidad" id="nacionalidad" class="form-control c-theme c-square input-lg">
                                            <option value=""><?=$nacionalida;?></option>
                                            <?php
                                            foreach ($nac as $i => $nacionalidad)
                                               echo '<option value="',$i,'">',$nacionalidad,'</option>';
                                            ?>
                                            </select>
                                            <?php echo form_error('nacionalidad', '<div class="alert alert-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-text" for="estado">Estado</label>
                                              <?php
                                                $options = array ('' => $estadoos);
                                                foreach($estados as $estado)
                                                    $options[$estado->id_estado] = $estado->nombre_est;
                                                echo form_dropdown('estado_id', $options, ' ', 'class="form-control c-theme c-square input-lg" id="estado_id"');
                                                ?>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-text" for="municipio">Municipio</label>
                                             <?php
                                                $options = array(''=> $municipios);
                                                echo form_dropdown('municipio_id', $options, ' ', 'class="form-control c-theme c-square input-lg" id="municipio_id"');
                                            ?>
                                            <?php echo form_error('municipio_id', '<div class="alert alert-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-text" for="a_paterno">Localidad</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="localidad" name="localidad" placeholder="<?=$localidad;?>">
                                            <?php echo form_error('localidad', '<div class="alert alert-danger">', '</div>'); ?>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-text" for="email">Correo Personal</label>
                                            <input type="email" class="form-control c-theme c-square input-lg" id="correo_personal" name="correo_personal" placeholder="<?=$c_personal;?>" autofocus="autofocus">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-text" for="email">Confirmar Correo</label>
                                            <input type="email" class="form-control c-theme c-square input-lg" id="correo_personal2" name="correo_personal2" placeholder="Correo Personal">
                                        </div>
                                      <div class="col-md-3">
                                            <label class="form-text" for="email">Correo Laboral</label>
                                            <input type="email" class="form-control c-theme c-square input-lg" id="correo_laboral" name="correo_laboral" placeholder="<?=$c_laboral;?>" autofocus="autofocus">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-text" for="email">Confirmar Correo</label>
                                            <input type="email" class="form-control c-theme c-square input-lg" id="correo_laboral2" name="correo_laboral2" placeholder="Correo Laboral">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-text" for="email">Teléfono Particular</label>
                                            <input type="tel" class="form-control c-theme c-square input-lg" id="tel_part" name="tel_part" placeholder="<?=$telpart;?>" autofocus="autofocus">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="email">Celular</label>
                                            <input type="tel" class="form-control c-theme c-square input-lg" id="tel_cel" name="tel_cel" placeholder="<?=$telcel;?>">
                                        </div>
                                      <div class="col-md-4">
                                            <label class="form-text" for="email">Teléfono Laboral</label>
                                            <input type="tel" class="form-control c-theme c-square input-lg" id="tel_lab" name="tel_lab" placeholder="<?=$tellabo;?>" autofocus="autofocus">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-text" for="institucion">Domicilio Particular</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="direccion" name="direccion" placeholder="<?=$dom;?>">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-text" for="facultad">Número</label>
                                            <input type="num" class="form-control c-theme c-square input-lg" id="numero_dom" name="numero_dom" placeholder="<?=$nume;?>">
                                             
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="mailing">Colónia</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="colonia" name="colonia" placeholder="<?=$colo;?>">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-text" for="mailing">Código Pos.</label>
                                            <input type="num" class="form-control c-theme c-square input-lg" id="cp" name="cp" placeholder="<?=$cp;?>">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-text" for="usuario">Usuario</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="username" name="username" placeholder="Usuario">
                                            <span id="Loading"><img src="<?=base_url();?>assets/img/loader.gif" /></span> 
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="password">Contraseña</label>
                                            <input type="password" class="form-control c-theme c-square input-lg" id="password" name="password" placeholder="Contraseña" data-bv-integer-message="Solo está permitido el uso de caracteres alfanuméricos">
                                        <div class="progress password-progress form-progres">
                                            <div id="strengthBar" class="progress-bar" role="progressbar" style="width: 0;"></div>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="password">Confirmar Contraseña</label>
                                            <input type="password" class="form-control c-theme c-square input-lg" name="password2" id="password2" placeholder="Confirmar Contraseña">

                                        </div>
                                    </div>


                            <?php echo form_hidden("rol_id", "3"); ?>
                            <?php echo form_hidden("status_id", "1"); ?>
                            <button type="submit" class="btn c-theme-btn c-btn-uppercase btn-lg c-btn-square btn-block">ACTUALIZAR</button>
                            <?php form_close()?>
             










                </div>      
            </div>
        </div>
    </div>
</div>

  
<!-- END: PAGE CONTENT -->





</div><!-- END: PAGE CONTAINER -->
