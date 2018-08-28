$(document).ready(function(){
    $("#registro_personacyt").bootstrapValidator({
        feedbackIcons: {
            valid: 'fas fa-check',
            invalid: 'fas fa-times',
            validating: 'fas fa-redo'
        },
        fields:{
            titulo:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el Título. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            descr_mezcla:{
                validators:{
                    notEmpty:{
                        message:"Es requerida la descripción del Congreso. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            nombre_organizador:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el Nombre del Oganizador. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            paises_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el País del Evento."
                    }
                }
            },
            descripcion:{
                validators:{
                    notEmpty:{
                        message:"Es requerida la descripción del Reconocimiento. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            anio_reconocimiento: {
                validators: {
                    date: {
                        format: 'YYYY-MM-DD',
                        message: 'La fecha no es valida'
                    }
                }
            },
            inst_otorga:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el Nombre de la Institución Otorgante. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            paises_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el País Sede de la Institución."
                    }
                }
            },
            dependencia:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el Nombre de la Dependencia. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            lenguaje_id: {
                validators: {
                    notEmpty: {
                        message: 'Es necesario elija un Idioma'
                    }
                }
            },
            nivel_habla_id: {
                validators: {
                    notEmpty: {
                        message: 'Elija una opción.'
                    }
                }
            },
            nivel_lectura_id: {
                validators: {
                    notEmpty: {
                        message: 'Elija una opción.'
                    }
                }
            },
            nivel_escritura_id: {
                validators: {
                    notEmpty: {
                        message: 'Elija una opción.'
                    }
                }
            },
            fecha_acreditacion: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese año de acreditación.'
                    }
                }
            },
            titulo_obtenido:{
                validators:{
                    notEmpty:{
                        message:"Nombre del Título obtenido. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres alfabeticos."
                    }
                }
            },
            puntos_idioma: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese el puntaje.'
                    },
                    regexp: {
                        regexp:  /^([0-9])*$/,
                        message: 'No es un número válido.'
                    }
                }
            },
            fecha_terminacion: {
                validators: {
                    date: {
                        format: 'YYYY-MM-DD',
                        message: 'La fecha no es valida'
                    }
                }
            },
            grado_id: {
                validators: {
                    notEmpty: {
                        message: 'Elija una opción.'
                    }
                }
            },
            completado: {
                validators: {
                    notEmpty: {
                        message: 'Elija una opción.'
                    }
                }
            },
            descr_grado:{
                validators:{
                    notEmpty:{
                        message:"Nombre del Título obtenido. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres alfabeticos."
                    }
                }
            },
            estados_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el Estado."
                    }
                }
            },
            campos_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el Campo de Conocimiento."
                    }
                }
            },
            estatus_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerido la subdisciplina."
                    }
                }
            },
            institucion:{
                validators:{
                    notEmpty:{
                        message:"Nombre de la institucion. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            departamento:{
                validators:{
                    notEmpty:{
                        message:"Nombre del departamento. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Departamento Otorgante."
                    }
                }
            },
            descripcion_tesis:{
                validators:{
                    notEmpty:{
                        message:"Nombre de la tesís. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Descripción de la tesis."
                    }
                }
            },
            num_cedula:{
                validators:{
                    notEmpty:{
                        message:"Es requerida la CÉDULA."
                    }
                }
            },
            entidad_empleadora_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerida la entidad empleadora."
                    }
                }
            },
            nombre_ent:{
                validators:{
                    notEmpty:{
                        message:"Nombre de la Entidad. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            descrp_entidad:{
                validators:{
                    notEmpty:{
                        message:"Descripción de la Entidad. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            sector_estancia_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el sector de la estancia."
                    }
                }
            },
            institucion_empleadora:{
                validators:{
                    notEmpty:{
                        message:"Nombre de la institucion empleadora. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            dependencia_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerida la dependencia."
                    }
                }
            },
            descrp_estancia:{
                validators:{
                    notEmpty:{
                        message:"Descripción de la estancia. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            nombre_entidad:{
                validators:{
                    notEmpty:{
                        message:"Nombre de la Entidad. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            nombre_puesto:{
                validators:{
                    notEmpty:{
                        message:"Nombre del puesto ocupado. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            tel_pais:{
                validators: {
                    notEmpty: {
                        message: 'Ingrese su Número de Teléfono Entidad.'
                    },
                    regexp: {
                        regexp: /\(?([0-9]{3})\)?([ .-]?)([0-9]{2})\2([0-9]{2})/,
                        message: 'No es un teléfono válido.'
                    }
                }
            },
            tel_laboral:{
                validators: {
                    notEmpty: {
                        message: 'Ingrese su Número de Teléfono Laboral.'
                    },
                    regexp: {
                        regexp: /\(?([0-9]{3})\)?([ .-]?)([0-9]{2})\2([0-9]{2})/,
                        message: 'No es un teléfono válido.'
                    }
                }
            },
            domicilio_laboral:{
                validators:{
                    notEmpty:{
                        message:"Domicilio Laboral. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            estado_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el Estado."
                    }
                }
            },
            municipio_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el Municipio."
                    }
                }
            },
            codigo_postal: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese su Código Postal.'
                    },
                    regexp: {
                        regexp:  /^([1-9]{2}|[0-9][1-9]|[1-9][0-9])[0-9]{3}$/,
                        message: 'No es un código válido.'
                    }
                }
            },
            nombre_institucion:{
                validators:{
                    notEmpty:{
                        message:"Nombre de la Institución de la Entidad Empleadora. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            tipo_autor_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el tipo de Autor."
                    }
                }
            },
            total_autor: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese el número de autores.'
                    },
                    regexp: {
                        regexp:  /^([0-9])*$/,
                        message: 'No es un número válido.'
                    }
                }
            },
            nombre_autor:{
                validators:{
                    notEmpty:{
                        message:"Es requiro el nombre de Autor(es). "
                    }
                }
            },
            coautores:{
                validators:{
                    notEmpty:{
                        message:"Es requiro el nombre de Coautor(es). "
                    }
                }
            },
            descr_general:{
                validators:{
                    notEmpty:{
                        message:"Es requirida la descripción. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            sector_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el tipo de Autor."
                    }
                }
            },
            departamento_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el departamento."
                    }
                }
            },
            nom_institucion:{
                validators:{
                    notEmpty:{
                        message:"Es requirido el nombre de la institución. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            pal_clave:{
                validators:{
                    notEmpty:{
                        message:"Son requeridas las palabras clave. "
                    }
                }
            },
            descr_larga:{
                validators:{
                    notEmpty:{
                        message:"Es requirida la descripción. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            economico_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerida lel campo económico."
                    }
                }
            },
            titulo_difusion:{
                validators:{
                    notEmpty:{
                        message:"Es requirido el Título. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            dirigido_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo."
                    }
                }
            },
            participacion_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo."
                    }
                }
            },
            facilitadora:{
                validators:{
                    notEmpty:{
                        message:"Es requirido el Nombre. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            colaboradores:{
                validators:{
                    notEmpty:{
                        message:"Es requirido los Colaboradores. "
                    }
                }
            },
            beneficiario:{
                validators:{
                    notEmpty:{
                        message:"Es requirido los Beneficiarios. "
                    }
                }
            },
            duracion_act: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese las horas.'
                    },
                    regexp: {
                        regexp:  /^([0-9])*$/,
                        message: 'No es un número válido.'
                    }
                }
            },
            pal_clave01:{
                validators:{
                    notEmpty:{
                        message:"Es requirida la Palabra Clave. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            pal_clave02:{
                validators:{
                    notEmpty:{
                        message:"Es requirida la Palabra Clave. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            pal_clave03:{
                validators:{
                    notEmpty:{
                        message:"Es requirida la Palabra Clave. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            descripcion_larga:{
                validators:{
                    notEmpty:{
                        message:"Es requirida la Descripción. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            material:{
                validators:{
                    notEmpty:{
                        message:"Es requirido el Material. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            entidad_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerida la Entidad."
                    }
                }
            },
            nom_puesto:{
                validators:{
                    notEmpty:{
                        message:"Nombre de la Entidad. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            empleador:{
                validators:{
                    notEmpty:{
                        message:"Nombre del Empleador. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            sectores_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el sector."
                    }
                }
            },
            institucion_resp:{
                validators:{
                    notEmpty:{
                        message:"Nombre la Institución. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            descr_experiencia:{
                validators:{
                    notEmpty:{
                        message:"Descripción de la Experiencia Laboral. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            programa_aca:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            asignatura:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            titulo_tesis:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            autor:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            descr_mezclada:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            num_pag: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese el número de Páginas.'
                    },
                    regexp: {
                        regexp:  /^([0-9])*$/,
                        message: 'No es un número válido.'
                    }
                }
            },
            num_volumen: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese el número de Volumen.'
                    },
                    regexp: {
                        regexp:  /^([0-9])*$/,
                        message: 'No es un número válido.'
                    }
                }
            },
            editores:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    }
                }
            },
            editorial:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    }
                }
            },
            titulo_articulo: {
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            estatus_articulo_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    }
                }
            },
            rev_publicacion: {
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            tipo_libro_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    }
                }
            },
            isbn:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    },
                    regexp:{
                        regexp:/^(?:ISBN(?:-1[03])?:? )?(?=[0-9X]{10}$|(?=(?:[0-9]+[- ]){3})[- 0-9X]{13}$|97[89][0-9]{10}$|(?=(?:[0-9]+[- ]){4})[- 0-9]{17}$)(?:97[89][- ]?)?[0-9]{1,5}[- ]?[0-9]+[- ]?[0-9]+[- ]?[0-9X]$/,
                        message:"Solo está permitido el uso de ISBN-10 ó ISBN-13."
                    }
                }
            },
            titulo_libro: {
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            titulo_reporte: {
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    },
                    regexp:{
                        regexp:/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            total_autores: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese el número de Autores.'
                    },
                    regexp: {
                        regexp:  /^([0-9])*$/,
                        message: 'No es un número válido.'
                    }
                }
            },
            tipo_publicacion_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    }
                }
            },
            comentarios: {
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    },
                    regexp:{
                        regexp:/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            pag_inicial:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el Campo."
                    }
                }
            },
            pag_final:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el Campo."
                    }
                }
            },
            tipo_apoyo_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el Campo."
                    }
                }
            },
            tipo_programa_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el Campo."
                    }
                }
            },
            nombre_grupo: {
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    }
                }
            },
            nombre_lider: {
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    },
                    regexp:{
                        regexp:/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            descr_grupo: {
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    }
                }
            },
            logros: {
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    }
                }
            },
            actividades: {
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    }
                }
            },
            colaboracion: {
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    }
                }
            },
            tipo_patente_id: {
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    }
                }
            },
            num_registro: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese el número de Registro.'
                    },
                    regexp: {
                        regexp:  /^([0-9])*$/,
                        message: 'No es un número válido.'
                    }
                }
            },
            nombre_patente: {
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    },
                    regexp:{
                        regexp:/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            descr_patente: {
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    },
                    regexp:{
                        regexp:/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            descr_beneficiarios: {
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    },
                    regexp:{
                        regexp:/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            descripcion_detallada: {
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    },
                    regexp:{
                        regexp:/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            tipo_proyecto_id: {
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    }
                }
            },
            nombre_proyecto: {
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    },
                    regexp:{
                        regexp:/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            },
            finalidad: {
                validators:{
                    notEmpty:{
                        message:"Es requerido el campo. "
                    },
                    regexp:{
                        regexp:/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres Alfabéticos."
                    }
                }
            }                             
        }
    });
});