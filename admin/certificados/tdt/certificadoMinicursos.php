<?php
 
    define('FPDF_FONTPATH','font/');
    require('mc_table.php');
	include "../../banco.php";
    $minusculas = array("á", "à", "â", "ä", "ã", "é", "è", "ê", "ë", "í", "ì", "ó", "ò", "ô", "õ", "ö","ú", "ù", "ü", "ç");
	$maiusculas  = array("Á", "À", "Â", "Ä", "Ã", "É", "È", "Ê", "Ë", "Í", "Ì", "Ó", "Ò", "Ô", "Õ", "Ö","Ú", "Ù", "Ü", "Ç");
	$pdf=new PDF_MC_Table();
	$pdf->SetStyle("p","times","N",13,"0,0,0",40);
	$pdf->SetStyle("it","times","I",13,"0,0,0",40);
	$pdf->SetStyle("vb","times","B",13,"0,0,0");
	$pdf->SetStyle("h1","times","B",22,"0,0,0");
	$pdf->AliasNbPages();
	$pdf->Open();
	$pdf->SetTopMargin(70);
	$pdf->SetLeftMargin(20);
    $pdf->SetRightMargin(20);
	
	$nof = $_GET['nof'];
	$idp = $_GET['idp'];
			
	$sql = 'SELECT p . nome , of . titulo FROM '
        . ' c2009_inscricao as p '
        . ' JOIN ( c2009_minicursos as of , c2009_participantes_minicursos as iof ) '
        . ' ON ( p . id = iof . id_participante AND of . id = iof . id_minicurso ) '
        . ' WHERE of . nminicurso = '.$nof.' AND (p.pago = "S" OR p.isento = "S") ';
	
	if ($idp != 't'){
	 $sql .=  " AND p.id = '$idp'";	 
	}
	
	$sql .=  " ORDER BY p.nome";	 
		
	$qry = mysql_query($sql);
	$total = mysql_num_rows($qry);	
	
	if ($total > 0) {	  
		while ($cert = mysql_fetch_array($qry)){
		    $pdf->AddPage();
			$pdf->WriteTag(0,5,'<h1>CERTIFICADO</h1>',0,"C",0,0);				
			$pdf->ln(28);
			$cert[0] = strtoupper($cert[0]);
			$cert[0] = str_replace($minusculas, $maiusculas, $cert[0]);
		    $cert[1] = strtoupper($cert[1]);
			$cert[1] = str_replace($minusculas, $maiusculas, $cert[1]);
			$corpo = '<p>Certificamos que <vb>'.$cert[0].'</vb> participou do minicurso <vb>'.$cert[1].'</vb> no evento de extensão ';
			$corpo.= '<vb>III Congresso Internacional de Saúde e III CISDEM (Cátedra Iberoamericano-Suiza de Desarrollo de Medicamentos)</vb>, tema: Gestão e Inovação em Saúde, (Processo no 05860/2009),';
			$corpo.= ' realizado pela Universidade Estadual de Maringá, através do Centro de Ciências da Saúde, no período de 16 a 18 de setembro de 2009.';
			$pdf->WriteTag(0,7,$corpo,0,"J",0,0);				
			$pdf->ln(8);
			$pdf->WriteTag(0,7,'Carga Horária:	3,0 h/a',0,"L",0,0);	
			$pdf->ln();		
			$pdf->WriteTag(0,7,'Freqüência:	100%',0,"L",0,0);	
			$pdf->ln(12);
			$pdf->WriteTag(0,7,'Maringá-PR, 18 de Setembro de 2009.',0,"R",0,0);			
			$pdf->Image('../images/assinatura.png',135,208,50,9);
			$pdf->setY(215);
			$pdf->setX(20);
			$pdf->Cell(0,0,'__________________________',0,0,'R'); 				
			$pdf->setY(220);
			$pdf->setX(20);	
			$pdf->Cell(0,0,'Sandra Marisa Pelloso',0,0,'R');
			$pdf->setY(225);
			$pdf->setX(20);	
			$pdf->Cell(0,0,'Coordenadora geral',0,0,'R');
			$pdf->setY(247);
			$pdf->setX(130);			
			$pdf->MultiCell(80,6,'Registro nº 001/2009 – CCS',0,'L');
			$pdf->setY(253);
			$pdf->setX(130);			
			$pdf->MultiCell(80,6,'Livro AC – 02',0,'L');
			$pdf->setY(258);
			$pdf->setX(130);			
			$pdf->MultiCell(80,6,'Folhas 075 a 137',0,'L');
			$pdf->SetDrawColor(0,0,0);
			$pdf->SetDrawColor(0,0,0);
			$pdf->Rect(128,246,60,20);		
		}
	}
	
	$pdf->Output();

?>
