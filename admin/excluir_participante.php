<?
$idp = $_GET["idp"];
include_once '../banco.php';
include_once '../inscricao/Inscricoes.class.php';
include_once '../participantes_minicursos/ParticipantesMinicursos.class.php';
include_once '../minicursos/Minicursos.class.php';

$objParticipantes = new Inscricoes;
$objMinicursos = new Minicursos;
$objParticipantesMinicursos = new ParticipantesMinicursos;

$qryMcPart = $objMinicursos->PesquisarMinicursosdoParticipante($id);

while($dadosMcPart = mysql_fetch_array($qryMcPart)){
	$objMinicursos->LiberarVagaMinicurso($dadosMcPart["id"]);
	$objParticipantesMinicursos->excluirMinicursodoParticipante($idp,$dadosMcPart["id"]);
}

$objParticipantes->excluir($idp);	

echo "<meta http-equiv=\"REFRESH\" content=\"0; url=participantes.php\">";
	

?>