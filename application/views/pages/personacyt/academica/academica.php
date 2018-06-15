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
            <li><a href="<?=base_url('personacyt');?>">Inicio</a></li> | <li><a href="<?=base_url('personacyt/academica');?>" class="c-font-dark">Preparación Académica</a></li>
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
                      
                     <div class="c-contact">
                        <div class="c-content-title-1">
                            <h3 class="c-font-uppercase c-font-bold">Listado de Grado Académico</h3>
                        </div>                
                        <div style="margin: 15px;">
                            <button class="btn btn-sm c-btn-purple c-btn-square c-btn-border-2x" data-toggle="modal" data-target="#mascongreso">
                                <i class="fas fa-check-circle"></i> Agregar Grado
                            </button>

                        </div>


                            <div class="table-responsive">
                            <table class="table display responsive no-wrap" width="100%" id="tablePersonacyt">
                                 <thead>
                             <tr>
                                <th><i class='fas fa-calendar' aria-hidden='true'></i>  FECHA</th>
                                <th><i class='fas fa-graduation-cap' aria-hidden='true'></i>  GRADO</th>
                                <th><i class='fas fa-flag' aria-hidden='true'></i>  PAÍS</th>
                                <th><i class='fas fa-book' aria-hidden='true'></i>  ÁREA</th>
                                <th><i class='fas fa-address-card' aria-hidden='true'></i>  CÉDULA</th>
                                <th><i class='fas fa-file-pdf' aria-hidden='true'></i>   CONSTANCIA</th>
                             </tr>
                             </thead>
                             <tbody>
                    <?php

                        if($grados !== FALSE) 
                        {
                            foreach ($grados as $g) 
                            {

                                echo '
                                    <tr>
                                        <td>'.$g->fecha_terminacion.'</td>
                                        <td>'.$g->descr_grado.'</td>
                                        <td>'.$g->nombre_pa.'</td>
                                        <td>'.$g->descr_disciplina.'</td>
                                        <td>'.$g->num_cedula.'</td>
                                        <td class="center"><a href="'.base_url('pdf/').$g->id_academica.'" target="_blank"><button type="button" class="btn btn-md c-btn-red c-btn-square c-btn-border-2x btn-block" data-toggle="tooltip" data-placement="bottom" title="'.$g->num_cedula.'"><i class="far fa-file-pdf" aria-hidden="true"></i></button></a></td>
                                    </tr>
                                ';
                            }
                        }
                    ?>
                             </tbody>
                             </table>
                            </div>





                    </div>
                </div>      
            </div>
        </div>
    </div>
</div>

  
<!-- END: PAGE CONTENT -->

