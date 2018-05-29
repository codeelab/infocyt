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
                        'nombre'            => $this->security->xss_clean($this->input->post('nombre')),
                        'a_paterno'         => $this->security->xss_clean($this->input->post('a_paterno')),
                        'a_materno'         => $this->security->xss_clean($this->input->post('a_materno')),
                        'rfc'               => $this->security->xss_clean($this->input->post('rfc')),
                        'curp'              => $this->security->xss_clean($this->input->post('curp')),
                        'fecha_nac'         => $this->security->xss_clean($this->input->post('fecha_nac')),
                        'pais_id'           => $this->security->xss_clean($this->input->post('pais_id')),
                        'nacionalidad'      => $this->security->xss_clean($this->input->post('nacionalidad')),
                        'estado_id'         => $this->security->xss_clean($this->input->post('estado_id')),
                        'municipio_id'      => $this->security->xss_clean($this->input->post('municipio_id')),
                        'localidad'         => $this->security->xss_clean($this->input->post('localidad')),
                        'edad'              => $this->security->xss_clean($this->input->post('edad')),
                        'sexo_id'           => $this->security->xss_clean($this->input->post('sexo_id')),
                        'estado_civil'      => $this->security->xss_clean($this->input->post('estado_civil')),
                        'correo_personal'   => $this->security->xss_clean($this->input->post('correo_personal')),
                        'correo_laboral'    => $this->security->xss_clean($this->input->post('correo_laboral')),
                        'tel_part'          => $this->security->xss_clean($this->input->post('tel_part')),
                        'tel_cel'           => $this->security->xss_clean($this->input->post('tel_cel')),
                        'tel_lab'           => $this->security->xss_clean($this->input->post('tel_lab')),
                        'direccion'         => $this->security->xss_clean($this->input->post('direccion')),
                        'numero_dom'        => $this->security->xss_clean($this->input->post('numero_dom')),
                        'colonia'           => $this->security->xss_clean($this->input->post('colonia')),
                        'cp'                => $this->security->xss_clean($this->input->post('cp')),
                        'estado_sni'        => $this->security->xss_clean($this->input->post('estado_sni')),
                        'num_rim'           => $this->security->xss_clean($this->input->post('num_rim')),
                        'mailing'           => $this->security->xss_clean($this->input->post('mailing')),
                        'username'          => $this->security->xss_clean($this->input->post('username')),
                        'password'          => $this->security->xss_clean(do_hash($this->input->post('password'))),
                        'rol_id'            => $this->security->xss_clean($this->input->post('rol_id')),
                        'status_id'         => $this->security->xss_clean($this->input->post('status_id'))
                    );

                    $correo     = $this->input->post('correo_personal');
                    $emails     = $this->Correo_model->registro($datos);
                    $estado     = 'Bienvenid@ al SISTEMA DE INFORMACIÓN CIENTÍFICA Y TECNOLÓGICA DEL ESTADO DE MICHOACÁN '.date('Y').'';

                    $config['protocol']     = 'smtp';
                    $config["smtp_host"]    = 'mail.icti.mx';
                    $config["smtp_user"]    = 'infocyt@icti.mx';
                    $config["smtp_pass"]    = 'infocyt2018s';
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
                        //$this->Registro_model->registro_investigador($datas);
                        $this->session->set_flashdata("success", "Te registraste con éxito! Pronto recibirás un correo de confirmación con los datos de acceso.");
                        redirect('registro');

                    }else
                    {

                       //echo $this->email->print_debugger();
                       $this->session->set_flashdata("error", "Se ha generado un error al intentar registrarse, favor de intentar nuevamente.");
                       redirect('registro');
                    }

        }










}

/* End of file Registro.php */
/* Location: ./application/controllers/Registro.php */