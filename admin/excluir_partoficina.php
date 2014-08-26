<?
$id = $_GET["id"];
$pal = $_GET["pal"];
include_once '../banco.php';
include_once '../participantes_minicursos/ParticipantesMinicursos.class.php';
include_once '../minicursos/Minicursos.class.php';

$objMinicursos = new Minicursos;
$objParticipantesMinicursos = new ParticipantesMinicursos;

$objMinicursos->LiberarVagaMinicurso($pal);
$objParticipantesMinicursos->excluirMinicursodoParticipante($id,$pal);
	
	
echo "<script>";
echo "javascript:alert('Exclusão realizada com sucesso!');  void 0";
echo "</script>";
echo "<meta http-equiv=\"REFRESH\" content=\"0; url=oficinas.php?of=$pal\">";
	
	

?>