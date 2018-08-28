<?php
ob_start();
        if($pdf !== FALSE) 
        {  
                foreach ($pdf as $v) 
                {
                        
                        $nombres = $v->nombre. ' '.$v->a_paterno.' '.$v->a_materno;
                        $folio = $v->id_usuario;
                        $rfc = $v->rfc;
                        $institucion = $v->institucion;


                }
        }

       $mes=date("F");

       if ($mes=="January") $mes="Enero";
       if ($mes=="February") $mes="Febrero";
       if ($mes=="March") $mes="Marzo";
       if ($mes=="April") $mes="Abril";
       if ($mes=="May") $mes="Mayo";
       if ($mes=="June") $mes="Junio";
       if ($mes=="July") $mes="Julio";
       if ($mes=="August") $mes="Agosto";
       if ($mes=="September") $mes="Setiembre";
       if ($mes=="October") $mes="Octubre";
       if ($mes=="November") $mes="Noviembre";
       if ($mes=="December") $mes="Diciembre";

        // create new PDF document
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('Postulacion-'.$folio.'.pdf');
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
        
        $pdf->SetTextColor(76,76,76);
        $pdf->SetFont('galanogrotesque-bold','',14);
        $pdf->SetXY(75,40);
        $pdf->writeHTML("FORMATO DE SOLICITUD");
        $pdf->ln(15);
        $pdf->SetFont('galanogrotesque-bold','',11);
        $pdf->SetXY(110,60);
        $pdf->writeHTML("Morelia, Michoacán a ".date("d") . " de " . $mes . " de " . date("Y"));
        $pdf->ln(15);
        $pdf->SetFont('galanogrotesque-medium','',14);
        $pdf->SetXY(10,75);
        $pdf->writeHTML("Dr. José Luis Montañez Espinosa",0,1,'L');
        $pdf->ln(5);
        $pdf->SetFont('galanogrotesque-medium','',11);
        $pdf->writeHTML("Director del Instituto de Ciencia, Tecnología e Innovación",0,1,'L');
        $pdf->ln(5);
        $pdf->writeHTML("del Estado de Michoacán",0,1,'L');
        $pdf->ln(5);
        $pdf->writeHTML("Presente",0,1,'L');
        $pdf->ln(20);
        

        //DATOS DEL USUARIO
        $pdf->SetFont('galanogrotesque-medium','',12);

        // create some HTML content
        $html = '<p style="text-align:justify;">En referencia a la Convocatoria REIM 2018, emitida el día 13 de Agosto del 2018, solicito de la manera más atenta, mi _________________ (Incorporación/Renovación) al Registro Estatal de Investigadores Michoacanos, como investigador adscrito a _____________________________ (Dependencia/Institución/Organismo) en el Estado, en el Área de conocimiento ___________________________ con RFC <b>'.mb_strtoupper($rfc,'UTF-8').'</b> y último grado Académico ______________________, obtenido en _____________________________ y _____ (con/sin) perfil deseable, antes perfil PROMEP de la Secretaría de Educación Pública (SEP).</p>
            <p style="text-align:justify;">Asimismo, señalo bajo protesta decir la verdad, que la información que presento a evaluación es verídica y que no me encuentro bajo proceso legal por cualquier índole relacionado con mi desempeño profesional.</p>
            <p style="text-align:justify;">Sin otro particular, reciba un cordial saludo y quedo a sus órdenes.</p>

        ';
        $pdf->writeHTML($html, true, 0, true, 0);

        $pdf->SetFont('galanogrotesque-medium','',12);
        $pdf->SetXY(90,210);
        $pdf->writeHTML("ATENTAMENTE",0,1,'C');
        $pdf->ln(40);
        $pdf->SetXY(73,220);
        $pdf->writeHTML('_____________________________', true, false, true, false, '');


        $pdf->Output('Postulacion-'.$folio.'.pdf');
        unset($pdf)


 ?>