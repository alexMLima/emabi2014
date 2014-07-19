<?php
    define('FPDF_FONTPATH','fpdf/font/');
    require('mc_table.php');
    $minusculas = array("á", "à", "â", "ä", "ã", "é", "è", "ê", "ë", "í", "ì", "ó", "ò", "ô", "õ", "ö","ú", "ù", "ü", "ç");
	$maiusculas  = array("Á", "À", "Â", "Ä", "Ã", "É", "È", "Ê", "Ë", "Í", "Ì", "Ó", "Ò", "Ô", "Õ", "Ö","Ú", "Ù", "Ü", "Ç");
	
	include "../../banco.php";
	include "../../inscricao/Inscricoes.class.php";	
	include '../../cidades/Cidades.class.php';	
	include '../../estados/Estados.class.php';		
				
	$objCidades = new Cidades;
	$objEstados = new Estados;
	$objParticipantes = new Inscricoes;	
	
	$cod = $_GET["cod"];
	$id = $_POST["cidade"];
	
	if ($id == "0"){
	 	$cod = 't';  
	}
		
	if ($cod == 't') {
		$titulo = "TODOS";
	}
	else{
	    $cidades = $objCidades->PesquisarPorId($id);
	    $dadosCidade = mysql_fetch_array($cidades);
		$titulo = $dadosCidade["nome"];
	}
		
	$pdf=new PDF_MC_Table();
	$pdf->AliasNbPages();
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetFont('Arial','',14);
	//$pdf->setX(55);
	$pdf->Cell(195,5,'PARTICIPANTES POR MUNICÍPIO - '.$titulo,0,1,'C');
	$pdf->ln();	
	$pdf->SetFont('Arial','',10);
	$pdf->SetWidths(array(10, 95, 45,45));
	srand(microtime()*1000000);
	
	if ($cod == 't') {		
		$qry = $objParticipantes->ConsultaTabelaOrdenada("municipio,nome");
	}
	else{
		$qry = $objParticipantes->pesquisarPorMunicipio($id);
	}
	
	$total = mysql_num_rows($qry);
	if ($total > 0) {
	   $i = 1;
	   $pdf->SetFont('Arial', 'B', 10);
	   $pdf->Row(array('N.','NOME','CIDADE','EMPRESA/INST.'));
	   $pdf->SetFont('Arial', '', 10);
		while ($part = mysql_fetch_array($qry)){
			$cidades = $objCidades->PesquisarPorId($part["municipio"]);			
			$dadosCidade = mysql_fetch_array($cidades);
			
			$estados = $objEstados->PesquisarPorId($dadosCidade["id_uf"]);
			$dadosEstado = mysql_fetch_array($estados);
			$funcao = $part['empinst'];
			$part['nome'] = strtoupper($part['nome']);
			$part['nome'] = str_replace($minusculas, $maiusculas, $part['nome']);		   
			$pdf->Row(array($i,$part['nome'],$dadosCidade["nome"]." - ".$dadosEstado["nome"],$funcao));
			$i++;		
		
		}
	}
	else{
	  $pdf->Cell(40,5,'Não há participantes deste município',0,1);
	}
	$pdf->Output();

?>
