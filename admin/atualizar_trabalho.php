<?

$idt = $_GET["idt"];
$cod = $_GET["cod"];
$av1 = $_GET["av1"];
$av2 = $_GET["av2"];

include_once '../banco.php';
include_once '../trabalhos/Trabalhos.class.php';
include_once '../areas_conhecimento/AreasConhecimento.class.php';

if ($cod == 1){	
	$objTrabalhos = new Trabalhos;		
	//die("teste:".$idt."|".$cod."|".$ct."|".$av1."|".$av2);
	//die("teste:".$_POST["slAvaliador"]."|".$_POST["slSituacao"]."|".$_POST["slAvaliador02"]."|".$_POST["slSituacao02"]);
	if ($_SESSION["permissao"] > 10 || $_SESSION["id"] == $av1) { 						
		$qryTrabalhos = $objTrabalhos->AtualizarSituacaoTrabalhoAvaliador1($idt,$_POST["slAvaliador"], $_POST["slSituacao"], $_POST["tbParecerAv01"], $_POST["slApresentador"],$_POST["slArea"],$_POST["slForma"]);
	}
	
	
	if ($_SESSION["permissao"] > 10 || $_SESSION["id"] == $av2) { 						
		$qryTrabalhos = $objTrabalhos->AtualizarSituacaoTrabalhoAvaliador2($idt,$_POST["slAvaliador02"], $_POST["slSituacao02"], $_POST["tbParecerAv02"], $_POST["slApresentador"],$_POST["slArea"],$_POST["slForma"]);
	}
	
	
	if ($qryTrabalhos){
		echo "<script>";
		echo "javascript:alert('Atualização realizada com sucesso!');  void 0";
		echo "</script>";
		echo "<meta http-equiv=\"REFRESH\" content=\"0; url=detalhes_trabalho.php?idt=$idt\">";
	}
	
}
?>