<?
  $cod = $_GET["cod"];
  include_once '../banco.php';
  include_once '../comissao/Comissao.class.php';
  include_once '../comissao/Comissoes.class.php';
  include_once '../areas_conhecimento/AreasConhecimento.class.php';

  if ($cod == 1){	//Inclusão

    $loginav = $_POST["login"];
    $senhaav = $_POST["senha"];
    $nomeav = $_POST["nome"];
    $emailav = $_POST["email"];
    $permissaoav = $_POST["permissao"];
    $avaliadorav = $_POST["avaliador"];
    $slArea01 = $_POST["slArea01"];
    $slArea02 = $_POST["slArea02"];
    $slArea03 = $_POST["slArea03"];
	
	if ($avaliadorav == "")
	  $avaliadorav = "N";

    $objComissao = new Comissao(0,$nomeav,$emailav,$loginav,$senhaav, $permissaoav,$avaliadorav,$slArea01,$slArea02,$slArea03);
    $objComissoes = new Comissoes;

    $mensagem = $objComissoes->incluir($objComissao);

    if ($mensagem == "OK"){
      echo "<meta http-equiv=\"REFRESH\" content=\"0; url=gerenciarComissoes.php\">";
    }

  }


  if ($cod == 2){	//Alteração

    $loginav = $_POST["login"];
    $senhaav = $_POST["senha"];
    $nomeav = $_POST["nome"];
    $emailav = $_POST["email"];
    $permissaoav = $_POST["permissao"];
    $avaliadorav = $_POST["avaliador"];
    $slArea01 = $_POST["slArea01"];
    $slArea02 = $_POST["slArea02"];
    $slArea03 = $_POST["slArea03"];
    
	if ($avaliadorav == "")
	  $avaliadorav = "N";
	  
    $objComissao = new Comissao($_GET["idc"],$nomeav,$emailav,$loginav,$senhaav, $permissaoav,$avaliadorav,$slArea01,$slArea02,$slArea03);
    $objComissoes = new Comissoes;

    $mensagem = $objComissoes->atualizar($objComissao, 'S');

    if ($mensagem == "OK"){
      echo "<meta http-equiv=\"REFRESH\" content=\"0; url=gerenciarComissoes.php\">";
    }

  }

  if ($cod == 3){	//Exclusão

    $idc = $_GET["idc"];
    $objComissoes = new Comissoes;

    $objComissoes->excluir($idc);
    echo "<meta http-equiv=\"REFRESH\" content=\"0; url=gerenciarComissoes.php\">";
  }


?>