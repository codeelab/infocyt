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
                        </div>
                            <?php $atrib = array('name' => 'form1', 'id' => 'registro');
                            echo form_open('registro/registros', $atrib); ?>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-text" for="nombre">Nombre</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="nombre" name="nombre" placeholder="Nombre">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="a_paterno">Apellido Paterno</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="a_paterno" name="a_paterno" placeholder="Apellido Paterno">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="a_paterno">Apellido Materno</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="a_materno" name="a_materno" placeholder="Apellido Materno">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-text" for="nacionalidad">Nacionalidad</label>
                                            <select name="nacionalidad" id="nacionalidad" class="form-control c-theme c-square input-lg">
                                            <option value="">Elige tu nacionalidad</option>
                                            <?php
                                            foreach ($nac as $i => $nacionalidad)
                                               echo '<option value="',$i,'">',$nacionalidad,'</option>';
                                            ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="estado">Estado</label>
                                              <?php
                                                $options = array ('' => 'Elija estado de procedencia');
                                                foreach($estados as $estado)
                                                    $options[$estado->id_estado] = $estado->nombre_est;
                                                echo form_dropdown('estado', $options, ' ', 'class="form-control c-theme c-square input-lg" id="estado" name="estado"');
                                                ?>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="municipio">Municipio</label>
                                             <?php
                                                $options = array(''=>'Elija un estado');
                                                echo form_dropdown('municipio', $options, ' ', 'class="form-control" id="municipio" name="municipio" ');
                                            ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-text" for="edad">Edad</label>
                                      <div class="range range-info">
                                        <input type="range" name="edad" id="edad" min="18" max="100" value="18" onchange="rangeInfo.value=value">
                                        <output id="rangeInfo">18</output>
                                      </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="genero">Genero</label>
                                            <select name="genero" id="genero" class="form-control c-theme c-square input-lg">
                                            <option value="">Elige tu genero</option>
                                            <?php
                                            foreach ($gen as $i => $genero)
                                               echo '<option value="',$i,'">',$genero,'</option>';
                                            ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="escolaridad">Escolaridad</label>
                                            <select name="nivel" id="nivel" class="form-control c-theme c-square input-lg">
                                            <option value="">Elige tu nivel académico</option>
                                            <?php
                                            foreach ($esc as $i => $escolaridad)
                                               echo '<option value="',$i,'">',$escolaridad,'</option>';
                                            ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-text" for="institucion">Institución</label>
                                            <input type="text" class="form-control c-theme c-square input-lg" id="institucion" name="institucion" placeholder="Apellido Materno">

                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-text" for="facultad">Facultad</label>
                                             
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
                                        <div class="col-md-6">
                                            <label class="form-text" for="email">Correo</label>
                                            <input type="email" class="form-control c-theme c-square input-lg" id="email" name="email" placeholder="Correo Electrónico" autofocus="autofocus">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-text" for="email">Confirmar Correo</label>
                                            <input type="email" class="form-control c-theme c-square input-lg" id="email2" name="email2" placeholder="Correo Electrónico">
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

                                        <input type="hidden" class="form-control c-theme c-square input-lg" id="puesto" name="puesto" value="2">
                                        <input type="hidden" class="form-control c-theme c-square input-lg" id="status" name="status" value="Activo">
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
