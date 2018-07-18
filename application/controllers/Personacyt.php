<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personacyt extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Personacyt_model','Pages_model'));
        $this->load->library(array('session','form_validation','user_agent','encrypt'));
        $this->load->helper(array('url','form','security'));
        $this->load->database('default');
    }

    public function index()
    {

        if (!file_exists(APPPATH.'views/pages/personacyt/index.php')) 
        {
            redirect('personacyt');
        }
        $id = $this->session->userdata('id_usuario');        
        $data['rimm']    = $this->Personacyt_model->rim($id);
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/personacyt/index',$data);
        $this->load->view('theme/footer');
    }




///////////////////////////////////////////////////////////////////////////
//
// PESTAÑA DE OPCIONES GENERALES
//
///////////////////////////////////////////////////////////////////////////
    public function opciones()
    {
        if (!file_exists(APPPATH.'views/pages/personacyt/generales/opciones.php')) 
        {
            redirect('personacyt');
        }
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/personacyt/generales/opciones');
        $this->load->view('theme/footer');
    }


    public function generales()
    {
        if (!file_exists(APPPATH.'views/pages/personacyt/generales/generales.php')) 
        {
            redirect('personacyt');
        }
        $id                 = $this->session->userdata('id_usuario');
        
        $data['usuario']    = $this->Personacyt_model->Usuario($id);
        $data['estados']    = $this->Pages_model->getEstados();
        $data['nac']        = $this->Pages_model->nacionalidad();
        $data['gen']        = $this->Pages_model->sexo();
        $data['civil']      = $this->Pages_model->civil();
        $data['sni']        = $this->Pages_model->estado_sni();
        $data['area']       = $this->Pages_model->area_conocimiento();
        $data['nivel']      = $this->Pages_model->nivel_academico();
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/personacyt/generales/generales', $data);
        $this->load->view('theme/footer');
    }

            function municipio($id_estado)
            {
                $this->load->model('Pages_model');
                $cidades = $this->Pages_model->getCidades($id_estado);
                if( empty ( $cidades ) )
                    return '{ "nombre": "No hay municipios disponibles" }';
                $arr_cidade = array();
                foreach ($cidades as $cidade) {
                    $arr_cidade[] = '{"id_municipio":' . $cidade->id_municipio . ',"nombre":"' . $cidade->nombre_mun . '"}';
                }
                echo '[ ' . implode(",",$arr_cidade) . ']';
                return;
            }


            public function update_personacyt()
            {
                $pk = $_POST['pk'];
                $name = $_POST['name'];
                $value = $_POST['value'];

                if(!empty($value))
                {
                    /* Si el valor es correcto lo procesa (por ejemplo, guardar en db). En caso de éxito, su script no debe devolver nada, la respuesta HTTP estándar '200 OK' es suficiente.*/
                      $query = $this->db->query('UPDATE usuarios SET '.mysql_escape_string($name).'="'.mysql_escape_string($value).'" WHERE id_usuario = "'.mysql_escape_string($pk).'"');
                      return $query;
                    
                    //Aquí, por razones de depuración, solo devolvemos el volcado de $ _POST, verá el resultado en la consola del navegador

                    //print_r($_POST);
                } else {
                    /* ¡En caso de valores incorrectos o errores, debe devolver el estado de HTTP! = 200.
                    El cuerpo de respuesta se mostrará como un mensaje de error en forma editable. */

                    header('HTTP/1.0 400 Bad Request', true, 400);
                    echo "This field is required!";
                }

            }


            public function pais()
            {
                $paises = $this->Personacyt_model->getDatosPais();
                $pa = array();
                foreach ($paises as $r) 
                {
                    $pa[] = array('value' => $r['id_paises'], 'text' => $r['nombre_pa']);
                }
                echo json_encode($pa);

            }

            public function estadoCivil()
            {
                $civil = $this->Personacyt_model->getDatosCivil();
                $ci = array();
                foreach ($civil as $r) 
                {
                    $ci[] = array('value' => $r['id_civil'], 'text' => $r['nombre_civil']);
                }
                echo json_encode($ci);  
            }

            public function nacion()
            {
                $nacional = $this->Personacyt_model->nacionalidad();
                $na = array();
                foreach ($nacional as $r) 
                {
                    $na[] = array('value' => $r['id_nacionalidad'], 'text' => $r['nombre_nac']);
                }
                echo json_encode($na);  
            }

