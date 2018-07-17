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
                    'nombre'      => $this->security->xss_clean(strtoupper($this->input->post('nombres'))),
                    'a_paterno'   => $this->security->xss_clean(strtoupper($this->input->post('a_paternos'))),
                    'a_materno'   => $this->security->xss_clean(strtoupper($this->input->post('a_maternos'))),
                    'username'    => $this->security->xss_clean($this->input->post('username')),
                    'password'    => $this->security->xss_clean($this->input->post('password'))
                );

                $datas = array(
                    'nombre'            => $this->security->xss_clean(strtoupper($this->input->post('nombres'))),
                    'a_paterno'         => $this->security->xss_clean(strtoupper($this->input->post('a_paternos'))),
                    'a_materno'         => $this->security->xss_clean(strtoupper($this->input->post('a_maternos'))),
                    'rfc'               => $this->security->xss_clean(strtoupper($this->input->post('rfc'))),
                    'curp'              => $this->security->xss_clean(strtoupper($this->input->post('curp'))),
                    'fecha_nac'         => $this->security->xss_clean($this->input->post('fechas_nac')),
                    'pais_id'           => $this->security->xss_clean($this->input->post('paises_id')),
                    'nacionalidad'      => $this->security->xss_clean($this->input->post('nacionalidade')),
                    'estado_id'         => $this->security->xss_clean($this->input->post('campo_id')),
                    'municipio_id'      => $this->security->xss_clean($this->input->post('municipio_id')),
                    'localidad'         => $this->security->xss_clean(strtoupper($this->input->post('localidade'))),
                    'edad'              => $this->security->xss_clean($this->input->post('edade')),
                    'sexo_id'           => $this->security->xss_clean($this->input->post('sexo_id')),
                    'estado_civil'      => $this->security->xss_clean(strtoupper($this->input->post('estados_civil'))),
                    'correo_personal'   => $this->security->xss_clean(strtolower($this->input->post('correos_personal'))),
                    'correo_laboral'    => $this->security->xss_clean(strtolower($this->input->post('correos_laboral'))),
                    'tel_part'          => $this->security->xss_clean($this->input->post('tel_parti')),
                    'tel_cel'           => $this->security->xss_clean($this->input->post('tel_celu')),
                    'tel_lab'           => $this->security->xss_clean($this->input->post('tel_labo')),
                    'direccion'         => $this->security->xss_clean(strtoupper($this->input->post('direcciones'))),
                    'numero_dom'        => $this->security->xss_clean($this->input->post('numero_domi')),
                    'colonia'           => $this->security->xss_clean(strtoupper($this->input->post('colonias'))),
                    'cp'                => $this->security->xss_clean($this->input->post('cps')),
                    'estado_sni'        => $this->security->xss_clean($this->input->post('estado_sni')),
                    'num_rim'           => $this->security->xss_clean(strtoupper($this->input->post('num_rim'))),
                    'mailing'           => $this->security->xss_clean($this->input->post('mailing')),
                    'username'          => $this->security->xss_clean($this->input->post('username')),
                    'password'          => $this->security->xss_clean(do_hash($this->input->post('password'))),
                    'rol_id'            => $this->security->xss_clean($this->input->post('rol_id')),
                    'status_id'         => $this->security->xss_clean($this->input->post('status_id'))
                );

                    $correo     = $this->input->post('correos_personal');
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
                    $this->email->from('infocyt@icti.mx', 'INFOCYT '.date('Y').'');
                    $this->email->reply_to('informatica.cecti@gmail.com', 'SISTEMA DE INFORMACIÓN CIENTÍFICA Y TECNOLÓGICA DEL ESTADO DE MICHOACÁN '.date('Y').'');
                    $this->email->to($correo);
                    $this->email->subject($estado);
                    $this->email->message($emails);


                    if($this->email->send())
                    {
                        //echo $this->email->print_debugger();
                        $this->Registro_model->registro_investigador($datas);
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