<?php
    define('FPDF_FONTPATH','fpdf/font/');
    require('mc_table.php');
    			
	$pdf=new PDF_MC_Table();
	$pdf->AliasNbPages();
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetFont('Arial','',14);
	//$pdf->setX(55);
	$pdf->Cell(195,5,'RESUMO GERAL',0,1,'C');
	$pdf->ln();	
	$pdf->SetFont('Arial','',10);
		
	srand(microtime()*1000000);
	
	include "../../banco.php";
	
	$pdf->SetFont('Arial', '', 10);
		
	
	$qry01 = mysql_query("SELECT id FROM c2009_inscricao WHERE confmaterial <> '0000-00-00 00:00:00'");
	$total01 = mysql_num_rows($qry01);	
	$pdf->Cell(180,5,'Total de participantes que confirmaram recebimento do material: '.$total01,0,1);
	
	$qry02 = mysql_query("SELECT id FROM c2009_inscricao WHERE dia01 <> '0000-00-00 00:00:00'");
	$total02 = mysql_num_rows($qry02);	
	$pdf->Cell(180,5,'Total de participantes que confirmaram dia 16 de Setembro: '.$total02,0,1);
	
	$qry03 = mysql_query("SELECT id FROM c2009_inscricao WHERE dia02 <> '0000-00-00 00:00:00'");
	$total03 = mysql_num_rows($qry03);	
	$pdf->Cell(180,5,'Total de participantes que confirmaram dia 17 de Setembro: '.$total03,0,1);
	
	$qry04 = mysql_query("SELECT id FROM c2009_inscricao WHERE dia03 <> '0000-00-00 00:00:00'");
	$total04 = mysql_num_rows($qry04);	
	$pdf->Cell(180,5,'Total de participantes que confirmaram dia 18 de Setembro: '.$total04,0,1);
	
	$pdf->Cell(180,5,'Total Geral: '.($total01 + $total02 + $total03 + $total04),0,1);
	
	$pdf->Output();

?>
