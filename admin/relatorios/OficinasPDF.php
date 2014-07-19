<?php
    define('FPDF_FONTPATH','fpdf/font/');
    require('mc_table.php');
    $minusculas = array("á", "à", "â", "ä", "ã", "é", "è", "ê", "ë", "í", "ì", "ó", "ò", "ô", "õ", "ö","ú", "ù", "ü", "ç");
	$maiusculas  = array("Á", "À", "Â", "Ä", "Ã", "É", "È", "Ê", "Ë", "Í", "Ì", "Ó", "Ò", "Ô", "Õ", "Ö","Ú", "Ù", "Ü", "Ç");
	
	include "../../banco.php";
	include "../../inscricao/Inscricoes.class.php";
	include "../../minicursos/Minicursos.class.php";
	
	$objMinicursos = new Minicursos();
	$objParticipantes = new Inscricoes();	
	
	$id = $_GET["id"];
	$qryMc = $objMinicursos->PesquisarPorId($id);
	$dadosMc = mysql_fetch_array($qryMc);
	
	$pdf=new PDF_MC_Table();
	$pdf->AliasNbPages();
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',14);
	$pdf->setX(10);
	$pdf->MultiCell(190,7,"Oficina ".$dadosMc["nminicurso"]." - ".$dadosMc["titulo"],0,'L');
	$pdf->SetFont('Arial','',14);
	$pdf->MultiCell(190,7,$dadosMc["diasemana"]." - ".$dadosMc["horario"],0,'L');
	$pdf->ln();
	$pdf->setX(10);
	$pdf->SetFont('Arial','',10);
	$pdf->SetWidths(array(10, 80, 50,50));
	srand(microtime()*1000000);
			
	$qry = $objParticipantes->pesquisarParticipantesdoMinicurso($id);
	
	$total = mysql_num_rows($qry);
	if ($total > 0) {
	   $i = 1;
	   $pdf->SetFont('Arial', 'B', 10);
	   $pdf->Row(array('N.','NOME','DATA/HORA ENTRADA','ASSINATURA'));
	   $pdf->SetFont('Arial', '', 10);
		while ($part = mysql_fetch_array($qry)){					
			$part['nome'] = strtoupper($part[1]);
			$part['nome'] = str_replace($minusculas, $maiusculas, $part['nome']);		   
			if ($part["data_entrada"] != "0000-00-00 00:00:00") {
			  $pdf->Row(array($i,$part['nome'],date('d/m/Y H:m:s', strtotime($part["data_entrada"])),""));
			}
			else{
			  $pdf->Row(array($i,$part['nome'],"",""));
			}			
			$i++;		
		
		}
	}
	else{
	  $pdf->Cell(40,5,'Não há participantes nesta palestra',0,1);
	}
	$pdf->Output();

?>
