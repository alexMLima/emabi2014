<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?
@session_start();			
$cod = $_GET["cod"];

include_once '../banco.php';
include_once '../comissao/Comissoes.class.php';

if ($cod == 1){		
	$tbLogin  = mysql_real_escape_string($_POST['tbLogin']);
	$tbSenha = mysql_real_escape_string($_POST['tbSenha']);		
	
	$objComissoes = new Comissoes;
	$qryComissoes = $objComissoes->PesquisarLogineSenha($tbLogin,$tbSenha);
	$loginValido = mysql_num_rows($qryComissoes);	
	
	@session_register('id');
	@session_register('nome');	
	$_SESSION['id'] = "";
	$_SESSION['nome'] = "";
	
	if ($loginValido > 0){		
 	    $rs = mysql_fetch_array($qryComissoes);
	    $nome = strtok($rs["nome"], ' ');   
	    $_SESSION['id'] = $rs["id"];
	    $_SESSION['nome'] = $nome;		
		mysql_free_result($qryComissoes);
	    mysql_close($con);		
		echo "<meta http-equiv=\"REFRESH\" content=\"0; url=home.php\">";
		
	}
	else{
		echo "<script>";
		echo "javascript:alert('Login e/ou senha inválidos!');  void 0";
		echo "</script>";
		echo "<meta http-equiv=\"REFRESH\" content=\"0; url=index.php\">";
	}
	
	
}
?>