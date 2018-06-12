<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personacyt_model extends CI_Model {

    
    public function usuario($id)
    {
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->join('paises p','pais_id = p.id_paises','inner');
        $this->db->join('estado_civil','estado_civil = id_civil','inner');
        $this->db->join('nacionalidad','nacionalidad = id_nacionalidad','inner');
        $this->db->join('estado','estado_id = id_estado','inner');
        $this->db->join('municipio','municipio_id = id_municipio','inner');
        $this->db->where('id_usuario',$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }


    }

 //--------------------------------------------------------------------------
 // 
 // CONTENIDO PARA VENTANA GENERALES
 //
 //--------------------------------------------------------------------------



 //--------------------------------------------------------------------------
 // LISTA EL CONTENIDO POR PAÍS
 //--------------------------------------------------------------------------
    function getDatosPais(){

        $query = $this->db->query('SELECT * FROM paises');
        return $query->result_array();

    }


 //--------------------------------------------------------------------------
 // LISTA EL CONTENIDO POR ESTADO CIVIL
 //--------------------------------------------------------------------------
    function getDatosCivil(){

        $query = $this->db->query('SELECT * FROM estado_civil');
        return $query->result_array();

    }

 //--------------------------------------------------------------------------
 // LISTA EL CONTENIDO POR NACIONALIDAD
 //--------------------------------------------------------------------------
    function nacionalidad(){

        $query = $this->db->query('SELECT * FROM nacionalidad');
        return $query->result_array();

    }





 //--------------------------------------------------------------------------
 // 
 // CONTENIDO PARA VENTANA ACADÉMICA
 //
 //--------------------------------------------------------------------------

    //LISTA TODOS LOS CONGRESOS REGISTRADOS POR USUARIO
    public function congresos($id)
    {
        $this->db->select('*');
        $this->db->from('congresos');
        $this->db->join('paises p','paises_id = p.id_paises','inner');
        $this->db->where('usuario_id',$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

    //REGISTRA EL CONTENIDO PARA LOS CONGRESOS
    public function alta_congreso($data)
    {
        return $this->db->insert('congresos', $data);
    }

    //ELIMINA EL CONTENIDO PARA LOS CONGRESOS
    public function delete_congreso($id)
    {
        $this->db->where('id_congresos',$id);
        $this->db->delete('congresos');
        return true;
    }




}

/* End of file Lider_model.php */
/* Location: ./application/models/Lider_model.php */

/* End of file Personacyt_model.php */
/* Location: ./application/models/Personacyt_model.php */