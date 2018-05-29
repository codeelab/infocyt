<?php

class Rim extends Controller {

    var $main_menu;

    function Rim() {
        $GLOBALS['template'] = "2";
        parent::Controller();
        $this->assetlibpro->add_css('framework/foundation.css');
        $this->assetlibpro->add_css('framework/grid.css');
        $this->assetlibpro->add_css('framework/forms.css');
        $this->assetlibpro->add_css('framework/app.css');
        $this->assetlibpro->add_css('framework/typography.css');
        $this->assetlibpro->add_js("jquery.js");
        $this->assetlibpro->add_js("jquery.form.js");
        $this->assetlibpro->add_js("jbanner.js");
        $this->assetlibpro->add_js("menu{$GLOBALS['template']}.js");
    }

    function index() {
        global $template;
        $data['msg'] = "";
        $data['title'] = 'Registro de Investigadores Michoacanos';
        $data['principal'] = "rim";
        $this->load->view("portada{$GLOBALS['template']}", $data);
    }

    function codigo() {
        $cadena = strtoupper(trim($this->input->post("texto")));
        $len = strlen($cadena);
        $valor = 0;
        for ($x = 0; $x < $len; $x++) {
            $letra = substr($cadena, $x, 1);
            //        echo $letra;
            if ($letra == "A" or $letra == "B" or $letra == "C" or $letra == "D") {
                $valor+=1;
            } else if ($letra == "E" or $letra == "F" or $letra == "G" or $letra == "H") {
                $valor+=2;
            } else if ($letra == "I" or $letra == "J" or $letra == "K" or $letra == "L") {
                $valor+=3;
            } else if ($letra == "M" or $letra == "N" or $letra == "O" or $letra == "P") {
                $valor+=4;
            } else if ($letra == "Q" or $letra == "R" or $letra == "S" or $letra == "T") {
                $valor+=5;
            } else if ($letra == "U" or $letra == "V" or $letra == "W" or $letra == "X" or $letra == "Y" or $letra == "Z") {
                $valor+=6;
            } else if (intval($letra) > 0) {
                $valor+=intval($letra);
            }
//           echo "- $valor ";
        }
        if (strlen($valor) > 1) {
            $valor2 = 0;
            for ($y = 0; $y < strlen($valor); $y++) {
                $num = substr($valor, $y, 1);
                $valor2+=$num;
            }
            if (strlen($valor2) > 1)
                $valor2 = "X";
            $valor = $valor2;
        }
        echo $valor;
    }

}

?>