<!-- Modal -->
<div class="modal fade" id="mascongreso" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    DATOS DEL RECONOCIMIENTO
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <?php $atrib = array('id' => 'registro', 'autocomplete'=> 'off');
                            echo form_open('personacyt/alta_academica', $atrib); ?>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-text" for="otorgante">FECHA DE TERMINACIÓN:</label>
                            <input type="date" min="1960" max="2025" step="1" class="form-control c-theme c-square input-lg" id="fecha_terminacion" name="fecha_terminacion" placeholder="2021"/>
                        </div>  
                        <div class="col-md-4">
                            <label class="form-text" for="pais">GRADO OBTENIDO:</label>
                                <?php
                                    $options = array ('' => 'Elija Grado');
                                    foreach($grado as $g)
                                        $options[$g->id_grado] = $g->descr_grado;
                                        echo form_dropdown('grado_id', $options, ' ', 'class="form-control c-theme c-square input-lg" id="grado_id"');
                                ?>
                        </div> 
                        <div class="col-md-4">
                            <label class="form-text" for="obtencion">COMPLETADO:</label>
                            <?php $data = array('name'=>'completado','id'=>'completado','class'=>'form-control c-theme c-square input-lg','value'=>'Si','checked'=>FALSE);echo form_checkbox($data); ?>
                        </div>    
                    </div>
                    <br>
                     <div class="row">
                        <div class="col-md-12">
                            <label class="form-text" for="descrp_grado">DESCRIPCIÓN DEL GRADO OBTENIDO:</label>
                            <textarea rows="3" maxlength="150" class="form-control c-theme c-square input-lg" id="descr_grado" name="descr_grado" style="text-transform: uppercase;"/></textarea>
                        </div> 
                    </div>
                    <br>
                     <div class="row">



                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-text" for="otorgante">PAÍS DONDE SE OBTUVO:</label>
                                <?php
                                    $options = array ('' => 'Elija País');
                                    foreach($pais as $pa)
                                        $options[$pa->id_paises] = $pa->nombre_pa;
                                        echo form_dropdown('paises_id', $options, ' ', 'class="form-control c-theme c-square input-lg" id="paises_id"');
                                ?>
                        </div>     
                        <div class="col-md-6">
                            <label class="form-text" for="otorgante">ENTIDAD DONDE SE OBTUVO:</label>
                                <?php
                                    $options = array ('' => 'Elija estado de procedencia');
                                    foreach($estados as $estado)
                                    $options[$estado->id_estado] = $estado->nombre_est;
                                    echo form_dropdown('estados_id', $options, ' ', 'class="form-control c-theme c-square input-lg" id="estados_id"');
                                ?>
                        </div>       
                    </div>
                    <br> 
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-text" for="otorgante">CAMPO:</label>
                                <?php
                                    echo form_dropdown('campo_id', $conocimiento, ' ', 'class="form-control c-theme c-square input-lg" id="campo_id"');
                                ?>
                        </div>     
                        <div class="col-md-4">
                            <label class="form-text" for="otorgante">DISCIPLINA:</label>
                                <?php
                                    echo form_dropdown('disciplina_id', array(), null, "id='disciplina_id' class='form-control c-theme c-square input-lg'");
                                ?>
                        </div>
                        <div class="col-md-4">
                            <label class="form-text" for="otorgante">SUBDISCIPLINA:</label>
                                <?php
                                    echo form_dropdown('subdisciplina_id', array(), ' ', 'class="form-control c-theme c-square input-lg" id="subdisciplina_id"');
                                ?>
                        </div>     
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-text" for="otorgante">ESTATUS DEL GRADO:</label>
                                <?php
                                    $options = array ('' => 'Elija Estatus');
                                    foreach($est_grado as $e)
                                        $options[$e->id_est_grado] = $e->descr_est_grado;
                                        echo form_dropdown('estatus_id', $options, ' ', 'class="form-control c-theme c-square input-lg" id="estatus_id"');
                                ?>
                        </div>     
                        <div class="col-md-4">
                            <label class="form-text" for="otorgante">NÚMERO DE CÉDULA:</label>
                               <input type="text" class="form-control c-theme c-square input-lg" id="num_cedula" name="num_cedula" placeholder="Número de Cédula">
                        </div>
                        <div class="col-md-4">
                            <label class="form-text" for="otorgante">INSTITUCIÓN OTORGANTE:</label>
                                <?php
                                    $options = array ('' => 'Elija Sector');
                                    foreach($sector as $s)
                                        $options[$s->id_sector] = $s->descr_sector;
                                        echo form_dropdown('sector_id', $options, ' ', 'class="form-control c-theme c-square input-lg" id="sector_id"');
                                ?>
                        </div>     
                    </div>
                    <br>
                    <div class="row">    
                        <div class="col-md-12">
                            <label class="form-text" for="otorgante">INSTITUCIÓN OTORGANTE:</label>
                               <input type="text" class="form-control c-theme c-square input-lg" id="institucion" name="institucion" placeholder="Institución Otorgante del Grado Acádemico">
                        </div>   
                    </div>
                    <br>
                    <div class="row">    
                        <div class="col-md-6">
                            <label class="form-text" for="otorgante">DEPENDENCIA DE LA INSTITUCIÓN:</label>
                                <?php
                                    echo form_dropdown('dependencia_id', $dependencia, ' ', 'class="form-control c-theme c-square input-lg" id="dependencia_id"');
                                ?>
                        </div>     
                        <div class="col-md-6">
                            <label class="form-text" for="otorgante">DEPARTAMENTO DE LA DEPENDENCIA:</label>
                                <?php
                                    echo form_dropdown('departamento_id', array(), null, "id='departamento_id' class='form-control c-theme c-square input-lg'");
                                ?>
                        </div>  
                    </div>  
                    <br>
                    <div class="row">    
                        <div class="col-md-12">
                            <label class="form-text" for="otorgante">DESCRIPCIÓN DE LA TESIS:</label>
                               <textarea rows="4" maxlength="250" class="form-control c-theme c-square input-lg" id="descripcion_tesis" name="descripcion_tesis" style="text-transform: uppercase;"/></textarea>
                        </div>   
                    </div>
                    <br>
                  <div class="row">
                    <div class="col-sm-offset-6 col-sm-6">
                        <?php echo form_hidden("usuario_id", "$user"); ?>
                        <button type="button" class="btn btn-danger btn-sm c-btn-uppercase c-btn-bold c-btn-square" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn c-theme-btn c-btn-uppercase btn-sm c-btn-bold c-btn-square">Guardar</button>
                    </div>
                  </div>
                <?php form_close()?>
        
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>




</div><!-- END: PAGE CONTAINER -->
