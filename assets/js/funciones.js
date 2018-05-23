$(function() {
    $("select[id=estado]").change(function() {
        estado = $(this).val();
        if (estado === '') return false;
        resetaCombo('municipio');
        $.getJSON('Pages/getCidades/' + estado, function(data) {
            var option = new Array();
            $.each(data, function(i, obj) {
                option[i] = document.createElement('option');
                $(option[i]).attr({
                    value: obj.id_municipio
                });
                $(option[i]).append(obj.nombre);
                $("select[id='municipio']").append(option[i]);
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

$(document).ready(function() {
    $("#registro").bootstrapValidator({
        message: "Este valor no es válido",
        feedbackIcons: {
            valid: "fa fa-check",
            invalid: "fa fa-remove",
            validating: "fa fa-refresh"
        },
        fields: {
            nombre: {
                validators: {
                    notEmpty: {
                        message: "Es requerido el Nombre. "
                    },
                    regexp: {
                        regexp: /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message: "Solo está permitido el uso caracteres alfabeticos."
                    }
                }
            },
            a_paterno: {
                validators: {
                    notEmpty: {
                        message: "Es requerido el Apellido Paterno. "
                    },
                    regexp: {
                        regexp: /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message: "Solo está permitido el uso caracteres alfabeticos."
                    }
                }
            },
            a_materno: {
                validators: {
                    notEmpty: {
                        message: "Es requerido el Apellido Materno. "
                    },
                    regexp: {
                        regexp: /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/,
                        message: "Solo está permitido el uso caracteres alfabeticos."
                    }
                }
            },
            nacionalidad: {
                validators: {
                    notEmpty: {
                        message: "Es requerida su Nacionalidad."
                    }
                }
            },
            puesto: {
                validators: {
                    notEmpty: {
                        message: "Es requerido su Tipo de Registro."
                    }
                }
            },
            estado: {
                validators: {
                    notEmpty: {
                        message: "Es requerido su Estado."
                    }
                }
            },
            municipio: {
                validators: {
                    notEmpty: {
                        message: "Es requerido su Municipio."
                    }
                }
            },
            genero: {
                validators: {
                    notEmpty: {
                        message: "Es requerido su genero."
                    }
                }
            },
            nivel: {
                validators: {
                    notEmpty: {
                        message: "Es requerido seleccione su nivel educativo."
                    }
                }
            },
            institucion: {
                validators: {
                    notEmpty: {
                        message: "Es requerido elija una Institución Educativa."
                    }
                }
            },
            facultad: {
                validators: {
                    notEmpty: {
                        message: "Es requerido seleccione su Facultad."
                    }
                }
            },
            mailing: {
                validators: {
                    notEmpty: {
                        message: "Especifique al menos una opción de las dos mencionadas."
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: "Es requerido su Correo Personal. "
                    },
                    emailAddress: {
                        message: "Su correo no pertenece a un dominio valido."
                    },
                    regexp: {
                        regexp: /^[A-Z0-9._%+-]+@(?:[A-Z]{4}|gmail|yahoo|outlook|hotmail)+\.(com|mx|es|com.mx)+$/i,
                        message: "Solo está permitido el uso de los siguientes dominios: Gmail, Yahoo, Outlook, Hotmail."
                    }
                }
            },
            email2: {
                validators: {
                    notEmpty: {
                        message: "Es requerido su Correo Personal. "
                    },
                    emailAddress: {
                        message: "Su correo no pertenece a un dominio valido."
                    },
                    regexp: {
                        regexp: /^[A-Z0-9._%+-]+@(?:[A-Z]{4}|gmail|yahoo|outlook|hotmail)+\.(com|mx|es|com.mx)+$/i,
                        message: "Solo está permitido el uso de los siguientes dominios: Gmail, Yahoo, Outlook, Hotmail."
                    }
                }
            },
            username: {
                validators: {
                    notEmpty: {
                        message: "Es requerido su Usuario."
                    },
                    regexp: {
                        regexp: /^[a-z\d](?:[a-z\d]|-(?=[a-z\d])){0,38}$/i,
                        message: "No es un Usuario Valido"
                    },
                    different: {
                            field: 'password',
                            message: 'El nombre de Usuario y la Contraseña no pueden ser iguales entre sí.'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: "La contraseña es obligatoria y no puede estar vacía."
                    },
                    callback: {
                        callback: function(e, a, s) {
                            var o = s.val();
                            if ("" == o) return !0;
                            var t = zxcvbn(o),
                                r = t.score,
                                i = t.feedback.warning || "La contraseña es demasiado débil.",
                                n = $("#strengthBar");
                            switch (r) {
                                case 0:
                                    n.attr("class", "progress-bar progress-bar-danger").css("width", "1%");
                                    break;
                                case 1:
                                    n.attr("class", "progress-bar progress-bar-danger").css("width", "25%");
                                    break;
                                case 2:
                                    n.attr("class", "progress-bar progress-bar-danger").css("width", "50%");
                                    break;
                                case 3:
                                    n.attr("class", "progress-bar progress-bar-warning").css("width", "75%");
                                    break;
                                case 4:
                                    n.attr("class", "progress-bar progress-bar-success").css("width", "100%")
                            }
                            return !(r < 4) || {
                                valid: !1,
                                message: i
                            }
                        }
                    },
                    different: {
                            field: 'username',
                            message: 'La Contraseña no puede ser igual que el nombre de Usuario.'
                    }
                }
            },
            password2: {
                validators: {
                    notEmpty: {
                        message: "La contraseña de confirmación es obligatoria y no puede estar vacía."
                    },
                    identical: {
                        field: "password",
                        message: "La contraseña y su confirmación deben ser los mismos"
                    }
                }
            }
        }
    }).on("keyup", '[name="password"]', function() {
        var e = "" == $(this).val();
        $("#registro").bootstrapValidator("enableFieldValidators", "password", !e).bootstrapValidator("enableFieldValidators", "password2", !e), 1 == $(this).val().length && $("#registro").bootstrapValidator("validateField", "password").bootstrapValidator("validateField", "password2")
    })
});