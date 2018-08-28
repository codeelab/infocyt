$(function(){
    $("select[id=campo_id]").change(function(){
        estado = $(this).val();
        if (estado === '') return false;
        resetaCombo('municipio_id');
        $.getJSON('pages/municipio/' + estado, function(data) {
            var option = new Array();
            $.each(data, function(i, obj) {
                option[i] = document.createElement('option');
                $(option[i]).attr({
                    value: obj.id_municipio
                });
                $(option[i]).append(obj.nombre);
                $("select[id='municipio_id']").append(option[i]);
            });
        });
    });
});

$(function() {
    $("select[id=campo_id], select[id=estado_id]").change(function() {
        estado = $(this).val();
        if (estado === '') return false;
        resetaCombo('municipio_id');
        $.getJSON('municipio/' + estado, function(data) {
            var option = new Array();
            $.each(data, function(i, obj) {
                option[i] = document.createElement('option');
                $(option[i]).attr({
                    value: obj.id_municipio
                });
                $(option[i]).append(obj.nombre);
                $("select[id='municipio_id']").append(option[i]);
            });
        });
    });
});


function resetaCombo(el) {
    $("select[id='" + el + "']").empty();
    var option = document.createElement('option');
    $(option).attr({
        value: ''
    });
    $(option).append('Elija Municipio');
    $("select[id='" + el + "']").append(option);
}

$(document).ready(function() {
    $('#Loading').hide();
    $('#username').blur(function() {
        var a = $("#username").val();
        var filter = /^[a-z\d](?:[a-z\d]|-(?=[a-z\d])){0,38}$/i;
        if (filter.test(a)) {
            $('#Loading').show();
            $.post("Pages/checar_usuario", {
                username: $('#username').val()
            }, function(response) {
                $('#Loading').hide();
                setTimeout("finishAjax('Loading', '" + escape(response) + "')", 400);
            });
            return false;
        }
    });
});

function finishAjax(id, response) {
    $('#' + id).html(unescape(response));
    $('#' + id).fadeIn();
}

$(document).ready(function() {
    function e() {
        var e = a.val(),
            n = s.val(),
            h = v.val(),
            l = m.val();
        i.show().removeClass(), e != n && i.text(t).addClass("text-danger"), 0 != e.length && "" != e || i.text(r).addClass("text-warning"), 0 != e.length && e == n && i.text(o).removeClass("text-danger").addClass("text-success")
        p.show().removeClass(), h != l && p.text(t).addClass("text-danger"), 0 != h.length && "" != e || p.text(r).addClass("text-warning"), 0 != h.length && h == l && p.text(o).removeClass("text-danger").addClass("text-success")
    }
    var a = $("[name=correos_personal]"),
        s = $("[name=correo_personal2]"),
        v = $("[name=correos_laboral]"),
        m = $("[name=correo_laboral2]"),
        o = "Los correos si coinciden",
        t = "No coinciden ambos correos",
        r = "El campo no puede estar vacío",
        i = $("<span></span>").insertAfter(s);
        p = $("<span></span>").insertAfter(m);
    i.hide(), s.keyup(function() {
        e()
    })
    p.hide(), m.keyup(function() {
        e()
    })
})



function curpValida(curp) {
    var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
        validado = curp.match(re);
    if (!validado)  //Coincide con el formato general?
      return false;
    //Validar que coincida el dígito verificador
    function digitoVerificador(curp17) {
        //Fuente https://consultas.curp.gob.mx/CurpSP/
        var diccionario  = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
            lngSuma      = 0.0,
            lngDigito    = 0.0;
        for(var i=0; i<17; i++)
            lngSuma = lngSuma + diccionario.indexOf(curp17.charAt(i)) * (18 - i);
        lngDigito = 10 - lngSuma % 10;
        if (lngDigito == 10) return 0;
        return lngDigito;
    }
    if (validado[2] != digitoVerificador(validado[1])) 
      return false;
    return true; //Validado
}


//Handler para el evento cuando cambia el input
//Lleva la CURP a mayúsculas para validarlo
function validarInput(input) {
    var curp = input.value.toUpperCase(),
        resultado = document.getElementById("resultadoCURP"),
        valido = "No válido";
        
    if (curpValida(curp)) { // ⬅️ Acá se comprueba
      valido = "Válido";
        resultado.classList.add("ok");
    } else {
      resultado.classList.remove("ok");
    }
        
    resultado.innerText = "Curp: "+ curp 
                          + "\nFormato: " + valido;
}


