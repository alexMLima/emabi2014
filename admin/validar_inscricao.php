<?
$cod = $_GET["cod"];
$idp = $_GET["idp"];

include_once '../banco.php';
include_once '../inscricao/Inscricao.class.php';
include_once '../inscricao/Inscricoes.class.php';

if ($cod == 1){	
	
	$tbNome = $_POST["tbNome"];
    $slSexo = $_POST["slSexo"];
    $tbEmpInst = $_POST["tbEmpInst"];
    $tbCargoCurso = $_POST["tbCargoCurso"];

    $evento = "N";
    $trabalho = "N";
    $minicurso = "N";

    $tbCpf = $_POST["tbCpf"];
    $tbRg = $_POST["tbRg"];
    $tbEndereco = $_POST["tbEndereco"];
    $slCidade = $_POST["cidade"];
    $tbCep = $_POST["tbCep"];
    $tbTelefone = $_POST["tbTelefone"];

    $cbAlojamento = "N";

    $tbCelular = $_POST["tbCelular"];
    $tbEmail = $_POST["tbEmail"];

    $slCategoria = $_POST["slCategoria"];
    $tbComprovante = $_FILES["tbComprovante"];
	
	$objInscricoes = new Inscricoes;
	
	$objInscricao = new Inscricao($idp, $_POST["tbNome"], $_POST["slSexo"], $_POST["tbEmpInst"], $evento, $trabalho, $minicurso, $_POST["tbRg"], $_POST["tbCpf"], $_POST["slCategoria"], $_POST["tbEndereco"], $_POST["tbCep"], $_POST["cidade"], $_POST["tbTelefone"], "", $_POST["tbCelular"], $_POST["tbEmail"], date("Y-m-d H:i:s"), $_POST["tbCargoCurso"], $cbAlojamento, $tbComprovante);
	

	$mensagem = $objInscricoes->Atualizar($objInscricao,"A");
	
	if ($mensagem == 'OK'){					
		
		$tbNome = "";
		$slSexo = "";
		$slCategoria = "";
		$tbEmpInst = "";
		$tbCargoCurso = "";
		$tbCpf = "";
		$tbRg = "";
		$tbEndereco = "";
		$slCidade = "";
		$tbCep = "";
		$tbTelefone = "";		
		$tbCelular = "";
		$tbEmail = "";
		$cbAlojamento = "";
				
		echo "<script>";
		echo "javascript:alert('Atualização realizada com sucesso!');  void 0";
		echo "</script>";
		echo "<meta http-equiv=\"REFRESH\" content=\"0; url=participantes.php\">";
		exit();
	}
}

else{

	$objInscricoes = new Inscricoes;
	$qryInsc = $objInscricoes->pesquisar($idp);
	$dadosInsc = mysql_fetch_array($qryInsc);
	
	$tbNome = $dadosInsc["nome"];
	$slSexo = $dadosInsc["sexo"];
	$tbEmpInst = $dadosInsc["empinst"];
	$evento = $dadosInsc["evento"];
	$trabalho = $dadosInsc["trabalho"];
	$minicurso = $dadosInsc["minicurso"];
	$tbCpf = $dadosInsc["cpf"];
	$tbRg = $dadosInsc["rg"];
	$slCategoria = $dadosInsc["categoria"];
	$tbCargoCurso = $dadosInsc["cargocurso"];
	$tbEndereco = $dadosInsc["enderecocompleto"];
	$slCidade = $dadosInsc["municipio"];
	$tbCep = $dadosInsc["cep"];
	$tbTelefone = $dadosInsc["telefone"];	
	$tbCelular = $dadosInsc["celular"];
	$tbEmail = $dadosInsc["email"];	
	$cbAlojamento = $dadosInsc["alojamento"];
        $slCategoria = $dadosInsc["categoria"];

}
?>