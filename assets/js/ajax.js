
$(document).ready(function(){
    $('#Loading').hide();
    $('#username').blur(function(){
        var a=$("#username").val();
        var filter=/^[a-z\d](?:[a-z\d]|-(?=[a-z\d])){0,38}$/i;
        if(filter.test(a)){
            $('#Loading').show();
            $.post("check_username_availablity",{
                username:$('#username').val()
            },function(response){
                $('#Loading').hide();
                setTimeout("finishAjax('Loading', '"+escape(response)+"')",400);
            });
            return false;
        }
    });
});
function finishAjax(id,response){
    $('#'+id).html(unescape(response));
    $('#'+id).fadeIn();
}