//Función para validar un RFC
// Devuelve el RFC sin espacios ni guiones si es correcto
// Devuelve false si es inválido
// (debe estar en mayúsculas, guiones y espacios intermedios opcionales)
function rfcValido(rfc, aceptarGenerico = true) {
    const re       = /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/;
    var   validado = rfc.match(re);

    if (!validado)  //Coincide con el formato general del regex?
        return false;

    //Separar el dígito verificador del resto del RFC
    const digitoVerificador = validado.pop(),
          rfcSinDigito      = validado.slice(1).join(''),
          len               = rfcSinDigito.length,

    //Obtener el digito esperado
          diccionario       = "0123456789ABCDEFGHIJKLMN&OPQRSTUVWXYZ Ñ",
          indice            = len + 1;
    var   suma,
          digitoEsperado;

    if (len == 12) suma = 0
    else suma = 481; //Ajuste para persona moral

    for(var i=0; i<len; i++)
        suma += diccionario.indexOf(rfcSinDigito.charAt(i)) * (indice - i);
    digitoEsperado = 11 - suma % 11;
    if (digitoEsperado == 11) digitoEsperado = 0;
    else if (digitoEsperado == 10) digitoEsperado = "A";

    //El dígito verificador coincide con el esperado?
    // o es un RFC Genérico (ventas a público general)?
    if ((digitoVerificador != digitoEsperado)
     && (!aceptarGenerico || rfcSinDigito + digitoVerificador != "XAXX010101000"))
        return false;
    else if (!aceptarGenerico && rfcSinDigito + digitoVerificador == "XEXX010101000")
        return false;
    return rfcSinDigito + digitoVerificador;
}


//Handler para el evento cuando cambia el input
// -Lleva la RFC a mayúsculas para validarlo
// -Elimina los espacios que pueda tener antes o después
function validarInputRFC(input) {
    var rfc         = input.value.trim().toUpperCase(),
        resultado   = document.getElementById("resultadoRFC"),
        valido;
    var rfcCorrecto = rfcValido(rfc);   // ⬅️ Acá se comprueba
    if (rfcCorrecto) {
      valido = "Válido";
      resultado.classList.add("ok");
    } else {
      valido = "No válido"
      resultado.classList.remove("ok");
    }
    resultado.innerText = "RFC: " + rfc
                        + "\nFormato: " + valido;
}




