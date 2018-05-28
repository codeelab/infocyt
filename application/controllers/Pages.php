<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pages_model');
        $this->load->helper('url','form','security');
        $this->load->database('default');
    }

    public function view($pages = 'inicio')
    {

        if (!file_exists(APPPATH.'views/pages/'.$pages.'.php')) 
        {
            show_404();
        }
        
        $data['estados']    = $this->Pages_model->getEstados();
        $data['nac']        = $this->Pages_model->nacionalidad();
        $data['gen']        = $this->Pages_model->sexo();
        $data['civil']      = $this->Pages_model->civil();
        $data['sni']        = $this->Pages_model->estado_sni();
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/'.$pages, $data);
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
