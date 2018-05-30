<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">

<div class="c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold">
    <div class="container">
        <div class="c-page-title c-pull-left">
            <h3 class="c-font-uppercase c-font-bold c-font-dark c-font-20 c-font-slim">Registro RIM</h3>
        </div>
        <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
            <li><a href="<?=base_url();?>" class="c-font-dark">Inicio</a></li>
            <li class="c-font-dark">/</li>
            <li><a href="<?=base_url('registro');?>" class="c-font-dark">Registro RIM</a></li>                    
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
                            <h3 class="c-font-uppercase c-font-bold">NÚMERO DE REGISTRO DE INVESTIGADORES MICHOACANOS (RIM)</h3>
                    <div class="c-line-center"></div>
                    <p class="c-center c-font-uppercase" style="font-size: 15px;">
                        Estimado usuario, el número proporcionado por el sistema es único y no se almacena en nuestra base de datos.
                    </p>
                        </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <label class="form-text" for="rfc">RFC (6 DIGÍTOS)</label>
                                    <input type="text" class="form-control c-theme c-square input-lg" id="rfc" name="rfc" placeholder="RFC" maxlength="6" >
                                </div>
                                <div class="col-md-2">
                                    <label class="form-text" for="genero">Genero</label>
                                            <select name="sexo_id" id="sexo_id" class="form-control c-theme c-square input-lg">
                                            <option value="0">Elija una opción</option>
                                            <?php
                                            foreach ($gen as $i => $genero)
                                               echo '<option value="',$i,'">',$genero,'</option>';
                                            ?>
                                            </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-text" for="pais">Nivel Académico</label>
                                        <?php
                                        $options = array ('X' => 'Elija una opción');
                                        foreach($nivel as $n)
                                        $options[substr($n->nombre_nivel_academico,0,1)] = $n->nombre_nivel_academico;
                                        echo form_dropdown('nivel', $options, ' ', 'class="form-control c-theme c-square input-lg" id="nivel"');
                                        ?>
                                </div>
                                <div class="col-md-5">
                                    <label class="form-text" for="pais">Área del Conocimiento</label>
                                        <?php
                                        $options = array ('X' => 'Elija una opción');
                                        foreach($area as $pa)
                                        $options[$pa->clave_area] = $pa->nombre_area;
                                        echo form_dropdown('area', $options, ' ', 'class="form-control c-theme c-square input-lg" id="area"');
                                        ?>
                                </div>
                            </div>
<br>
<br>

                            <div class="row">
                                 <div class="col-md-6">
                                     <p class="c-font-uppercase c-font-bold c-font-dark" style="font-size: 30pt"><i class="fas fa-id-card"></i>    RIM_<span id="rfc1"></span><span id="sexo1"></span><span id="nivel1"></span><span id="area1"></span><span id="rim"></span></p>
                                </div>                             
                            </div>
<br>
<br>
<br>



                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>

  
<!-- END: PAGE CONTENT -->


</div><!-- END: PAGE CONTAINER -->