$(document).ready(function(){
    $("#registro").bootstrapValidator({
        feedbackIcons: {
            valid: 'fas fa-check',
            invalid: 'fas fa-times',
            validating: 'fas fa-redo'
        },
        fields:{
            nombres:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el Nombre. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres alfabeticos."
                    }
                }
            },
            a_paternos:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el Apellido Paterno. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres alfabeticos."
                    }
                }
            },
            a_maternos:{
                validators:{
                    notEmpty:{
                        message:"Es requerido el Apellido Materno. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres alfabeticos."
                    }
                }
            },
            rfc: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese los 13 caracteres alfanuméricos de su RFC.'
                    },
                    regexp: {
                      regexp: /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/,
                      message: 'No es un RFC correcto o esta en minúsculas'
                    }
                }
            },
            curp: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese los 18 caracteres alfanuméricos de su CURP.'
                    },
                    regexp: {
                      regexp: /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
                      message: 'No es una curp correcta'
                    }
                }
            },
            fechas_nac: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese Fecha de Nacimiento'
                    }
                }
            },
            paises_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerido su País de Nacimineto."
                    }
                }
            },
            nacionalidade:{
                validators:{
                    notEmpty:{
                        message:"Es requerida su Nacionalidad."
                    }
                }
            },
            campo_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerido su Estado."
                    }
                }
            },
            municipio_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerido su Municipio."
                    }
                }
            },
            localidade:{
                validators:{
                    notEmpty:{
                        message:"Es requerida la Localidad. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso Caracteres Alfabeticos."
                    }
                }
            },
            edade: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese su Edad.'
                    },
                    regexp: {
                        regexp:  /^([0-9])*$/,
                        message: 'No es un valor Válido.'
                    }
                }
            },
            sexo_id: {
              validators: {
                notEmpty: {
                  message: 'Es requerido su Sexo.'
                }
              }
            },
            estados_civil: {
              validators: {
                notEmpty: {
                  message: 'Es requerido su Genéro.'
                }
              }
            },
            correos_personal:{
                validators:{
                    notEmpty:{
                        message:"Es requerido su Correo Personal. "
                    },
                    emailAddress:{
                        message:"Su correo no pertenece a un Dominio Válido."
                    },
                    regexp:{
                        regexp:/^[A-Z0-9._%+-]+@(?:[A-Z]{4}|gmail|yahoo|outlook|hotmail)+\.(com|mx|es|com.mx)+$/i,
                        message:"Solo está permitido el uso de los siguientes dominios: Gmail, Yahoo, Outlook, Hotmail."
                    }
                }
            },
            correos_laboral:{
                validators:{
                    notEmpty:{
                        message:"Es requerido su Correo Laboral. "
                    },
                    emailAddress:{
                        message:"Su correo no pertenece a un Dominio Válido."
                    },
                    regexp:{
                        regexp:/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/i,
                        message:"Está permitido el uso de cualquier dominio válido."
                    }
                }
            },
            correo_personal2:{
                validators:{
                    notEmpty:{
                        message:"Es requerido su Correo Personal. "
                    },
                    emailAddress:{
                        message:"Su correo no pertenece a un Dominio Válido."
                    },
                    regexp:{
                        regexp:/^[A-Z0-9._%+-]+@(?:[A-Z]{4}|gmail|yahoo|outlook|hotmail)+\.(com|mx|es|com.mx)+$/i,
                        message:"Solo está permitido el uso de los siguientes dominios: Gmail, Yahoo, Outlook, Hotmail."
                    }
                }
            },
            correo_laboral2:{
                validators:{
                    notEmpty:{
                        message:"Es requerido su Correo Laboral. "
                    },
                    emailAddress:{
                        message:"Su correo no pertenece a un Dominio Válido."
                    },
                    regexp:{
                        regexp:/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/i,
                        message:"Está permitido el uso de cualquier Dominio Válido."
                    }
                }
            },
            tel_parti: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese su Número de Teléfono Particular.'
                    },
                    regexp: {
                        regexp: /\(?([0-9]{3})\)?([ .-]?)([0-9]{2})\2([0-9]{2})/,
                        message: 'No es un teléfono válido.'
                    }
                }
            },
            tel_labo: {
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
            tel_celu: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese su Número de Celular.'
                    },
                    regexp: {
                        regexp:  /^([0-9])*$/,
                        message: 'No es un telefono válido.'
                    }
                }
            },
            direcciones:{
                validators:{
                    notEmpty:{
                        message:"Es requerido su Domicilio. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres alfabeticos."
                    }
                }
            },
            numero_domi: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese su Número de domicilio.'
                    },
                    regexp: {
                        regexp:  /^([0-9])*$/,
                        message: 'No es un número válido.'
                    }
                }
            },
            colonias:{
                validators:{
                    notEmpty:{
                        message:"Es requerida su Colonia. "
                    },
                    regexp:{
                        regexp:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message:"Solo está permitido el uso caracteres alfabeticos."
                    }
                }
            },
            cps: {
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
            estado_sni:{
                validators:{
                    notEmpty:{
                        message:"Es requerido su estado de SNI."
                    }
                }
            },
            num_rim: {
                message: 'Ingrese su Número RIM.',
                validators: {
                    notEmpty:{
                        message:"Es requerido su número de RIM. <a href='rim' target='_blank'>¿Solicitar RIM?<a>"
                    },
                    stringLength: {
                        min: 12,
                        max: 12,
                        message: 'Su número de registro debe tener al menos 12 caracteres.'
                    },
                    regexp: {
                        regexp: /^[A-Z]{4}[0-9]{2}[A-Z]{3,4}[A-Z0-9]{2}/gi,
                        message: 'El número de RIM solo puede incluir caracteres alfanuméricos (A-Z, 0-9).'
                    }
                }
            },
            mailing:{
                validators:{
                    notEmpty:{
                        message:"Especifique al menos una opción de las dos mencionadas."
                    }
                }
            },
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'El Usuario es requerido y no puede estar vacío.'
                    },
                    stringLength: {
                        min: 6,
                        max: 20,
                        message: 'Su nombre de usuario debe tener al menos 6 caracteres y hasta 20 caracteres.'
                    },
                    regexp: {
                        regexp:/^[a-z\d](?:[a-z\d]|-(?=[a-z\d])){0,38}$/i,
                        message: 'El nombre de usuario solo puede incluir caracteres alfanuméricos (A-Z, 0-9), puntos (".") y guión bajo (_).'
                    }
                }
            },
            password:{
                validators:{
                    notEmpty:{
                        message:"La contraseña es obligatoria y no puede estar vacía."
                    },
                    callback:{
                        callback:function(e,a,s){
                            var o=s.val();
                            if(""==o)return!0;
                            var t=zxcvbn(o),
                            r=t.score,
                            i=t.feedback.warning||"La contraseña es demasiado débil.",
                            n=$("#strengthBar");
                            switch(r){
                                case 0:
                                n.attr("class","progress-bar progress-bar-danger").css("width","1%");
                                break;
                                case 1:
                                n.attr("class","progress-bar progress-bar-danger").css("width","25%");
                                break;
                                case 2:
                                n.attr("class","progress-bar progress-bar-danger").css("width","50%");
                                break;
                                case 3:
                                n.attr("class","progress-bar progress-bar-warning").css("width","75%");
                                break;
                                case 4:
                                n.attr("class","progress-bar progress-bar-success").css("width","100%")
                            }
                            return!(r<4)||{
                                valid:!1,
                                message:i
                            }
                        }
                    }
                }
            },
            password2:{
                validators:{
                    notEmpty:{
                        message:"La contraseña de confirmación es obligatoria y no puede estar vacía."
                    },
                    identical:{
                        field:"password",
                        message:"La contraseña y su confirmación deben ser los mismos"
                    }
                }
            }
        }
    }
    ).on("keyup",'[name="password"]',
    function(){
        var e=""==$(this).val();
        $("#registro").bootstrapValidator("enableFieldValidators","password",!e).bootstrapValidator("enableFieldValidators","password2",!e),
        1==$(this).val().length&&$("#registro").bootstrapValidator("validateField","password").bootstrapValidator("validateField","password2")
    }
    )
});


