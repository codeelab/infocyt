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

    public function rim($id)
    {
        $this->db->select('*');
        $this->db->from('reg_rim');
        $this->db->where('usuario_id',$id);

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
        $this->db->from('reg_congresos');
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
        return $this->db->insert('reg_congresos', $data);
    }

    //ELIMINA EL CONTENIDO PARA LOS CONGRESOS
    public function delete_congreso($id)
    {
        $this->db->where('id_congresos',$id);
        $this->db->delete('reg_congresos');
        return true;
    }



    //LISTA TODOS LOS RECONOCIMIENTOS REGISTRADOS POR USUARIO
    public function reconocimientos($id)
    {
        $this->db->select('*');
        $this->db->from('reg_reconocimientos');
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
                return $this->db->insert('reg_reconocimientos', $data);
            }


    //LISTA TODOS LOS IDIOMAS REGISTRADOS POR USUARIO
    public function idiomas($id)
    {
        $this->db->select('*');
        $this->db->from('reg_idiomas');
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
                return $this->db->insert('reg_idiomas', $data);
            }


    //LISTA TODOS LOS GRADOS ACADEMICOS REGISTRADOS POR USUARIO
    public function academica($id)
    {
        $this->db->select('*');
        $this->db->from('reg_academica');
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
                                ->order_by('descr_disciplina','ASC')
                                ->get()->result();
            }


            function sub($disciplina_id)
            {
                return $this->db->select('id_subdisciplinas, descr_subdisciplinas')
                                ->from('subdisciplinas')
                                ->where(array('disciplina_id' => $disciplina_id) )
                                ->order_by('descr_subdisciplinas','ASC')
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
                $sql = $this->db->query('SELECT id_dependencias, descr_dependencia FROM dependencias ORDER BY descr_dependencia ASC');
                foreach ($sql->result() as $reg)
                {
                    $data[$reg->id_dependencias] = $reg->descr_dependencia;
                }
                return $data;
            }

            //REGISTRA EL CONTENIDO PARA LOS DEPARTAMENTOS
            public function departamentos()
            {
                $sql = $this->db->query('SELECT id_departamentos, descr_departamentos FROM departamentos ORDER BY descr_departamentos ASC');
                foreach ($sql->result() as $reg)
                {
                    $data[$reg->id_departamentos] = $reg->descr_departamentos;
                }
                return $data;
            }

            //REGISTRA EL CONTENIDO PARA LOS RECONOCIMIENTOS
            public function alta_academica($data)
            {
                return $this->db->insert('reg_academica', $data);
            }



    //LISTA TODAS LOS ESTANCIAS DE INVESTIGACION REGISTRADAS POR USUARIO
    public function investigacion($id)
    {
        $this->db->select('*');
        $this->db->from('reg_investigacion');
        $this->db->join('empleadoras','entidad_empleadora_id = id_empleadoras','inner');
        $this->db->join('sector','sector_estancia_id = id_sector','inner');
        $this->db->join('dependencias','dependencia_id = id_dependencias','inner');
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
            function empleadoras()
            {
                return $this->db->get('empleadoras')->result();
            }



            //REGISTRA EL CONTENIDO PARA LOS RECONOCIMIENTOS
            public function alta_investigacion($data)
            {
                return $this->db->insert('reg_investigacion', $data);
            }



 //--------------------------------------------------------------------------
 // 
 // CONTENIDO PARA VENTANA PROFESIONAL
 //
 //--------------------------------------------------------------------------

    //LISTA TODAS LAS ADSCRIPCIONES
    public function adscripcion($id)
    {
        $this->db->select('*');
        $this->db->from('reg_adscripciones');
        $this->db->join('empleadoras','entidad_empleadora_id = id_empleadoras','inner');
        $this->db->join('sector','sector_estancia_id = id_sector','inner');
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
            public function alta_adscripcion($data)
            {
                return $this->db->insert('reg_adscripciones', $data);
            }


    //LISTA TODOS LOS DESARROLLOS
    public function desarrollos($id)
    {
        $this->db->select('*');
        $this->db->from('reg_desarrollos_tecnologicos');
        $this->db->join('tipo_autor','tipo_autor_id = id_tipo','inner');
        $this->db->join('area_conocimiento','campos_id = id_area_conocimiento','inner');
        $this->db->where('usuario_id',$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

            //REGISTRA EL CONTENIDO PARA LOS DESARROLLOS
            public function alta_desarrollos($data)
            {
                return $this->db->insert('reg_desarrollos_tecnologicos', $data);
            }

            //LISTA EL CONTENIDO PARA EL SECTOR ECONOMICO
            public function economico()
            {
                $sql = $this->db->query('SELECT * FROM sector_economico ORDER BY descr_economico ASC');
                foreach ($sql->result() as $reg)
                {
                    $data[$reg->id_economico] = $reg->descr_economico;
                }
                return $data;
            }


            function rama($economico_id)
            {
                return $this->db->select('id_rama, descr_rama')
                                ->from('rama_economica')
                                ->where(array('economico_id' => $economico_id) )
                                ->order_by('descr_rama','ASC')
                                ->get()->result();
            }


            function clases($rama_id)
            {
                return $this->db->select('id_clase, descr_clase')
                                ->from('clase_economica')
                                ->where(array('rama_id' => $rama_id) )
                                ->order_by('descr_clase','ASC')
                                ->get()->result();
            }

            //LISTA EL CONTENIDO PARA EL AUTOR
            public function autor()
            {
                $sql = $this->db->query('SELECT * FROM tipo_autor');
                foreach ($sql->result() as $reg)
                {
                    $data[$reg->id_tipo] = $reg->nombre_tipo;
                }
                return $data;
            }


    //LISTA TODOS LAS DIFUSIONES
    public function difusion($id)
    {
        $this->db->select('*');
        $this->db->from('reg_difusion');
        $this->db->join('tipo_participacion','participacion_id = id_tipo_participacion','inner');
        $this->db->where('usuario_id',$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

            //LISTA EL CONTENIDO PARA LOS SECTORES DIRIGIDOS
            function sector_dir()
            {
                $sql = $this->db->query('SELECT id_dirigido_sector, nombre_dirigido FROM dirigido_sector');
                foreach ($sql->result() as $reg)
                {
                    $data[$reg->id_dirigido_sector] = $reg->nombre_dirigido;
                }
                return $data;
            }

            //LISTA EL CONTENIDO PARA LOS TIPOS DE PARTICIPACIÓN
            function tipo_part()
            {
                $sql = $this->db->query('SELECT id_tipo_participacion, nombre_participacion FROM tipo_participacion');
                foreach ($sql->result() as $reg)
                {
                    $data[$reg->id_tipo_participacion] = $reg->nombre_participacion;
                }
                return $data;
            }

            //REGISTRA EL CONTENIDO PARA DIFUSIÓN Y DIVULGACIÓN
            public function alta_difusion($data)
            {
                return $this->db->insert('reg_difusion', $data);
            }


    //LISTA TODAS LAS EXPERIENCIAS PROFESIONALES
    public function experiencia($id)
    {
        $this->db->select('*');
        $this->db->from('reg_experiencia');
        $this->db->join('dirigido_sector','id_dirigido_sector = entidad_id','LEFT');
        $this->db->where('usuario_id',$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

            //REGISTRA EL CONTENIDO PARA LAS EXPERIENCIAS PROFESIONALES
            public function alta_experiencia($data)
            {
                return $this->db->insert('reg_experiencia', $data);
            }



    //LISTA TODAS LAS DOCENCIAS
    public function docencia($id)
    {
        $this->db->select('*');
        $this->db->from('reg_docencia');
        $this->db->where('usuario_id',$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

            //REGISTRA EL CONTENIDO PARA DOCENCIAS
            public function alta_docencia($data)
            {
                return $this->db->insert('reg_docencia', $data);
            }




    //LISTA TODAS LAS DOCENCIAS
    public function tesis($id)
    {
        $this->db->select('*');
        $this->db->from('reg_tesis');
        $this->db->join('grado','grado_id = id_grado','inner');
        $this->db->where('usuario_id',$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

            //REGISTRA EL CONTENIDO PARA TESÍS
            public function alta_tesis($data)
            {
                return $this->db->insert('reg_tesis', $data);
            }


 //--------------------------------------------------------------------------
 // 
 // CONTENIDO PARA VENTANA PUBLICACIONES
 //
 //--------------------------------------------------------------------------


    //LISTA TODAS LOS CAPITULOS DE LIBRO
    public function capitulos($id)
    {
        $this->db->select('*');
        $this->db->from('reg_capitulo');
        $this->db->where('usuario_id',$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

            //REGISTRA EL CONTENIDO PARA TESÍS
            public function alta_capitulo($data)
            {
                return $this->db->insert('reg_capitulo', $data);
            }

    //LISTA TODOS LOS ARTICULOS
    public function articulos($id)
    {
        $this->db->select('*');
        $this->db->from('reg_articulos');
        $this->db->join('estatus_articulo','estatus_articulo_id = id_estatus_articulos','inner');
        $this->db->where('usuario_id',$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

            //LISTA EL CONTENIDO PARA EL ESTATUS DEL ARTICULO
            public function estatus_articulo()
            {
                $sql = $this->db->query('SELECT * FROM estatus_articulo');
                foreach ($sql->result() as $reg)
                {
                    $data[$reg->id_estatus_articulos] = $reg->nombre_estatus;
                }
                return $data;
            }


            //REGISTRA EL CONTENIDO PARA TESÍS
            public function alta_articulos($data)
            {
                return $this->db->insert('reg_articulos', $data);
            }


    //LISTA TODOS LOS LIBROS
    public function libros($id)
    {
        $this->db->select('*');
        $this->db->from('reg_libros');
        //$this->db->join('estatus_articulo','estatus_articulo_id = id_estatus_articulos','inner');
        $this->db->where('usuario_id',$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

            //LISTA EL CONTENIDO PARA EL ESTATUS DEL ARTICULO
            public function librox()
            {
                $sql = $this->db->query('SELECT * FROM tipo_libro');
                foreach ($sql->result() as $reg)
                {
                    $data[$reg->id_tipo_libro] = $reg->nombre_libro;
                }
                return $data;
            }

            //REGISTRA EL CONTENIDO PARA Publicación de Libro
            public function alta_libros($data)
            {
                return $this->db->insert('reg_libros', $data);
            }


    //LISTA TODOS LOS REPORTES TECNICOS
    public function reportes($id)
    {
        $this->db->select('*');
        $this->db->from('reg_reporte_tecnico');
        //$this->db->join('estatus_articulo','estatus_articulo_id = id_estatus_articulos','inner');
        $this->db->where('usuario_id',$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

            //REGISTRA EL CONTENIDO PARA REPORTE TÉCNICO
            public function alta_reportes($data)
            {
                return $this->db->insert('reg_reporte_tecnico', $data);
            }


    //LISTA TODAS LAS RESEÑAS
    public function resenas($id)
    {
        $this->db->select('*');
        $this->db->from('reg_resenas');
        $this->db->join('tipo_publicacion','id_tipo_publicacion = tipo_publicacion_id','LEFT');
        $this->db->where('usuario_id',$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

            //LISTA EL CONTENIDO PARA EL TIPO DE PUBLICACIÓN
            public function tipo_publicacion()
            {
                $sql = $this->db->query('SELECT * FROM tipo_publicacion ORDER BY nombre_publicacion ASC');
                foreach ($sql->result() as $reg)
                {
                    $data[$reg->id_tipo_publicacion] = $reg->nombre_publicacion;
                }
                return $data;
            }

            //REGISTRA EL CONTENIDO PARA REPORTE TÉCNICO
            public function alta_resenas($data)
            {
                return $this->db->insert('reg_resenas', $data);
            }

    //LISTA TODOS LOS FINANCIAMIENTOS
    public function financiamientos($id)
    {
        $this->db->select('*');
        $this->db->from('reg_financiamiento');
        $this->db->join('tipo_apoyo','tipo_apoyo_id = id_tipo_apoyo','inner');
        $this->db->join('tipo_programa','tipo_programa_id = id_tipo_programa','inner');
        $this->db->where('usuario_id',$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

            //LISTA EL CONTENIDO PARA EL TIPO DE APOYO
            public function tipo_apoyo()
            {
                $sql = $this->db->query('SELECT * FROM tipo_apoyo ORDER BY nombre_apoyo ASC');
                foreach ($sql->result() as $reg)
                {
                    $data[$reg->id_tipo_apoyo] = $reg->nombre_apoyo;
                }
                return $data;
            }

            //LISTA EL CONTENIDO PARA EL TIPO DE PROGRAMA
            public function tipo_programa()
            {
                $sql = $this->db->query('SELECT * FROM tipo_programa ORDER BY nombre_programa ASC');
                foreach ($sql->result() as $reg)
                {
                    $data[$reg->id_tipo_programa] = $reg->nombre_programa;
                }
                return $data;
            }
            //REGISTRA EL CONTENIDO PARA REPORTE TÉCNICO
            public function alta_financiamiento($data)
            {
                return $this->db->insert('reg_financiamiento', $data);
            }


    //LISTA TODOS LOS GRUPOS
    public function grupos($id)
    {
        $this->db->select('*');
        $this->db->from('reg_grupos');
       $this->db->join('dirigido_sector','id_dirigido_sector = sectores_id','inner');
        $this->db->where('usuario_id',$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

            //REGISTRA EL CONTENIDO PARA GRUPOS
            public function alta_grupos($data)
            {
                return $this->db->insert('reg_grupos', $data);
            }



    //LISTA TODAS LAS PATENTES
    public function patentes($id)
    {
        $this->db->select('*');
        $this->db->from('reg_patente');
        $this->db->join('tipo_patente','tipo_patente_id = id_tipo_patente','inner');
        $this->db->where('usuario_id',$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

            //LISTA EL CONTENIDO PARA EL TIPO DE PATENTE
            public function tipo_patente()
            {
                $sql = $this->db->query('SELECT * FROM tipo_patente ORDER BY nombres_tipo ASC');
                foreach ($sql->result() as $reg)
                {
                    $data[$reg->id_tipo_patente] = $reg->nombres_tipo;
                }
                return $data;
            }

            //REGISTRA EL CONTENIDO PARA LAS PATENTES
            public function alta_patentes($data)
            {
                return $this->db->insert('reg_patente', $data);
            }


    //LISTA TODOS LAS PROYECTOS
    public function proyectos($id)
    {
        $this->db->select('*');
        $this->db->from('reg_proyectos');
        $this->db->join('tipo_proyecto','tipo_proyecto_id = id_tipo_proyecto','inner');
        $this->db->where('usuario_id',$id);

        $query = $this->db->get();
        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }


            //LISTA EL CONTENIDO PARA EL TIPO DE PATENTE
            public function tipo_proyecto()
            {
                $sql = $this->db->query('SELECT * FROM tipo_proyecto ORDER BY nombre_tipo_proyecto ASC');
                foreach ($sql->result() as $reg)
                {
                    $data[$reg->id_tipo_proyecto] = $reg->nombre_tipo_proyecto;
                }
                return $data;
            }


            //REGISTRA EL CONTENIDO PARA LAS PATENTES
            public function alta_proyectos($data)
            {
                return $this->db->insert('reg_proyectos', $data);
            }



    public function congreso_pdf($id)
    {
        $this->db->select('id_congresos, id_usuario, nombre, a_paterno, a_materno, nombre_sni, correo_personal, titulo, anio_publicacion, descr_mezcla, fecha_inicio, fecha_final, nombre_organizador, nombre_pa, fecha_captura');
        $this->db->from('reg_congresos');
        $this->db->join('usuarios','id_usuario = usuario_id','inner');
        $this->db->join('status_sni','id_sni = estado_sni','inner');
        $this->db->join('paises','id_paises = paises_id','inner');
        $this->db->where('id_congresos',$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

    public function reconocimiento_pdf($id)
    {
        $this->db->select('id_reconocimientos, id_usuario, nombre, a_paterno, a_materno, correo_personal, descripcion, anio_reconocimiento, inst_otorga, nombre_pa, dependencia');
        $this->db->from('reg_reconocimientos');
        $this->db->join('usuarios','id_usuario = usuario_id','inner');
        $this->db->join('paises','id_paises = paises_id','inner');
        $this->db->where('id_reconocimientos',$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

    public function idioma_pdf($id)
    {
        $this->db->select('*');
        $this->db->from('reg_idiomas');
        $this->db->join('usuarios','id_usuario = usuario_id','inner');
        $this->db->join('lenguaje','id_lenguaje = lenguaje_id','inner');
        $this->db->join('niveles','id_niveles = nivel_habla_id','inner');
        $this->db->where('id_idiomas',$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

    public function academica_pdf($id)
    {
        $this->db->select('*');
        $this->db->from('reg_academica');
        $this->db->join('usuarios','id_usuario = usuario_id','left');
        $this->db->join('grado','id_grado = grado_id','left');
        $this->db->join('paises','id_paises = paises_id','left');
        $this->db->join('estado','id_estado = estados_id','left');
        $this->db->join('campo_conocimiento','id_conocimiento = campo_id','left');
        $this->db->join('disciplinas','id_disciplina = disciplina_id','left');
        $this->db->join('subdisciplinas','id_subdisciplinas = subdisciplina_id','left');
        $this->db->join('estatus_grado','id_est_grado = estatus_id','left');
        $this->db->join('sector','id_sector = sector_id','left');
        $this->db->where('id_academica',$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

    public function investigacion_pdf($id)
    {
        $this->db->select('id_usuario, id_investigacion, nombre, a_paterno, a_materno, fecha_inicio,fecha_fin,nombre_ent,nom_empleador,descrp_entidad,descr_sector,institucion_empleadora,descr_dependencia,descr_departamentos,descrp_estancia');
        $this->db->from('reg_investigacion');
        $this->db->join('usuarios','id_usuario = usuario_id','INNER');
        $this->db->join('empleadoras','id_empleadoras = entidad_empleadora_id','LEFT');
        $this->db->join('sector','id_sector = sector_estancia_id','LEFT');
        $this->db->join('dependencias','id_dependencias = dependencia_id','LEFT');
        $this->db->join('departamentos','id_departamentos = departamento_id','LEFT');
        $this->db->where('id_investigacion',$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }


    public function adscripcion_pdf($id)
    {
        $this->db->select('*');
        $this->db->from('reg_adscripciones');
        $this->db->join('usuarios','id_usuario = usuario_id','INNER');
        $this->db->join('empleadoras','id_empleadoras = entidad_empleadora_id','LEFT');
        $this->db->join('sector','id_sector = sector_estancia_id','LEFT');
        $this->db->join('estado','id_estado = estados_id','LEFT');
        $this->db->join('municipio','id_municipio = municipio_id','LEFT');
        $this->db->join('paises','id_paises = paises_id','LEFT');
        $this->db->join('dependencias','id_dependencias = dependencia_id','LEFT');
        $this->db->join('departamentos','id_departamentos = departamento_id','LEFT');
        $this->db->where('id_adscripcion',$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }


    public function desarrollos_pdf($id)
    {
        $this->db->select('*');
        $this->db->from('reg_desarrollos_tecnologicos');
        $this->db->join('usuarios','id_usuario = usuario_id','INNER');
        $this->db->join('tipo_autor','id_tipo = tipo_autor_id','LEFT');
        $this->db->join('sector','id_sector = sector_id','LEFT');
        $this->db->join('paises','id_paises = paises_id','LEFT');
        $this->db->join('dependencias','id_dependencias = dependencia_id','LEFT');
        $this->db->join('departamentos','id_departamentos = departamento_id','LEFT');
        $this->db->join('campo_conocimiento','id_conocimiento = campos_id','LEFT');
        $this->db->join('disciplinas','id_disciplina = disciplina_id','LEFT');
        $this->db->join('subdisciplinas','id_subdisciplinas = subdisciplina_id','LEFT');
        $this->db->join('sector_economico','id_economico = economico_id','LEFT');
        $this->db->join('rama_economica','id_rama = rama_id','LEFT');
        $this->db->join('clase_economica','id_clase = clase_id','LEFT');
        $this->db->where('id_desarrollos',$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

    public function difusion_pdf($id)
    {
        $this->db->select('*');
        $this->db->from('reg_difusion');
        $this->db->join('usuarios','id_usuario = usuario_id','INNER');
        $this->db->join('tipo_participacion','id_tipo_participacion = participacion_id','LEFT');
        $this->db->join('dirigido_sector','id_dirigido_sector = dirigido_id','LEFT');
        $this->db->where('id_difusion',$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

    public function experiencia_pdf($id)
    {
        $this->db->select('*');
        $this->db->from('reg_experiencia');
        $this->db->join('usuarios','id_usuario = usuario_id','INNER');
        $this->db->join('dirigido_sector','id_dirigido_sector = entidad_id','LEFT');
        $this->db->join('paises','id_paises = paises_id','LEFT');
        $this->db->join('campo_conocimiento','id_conocimiento = campos_id','LEFT');
        $this->db->join('disciplinas','id_disciplina = disciplina_id','LEFT');
        $this->db->join('subdisciplinas','id_subdisciplinas = subdisciplina_id','LEFT');
        $this->db->join('sector','id_sector = sectores_id','LEFT');
        $this->db->join('dependencias','id_dependencias = dependencia_id','LEFT');
        $this->db->join('departamentos','id_departamentos = departamento_id','LEFT');
        $this->db->join('sector_economico','id_economico = economico_id','LEFT');
        $this->db->join('rama_economica','id_rama = rama_id','LEFT');
        $this->db->join('clase_economica','id_clase = clase_id','LEFT');

        
        $this->db->where('id_experiencia',$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }


    public function docencia_pdf($id)
    {
        $this->db->select('*');
        $this->db->from('reg_docencia');
        $this->db->join('usuarios','id_usuario = usuario_id','INNER');
        $this->db->join('empleadoras','entidad_empleadora_id = id_empleadoras','inner');
        $this->db->join('sector','id_sector = sectores_id','LEFT');
        $this->db->join('dependencias','id_dependencias = dependencia_id','LEFT');
        $this->db->join('departamentos','id_departamentos = departamento_id','LEFT');
        $this->db->join('grado','grado_id = id_grado','inner');
        $this->db->join('paises','id_paises = paises_id','LEFT');
        $this->db->join('campo_conocimiento','id_conocimiento = campos_id','LEFT');
        $this->db->join('disciplinas','id_disciplina = disciplina_id','LEFT');
        $this->db->join('subdisciplinas','id_subdisciplinas = subdisciplina_id','LEFT');
        $this->db->where('id_docencia',$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }


    public function tesis_pdf($id)
    {
        $this->db->select('*');
        $this->db->from('reg_tesis');
        $this->db->join('usuarios','id_usuario = usuario_id','INNER');
        $this->db->join('grado','grado_id = id_grado','inner');
        $this->db->join('paises','id_paises = paises_id','LEFT');
        $this->db->join('empleadoras','entidad_empleadora_id = id_empleadoras','inner');
        $this->db->join('sector','id_sector = sectores_id','LEFT');
        $this->db->join('dependencias','id_dependencias = dependencia_id','LEFT');
        $this->db->join('departamentos','id_departamentos = departamento_id','LEFT');
        $this->db->join('campo_conocimiento','id_conocimiento = campos_id','LEFT');
        $this->db->join('disciplinas','id_disciplina = disciplina_id','LEFT');
        $this->db->join('subdisciplinas','id_subdisciplinas = subdisciplina_id','LEFT');
        $this->db->where('id_tesis',$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

    public function capitulo_pdf($id)
    {
        $this->db->select('*');
        $this->db->from('reg_capitulo');
        $this->db->join('usuarios','id_usuario = usuario_id','INNER');
        $this->db->join('tipo_autor','id_tipo = tipo_autor_id','LEFT');
        $this->db->join('paises','id_paises = paises_id','LEFT');
        $this->db->join('campo_conocimiento','id_conocimiento = campos_id','LEFT');
        $this->db->join('disciplinas','id_disciplina = disciplina_id','LEFT');
        $this->db->join('subdisciplinas','id_subdisciplinas = subdisciplina_id','LEFT');
        $this->db->where('id_capitulos',$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

    public function articulos_pdf($id)
    {
        $this->db->select('*');
        $this->db->from('reg_articulos');
        $this->db->join('usuarios','id_usuario = usuario_id','INNER');
        $this->db->join('tipo_autor','id_tipo = tipo_autor_id','LEFT');
        $this->db->join('estatus_articulo','id_estatus_articulos = estatus_articulo_id','LEFT');
        $this->db->join('paises','id_paises = paises_id','LEFT');
        $this->db->join('campo_conocimiento','id_conocimiento = campos_id','LEFT');
        $this->db->join('disciplinas','id_disciplina = disciplina_id','LEFT');
        $this->db->join('subdisciplinas','id_subdisciplinas = subdisciplina_id','LEFT');
        $this->db->where('id_articulos',$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

    public function libro_pdf($id)
    {
        $this->db->select('*');
        $this->db->from('reg_libros');
        $this->db->join('usuarios','id_usuario = usuario_id','INNER');
        $this->db->join('tipo_libro','id_libros = tipo_libro_id','LEFT');
        $this->db->join('tipo_autor','id_tipo = tipo_autor_id','LEFT');
        $this->db->join('paises','id_paises = paises_id','LEFT');
        $this->db->join('campo_conocimiento','id_conocimiento = campos_id','LEFT');
        $this->db->join('disciplinas','id_disciplina = disciplina_id','LEFT');
        $this->db->join('subdisciplinas','id_subdisciplinas = subdisciplina_id','LEFT');
        $this->db->join('lenguaje','id_lenguaje = lenguaje_id','LEFT');
        $this->db->where('id_libros',$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

    public function reporte_pdf($id)
    {
        $this->db->select('*');
        $this->db->from('reg_reporte_tecnico');
        $this->db->join('usuarios','id_usuario = usuario_id','INNER');
        $this->db->join('tipo_autor','id_tipo = tipo_autor_id','LEFT');
        $this->db->where('id_reporte',$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

    public function resena_pdf($id)
    {
        $this->db->select('*');
        $this->db->from('reg_resenas');
        $this->db->join('usuarios','id_usuario = usuario_id','INNER');
        $this->db->join('tipo_autor','id_tipo = tipo_autor_id','LEFT');
        $this->db->join('paises','id_paises = paises_id','LEFT');
        $this->db->join('tipo_publicacion','id_tipo_publicacion = tipo_publicacion_id','LEFT');
        $this->db->join('campo_conocimiento','id_conocimiento = campos_id','LEFT');
        $this->db->join('disciplinas','id_disciplina = disciplina_id','LEFT');
        $this->db->join('subdisciplinas','id_subdisciplinas = subdisciplina_id','LEFT');
        $this->db->where('id_resena',$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }


    public function financiamiento_pdf($id)
    {
        $this->db->select('*');
        $this->db->from('reg_financiamiento');
        $this->db->join('usuarios','id_usuario = usuario_id','INNER');
        $this->db->join('tipo_apoyo','id_tipo_apoyo = tipo_apoyo_id','LEFT');
        $this->db->join('tipo_programa','id_tipo_programa = tipo_programa_id','LEFT');
        $this->db->where('id_financiamiento',$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

    public function grupos_pdf($id)
    {
        $this->db->select('*');
        $this->db->from('reg_grupos');
        $this->db->join('usuarios','id_usuario = usuario_id','INNER');
        $this->db->join('dirigido_sector','id_dirigido_sector = sectores_id','LEFT');
        $this->db->join('dependencias','id_dependencias = dependencia_id','LEFT');
        $this->db->join('departamentos','id_departamentos = departamento_id','LEFT');
        $this->db->where('id_grupos',$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

    public function patentes_pdf($id)
    {
        $this->db->select('*');
        $this->db->from('reg_patente');
        $this->db->join('usuarios','id_usuario = usuario_id','INNER');
        $this->db->join('tipo_patente','id_tipo_patente = tipo_patente_id','LEFT');
        $this->db->join('tipo_autor','id_tipo = tipo_autor_id','LEFT');
        $this->db->join('paises','id_paises = paises_id','LEFT');
        $this->db->join('sector_economico','id_economico = economico_id','LEFT');
        $this->db->join('rama_economica','id_rama = rama_id','LEFT');
        $this->db->join('clase_economica','id_clase = clase_id','LEFT');
        $this->db->where('id_patente',$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

    public function proyectos_pdf($id)
    {
        $this->db->select('*');
        $this->db->from('reg_proyectos');
        $this->db->join('usuarios','id_usuario = usuario_id','INNER');
        $this->db->join('tipo_proyecto','tipo_proyecto_id = id_tipo_proyecto','LEFT');
        $this->db->join('empleadoras','id_empleadoras = entidad_empleadora_id','LEFT');
        $this->db->join('sector','id_sector = sector_id','LEFT');
        $this->db->join('dependencias','id_dependencias = dependencia_id','LEFT');
        $this->db->join('departamentos','id_departamentos = departamento_id','LEFT');
        $this->db->join('campo_conocimiento','id_conocimiento = campos_id','LEFT');
        $this->db->join('disciplinas','id_disciplina = disciplina_id','LEFT');
        $this->db->join('subdisciplinas','id_subdisciplinas = subdisciplina_id','LEFT');
        $this->db->join('sector_economico','id_economico = economico_id','LEFT');
        $this->db->join('rama_economica','id_rama = rama_id','LEFT');
        $this->db->join('clase_economica','id_clase = clase_id','LEFT');
        $this->db->where('id_proyectos',$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }


    public function datoss_pdf($id)
    {
        $this->db->select('c.id_usuario, c.nombre, c.a_paterno, c.a_materno, b.nombre_entidad, c.rfc, a.institucion');
        $this->db->from('reg_academica a','reg_adscripciones b','usuarios c');
        $this->db->from('reg_adscripciones b');
        $this->db->from('usuarios c');
        $this->db->limit('1');
        $this->db->where('id_usuario',$id);

        $query = $this->db->get();

        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }

    public function datos_pdf($id)
    {
        $this->db->select('c.id_usuario, c.nombre, c.a_paterno, c.a_materno,c.rfc, d.descr_grado, a.institucion');
        $this->db->from('reg_academica a');
        $this->db->join('usuarios c','c.id_usuario = a.usuario_id','INNER');
        $this->db->join('grado d','d.id_grado = a.grado_id','INNER');
        $this->db->limit('1');
        $this->db->where('id_usuario = 1');

        $query = $this->db->get();

        if ($query->num_rows() > 0 ) 
        {
            return $query->result();

        }else{

            return false;
        }
    }


}


/* End of file Personacyt_model.php */
/* Location: ./application/models/Personacyt_model.php */