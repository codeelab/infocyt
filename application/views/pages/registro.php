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
                                        <?php if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success" style="font-size: 19px;">
                        <strong>Genial!</strong> <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php }else if($this->session->flashdata('error')){  ?>
                    <div class="alert alert-danger" style="font-size: 19px;">
                        <strong>Oops!</strong> <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php } ?>
                        </div>
                            <?php $atrib = array('name' => 'form1', 'id' => 'registro', 'autocomplete'=> 'off');
                            echo form_open('registro/investigador', $atrib); ?>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-text" for="nombre">Nombre</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="nombre" name="nombre" placeholder="Nombre">
                                             <?php echo form_error('nombre', '<div class="alert alert-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="a_paterno">Apellido Paterno</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="a_paterno" name="a_paterno" placeholder="Apellido Paterno">
                                            <?php echo form_error('a_paterno', '<div class="alert alert-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="a_paterno">Apellido Materno</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="a_materno" name="a_materno" placeholder="Apellido Materno">
                                             <?php echo form_error('a_materno', '<div class="alert alert-danger">', '</div>'); ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-text" for="nombre">RFC</label>
                                            <input type="text" class="form-control" id="rfc" name="rfc" placeholder="RFC" oninput="validarInputRFC(this)" >
                                             <div id="resultadoRFC"></div>
                                            <?php echo form_error('rfc', '<div class="alert alert-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="a_paterno">CURP</label>
                                            <input type="text" class="form-control" id="curp" name="curp" placeholder="CURP" oninput="validarInput(this)">
                                             <div id="resultadoCURP"></div>
                                            <?php echo form_error('curp', '<div class="alert alert-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="a_paterno">Fecha de Nacimiento</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="fecha_nac" name="fecha_nac" placeholder="MES / DÍA / AÑO" data-date-format="DD-MM-YYYY">
                                            <?php echo form_error('fecha_nac', '<div class="alert alert-danger">', '</div>'); ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-text" for="nacionalidad">Nacionalidad</label>
                                            <select name="nacionalidad" id="nacionalidad" class="form-control c-theme c-square input-lg">
                                            <option value="">Elige tu nacionalidad</option>
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
                                                $options = array ('' => 'Elija estado de procedencia');
                                                foreach($estados as $estado)
                                                    $options[$estado->id_estado] = $estado->nombre_est;
                                                echo form_dropdown('estado_id', $options, ' ', 'class="form-control c-theme c-square input-lg" id="estado_id"');
                                                ?>
                                                <?php echo form_error('estado_id', '<div class="alert alert-danger">', '</div>'); ?>
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
                                            <input type="text" class="form-control c-theme c-square input-lg" id="localidad" name="localidad" placeholder="Localidad">
                                            <?php echo form_error('localidad', '<div class="alert alert-danger">', '</div>'); ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-text" for="edad">Edad</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="edad" name="edad" placeholder="Edad">
                                            <?php echo form_error('edad', '<div class="alert alert-danger">', '</div>'); ?>
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
                                            <select name="estado_civil" id="estado_civil" class="form-control c-theme c-square input-lg">
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
                                            <input type="email" class="form-control c-theme c-square input-lg" id="correo_personal" name="correo_personal" placeholder="Correo Electrónico Personal" autofocus="autofocus">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-text" for="email">Confirmar Correo Personal</label>
                                            <input type="email" class="form-control c-theme c-square input-lg" id="correo_personal2" name="correo_personal2" placeholder="Correo Electrónico Personal">
                                        </div>
                                      <div class="col-md-3">
                                            <label class="form-text" for="email">Correo Laboral</label>
                                            <input type="email" class="form-control c-theme c-square input-lg" id="correo_laboral" name="correo_laboral" placeholder="Correo Electrónico Laboral" autofocus="autofocus">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-text" for="email">Confirmar Correo Laboral</label>
                                            <input type="email" class="form-control c-theme c-square input-lg" id="correo_laboral2" name="correo_laboral2" placeholder="Correo Electrónico Laboral">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-text" for="email">Teléfono Particular</label>
                                            <input type="tel" class="form-control c-theme c-square input-lg" id="tel_part" name="tel_part" placeholder="Teléfono Particular" autofocus="autofocus">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="email">Celular</label>
                                            <input type="tel" class="form-control c-theme c-square input-lg" id="tel_cel" name="tel_cel" placeholder="Teléfono Celular">
                                        </div>
                                      <div class="col-md-4">
                                            <label class="form-text" for="email">Teléfono Laboral</label>
                                            <input type="tel" class="form-control c-theme c-square input-lg" id="tel_lab" name="tel_lab" placeholder="Teléfono Laboral" autofocus="autofocus">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-text" for="institucion">Domicilio Particular</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="direccion" name="direccion" placeholder="Domicilio particular">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-text" for="facultad">Número</label>
                                            <input type="num" class="form-control c-theme c-square input-lg" id="numero_dom" name="numero_dom" placeholder="Número">
                                             
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="mailing">Colónia</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="colonia" name="colonia" placeholder="Colónia">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-text" for="mailing">Código Postal</label>
                                            <input type="num" class="form-control c-theme c-square input-lg" id="cp" name="cp" placeholder="Código Postal">
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

                                        <input type="hidden" class="form-control c-theme c-square input-lg" id="rol_id" name="rol_id" value="3">
                                        <input type="hidden" class="form-control c-theme c-square input-lg" id="status_id" name="status_id" value="1">
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
