<?php
    define('FPDF_FONTPATH','fpdf/font/');
    require('mc_table.php');
    $minusculas = array("�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�","�", "�", "�", "�");
	$maiusculas  = array("�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�","�", "�", "�", "�");
	
	include "../../banco.php";
	include "../../inscricao/Inscricoes.class.php";

	$objParticipantes = new Inscricoes;	
			
	$pdf=new PDF_MC_Table();
	$pdf->AliasNbPages();
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetFont('Arial','',14);
	//$pdf->setX(55);
	$pdf->Cell(195,5,'CONFIRMA��O DOS PARTICIPANTES',0,1,'C');
	$pdf->ln();	
	$pdf->SetFont('Arial','',10);
	$pdf->SetWidths(array(10, 60, 20,20,20,20,20,20));
	srand(microtime()*1000000);
	
	$qry = $objParticipantes->ConsultaTabela();
	
	$total = mysql_num_rows($qry);
	if ($total > 0) {
	   $i = 1;
	   $pdf->SetFont('Arial', 'B', 10);
	   $pdf->Row(array('N.','NOME','ENT MAT','29 AGO','30 AGO','31 AGO', '01 SET', '02 SET'));
	   $pdf->SetFont('Arial', '', 10);
		while ($part = mysql_fetch_array($qry)){
			
			$part['nome'] = strtoupper($part['nome']);
			$part['nome'] = str_replace($minusculas, $maiusculas, $part['nome']);
			
			if ($part["confmaterial"] == "0000-00-00 00:00:00"){
				$data01 = "";
			}
			else{
				$data01 = date('d/m/Y H:i:s', strtotime($part["confmaterial"]));
			}
			
			if ($part["dia01"] == "0000-00-00 00:00:00"){
				$data02 = "";
			}
			else{
				$data02 = date('d/m/Y H:i:s', strtotime($part["dia01"]));
			}
			
			if ($part["dia02"] == "0000-00-00 00:00:00"){
				$data03 = "";
			}
			else{
				$data03 = date('d/m/Y H:i:s', strtotime($part["dia02"]));
			}
			
			if ($part["dia03"] == "0000-00-00 00:00:00"){
				$data04 = "";
			}
			else{
				$data04 = date('d/m/Y H:i:s', strtotime($part["dia03"]));
			}

                        if ($part["dia04"] == "0000-00-00 00:00:00"){
				$data05 = "";
			}
			else{
				$data05 = date('d/m/Y H:i:s', strtotime($part["dia04"]));
			}

                        if ($part["dia05"] == "0000-00-00 00:00:00"){
				$data06 = "";
			}
			else{
				$data06 = date('d/m/Y H:i:s', strtotime($part["dia05"]));
			}
			
			$pdf->Row(array($i,$part['nome'],$data01,$data02,$data03,$data04,$data05,$data06));
			$i++;		
		
		}
	}
	else{
	  $pdf->Cell(40,5,'N�o h� registros',0,1);
	}
	
	$pdf->ln(5);
	
	$qry01 = mysql_query("SELECT id FROM c2013_inscricao WHERE confmaterial <> '0000-00-00 00:00:00'");
	$total01 = mysql_num_rows($qry01);	
	$pdf->Cell(180,5,'Total de participantes que confirmaram recebimento do material: '.$total01,0,1);
	
	$qry02 = mysql_query("SELECT id FROM c2013_inscricao WHERE dia01 <> '0000-00-00 00:00:00'");
	$total02 = mysql_num_rows($qry02);	
	$pdf->Cell(180,5,'Total de participantes que confirmaram dia 29 de agosto: '.$total02,0,1);
	
	$qry03 = mysql_query("SELECT id FROM c2013_inscricao WHERE dia02 <> '0000-00-00 00:00:00'");
	$total03 = mysql_num_rows($qry03);	
	$pdf->Cell(180,5,'Total de participantes que confirmaram dia 30 de agosto: '.$total03,0,1);
	
	$qry04 = mysql_query("SELECT id FROM c2013_inscricao WHERE dia03 <> '0000-00-00 00:00:00'");
	$total04 = mysql_num_rows($qry04);	
	$pdf->Cell(180,5,'Total de participantes que confirmaram dia 31 de agosto: '.$total04,0,1);

        $qry05 = mysql_query("SELECT id FROM c2013_inscricao WHERE dia04 <> '0000-00-00 00:00:00'");
	$total05 = mysql_num_rows($qry05);
	$pdf->Cell(180,5,'Total de participantes que confirmaram dia 01 de setembro: '.$total05,0,1);

        $qry06 = mysql_query("SELECT id FROM c2013_inscricao WHERE dia05 <> '0000-00-00 00:00:00'");
	$total06 = mysql_num_rows($qry06);
	$pdf->Cell(180,5,'Total de participantes que confirmaram dia 02 de setembro: '.$total06,0,1);
	
	$pdf->Cell(180,5,'Total Geral: '.($total01 + $total02 + $total03 + $total04 + $total05 + $total06),0,1);
	
	$pdf->Output();

?>
