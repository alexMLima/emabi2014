<?
include_once '../../../banco.php';
include_once '../../../inscricao/Inscricoes.class.php';

$idpart = $_POST["tbParticipante"];
$idpal = $_GET["pal"];
$data = date("Y-m-d H:i:s");

$objInscricoes = new Inscricoes;
$qryInsc = $objInscricoes->pesquisar($idpart);

$dadosInscr = mysql_fetch_array($qryInsc);
	
$qryMin = mysql_query("SELECT * FROM c2014_participantes_palestras WHERE id_participante = $idpart AND id_minicurso = $idpal");

if (mysql_num_rows($qryMin) > 0){
	$dadosPartMin = mysql_fetch_array($qryMin);
	$idpartMin = $dadosPartMin["id"];		
	if ($dadosPartMin["data_entrada"] != "0000-00-00 00:00:00"){
		echo "<script>";
		echo "javascript:alert('".$dadosInscr["nome"]." j� confirmado!');  void 0";
		echo "</script>";
	}
	else{		
		mysql_query("UPDATE c2014_participantes_palestras SET data_entrada = '$data' WHERE id = '$idpartMin'");
		echo "<script>";
		echo "javascript:alert('".$dadosInscr["nome"]." confirmado com sucesso!');  void 0";
		echo "</script>";
	}	
}
else{       
        
        if (mysql_num_rows($qryInsc)> 0 ){
            mysql_query("INSERT INTO c2014_participantes_palestras (id_minicurso, id_participante, data_entrada) VALUES ('$idpal', '$idpart', '$data')");
            echo "<script>";
            echo "javascript:alert('".$dadosInscr["nome"]." confirmado com sucesso!');  void 0";
            echo "</script>";
        }
        else{
            echo "<script>";
            echo "javascript:alert('C�digo inv�lido!');  void 0";
            echo "</script>";
        }

        
}
/*
else{	
	mysql_query("INSERT INTO participantes_minicursos (id_minicurso, id_participante, data_entrada) VALUES ('$idpal', '$idpart', '$data')");
	echo "<script>";
	echo "javascript:alert('".$dadosInscr["nome"]." confirmado com sucesso!');  void 0";
	echo "</script>";	
}
*/

echo "<meta http-equiv=\"REFRESH\" content=\"0; url=oficina.php?pal=$idpal\">";
exit();
?>