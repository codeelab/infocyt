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
        
        $data['estados'] = $this->Pages_model->getEstados();
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/'.$pages, $data);
        $this->load->view('theme/footer');
    }

    function getCidades($id_estado)
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

}
