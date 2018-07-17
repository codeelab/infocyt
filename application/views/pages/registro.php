<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">

<div class="c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold">
    <div class="container">
        <div class="c-page-title c-pull-left">
            <h3 class="c-font-uppercase c-font-bold c-font-dark c-font-20 c-font-slim">Registro</h3>
        </div>
        <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
            <li><a href="<?=base_url();?>" class="c-font-dark">Inicio</a></li>
            <li class="c-font-dark">/</li>
            <li><a href="<?=base_url('registro');?>" class="c-font-dark">Registro</a></li>                    
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
        <div class="c-content-feedback-1 c-option-1">
            <div class="row">
                <div class="col-md-12">
                    <div class="c-contact">
                        <div class="c-content-title-1">
                            <h3 class="c-font-uppercase c-font-bold">Solicitud de cuenta con Actividad Científica y Tecnológica</h3>
                            <div class="c-line-left"></div>
                        </div>
                            <?php $atrib = array('name' => 'form1', 'id' => 'registro', 'autocomplete'=> 'off');
                            echo form_open('registro/investigador', $atrib); ?>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-text" for="nombre">Nombre</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="nombres" name="nombres" placeholder="Nombre">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="a_paterno">Apellido Paterno</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="a_paternos" name="a_paternos" placeholder="Apellido Paterno">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="a_paterno">Apellido Materno</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="a_maternos" name="a_maternos" placeholder="Apellido Materno">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-text" for="rfc">RFC</label>
                                            <input type="text" class="form-control" id="rfc" name="rfc" placeholder="RFC" oninput="validarInputRFC(this)" >
                                             <div id="resultadoRFC"></div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-text" for="curp">CURP</label>
                                            <input type="text" class="form-control" id="curp" name="curp" placeholder="CURP" oninput="validarInput(this)">
                                             <div id="resultadoCURP"></div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-text" for="fecha_nac">Fecha de Nacimiento</label>
                                            <input type="date"  step="1" class="form-control c-theme c-square input-lg" id="fechas_nac" name="fechas_nac">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-text" for="pais">País de Nacimiento</label>
                                              <?php
                                                $options = array ('' => 'Elija País de procedencia');
                                                foreach($pais as $pa)
                                                    $options[$pa->id_paises] = $pa->nombre_pa;
                                                echo form_dropdown('paises_id', $options, ' ', 'class="form-control c-theme c-square input-lg" id="paises_id"');
                                                ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-text" for="nacionalidad">Nacionalidad</label>
                                            <select name="nacionalidade" id="nacionalidade" class="form-control c-theme c-square input-lg">
                                            <option value="">Elige tu nacionalidad</option>
                                            <?php
                                            foreach ($nac as $i => $nacionalidad)
                                               echo '<option value="',$i,'">',$nacionalidad,'</option>';
                                            ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-text" for="estado">Estado</label>
                                              <?php
                                                $options = array ('' => 'Elija estado de procedencia');
                                                foreach($estados as $estado)
                                                    $options[$estado->id_estado] = $estado->nombre_est;
                                                echo form_dropdown('campo_id', $options, ' ', 'class="form-control c-theme c-square input-lg" id="campo_id"');
                                                ?>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-text" for="municipio">Municipio</label>
                                             <?php
                                                $options = array(''=>'Elija un estado');
                                                echo form_dropdown('municipio_id', $options, ' ', 'class="form-control c-theme c-square input-lg" id="municipio_id"');
                                            ?>
                                            <?php echo form_error('municipio_id', '<div class="alert alert-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-text" for="a_paterno">Localidad</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="localidade" name="localidade" placeholder="Localidade">
                                            <?php echo form_error('localidad', '<div class="alert alert-danger">', '</div>'); ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-text" for="edad">Edad</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="edade" name="edade" placeholder="Edad">
                                      </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="genero">Genero</label>
                                            <select name="sexo_id" id="sexo_id" class="form-control c-theme c-square input-lg">
                                            <option value="">Elige tu genero</option>
                                            <?php
                                            foreach ($gen as $i => $genero)
                                               echo '<option value="',$i,'">',$genero,'</option>';
                                            ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="escolaridad">Estado Civil</label>
                                            <select name="estados_civil" id="estados_civil" class="form-control c-theme c-square input-lg">
                                            <option value="">No definido</option>
                                            <?php
                                            foreach ($civil as $i => $civil)
                                               echo '<option value="',$i,'">',$civil,'</option>';
                                            ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-text" for="email">Correo Personal</label>
                                            <input type="email" class="form-control c-theme c-square input-lg" id="correos_personal" name="correos_personal" placeholder="Correo Electrónico Personal" autofocus="autofocus">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-text" for="email">Confirmar Correo Personal</label>
                                            <input type="email" class="form-control c-theme c-square input-lg" id="correo_personal2" name="correo_personal2" placeholder="Correo Electrónico Personal">
                                        </div>
                                      <div class="col-md-3">
                                            <label class="form-text" for="email">Correo Laboral</label>
                                            <input type="email" class="form-control c-theme c-square input-lg" id="correos_laboral" name="correos_laboral" placeholder="Correo Electrónico Laboral" autofocus="autofocus">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-text" for="email">Confirmar Correo Laboral</label>
                                            <input type="email" class="form-control c-theme c-square input-lg" id="correo_laboral2" name="correo_laboral2" placeholder="Correo Electrónico Laboral">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-text" for="email">Teléfono Particular</label>
                                            <input type="tel" class="form-control c-theme c-square input-lg" id="tel_parti" name="tel_parti" placeholder="Teléfono Particular" autofocus="autofocus">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="email">Celular</label>
                                            <input type="tel" class="form-control c-theme c-square input-lg" id="tel_celu" name="tel_celu" placeholder="Teléfono Celular">
                                        </div>
                                      <div class="col-md-4">
                                            <label class="form-text" for="email">Teléfono Laboral</label>
                                            <input type="tel" class="form-control c-theme c-square input-lg" id="tel_labo" name="tel_labo" placeholder="Teléfono Laboral" autofocus="autofocus">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-text" for="institucion">Domicilio Particular</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="direcciones" name="direcciones" placeholder="Domicilio particular">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-text" for="facultad">Número</label>
                                            <input type="num" class="form-control c-theme c-square input-lg" id="numero_domi" name="numero_domi" placeholder="Número">
                                             
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="mailing">Colónia</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="colonias" name="colonias" placeholder="Colónia">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-text" for="mailing">Código Postal</label>
                                            <input type="num" class="form-control c-theme c-square input-lg" id="cps" name="cps" placeholder="Código Postal">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-text" for="escolaridad">Estatus en el SNI</label>
                                            <select name="estado_sni" id="estado_sni" class="form-control c-theme c-square input-lg">
                                            <option value="">Elija un estado SNI</option>
                                            <?php
                                            foreach ($sni as $s => $sni)
                                               echo '<option value="',$i,'">',$sni,'</option>';
                                            ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="facultad">Número RIM</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="num_rim" name="num_rim" placeholder="Número RIM">
                                             
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="mailing">Mailing</label>
                                            ¿Deseas recibir correos de las diferentes convocatorias de la SICDET?
                                            <div class="checkbox">
                                              <label><input type="checkbox" name="mailing" value="SI">Si</label>
                                              <label><input type="checkbox" name="mailing" value="NO">No</label>
                                            </div>
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
                            <button type="submit" class="btn c-theme-btn c-btn-uppercase btn-lg c-btn-bold c-btn-square btn-block">Registrar</button>
                            <?php form_close()?>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>

  
<!-- END: PAGE CONTENT -->





</div><!-- END: PAGE CONTAINER -->