$(document).ready(function() {
    $('#loggin').bootstrapValidator({
        feedbackIcons: {
            valid: 'fa fa-check',
            invalid: 'fa fa-remove',
            validating: 'fa fa-refresh'
        },
        fields: {
            username: {
                message: 'El usuario no es valido',
                validators: {
                    notEmpty: {
                        message: 'El Usuario es requerido y no puede estar vacío.'
                    },
                    regexp: {
                        regexp:/^[a-z\d](?:[a-z\d]|-(?=[a-z\d])){0,38}$/i,
                        message: 'El nombre de usuario solo puede incluir caracteres alfanuméricos (A-Z, 0-9), puntos (".") y guión bajo (_).'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'El campo Contraseña es obligatorio'
                    }
                }
            }
        }
    });
});

  $(document).ready(function (){
    $('#rfc').on('keyup', function(){
            var rfc = $('#rfc').val();
            $('#rfc1').text(rfc);
        });
    $('#sexo_id').on('change', function(){
            var sexo_id = $('#sexo_id').val();
            $('#sexo1').text(sexo_id);
        });
    $('#nivel').on('change', function(){
            var nivel = $('#nivel').val();
            $('#nivel1').text(nivel);
        });
    $('#area').on('change', function(){
            var area = $('#area').val();
            $('#area1').text(area);
        });


  });


$(document).ready(function (){

function rand_code(chars, lon){
code = "";
for (x=0; x < lon; x++)
{
rand = Math.floor(Math.random()*chars.length);
code += chars.substr(rand, 1);
}
return code;
}

caracteres = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
longitud = 1;

ale = rand_code(caracteres, longitud);

$('#rim').text(ale);
//devuelve una cadena aleatoria de 20 caracteres


});

