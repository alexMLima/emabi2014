<?
$ida = ( isset( $_GET["ida"] ) )? $_GET["ida"] : 0;
$cod = ( isset( $_GET["cod"] ) )? $_GET["cod"] : 0;

include_once '../banco.php';
include_once '../comissao/Comissao.class.php';
include_once '../comissao/Comissoes.class.php';
$msg = 'OK';
if ($cod == 1){	
	$objComissao = new Comissao($ida,$_POST["tbNome"],$_POST["tbEmail"],$_POST["tbLogin"],$_POST["tbSenha"],$_POST["permissao"],$_POST["avaliador"]);		
	$objComissoes = new Comissoes();
	$msg = $objComissoes->atualizar($objComissao, 'N');
	if ($msg == 'OK'){
		echo "<script>";
		echo "javascript:alert('Atualização realizada com sucesso!');  void 0";
		echo "</script>";
		echo "<meta http-equiv=\"REFRESH\" content=\"0; url=dados_comissao.php\">";
	}
	
}
?>