<?
$id = $_POST["tbId"];

include_once '../banco.php';
include_once '../inscricao/inscricoes.class.php';

$objParticipantes = new Inscricoes;
$qryPart = $objParticipantes->pesquisar($id);
$dados = mysql_fetch_array($qryPart);

$objParticipantes->AtualizarNumeroCrachas($id);

$arrayNomes = explode(" ",$dados["nome"]);
$fimArray = count($arrayNomes);
$nomeCracha = $arrayNomes[0]." ".$arrayNomes[$fimArray-1];

echo "<script>";
echo "javascript:alert('".$nomeCracha." confirmado com sucesso!');  void 0";
echo "</script>";
echo "<meta http-equiv=\"REFRESH\" content=\"0; url=confirmar.php\">";
	
	

?>