$(document).ready(function() {
    //toggle `popup` / `inline` mode
    $.fn.editable.defaults.mode = 'popup'; 



    $('#nombre, #a_paterno, #a_materno, #localidad, #direccion, #colonia').editable({
        url: 'update_personacyt',
        validate: function(value)
        {
            if ($.trim(value) == '')
            {
                return 'Este campo es requerido';
            }
            var expression = /^[a-zA-Z áéíóúÁÉÍÓÚñÑ]+$/;
            if (!expression.test(value))
            {
                return 'Debe contener sólo caracteres';
            }
        }

    });


    $('#fecha_nac').editable({
        url: 'update_personacyt',
        format: 'yyyy-mm-dd',    
        viewformat: 'dd/mm/yyyy',    
        datepicker:
        {
            weekStart: 1
        },
        validate: function(value)
        {
            if ($.trim(value) == '')
            {
                return 'Este campo es requerido';
            }
        }

    });



    $('#pais_id, #estado_civil, #nacionalidad').editable({

        url: 'update_personacyt',
        validate: function(value)
        {
            if ($.trim(value) == '')
            {
                return 'Este campo es requerido';
            }
        }

    });

    $('#edad, #numero_dom, #cp').editable({
        url: 'update_personacyt',
        validate: function(value)
        {
            if ($.trim(value) == '')
            {
                return 'Este campo es requerido';
            }
            var expression = /^([0-9])*$/;
            if (!expression.test(value))
            {
                return 'Debe contener sólo números';
            }
        }
    });

    $('#correo_personal').editable({
        url: 'update_personacyt',
        validate: function(value)
        {
            if ($.trim(value) == '')
            {
                return 'Este campo es requerido';
            }
            var expression = /^[A-Z0-9._%+-]+@(?:[A-Z]{4}|gmail|yahoo|outlook|hotmail)+\.(com|mx|es|com.mx)+$/i;
            if (!expression.test(value))
            {
                return 'Solo está permitido el uso de los siguientes dominios: Gmail, Yahoo, Outlook, Hotmail.';
            }
        }
    });

    $('#correo_laboral').editable({
        url: 'update_personacyt',
        validate: function(value)
        {
            if ($.trim(value) == '')
            {
                return 'Este campo es requerido';
            }
            var expression = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/i;
            if (!expression.test(value))
            {
                return 'Su correo no pertenece a un Dominio Válido.';
            }
        }
    });

    $('#tel_part, #tel_cel, #tel_lab').editable({
        url: 'update_personacyt',
        validate: function(value)
        {
            if ($.trim(value) == '')
            {
                return 'Este campo es requerido';
            }
            var expression = /\(?([0-9]{3})\)?([ .-]?)([0-9]{2})\2([0-9]{2})+$/;
            if (!expression.test(value))
            {
                return 'No es un telefono válido.';
            }
        }
    });


});

//TABLA SOLO USUARIOS DE LA LISTA GENERAL CON 4 COLUMNAS

$(document).ready(function() {
    // Function to convert an img URL to data URL
    function getBase64FromImageUrl(url) {
    var img = new Image();
        img.crossOrigin = "anonymous";
    img.onload = function () {
        var canvas = document.createElement("canvas");
        canvas.width =this.width;
        canvas.height =this.height;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(this, 0, 0);
        var dataURL = canvas.toDataURL("image/png");
        return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
    };
    img.src = url;
    }

var buttonCommon = {
  exportOptions: {
    format: {
      body: function(data, column, row) {
        data = data.replace(/<br\s*\/?>/ig, "\r\n");
        data = data.replace(/<.*?>/g, "");
        data = data.replace("&amp;", "&");
        data = data.replace("&nbsp;", "");
        data = data.replace("&nbsp;", "");
        return data;
      }
    }
  }
};
$.extend(true, $.fn.dataTable.defaults, {
  "lengthChange": false,
  "pageLength": 100,
  "orderClasses": false,
  "stripeClasses": [],
  dom: 'Bfrtip',
  buttons: [
  'print','csvHtml5', 'pdfHtml5',
    $.extend(true, {}, buttonCommon, {
      extend: 'excelHtml5',
      exportOptions: {
        columns: [0, 1, 2, 3, 4]
      },
      customize: function(xlsx) {
        var sheet = xlsx.xl.worksheets['personacyt.xml'];
        $('row c[r^="A"]', sheet).attr( 's', '50' ); //<-- left aligned text
        $('row c[r^="C"]', sheet).attr( 's', '55' ); //<-- wrapped text
        $('row:first c', sheet).attr( 's', '32' );
      }
    })
  ]
});
});

$(document).ready(function() {

 $("#tablePersonacyt").DataTable({
  responsive: true,
  processing: true,
  pagingType: "simple",
  "info": false,
  ordering: !1,
  pageLength: 5,
  orderCellsTop: !0,
  language: {
   url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
  }
 });
 $("#tablePersonacyt thead").on("click", ".form-control", function(e) {
  e.stopPropagation()
 }), $("#tablePersonacyt thead").on("keyup change", ".form-control", function(e) {
  var a = $(this).attr("data-column"),
   s = $(this).val();
  $("#tablePersonacyt").DataTable().columns(a).search(s).draw()
 });


});



