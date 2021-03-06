<?php
ob_start();
        if($pdf !== FALSE) 
        {  
                foreach ($pdf as $v) 
                { 
                        $nombres = $v->nombre. ' '.$v->a_paterno.' '.$v->a_materno;
                        $numero = $v->id_experiencia;
                        $folio = $v->id_usuario;


                        $entidad = $v->nombre_entidad;
                        $cyt_entidad_id = $v->nombre_dirigido;
                        $inicio = $v->fecha_inicio;
                        $puesto = $v->nom_puesto;
                        $empleador = $v->empleador;
                        $fecha_final = $v->fecha_final;
                        $pais = $v->nombre_pa;
                        $descr = $v->descr_experiencia;
                        $ps_cyt_campo_id = $v->descr_conocimiento;
                        $ps_cyt_disciplina_id = $v->descr_disciplina;
                        $ps_cyt_subdisciplina_id = $v->descr_subdisciplinas;
                        $ps_cyt_sector_id = $v->descr_sector;
                        $ps_cyt_instit_id = $v->institucion_resp;
                        $ps_cyt_depend_id = $v->descr_dependencia;
                        $ps_cyt_dept_id = $v->descr_departamentos;
                        $cyt_cve_sector_id = $v->descr_economico;
                        $cyt_cve_rama_id = $v->descr_rama;
                        $cyt_clase_economica_id = $v->descr_clase;
                        $cyt_pal_clave01 = $v->pal_clave01;
                        $cyt_pal_clave02 = $v->pal_clave02;
                        $cyt_pal_clave03 = $v->pal_clave03;

                }
        }

            $transf = strtotime($inicio);
            $transf1 = strtotime($fecha_final);

            $dia = date("d", $transf);
            $dia1 = date("d", $transf1);

            $mes = date("F", $transf);
            $mes1 = date("F", $transf1);

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
            $ano1 = date("Y", $transf1);

            $fecha = $dia.' '.$mes.' '.$ano;
            $final = $dia1.' '.$mes1.' '.$ano1;

        $w = array(80, 130);
        $al = array('L', 'L');
        $titulos = array("ENTIDAD","TIPO DE ENTIDAD EMPLEADORA", "FECHA DE INICIO", "PUESTO", "EMPLEADOR", "FECHA FINAL","PAÍS SEDE", "DESCRIPCIÓN","CAMPO DE CONOCIEMTO","DISCIPLINA DEL CONOCIMIENTO","SUBDISCIPLINA","SECTOR DE LA INSTITUCIÓN","INSTITUCIÓN","DEPENDENCIA","DEPARTAMENTO","SECTOR ECONÓMICO","RAMA ECONÓMICA","CLASE ECONÓMICA","PALABRAS CLAVE 1","PALABRAS CLAVE 2","PALABRAS CLAVE 3");
        $datos = array($entidad,$cyt_entidad_id, $fecha, $puesto, $empleador, $final,$pais, $descr,$ps_cyt_campo_id,$ps_cyt_disciplina_id,$ps_cyt_subdisciplina_id,$ps_cyt_sector_id,$ps_cyt_instit_id,$ps_cyt_depend_id,$ps_cyt_dept_id,$cyt_cve_sector_id,$cyt_cve_rama_id,$cyt_clase_economica_id,$cyt_pal_clave01,$cyt_pal_clave02,$cyt_pal_clave03);
        $fill = 0;
        // create new PDF document
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle($folio.'-Experiencia_Profesional-'.$numero.'.pdf');
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
        $pdf->Cell(0, 7, "FICHA DE EXPERIENCIA PROFESIONAL", 'B', 0, 'R', 1);
        $pdf->Ln();
        $pdf->SetFillColor(182, 221, 242);
        $pdf->SetTextColor(0);
        $r=0;
        foreach($titulos as $row){      
                $pdf->SetX($w[0]+10);
                $y = $pdf->GetY();      
                $pdf->MultiCell($w[1], 8, mb_strtoupper($datos[$r], 'UTF-8'),'B',$al[1],$fill); 
                $pdf->SetX(10); 
                $y2 = $pdf->GetY();
                $pdf->SetY($y); 
                $pdf->Cell($w[0], ($y2-$y), $row, 'B', 0, $al[0], $fill);
                $pdf->Ln();
                $r+=1;    
                $fill=!$fill;   
        }
        $pdf->Cell(array_sum($w), 0, '', 'T');

        $pdf->Output($folio.'-Experiencia_Profesional-'.$numero.'.pdf');
        unset($pdf)


 ?>