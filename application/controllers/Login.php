<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pages_model');
        $this->load->library(array('session','form_validation','email','user_agent'));
        $this->load->helper(array('url','form','security'));
        $this->load->database('default');
    }

    public function index()
    {
        switch ($this->session->userdata('rol_id')) {
            case '':
                $this->session->set_flashdata('error', 'Usuario no registrado!');
                $this->load->view('theme/header');
                $this->load->view("theme/nav");
                $this->load->view('pages/login',$data);
                $this->load->view("theme/footer");
                break;
            case '1':
                redirect(base_url().'super');
                break;
            case '2':
                redirect(base_url().'jefe');
                break;
            case '3':
                redirect(base_url().'personacyt');
                break;
            default:
                $this->session->set_flashdata('error', 'Usuario no registrado!');
                $this->load->view('theme/header');
                $this->load->view("theme/nav");
                $this->load->view('pages/login','refresh');
                $this->load->view("theme/footer");
                break;
        }
    }


    public function acceso()
    {
        $username = $this->input->post('username');
        $password = sha1($this->input->post('password'));

        $check_user = $this->Pages_model->login($username,$password);

        if($check_user == TRUE)
        {
            $data = array(
            'is_logued_in'      =>      TRUE,
            'id_usuario'        =>      $check_user->id_usuario,
            'rol_id'            =>      $check_user->rol_id,
            'sexo_id'           =>      $check_user->sexo_id,
            'nombre'            =>      $check_user->nombre,
            'a_paterno'         =>      $check_user->a_paterno,
            'a_materno'         =>      $check_user->a_materno,
            'correo_personal'   =>      $check_user->correo_personal,
            'num_rim'           =>      $check_user->num_rim,
            'username'          =>      $check_user->username
            );
            $this->session->set_userdata($data);
            $this->session->set_flashdata('success', 'Bienvenido al Sistema de Información Científica y Tecnológica del Estado de Michoacán.');
            $this->index();
        }else {
            $this->session->set_flashdata('error', 'Usuario no registrado!');
            redirect('login');
        }

    }

    public function salir()
    {
        $array_sesiones = array('id_usuario' => '', 'nombre' => '', 'a_paterno' => '', 'a_materno' => '', 'correo' => '', 'username' => '', 'rol_id' => '', 'sexo_id' => '', 'area_id' => '');
        $this->session->unset_userdata($array_sesiones);
        $this->session->sess_destroy();
        redirect('login');
    }


    public function recovery()
    {
      $this->load->library('form_validation');
      $this->load->model("Correos_model");
      $this->form_validation->set_rules('correo_personal', 'Email', 'trim|required|matches[correo_personal]|xss_clean|callback_email_check');

      $this->form_validation->set_message('required', 'El campo %s es obligatorio');
      $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
 
       if($this->form_validation->run() == FALSE)
        {
              $this->session->set_flashdata('error', 'correo no registrado!');
              redirect('recuperacion');
        }
        else
        {
            $pass = $this->generaPass();
            $pa = sha1($pass);

            setlocale(LC_TIME,"es_ES");
            $datos = array(
                'fecha'   => strftime("%d de %B de %Y"),
                'hora'    => date('G:ia'),
                'pass'    => $pass
            );

            $em     = $this->input->post('correo_personal');
            $emails = $this->Correos_model->recovery($datos);
            $estado     = ' Generación de Contraseña Temporal RIM - '.date('Y').'';

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
            $this->email->from('contacto@foroene.com', 'Instituto de Ciencia, Tecnología e Innovación del Estado de Michoacán');
            $this->email->reply_to('informatica.cecti@gmail.com', 'Instituto de Ciencia, Tecnología e Innovación del Estado de Michoacán');
            $this->email->to($em);
            $this->email->subject($estado);
            $this->email->message($emails);

                if($this->email->send())
                {
                    //echo $this->email->print_debugger();
                    $this->Pages_model->recovery($pa);
                    $this->session->set_flashdata('success', 'Se ha enviado un correo de recuperación de contraseña a: <b>'.$em.'</b>!');
                    redirect('login');
                }
                else
                {
                    //echo $this->email->print_debugger();
                    $this->session->set_flashdata('error', 'Se ha generado un error al intentar enviar el correo a: <b>'.$em.'</b>, favor de intentar nuevamente!.');
                    redirect('recuperacion');
                }

        }
    }



    public function email_check($correo_personal)
    {
        $query = $this->db->get_where('usuarios', array('correo_personal' => $correo_personal), 1);
 
        if ($query->num_rows() == 1)
        {
            return true;
        }
        else
        {    
            $this->form_validation->set_message('email_check', 'Correo no registrado!');
            return false;
      }
   }    


    private function generaPass()
    {
        $_alphaSmall = 'abcdefghijklmnopqrstuvwxyz';            // small letters
        $_alphaCaps  = strtoupper($_alphaSmall);                // CAPITAL LETTERS
        $_numerics   = '1234567890';                            // numerics
        $_specialChars = '!@#$%&*()-_=+]}[{;:,<.>/?\|';   // Special Characters

        $_container = $_alphaSmall.$_alphaCaps.$_numerics.$_specialChars;   // Contains all characters

        for($i = 0; $i < 15; $i++) {                                 // Loop till the length mentioned
            $_rand = rand(0, strlen($_container) - 1);                  // Get Randomized Length
            $password .= substr($_container, $_rand, 1);                // returns part of the string [ high tensile strength ;) ] 
        }

        return $password;       // Returns the generated Pass
    }



}
