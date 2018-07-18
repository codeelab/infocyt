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

            } 
            else 
            {
                $u_rim = '<i class="fas fa-check"></i><b class="text-green">Aprobado: </b> <a href="#" target="_blank">REIM_'.$rim.'</a>';
                $verificacion = " En: <b>". $a ." Años</b>"; 
            } 
        }

        if ($a <= 0) 
        {
            if ($d == 1 && $estado_rim == 2) 
            {
                $u_rim = '<i class="fas fa-check"></i><span class="text-green"> Aprobado: </span> <a href="#" target="_blank">REIM_'.$rim.'</a>';
                $verificacion = " En: <b>". $d ." Día</b>";

            }
            else 
            {
                $u_rim = '<i class="fas fa-check"></i><span class="text-green"> Aprobado: </span> <a href="#" target="_blank">REIM_'.$rim.'</a>';
                $verificacion = " En: <b>". $d ." Dias</b>";
            }
        }

        if ($d == 0) 
        {
            $u_rim = '<i class="fas fa-times"></i><span class="text-green"> Aprobado: </span> <a href="#" target="_blank">REIM_'.$rim.'</a>';
            $verificacion = "<b class='text-orange'>Hoy último día</b>";
        } 
        else if ($d <= 0) 
        {
            $u_rim = '<i class="fas fa-times"></i><span class="text-red"> Vencida: </span> REIM_'.$rim.' ';
            $verificacion = '<i class="far fa-calendar"></i> Vencio el: <br><span class="text-red">'.$vigencia.'</span>';
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




$fi                = $fecha;
$hoy               = date('d-m-Y');
$fecha_ingreso     = date("d-m-Y", strtotime($fi));
$anio_actual       = date("Y");
$fecha_aviso = date("d-m-" . $anio_actual . "", strtotime($fi));

$periodo2015 = strtotime('-1 year', strtotime($fecha_aviso));
$periodo2015 = date('d-m-Y', $periodo2015);

$periodo2017 = strtotime('+1 year', strtotime($fecha_aviso));
$periodo2017 = date('d-m-Y', $periodo2017);



echo " Comparar si " . $fi . "  cumple el rango de :" . $fi . " al periodo " . $fecha_aviso . " </br> ";


$fecha1 = new DateTime($hoy);
$fecha1 = $fecha1->format("d-m-Y");

$f2015 = new DateTime($periodo2015);
$f2015 = $f2015->format("d-m-Y"); //=> 2015

$f2016 = new DateTime($fecha_aviso);
$f2016 = $f2016->format("d-m-Y"); //=> 2016

$f2017 = new DateTime($periodo2017);
$f2017 = $f2017->format("d-m-Y"); //=2017


function comprobarPeriodo20152016($fecha1, $f2015, $f2016)
{

    return $fecha1 >= $f2015 && $fecha1 <= $f2016;
}


if (comprobarPeriodo20152016($fecha1, $f2015, $f2016)) {

    echo " " . $fecha1 . " Esta dentro del periodo " . $f2015 . "-" . $f2016 . "</br>";

} else {

    echo " " . $fecha1 . " Esta fuera del periodo " . $f2015 . "-" . $f2016 . "</br>"; // <= Resultado
}

echo "</br>";

echo " Comparar si " . $hoy . "  cumple el rango de :" . $fecha_aviso . " al periodo " . $periodo2017 . " </br> ";

function comprobarPeriodo20162017($fecha1, $f2016, $f2017)
{

    return $fecha1 >= $f2016 && $fecha1 <= $f2017;
}


if (comprobarPeriodo20162017($fecha1, $f2016, $f2017)) {

    echo " " . $fecha1 . " Esta dentro del periodo " . $f2016 . "-" . $f2017 . "</br>";

} else {

    echo " " . $fecha1 . " Esta fuera del periodo " . $f2016 . "-" . $f2017 . "</br>"; // <= Resultado
}

echo "</br>";


 ?>