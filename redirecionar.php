<?
include_once 'banco.php';	
include_once 'Inscricoes.class.php';
@session_start();
@session_register("idedit");					

$_SESSION["idedit"] = "";
$cpf = mysql_real_escape_string($_POST["tbCpf"]);
//$cpf = mysql_real_escape_string($_GET["tbCpf"]);
$cpf = trim($cpf);     
$cpf = str_replace(".", "", $cpf);
$cpf = str_replace(",", "", $cpf);
$cpf = str_replace("-", "", $cpf);
$cpf = str_replace("/", "", $cpf);

$cod = $_GET["cod"];
$objParticipantes = new Inscricoes;
$qryPart = $objParticipantes->pesquisarPorCpf($cpf);

if (mysql_num_rows($qryPart) > 0) {
	$dadosParticipante = mysql_fetch_array($qryPart);
	$idp = $dadosParticipante["id"];	
	if ($cod == "1"){
	  echo "<meta http-equiv=\"REFRESH\" content=\"0; url=comprovante.php?cod=$idp\">";
	  exit();
	}

	 if ($cod == "2"){
	  echo "<meta http-equiv=\"REFRESH\" content=\"0; url=enviar_trabalho.php?idp=$idp&cat=T\">";
	  exit();
	}
		
	if ($cod == "3"){
	  $_SESSION["idedit"] = $idp;
	  
	  //require "inscricoes.php";
	  
	  echo "<meta http-equiv=\"REFRESH\" content=\"0; url=inscricoes.php?cod=$idp&upd\">";
	  exit();
	}

    if ($cod == "4"){
	  echo "<meta http-equiv=\"REFRESH\" content=\"0; url=enviar_trabalho.php?idp=$idp&cat=A\">";
	  exit();
	}

    if ($cod == "5"){
	  echo "<meta http-equiv=\"REFRESH\" content=\"0; url=enviar_trabalho.php?idp=$idp&cat=R\">";
	  exit();
	}
}
else{
	echo "<script>";
	echo "javascript:alert('CPF nao encontrado!');  void 0";
	echo "</script>";
	echo "<meta http-equiv=\"REFRESH\" content=\"0; url=index.php\">";
	exit();
}
		

			
		
?> 