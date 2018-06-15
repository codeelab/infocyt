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



    //LISTA TODOS LOS RECONOCIMIENTOS REGISTRADOS POR USUARIO
    public function reconocimientos($id)
    {
        $this->db->select('*');
        $this->db->from('reconocimientos');
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

            //REGISTRA EL CONTENIDO PARA LOS RECONOCIMIENTOS
            public function alta_reconocimientos($data)
            {
                return $this->db->insert('reconocimientos', $data);
            }


    //LISTA TODOS LOS IDIOMAS REGISTRADOS POR USUARIO
    public function idiomas($id)
    {
        $this->db->select('*');
        $this->db->from('idiomas');
        $this->db->join('lenguaje l','lenguaje_id = l.id_lenguaje','inner');
        $this->db->where('usuario_id',$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }
            //LISTA EL CONTENIDO PARA LOS NIVELES
            function nivel()
            {
                return $this->db->get('niveles')->result();
            }

            //LISTA EL CONTENIDO PARA LOS LENGUAJES
            function lenguaje()
            {
                return $this->db->get('lenguaje')->result();
            }


            //REGISTRA EL CONTENIDO PARA LOS RECONOCIMIENTOS
            public function alta_idiomas($data)
            {
                return $this->db->insert('idiomas', $data);
            }


    //LISTA TODOS LOS GRADOS ACADEMICOS REGISTRADOS POR USUARIO
    public function academica($id)
    {
        $this->db->select('*');
        $this->db->from('academica');
        $this->db->join('grado','grado_id = id_grado','inner');
        $this->db->join('paises','paises_id = id_paises','inner');
        $this->db->join('disciplinas','disciplina_id = id_disciplina','inner');
        $this->db->where('usuario_id',$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }
            //LISTA EL CONTENIDO PARA LOS GRADOS
            function grado()
            {
                return $this->db->get('grado')->result();
            }


            //REGISTRA EL CONTENIDO PARA LOS RECONOCIMIENTOS
            public function conocimiento()
            {
                $sql = $this->db->query('SELECT id_conocimiento, descr_conocimiento FROM campo_conocimiento');
                foreach ($sql->result() as $reg)
                {
                    $data[$reg->id_conocimiento] = $reg->descr_conocimiento;
                }
                return $data;
            }


            function dis($campo_id)
            {
                return $this->db->select('id_disciplina, descr_disciplina')
                                ->from('disciplinas')
                                ->where(array('conocimiento_id' => $campo_id) )
                                ->get()->result();
            }


            function sub($disciplina_id)
            {
                return $this->db->select('id_subdisciplinas, descr_subdisciplinas')
                                ->from('subdisciplinas')
                                ->where(array('disciplina_id' => $disciplina_id) )
                                ->get()->result();
            }


            //LISTA EL CONTENIDO PARA LOS ESTATUS DEL GRADO
            function est_grado()
            {
                return $this->db->get('estatus_grado')->result();
            }

            //LISTA EL CONTENIDO PARA LOS SECTORES
            function sector()
            {
                return $this->db->get('sector')->result();
            }

            //REGISTRA EL CONTENIDO PARA LAS DEPENDENCIAS
            public function dependencias()
            {
                $sql = $this->db->query('SELECT id_dependencias, descr_dependencia FROM dependencias');
                foreach ($sql->result() as $reg)
                {
                    $data[$reg->id_dependencias] = $reg->descr_dependencia;
                }
                return $data;
            }

            function departamentos($dependencia_id)
            {
                return $this->db->select('id_departamentos, descr_departamentos')
                                ->from('departamentos')
                                ->where(array('dependencia_id' => $dependencia_id) )
                                ->get()->result();
            }

            //REGISTRA EL CONTENIDO PARA LOS RECONOCIMIENTOS
            public function alta_academica($data)
            {
                return $this->db->insert('academica', $data);
            }




}

/* End of file Lider_model.php */
/* Location: ./application/models/Lider_model.php */

/* End of file Personacyt_model.php */
/* Location: ./application/models/Personacyt_model.php */