<?php
    define('FPDF_FONTPATH','fpdf/font/');
    require('mc_table.php');
    $minusculas = array("�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�","�", "�", "�", "�");
	$maiusculas  = array("�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�", "�","�", "�", "�", "�");

	include "../../banco.php";
	include "../../inscricao/Inscricoes.class.php";
	include "../../minicursos/Minicursos.class.php";

	$objMinicursos = new Minicursos();
	$objParticipantes = new Inscricoes();

	$id = $_GET["id"];

        $qryMc = mysql_query("SELECT * from c2014_palestras");

	$pdf=new PDF_MC_Table();
	$pdf->AliasNbPages();
	$pdf->Open();

        while ($dadosMc = mysql_fetch_array($qryMc)){
            $pdf->AddPage();
            $pdf->SetFont('Arial','B',14);
            $pdf->setX(10);
            $pdf->MultiCell(190,7,"Palestra ".$dadosMc["nminicurso"]." - ".$dadosMc["titulo"],0,'L');
            $pdf->SetFont('Arial','',14);
            $pdf->MultiCell(190,7,$dadosMc["diasemana"]." - ".$dadosMc["horario"],0,'L');
            $pdf->ln();
            $pdf->setX(10);
            $pdf->SetFont('Arial','',10);
            $pdf->SetWidths(array(10, 130, 50));
            srand(microtime()*1000000);

            $querystr = "select p.id, p.nome, pm.data_entrada" .
                "  FROM c2014_inscricao as p," .
                "       c2014_participantes_palestras as pm," .
                "       c2014_palestras as m" .
                " where m.id = ".$dadosMc['id'].
                "   and p.id = pm.id_participante" .
                "   and m.id = pm.id_minicurso order by p.nome";

            $qry = mysql_query($querystr);

            $total = mysql_num_rows($qry);
            if ($total > 0) {
               $i = 1;
               $pdf->SetFont('Arial', 'B', 10);
               $pdf->Row(array('N.','NOME','DATA ENTRADA'));
               $pdf->SetFont('Arial', '', 10);
                    while ($part = mysql_fetch_array($qry)){
                            $part['nome'] = strtoupper($part[1]);
                            $part['nome'] = str_replace($minusculas, $maiusculas, $part['nome']);
                            if ($part["data_entrada"] != "0000-00-00 00:00:00") {
                              $pdf->Row(array($i,$part['nome'],date('d/m/Y H:m:s', strtotime($part["data_entrada"]))));
                            }
                            else{
                              $pdf->Row(array($i,$part['nome'],""));
                            }
                            $i++;

                    }
            }
            else{
              $pdf->Cell(40,5,'N�o h� participantes nesta palestra',0,1);
            }
        }
	$pdf->Output();

?>
