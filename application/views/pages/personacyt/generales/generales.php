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


foreach ($usuario as $us) 
{
    $nombree        = $us->nombre;
    $paterno        = $us->a_paterno;
    $materno        = $us->a_materno;
    $fechas         = $us->fecha_nac;
    $paiss          = $us->nombre_pa;
    $paisss         = $us->pais_id;
    $edad           = $us->edad;
    $estado_c       = $us->nombre_civil;
    $estado_cc      = $us->id_civil;
    $nacionalida    = $us->nombre_nac;
    $nacion         = $us->id_nacionalidad;
    $estadoos       = $us->nombre_est;
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
                        <form action="" id="registro">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-text" for="nombre">Nombre</label>
                                    <p id="nombre" data-type="text" data-pk="<?=$user;?>" class="c-theme c-square input-lg"><?=$nombree;?></p>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-text" for="a_paterno">Apellido Paterno</label>
                                    <p id="a_paterno" data-type="text" data-pk="<?=$user;?>" class="c-theme c-square input-lg"><?=$paterno;?></p>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-text" for="a_materno">Apellido Materno</label>
                                    <p id="a_materno" data-type="text" data-pk="<?=$user;?>" class="c-theme c-square input-lg"><?=$materno;?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-text" for="fecha_nac">Fecha de Nacimiento</label>
                                    <div id="sandbox-container">
                                        <p id="fecha_nac" data-type="date" data-pk="<?=$user;?>" class="c-theme c-square input-lg"><?=$fechas;?></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-text" for="pais">País de Nacimiento</label>
                                    <p id="pais_id" data-type="select" data-pk="<?=$user;?>" data-source="pais/<?=$paisss;?>" data-title="País de Nacimiento" data-value="<?=$paisss;?>" class="c-theme c-square input-lg"><?=$paiss;?></p>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-text" for="edad">Edad</label>
                                    <p id="edad" data-type="text" data-pk="<?=$user;?>" class="c-theme c-square input-lg"><?=$edad;?></p>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-text" for="escolaridad">Estado Civil</label>
                                    <p id="estado_civil" data-type="select" data-pk="<?=$user;?>" data-source="estadoCivil/<?=$estado_cc;?>" data-title="Estado Civil" data-value="<?=$estado_cc;?>" class="c-theme c-square input-lg"><?=$estado_c;?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="form-text" for="nacionalidad">Nacionalidad</label>
                                    <p id="nacionalidad" data-type="select" data-pk="<?=$user;?>" data-source="nacion/<?=$nacion;?>" data-title="Nacionalidad" data-value="<?=$nacion;?>" class="c-theme c-square input-lg"><?=$nacionalida;?></p>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-text" for="localidad">Localidad</label>
                                    <p id="localidad" data-type="text" data-pk="<?=$user;?>" class="c-theme c-square input-lg"><?=$localidad;?></p>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-text" for="email">Correo Personal</label>
                                    <p id="correo_personal" data-type="email" data-pk="<?=$user;?>" class="c-theme c-square input-lg"><?=$c_personal;?></p>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-text" for="email">CorreoLaboral</label>
                                    <p id="correo_laboral" data-type="email" data-pk="<?=$user;?>" class="c-theme c-square input-lg"><?=$c_laboral;?></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-text" for="tel_part">Teléfono Particular</label>
                                    <p id="tel_part" data-type="tel" data-pk="<?=$user;?>" class="c-theme c-square input-lg"><?=$telpart;?></p>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-text" for="tel_cel">Celular</label>
                                    <p id="tel_cel" data-type="tel" data-pk="<?=$user;?>" class="c-theme c-square input-lg"><?=$telcel;?></p>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-text" for="tel_lab">Teléfono Laboral</label>
                                    <p id="tel_lab" data-type="tel" data-pk="<?=$user;?>" class="c-theme c-square input-lg"><?=$tellabo;?></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-text" for="institucion">Domicilio Particular</label>
                                    <p id="direccion" data-type="text" data-pk="<?=$user;?>" class="c-theme c-square input-lg"><?=$dom;?></p>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-text" for="facultad">Número</label>
                                    <p id="numero_dom" data-type="text" data-pk="<?=$user;?>" class="c-theme c-square input-lg"><?=$nume;?></p>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-text" for="mailing">Colónia</label>
                                    <p id="colonia" data-type="text" data-pk="<?=$user;?>" class="c-theme c-square input-lg"><?=$colo;?></p>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-text" for="mailing">Código Postal</label>
                                    <p id="cp" data-type="text" data-pk="<?=$user;?>" class="c-theme c-square input-lg"><?=$cp;?></p>
                                </div>
                            </div>

                        </form>
             










                </div>      
            </div>
        </div>
    </div>
</div>

  
<!-- END: PAGE CONTENT -->





</div><!-- END: PAGE CONTAINER -->
