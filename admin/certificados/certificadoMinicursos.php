<?php
    define('FPDF_FONTPATH','fpdf/font/');
    require('mc_table.php');
	include "../../banco.php";
    $minusculas = array("�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�","�", "�", "�", "�");
	$maiusculas  = array("�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�","�", "�", "�", "�");
	$pdf=new PDF_MC_Table();
	$pdf->SetStyle("p","arial","N",15,"0,0,0",40);
	$pdf->SetStyle("vb","arial","B",15,"0,0,0");
	$pdf->SetStyle("h1","arial","B",18,"0,0,0");
        $pdf->SetStyle("h2","arial","B",20,"0,0,0");
	$pdf->AliasNbPages();
	$pdf->Open();
	$pdf->SetMargins(100,10,20);
	
	$nof = $_GET['nof'];
	$idp = $_GET['idp'];
			
	$sql = 'SELECT p . nome , of . titulo, of.cargahoraria FROM '
        . ' c2013_inscricao as p '
        . ' JOIN ( c2013_minicursos as of , c2013_participantes_minicursos as iof ) '
        . ' ON ( p . id = iof . id_participante AND of . id = iof . id_minicurso ) '
        . ' WHERE of . id = '.$nof.' AND p.pago = "S" ';
	
	if ($idp != 't'){
	 $sql .=  " AND p.id = '$idp'";	 
	}
	
	$sql .=  " ORDER BY p.nome";	 
		
	$qry = mysql_query($sql);
	$total = mysql_num_rows($qry);	
	
	if ($total > 0) {	  
		while ($cert = mysql_fetch_array($qry)){		   
			$pdf->AddPage('L');
                        $pdf->setY(10);
                        //$pdf->WriteTag(0,5,'<h2>UNIVERSIDADE ESTADUAL DE MARING�</h2>',0,"C",0,0);
                        //$pdf->ln(3);
                        //$pdf->WriteTag(0,5,'<h2>DEPARTAMENTO DE BIOLOGIA</h2>',0,"C",0,0);
                        $pdf->Image('../images/cab_certificado.jpg',111,3, 160);
                        $pdf->setY(54);
                        $pdf->WriteTag(0,5,'<h1>CERTIFICADO</h1>',0,"C",0,0);
			$pdf->ln(15);
			$cert[0] = strtoupper($cert[0]);
			$cert[0] = str_replace($minusculas, $maiusculas, $cert[0]);
		    $cert[1] = strtoupper($cert[1]);
			$cert[1] = str_replace($minusculas, $maiusculas, $cert[1]);
			$corpo = '<p>Certificamos que <vb>'.$cert[0].'</vb> participou do minicurso <vb>'.$cert[1].'</vb> no <vb>XIII Encontro Maringaense de Biologia e XXVI Semana de Biologia</vb>, realizado de 05 de agosto a 09 de agosto de 2013 em Maringa-PR - Brasil.</p>';
			$pdf->WriteTag(0,7,$corpo,0,"J",0,0);
                        $pdf->ln(13);
			$pdf->WriteTag(0,7,'Maringa-PR, 09 de Agosto de 2013.',0,"C",0,0);
                        
                        $pdf->Image('../images/assinatura3.png',100,155,130,10);
			//$pdf->Image('../images/assinatura3.png',100,155,187,20);

                        $pdf->setY(177);
			$pdf->setX(213);
			$pdf->SetFont('arial', '', 12);
			$pdf->MultiCell(80,6,'Registro n 001/2013 DBI',0,'L');
			$pdf->setY(182);
			$pdf->setX(213);
			$pdf->MultiCell(80,6,'Livro 001/2013 - Fls. 001 a  100',0,'L');
			$pdf->SetDrawColor(0,0,0);
			$pdf->SetDrawColor(0,0,0);
			$pdf->Rect(213,175,63,16);
		}
	}
	
	$pdf->Output();

?>
