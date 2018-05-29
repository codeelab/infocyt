<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_model extends CI_Model {

    Public function __construct()
    {
        parent::__construct();
    }

/////////////////////////////////////////////////
//                                             //
//              REGISTRO INFOCYT               //
//                                             //
/////////////////////////////////////////////////



    function getEstados()
    {
        return $this->db->get('estado')->result();
    }

    
    function getCidades($id_estado)
    {
        return $this->db->select('m.id_municipio, m.nombre_mun')
                        ->from('estado e')
                        ->join('municipio m', 'e.id_estado = m.estado_id ')
                        ->where(array('m.estado_id' => $id_estado) )
                        ->get()->result();
    }

    function paises()
    {
        return $this->db->get('paises')->result();
    }


    function sexo()
    {
        $query = $this->db-> query('SELECT id_genero,nombre_gen FROM genero');

        if ($query->num_rows() > 0)
        {
            // almacenamos en una matriz bidimensional
            foreach($query->result() as $row)
               $arrDatos[htmlspecialchars($row->id_genero, ENT_QUOTES)] = htmlspecialchars($row->nombre_gen, ENT_QUOTES);
                $query->free_result();
                return $arrDatos;
         }
    }

    function nacionalidad()
    {
        $query = $this->db-> query('SELECT id_nacionalidad,nombre_nac FROM nacionalidad');

        if ($query->num_rows() > 0)
        {
            // almacenamos en una matriz bidimensional
            foreach($query->result() as $row)
               $arrDatos[htmlspecialchars($row->id_nacionalidad, ENT_QUOTES)] = htmlspecialchars($row->nombre_nac, ENT_QUOTES);
                $query->free_result();
                return $arrDatos;
         }
    }

    function civil()
    {
        $query = $this->db-> query('SELECT id_civil,nombre_civil FROM estado_civil');

        if ($query->num_rows() > 0)
        {
            // almacenamos en una matriz bidimensional
            foreach($query->result() as $row)
               $arrDatos[htmlspecialchars($row->id_civil, ENT_QUOTES)] = htmlspecialchars($row->nombre_civil, ENT_QUOTES);
                $query->free_result();
                return $arrDatos;
         }
    }

    public function isDuplicate($username)
    {
        $this->db->get_where('usuarios', array('username' => $username), 1);
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;
    }


    function disponibilidad_usuario()
    {
        $username = trim($this->input->post('username'));

        if(!$this->form_validation->is_unique($username, 'usuarios.username')){

            return false;

        }else{
            return true;
        }
    }


    function estado_sni()
    {
        $query = $this->db-> query('SELECT * FROM status_sni');

        if ($query->num_rows() > 0)
        {
            // almacenamos en una matriz bidimensional
            foreach($query->result() as $row)
               $arrDatos[htmlspecialchars($row->id_sni, ENT_QUOTES)] = htmlspecialchars($row->nombre_sni, ENT_QUOTES);
                $query->free_result();
                return $arrDatos;
         }
    }





}

/* End of file Pages_model.php */
/* Location: ./application/models/Pages_model.php */