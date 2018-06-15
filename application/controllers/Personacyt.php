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

        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/personacyt/index');
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


        function disciplina($campo_id)
        {
            $sub = $this->Personacyt_model->dis($campo_id);
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
                    $fecha_terminacion           = $this->security->xss_clean($this->input->post('fecha_terminacion'));
                    $grado_id      = $this->security->xss_clean($this->input->post('grado_id'));
                    $completado          = $this->security->xss_clean($this->input->post('completado'));
                    $descr_grado           = $this->security->xss_clean($this->input->post('descr_grado'));
                    $paises_id     = $this->security->xss_clean($this->input->post('paises_id'));
                    $estados_id   = $this->security->xss_clean($this->input->post('estados_id'));
                    $campo_id = $this->security->xss_clean($this->input->post('campo_id'));
                    $disciplina_id = $this->security->xss_clean($this->input->post('disciplina_id'));
                    $subdisciplina_id    = $this->security->xss_clean($this->input->post('subdisciplina_id'));
                    $estatus_id      = $this->security->xss_clean($this->input->post('estatus_id'));
                    $num_cedula      = $this->security->xss_clean($this->input->post('num_cedula'));
                    $sector_id      = $this->security->xss_clean($this->input->post('sector_id'));
                    $institucion      = $this->security->xss_clean($this->input->post('institucion'));
                    $dependencia_id      = $this->security->xss_clean($this->input->post('dependencia_id'));
                    $departamento_id      = $this->security->xss_clean($this->input->post('departamento_id'));
                    $descripcion_tesis      = $this->security->xss_clean($this->input->post('descripcion_tesis'));
                    $usuario            = $this->security->xss_clean($this->input->post('usuario_id'));

                    $data = array(
                        'fecha_terminacion'         => $fecha_terminacion,
                        'grado_id'                  => $grado_id,
                        'completado'                => $completado,
                        'descr_grado'               => $descr_grado,
                        'paises_id'                 => $paises_id,
                        'estados_id'                => $estados_id,
                        'campo_id'                  => $campo_id,
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









}
