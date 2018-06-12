<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//CONTROLADR PRINCIPAL DE LIDER DEL PROYECTO
//$route['lider/editar_usuarios'] = 'lider/editar_usuarios';
//$route['lider/edit'] = 'lider/edit';
//$route['lider/update_tallerista'] = 'lider/update_tallerista';

//$route['lider/editar_eventos'] = 'lider/editar_eventos';
//$route['lider/edita'] = 'lider/edita';
//$route['lider/update_evento'] = 'lider/update_evento';

//$route['lider/registro_talleristas'] = 'lider/registro_talleristas';
//$route['lider/r_tallerista'] = 'lider/r_tallerista';

//$route['lider/registro_eventos'] = 'lider/registro_eventos';
//$route['lider/r_evento'] = 'lider/r_evento';

//$route['lider/estadisticas'] = 'lider/estadisticas';
//$route['lider/municipios'] = 'lider/municipios';

//PESTAÑA PREPARACIÓN ACADÉMICA
$route['personacyt/alta_congreso'] = 'personacyt/alta_congreso';
$route['personacyt/congresos'] = 'personacyt/congresos';

//PESTAÑA OPCIONES
$route['personacyt/update_personacyt'] = 'personacyt/update_personacyt';
$route['personacyt/generales'] = 'personacyt/generales';
$route['personacyt/opciones'] = 'personacyt/opciones';

$route['personacyt/(:any)'] = 'personacyt/view/$1';
$route['personacyt'] = 'personacyt/index';




$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;