///////////////////////////////////////////////////////////////////////////
//
// PESTAÑA DE PREPARACIÓN ACADÉMICA
//
///////////////////////////////////////////////////////////////////////////

    public function congresos()
    {
        if (!file_exists(APPPATH.'views/pages/personacyt/academica/congresos.php')) 
        {
            redirect('personacyt');
        }
        $id = $this->session->userdata('id_usuario');
        $data['pais']        = $this->Pages_model->paises();
        $data['congresos']   = $this->Personacyt_model->congresos($id);
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/personacyt/academica/congresos',$data);
        $this->load->view('theme/footer');
    }

            public function alta_congreso()
            {
                if($this->input->method() === 'post')
                {
                    $titulo         = $this->security->xss_clean($this->input->post('titulo'));
                    $publicacion    = $this->security->xss_clean($this->input->post('anio_publicacion'));
                    $descripcion    = $this->security->xss_clean($this->input->post('descr_mezcla'));
                    $organizador    = $this->security->xss_clean($this->input->post('nombre_organizador'));
                    $fecha_ini      = $this->security->xss_clean($this->input->post('fecha_inicio'));
                    $fecha_fin      = $this->security->xss_clean($this->input->post('fecha_final'));
                    $pais           = $this->security->xss_clean($this->input->post('paises_id'));
                    $usuario        = $this->security->xss_clean($this->input->post('usuario_id'));

                    $data = array(
                        'titulo'                => $titulo,
                        'anio_publicacion'      => $publicacion,
                        'descr_mezcla'          => $descripcion,
                        'nombre_organizador'    => $organizador,
                        'fecha_inicio'          => $fecha_ini,
                        'fecha_final'           => $fecha_fin,
                        'paises_id'             => $pais,
                        'usuario_id'            => $usuario,
                        'fecha_captura'         => date('Y-m-d')
                    );
                    $this->session->set_flashdata('success', 'Se ha registrado correctamente el congreso.');
                    $this->Personacyt_model->alta_congreso($data);
                    redirect('personacyt/congresos');
                }
                else
                {
                    $this->session->set_flashdata('error', 'No se ha podido registrar el congreso.');
                    redirect('personacyt/congresos');
                }
            }


    public function reconocimientos()
    {
        if (!file_exists(APPPATH.'views/pages/personacyt/academica/reconocimientos.php')) 
        {
            redirect('personacyt');
        }
        $id = $this->session->userdata('id_usuario');
        $data['pais']              = $this->Pages_model->paises();
        $data['reconocimientos']   = $this->Personacyt_model->reconocimientos($id);
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/personacyt/academica/reconocimientos',$data);
        $this->load->view('theme/footer');
    }

            public function alta_reconocimientos()
            {
                if($this->input->method() === 'post')
                {
                    $descripcion    = $this->security->xss_clean($this->input->post('descripcion'));
                    $publicacion    = $this->security->xss_clean($this->input->post('anio_reconocimiento'));
                    $organizador    = $this->security->xss_clean($this->input->post('inst_otorga'));
                    $dependencia    = $this->security->xss_clean($this->input->post('dependencia'));
                    $pais           = $this->security->xss_clean($this->input->post('paises_id'));
                    $usuario        = $this->security->xss_clean($this->input->post('usuario_id'));

                    $data = array(
                        'anio_reconocimiento'   => $publicacion,
                        'descripcion'           => $descripcion,
                        'inst_otorga'           => $organizador,
                        'dependencia'           => $dependencia,
                        'paises_id'             => $pais,
                        'usuario_id'            => $usuario,
                        'fecha_captura'         => date('Y-m-d')
                    );
                    $this->session->set_flashdata('success', 'Se ha registrado correctamente el congreso.');
                    $this->Personacyt_model->alta_reconocimientos($data);
                    redirect('personacyt/reconocimientos');
                }
                else
                {
                    $this->session->set_flashdata('error', 'No se ha podido registrar el congreso.');
                    redirect('personacyt/reconocimientos');
                }
            }

    public function idiomas()
    {
        if (!file_exists(APPPATH.'views/pages/personacyt/academica/idiomas.php')) 
        {
            redirect('personacyt');
        }
        $id = $this->session->userdata('id_usuario');
        $data['lenguaje']   = $this->Personacyt_model->lenguaje();
        $data['nivel']      = $this->Personacyt_model->nivel();
        $data['idiomas']    = $this->Personacyt_model->idiomas($id);
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/personacyt/academica/idiomas',$data);
        $this->load->view('theme/footer');
    }

            public function alta_idiomas()
            {
                if($this->input->method() === 'post')
                {
                    $lenguaje           = $this->security->xss_clean($this->input->post('lenguaje_id'));
                    $idioma_nativo      = $this->security->xss_clean($this->input->post('idioma_nativo'));
                    $traductor          = $this->security->xss_clean($this->input->post('traductor'));
                    $profesor           = $this->security->xss_clean($this->input->post('profesor'));
                    $nivel_habla_id     = $this->security->xss_clean($this->input->post('nivel_habla_id'));
                    $nivel_lectura_id   = $this->security->xss_clean($this->input->post('nivel_lectura_id'));
                    $nivel_escritura_id = $this->security->xss_clean($this->input->post('nivel_escritura_id'));
                    $fecha_acreditacion = $this->security->xss_clean($this->input->post('fecha_acreditacion'));
                    $titulo_obtenido    = $this->security->xss_clean($this->input->post('titulo_obtenido'));
                    $puntos_idioma      = $this->security->xss_clean($this->input->post('puntos_idioma'));
                    $usuario            = $this->security->xss_clean($this->input->post('usuario_id'));

                    $data = array(
                        'lenguaje_id'           => $lenguaje,
                        'idioma_nativo'         => $idioma_nativo,
                        'traductor'             => $traductor,
                        'profesor'              => $profesor,
                        'nivel_habla_id'        => $nivel_habla_id,
                        'nivel_lectura_id'      => $nivel_lectura_id,
                        'nivel_escritura_id'    => $nivel_escritura_id,
                        'fecha_acreditacion'    => $fecha_acreditacion,
                        'titulo_obtenido'       => $titulo_obtenido,
                        'puntos_idioma'         => $puntos_idioma,
                        'usuario_id'            => $usuario,
                        'fecha_captura'         => date('Y-m-d')
                    );
                    $this->session->set_flashdata('success', 'Se ha registrado correctamente el Idioma.');
                    $this->Personacyt_model->alta_idiomas($data);
                    redirect('personacyt/idiomas');
                }
                else
                {
                    $this->session->set_flashdata('error', 'No se ha podido registrar el Idioma.');
                    redirect('personacyt/idiomas');
                }
            }


    public function academica()
    {
        if (!file_exists(APPPATH.'views/pages/personacyt/academica/academica.php')) 
        {
            redirect('personacyt');
        }
        $id = $this->session->userdata('id_usuario');
        $data['grados']         = $this->Personacyt_model->academica($id);
        $data['grado']          = $this->Personacyt_model->grado();
        $data['pais']           = $this->Pages_model->paises();
        $data['estados']        = $this->Pages_model->getEstados();
        $data['conocimiento']   = $this->Personacyt_model->conocimiento();
        $data['est_grado']      = $this->Personacyt_model->est_grado();
        $data['sector']         = $this->Personacyt_model->sector();
        $data['dependencia']    = $this->Personacyt_model->dependencias();

        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/personacyt/academica/academica',$data);
        $this->load->view('theme/footer');
    }


        function disciplina($campos_id)
        {
            $sub = $this->Personacyt_model->dis($campos_id);
            if( empty ( $sub ) )
                return '{ "nombre": "No hay Disciplinas disponibles" }';
            $data = array();
            foreach ($sub as $s) {
                $data[] = '{"id_disciplina":' . $s->id_disciplina . ',"nombre":"' . $s->descr_disciplina . '"}';
            }
            echo '[ ' . implode(",",$data) . ']';
            return;
        }

        function subdisciplina($disciplina_id)
        {
            $dis = $this->Personacyt_model->sub($disciplina_id);
            if( empty ( $dis ) )
                return '{ "nombre": "No hay Subdisciplinas disponibles" }';
            $data = array();
            foreach ($dis as $s) {
                $data[] = '{"id_subdisciplinas":' . $s->id_subdisciplinas . ',"nombre":"' . $s->descr_subdisciplinas . '"}';
            }
            echo '[ ' . implode(",",$data) . ']';
            return;
        }

        function departamentos($dependencia_id)
        {
            $dep = $this->Personacyt_model->departamentos($dependencia_id);
            if( empty ( $dep ) )
                return '{ "nombre": "No hay Departamento disponibles" }';
            $data = array();
            foreach ($dep as $s) {
                $data[] = '{"id_departamentos":' . $s->id_departamentos . ',"nombre":"' . $s->descr_departamentos . '"}';
            }
            echo '[ ' . implode(",",$data) . ']';
            return;
        }




            public function alta_academica()
            {
                if($this->input->method() === 'post')
                {
                    $fecha_terminacion  = $this->security->xss_clean($this->input->post('fecha_terminacion'));
                    $grado_id           = $this->security->xss_clean($this->input->post('grado_id'));
                    $completado         = $this->security->xss_clean($this->input->post('completado'));
                    $descr_grado        = $this->security->xss_clean($this->input->post('descr_grado'));
                    $paises_id          = $this->security->xss_clean($this->input->post('paises_id'));
                    $estados_id         = $this->security->xss_clean($this->input->post('estados_id'));
                    $campos_id          = $this->security->xss_clean($this->input->post('campos_id'));
                    $disciplina_id      = $this->security->xss_clean($this->input->post('disciplina_id'));
                    $subdisciplina_id   = $this->security->xss_clean($this->input->post('subdisciplina_id'));
                    $estatus_id         = $this->security->xss_clean($this->input->post('estatus_id'));
                    $num_cedula         = $this->security->xss_clean($this->input->post('num_cedula'));
                    $sector_id          = $this->security->xss_clean($this->input->post('sector_id'));
                    $institucion        = $this->security->xss_clean($this->input->post('institucion'));
                    $dependencia_id     = $this->security->xss_clean($this->input->post('dependencia_id'));
                    $departamento_id    = $this->security->xss_clean($this->input->post('departamento_id'));
                    $descripcion_tesis  = $this->security->xss_clean($this->input->post('descripcion_tesis'));
                    $usuario            = $this->security->xss_clean($this->input->post('usuario_id'));

                    $data = array(
                        'fecha_terminacion'         => $fecha_terminacion,
                        'grado_id'                  => $grado_id,
                        'completado'                => $completado,
                        'descr_grado'               => $descr_grado,
                        'paises_id'                 => $paises_id,
                        'estados_id'                => $estados_id,
                        'campos_id'                 => $campos_id,
                        'disciplina_id'             => $disciplina_id,
                        'subdisciplina_id'          => $subdisciplina_id,
                        'estatus_id'                => $estatus_id,
                        'num_cedula'                => $num_cedula,
                        'sector_id'                 => $sector_id,
                        'institucion'               => $institucion,
                        'dependencia_id'            => $dependencia_id,
                        'departamento_id'           => $departamento_id,
                        'descripcion_tesis'         => $descripcion_tesis,
                        'usuario_id'                => $usuario,
                        'fecha_captura'             => date('Y-m-d')
                    );
                    $this->session->set_flashdata('success', 'Se ha registrado correctamente el Grado Acádemico.');
                    $this->Personacyt_model->alta_academica($data);
                    redirect('personacyt/academica');
                }
                else
                {
                    $this->session->set_flashdata('error', 'No se ha podido registrar el Grado Acádemico.');
                    redirect('personacyt/academica');
                }
            }



    public function investigacion()
    {
        if (!file_exists(APPPATH.'views/pages/personacyt/academica/investigacion.php')) 
        {
            redirect('personacyt');
        }
        $id = $this->session->userdata('id_usuario');
        $data['investigaciones']  = $this->Personacyt_model->investigacion($id);
        $data['empleadora']       = $this->Personacyt_model->empleadoras();
        $data['sector']           = $this->Personacyt_model->sector();
        $data['dependencia']      = $this->Personacyt_model->dependencias();

        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/personacyt/academica/investigacion',$data);
        $this->load->view('theme/footer');
    }

            public function alta_investigacion()
            {
                if($this->input->method() === 'post')
                {
                    $fecha_inicio           = $this->security->xss_clean($this->input->post('fecha_inicio'));
                    $fecha_fin              = $this->security->xss_clean($this->input->post('fecha_fin'));
                    $entidad_empleadora_id  = $this->security->xss_clean($this->input->post('entidad_empleadora_id'));
                    $nombre_ent             = $this->security->xss_clean($this->input->post('nombre_ent'));
                    $descrp_entidad         = $this->security->xss_clean($this->input->post('descrp_entidad'));
                    $sector_estancia_id     = $this->security->xss_clean($this->input->post('sector_estancia_id'));
                    $institucion_empleadora = $this->security->xss_clean($this->input->post('institucion_empleadora'));
                    $dependencia_id         = $this->security->xss_clean($this->input->post('dependencia_id'));
                    $departamento_id        = $this->security->xss_clean($this->input->post('departamento_id'));
                    $descrp_estancia        = $this->security->xss_clean($this->input->post('descrp_estancia'));
                    $usuario                = $this->security->xss_clean($this->input->post('usuario_id'));

                    $data = array(
                        'fecha_inicio'              => $fecha_inicio,
                        'fecha_fin'                 => $fecha_fin,
                        'entidad_empleadora_id'     => $entidad_empleadora_id,
                        'nombre_ent'                => $nombre_ent,
                        'descrp_entidad'            => $descrp_entidad,
                        'sector_estancia_id '       => $sector_estancia_id,
                        'institucion_empleadora '   => $institucion_empleadora,
                        'dependencia_id'            => $dependencia_id,
                        'departamento_id'           => $departamento_id,
                        'descrp_estancia'           => $descrp_estancia,
                        'usuario_id'                => $usuario,
                        'fecha_captura'             => date('Y-m-d')
                    );
                    $this->session->set_flashdata('success', 'Se ha registrado correctamente la Estancia Acádemica.');
                    $this->Personacyt_model->alta_investigacion($data);
                    redirect('personacyt/investigacion');
                }
                else
                {
                    $this->session->set_flashdata('error', 'No se ha podido registrar la Estancia Acádemica.');
                    redirect('personacyt/investigacion');
                }
            }

