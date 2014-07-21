<?
$id = $_POST["tbId"];

include_once '../../banco.php';
include_once '../../inscricao/Inscricoes.class.php';

$objParticipantes = new Inscricoes;
$qryPart = $objParticipantes->pesquisar($id);

$cod = $_GET["cod"];

if (mysql_num_rows($qryPart) > 0) {


    $dados = mysql_fetch_array($qryPart);

    $arrayNomes = explode(" ",$dados["nome"]);
    $fimArray = count($arrayNomes);
    $nomeCracha = $arrayNomes[0]." ".$arrayNomes[$fimArray-1];
    
    $hoje = date("Y-m-d H:i:s");


    switch($cod){

            case "1":
              if ($dados["confmaterial"] != "0000-00-00 00:00:00"){
                    echo "<script>";
                    echo "javascript:alert('".$nomeCracha." j� confirmou retirada do material!');  void 0";
                    echo "</script>";
                    echo "<meta http-equiv=\"REFRESH\" content=\"0; url=confirmar.php?cod=$cod\">";
                    exit();
              }
              else{
                    mysql_query("UPDATE c2014_inscricao SET confmaterial = '$hoje' WHERE id = '$id'");
                    $msg = "Material entregue para ".$nomeCracha;
              }
              break;
            case "2":
              if ($dados["dia01"] != "0000-00-00 00:00:00"){
                    echo "<script>";
                    echo "javascript:alert('".$nomeCracha." j� confirmou a presen�a de 29 de agosto!');  void 0";
                    echo "</script>";
                    echo "<meta http-equiv=\"REFRESH\" content=\"0; url=confirmar.php?cod=$cod\">";
                    exit();
              }
              else{
                    mysql_query("UPDATE c2014_inscricao SET dia01 = '$hoje' WHERE id = '$id'");
                    $msg = "Confirma��o para o dia 29 de agosto realizada para ".$nomeCracha;
              }
              break;
            case "3":
              if ($dados["dia02"] != "0000-00-00 00:00:00"){
                    echo "<script>";
                    echo "javascript:alert('".$nomeCracha." j� confirmou a presen�a de 30 de agosto!');  void 0";
                    echo "</script>";
                    echo "<meta http-equiv=\"REFRESH\" content=\"0; url=confirmar.php?cod=$cod\">";
                    exit();
              }
              else{
                    mysql_query("UPDATE c2014_inscricao SET dia02 = '$hoje' WHERE id = '$id'");
                    $msg = "Confirma��o para o dia 30 de agosto realizada para ".$nomeCracha;
              }
              break;
            case "4":
              if ($dados["dia03"] != "0000-00-00 00:00:00"){
                    echo "<script>";
                    echo "javascript:alert('".$nomeCracha." j� confirmou a presen�a de 31 de agosto!');  void 0";
                    echo "</script>";
                    echo "<meta http-equiv=\"REFRESH\" content=\"0; url=confirmar.php?cod=$cod\">";
                    exit();
              }
              else{
                    mysql_query("UPDATE c2014_inscricao SET dia03 = '$hoje' WHERE id = '$id'");
                    $msg = "Confirma��o para o dia 31 de agosto realizada para ".$nomeCracha;
              }
              break;
          case "5":
              if ($dados["dia04"] != "0000-00-00 00:00:00"){
                    echo "<script>";
                    echo "javascript:alert('".$nomeCracha." j� confirmou a presen�a de 01 de setembro!');  void 0";
                    echo "</script>";
                    echo "<meta http-equiv=\"REFRESH\" content=\"0; url=confirmar.php?cod=$cod\">";
                    exit();
              }
              else{
                    mysql_query("UPDATE c2014_inscricao SET dia04 = '$hoje' WHERE id = '$id'");
                    $msg = "Confirma��o para o dia 01 de setembro realizada para ".$nomeCracha;
              }
              break;
          case "6":
              if ($dados["dia05"] != "0000-00-00 00:00:00"){
                    echo "<script>";
                    echo "javascript:alert('".$nomeCracha." j� confirmou a presen�a de 02 de setembro!');  void 0";
                    echo "</script>";
                    echo "<meta http-equiv=\"REFRESH\" content=\"0; url=confirmar.php?cod=$cod\">";
                    exit();
              }
              else{
                    mysql_query("UPDATE c2014_inscricao SET dia05 = '$hoje' WHERE id = '$id'");
                    $msg = "Confirma��o para o dia 02 de setembro realizada para ".$nomeCracha;
              }
              break;
    }
}
else{
    $msg = "C�digo inv�lido!";
}
echo "<script>";
echo "javascript:alert('".$msg."');  void 0";
echo "</script>";
echo "<meta http-equiv=\"REFRESH\" content=\"0; url=confirmar.php?cod=$cod\">";
	
	

?>