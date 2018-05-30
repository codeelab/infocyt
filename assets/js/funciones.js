$(function() {
    $("select[id=estado_id]").change(function() {
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
    var a = $("[name=correo_personal]"),
        s = $("[name=correo_personal2]"),
        v = $("[name=correo_laboral]"),
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
        message:"Este valor no es válido",feedbackIcons:{
            valid:"",
            invalid:"far fa-remove",
            validating:"far fa-refresh"
        },
        fields:{
            nombre:{
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
            a_paterno:{
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
            a_materno:{
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
                      message: 'No es un RFC correcto'
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
            fecha_nac: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese Fecha de Nacimiento'
                    }
                }
            },
            pais_id:{
                validators:{
                    notEmpty:{
                        message:"Es requerido su País de Nacimineto."
                    }
                }
            },
            nacionalidad:{
                validators:{
                    notEmpty:{
                        message:"Es requerida su Nacionalidad."
                    }
                }
            },
            estado_id:{
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
            localidad:{
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
            edad: {
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
            estado_civil: {
              validators: {
                notEmpty: {
                  message: 'Es requerido su Genéro.'
                }
              }
            },
            correo_personal:{
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
            correo_laboral:{
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
            tel_part: {
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
            tel_lab: {
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
            tel_cel: {
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
            direccion:{
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
            numero_dom: {
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
            colonia:{
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
            cp: {
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
                        regexp: /^[A-Z0-9_-]{12,12}$/,
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
                    },
                    regexp: {
                        regexp:/^([a-zA-Z0-9])*$/,
                        message: 'Se ha generado un error.'
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