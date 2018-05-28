<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Correo_model extends CI_Model {

    function registro($datos){

        $body='<div align="center"><table style="min-width: 320px;" border="0" width="100%" cellspacing="0" cellpadding="0"><tbody><tr><td align="center" bgcolor="#fff"><table class="table_width_100" style="max-width: 680px; min-width: 300px;" border="0" width="100%" cellspacing="0" cellpadding="0"><tbody><tr><td><div style="height: 80px; line-height: 80px; font-size: 10px;">&nbsp;</div></td></tr><tr><td align="center" bgcolor="#ffffff"><div style="height: 30px; line-height: 30px; font-size: 10px;">&nbsp;</div><table border="0" width="90%" cellspacing="0" cellpadding="0"><tbody><tr><td align="left"><div class="mob_center_bl" style="float: left; display: inline-block; width: 115px;"><table class="mob_center" style="border-collapse: collapse;" border="0" width="115" cellspacing="0" cellpadding="0" align="left"><tbody><tr><td align="left" valign="middle"><div style="height: 20px; line-height: 20px; font-size: 10px;">&nbsp;</div><table border="0" width="115" cellspacing="0" cellpadding="0"><tbody><tr><td class="mob_center" align="left" valign="top"><a style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;" href="#" target="_blank" rel="noopener"><span style="color: #596167; font-size: medium;"><img style="display: block;" src=".base_url("assets/img/infocyt.png")" alt="INFOCYT" width="270" height="50" border="0"/></span></a></td></tr></tbody></table></td></tr></tbody></table></div><div class="mob_center_bl" style="float: right; display: inline-block; width: 88px;"><table style="border-collapse: collapse;" border="0" width="88" cellspacing="0" cellpadding="0" align="right"><tbody><tr><td align="right" valign="middle"><div style="height: 20px; line-height: 20px; font-size: 10px;">&nbsp;</div><table border="0" width="100%" cellspacing="0" cellpadding="0"><tbody><tr><td align="right"><div class="mob_center_bl" style="width: 100px;"><table border="0" cellspacing="0" cellpadding="0"><tbody><tr><td style="line-height: 19px;" align="center" width="30"><a style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;" href="https://www.facebook.com/ICTIMich/" target="_blank" rel="noopener"><span style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: small;"><img style="display: block;" src="https://www.iconfinder.com/data/icons/social-media-hexagon-1/1024/facebook-32.png" alt="Facebook" width="32" height="32" border="0"/></span></a></td><td style="line-height: 19px;" align="center" width="39"><a style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;" href="https://twitter.com/ICTI_Mich/" target="_blank" rel="noopener"><span style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: small;"><img style="display: block;" src="https://www.iconfinder.com/data/icons/social-media-hexagon-1/1024/twitter-32.png" alt="Twitter" width="32" height="32" border="0"/></span></a></td><td style="line-height: 19px;" align="right" width="29"><a style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;" href="https://www.instagram.com/GobMichoacan/" target="_blank" rel="noopener"><span style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: small;"><img style="display: block;" src="https://www.iconfinder.com/data/icons/social-media-hexagon-1/1024/instagram-32.png" alt="Dribbble" width="32" height="32" border="0"/></span></a></td><td style="line-height: 19px;" align="right" width="29"><a style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;" href="https://www.youtube.com/channel/UC_uaIRgMrAl91qewRt17v5g" target="_blank" rel="noopener"><span style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: small;"><img style="display: block;" src="https://www.iconfinder.com/data/icons/social-media-hexagon-1/1024/youtube-32.png" alt="Dribbble" width="32" height="32" border="0"/></span></a></td></tr></tbody></table></div></td></tr></tbody></table></td></tr></tbody></table></div></td></tr></tbody></table><div style="height: 50px; line-height: 50px; font-size: 10px;">&nbsp;</div></td></tr><tr><td align="center" bgcolor="#fbfcfd"><table border="0" width="90%" cellspacing="0" cellpadding="0"><tbody><tr><td align="center"><div style="height: 20px; line-height: 60px; font-size: 10px;">&nbsp;</div><div style="line-height: 25px;"><span style="font-size: x-large; color: #57697e; font-family: Arial, Helvetica, sans-serif;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 25px; color: #32c5cf; font-weight: 600;">SISTEMA DE INFORMACI&Oacute;N CIENT&Iacute;FICA Y TECNOL&Oacute;GICA DEL ESTADO DE MICHOAC&Aacute;N</span></span></div><div style="height: 10px; line-height: 20px; font-size: 10px;">&nbsp;</div></td></tr></tbody></table></td></tr><tr><td style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: #eff2f4;" align="center" bgcolor="#ffffff"><table border="0" width="94%" cellspacing="0" cellpadding="0"><tbody><tr><td><div style="height: 40px; line-height: 40px; font-size: 10px;""></div><div style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; color: #57697e;""><h1 style="text-align: center; color: #7b1d5f; font-size: 25px;"">SOLICITUD DE CUENTA CON ACTIVIDAD CIENTÍFICA Y TECNOLÓGICA</h1> <br><p style="text-align: justify;"">Estimado(a) Usuario: <b>'.$datos['nombre'].' '.$datos['a_paterno'].' '.$datos['a_materno'].'</b></p><p>Tu registro para el <b>SISTEMA DE INFORMACIÓN CIENTÍFICA Y TECNOLÓGICA DEL ESTADO DE MICHOACÁN</b> ya ha sido habilitado.</p><p style="text-align: justify;">A continuación se encuentra tu información de acceso a la plataforma del INFOCYT, así que guarda ésta información para las futuras consultas y la posterior descarga de tu constancia de registro RIM.</p><p><b>Información de Acceso</b></p><p><b>Usuario:   </b>'.$datos['username'].' <br/> <b>Contraseña:   </b> '.$datos['password'].' </p><br/> </div></td></tr><tr><td align="center"><div style="display: inline-block;float: center;width: 49.25%;height: 40px;border: none;line-height: 40px;font-size: 17px;text-align: center;border-radius: 2px;box-shadow: none;background: #3469c4;"> <a href="'.base_url('login').'" style="color: #fff; text-decoration:none;">Acceso a Panel</a></div></td></tr><tr><td><br/> <div style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; color: #57697e; text-align: justify;"> <p>A nombre de Gobierno del Estado; el Instituto de Ciencia, Tecnología e Innovación del Estado de Michoacán; te agradecemos participes impulsando la investigación y el conocimiento en el Estado, fomentando y fortaleciendo la investigación básica, aplicada y tecnológica a través de un espacio para la participación, intercambio de ideas y divulgación.</p></div></td></tr><tr></tr><tr><td><br/><div style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; color: #57697e;">&nbsp;</div></td></tr></tbody></table></td></tr><tr><td style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: #eff2f4;" align="center" bgcolor="#ffffff"><table border="0" width="100%" cellspacing="0" cellpadding="0"><tbody><tr><td align="center"><div style="height: 22px; line-height: 32px; font-size: 10px;">&nbsp;</div><table width="80%" cellspacing="0" cellpadding="0" align="center"><tbody><tr><td style="font-size: 12px; line-height: 21px;" align="center" valign="middle"><span style="font-size: small; color: #282f37; font-family: Tahoma, Arial, Helvetica, sans-serif;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 10px; color: #5b9bd1;"> <a style="color: #5b9bd1; text-decoration: none;" href=".base_url(&quot;infocyt&quot;)." target="_blank" rel="noopener">INFOCYT</a> &nbsp;|&nbsp;&nbsp; <a style="color: #5b9bd1; text-decoration: none;" href=".base_url(&quot;registro&quot;)." target="_blank" rel="noopener">REGISTRO</a> &nbsp;|&nbsp;&nbsp;&nbsp; <a style="color: #5b9bd1; text-decoration: none;" href=".base_url(&quot;consultas&quot;)." target="_blank" rel="noopener">CONSULTAS</a> &nbsp;|&nbsp;&nbsp;&nbsp; <a style="color: #5b9bd1; text-decoration: none;" href=".base_url(&quot;indicadores&quot;)." target="_blank" rel="noopener">INDICADORES</a> &nbsp;| <a style="color: #5b9bd1; text-decoration: none;" href=".base_url(&quot;publicador&quot;)." target="_blank" rel="noopener">PUBLICADOR</a> &nbsp;| <a style="color: #5b9bd1; text-decoration: none;" href=".base_url(&quot;contacto&quot;)." target="_blank" rel="noopener"> CONTACTO</a></span></span></td></tr></tbody></table></td></tr><tr><td><div style="height: 32px; line-height: 32px; font-size: 10px;"><img style="display: block; align="center" src="'.base_url("assets/img/logo_estaenti_foot.png").'" alt="MICHOACÁN" width="270" height="50" border="0"/></div></td></tr></tbody></table></td></tr><tr><td class="iage_footer" align="center" bgcolor="#ffffff"><div style="height: 20px; line-height: 80px; font-size: 10px;"></div><table border="0" width="100%" cellspacing="0" cellpadding="0"><tbody><tr><td align="center"><span style="font-size: medium; color: #96a5b5; font-family: Arial, Helvetica, sans-serif;"><span style="font-size: medium; color: #96a5b5; font-family: Arial, Helvetica, sans-serif;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;">&copy; 2015 - 2021 INSTITUTO DE CIENCIA, TECNOLOG&Iacute;A E INNOVACI&Oacute;N DEL ESTADO DE MICHOAC&Aacute;N.</span></span></span><p>Queda prohibida la reproducci&oacute;n total o parcial de cualquier parte de esta obra sin la autorizaci&oacute;n previa, expresa y por escrito de su titular.</p></td></tr></tbody></table><div style="height: 30px; line-height: 30px; font-size: 10px;">&nbsp;</div></td></tr><tr><td><div style="height: 80px; line-height: 80px; font-size: 10px;">&nbsp;</div></td></tr></tbody></table></td></tr></tbody></table></div>';
        return $body;
    }   

    function recovery($datos){

        $body='<div align="center"><table style="min-width: 320px;" border="0" width="100%" cellspacing="0" cellpadding="0"><tbody><tr><td align="center" bgcolor="#fff"><table class="table_width_100" style="max-width: 680px; min-width: 300px;" border="0" width="100%" cellspacing="0" cellpadding="0"><tbody><tr><td><div style="height: 80px; line-height: 80px; font-size: 10px;">&nbsp;</div></td></tr><tr><td align="center" bgcolor="#ffffff"><div style="height: 30px; line-height: 30px; font-size: 10px;">&nbsp;</div><table border="0" width="90%" cellspacing="0" cellpadding="0"><tbody><tr><td align="left"><div class="mob_center_bl" style="float: left; display: inline-block; width: 115px;"><table class="mob_center" style="border-collapse: collapse;" border="0" width="115" cellspacing="0" cellpadding="0" align="left"><tbody><tr><td align="left" valign="middle"><div style="height: 20px; line-height: 20px; font-size: 10px;">&nbsp;</div><table border="0" width="115" cellspacing="0" cellpadding="0"><tbody><tr><td class="mob_center" align="left" valign="top"><a style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;" href="#" target="_blank" rel="noopener"><span style="color: #596167; font-size: medium;"><img style="display: block;" src="'.base_url("assets/img/infocyt.png").'" alt="INFOCYT" width="270" height="50" border="0"/></span></a></td></tr></tbody></table></td></tr></tbody></table></div><div class="mob_center_bl" style="float: right; display: inline-block; width: 88px;"><table style="border-collapse: collapse;" border="0" width="88" cellspacing="0" cellpadding="0" align="right"><tbody><tr><td align="right" valign="middle"><div style="height: 20px; line-height: 20px; font-size: 10px;">&nbsp;</div><table border="0" width="100%" cellspacing="0" cellpadding="0"><tbody><tr><td align="right"><div class="mob_center_bl" style="width: 100px;"><table border="0" cellspacing="0" cellpadding="0"><tbody><tr><td style="line-height: 19px;" align="center" width="30"><a style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;" href="https://www.facebook.com/ICTIMich/" target="_blank" rel="noopener"><span style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: small;"><img style="display: block;" src="https://www.iconfinder.com/data/icons/social-media-hexagon-1/1024/facebook-32.png" alt="Facebook" width="32" height="32" border="0"/></span></a></td><td style="line-height: 19px;" align="center" width="39"><a style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;" href="https://twitter.com/ICTI_Mich/" target="_blank" rel="noopener"><span style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: small;"><img style="display: block;" src="https://www.iconfinder.com/data/icons/social-media-hexagon-1/1024/twitter-32.png" alt="Twitter" width="32" height="32" border="0"/></span></a></td><td style="line-height: 19px;" align="right" width="29"><a style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;" href="https://www.instagram.com/GobMichoacan/" target="_blank" rel="noopener"><span style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: small;"><img style="display: block;" src="https://www.iconfinder.com/data/icons/social-media-hexagon-1/1024/instagram-32.png" alt="Dribbble" width="32" height="32" border="0"/></span></a></td><td style="line-height: 19px;" align="right" width="29"><a style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;" href="https://www.youtube.com/channel/UC_uaIRgMrAl91qewRt17v5g" target="_blank" rel="noopener"><span style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: small;"><img style="display: block;" src="https://www.iconfinder.com/data/icons/social-media-hexagon-1/1024/youtube-32.png" alt="Dribbble" width="32" height="32" border="0"/></span></a></td></tr></tbody></table></div></td></tr></tbody></table></td></tr></tbody></table></div></td></tr></tbody></table><div style="height: 50px; line-height: 50px; font-size: 10px;">&nbsp;</div></td></tr><tr><td align="center" bgcolor="#fbfcfd"><table border="0" width="90%" cellspacing="0" cellpadding="0"><tbody><tr><td align="center"><div style="height: 20px; line-height: 60px; font-size: 10px;">&nbsp;</div><div style="line-height: 25px;"><span style="font-size: x-large; color: #57697e; font-family: Arial, Helvetica, sans-serif;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 25px; color: #32c5cf; font-weight: 600;">SISTEMA DE INFORMACI&Oacute;N CIENT&Iacute;FICA Y TECNOL&Oacute;GICA DEL ESTADO DE MICHOAC&Aacute;N</span></span></div><div style="height: 10px; line-height: 20px; font-size: 10px;">&nbsp;</div></td></tr></tbody></table></td></tr><tr><td style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: #eff2f4;" align="center" bgcolor="#ffffff"><table border="0" width="94%" cellspacing="0" cellpadding="0"><tbody><tr><td><div style="height: 40px; line-height: 40px; font-size: 10px;">&nbsp;</div><div style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; color: #57697e;"><h1 style="text-align: center; color: #7b1d5f; font-size: 25px;">SOLICITUD DE CUENTA CON ACTIVIDAD CIENT&Iacute;FICA Y TECNOL&Oacute;GICA</h1><p>Estimado(a) Usuario:</p><p><strong>Fecha de Operaci&oacute;n:</strong> '.$datos["fecha"].' <br/> <strong>Hora de Operaci&oacute;n:</strong> '.$datos["hora"].'<br/> <strong>Contrase&ntilde;a temporal:</strong> '.$datos["pass"].'</p></div></td></tr><tr><td align="center"><div style="display: inline-block; float: center; width: 49.25%; height: 40px; border: none; line-height: 40px; font-size: 17px; text-align: center; border-radius: 2px; box-shadow: none; background: #7B1D5F; color: #fff; text-decoration: none;"><a href=".base_url("login").">Inicio de Sesi&oacute;n</a></div></td></tr><tr><td><br/><div style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; color: #57697e;">&nbsp;</div></td></tr></tbody></table></td></tr><tr><td style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: #eff2f4;" align="center" bgcolor="#ffffff"><table border="0" width="100%" cellspacing="0" cellpadding="0"><tbody><tr><td align="center"><div style="height: 22px; line-height: 32px; font-size: 10px;">&nbsp;</div><table width="80%" cellspacing="0" cellpadding="0" align="center"><tbody><tr><td style="font-size: 12px; line-height: 21px;" align="center" valign="middle"><span style="font-size: small; color: #282f37; font-family: Tahoma, Arial, Helvetica, sans-serif;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 10px; color: #5b9bd1;"> <a style="color: #5b9bd1; text-decoration: none;" href=".base_url(&quot;infocyt&quot;)." target="_blank" rel="noopener">INFOCYT</a> &nbsp;|&nbsp;&nbsp; <a style="color: #5b9bd1; text-decoration: none;" href=".base_url(&quot;registro&quot;)." target="_blank" rel="noopener">REGISTRO</a> &nbsp;|&nbsp;&nbsp;&nbsp; <a style="color: #5b9bd1; text-decoration: none;" href=".base_url(&quot;consultas&quot;)." target="_blank" rel="noopener">CONSULTAS</a> &nbsp;|&nbsp;&nbsp;&nbsp; <a style="color: #5b9bd1; text-decoration: none;" href=".base_url(&quot;indicadores&quot;)." target="_blank" rel="noopener">INDICADORES</a> &nbsp;| <a style="color: #5b9bd1; text-decoration: none;" href=".base_url(&quot;publicador&quot;)." target="_blank" rel="noopener">PUBLICADOR</a> &nbsp;| <a style="color: #5b9bd1; text-decoration: none;" href=".base_url(&quot;contacto&quot;)." target="_blank" rel="noopener"> CONTACTO</a></span></span></td></tr></tbody></table></td></tr><tr><td><div style="height: 32px; line-height: 32px; font-size: 10px;"><img style="display: block; align="center" src="'.base_url("assets/img/logo_estaenti_foot.png").'" alt="MICHOACÁN" width="270" height="50" border="0"/></div></td></tr></tbody></table></td></tr><tr><td class="iage_footer" align="center" bgcolor="#ffffff"><div style="height: 20px; line-height: 80px; font-size: 10px;"></div><table border="0" width="100%" cellspacing="0" cellpadding="0"><tbody><tr><td align="center"><span style="font-size: medium; color: #96a5b5; font-family: Arial, Helvetica, sans-serif;"><span style="font-size: medium; color: #96a5b5; font-family: Arial, Helvetica, sans-serif;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;">&copy; 2015 - 2021 INSTITUTO DE CIENCIA, TECNOLOG&Iacute;A E INNOVACI&Oacute;N DEL ESTADO DE MICHOAC&Aacute;N.</span></span></span><p>Queda prohibida la reproducci&oacute;n total o parcial de cualquier parte de esta obra sin la autorizaci&oacute;n previa, expresa y por escrito de su titular.</p></td></tr></tbody></table><div style="height: 30px; line-height: 30px; font-size: 10px;">&nbsp;</div></td></tr><tr><td><div style="height: 80px; line-height: 80px; font-size: 10px;">&nbsp;</div></td></tr></tbody></table></td></tr></tbody></table></div>';
        return $body;
    }   

}

/* End of file Correo_registros.php */
/* Location: ./application/models/Correo_registros.php */