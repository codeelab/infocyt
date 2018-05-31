<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personacyt_model extends CI_Model {

    
    public function usuarios()
    {
        $query = $this->db->query('SELECT COUNT(id_constancias) as usuarios FROM constancias');

        if ($query->num_rows() > 0) {
            return $query->result();
         }else{
            return false;
         }


    }


    public function getUsuariosTa()
    {
        $query = $this->db->query('SELECT COUNT(id_constancias) AS talleristas FROM constancias WHERE tipo_id = 2');

        if ($query->num_rows() > 0) {
            return $query->result();
         }else{
            return false;
         }
    }

    public function getUsuariosCo()
    {
        $query = $this->db->query('SELECT COUNT(id_constancias) AS coordinadores FROM constancias WHERE tipo_id = 1');

        if ($query->num_rows() > 0) {
            return $query->result();
         }else{
            return false;
         }
    }


    public function eventos()
    {
        $query = $this->db->query('SELECT COUNT(id_evento) as eventos FROM eventos');

        if ($query->num_rows() > 0) {
            return $query->result();
         }else{
            return false;
         }


    }


    public function municipios()
  {
    $query = $this->db->query('SELECT count(municipios_id) AS municipios FROM constancias');

    if ($query->num_rows() > 0) {
        return $query->result();
     }else{
        return false;
     }
  }


    public function getUsuarios()
    {
        $this->db->select('id_constancias, tipo_id, nombre_evento, fecha_evento, nombre_usuario, nombre_mun');
        $this->db->from('constancias');
        $this->db->join('eventos', 'id_evento = evento_id');
        $this->db->join('municipio', 'id_municipio = municipios_id');

        $query = $this->db->get();
        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

    public function getEventos()
    {
        $this->db->select('*');
        $this->db->from('eventos');
        $this->db->join('municipio', 'id_municipio = municipio_id');
        $this->db->order_by('fecha', 'ASC');

        $query = $this->db->get();
        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }


    public function getEvent()
    {
        $this->db->select('*');
        $this->db->from('eventos');
        $this->db->join('municipio', 'id_municipio = municipio_id');
        $this->db->order_by('fecha', 'ASC');

        $query = $this->db->get();
        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

    public function getMunicipios()
    {
        $this->db->select('nombre_mun, COUNT(municipios_id) AS total_mun');
        $this->db->from('constancias');
        $this->db->join('municipio', 'id_municipio = municipios_id');
        $this->db->group_by('municipios_id');

        $query = $this->db->get();
        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }


    public function selectUsuario()
    {
        $tipo = $this->db->get('tipo');
            if($tipo->num_rows() > 0)
            {
                return $tipo->result();
            }
    }


    public function selectMunicipios()
    {
        $mun = $this->db->get('municipio');
            if($mun->num_rows() > 0)
            {
                return $mun->result();
            }
    }

    public function selectEventos()
    {
        $eve = $this->db->get('eventos');
            if($eve->num_rows() > 0)
            {
                return $eve->result();
            }
    }


    public function registro_usuarios($datas)
    {
        return $this->db->insert('constancias',$datas);
    }

    public function registro_eventos($datas)
    {
        return $this->db->insert('eventos',$datas);
    }


///////////////////////////////////////////////////////////////////////////////////////

// CONTENIDO PARA EDITAR Y ELIMINAR A LOS USUARIOS GENERADOS EN TALLERISTAS

///////////////////////////////////////////////////////////////////////////////////////

    public function get_usuarios($id)
    {
        $this->db->select('id_constancias, tipo_id, nombre_evento, fecha_evento, nombre_usuario, nombre_mun, nombre_tipo');
        $this->db->from('constancias');
        $this->db->join('eventos', 'id_evento = evento_id');
        $this->db->join('municipio', 'id_municipio = municipios_id');
        $this->db->join('tipo', 'id_tipo = tipo_id');
        $this->db->where('id_constancias',$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

    public function update_usuario($id, $data)
    {
        $this->db->where('id_constancias',$id);
        return $this->db->update('constancias', $data);
    }


    public function delete_usuario($id)
    {
        $this->db->where('id_constancias',$id);
        $this->db->delete('constancias');
        return true;
    }


//////////////////////////////////////////////////////////////////////////////////////




///////////////////////////////////////////////////////////////////////////////////////

// CONTENIDO PARA EDITAR Y ELIMINAR A LOS USUARIOS GENERADOS EN EVENTOS

///////////////////////////////////////////////////////////////////////////////////////

    public function get_eventos($id)
    {
        $this->db->select('*');
        $this->db->from('eventos');
        $this->db->join('municipio', 'id_municipio = municipio_id');
        $this->db->where('id_evento',$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

    public function update_eventos($id, $data)
    {
        $this->db->where('id_evento',$id);
        return $this->db->update('eventos', $data);
    }


    public function delete_evento($id)
    {
        $this->db->where('id_evento',$id);
        $this->db->delete('eventos');
        return true;
    }

//////////////////////////////////////////////////////////////////////////////////////




}

/* End of file Lider_model.php */
/* Location: ./application/models/Lider_model.php */

/* End of file Personacyt_model.php */
/* Location: ./application/models/Personacyt_model.php */