///////////////////////////////////////////////////////////////////////////
//
// PESTAÑA DE ACTIVIDADES PROFESIONALES
//
///////////////////////////////////////////////////////////////////////////


    public function adscripcion()
    {
        if (!file_exists(APPPATH.'views/pages/personacyt/profesional/adscripcion.php')) 
        {
            redirect('personacyt');
        }
        $id = $this->session->userdata('id_usuario');
        $data['ad']               = $this->Personacyt_model->adscripcion($id);
        $data['empleadora']       = $this->Personacyt_model->empleadoras();
        $data['sector']           = $this->Personacyt_model->sector();
        $data['dependencia']      = $this->Personacyt_model->dependencias();
        $data['pais']             = $this->Pages_model->paises();
        $data['estados']          = $this->Pages_model->getEstados();

        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/personacyt/profesional/adscripcion',$data);
        $this->load->view('theme/footer');
    }


            public function alta_adscripcion()
            {
                if($this->input->method() === 'post')
                {
                    $fecha_inicio           = $this->security->xss_clean($this->input->post('fecha_inicio'));
                    $fecha_final            = $this->security->xss_clean($this->input->post('fecha_final'));
                    $entidad_empleadora_id  = $this->security->xss_clean($this->input->post('entidad_empleadora_id'));
                    $nombre_entidad         = $this->security->xss_clean($this->input->post('nombre_entidad'));
                    $nombre_puesto          = $this->security->xss_clean($this->input->post('nombre_puesto'));
                    $tel_pais               = $this->security->xss_clean($this->input->post('tel_pais'));
                    $tel_laboral            = $this->security->xss_clean($this->input->post('tel_laboral'));
                    $domicilio_laboral      = $this->security->xss_clean($this->input->post('domicilio_laboral'));
                    $paises_id              = $this->security->xss_clean($this->input->post('paises_id'));
                    $estado_id              = $this->security->xss_clean($this->input->post('estado_id'));
                    $municipio_id           = $this->security->xss_clean($this->input->post('municipio_id'));
                    $codigo_postal          = $this->security->xss_clean($this->input->post('codigo_postal'));
                    $sector_estancia_id     = $this->security->xss_clean($this->input->post('sector_estancia_id'));
                    $nombre_institucion     = $this->security->xss_clean($this->input->post('nombre_institucion'));
                    $dependencia_id         = $this->security->xss_clean($this->input->post('dependencia_id'));
                    $departamento_id        = $this->security->xss_clean($this->input->post('departamento_id'));
                    $usuario                = $this->security->xss_clean($this->input->post('usuario_id'));

                    $data = array(
                        'fecha_inicio'              => $fecha_inicio,
                        'fecha_final'               => $fecha_final,
                        'entidad_empleadora_id'     => $entidad_empleadora_id,
                        'nombre_entidad'            => $nombre_entidad,
                        'nombre_puesto'             => $nombre_puesto,
                        'tel_pais'                  => $tel_pais,
                        'tel_laboral'               => $tel_laboral,
                        'domicilio_laboral'         => $domicilio_laboral,
                        'paises_id'                 => $paises_id,
                        'estado_id'                 => $estado_id,
                        'municipio_id'              => $municipio_id,
                        'codigo_postal'             => $codigo_postal,
                        'sector_estancia_id '       => $sector_estancia_id,
                        'nombre_institucion '       => $nombre_institucion,
                        'dependencia_id'            => $dependencia_id,
                        'departamento_id'           => $departamento_id,
                        'usuario_id'                => $usuario,
                        'fecha_captura'             => date('Y-m-d')
                    );
                    $this->session->set_flashdata('success', 'Se ha registrado correctamente la Estancia Acádemica.');
                    $this->Personacyt_model->alta_adscripcion($data);
                    redirect('personacyt/adscripcion');
                }
                else
                {
                    $this->session->set_flashdata('error', 'No se ha podido registrar la Estancia Acádemica.');
                    redirect('personacyt/adscripcion');
                }
            }


    public function desarrollos()
    {
        if (!file_exists(APPPATH.'views/pages/personacyt/profesional/desarrollos.php')) 
        {
            redirect('personacyt');
        }
        $id = $this->session->userdata('id_usuario');
        $data['pais']             = $this->Pages_model->paises();
        $data['estados']          = $this->Pages_model->getEstados();
        $data['tec']              = $this->Personacyt_model->desarrollos($id);
        $data['empleadora']       = $this->Personacyt_model->empleadoras();
        $data['sector']           = $this->Personacyt_model->sector();
        $data['dependencia']      = $this->Personacyt_model->dependencias();
        $data['conocimiento']     = $this->Personacyt_model->conocimiento();
        $data['economico']        = $this->Personacyt_model->economico();
        $data['autor']            = $this->Personacyt_model->autor();


        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/personacyt/profesional/desarrollos',$data);
        $this->load->view('theme/footer');
    }


        function rama($economico_id)
        {
            $eco = $this->Personacyt_model->rama($economico_id);
            if( empty ( $eco ) )
                return '{ "nombre": "No hay Rama disponibles" }';
            $data = array();
            foreach ($eco as $s) {
                $data[] = '{"id_rama":' . $s->id_rama . ',"nombre":"' . $s->descr_rama . '"}';
            }
            echo '[ ' . implode(",",$data) . ']'; 
            return;
        }

        function clases($rama_id)
        {
            $cla = $this->Personacyt_model->clases($rama_id);
            if( empty ( $cla ) )
                return '{ "nombre": "No hay Clases disponibles" }';
            $data = array();
            foreach ($cla as $s) {
                $data[] = '{"id_clase":' . $s->id_clase . ',"nombre":"' . $s->descr_clase . '"}';
            }
            echo '[ ' . implode(",",$data) . ']';
            return;
        }

            public function alta_desarrollos()
            {
                if($this->input->method() === 'post')
                {
                    $ano_publicacion        = $this->security->xss_clean($this->input->post('ano_publicacion'));
                    $tipo_autor_id          = $this->security->xss_clean($this->input->post('tipo_autor_id'));
                    $total_autor            = $this->security->xss_clean($this->input->post('total_autor'));
                    $titulo                 = $this->security->xss_clean($this->input->post('titulo'));
                    $nombre_autor           = $this->security->xss_clean($this->input->post('nombre_autor'));
                    $coautores              = $this->security->xss_clean($this->input->post('coautores'));
                    $descr_general          = $this->security->xss_clean($this->input->post('descr_general'));
                    $sector_id              = $this->security->xss_clean($this->input->post('sector_id'));
                    $dependencia_id         = $this->security->xss_clean($this->input->post('dependencia_id'));
                    $departamento_id        = $this->security->xss_clean($this->input->post('departamento_id'));
                    $paises_id              = $this->security->xss_clean($this->input->post('paises_id'));
                    $nom_institucion        = $this->security->xss_clean($this->input->post('nom_institucion'));
                    $pal_clave              = $this->security->xss_clean($this->input->post('pal_clave'));
                    $descr_larga            = $this->security->xss_clean($this->input->post('descr_larga'));
                    $campos_id              = $this->security->xss_clean($this->input->post('campos_id'));
                    $disciplina_id          = $this->security->xss_clean($this->input->post('disciplina_id'));
                    $subdisciplina_id       = $this->security->xss_clean($this->input->post('subdisciplina_id'));
                    $economico_id           = $this->security->xss_clean($this->input->post('economico_id'));
                    $rama_id                = $this->security->xss_clean($this->input->post('rama_id'));
                    $clase_id               = $this->security->xss_clean($this->input->post('clase_id'));
                    $usuario                = $this->security->xss_clean($this->input->post('usuario_id'));

                    $data = array(
                        'ano_publicacion'           => $ano_publicacion,
                        'tipo_autor_id'             => $tipo_autor_id,
                        'total_autor'               => $total_autor,
                        'titulo'                    => $titulo,
                        'nombre_autor'              => $nombre_autor,
                        'coautores'                 => $coautores,
                        'descr_general'             => $descr_general,
                        'sector_id'                 => $sector_id,
                        'dependencia_id'            => $dependencia_id,
                        'departamento_id'           => $departamento_id,
                        'paises_id'                 => $paises_id,
                        'nom_institucion'           => $nom_institucion,
                        'pal_clave'                 => $pal_clave,
                        'descr_larga'               => $descr_larga,
                        'campos_id '                => $campos_id,
                        'disciplina_id '            => $disciplina_id,
                        'subdisciplina_id '         => $subdisciplina_id,
                        'economico_id '             => $economico_id,
                        'rama_id '                  => $rama_id,
                        'clase_id '                 => $clase_id,
                        'usuario_id'                => $usuario,
                        'fecha_captura'             => date('Y-m-d')
                    );
                    $this->session->set_flashdata('success', 'Se ha registrado correctamente el Desarrollo Tecnológico.');
                    $this->Personacyt_model->alta_desarrollos($data);
                    redirect('personacyt/desarrollos');
                }
                else
                {
                    $this->session->set_flashdata('error', 'No se ha podido registrar el Desarrollo Tecnológico.');
                    redirect('personacyt/desarrollos');
                }
            }

    public function difusion()
    {
        if (!file_exists(APPPATH.'views/pages/personacyt/profesional/difusion.php')) 
        {
            redirect('personacyt');
        }
        $id = $this->session->userdata('id_usuario');
        $data['difusion']       = $this->Personacyt_model->difusion($id);
        $data['dirigido']       = $this->Personacyt_model->sector_dir();
        $data['participacion']  = $this->Personacyt_model->tipo_part();
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/personacyt/profesional/difusion',$data);
        $this->load->view('theme/footer');
    }

            public function alta_difusion()
            {
                if($this->input->method() === 'post')
                {
                    $titulo_difusion    = $this->security->xss_clean($this->input->post('titulo_difusion'));
                    $fecha_inicio       = $this->security->xss_clean($this->input->post('fecha_inicio'));
                    $dirigido_id        = $this->security->xss_clean($this->input->post('dirigido_id'));
                    $participacion_id   = $this->security->xss_clean($this->input->post('participacion_id'));
                    $dependencia        = $this->security->xss_clean($this->input->post('dependencia'));
                    $facilitadora       = $this->security->xss_clean($this->input->post('facilitadora'));
                    $colaboradores      = $this->security->xss_clean($this->input->post('colaboradores'));
                    $beneficiario       = $this->security->xss_clean($this->input->post('beneficiario'));
                    $duracion_act       = $this->security->xss_clean($this->input->post('duracion_act'));
                    $extranjero         = $this->security->xss_clean($this->input->post('extranjero'));
                    $pal_clave01        = $this->security->xss_clean($this->input->post('pal_clave01'));
                    $pal_clave02        = $this->security->xss_clean($this->input->post('pal_clave02'));
                    $pal_clave03        = $this->security->xss_clean($this->input->post('pal_clave03'));
                    $descripcion_larga  = $this->security->xss_clean($this->input->post('descripcion_larga'));
                    $material           = $this->security->xss_clean($this->input->post('material'));
                    $usuario            = $this->security->xss_clean($this->input->post('usuario_id'));

                    $data = array(
                        'titulo_difusion'          => $titulo_difusion,
                        'fecha_inicio'             => $fecha_inicio,
                        'dirigido_id'              => $dirigido_id,
                        'participacion_id'         => $participacion_id,
                        'dependencia'              => $dependencia,
                        'facilitadora'             => $facilitadora,
                        'colaboradores'            => $colaboradores,
                        'beneficiario'             => $beneficiario,
                        'duracion_act'             => $duracion_act,
                        'extranjero'               => $extranjero,
                        'pal_clave01'              => $pal_clave01,
                        'pal_clave02'              => $pal_clave02,
                        'pal_clave03'              => $pal_clave03,
                        'descripcion_larga'        => $descripcion_larga,
                        'material'                 => $material,
                        'usuario_id'               => $usuario,
                        'fecha_captura'            => date('Y-m-d')
                    );
                    $this->session->set_flashdata('success', 'Se ha registrado correctamente el Proyecto de Difusión y Divulgación.');
                    $this->Personacyt_model->alta_difusion($data);
                    redirect('personacyt/difusion');
                }
                else
                {
                    $this->session->set_flashdata('error', 'No se ha podido registrar el Proyecto de Difusión y Divulgación.');
                    redirect('personacyt/difusion');
                }
            }

    public function experiencia()
    {
        if (!file_exists(APPPATH.'views/pages/personacyt/profesional/experiencia.php')) 
        {
            redirect('personacyt');
        }
        $id = $this->session->userdata('id_usuario');
        $data['experiencia']    = $this->Personacyt_model->experiencia($id);
        $data['pais']           = $this->Pages_model->paises();
        $data['dirigido']       = $this->Personacyt_model->sector_dir();
        $data['conocimiento']   = $this->Personacyt_model->conocimiento();
        $data['sector']         = $this->Personacyt_model->sector();
        $data['dependencia']    = $this->Personacyt_model->dependencias();
        $data['economico']      = $this->Personacyt_model->economico();
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/personacyt/profesional/experiencia',$data);
        $this->load->view('theme/footer');
    }

           public function alta_experiencia()
            {
                if($this->input->method() === 'post')
                {
                    $fecha_inicio       = $this->security->xss_clean($this->input->post('fecha_inicio'));
                    $fecha_final        = $this->security->xss_clean($this->input->post('fecha_final'));
                    $paises_id          = $this->security->xss_clean($this->input->post('paises_id'));
                    $entidad_id         = $this->security->xss_clean($this->input->post('entidad_id'));
                    $nombre_entidad     = $this->security->xss_clean($this->input->post('nombre_entidad'));
                    $nom_puesto         = $this->security->xss_clean($this->input->post('nom_puesto'));
                    $empleador          = $this->security->xss_clean($this->input->post('empleador'));
                    $campos_id          = $this->security->xss_clean($this->input->post('campos_id'));
                    $disciplina_id      = $this->security->xss_clean($this->input->post('disciplina_id'));
                    $subdisciplina_id   = $this->security->xss_clean($this->input->post('subdisciplina_id'));
                    $sectores_id        = $this->security->xss_clean($this->input->post('sectores_id'));
                    $institucion_resp   = $this->security->xss_clean($this->input->post('institucion_resp'));
                    $dependencia_id     = $this->security->xss_clean($this->input->post('dependencia_id'));
                    $departamento_id    = $this->security->xss_clean($this->input->post('departamento_id'));
                    $economico_id       = $this->security->xss_clean($this->input->post('economico_id'));
                    $rama_id            = $this->security->xss_clean($this->input->post('rama_id'));
                    $clase_id           = $this->security->xss_clean($this->input->post('clase_id'));
                    $descr_experiencia  = $this->security->xss_clean($this->input->post('descr_experiencia'));
                    $pal_clave01        = $this->security->xss_clean($this->input->post('pal_clave01'));
                    $pal_clave02        = $this->security->xss_clean($this->input->post('pal_clave02'));
                    $pal_clave03        = $this->security->xss_clean($this->input->post('pal_clave03'));
                    $usuario            = $this->security->xss_clean($this->input->post('usuario_id'));

                    $data = array(
                        'fecha_inicio'             => $fecha_inicio,
                        'fecha_final'              => $fecha_final,
                        'paises_id'                => $paises_id,
                        'entidad_id'               => $entidad_id,
                        'nombre_entidad'           => $nombre_entidad,
                        'nom_puesto'               => $nom_puesto,
                        'empleador'                => $empleador,
                        'campos_id'                => $campos_id,
                        'disciplina_id'            => $disciplina_id,
                        'subdisciplina_id'         => $subdisciplina_id,
                        'sectores_id'              => $sectores_id,
                        'institucion_resp'         => $institucion_resp,
                        'dependencia_id'           => $dependencia_id,
                        'departamento_id'          => $departamento_id,
                        'economico_id'             => $economico_id,
                        'rama_id'                  => $rama_id,
                        'clase_id'                 => $clase_id,
                        'descr_experiencia'        => $descr_experiencia,
                        'pal_clave01'              => $pal_clave01,
                        'pal_clave02'              => $pal_clave02,
                        'pal_clave03'              => $pal_clave03,
                        'sectores_id'              => $sectores_id,
                        'usuario_id'               => $usuario,
                        'fecha_captura'            => date('Y-m-d')
                    );
                    $this->session->set_flashdata('success', 'Se ha registrado correctamente la Docencia');
                    $this->Personacyt_model->alta_experiencia($data);
                    redirect('personacyt/experiencia');
                }
                else
                {
                    $this->session->set_flashdata('error', 'No se ha podido registrar la Experiencia Profesional');
                    redirect('personacyt/experiencia');
                }
            }


    public function docencia()
    {
        if (!file_exists(APPPATH.'views/pages/personacyt/profesional/docencia.php')) 
        {
            redirect('personacyt');
        }
        $id = $this->session->userdata('id_usuario');
        $data['docencia']       = $this->Personacyt_model->docencia($id);
        $data['pais']           = $this->Pages_model->paises();
        $data['dirigido']       = $this->Personacyt_model->sector_dir();
        $data['empleadora']     = $this->Personacyt_model->empleadoras();
        $data['conocimiento']   = $this->Personacyt_model->conocimiento();
        $data['sector']         = $this->Personacyt_model->sector();
        $data['dependencia']    = $this->Personacyt_model->dependencias();
        $data['grado']          = $this->Personacyt_model->grado();
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/personacyt/profesional/docencia',$data);
        $this->load->view('theme/footer');
    }



           public function alta_docencia()
            {
                if($this->input->method() === 'post')
                {
                    $fecha_inicio           = $this->security->xss_clean($this->input->post('fecha_inicio'));
                    $fecha_final            = $this->security->xss_clean($this->input->post('fecha_final'));
                    $entidad_empleadora_id  = $this->security->xss_clean($this->input->post('entidad_empleadora_id'));
                    $sectores_id            = $this->security->xss_clean($this->input->post('sectores_id'));
                    $institucion_resp       = $this->security->xss_clean($this->input->post('institucion_resp'));
                    $dependencia_id         = $this->security->xss_clean($this->input->post('dependencia_id'));
                    $departamento_id        = $this->security->xss_clean($this->input->post('departamento_id'));
                    $descr_larga            = $this->security->xss_clean($this->input->post('descr_larga'));
                    $grado_id               = $this->security->xss_clean($this->input->post('grado_id'));
                    $paises_id              = $this->security->xss_clean($this->input->post('paises_id'));
                    $programa_aca           = $this->security->xss_clean($this->input->post('programa_aca'));
                    $asignatura             = $this->security->xss_clean($this->input->post('asignatura'));
                    $campos_id              = $this->security->xss_clean($this->input->post('campos_id'));
                    $disciplina_id          = $this->security->xss_clean($this->input->post('disciplina_id'));
                    $subdisciplina_id       = $this->security->xss_clean($this->input->post('subdisciplina_id'));
                    $usuario                = $this->security->xss_clean($this->input->post('usuario_id'));

                    $data = array(
                        'fecha_inicio'             => $fecha_inicio,
                        'fecha_final'              => $fecha_final,
                        'entidad_empleadora_id'    => $entidad_empleadora_id,
                        'sectores_id'              => $sectores_id,
                        'institucion_resp'         => $institucion_resp,
                        'dependencia_id'           => $dependencia_id,
                        'departamento_id'          => $departamento_id,
                        'descr_larga'              => $descr_larga,
                        'grado_id'                 => $grado_id,
                        'paises_id'                => $paises_id,
                        'programa_aca'             => $programa_aca,
                        'asignatura'               => $asignatura,
                        'campos_id'                => $campos_id,
                        'disciplina_id'            => $disciplina_id,
                        'subdisciplina_id'         => $subdisciplina_id,
                        'usuario_id'               => $usuario,
                        'fecha_captura'            => date('Y-m-d')
                    );
                    $this->session->set_flashdata('success', 'Se ha registrado correctamente la Docencia');
                    $this->Personacyt_model->alta_docencia($data);
                    redirect('personacyt/docencia');
                }
                else
                {
                    $this->session->set_flashdata('error', 'No se ha podido registrar la Docencia');
                    redirect('personacyt/docencia');
                }
            }


    public function tesis()
    {
        if (!file_exists(APPPATH.'views/pages/personacyt/profesional/tesis.php')) 
        {
            redirect('personacyt');
        }
        $id = $this->session->userdata('id_usuario');
        $data['tesis']          = $this->Personacyt_model->tesis($id);
        $data['pais']           = $this->Pages_model->paises();
        $data['dirigido']       = $this->Personacyt_model->sector_dir();
        $data['empleadora']     = $this->Personacyt_model->empleadoras();
        $data['conocimiento']   = $this->Personacyt_model->conocimiento();
        $data['sector']         = $this->Personacyt_model->sector();
        $data['dependencia']    = $this->Personacyt_model->dependencias();
        $data['grado']          = $this->Personacyt_model->grado();
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/personacyt/profesional/tesis',$data);
        $this->load->view('theme/footer');
    }



           public function alta_tesis()
            {
                if($this->input->method() === 'post')
                {
                    $fecha_inicio           = $this->security->xss_clean($this->input->post('fecha_inicio'));
                    $fecha_final            = $this->security->xss_clean($this->input->post('fecha_final'));
                    $conclusion             = $this->security->xss_clean($this->input->post('conclusion'));
                    $titulo_tesis           = $this->security->xss_clean($this->input->post('titulo_tesis'));
                    $autor                  = $this->security->xss_clean($this->input->post('autor'));
                    $grado_id               = $this->security->xss_clean($this->input->post('grado_id'));
                    $paises_id              = $this->security->xss_clean($this->input->post('paises_id'));
                    $entidad_empleadora_id  = $this->security->xss_clean($this->input->post('entidad_empleadora_id'));
                    $sectores_id            = $this->security->xss_clean($this->input->post('sectores_id'));
                    $institucion_resp       = $this->security->xss_clean($this->input->post('institucion_resp'));
                    $departamento_id        = $this->security->xss_clean($this->input->post('departamento_id'));
                    $campos_id              = $this->security->xss_clean($this->input->post('campos_id'));
                    $disciplina_id          = $this->security->xss_clean($this->input->post('disciplina_id'));
                    $subdisciplina_id       = $this->security->xss_clean($this->input->post('subdisciplina_id'));
                    $usuario                = $this->security->xss_clean($this->input->post('usuario_id'));

                    $data = array(
                        'fecha_inicio'          => $fecha_inicio,
                        'fecha_final'           => $fecha_final,
                        'conclusion'            => $conclusion,
                        'titulo_tesis'          => $titulo_tesis,
                        'autor'                 => $autor,
                        'sectores_id'           => $sectores_id,
                        'institucion_resp'      => $institucion_resp,
                        'entidad_empleadora_id' => $entidad_empleadora_id,
                        'grado_id'              => $grado_id,
                        'paises_id'             => $paises_id,
                        'departamento_id'       => $departamento_id,
                        'campos_id'             => $campos_id,
                        'disciplina_id'         => $disciplina_id,
                        'subdisciplina_id'      => $subdisciplina_id,
                        'usuario_id'            => $usuario,
                        'fecha_captura'         => date('Y-m-d')
                    );
                    $this->session->set_flashdata('success', 'Se ha registrado correctamente la Tesís');
                    $this->Personacyt_model->alta_tesis($data);
                    redirect('personacyt/tesis');
                }
                else
                {
                    $this->session->set_flashdata('error', 'No se ha podido registrar la Tesís');
                    redirect('personacyt/tesis');
                }
            }

