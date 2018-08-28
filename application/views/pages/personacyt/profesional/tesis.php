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
            <li><a href="<?=base_url('personacyt');?>">Inicio</a></li> | <li><a href="<?=base_url('personacyt/tesis');?>" class="c-font-dark">Tesís</a></li>
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
                            <h3 class="c-font-uppercase c-font-bold">Listado de Tesís</h3>
                        </div>                
                        <div style="margin: 15px;">
                            <button class="btn btn-sm c-btn-purple c-btn-square c-btn-border-2x" data-toggle="modal" data-target="#mascongreso">
                                <i class="fas fa-check-circle"></i> Agregar
                            </button>

                        </div>


                            <div class="table-responsive">
                            <table class="table display responsive no-wrap" width="100%" id="tablePersonacyt">
                                 <thead>
                             <tr>
                                <th><i class='fas fa-graduation-cap' aria-hidden='true'></i> GRADO</th>
                                <th><i class='fas fa-book' aria-hidden='true'></i> TÍTULO</th>
                                <th><i class='fas fa-file-pdf' aria-hidden='true'></i> CONSTANCIA</th>
                             </tr>
                             </thead>
                             <tbody>
                    <?php

                        if($tesis !== FALSE) 
                        {
                            foreach ($tesis as $t) 
                            {

                                echo '
                                    <tr>
                                        <td>'.$t->descr_grado.'</td>
                                        <td>'.mb_strtoupper($t->titulo_tesis,'UTF-8').'</td>
                                        <td class="center"><a href="'.base_url('tesis_pdf/').$t->id_tesis.'" target="_blank"><button type="button" class="btn btn-md c-btn-red c-btn-square c-btn-border-2x btn-block" data-toggle="tooltip" data-placement="bottom" title="'.$t->titulo_tesis.'"><i class="far fa-file-pdf" aria-hidden="true"></i></button></a></td>
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
                
                <?php $atrib = array('id' => 'registro_personacyt', 'autocomplete'=> 'off');
                            echo form_open('personacyt/alta_tesis', $atrib); ?>
                     <div class="row">
                        <div class="col-md-4">
                            <label class="form-text" for="otorgante">FECHA DE INICIO:</label>
                            <input type="text" class="form-control c-theme c-square input-lg" id="fecha_inicio" name="fecha_inicio" placeholder="YYYY/MM/DD"/>
                        </div>
                        <div class="col-md-4">
                            <label class="form-text" for="otorgante">FECHA FINAL:</label>
                            <input type="text" class="form-control c-theme c-square input-lg" id="fecha_final" name="fecha_final" placeholder="YYYY/MM/DD"/>
                        </div>
                        <div class="col-md-4">
                            <label class="form-text" for="obtencion">¿FUE TERMINADA?</label>
                            <?php $data = array('name'=>'conclusion','id'=>'conclusion','class'=>'form-control c-theme c-square input-lg','value'=>'SI','checked'=>FALSE);echo form_checkbox($data); ?>
                        </div> 
                    </div>
                    <br>
                    <div class="row">    
                        <div class="col-md-12">
                            <label class="form-text" for="otorgante">TITULO:</label>
                            <textarea rows="3" maxlength="250" class="form-control c-theme c-square input-lg" id="titulo_tesis" name="titulo_tesis" style="text-transform: uppercase;"/></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">    
                        <div class="col-md-12">
                            <label class="form-text" for="pais">AUTOR TESISTA:</label>
                            <input type="text" class="form-control c-theme c-square input-lg" id="autor" name="autor" placeholder="TÍTULO">
                        </div>
                    </div>
                    <br>
                    <div class="row"> 
                        <div class="col-md-4">
                            <label class="form-text" for="pais">GRADO:</label>
                                <?php
                                    $options = array ('' => 'Elija Grado');
                                    foreach($grado as $g)
                                        $options[$g->id_grado] = $g->descr_grado;
                                        echo form_dropdown('grado_id', $options, ' ', 'class="form-control c-theme c-square input-lg" id="grado_id"');
                                ?>
                        </div> 
                        <div class="col-md-4">
                            <label class="form-text" for="otorgante">PAÍS:</label>
                                <?php
                                    $options = array ('' => 'Elija opción');
                                    foreach($pais as $pa)
                                        $options[$pa->id_paises] = $pa->nombre_pa;
                                        echo form_dropdown('paises_id', $options, ' ', 'class="form-control c-theme c-square input-lg" id="paises_id"');
                                ?>
                        </div>
                        <div class="col-md-4">
                            <label class="form-text" for="pais">EMPLEADORA:</label>
                                <?php
                                    $options = array ('' => 'Elija Tipo');
                                    foreach($empleadora as $g)
                                        $options[$g->id_empleadoras] = $g->nom_empleador;
                                        echo form_dropdown('entidad_empleadora_id', $options, ' ', 'class="form-control c-theme c-square input-lg" id="entidad_empleadora_id"');
                                ?>
                        </div>  
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-text" for="otorgante">SECTOR:</label>
                                <?php
                                    $options = array ('' => 'Elija Sector');
                                    foreach($sector as $s)
                                        $options[$s->id_sector] = $s->descr_sector;
                                        echo form_dropdown('sectores_id', $options, ' ', 'class="form-control c-theme c-square input-lg" id="sectores_id"');
                                ?>
                        </div>
                        <div class="col-md-8">
                            <label class="form-text" for="pais">INSTITUCIÓN DE LA ENTIDAD:</label>
                                <input type="text" class="form-control c-theme c-square input-lg" id="institucion_resp" name="institucion_resp" placeholder="TÍTULO">
                        </div>
                    </div>
                    <br>
                    <div class="row">    
                        <div class="col-md-6">
                            <label class="form-text" for="otorgante">DEPENDENCIA:</label>
                                <?php
                                    echo form_dropdown('dependencia_id', $dependencia, ' ', 'class="form-control c-theme c-square input-lg" id="dependencia_id"');
                                ?>
                        </div>     
                        <div class="col-md-6">
                            <label class="form-text" for="otorgante">DEPARTAMENTO:</label>
                                <?php
                                    echo form_dropdown('departamento_id', $departamento, ' ', 'class="form-control c-theme c-square input-lg" id="departamento_id"');
                                ?>
                        </div>  
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-text" for="otorgante">CAMPO:</label>
                                <?php
                                    echo form_dropdown('campos_id', $conocimiento, ' ', 'class="form-control c-theme c-square input-lg" id="campos_id"');
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
