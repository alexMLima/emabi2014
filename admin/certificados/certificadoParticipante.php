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
        $pdf->SetStyle("h2","helvetica","B",20,"0,0,0");
	$pdf->AliasNbPages();
	$pdf->Open();
	$pdf->SetMargins(100,10,20);
	
	$id = $_GET['id'];		
			
	if ($id == 't'){
	 $sql = "SELECT A.id, A.nome, A.pago FROM c2013_inscricao AS A WHERE (A.pago = 'S' or A.isento = 'S') ORDER BY A.nome";
	}	
	else{
	
		$sql = "SELECT A.id, A.nome, A.pago FROM c2013_inscricao AS A WHERE A.id = $id ORDER BY A.nome";
	
	} 
		
	$qry = mysql_query($sql);
	$total = mysql_num_rows($qry);	
	
	if ($total > 0) {	  
		while ($cert = mysql_fetch_array($qry)){
                        $pdf->AddPage('L');			
                        $pdf->setY(10);
                        $pdf->Image('../images/cab_certificado.jpg',111,3, 160);
                        //$pdf->WriteTag(0,5,'<h2>UNIVERSIDADE ESTADUAL DE MARING�</h2>',0,"C",0,0);
                        //$pdf->ln(3);
                        //$pdf->WriteTag(0,5,'<h2>DEPARTAMENTO DE BIOLOGIA</h2>',0,"C",0,0);
                        $pdf->setY(54);
                        $pdf->WriteTag(0,5,'<h1>CERTIFICADO</h1>',0,"C",0,0);
			$pdf->ln(15);
                        $cert[1] = strtoupper($cert[1]);
			$cert[1] = str_replace($minusculas, $maiusculas, $cert[1]);
			$corpo = '<p>Certificamos que <vb>'.$cert[1].'</vb> participou do <vb>XIII Encontro Maringaense de Biologia e XXVI Semana de Biologia</vb>, realizado de 05 de agosto a 09 de agosto de 2013 em Maringa-PR - Brasil.</p>';
			$pdf->WriteTag(0,7,$corpo,0,"J",0,0);
                        $pdf->ln(8);
			$pdf->WriteTag(0,7,'Carga Horaria:	30 Horas',0,"L",0,0);
			$pdf->ln();
			$pdf->WriteTag(0,7,'Frequencia:	100%',0,"L",0,0);
			$pdf->ln(8);
			$pdf->WriteTag(0,7,'Maringa-PR, 09 de Agosto de 2013.',0,"C",0,0);
                        $pdf->Image('../images/assinatura3.png',100,155,130,10);
                        
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