$(function() {
    $("select[id=campo_id]").change(function() {
        sub = $(this).val();
        if (sub === '') return false;
        resetaCombo('disciplina_id');
        $.getJSON('disciplina/' + sub, function(data) {
            var option = new Array();
            $.each(data, function(i, obj) {
                option[i] = document.createElement('option');
                $(option[i]).attr({
                    value: obj.id_disciplina
                });
                $(option[i]).append(obj.nombre);
                $("select[id='disciplina_id']").append(option[i]);
            });
        });
    });
});

function resetaCombo(el) {
    $("select[id='" + el + "']").empty();
    var option = document.createElement('option');
    $(option).attr({
        value: ''
    });
    $(option).append('Elija una Disciplina');
    $("select[id='" + el + "']").append(option);
}


$(function() {
    $("select[id=disciplina_id]").change(function() {
        dis = $(this).val();
        if (dis === '') return false;
        resetaCombo('subdisciplina_id');
        $.getJSON('subdisciplina/' + dis, function(data) {
            var option = new Array();
            $.each(data, function(i, obj) {
                option[i] = document.createElement('option');
                $(option[i]).attr({
                    value: obj.id_subdisciplinas
                });
                $(option[i]).append(obj.nombre);
                $("select[id='subdisciplina_id']").append(option[i]);
            });
        });
    });
});

function resetaCombo(el) {
    $("select[id='" + el + "']").empty();
    var op = document.createElement('op');
    $(op).attr({
        value: ''
    });
    $(op).append('Elija una Subdisciplina');
    $("select[id='" + el + "']").append(op);
}



$(function() {
    $("select[id=campos_id]").change(function() {
        sub = $(this).val();
        if (sub === '') return false;
        resetaCombo('disciplina_id');
        $.getJSON('disciplina/' + sub, function(data) {
            var option = new Array();
            $.each(data, function(i, obj) {
                option[i] = document.createElement('option');
                $(option[i]).attr({
                    value: obj.id_disciplina
                });
                $(option[i]).append(obj.nombre);
                $("select[id='disciplina_id']").append(option[i]);
            });
        });
    });
});

$(document).ready(function() {   
    setTimeout(function() {
        $(".c-cookies-bar").fadeOut(1500);
    },6000);
});

$(function(){
    $("select[id=economico_id]").change(function(){
        rama = $(this).val();
        if (rama === '') return false;
        resetaRama('rama_id');
        $.getJSON('rama/' + rama, function(data) {
            var option = new Array();
            $.each(data, function(i, obj) {
                option[i] = document.createElement('option');
                $(option[i]).attr({
                    value: obj.id_rama
                });
                $(option[i]).append(obj.nombre);
                $("select[id='rama_id']").append(option[i]);
            });
        });
    });
});

function resetaRama(el) {
    $("select[id='" + el + "']").empty();
    var option = document.createElement('option');
    $(option).attr({
        value: ''
    });
    $(option).append('Elija Rama');
    $("select[id='" + el + "']").append(option);
}

$(function() {
    $("select[id=rama_id]").change(function() {
        rama = $(this).val();
        if (rama === '') return false;
        resetaRama('clase_id');
        $.getJSON('clases/' + rama, function(data) {
            var option = new Array();
            $.each(data, function(i, obj) {
                option[i] = document.createElement('option');
                $(option[i]).attr({
                    value: obj.id_clase
                });
                $(option[i]).append(obj.nombre);
                $("select[id='clase_id']").append(option[i]);
            });
        });
    });
});


function resetaRama(el) {
    $("select[id='" + el + "']").empty();
    var option = document.createElement('option');
    $(option).attr({
        value: ''
    });
    $(option).append('Elija Clase');
    $("select[id='" + el + "']").append(option);
}

$(document).ready(function(){
    var date_input=$('input[name="anio_publicacion"], input[name="fecha_inicio"], input[name="fecha_final"], input[name="anio_reconocimiento"], input[name="fecha_acreditacion"], input[name="fecha_terminacion"], input[name="fecha_pub"], input[name="fecha_reporte"]');
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight:true,
            autoclose:true,
        })
});