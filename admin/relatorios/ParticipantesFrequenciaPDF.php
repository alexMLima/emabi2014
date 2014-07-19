<?php
    define('FPDF_FONTPATH','fpdf/font/');
    require('mc_table.php');
    $minusculas = array("�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�","�", "�", "�", "�");
	$maiusculas  = array("�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�","�", "�", "�", "�");
			
	$pdf=new PDF_MC_Table();
	$pdf->AliasNbPages();
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetFont('Arial','',14);
	$pdf->setX(72);
	$pdf->Cell(40,5,'LISTA DE PARTICIPANTES',0,1);
	$pdf->ln();
	$pdf->setX(10);
	$pdf->SetFont('Arial','',10);
	$pdf->SetWidths(array(15, 125,50));
	srand(microtime()*1000000);
	
	include "../../banco.php";
	$sql = "SELECT id, nome FROM c2013_inscricao WHERE (pago = 'S') ORDER BY nome";
			
	$qry = mysql_query($sql);
	$total = mysql_num_rows($qry);
	if ($total > 0) {
	   $i = 1;
	   $pdf->SetFont('Arial', 'B', 10);
	   $pdf->Row(array('N.','NOME', 'FREQ. PALESTRA'));
	   $pdf->SetFont('Arial', '', 10);
		while ($part = mysql_fetch_array($qry)){					
			$part[1] = strtoupper($part[1]);
			$part[1] = str_replace($minusculas, $maiusculas, $part[1]);		   

                        $dadosPalestras = mysql_fetch_array(mysql_query("SELECT COUNT(1) qtd from c2013_participantes_palestras where id_participante = ".$part["id"]));
                        $porcentagem = ($dadosPalestras["qtd"] * 100) / 11;
                        $pdf->Row(array($i,$part[1],$dadosPalestras["qtd"]." de 11 (".number_format($porcentagem,2)."%)"));

                        $i++;
		
		}
	}
	else{
	  $pdf->Cell(40,5,'N�o h� participantes nesta(s) categoria(s)',0,1);
	}
	$pdf->Output();

?>
