<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro_model extends CI_Model {


    function registro_investigador($datas)
    {
        return $this->db->insert('usuarios',$datas);
    }




}

/* End of file Registro_model.php */
/* Location: ./application/models/Registro_model.php */