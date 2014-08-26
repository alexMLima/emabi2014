<?php

$gmtDate = gmdate("D, d M Y H:i:s");

header("Expires: {$gmtDate} GMT");
header("Last-Modified: {$gmtDate} GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

include_once '../banco.php';
include_once '../trabalhos/Trabalhos.class.php';
include_once '../areas_conhecimento/AreasConhecimento.class.php';
include_once '../inscricao/Inscricoes.class.php';
include_once '../coautores_trabalho/CoautoresTrabalhos.class.php';
include_once '../rotinas/Rotinas.class.php';

$idt = $_GET["idt"];

$objTrabalhos = new Trabalhos;
$objCoautoresTrabalho = new CoautoresTrabalhos;
$objParticipantes = new Inscricoes;
$objArea = new AreasConhecimento;
$objRotinas = new Rotinas;

$qryTrabalhos = $objTrabalhos->pesquisar($_GET["idt"]);
$dadosTrabalho = mysql_fetch_array($qryTrabalhos);

$qryPart = $objParticipantes->pesquisarParticipantedoTrabalho($dadosTrabalho["id"]);
$dadosPart = mysql_fetch_array($qryPart);

$qryCoautores = $objCoautoresTrabalho->pesquisarCoautoresdoTrabalho($dadosTrabalho["id"]);

$nomeCoautores = "";
while ($dadosCoaut = mysql_fetch_array($qryCoautores)) {
    $nomeCoautores = $nomeCoautores . $dadosCoaut["nome"] . ", ";
}

$nomeCoautores = substr($nomeCoautores, 0, strlen($nomeCoautores) - 2);

$qryArea = $objArea->PesquisarPorId($dadosTrabalho["area_conhecimento"]);
$dadosArea = mysql_fetch_array($qryArea);

$mensagem = "Prezado(a) ".$dadosPart["nome"]."<br/><br/>";

if ($dadosTrabalho["situacao"] == 3 || $dadosTrabalho["situacao02"] == 3){
    $mensagem.= "<p>A Comissão Organizadora do COBEQ-IC 2011, após análise do Comitê Científico/Revisor, tem o prazer de informar, que o trabalho a seguir descrito foi aceito <b>sem modificação</b> e recomendado para apresentação e publicação nos anais do evento, atendidas as exigências de inscrição e prazo disponibilizados no site do Evento: <a href='http://www.ctc.uem.br/cobeq-ic2011'>http://www.ctc.uem.br/cobeq-ic2011.</a></p>";
    $mensagem.= "<p>A forma de apresentação de seu trabalho será informada posteriormente no site do evento</p>";
}
else{
    if ($dadosTrabalho["situacao"] == 4 || $dadosTrabalho["situacao02"] == 4){
        $mensagem.= "<p>A Comissão Organizadora do COBEQ-IC 2011, após análise do Comitê Científico/Revisor, tem o prazer de informar, que o trabalho a seguir descrito foi aceito <b>com modificação</b> e recomendado para apresentação e publicação nos anais do evento, atendidas as exigências feitas pelo revisor, reenvio do trabalho até 12 de maio de 2011 e inscrição no prazo disponibilizado no site do Evento: <a href='http://www.ctc.uem.br/cobeq-ic2011'>http://www.ctc.uem.br/cobeq-ic2011.</a></p>";
        $mensagem.= "<p>A forma de apresentação de seu trabalho será informada posteriormente no site do evento</p>";

    }
}

$mensagem.= "<p>Titulo: <b>".$dadosTrabalho["titulo"]."</b><br/>";
$mensagem.= "Autores: <b>".$dadosPart["nome"].", ".$nomeCoautores."</b><br/>";
$mensagem.= "Area Temática: <b>".$dadosArea["descricao"]."</b></p>";

$mensagem.= "<p>Agradecendo sua colaboração, esperamos contar com sua importante participação no COBEQ-IC 2011.</p>";

$mensagem.= "<p>Atenciosamente,<br/>";
$mensagem.= "<b>Eneida Sala Cossich</b><br/>";
$mensagem.= "Presidente do Comitê Científico do COBEQ-IC 2011</p>";

//$objRotinas->sendMailNoAuth("t.morenow@gmail.com", "cobec-ic2011@deq.uem.br", utf8_encode($mensagem), "Carta de Aceite - COBEQ-IC 2011", "Tiago Moreno");

if ($objRotinas->sendMailNoAuth($dadosPart["email"], "cobec-ic2011@deq.uem.br", utf8_encode($mensagem), "Carta de Aceite - COBEQ-IC 2011", $dadosPart["nome"])){
//if ($objRotinas->sendMailNoAuth("t.morenow@gmail.com", "cobec-ic2011@deq.uem.br", utf8_encode($mensagem), "Carta de Aceite - COBEQ-IC 2011", "Tiago Moreno")){
  $data = date("Y-m-d H:i:s");
  mysql_query("UPDATE trabalhos SET dataenviocartaaceite = '$data' WHERE id = '$idt'");
  $retorno = "<font color='Green'>".date('d/m/Y', strtotime($data))."</font>";
}
else{
  $retorno = "";
}

$retorno = urlencode($retorno);
echo $retorno; //agora vamos "retornar" o valor, para isso escrevemos ele


?>
