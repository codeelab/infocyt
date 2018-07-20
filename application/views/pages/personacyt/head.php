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

      $periodo = strtotime('+3 year', strtotime($fecha));
      $periodo = date('Y', $periodo);
      $periodos = strtotime('0 year', strtotime($fecha));
      $periodos = date('Y', $periodos);


///////////////////////////////////////////////////////////////////////////
//
// OPCIONES DE AVISO REIM A USUARIO
//
///////////////////////////////////////////////////////////////////////////


     //--------------------------------------------------------------------------
     // MUESTRA LOS AVISOS SI LA OPCIÓN ES PENDIENTE = 1
     //--------------------------------------------------------------------------

    if ($aprobacion == '0000-00-00'  && $fecha == '0000-00-00'  && $estado_rim == 1) 
    {
      $u_rim = '<i class="far fa-clock"></i><span class="text-orange"> Pendiente: REIM_'.$rim.'</span>';
      $verificacion = '<i class="far fa-clock"></i> [Pendiente]';
    }
    else if ($aprobacion != '0000-00-00'  && $fecha == '0000-00-00'  && $estado_rim == 1) 
    {
      $u_rim = '<i class="fas fa-check"></i><b class="text-green">Aprobado: </b> <a href="#" target="_blank">REIM_'.$rim.'</a>';
      $verificacion = '<i class="far fa-clock"></i> [Pendiente]';
    }
    else if ($aprobacion == '0000-00-00'  && $fecha != '0000-00-00'  && $estado_rim == 1) 
    {
      $u_rim = '<i class="far fa-clock"></i><span class="text-orange"> Pendiente: REIM_'.$rim.'</span>';
      $verificacion = '<i class="far fa-clock"></i> [Pendiente]';
    }

     //--------------------------------------------------------------------------
     // MUESTRA LOS AVISOS SI LA OPCIÓN ES APROBADO = 2
     //-------------------------------------------------------------------------

    if ($aprobacion == '0000-00-00'  && $fecha == '0000-00-00'  && $estado_rim == 2) 
    {
      $u_rim = '<i class="far fa-clock"></i><b class="text-orange"> [No Confirmado]</b>: REIM_'.$rim.'';
      $verificacion = '<i class="far fa-calendar"></i> [No Confirmado]';  
    }
    else if ($aprobacion != '0000-00-00'  && $fecha == '0000-00-00'  && $estado_rim == 2) 
    {
      $u_rim = '<i class="fas fa-check"></i><b class="text-green">Aprobado: </b> <a href="#" target="_blank">REIM_'.$rim.'</a>';
      $verificacion = '<i class="far fa-calendar"></i> [No Confirmado]';  
    }
    else if ($aprobacion == '0000-00-00'  && $fecha != '0000-00-00'  && $estado_rim == 2) 
    {
      $u_rim = '<i class="far fa-clock"></i><b class="text-default"> [No Confirmado]</b>: REIM_'.$rim.'';
      $verificacion = '<i class="far fa-calendar"></i> Vencio el: <br><span class="text-red">'.$vigencia.'</span>';  
    }
    else
    {
        if ($a > 0) 
        {
            if ($a == 1 && $estado_rim == 2) 
            {
                $u_rim = '<i class="fas fa-check"></i><b class="text-green">Aprobado: </b> <a href="#" target="_blank">REIM_'.$rim.'</a>';
                $verificacion = " En: <b>". $a ." Año</b>";
                $dura = '<b>' . $periodos . '</b> a <b>' . $periodo . '</b>'; 

            } 
            else 
            {
                $u_rim = '<i class="fas fa-check"></i><b class="text-green">Aprobado: </b> <a href="#" target="_blank">REIM_'.$rim.'</a>';
                $verificacion = " En: <b>". $a ." Años</b>";
                $dura = '<b>' . $periodos . '</b> a <b>' . $periodo . '</b>';  
            } 
        }

        if ($a <= 0) 
        {
            if ($d == 1 && $estado_rim == 2) 
            {
                $u_rim = '<i class="fas fa-check"></i><span class="text-green"> Aprobado: </span> <a href="#" target="_blank">REIM_'.$rim.'</a>';
                $verificacion = " En: <b>". $d ." Día</b>";
                $dura = '<b>' . $periodos . '</b> a <b>' . $periodo . '</b>';

            }
            else 
            {
                $u_rim = '<i class="fas fa-check"></i><span class="text-green"> Aprobado: </span> <a href="#" target="_blank">REIM_'.$rim.'</a>';
                $verificacion = " En: <b>". $d ." Dias</b>";
                $dura = '<b>' . $periodos . '</b> a <b>' . $periodo . '</b>'; 
            }
        }

        if ($d == 0) 
        {
            $u_rim = '<i class="fas fa-times"></i><span class="text-green"> Aprobado: </span> <a href="#" target="_blank">REIM_'.$rim.'</a>';
            $verificacion = "<b class='text-orange'>Hoy último día</b>";
            $dura = '<b>' . $periodos . '</b> a <b>' . $periodo . '</b>'; 
        } 
        else if ($d <= 0) 
        {
            $u_rim = '<i class="fas fa-times"></i><span class="text-red"> Vencida: </span> REIM_'.$rim.' ';
            $verificacion = '<i class="far fa-calendar"></i> Vencio el: <br><span class="text-red">'.$vigencia.'</span>';
            $dura = '<b>' . $periodos . '</b> a <b>' . $periodo . '</b>'; 
        }   
    }
    

     //--------------------------------------------------------------------------
     // MUESTRA LOS AVISOS SI LA OPCIÓN ES VENCIDO = 3
     //-------------------------------------------------------------------------

    if ($aprobacion == '0000-00-00'  && $fecha == '0000-00-00'  && $estado_rim == 3) 
    {
      $u_rim = '<i class="far fa-clock"></i><span class="text-danger"> Vencido: REIM_'.$rim.'</span>';
      $verificacion = '<i class="far fa-calendar"></i> [No Confirmado]';
    }
    else if ($aprobacion != '0000-00-00'  && $fecha == '0000-00-00'  && $estado_rim == 3) 
    {
      $u_rim = '<i class="fas fa-check"></i><b class="text-green">Aprobado: </b> <a href="#" target="_blank">REIM_'.$rim.'</a>';
      $verificacion = '<i class="far fa-calendar"></i> [No Confirmado]';
    }
    else if ($aprobacion == '0000-00-00'  && $fecha != '0000-00-00'  && $estado_rim == 3) 
    {
      $u_rim = '<i class="far fa-clock"></i><span class="text-danger"> Vencido: REIM_'.$rim.'</span>';
      $verificacion = '<i class="far fa-calendar"></i> Vence el: <br><span class="text-red">'.$vigencia.'</span>';
    }

     //--------------------------------------------------------------------------
     // MUESTRA LOS AVISOS SI LA OPCIÓN ES CANCELADO = 4
     //-------------------------------------------------------------------------

    if ($aprobacion == '0000-00-00'  && $fecha == '0000-00-00'  && $estado_rim == 4) 
    {
      $u_rim = '<i class="far fa-clock"></i><span class="text-default"> Cancelado: REIM_'.$rim.'</span>';
      $verificacion = '<i class="far fa-calendar"></i> [Cancelado]';
    }
    else if ($aprobacion != '0000-00-00'  && $fecha == '0000-00-00'  && $estado_rim == 4) 
    {
      $u_rim = '<i class="fas fa-check"></i><b class="text-default">Cancelado: </b> <a href="#" target="_blank">REIM_'.$rim.'</a>';
      $verificacion = '<i class="far fa-calendar"></i> [Cancelado]';
    }
    else if ($aprobacion == '0000-00-00'  && $fecha != '0000-00-00'  && $estado_rim == 4) 
    {
      $u_rim = '<i class="far fa-clock"></i><span class="text-default"> Cancelado: REIM_'.$rim.'</span>';
      $verificacion = '<i class="far fa-calendar"></i> [Cancelado]';
    }






 ?>