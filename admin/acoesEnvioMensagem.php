<?

$cod = $_GET["cod"];
include_once '../banco.php';
include_once '../rotinas/Rotinas.class.php';

if ($cod == 1) { //Inclusão

    $mensagem = 'OK';

    $tbDe = $_POST["tbDe"];
    $slPara = $_POST["slPara"];
    $tbAssunto = $_POST["tbAssunto"];
    $tbMensagem = $_POST["tbMensagem"];

    if ($slPara == ""){
      $mensagem = "O destino é obrigatório!<br/>";
    }

    if ($tbAssunto == ""){
      $mensagem .= "O assunto é obrigatório!<br/>";
    }

    if ($tbMensagem == ""){
      $mensagem .= "A mensagem é obrigatória!<br/>";
    }

    if ($mensagem == 'OK'){
        $retorno = "";
        $objRotinas = new Rotinas;
        if ($_POST["slPara"] != "TESTE"){
            $qryDados = mysql_query("SELECT nome, email FROM " . $_POST["slPara"] . " WHERE email like '%@%' ORDER BY nome");

            while ($dadosEnvio = mysql_fetch_array($qryDados)) {
                if (!$objRotinas->sendMailNoAuth($dadosEnvio["email"], "leifams2011@pse.uem.br", utf8_encode(nl2br($_POST["tbMensagem"])), $_POST["tbAssunto"], $dadosEnvio["nome"])){
                    $retorno.= "Erro ao enviar mensagem para: ".$dadosEnvio["email"]."<br/>";
                }
            }

            if ($retorno != "")
                $mensagem = $retorno;
            else
                $mensagem = "Mensagem enviada com sucesso!";
        }
        else{
          $objRotinas->sendMailNoAuth("t.morenow@gmail.com", "cobec-ic2011@deq.uem.br", utf8_encode(nl2br($_POST["tbMensagem"])), $_POST["tbAssunto"], "Tiago Moreno");
          //$objRotinas->sendMailNoAuth("eneida@deq.uem.br", "cobec-ic2011@deq.uem.br", utf8_encode(nl2br($_POST["tbMensagem"])), $_POST["tbAssunto"], "Eneida");
          $mensagem = "Mensagem de teste enviada com sucesso!";
        }

        $tbDe = "";
        $slPara = "";
        $tbAssunto = "";
        $tbMensagem = "";
    }
}
?>