<?php 
$gmtDate = gmdate("D, d M Y H:i:s"); 

header("Expires: {$gmtDate} GMT"); 
header("Last-Modified: {$gmtDate} GMT"); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Pragma: no-cache"); 

include '../banco.php';
include '../minicursos/Minicursos.class.php';
include '../inscricao/Inscricoes.class.php';

$retorno ='';
$id = $_GET["id"]; //pegar a variavei enviada 

$objMinicursos = new Minicursos;
$qryMinicursos = $objMinicursos->PesquisarPorId($id);

$dados = mysql_fetch_array($qryMinicursos);
$nmin = $dados['id'];

$retorno = "<span style='font-family: &quot;Trebuchet MS&quot;; font-size:12px; font-weight: bold;'>Oficina ".$dados['nminicurso']." - ".$dados['titulo']."</span><br>";

$retorno .= "<span style='font-family: &quot;Trebuchet MS&quot;; font-size:12px'>".$dados['diasemana']." - ".$dados['horario']."</span><br><br>";

$objParticipantes = new Inscricoes;
$qryPart = $objParticipantes->pesquisarParticipantesdoMinicurso($id);
$total = mysql_num_rows($qryPart);

if ($total ==0){
	$retorno .="<span style='font-family: &quot;Trebuchet MS&quot;; font-size:12px; font-weight: bold; color:Red'>Esta oficina não possui nenhum inscrito.</span>";
}
else{
    $retorno .= "<a href='relatorios/OficinasPDF.php?id=$id' target='_blank'><img src='images/ico_pdf.gif' width='30' height='30' border='0' /> Emitir listagem dos participantes desta oficina</a><br><br>";
	$retorno .= "<a href='certificados/certificadoMinicursos.php?idp=t&nof=$nmin' target='_blank'><img src='images/ico_pdf.gif' width='30' height='30' border='0' /> Emitir certificados dos participantes deste minicurso</a><br><br>";
	$retorno .= "<a href='certificados/certificadoMinistrantesMinicurso.php?nof=$nmin' target='_blank'><img src='images/ico_pdf.gif' width='30' height='30' border='0' /> Emitir certificados para os ministrantes deste minicurso</a><br><br>";	 
	
	$retorno .="<table border='1' bordercolor='#666666'>";
	$retorno .="<tr>";
	$retorno .="<th align='center'>N.</th>";
    $retorno .="<th align='center' width='500'>Participante</th>";
	$retorno .="<th align='center'>Exc.</th>";
	$retorno .="<th align='center'>Cert.</th>";
	$retorno .="</tr>";
	
	$qryPart = $objParticipantes->pesquisarParticipantesdoMinicurso($id);
	$i = 1;
	$minusculas = array("á", "à", "â", "ä", "ã", "é", "è", "ê", "ë", "í", "ì", "ó", "ò", "ô", "õ", "ö","ú", "ù", "ü", "ç");
	$maiusculas  = array("Á", "À", "Â", "Ä", "Ã", "É", "È", "Ê", "Ë", "Í", "Ì", "Ó", "Ò", "Ô", "Õ", "Ö","Ú", "Ù", "Ü", "Ç");
	while($dadosPart = mysql_fetch_array($qryPart)){
	    $dadosPart[1] = strtoupper($dadosPart[1]);
		$dadosPart[1] = str_replace($minusculas, $maiusculas, $dadosPart[1]);		
		$retorno .="<tr>";
		$retorno .="<td>$i</td>";
		$retorno .="<td><a href='detalhes_participante.php?idp=$dadosPart[0]'>$dadosPart[1]</td>";
		$retorno .="<td><a href='excluir_partoficina.php?id=$dadosPart[0]&pal=$id'><img src='images/excluir.gif' border='0' width='9' height='9'></a></td>";		
		$retorno .="<td><a href='certificados/certificadoMinicursos.php?idp=$dadosPart[0]&nof=$nmin' target='_blank'><img src='images/ico_pdf.gif' width='20' height='20' border='0' /></td>";		
		$retorno .="</tr>";
		$i++; 
	}
	$retorno .="</table>";
	
}

$qryPartMc = $objParticipantes->pesquisarParticipantesForadoMinicurso($id);

if (mysql_num_rows($qryPartMc) > 0){
	
	$retorno .="<h1>Incluir novo participante no Minicurso</h1>";               
	$retorno .="<p align='justify'>";
	$retorno .="<form action='incluirParticipanteMinicurso.php?idof=$id' method='post'>";				
	$retorno .="<select name='slParticipante' style='width:300px'>";					
	
	while ($dadosPartMc = mysql_fetch_array($qryPartMc)){ 	
		$retorno .="<option value='$dadosPartMc[0]'>$dadosPartMc[1]</option>";   
	}
	
	$retorno .="</select><br><br>";
	$retorno .="<input type='submit' value='Incluir Participante no Minicurso'>";
	$retorno .="</p>";
}

$retorno = urlencode($retorno);
echo $retorno; //agora vamos "retornar" o valor, para isso escrevemos ele
?>
