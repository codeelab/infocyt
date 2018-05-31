<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personacyt extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Personacyt_model'));
        $this->load->library(array('session','form_validation','user_agent','encrypt'));
        $this->load->helper(array('url','form','security'));
        $this->load->database('default');
    }

    public function index()
    {

        if (!file_exists(APPPATH.'views/pages/personacyt/index.php')) 
        {
            redirect('personacyt');
        }

        //$data['usuarios']   = $this->Lider_model->usuarios();
        //$data['theme']    = $this->Lider_model->theme();
        //$data['municipios'] = $this->Lider_model->municipios();
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/personacyt/index');
        $this->load->view('theme/footer');
    }

    public function usuarios()
    {
        $data['usuarios'] = $this->Lider_model->getUsuarios();

        if (empty($data['usuarios'])){
           redirect('lider');
        }

        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('lider/usuarios', $data);
        $this->load->view('template/footers');
    }

    public function theme()
    {
        $data['theme'] = $this->Lider_model->getEvent();

        if (empty($data['theme'])){
            redirect('lider');
        }

        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('lider/theme', $data);
        $this->load->view('template/footers');
    }


    public function municipios()
    {
        $data['municipios'] = $this->Lider_model->getMunicipios();

        if (empty($data['municipios'])){
            redirect('lider');
        }

        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('lider/municipios', $data);
        $this->load->view('template/footers');
    }

    public function estadisticas()
    {

        $data['usuarios']   = $this->Lider_model->usuarios();
        $data['tal']        = $this->Lider_model->getUsuariosTa();
        $data['cor']        = $this->Lider_model->getUsuariosCo();
        $data['theme']    = $this->Lider_model->theme();
        $data['municipios'] = $this->Lider_model->municipios();
        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('lider/estadisticas',$data);
        $this->load->view('template/footers');
    }


    public function registro_talleristas()
    {

        $data['municipios'] = $this->Lider_model->municipios();
        $data['mun']        = $this->Lider_model->selectMunicipios();
        $data['tipo']       = $this->Lider_model->selectUsuario();
        $data['theme']    = $this->Lider_model->selectEventos();
        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('lider/r_talleristas',$data);
        $this->load->view('template/footers');
    }

    public function registro_eventos()
    {

        $data['mun']        = $this->Lider_model->selectMunicipios();
        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('lider/r_eventos',$data);
        $this->load->view('template/footers');
    }


    public function r_tallerista()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nombre_usuario' ,'Nombre del Tallerista o Coordinador', 'alphas|trim|required|xss_clean');
        $this->form_validation->set_rules('tipo_id' ,'Tipo de Usuario', 'required');
        $this->form_validation->set_rules('municipios_id' ,'Municipio', 'required');
        $this->form_validation->set_rules('evento_id' ,'Evento', 'required');
        $this->form_validation->set_rules('fecha_evento' ,'Fecha de Participación', 'required');


        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');


        if($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('error', 'Ha habido un error al intentar registrar la información, intente nuevamente corrigiendo las alertas mostradas!');
            $this->registro_talleristas('refresh');
        }
        else
        {
            $u = $this->security->xss_clean($this->input->post('nombre_usuario'));
            $nombres = url_title($this->security->xss_clean($this->input->post('nombre_usuario'))); 
            $nombres = str_replace('-', '_', $nombres);

            $datas = array(
                'nombre_usuario'    => $nombres,
                'tipo_id'           => $this->security->xss_clean($this->input->post('tipo_id')),
                'municipios_id'     => $this->security->xss_clean($this->input->post('municipios_id')),
                'evento_id'         => $this->security->xss_clean($this->input->post('evento_id')),
                'fecha_evento'      => $this->security->xss_clean($this->input->post('fecha_evento'))
            );

            $this->Lider_model->registro_usuarios($datas);
            $this->session->set_flashdata('success', 'Se ha registrado correctamente al usuario:  <b>'.$u.'</b> !');
            redirect('lider/registro_talleristas');
        }
    }


    public function r_evento()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nombre_evento' ,'Nombre del Evento', 'trim|required|xss_clean');
        $this->form_validation->set_rules('municipio_id' ,'Municipio', 'required');
        $this->form_validation->set_rules('fecha' ,'Fecha', 'required');
        $this->form_validation->set_rules('hora' ,'Hora', 'required|regex_date');


        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');


        if($this->form_validation->run() == false)
        {
            $this->session->set_flashdata('error', 'Ha habido un error al intentar registrar la información, intente nuevamente corrigiendo las alertas mostradas!');
            $this->registro_eventos('refresh');
        }
        else
        {
            $u = $this->security->xss_clean($this->input->post('nombre_evento'));
            $datas = array(
                'nombre_evento'     => $this->security->xss_clean($this->input->post('nombre_evento')),
                'municipio_id'     => $this->security->xss_clean($this->input->post('municipio_id')),
                'fecha'      => $this->security->xss_clean($this->input->post('fecha')),
                'hora'              => $this->security->xss_clean($this->input->post('hora'))
            );

            $this->Lider_model->registro_eventos($datas);
            $this->session->set_flashdata('success', 'Se ha registrado correctamente el evento:  <b>'.$u.'</b> !');
            redirect('lider/registro_eventos');
        }
    }


    public function editar_usuarios()
    {

        $data['usuarios'] = $this->Lider_model->getUsuarios();

        if (empty($data['usuarios'])){
            redirect('lider');
        }
        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('lider/edit_usuarios',$data);
        $this->load->view('template/footers');
    }


    public function edit($id)
    {
        $data['usuario']    = $this->Lider_model->get_usuarios($id);
        $data['mun']        = $this->Lider_model->selectMunicipios();
        $data['tipo']       = $this->Lider_model->selectUsuario();
        $data['theme']    = $this->Lider_model->selectEventos();

        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('lider/edit_u',$data);
        $this->load->view('template/footers');
    }

    public function update_tallerista()
    {
   
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nombre_usuario' ,'Nombre del Tallerista o Coordinador', 'alphas|trim|required|xss_clean');
        $this->form_validation->set_rules('tipo_id' ,'Tipo de Usuario', 'required');
        $this->form_validation->set_rules('municipios_id' ,'Municipio', 'required');
        $this->form_validation->set_rules('evento_id' ,'Evento', 'required');
        $this->form_validation->set_rules('fecha_evento' ,'Fecha de Participación', 'required');


        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');


        if($this->form_validation->run() == false)
        {
            $id = $this->uri->segment(3);
            $this->session->set_flashdata('error', 'Ha habido un error al intentar actualizar la información, intente nuevamente!');
            redirect('lider/edit/',$id);
        }
        else
        {
            $u = $this->security->xss_clean($this->input->post('nombre_usuario'));
            $nombres = url_title($this->security->xss_clean($this->input->post('nombre_usuario'))); 
            $nombres = str_replace('-', '_', $nombres);
            $id = $this->security->xss_clean($this->input->post('id'));
            
            $data = array(
                'nombre_usuario'    => $nombres,
                'tipo_id' => $this->input->post('tipo_id'),
                'municipios_id' => $this->input->post('municipios_id'),
                'evento_id' => $this->input->post('evento_id'),
                'fecha_evento' => $this->input->post('fecha_evento')
            );
            
            $this->session->set_flashdata('success', 'Se ha editado correctamente al usuario:  <b>'.$u.'</b>!');
            $this->Lider_model->update_usuario($id,$data);
            redirect('lider/editar_usuarios');
            
        }
    }


    public function delete($id)
    {
        $u = $this->security->xss_clean($this->input->post('nombre_usuario'));
        $this->session->set_flashdata('success', 'Se ha eliminado correctamente al usuario: <b>'.$u.'</b>!');
        $this->Lider_model->delete_usuario($id);
        redirect('lider/editar_usuarios');

    }



    public function editar_eventos()
    {

        $data['theme'] = $this->Lider_model->getEventos();

        if (empty($data['theme'])){
            redirect('lider');
        }
        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('lider/edit_eventos',$data);
        $this->load->view('template/footers');
    }


    public function edita($id)
    {
        $data['theme']    = $this->Lider_model->get_eventos($id);
        $data['mun']        = $this->Lider_model->selectMunicipios();

        if (empty($data['theme']))
        {
            $u = $this->security->xss_clean($this->input->post('nombre_evento'));
            $this->session->set_flashdata('error', 'Se ha generado un erro al eliminar el evento: <b>'.$u.'</b>!');
            redirect('lider/editar_eventos');
        }

        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('lider/edit_e',$data);
        $this->load->view('template/footers');
    }

    public function update_evento()
    {
            $u = $this->security->xss_clean($this->input->post('nombre_evento'));
            $id = $this->security->xss_clean($this->input->post('id'));
            $data = array(
                'nombre_evento' => $this->input->post('nombre_evento'),
                'municipio_id' => $this->input->post('municipio_id'),
                'fecha' => $this->input->post('fecha'),
                'hora' => $this->input->post('hora')
            );
            $this->session->set_flashdata('success', 'Se ha editado correctamente al usuario:  <b>'.$u.'</b>!');
            $this->Lider_model->update_eventos($id,$data);
            redirect('lider/editar_eventos');
    }

    public function deletes($id)
    {
        $u = $this->security->xss_clean($this->input->post('nombre_evento'));
        $this->session->set_flashdata('success', 'Se ha eliminado correctamente el evento: <b>'.$u.'</b>!');
        $this->Lider_model->delete_evento($id);
        redirect('lider/editar_eventos');

    }



}