///////////////////////////////////////////////////////////////////////////
//
// PESTAÑA DE PUBLICACIONES
//
///////////////////////////////////////////////////////////////////////////


/////////////////////// CAPITULO DE LIBRO /////////////////////////////////

    public function capitulo()
    {
        if (!file_exists(APPPATH.'views/pages/personacyt/publicaciones/capitulo.php')) 
        {
            redirect('personacyt');
        }
        $id = $this->session->userdata('id_usuario');
        $data['capitulos']      = $this->Personacyt_model->capitulos($id);
        $data['autor']          = $this->Personacyt_model->autor();
        $data['pais']           = $this->Pages_model->paises();
        $data['conocimiento']   = $this->Personacyt_model->conocimiento();
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/personacyt/publicaciones/capitulo',$data);
        $this->load->view('theme/footer');
    }

           public function alta_capitulo()
            {
                if($this->input->method() === 'post')
                {
                    $fecha_pub         = $this->security->xss_clean($this->input->post('fecha_pub'));
                    $titulo            = $this->security->xss_clean($this->input->post('titulo'));
                    $descr_mezclada    = $this->security->xss_clean($this->input->post('descr_mezclada'));
                    $tipo_autor_id     = $this->security->xss_clean($this->input->post('tipo_autor_id'));
                    $autor             = $this->security->xss_clean($this->input->post('autor'));
                    $paises_id         = $this->security->xss_clean($this->input->post('paises_id'));
                    $total_autor       = $this->security->xss_clean($this->input->post('total_autor'));
                    $num_pag           = $this->security->xss_clean($this->input->post('num_pag'));
                    $num_volumen       = $this->security->xss_clean($this->input->post('num_volumen'));
                    $editores          = $this->security->xss_clean($this->input->post('editores'));
                    $editorial         = $this->security->xss_clean($this->input->post('editorial'));
                    $campos_id         = $this->security->xss_clean($this->input->post('campos_id'));
                    $disciplina_id     = $this->security->xss_clean($this->input->post('disciplina_id'));
                    $subdisciplina_id  = $this->security->xss_clean($this->input->post('subdisciplina_id'));
                    $descr_larga       = $this->security->xss_clean($this->input->post('descr_larga'));
                    $pal_clave01       = $this->security->xss_clean($this->input->post('pal_clave01'));
                    $pal_clave02       = $this->security->xss_clean($this->input->post('pal_clave02'));
                    $usuario           = $this->security->xss_clean($this->input->post('usuario_id'));


                    $data = array(
                        'fecha_pub'          => $fecha_pub,
                        'titulo'             => $titulo,
                        'descr_mezclada'     => $descr_mezclada,
                        'tipo_autor_id'      => $tipo_autor_id,
                        'autor'              => $autor,
                        'paises_id'          => $paises_id,
                        'total_autor'        => $total_autor,
                        'num_pag'            => $num_pag,
                        'num_volumen'        => $num_volumen,
                        'editores'           => $editores,
                        'editorial'          => $editorial,
                        'campos_id'          => $campos_id,
                        'disciplina_id'      => $disciplina_id,
                        'subdisciplina_id'   => $subdisciplina_id,
                        'descr_larga'        => $descr_larga,
                        'pal_clave01'        => $pal_clave01,
                        'pal_clave02'        => $pal_clave02,
                        'usuario_id'         => $usuario,
                        'fecha_captura'      => date('Y-m-d')
                    );
                    $this->session->set_flashdata('success', 'Se ha registrado correctamente el Capítulo del Libro');
                    $this->Personacyt_model->alta_capitulo($data);
                    redirect('personacyt/capitulo');
                }
                else
                {
                    $this->session->set_flashdata('error', 'No se ha podido registrar el Capítulo del Libro');
                    redirect('personacyt/capitulo');
                }
            }


