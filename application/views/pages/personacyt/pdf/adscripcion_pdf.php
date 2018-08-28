<?php
ob_start();
        if($pdf !== FALSE) 
        {  
                foreach ($pdf as $v) 
                { 
                        $nombres = $v->nombre. ' '.$v->a_paterno.' '.$v->a_materno;
                        $numero = $v->id_adscripcion;
                        $folio = $v->id_usuario;

                        $inicio = $v->fecha_inicio;
                        $final = $v->fecha_final;
                        $t_entidad = $v->nom_empleador;
                        $n_entidad = $v->nombre_entidad;
                        $puesto = $v->nombre_puesto;
                        $tel_cod = $v->tel_pais;
                        $telefono = $v->tel_laboral;
                        $dlab1 = $v->domicilio_laboral;
                        $pais = $v->nombre_pa;
                        $entidad = $v->nombre_est;
                        $ciudad = $v->nombre_mun;
                        $codigo_postal = $v->codigo_postal;
                        $fecha_final = $v->fecha_final;
                        $ps_cyt_isector_id = $v->descr_sector;
                        $institucion = $v->nombre_institucion;
                        $ps_cyt_idepend_id = $v->descr_dependencia;
                        $ps_cyt_idept_id = $v->descr_departamentos;

                }
        }

            $transf = strtotime($inicio);
            $transfe = strtotime($final);

            $dia = date("d", $transf);
            $dia1 = date("d", $transfe);

            $mes = date("F", $transf);
            $mes1 = date("F", $transfe);

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

            if ($mes1=="January") $mes1="Enero";
            if ($mes1=="February") $mes1="Febrero";
            if ($mes1=="March") $mes1="Marzo";
            if ($mes1=="April") $mes1="Abril";
            if ($mes1=="May") $mes1="Mayo";
            if ($mes1=="June") $mes1="Junio";
            if ($mes1=="July") $mes1="Julio";
            if ($mes1=="August") $mes1="Agosto";
            if ($mes1=="September") $mes1="Septiembre";
            if ($mes1=="October") $mes1="Octubre";
            if ($mes1=="November") $mes1="Noviembre";
            if ($mes1=="December") $mes1="Diciembre";
            $ano = date("Y", $transf);
            $ano1 = date("Y", $transfe);

            $fecha = $dia.' '.$mes.' '.$ano;
            $final = $dia1.' '.$mes1.' '.$ano1;

        $w = array(80, 130);
        $al = array('L', 'L');
        $titulos = array("FECHA DE INICIO","FECHA DE TERMINACIÓN","TIPO DE ENTIDAD EMPLEADORA","NOMBRE DE LA ENTIDAD","PUESTO OCUPADO","CODIGO TELEFONICO","TELEFONO LABORAL","DOMICILIO LABORAL","PAIS","ENTIDAD","CIUDAD","CÓDIGO POSTAL","SECTOR", "INSTITUCIÓN","DEPENDENCIA","DEPARTAMENTO");
        $datos = array($fecha, $final, $t_entidad, $n_entidad, $puesto,$tel_cod,$telefono,$dlab1,$pais,$entidad,$ciudad,$codigo_postal,$ps_cyt_isector_id,$institucion,$ps_cyt_idepend_id,$ps_cyt_idept_id);
        $fill = 0;
        // create new PDF document
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle($folio.'-Academica-'.$numero.'.pdf');
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

        $pdf->Cell(90, 7, "", 'B', 0, 'R', 0);
        $pdf->Cell(0, 7, "FICHA DE ADSCRIPCIÓN ACTUAL", 'B', 0, 'R', 1);
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

        $pdf->Output($folio.'-Academica-'.$numero.'.pdf');
        unset($pdf)


 ?>