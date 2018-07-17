<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//PESTAÑA INVESTIGACIÓN
$route['personacyt/alta_proyectos'] = 'personacyt/alta_proyectos';
$route['personacyt/proyectos'] = 'personacyt/proyectos';
$route['personacyt/alta_patentes'] = 'personacyt/alta_patentes';
$route['personacyt/patentes'] = 'personacyt/patentes';
$route['personacyt/alta_grupos'] = 'personacyt/alta_grupos';
$route['personacyt/grupos'] = 'personacyt/grupos';
$route['personacyt/alta_financiamiento'] = 'personacyt/alta_financiamiento';
$route['personacyt/financiamiento'] = 'personacyt/financiamiento';

//PESTAÑA PUBLICACIONES
$route['personacyt/alta_resenas'] = 'personacyt/alta_resenas';
$route['personacyt/resena'] = 'personacyt/resena';
$route['personacyt/alta_reportes'] = 'personacyt/alta_reportes';
$route['personacyt/reporte'] = 'personacyt/reporte';
$route['personacyt/alta_libros'] = 'personacyt/alta_libros';
$route['personacyt/libro'] = 'personacyt/libro';
$route['personacyt/alta_articulos'] = 'personacyt/alta_articulos';
$route['personacyt/articulos'] = 'personacyt/articulos';
$route['personacyt/alta_capitulo'] = 'personacyt/alta_capitulo';
$route['personacyt/capitulo'] = 'personacyt/capitulo';

//PESTAÑA ACTIVIDAD PROFESIONAL
$route['personacyt/alta_tesis'] = 'personacyt/alta_tesis';
$route['personacyt/tesis'] = 'personacyt/tesis';
$route['personacyt/alta_docencia'] = 'personacyt/alta_docencia';
$route['personacyt/docencia'] = 'personacyt/docencia';
$route['personacyt/alta_experiencia'] = 'personacyt/alta_experiencia';
$route['personacyt/experiencia'] = 'personacyt/experiencia';
$route['personacyt/alta_difusion'] = 'personacyt/alta_difusion';
$route['personacyt/difusion'] = 'personacyt/difusion';
$route['personacyt/alta_desarrollos'] = 'personacyt/alta_desarrollos';
$route['personacyt/desarrollos'] = 'personacyt/desarrollos';
$route['personacyt/alta_adscripcion'] = 'personacyt/alta_adscripcion';
$route['personacyt/adscripcion'] = 'personacyt/adscripcion';

//PESTAÑA PREPARACIÓN ACADÉMICA
$route['personacyt/alta_investigacion'] = 'personacyt/alta_investigacion';
$route['personacyt/investigacion'] = 'personacyt/investigacion';
$route['personacyt/alta_academica'] = 'personacyt/alta_academica';
$route['personacyt/academica'] = 'personacyt/academica';
$route['personacyt/alta_idiomas'] = 'personacyt/alta_idiomas';
$route['personacyt/idiomas'] = 'personacyt/idiomas';
$route['personacyt/alta_reconocimientos'] = 'personacyt/alta_reconocimientos';
$route['personacyt/reconocimientos'] = 'personacyt/reconocimientos';
$route['personacyt/alta_congreso'] = 'personacyt/alta_congreso';
$route['personacyt/congresos'] = 'personacyt/congresos';

//PESTAÑA OPCIONES
$route['personacyt/update_personacyt'] = 'personacyt/update_personacyt';
$route['personacyt/generales'] = 'personacyt/generales';
$route['personacyt/opciones'] = 'personacyt/opciones';



$route['personacyt/(:any)'] = 'personacyt/view/$1';
$route['constancia/(:any)'] = 'personacyt/constancia/$1';
$route['personacyt'] = 'personacyt/index';




$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;