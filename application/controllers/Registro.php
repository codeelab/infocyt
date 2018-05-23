<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Registro_model');
        $this->load->helper('url','form','security');
        $this->load->database('default');
    }


        public function registros()
        {
            
        }

}

/* End of file Registro.php */
/* Location: ./application/controllers/Registro.php */