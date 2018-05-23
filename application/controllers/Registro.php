<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Registro_model','Pages_model'));
        $this->load->helper('url','form','security');
        $this->load->database('default');
    }


        public function registros()
    {

        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('a_paterno', 'Apellido Paterno', 'required');
        $this->form_validation->set_rules('a_materno', 'Apellido Materno', 'required');

        $this->form_validation->set_rules('correo_personal', 'Email Principal', 'required|valid_email');
        $this->form_validation->set_rules('correo_personal2', 'Email Alterno', 'required|valid_email');
        $this->form_validation->set_rules('correo_particular', 'Email Principal', 'required|valid_email');
        $this->form_validation->set_rules('correo_particular2', 'Email Alterno', 'required|valid_email');
        $this->form_validation->set_rules('username', 'Usuario', 'required');
        $this->form_validation->set_rules('password', 'Contraseña', 'required');
        $this->form_validation->set_rules('password2', 'Contraseña de verificación', 'required');


        $this->form_validation->set_message('required', 'El campo %s es obligatorio');



        if ($this->form_validation->run() == FALSE)
        {
            
           $this->session->set_flashdata('error', 'Ha habido un error al intentar registrar la información, intente nuevamente corrigiendo las alertas mostradas!');
            redirect(site_url().'registro');

        }
        else
        {
            if($this->Inicio_model->isDuplicate($this->input->post('username'))){
                $this->session->set_flashdata('flash_message', 'Ya existe ese nombre de usuario');
                redirect(site_url().'registro');
            }else
            {
            $this->session->set_flashdata('flash_message', 'Registro Exitoso!');
            redirect(site_url().'registro');
            exit;
            }

        }



    }









}

/* End of file Registro.php */
/* Location: ./application/controllers/Registro.php */