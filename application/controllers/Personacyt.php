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



}