/////////////////////// PUBLICACIONES DE ARTÍCULOS /////////////////////////////////

    public function articulos()
    {
        if (!file_exists(APPPATH.'views/pages/personacyt/publicaciones/articulos.php')) 
        {
            redirect('personacyt');
        }
        $id = $this->session->userdata('id_usuario');
        $data['articulos']      = $this->Personacyt_model->articulos($id);
        $data['autor']          = $this->Personacyt_model->autor();
        $data['estatus']        = $this->Personacyt_model->estatus_articulo();
        $data['pais']           = $this->Pages_model->paises();
        $data['conocimiento']   = $this->Personacyt_model->conocimiento();
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/personacyt/publicaciones/articulos',$data);
        $this->load->view('theme/footer');
    }


           public function alta_articulos()
            {
                if($this->input->method() === 'post')
                {
                    $fecha_pub              = $this->security->xss_clean($this->input->post('fecha_pub'));
                    $titulo_articulo        = $this->security->xss_clean($this->input->post('titulo_articulo'));
                    $tipo_autor_id          = $this->security->xss_clean($this->input->post('tipo_autor_id'));
                    $autor                  = $this->security->xss_clean($this->input->post('autor'));
                    $estatus_articulo_id    = $this->security->xss_clean($this->input->post('estatus_articulo_id'));
                    $paises_id              = $this->security->xss_clean($this->input->post('paises_id'));
                    $total_autor            = $this->security->xss_clean($this->input->post('total_autor'));
                    $num_volumen            = $this->security->xss_clean($this->input->post('num_volumen'));
                    $coautor                = $this->security->xss_clean($this->input->post('coautor'));
                    $rev_publicacion        = $this->security->xss_clean($this->input->post('rev_publicacion'));
                    $campos_id              = $this->security->xss_clean($this->input->post('campos_id'));
                    $disciplina_id          = $this->security->xss_clean($this->input->post('disciplina_id'));
                    $subdisciplina_id       = $this->security->xss_clean($this->input->post('subdisciplina_id'));
                    $descr_larga            = $this->security->xss_clean($this->input->post('descr_larga'));
                    $usuario                = $this->security->xss_clean($this->input->post('usuario_id'));


                    $data = array(
                        'fecha_pub'             => $fecha_pub,
                        'titulo_articulo'       => $titulo_articulo,
                        'tipo_autor_id'         => $tipo_autor_id,
                        'autor'                 => $autor,
                        'estatus_articulo_id'   => $estatus_articulo_id,
                        'paises_id'             => $paises_id,
                        'total_autor'           => $total_autor,
                        'num_volumen'           => $num_volumen,
                        'coautor'               => $coautor,
                        'rev_publicacion'       => $rev_publicacion,
                        'campos_id'             => $campos_id,
                        'disciplina_id'         => $disciplina_id,
                        'subdisciplina_id'      => $subdisciplina_id,
                        'descr_larga'           => $descr_larga,
                        'usuario_id'            => $usuario,
                        'fecha_captura'         => date('Y-m-d')
                    );
                    $this->session->set_flashdata('success', 'Se ha registrado correctamente la Publicación de Artículo');
                    $this->Personacyt_model->alta_articulos($data);
                    redirect('personacyt/articulos');
                }
                else
                {
                    $this->session->set_flashdata('error', 'No se ha podido registrar la Publicación de Artículo');
                    redirect('personacyt/articulos');
                }
            }

