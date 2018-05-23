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
            $.post("checar_usuario", {
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