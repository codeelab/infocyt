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
        $data['pais']       = $this->Pages_model->paises();
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


    //---------------------------------
    // VERIFICAR LA DISPONIBILIDAD DEL USUARIO
    //---------------------------------
    function checar_usuario()
    {
        $this->load->model('Pages_model');
        $get_result = $this->Pages_model->disponibilidad_usuario();

        if(!$get_result )
        echo '<span class="text-danger">Ya existe ese nombre de usuario ¿Quieres volver a intentarlo?.</span>';
        else
        echo '<span class="text-success">Usuario disponible</span>';
    }










}