/////////////////////// PUBLICACIONES DE ARTÍCULOS /////////////////////////////////

    public function libro()
    {
        if (!file_exists(APPPATH.'views/pages/personacyt/publicaciones/libro.php')) 
        {
            redirect('personacyt');
        }
        $id = $this->session->userdata('id_usuario');
        $data['libro']          = $this->Personacyt_model->libros($id);
        $data['autor']          = $this->Personacyt_model->autor();
        $data['librox']         = $this->Personacyt_model->librox();
        $data['lenguaje']       = $this->Personacyt_model->lenguaje();
        $data['pais']           = $this->Pages_model->paises();
        $data['conocimiento']   = $this->Personacyt_model->conocimiento();
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/personacyt/publicaciones/libro',$data);
        $this->load->view('theme/footer');
    }


           public function alta_libros()
            {
                if($this->input->method() === 'post')
                {
                    $fecha_pub              = $this->security->xss_clean($this->input->post('fecha_pub'));
                    $tipo_libro_id          = $this->security->xss_clean($this->input->post('tipo_libro_id'));
                    $tipo_autor_id          = $this->security->xss_clean($this->input->post('tipo_autor_id'));
                    $isbn                   = $this->security->xss_clean($this->input->post('isbn'));
                    $titulo_libro           = $this->security->xss_clean($this->input->post('titulo_libro'));
                    $total_autor            = $this->security->xss_clean($this->input->post('total_autor'));
                    $autor                  = $this->security->xss_clean($this->input->post('autor'));
                    $titulo_libro           = $this->security->xss_clean($this->input->post('titulo_libro'));
                    $paises_id              = $this->security->xss_clean($this->input->post('paises_id'));
                    $num_pag                = $this->security->xss_clean($this->input->post('num_pag'));
                    $num_volumen            = $this->security->xss_clean($this->input->post('num_volumen'));
                    $lenguaje_id            = $this->security->xss_clean($this->input->post('lenguaje_id'));
                    $editores               = $this->security->xss_clean($this->input->post('editores'));
                    $editorial              = $this->security->xss_clean($this->input->post('editorial'));
                    $campos_id              = $this->security->xss_clean($this->input->post('campos_id'));
                    $disciplina_id          = $this->security->xss_clean($this->input->post('disciplina_id'));
                    $subdisciplina_id       = $this->security->xss_clean($this->input->post('subdisciplina_id'));
                    $descr_larga            = $this->security->xss_clean($this->input->post('descr_larga'));
                    $usuario                = $this->security->xss_clean($this->input->post('usuario_id'));


                    $data = array(
                        'fecha_pub'             => $fecha_pub,
                        'tipo_libro_id'         => $tipo_libro_id,
                        'tipo_autor_id'         => $tipo_autor_id,
                        'isbn'                  => $isbn,
                        'titulo_libro'          => $titulo_libro,
                        'total_autor'           => $total_autor,
                        'autor'                 => $autor,
                        'titulo_libro'          => $titulo_libro,
                        'paises_id'             => $paises_id,
                        'num_pag'               => $num_pag,
                        'num_volumen'           => $num_volumen,
                        'lenguaje_id'           => $lenguaje_id,
                        'editores'              => $editores,
                        'editorial'             => $editorial,
                        'campos_id'             => $campos_id,
                        'disciplina_id'         => $disciplina_id,
                        'subdisciplina_id'      => $subdisciplina_id,
                        'descr_larga'           => $descr_larga,
                        'usuario_id'            => $usuario,
                        'fecha_captura'         => date('Y-m-d')
                    );
                    $this->session->set_flashdata('success', 'Se ha registrado correctamente la Publicación de Libro');
                    $this->Personacyt_model->alta_libros($data);
                    redirect('personacyt/libro');
                }
                else
                {
                    $this->session->set_flashdata('error', 'No se ha podido registrar la Publicación de Libro');
                    redirect('personacyt/libro');
                }
            }


