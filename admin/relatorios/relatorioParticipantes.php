<?php
    define('FPDF_FONTPATH','fpdf/font/');
    require('mc_table.php');
    $minusculas = array("�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�","�", "�", "�", "�");
	$maiusculas  = array("�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�","�", "�", "�", "�");
	
	include "../../banco.php";
	include "../../inscricao/Inscricoes.class.php";
	include "../../estados/Estados.class.php";	
	include '../../cidades/Cidades.class.php';
        include_once '../../minicursos/Minicursos.class.php';
				
	$objCidades = new Cidades;
					
	$objInscricoesPart = new Inscricoes();	
	
	//$tbData = $_POST["tbData"];
	//$dataDigitada = explode("/",$tbData);
	//$dataFormatada = $dataDigitada[2]."-".$dataDigitada["1"]."-".$dataDigitada[0]." 00:00:00";
	
        $dataFormatada = '2011-01-01 00:00:00';

	$pdf=new PDF_MC_Table();	
	$pdf->AliasNbPages();
	$pdf->Open();
	
	$sn = $_GET["esp"];
					
	$qryPart = $objInscricoesPart->pesquisarInscricoesaPartirDaData($dataFormatada);
	
	$total = mysql_num_rows($qryPart);
	if ($total > 0) {	   	   	   
	   $pdf->SetFont('Arial', '', 10);
		while ($part = mysql_fetch_array($qryPart)){						
			$pdf->AddPage();
			$pdf->SetFont('Arial','',14);
			$pdf->setX(70);
			$pdf->Cell(40,5,'DETALHES DO PARTICIPANTE',0,1);
			$pdf->ln();
			$pdf->setX(10);
			$pdf->SetFont('Arial','',10);
			$pdf->SetWidths(array(50, 145));
			srand(microtime()*1000000);
			
			$part['nome'] = strtoupper($part['nome']);
			$part['nome'] = str_replace($minusculas, $maiusculas, $part['nome']);		   
			$pdf->Row(array("NOME",$part['nome']));
			$pdf->Row(array("SEXO",$part['sexo']));	
			
			$qrycat = mysql_query("SELECT descricao FROM c2013_categorias WHERE id = ".$part['categoria']);
			$dadoscat = mysql_fetch_array($qrycat);
			
			$pdf->Row(array("CATEGORIA",$dadoscat['descricao']));	
			
			$pdf->Row(array("EMPRESA/INSTITUI��O",$part['empinst']));
			if ($part["cargocurso"] != "") {
				$pdf->Row(array("CARGO/CURSO",$part['cargocurso']));	
			}	
			$pdf->Row(array("CPF",$part['cpf']));
                        $pdf->Row(array("RG",$part['rg']));
			$pdf->Row(array("ENDERE�O",$part['enderecocompleto']));	
			
			$cidades = $objCidades->PesquisarPorId($part["municipio"]);						 
			$dadosCidade = mysql_fetch_array($cidades);
			$pdf->Row(array("CEP",$part['cep']));	
			$pdf->Row(array("CIDADE",$dadosCidade["nome"]));			
					
			
			$objEstados = new Estados;
			$qryEstados = $objEstados->PesquisarPorId($dadosCidade['id_uf']);
			$estados = mysql_fetch_array($qryEstados);
			
			$pdf->Row(array("ESTADO",$estados['nome']));			
			$pdf->Row(array("TELEFONE",$part['telefone']));			
			$pdf->Row(array("CELULAR",$part['celular']));	
			$pdf->Row(array("FAX",$part['celular']));			
			$pdf->Row(array("E-MAIL",$part['email']));					
			$pdf->Row(array("DATA INSCRI��O",date('d/m/Y', strtotime($part["datainscricao"]))));

                        $objMinicursos = new Minicursos;
                        $minicursos = $objMinicursos->PesquisarMinicursosdoParticipante($part["id"]);
                        $minic = "";
                        while ($dadosmc = mysql_fetch_array($minicursos)) {
                            $minic .= "Grupo 0" . $dadosmc["grupo"] . ": " . $dadosmc["nminicurso"] . " - " . $dadosmc["titulo"] . " (" . $dadosmc["diasemana"] . " - " . $dadosmc["horario"] . ") / ";
                        }

                        $pdf->Row(array("MINICURSOS",$minic));
				
		
		}
	}
	else{
	  $pdf->Cell(40,5,'Nenhum Registro Encontrado',0,1);
	}
	$pdf->Output();

?>
