<?
$id = $_GET["id"];

include_once '../banco.php';
include_once '../trabalhos/Trabalhos.class.php';
include_once '../coautores_trabalho/CoautoresTrabalhos.class.php';
include_once '../participantes_trabalhos/ParticipantesTrabalhos.class.php';

$objTrabalhos = new Trabalhos;
$objCoautoresTrabalhos = new CoautoresTrabalhos;
$objParticipantesTrabalhos = new ParticipantesTrabalhos;

$objParticipantesTrabalhos->DeletarParticipantedoTrabalho($id);
$objCoautoresTrabalhos->DeletarCoautoresdoTrabalho($id);		
$objTrabalhos->DeletarTrabalho($id);

echo "<meta http-equiv=\"REFRESH\" content=\"0; url=trabalhos.php\">";
	
	

?>