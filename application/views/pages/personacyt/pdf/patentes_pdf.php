<?php
ob_start();
        if($pdf !== FALSE) 
        {  
                foreach ($pdf as $v) 
                { 
                        $nombres = $v->nombre. ' '.$v->a_paterno.' '.$v->a_materno;
                        $numero = $v->id_patente;
                        $folio = $v->id_usuario;

                        $cyt_numero_registro = $v->num_registro;
                        $t_patente = $v->nombres_tipo;
                        $descr50 = $v->nombre_patente;
                        $descr254 = $v->descr_patente;
                        $t_autor = $v->nombre_tipo;
                        $total_autor = $v->total_autor;
                        $cyt_coautor = $v->coautor;
                        $descr_beneficiarios = $v->descr_beneficiarios;
                        $pais = $v->nombre_pa;
                        $anio_publicacion = $v->anio_publicacion;
                        $ps_cyt_sector_id = $v->descr_economico;
                        $ps_cyt_rama_id = $v->descr_rama;
                        $ps_cyt_clase_id = $v->descr_clase;
                        $descripcion_detallada = $v->descripcion_detallada;
                }
        }

            $transf = strtotime($anio_publicacion);

            $dia = date("d", $transf);

            $mes = date("F", $transf);

            if ($mes=="January") $mes="Enero";
            if ($mes=="February") $mes="Febrero";
            if ($mes=="March") $mes="Marzo";
            if ($mes=="April") $mes="Abril";
            if ($mes=="May") $mes="Mayo";
            if ($mes=="June") $mes="Junio";
            if ($mes=="July") $mes="Julio";
            if ($mes=="August") $mes="Agosto";
            if ($mes=="September") $mes="Septiembre";
            if ($mes=="October") $mes="Octubre";
            if ($mes=="November") $mes="Noviembre";
            if ($mes=="December") $mes="Diciembre";

            $ano = date("Y", $transf);

            $fecha = $dia.' '.$mes.' '.$ano;

        $w = array(80, 130);
        $al = array('L', 'L');
        $titulos = array("NÚMERO DE REGISTRO","TIPO DE PATENTE","NOMBRE DE LA PATENTE","DESCRIPCIÓN","TIPO DE AUTOR","TOTAL DE AUTORES","NOMBRES DE COAUTORES","BENEFICIADOS","PAÍS DE REGISTRO","AÑO DE PUBLICACIÓN","SECTOR ECONÓMICO","RAMA ECONÓMICA","CLASE ECONÓMICA","DESCRIPCIÓN DETALLADA");
        $datos = array($cyt_numero_registro, $t_patente, $descr50, $descr254, $t_autor, $total_autor, $cyt_coautor, $descr_beneficiarios, $pais, $fecha,$ps_cyt_sector_id,$ps_cyt_rama_id,$ps_cyt_clase_id,$descripcion_detallada);
        $fill = 0;
        // create new PDF document
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle($folio.'-Patente-'.$numero.'.pdf');
        // remove default header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        // set margins
        $pdf->SetMargins(10, PDF_MARGIN_TOP, 10);
        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


        $pdf->AddPage();
        // disable auto-page-break
        $pdf->SetAutoPageBreak(false, 0);
        // set bacground image
        $pdf->Image('assets/images/convocatoria.jpg', 0, 0, 216, 279, 'JPG', '', '', false);
        // set JPEG quality
        $pdf->setJPEGQuality(100);
        // set the starting point for the page content
        $pdf->setPageMark();

        //INFORMACIÓN DE LA CONSTANCIA, DIPLOMA O RECONOCIMIENTO
        $pdf->SetFont('galanogrotesque-bold','',15);
        $pdf->SetTextColor(76, 76, 76);
        $pdf->SetXY(10,40);
        $html = 'Instituto de Ciencia, Tecnología e Innovación';
        $pdf->writeHTML($html, true, 0, true, true);
        $pdf->SetFont('galanogrotesque-medium','',11);
        $pdf->SetXY(10,45);
        $html = 'Sistema de Información Científica y Tecnológica de Michoacán';
        $pdf->writeHTML($html, true, 0, true, true);
        $pdf->SetXY(11,50);
        $html = 'Curriculum Vitae Único (CVU)';
        $pdf->WriteHTML($html, true, 0, true, 0);
        

        //DATOS DEL USUARIO
        $pdf->SetFont('galanogrotesque-bold','',13);
        $pdf->SetXY(9,65);
        $pdf->SetTextColor(76, 76, 76);
        $pdf->Write(0, ' '.mb_strtoupper($nombres,'UTF-8').' ', '', 0, 'L', true, 0, false, false, 0);
        $pdf->Ln(1);
        $pdf->SetFont('galanogrotesque-medium','',11);
        $pdf->Write(0, 'Personacyt ID: '.mb_strtoupper($folio,'UTF-8').' ', '', 0, 'L', true, 0, false, false, 0);

        //CONTENIDO DE LOS REGISTROS
        $pdf->SetFont('galanogrotesque-medium','',11);
        $pdf->SetFillColor(74, 114, 176);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(0, 26, 90);
        $pdf->SetLineWidth(.1);

        $pdf->Cell(100, 7, "", 'B', 0, 'R', 0);
        $pdf->Cell(0, 7, "FICHA DE PATENTE", 'B', 0, 'R', 1);
        $pdf->Ln();
        $pdf->SetFillColor(182, 221, 242);
        $pdf->SetTextColor(0);
        $r=0;
        foreach($titulos as $row){      
                $pdf->SetX($w[0]+10);
                $y = $pdf->GetY();      
                $pdf->MultiCell($w[1], 7, mb_strtoupper($datos[$r], 'UTF-8'),'B',$al[1],$fill); 
                $pdf->SetX(10); 
                $y2 = $pdf->GetY();
                $pdf->SetY($y); 
                $pdf->Cell($w[0], ($y2-$y), $row, 'B', 0, $al[0], $fill);
                $pdf->Ln();
                $r+=1;    
                $fill=!$fill;   
        }
        $pdf->Cell(array_sum($w), 0, '', 'T');

        $pdf->Output($folio.'-Patente-'.$numero.'.pdf');
        unset($pdf)


 ?>