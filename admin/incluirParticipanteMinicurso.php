<?
$id = $_GET["idof"];

include_once '../banco.php';
include_once '../participantes_minicursos/ParticipanteMinicurso.class.php';
include_once '../participantes_minicursos/ParticipantesMinicursos.class.php';
include_once '../minicursos/Minicursos.class.php';


$objParticipanteMinicurso = new ParticipanteMinicurso($id, $_POST["slParticipante"]);
$objParticipantesMinicursos = new ParticipantesMinicursos;
$objParticipantesMinicursos->Incluir($objParticipanteMinicurso,"I");

$objMinicursos = new Minicursos;
$objMinicursos->PreencherVagaMinicurso($id);			
					
	
echo "<meta http-equiv=\"REFRESH\" content=\"0; url=oficinas.php?of=$id\">";
exit();


?>