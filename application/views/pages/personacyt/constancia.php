<?php

ob_start();


        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('.pdf');
        // remove default header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


        $pdf->AddPage();
        // disable auto-page-break
        $pdf->SetAutoPageBreak(false, 0);
        // set bacground image
        //$pdf->Image('assets/images/reconocimientos_caravanas.jpg', 0, 0, 210, 300, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // set JPEG quality
        $pdf->setJPEGQuality(100);
        // set the starting point for the page content
        $pdf->setPageMark();

        //INFORMACIÓN DE LA CONSTANCIA, DIPLOMA O RECONOCIMIENTO
        $pdf->SetFont('galanogrotesque-bold','',15);
        $pdf->SetTextColor(111, 111, 110);
        $pdf->SetXY(20,50);
        $pdf->setCellPaddings(38);
        $html = 'El Gobierno del Estado de Michoacán';
        $pdf->writeHTML($html, true, 0, true, true);
        $pdf->SetFont('galanogrotesque-medium','',15);
        $pdf->SetXY(0,56);
        $pdf->setCellPaddings(10);
        $html = '<p style="text-align: center;">a través del <br> Instituto de Ciencia, Tecnología e Innovación <br> otorgan el presente:</p>';
        $pdf->WriteHTML($html, true, 0, true, 0);

        //NOBRE DEL RECONOCIMIENTO, CONSTANCIA O DIPLOMA
        $pdf->SetFont('galanogrotesque-black','',40);
        $pdf->SetXY(15,100.5);
        $pdf->setCellPaddings(40);
        $pdf->SetTextColor(217, 8, 128);
        $pdf->Write(0, 'RECONOCIMIENTO', '', 0, 'C', true, 0, false, false, 0);

        //LETRA A:
        $pdf->SetTextColor(73,66,73);
        $pdf->SetFont('galanogrotesque-bold','',25);
        $pdf->SetXY(0,138.2);
        $pdf->setCellPaddings(23);
        $pdf->SetTextColor(77, 181, 186);
        $pdf->writeHTML('A:', true, 0, true, true);

        //NOMBRE DE LA PERSONA
        $pdf->SetTextColor(73,66,73);
        $pdf->SetFont('galanogrotesque-bold','',27);
        $pdf->SetXY(15,137.3);
        $pdf->setCellPaddings(15);
        $pdf->SetTextColor(111, 111, 110);
        $pdf->Write(0, '', "ddddd", '', 0, 'C', true, 0, false, false, 0);

        //DATOS DEL EVENTO EN CARAVANA
        $pdf->SetTextColor(111, 111, 110);
        $pdf->SetFont('galanogrotesque-medium','',15);
        $pdf->SetXY(40,169);
        $html = 'Por su valiosa participación como tallerista en la';
        $pdf->WriteHTML($html, true, 0, true, 0);

        $pdf->SetFont('galanogrotesque-bold','',18);
        $pdf->SetXY(10,176);
        $html = '<p style="text-align: center; line-height: 20px;">"Caravana de la Ciencia en <br>ssss"</p>';
        $pdf->WriteHTML($html, true, 0, true, 0);

        $pdf->SetFont('galanogrotesque-medium','',15);
        $pdf->SetXY(0,188);
        $html = '<p style="text-align: center;">en el marco de las actividades para la apropiación <br> social de la ciencia en el Estado.</p>';
        $pdf->WriteHTML($html, true, 0, true, 0);


        //FECHA DEL EVENTO
        $pdf->SetTextColor(73,66,73);
        $pdf->SetFont('galanogrotesque-medium','',11);
        $pdf->SetXY(20,216);
        $pdf->setCellPaddings(44);
        $pdf->SetTextColor(112, 111, 111);
        $html = 'Morelia, Michoacán; a ';
        $pdf->writeHTML($html, true, 0, true, true);

        //NOMBRE DEL DIRECTOR Y FIRMA
        $pdf->SetFont('galanogrotesque-bold','',14);
        $pdf->SetTextColor(111, 111, 110);
        $pdf->SetXY(20,260);
        $pdf->setCellPaddings(10);
        $pdf->Write(0, 'Dr. José Luis Montañez Espinosa', '', 0, 'C', true, 0, false, false, 0);


        $pdf->SetFont('galanogrotesque-medium','',11);
        $pdf->SetTextColor(111, 111, 110);
        $pdf->SetXY(0,266);
        $html = '<p style="text-align: center;">Director General del Instituto <br> de Ciencía, Tecnología e Innovación.</p>';
        $pdf->WriteHTML($html, true, 0, true, 0);



        $pdf->Output('$nombre.pdf');

 ?>