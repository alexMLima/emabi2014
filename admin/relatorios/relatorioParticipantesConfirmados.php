<?php
    define('FPDF_FONTPATH','fpdf/font/');
    require('mc_table.php');
    $minusculas = array("á", "à", "â", "ä", "ã", "é", "è", "ê", "ë", "í", "ì", "ó", "ò", "ô", "õ", "ö","ú", "ù", "ü", "ç");
	$maiusculas  = array("Á", "À", "Â", "Ä", "Ã", "É", "È", "Ê", "Ë", "Í", "Ì", "Ó", "Ò", "Ô", "Õ", "Ö","Ú", "Ù", "Ü", "Ç");
	
	include "../../banco.php";
	include "../../inscricao/inscricoes.class.php";	
	include '../../cidades/Cidades.class.php';		
				
	$objCidades = new Cidades;
	$objParticipantes = new Inscricoes;	
	
		
	$pdf=new PDF_MC_Table();
	$pdf->AliasNbPages();
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetFont('Arial','',14);
	$pdf->setX(55);
	$pdf->Cell(40,5,'LISTA DE PARTICIPANTES CONFIRMADOS',0,1);
	$pdf->ln();
	$pdf->setX(7);
	$pdf->SetFont('Arial','',10);
	$pdf->SetWidths(array(10, 85, 45,35,20));
	srand(microtime()*1000000);
			
	$qry = $objParticipantes->pesquisarParticipantesConfirmados();
	
	$total = mysql_num_rows($qry);
	if ($total > 0) {
	   $i = 1;
	   $pdf->SetFont('Arial', 'B', 10);
	   $pdf->Row(array('N.','NOME','CIDADE','CARGO','CRACHÁS'));
	   $pdf->SetFont('Arial', '', 10);
		while ($part = mysql_fetch_array($qry)){

			 $cidades = $objCidades->PesquisarPorId($part["municipio"]);
			 $dadosCidade = mysql_fetch_array($cidades);
			
			if ($part['categoria'] == 7){
				$funcao = $part['cargo'];
			}	
			else{
				$categ = mysql_fetch_array(mysql_query("SELECT descricao FROM categorias WHERE id = '".$part['categoria']."'"));
				$funcao = $categ['descricao'];
			}
			 
			$pdf->setX(7);					
			$part['nome'] = strtoupper($part['nome']);
			$part['nome'] = str_replace($minusculas, $maiusculas, $part['nome']);		   
			$pdf->Row(array($i,$part['nome'],$dadosCidade["nome"],$funcao,$part['ncrachasimpressos']));
			$i++;		
		
		}
	}
	else{
	  $pdf->Cell(40,5,'Não há participantes confirmados',0,1);
	}
	$pdf->Output();

?>
