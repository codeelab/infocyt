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
        
        $this->load->view('theme/header');
        $this->load->view('theme/nav');
        $this->load->view('pages/'.$pages);
        $this->load->view('theme/footer');
    }



}
