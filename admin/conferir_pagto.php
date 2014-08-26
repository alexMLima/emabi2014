<?

$gmtDate = gmdate("D, d M Y H:i:s");

header("Expires: {$gmtDate} GMT");
header("Last-Modified: {$gmtDate} GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

$id = $_GET["id"];
$op = $_GET["op"];
include_once '../banco.php';
include_once '../inscricao/Inscricoes.class.php';



if((isset($_GET["dt"])) && ($op == "S")){
    $tbData = $_GET["dt"];
    $dataDigitada = explode("/",$tbData);
    $datapgto = $dataDigitada[2]."-".$dataDigitada["1"]."-".$dataDigitada[0]." 00:00:00";
}
else{
    $datapgto = "";
}

$objParticipantes = new Inscricoes;
$objParticipantes->ConferirPagamento($id,$op,$datapgto);

if ($op == "S")
    $retorno = "<font color='Green'><b>SIM</b></font>";
else
{
    if ($op == "I")
        $retorno = "<font color='Green'><b>ISENTO</b></font>";
    else
        $retorno = "<font color='Red'><b>NÃO</b></font>";
}

$retorno = urlencode($retorno);
echo $retorno;
	

?>