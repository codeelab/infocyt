<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//PESTAÑA INVESTIGACIÓN
$route['personacyt/alta_proyectos'] = 'personacyt/alta_proyectos';
$route['personacyt/proyectos'] = 'personacyt/proyectos';
$route['proyectos_pdf/(:any)'] = 'personacyt/proyectos_pdf/$1';

$route['personacyt/alta_patentes'] = 'personacyt/alta_patentes';
$route['personacyt/patentes'] = 'personacyt/patentes';
$route['patentes_pdf/(:any)'] = 'personacyt/patentes_pdf/$1';

$route['personacyt/alta_grupos'] = 'personacyt/alta_grupos';
$route['personacyt/grupos'] = 'personacyt/grupos';
$route['grupos_pdf/(:any)'] = 'personacyt/grupos_pdf/$1';

$route['personacyt/alta_financiamiento'] = 'personacyt/alta_financiamiento';
$route['personacyt/financiamiento'] = 'personacyt/financiamiento';
$route['financiamiento_pdf/(:any)'] = 'personacyt/financiamiento_pdf/$1';


//PESTAÑA PUBLICACIONES
$route['personacyt/alta_resenas'] = 'personacyt/alta_resenas';
$route['personacyt/resena'] = 'personacyt/resena';
$route['resena_pdf/(:any)'] = 'personacyt/resena_pdf/$1';

$route['personacyt/alta_reportes'] = 'personacyt/alta_reportes';
$route['personacyt/reporte'] = 'personacyt/reporte';
$route['reporte_pdf/(:any)'] = 'personacyt/reporte_pdf/$1';

$route['personacyt/alta_libros'] = 'personacyt/alta_libros';
$route['personacyt/libro'] = 'personacyt/libro';
$route['libro_pdf/(:any)'] = 'personacyt/libro_pdf/$1';

$route['personacyt/alta_articulos'] = 'personacyt/alta_articulos';
$route['personacyt/articulos'] = 'personacyt/articulos';
$route['articulos_pdf/(:any)'] = 'personacyt/articulos_pdf/$1';

$route['personacyt/alta_capitulo'] = 'personacyt/alta_capitulo';
$route['personacyt/capitulo'] = 'personacyt/capitulo';
$route['capitulo_pdf/(:any)'] = 'personacyt/capitulo_pdf/$1';

//PESTAÑA ACTIVIDAD PROFESIONAL
$route['personacyt/alta_tesis'] = 'personacyt/alta_tesis';
$route['personacyt/tesis'] = 'personacyt/tesis';
$route['tesis_pdf/(:any)'] = 'personacyt/tesis_pdf/$1';

$route['personacyt/alta_docencia'] = 'personacyt/alta_docencia';
$route['personacyt/docencia'] = 'personacyt/docencia';
$route['docencia_pdf/(:any)'] = 'personacyt/docencia_pdf/$1';

$route['personacyt/alta_experiencia'] = 'personacyt/alta_experiencia';
$route['personacyt/experiencia'] = 'personacyt/experiencia';
$route['experiencia_pdf/(:any)'] = 'personacyt/experiencia_pdf/$1';

$route['personacyt/alta_difusion'] = 'personacyt/alta_difusion';
$route['personacyt/difusion'] = 'personacyt/difusion';
$route['difusion_pdf/(:any)'] = 'personacyt/difusion_pdf/$1';

$route['personacyt/alta_desarrollos'] = 'personacyt/alta_desarrollos';
$route['personacyt/desarrollos'] = 'personacyt/desarrollos';
$route['desarrollos_pdf/(:any)'] = 'personacyt/desarrollos_pdf/$1';

$route['personacyt/alta_adscripcion'] = 'personacyt/alta_adscripcion';
$route['personacyt/adscripcion'] = 'personacyt/adscripcion';
$route['adscripcion_pdf/(:any)'] = 'personacyt/adscripcion_pdf/$1';

//PESTAÑA PREPARACIÓN ACADÉMICA
$route['personacyt/alta_investigacion'] = 'personacyt/alta_investigacion';
$route['personacyt/investigacion'] = 'personacyt/investigacion';
$route['investigacion_pdf/(:any)'] = 'personacyt/investigacion_pdf/$1';

$route['personacyt/alta_academica'] = 'personacyt/alta_academica';
$route['personacyt/academica'] = 'personacyt/academica';
$route['academica_pdf/(:any)'] = 'personacyt/academica_pdf/$1';

$route['personacyt/alta_idiomas'] = 'personacyt/alta_idiomas';
$route['personacyt/idiomas'] = 'personacyt/idiomas';
$route['idioma_pdf/(:any)'] = 'personacyt/idioma_pdf/$1';

$route['personacyt/alta_reconocimientos'] = 'personacyt/alta_reconocimientos';
$route['personacyt/reconocimientos'] = 'personacyt/reconocimientos';
$route['reconocimiento_pdf/(:any)'] = 'personacyt/reconocimiento_pdf/$1';

$route['personacyt/alta_congreso'] = 'personacyt/alta_congreso';
$route['personacyt/congresos'] = 'personacyt/congresos';
$route['congreso_pdf/(:any)'] = 'personacyt/congreso_pdf/$1';

//PESTAÑA OPCIONES
$route['personacyt/update_personacyt'] = 'personacyt/update_personacyt';
$route['personacyt/generales'] = 'personacyt/generales';
$route['personacyt/opciones'] = 'personacyt/opciones';
$route['postulacion/(:any)'] = 'personacyt/postulacion/$1';
$route['solicitud/(:any)'] = 'personacyt/solicitud/$1';

$route['personacyt/(:any)'] = 'personacyt/view/$1';
$route['personacyt'] = 'personacyt/index';




$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;