/////////////////////// PUBLICACIONES DE REPORTE TECNICO /////////////////////////////////

    public function reporte()
    {
        if (!file_exists(APPPATH.'views/pages/personacyt/publicaciones/libro.php')) 
        {
            redirect('personacyt');
        }
        $id = $this->session->userdata('id_usuario');
        $data['reporte']        = $this->Personacyt_model->reportes($id);
        $data['autor']          = $this->Personacyt_model->autor();
        $data['librox']         = $this->Personacyt_model->librox();
        $data['lenguaje']       = $this->Personacyt_model->lenguaje();
        $data['pais']           = $this->Pages_model->paises();
        $data['conocimiento']   = $this->Personacyt_model->conocimiento();
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/personacyt/publicaciones/reporte',$data);
        $this->load->view('theme/footer');
    }

           public function alta_reportes()
            {
                if($this->input->method() === 'post')
                {
                    $titulo_reporte     = $this->security->xss_clean($this->input->post('titulo_reporte'));
                    $nombre_entidad     = $this->security->xss_clean($this->input->post('nombre_entidad'));
                    $descr_general      = $this->security->xss_clean($this->input->post('descr_general'));
                    $tipo_autor_id      = $this->security->xss_clean($this->input->post('tipo_autor_id'));
                    $fecha_reporte      = $this->security->xss_clean($this->input->post('fecha_reporte'));
                    $num_pag            = $this->security->xss_clean($this->input->post('num_pag'));
                    $total_autores      = $this->security->xss_clean($this->input->post('total_autores'));
                    $autor              = $this->security->xss_clean($this->input->post('autor'));
                    $descipcion_larga   = $this->security->xss_clean($this->input->post('descipcion_larga'));
                    $usuario            = $this->security->xss_clean($this->input->post('usuario_id'));


                    $data = array(
                        'titulo_reporte'    => $titulo_reporte,
                        'nombre_entidad'    => $nombre_entidad,
                        'descr_general'     => $descr_general,
                        'tipo_autor_id'     => $tipo_autor_id,
                        'fecha_reporte'     => $fecha_reporte,
                        'num_pag'           => $num_pag,
                        'total_autores'     => $total_autores,
                        'autor'             => $autor,
                        'descipcion_larga'  => $descipcion_larga,
                        'usuario_id'        => $usuario,
                        'fecha_captura'     => date('Y-m-d')
                    );
                    $this->session->set_flashdata('success', 'Se ha registrado correctamente el Reporte Técnico');
                    $this->Personacyt_model->alta_reportes($data);
                    redirect('personacyt/reporte');
                }
                else
                {
                    $this->session->set_flashdata('error', 'No se ha podido registrar el Reporte Técnico');
                    redirect('personacyt/reporte');
                }
            }


/////////////////////// PUBLICACIONES DE REPORTE TECNICO /////////////////////////////////

    public function resena()
    {
        if (!file_exists(APPPATH.'views/pages/personacyt/publicaciones/resena.php')) 
        {
            redirect('personacyt');
        }
        $id = $this->session->userdata('id_usuario');
        $data['resena']         = $this->Personacyt_model->resenas($id);
        $data['autor']          = $this->Personacyt_model->autor();
        $data['publicacion']    = $this->Personacyt_model->tipo_publicacion();
        $data['pais']           = $this->Pages_model->paises();
        $data['conocimiento']   = $this->Personacyt_model->conocimiento();
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/personacyt/publicaciones/resena',$data);
        $this->load->view('theme/footer');
    }


           public function alta_resenas()
            {
                if($this->input->method() === 'post')
                {
                    $titulo                 = $this->security->xss_clean($this->input->post('titulo'));
                    $autor                  = $this->security->xss_clean($this->input->post('autor'));
                    $tipo_autor_id          = $this->security->xss_clean($this->input->post('tipo_autor_id'));
                    $fecha_pub              = $this->security->xss_clean($this->input->post('fecha_pub'));
                    $tipo_publicacion_id    = $this->security->xss_clean($this->input->post('tipo_publicacion_id'));
                    $total_autores          = $this->security->xss_clean($this->input->post('total_autores'));
                    $comentarios            = $this->security->xss_clean($this->input->post('comentarios'));
                    $paises_id              = $this->security->xss_clean($this->input->post('paises_id'));
                    $pag_inicio             = $this->security->xss_clean($this->input->post('pag_inicio'));
                    $pag_final              = $this->security->xss_clean($this->input->post('pag_final'));
                    $campos_id              = $this->security->xss_clean($this->input->post('campos_id'));
                    $disciplina_id          = $this->security->xss_clean($this->input->post('disciplina_id'));
                    $subdisciplina_id       = $this->security->xss_clean($this->input->post('subdisciplina_id'));
                    $descripcion_larga      = $this->security->xss_clean($this->input->post('descripcion_larga'));
                    $usuario                = $this->security->xss_clean($this->input->post('usuario_id'));


                    $data = array(
                        'titulo'                => $titulo,
                        'autor'                 => $autor,
                        'tipo_autor_id'         => $tipo_autor_id,
                        'fecha_pub'             => $fecha_pub,
                        'tipo_publicacion_id'   => $tipo_publicacion_id,
                        'total_autores'         => $total_autores,
                        'comentarios'           => $comentarios,
                        'paises_id'             => $paises_id,
                        'pag_inicio'            => $pag_inicio,
                        'pag_final'             => $pag_final,
                        'campos_id'             => $campos_id,
                        'disciplina_id'         => $disciplina_id,
                        'subdisciplina_id'      => $subdisciplina_id,
                        'descripcion_larga'     => $descripcion_larga,
                        'usuario_id'            => $usuario,
                        'fecha_captura'         => date('Y-m-d')
                    );
                    $this->session->set_flashdata('success', 'Se ha registrado correctamente la Reseña');
                    $this->Personacyt_model->alta_resenas($data);
                    redirect('personacyt/resena');
                }
                else
                {
                    $this->session->set_flashdata('error', 'No se ha podido registrar la Reseña');
                    redirect('personacyt/resena');
                }
            }

///////////////////////////////////////////////////////////////////////////
//
// PESTAÑA DE INVESTIGACIÓN
//
///////////////////////////////////////////////////////////////////////////


/////////////////////// FINANCIAMIENTO /////////////////////////////////

    public function financiamiento()
    {
        if (!file_exists(APPPATH.'views/pages/personacyt/investigacion/financiamiento.php')) 
        {
            redirect('personacyt');
        }
        $id = $this->session->userdata('id_usuario');
        $data['financiamiento']     = $this->Personacyt_model->financiamientos($id);
        $data['apoyo']              = $this->Personacyt_model->tipo_apoyo();
        $data['programa']           = $this->Personacyt_model->tipo_programa();
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/personacyt/investigacion/financiamiento',$data);
        $this->load->view('theme/footer');
    }

           public function alta_financiamiento()
            {
                if($this->input->method() === 'post')
                {
                    $tipo_apoyo_id      = $this->security->xss_clean($this->input->post('tipo_apoyo_id'));
                    $tipo_programa_id   = $this->security->xss_clean($this->input->post('tipo_programa_id'));
                    $fecha_inicio       = $this->security->xss_clean($this->input->post('fecha_inicio'));
                    $fecha_final        = $this->security->xss_clean($this->input->post('fecha_final'));
                    $palabra_clave_1        = $this->security->xss_clean($this->input->post('palabra_clave_1'));
                    $palabra_clave_2        = $this->security->xss_clean($this->input->post('palabra_clave_2'));
                    $palabra_clave_3        = $this->security->xss_clean($this->input->post('palabra_clave_3'));
                    $usuario            = $this->security->xss_clean($this->input->post('usuario_id'));


                    $data = array(
                        'tipo_apoyo_id'      => $tipo_apoyo_id,
                        'tipo_programa_id'   => $tipo_programa_id,
                        'fecha_inicio'       => $fecha_inicio,
                        'fecha_final'        => $fecha_final,
                        'palabra_clave_1'    => $palabra_clave_1,
                        'palabra_clave_2'    => $palabra_clave_2,
                        'palabra_clave_3'    => $palabra_clave_3,
                        'usuario_id'         => $usuario,
                        'fecha_captura'      => date('Y-m-d')
                    );
                    $this->session->set_flashdata('success', 'Se ha registrado correctamente el Financiamiento');
                    $this->Personacyt_model->alta_financiamiento($data);
                    redirect('personacyt/financiamiento');
                }
                else
                {
                    $this->session->set_flashdata('error', 'No se ha podido registrar el Financiamiento');
                    redirect('personacyt/financiamiento');
                }
            }

