<?php
ob_start();
        if($pdf !== FALSE) 
        {  
                foreach ($pdf as $v) 
                { 
                        $nombres = $v->nombre. ' '.$v->a_paterno.' '.$v->a_materno;
                        $numero = $v->id_articulos;
                        $folio = $v->id_usuario;


                        $anio = $v->fecha_pub;
                        $cyt_volumen = $v->num_volumen;
                        $titulo = $v->titulo_articulo;
                        $t_autor = $v->nombre_tipo;
                        $autor = $v->autor;
                        $coautor = $v->coautor;
                        $total_autor = $v->total_autor;
                        $estatus = $v->nombre_estatus;
                        $pais = $v->nombre_pa;
                        $revista = $v->rev_publicacion;
                        $ps_cyt_campo_id = $v->descr_conocimiento;
                        $ps_cyt_disciplina_id = $v->descr_disciplina;
                        $ps_cyt_subdisciplina_id = $v->descr_subdisciplinas;
                        $descr_larga = $v->descr_larga;

                }
        }

            $transf = strtotime($anio);

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
        $titulos = array("AÑO DE PUBLICACIÓN","VOLUMEN","TITULO","TIPO DE AUTOR","NOMBRE DEL AUTOR","TOTAL DE AUTORES","NOMBRE DE(L) COAUTOR(ES)","ESTATUS DEL ARTÍCULO","PAÍS","REVISTA","CAMPO DE CONOCIMIENTO","DISCIPLINA DE CONOCIMIENTO","SUBDISCIPLINA","DESCRIPCIÓN LARGA");
        $datos = array($fecha, $cyt_volumen, $titulo, $t_autor, $autor, $total_autor, $coautor, $estatus, $pais, $revista,$ps_cyt_campo_id,$ps_cyt_disciplina_id, $ps_cyt_subdisciplina_id, $descr_larga);
        $fill = 0;
        // create new PDF document
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle($folio.'-Articulos_Publicados-'.$numero.'.pdf');
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

        $pdf->Cell(120, 7, "", 'B', 0, 'R', 0);
        $pdf->Cell(0, 7, "FICHA DE ARTÍCULOS PUBLICADOS", 'B', 0, 'R', 1);
        $pdf->Ln();
        $pdf->SetFillColor(182, 221, 242);
        $pdf->SetTextColor(0);
        $r=0;
        foreach($titulos as $row){      
                $pdf->SetX($w[0]+10);
                $y = $pdf->GetY();      
                $pdf->MultiCell($w[1], 10, mb_strtoupper($datos[$r], 'UTF-8'),'B',$al[1],$fill); 
                $pdf->SetX(10); 
                $y2 = $pdf->GetY();
                $pdf->SetY($y); 
                $pdf->Cell($w[0], ($y2-$y), $row, 'B', 0, $al[0], $fill);
                $pdf->Ln();
                $r+=1;    
                $fill=!$fill;   
        }
        $pdf->Cell(array_sum($w), 0, '', 'T');

        $pdf->Output($folio.'-Articulos_Publicados-'.$numero.'.pdf');
        unset($pdf)


 ?>