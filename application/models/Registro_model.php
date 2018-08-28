<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro_model extends CI_Model {


    function registro_investigador($datas, $reim)
    {

        $this->db->insert('usuarios',$datas);

        $ids = $this->db->insert_id();
        $fecha = date('Y-m-d');
        return $this->db->query("INSERT INTO reg_rim (usuario_id, num_rim, status_rim, fecha_captura) VALUES ('$ids', '$reim', '1', '$fecha') ");
        

    }




}

/* End of file Registro_model.php */
/* Location: ./application/models/Registro_model.php */