/////////////////////// GRUPOS /////////////////////////////////

    public function grupos()
    {
        if (!file_exists(APPPATH.'views/pages/personacyt/investigacion/grupos.php')) 
        {
            redirect('personacyt');
        }
        $id = $this->session->userdata('id_usuario');
        $data['grupos']         = $this->Personacyt_model->grupos($id);
        $data['conocimiento']   = $this->Personacyt_model->conocimiento();
        $data['sector']         = $this->Personacyt_model->sector();
        $data['dependencia']    = $this->Personacyt_model->dependencias();


        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/personacyt/investigacion/grupos',$data);
        $this->load->view('theme/footer');
    }

           public function alta_grupos()
            {
                if($this->input->method() === 'post')
                {
                    $nombre_grupo       = $this->security->xss_clean($this->input->post('nombre_grupo'));
                    $es_lider           = $this->security->xss_clean($this->input->post('es_lider'));
                    $nombre_lider       = $this->security->xss_clean($this->input->post('nombre_lider'));
                    $sectores_id        = $this->security->xss_clean($this->input->post('sectores_id'));
                    $institucion_resp   = $this->security->xss_clean($this->input->post('institucion_resp'));
                    $dependencia_id     = $this->security->xss_clean($this->input->post('dependencia_id'));
                    $departamento_id    = $this->security->xss_clean($this->input->post('departamento_id'));
                    $descr_grupo        = $this->security->xss_clean($this->input->post('descr_grupo'));
                    $logros             = $this->security->xss_clean($this->input->post('logros'));
                    $actividades        = $this->security->xss_clean($this->input->post('actividades'));
                    $colaboracion       = $this->security->xss_clean($this->input->post('colaboracion'));
                    $comentarios        = $this->security->xss_clean($this->input->post('comentarios'));
                    $usuario            = $this->security->xss_clean($this->input->post('usuario_id'));


                    $data = array(
                        'nombre_grupo'      => $nombre_grupo,
                        'es_lider'          => $es_lider,
                        'nombre_lider'      => $nombre_lider,
                        'sectores_id'       => $sectores_id,
                        'institucion_resp'  => $institucion_resp,
                        'dependencia_id'    => $dependencia_id,
                        'departamento_id'   => $departamento_id,
                        'descr_grupo'       => $descr_grupo,
                        'logros'            => $logros,
                        'actividades'       => $actividades,
                        'colaboracion'      => $colaboracion,
                        'comentarios'       => $comentarios,
                        'usuario_id'        => $usuario,
                        'fecha_captura'     => date('Y-m-d')
                    );
                    $this->session->set_flashdata('success', 'Se ha registrado correctamente el Grupo');
                    $this->Personacyt_model->alta_grupos($data);
                    redirect('personacyt/grupos');
                }
                else
                {
                    $this->session->set_flashdata('error', 'No se ha podido registrar el Grupo');
                    redirect('personacyt/grupos');
                }
            }

/////////////////////// PATENTES /////////////////////////////////

    public function patentes()
    {
        if (!file_exists(APPPATH.'views/pages/personacyt/investigacion/patentes.php')) 
        {
            redirect('personacyt');
        }
        $id = $this->session->userdata('id_usuario');
        $data['patentes']       = $this->Personacyt_model->patentes($id);
        $data['paten']          = $this->Personacyt_model->tipo_patente();
        $data['conocimiento']   = $this->Personacyt_model->conocimiento();
        $data['economico']      = $this->Personacyt_model->economico();
        $data['autor']          = $this->Personacyt_model->autor();
        $data['pais']           = $this->Pages_model->paises();

        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/personacyt/investigacion/patentes',$data);
        $this->load->view('theme/footer');
    }

           public function alta_patentes()
            {
                if($this->input->method() === 'post')
                {
                    $tipo_patente_id        = $this->security->xss_clean($this->input->post('tipo_patente_id'));
                    $num_registro           = $this->security->xss_clean($this->input->post('num_registro'));
                    $nombre_patente         = $this->security->xss_clean($this->input->post('nombre_patente'));
                    $descr_patente          = $this->security->xss_clean($this->input->post('descr_patente'));
                    $tipo_autor_id          = $this->security->xss_clean($this->input->post('tipo_autor_id'));
                    $total_autor            = $this->security->xss_clean($this->input->post('total_autor'));
                    $coautor                = $this->security->xss_clean($this->input->post('coautor'));
                    $descr_beneficiarios    = $this->security->xss_clean($this->input->post('descr_beneficiarios'));
                    $paises_id              = $this->security->xss_clean($this->input->post('paises_id'));
                    $anio_publicacion       = $this->security->xss_clean($this->input->post('anio_publicacion'));
                    $economico_id           = $this->security->xss_clean($this->input->post('economico_id'));
                    $rama_id                = $this->security->xss_clean($this->input->post('rama_id'));
                    $clase_id               = $this->security->xss_clean($this->input->post('clase_id'));
                    $descripcion_detallada  = $this->security->xss_clean($this->input->post('descripcion_detallada'));
                    $usuario                = $this->security->xss_clean($this->input->post('usuario_id'));


                    $data = array(
                        'tipo_patente_id'      => $tipo_patente_id,
                        'num_registro'         => $num_registro,
                        'nombre_patente'       => $nombre_patente,
                        'descr_patente'        => $descr_patente,
                        'tipo_autor_id'        => $tipo_autor_id,
                        'total_autor'          => $total_autor,
                        'coautor'              => $coautor,
                        'descr_beneficiarios'  => $descr_beneficiarios,
                        'paises_id'            => $paises_id,
                        'anio_publicacion'     => $anio_publicacion,
                        'economico_id'         => $economico_id,
                        'rama_id'              => $rama_id,
                        'clase_id'             => $clase_id,
                        'descripcion_detallada' => $descripcion_detallada,
                        'usuario_id'            => $usuario,
                        'fecha_captura'         => date('Y-m-d')
                    );
                    $this->session->set_flashdata('success', 'Se ha registrado correctamente la Patente');
                    $this->Personacyt_model->alta_patentes($data);
                    redirect('personacyt/patentes');
                }
                else
                {
                    $this->session->set_flashdata('error', 'No se ha podido registrar la Patente');
                    redirect('personacyt/patentes');
                }
            }


/////////////////////// PATENTES /////////////////////////////////

    public function proyectos()
    {
        if (!file_exists(APPPATH.'views/pages/personacyt/investigacion/proyectos.php')) 
        {
            redirect('personacyt');
        }
        $id = $this->session->userdata('id_usuario');
        $data['proyectos']      = $this->Personacyt_model->proyectos($id);
        $data['sector']         = $this->Personacyt_model->sector();
        $data['dependencia']    = $this->Personacyt_model->dependencias();
        $data['economico']      = $this->Personacyt_model->economico();
        $data['conocimiento']   = $this->Personacyt_model->conocimiento();
        $data['proyecto']       = $this->Personacyt_model->tipo_proyecto();
        $data['empleadora']     = $this->Personacyt_model->empleadoras();


        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/personacyt/investigacion/proyectos',$data);
        $this->load->view('theme/footer');
    }


           public function alta_proyectos()
            {
                if($this->input->method() === 'post')
                {
                    $fecha_inicio           = $this->security->xss_clean($this->input->post('fecha_inicio'));
                    $fecha_final            = $this->security->xss_clean($this->input->post('fecha_final'));
                    $tipo_proyecto_id       = $this->security->xss_clean($this->input->post('tipo_proyecto_id'));
                    $entidad_empleadora_id  = $this->security->xss_clean($this->input->post('entidad_empleadora_id'));
                    $nombre_proyecto        = $this->security->xss_clean($this->input->post('nombre_proyecto'));
                    $institucion            = $this->security->xss_clean($this->input->post('institucion'));
                    $sector_id              = $this->security->xss_clean($this->input->post('sector_id'));
                    $dependencia_id         = $this->security->xss_clean($this->input->post('dependencia_id'));
                    $departamento_id        = $this->security->xss_clean($this->input->post('departamento_id'));
                    $finalidad              = $this->security->xss_clean($this->input->post('finalidad'));
                    $campos_id              = $this->security->xss_clean($this->input->post('campos_id'));
                    $disciplina_id          = $this->security->xss_clean($this->input->post('disciplina_id'));
                    $subdisciplina_id       = $this->security->xss_clean($this->input->post('subdisciplina_id'));
                    $economico_id           = $this->security->xss_clean($this->input->post('economico_id'));
                    $rama_id                = $this->security->xss_clean($this->input->post('rama_id'));
                    $clase_id               = $this->security->xss_clean($this->input->post('clase_id'));
                    $descripcion_larga      = $this->security->xss_clean($this->input->post('descripcion_larga'));
                    $usuario                = $this->security->xss_clean($this->input->post('usuario_id'));


                    $data = array(
                        'fecha_inicio'          => $fecha_inicio,
                        'fecha_final'           => $fecha_final,
                        'tipo_proyecto_id'      => $tipo_proyecto_id,
                        'entidad_empleadora_id' => $entidad_empleadora_id,
                        'nombre_proyecto'       => $nombre_proyecto,
                        'institucion'           => $institucion,
                        'sector_id'             => $sector_id,
                        'dependencia_id'        => $dependencia_id,
                        'departamento_id'       => $departamento_id,
                        'finalidad'             => $finalidad,
                        'campos_id'             => $campos_id,
                        'disciplina_id'         => $disciplina_id,
                        'subdisciplina_id'      => $subdisciplina_id,
                        'economico_id'          => $economico_id,
                        'rama_id'               => $rama_id,
                        'clase_id'              => $clase_id,
                        'descripcion_larga'     => $descripcion_larga,
                        'usuario_id'            => $usuario,
                        'fecha_captura'         => date('Y-m-d')
                    );
                    $this->session->set_flashdata('success', 'Se ha registrado correctamente el Proyecto');
                    $this->Personacyt_model->alta_proyectos($data);
                    redirect('personacyt/proyectos');
                }
                else
                {
                    $this->session->set_flashdata('error', 'No se ha podido registrar el Proyecto');
                    redirect('personacyt/proyectos');
                }
            }


    public function constancia($slug = null)
    {
        $data['registro'] = $this->Personacyt_model->Constancias($slug);

        if (empty($data['registro'])) {
            //redirect('personacyt/constancia');
        }

        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/personacyt/constancia');
        $this->load->view('theme/footer');
    }



}
