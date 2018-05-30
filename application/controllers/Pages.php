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
        $data['pais']       = $this->Pages_model->paises();
        $data['gen']        = $this->Pages_model->sexo();
        $data['civil']      = $this->Pages_model->civil();
        $data['sni']        = $this->Pages_model->estado_sni();

        $data['area']       = $this->Pages_model->area_conocimiento();
        $data['nivel']      = $this->Pages_model->nivel_academico();
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



    function codigo() {
        $cadena = strtoupper(trim($this->input->post("texto")));
        $len = strlen($cadena);
        $valor = 0;
        for ($x = 0; $x < $len; $x++) {
            $letra = substr($cadena, $x, 1);
            //        echo $letra;
            if ($letra == "A" or $letra == "B" or $letra == "C" or $letra == "D") {
                $valor+=1;
            } else if ($letra == "E" or $letra == "F" or $letra == "G" or $letra == "H") {
                $valor+=2;
            } else if ($letra == "I" or $letra == "J" or $letra == "K" or $letra == "L") {
                $valor+=3;
            } else if ($letra == "M" or $letra == "N" or $letra == "O" or $letra == "P") {
                $valor+=4;
            } else if ($letra == "Q" or $letra == "R" or $letra == "S" or $letra == "T") {
                $valor+=5;
            } else if ($letra == "U" or $letra == "V" or $letra == "W" or $letra == "X" or $letra == "Y" or $letra == "Z") {
                $valor+=6;
            } else if (intval($letra) > 0) {
                $valor+=intval($letra);
            }
//           echo "- $valor ";
        }
        if (strlen($valor) > 1) {
            $valor2 = 0;
            for ($y = 0; $y < strlen($valor); $y++) {
                $num = substr($valor, $y, 1);
                $valor2+=$num;
            }
            if (strlen($valor2) > 1)
                $valor2 = "X";
            $valor = $valor2;
        }
        echo $valor;
    }





}
