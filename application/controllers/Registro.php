<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Registro_model','Pages_model'));
        $this->load->library(array('session','form_validation','email','user_agent'));
        $this->load->helper(array('url','form','security'));
        $this->load->database('default');
    }


        public function investigador()
       {
            $this->load->model("Correo_model");

                    $datos = array(
                        'nombre'       => $this->security->xss_clean($this->input->post('nombre')),
                        'a_paterno'    => $this->security->xss_clean($this->input->post('a_paterno')),
                        'a_materno'    => $this->security->xss_clean($this->input->post('a_materno')),
                        'username'     => $this->security->xss_clean($this->input->post('username')),
                        'password'    => $this->security->xss_clean($this->input->post('password'))
                    );
                    $datas = array(
                        'matricula'    => $this->security->xss_clean($this->input->post('matricula')),
                        'nombre'       => $this->security->xss_clean($this->input->post('nombre')),
                        'a_paterno'    => $this->security->xss_clean($this->input->post('a_paterno')),
                        'a_materno'    => $this->security->xss_clean($this->input->post('a_materno')),
                        'c_personal'   => $this->security->xss_clean($this->input->post('c_personal')),
                        'username'     => $this->security->xss_clean($this->input->post('username')),
                        'password'     => $this->security->xss_clean(do_hash($this->input->post('password'))),
                        'terminos'     => $this->security->xss_clean($this->input->post('terminos')),
                        'rol_id'       => $this->security->xss_clean($this->input->post('rol_id')),
                        'status_id'    => $this->security->xss_clean($this->input->post('status_id'))
                    );
                    $correo     = $this->input->post('correo_personal');
                    $emails     = $this->Correo_model->registro($datos);
                    $estado     = 'Bienvenid@ al SISTEMA DE INFORMACIÓN CIENTÍFICA Y TECNOLÓGICA DEL ESTADO DE MICHOACÁN '.date('Y').'';

                    $config['protocol']     = 'smtp';
                    $config["smtp_host"]    = 'mail.icti.mx';
                    $config["smtp_user"]    = 'infocyt@icti.mx';
                    $config["smtp_pass"]    = 'infocyt2018';
                    $config["smtp_port"]    = '587';
                    $config['smtp_crypto']  = 'tls';
                    $config['charset']      = 'utf-8';
                    $config['wordwrap']     = TRUE;
                    $config['validate']     = true;
                    $config['mailtype']     = 'html';
                    $config['smtp_timeout'] = '5';
                    $config['priority']     = '1';
                    $this->load->library('email');
                    $this->email->initialize($config);
                    $this->email->from('infocyt@icti.mx', 'SISTEMA DE INFORMACIÓN CIENTÍFICA Y TECNOLÓGICA DEL ESTADO DE MICHOACÁN  '.date('Y').'');
                    $this->email->reply_to('informatica.cecti@gmail.com', 'INFORMATICA REGISTRO '.date('Y').'');
                    $this->email->to($correo);
                    $this->email->subject($estado);
                    $this->email->message($emails);


                    if($this->email->send())
                    {
                        //echo $this->email->print_debugger();
                        $this->Registro_model->registro_usuarios($datas);
                        $this->session->set_flashdata("success", "HAS COMPLETADO TU REGISTRO DE ALUMNA ENE CON ÉXITO!");
                        redirect('exito');

                    }else
                    {

                       //echo $this->email->print_debugger();
                       $this->session->set_flashdata("error", "Se ha generado un error al intentar registrarse, por lo cual no se ha enviado el correo indicando su registro!, favor de intentar nuevamente.");
                       redirect('registro');
                    }

        }










}

/* End of file Registro.php */
/* Location: ./application/controllers/Registro.php */