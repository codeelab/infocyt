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
                    'nombre'      => $this->security->xss_clean(mb_strtoupper($this->input->post('nombres'),'utf-8')),
                    'a_paterno'   => $this->security->xss_clean(mb_strtoupper($this->input->post('a_paternos'),'utf-8')),
                    'a_materno'   => $this->security->xss_clean(mb_strtoupper($this->input->post('a_maternos'),'utf-8')),
                    'username'    => $this->security->xss_clean($this->input->post('username')),
                    'password'    => $this->security->xss_clean($this->input->post('password'))
                );

                $datas = array(
                    'nombre'            => $this->security->xss_clean(mb_strtoupper($this->input->post('nombres'),'utf-8')),
                    'a_paterno'         => $this->security->xss_clean(mb_strtoupper($this->input->post('a_paternos'),'utf-8')),
                    'a_materno'         => $this->security->xss_clean(mb_strtoupper($this->input->post('a_maternos'),'utf-8')),
                    'rfc'               => $this->security->xss_clean(mb_strtoupper($this->input->post('rfc'),'utf-8')),
                    'curp'              => $this->security->xss_clean(mb_strtoupper($this->input->post('curp'),'utf-8')),
                    'fecha_nac'         => $this->security->xss_clean($this->input->post('fechas_nac')),
                    'pais_id'           => $this->security->xss_clean($this->input->post('paises_id')),
                    'nacionalidad'      => $this->security->xss_clean($this->input->post('nacionalidade')),
                    'estado_id'         => $this->security->xss_clean($this->input->post('campo_id')),
                    'municipio_id'      => $this->security->xss_clean($this->input->post('municipio_id')),
                    'localidad'         => $this->security->xss_clean(mb_strtoupper($this->input->post('localidade'),'utf-8')),
                    'edad'              => $this->security->xss_clean($this->input->post('edade')),
                    'sexo_id'           => $this->security->xss_clean($this->input->post('sexo_id')),
                    'estado_civil'      => $this->security->xss_clean(mb_strtoupper($this->input->post('estados_civil'),'utf-8')),
                    'correo_personal'   => $this->security->xss_clean(strtolower($this->input->post('correos_personal'))),
                    'correo_laboral'    => $this->security->xss_clean(strtolower($this->input->post('correos_laboral'))),
                    'tel_part'          => $this->security->xss_clean($this->input->post('tel_parti')),
                    'tel_cel'           => $this->security->xss_clean($this->input->post('tel_celu')),
                    'tel_lab'           => $this->security->xss_clean($this->input->post('tel_labo')),
                    'direccion'         => $this->security->xss_clean(mb_strtoupper($this->input->post('direcciones'),'utf-8')),
                    'numero_dom'        => $this->security->xss_clean($this->input->post('numero_domi')),
                    'colonia'           => $this->security->xss_clean(mb_strtoupper($this->input->post('colonias'),'utf-8')),
                    'cp'                => $this->security->xss_clean($this->input->post('cps')),
                    'estado_sni'        => $this->security->xss_clean($this->input->post('estado_sni')),
                    'num_rim'           => $this->security->xss_clean(mb_strtoupper($this->input->post('num_rim'),'utf-8')),
                    'mailing'           => $this->security->xss_clean($this->input->post('mailing')),
                    'username'          => $this->security->xss_clean($this->input->post('username')),
                    'password'          => $this->security->xss_clean(do_hash($this->input->post('password'))),
                    'rol_id'            => $this->security->xss_clean($this->input->post('rol_id')),
                    'status_id'         => $this->security->xss_clean($this->input->post('status_id'))
                );

                    $reim = $this->security->xss_clean(mb_strtoupper($this->input->post('num_rim'),'utf-8'));

                    $correo     = $this->input->post('correos_personal');
                    $emails     = $this->Correo_model->registro($datos);
                    $estado     = 'Bienvenid@ al REGISTRO DE ESTATAL DE INVESTIGADORES MICHOACANOS '.date('Y').'';
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
                    $this->email->from('noreply@icti.mx', 'REIM '.date('Y').'');
                    $this->email->reply_to('informatica.cecti@gmail.com', 'REGISTRO DE ESTATAL DE INVESTIGADORES MICHOACANOS '.date('Y').'');
                    $this->email->to($correo);
                    $this->email->subject($estado);
                    $this->email->message($emails);


                    if($this->email->send())
                    {
                        //echo $this->email->print_debugger();
                        //exit;
                        $this->Registro_model->registro_investigador($datas,$reim);
                        $this->session->set_flashdata("success", "Te registraste con éxito! Pronto recibirás un correo de confirmación con los datos de acceso.");
                        redirect('registro');

                    }else
                    {

                       //echo $this->email->print_debugger();
                       //exit;
                       $this->session->set_flashdata("error", "Se ha generado un error al intentar registrarse, favor de intentar nuevamente.");
                       redirect('registro');
                    }

        }







}

/* End of file Registro.php */
/* Location: ./application/controllers/Registro.php */