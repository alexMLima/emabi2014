<?
$cod = $_GET["cod"];
$mensagem = 0;
include_once 'banco.php';
include_once 'inscricao/Inscricao.class.php';
include_once 'inscricao/Inscricoes.class.php';
include_once 'minicursos/Minicursos.class.php';
include_once 'participantes_minicursos/ParticipanteMinicurso.class.php';
include_once 'participantes_minicursos/ParticipantesMinicursos.class.php';
echo "mensagem ". $mensagem;
if ($cod == 1) {
	

    $tbNome = $_POST["tbNome"];
    $slSexo = $_POST["slSexo"];
    $slCategoria = 14;
    $tbEmpInst = $_POST["tbEmpInst"];
    $tbCargoCurso = $_POST["tbCargoCurso"];

    $evento = "S";
    $trabalho = "S";
    $minicurso = "S";

    $tbCpf = $_POST["tbCpf"];
    $tbRg = $_POST["tbRg"];
    $tbEndereco = $_POST["tbEndereco"];
    $slCidade = $_POST["cidade"];
    $tbCep = $_POST["tbCep"];
    $tbTelefone = $_POST["tbTelefone"];
    $tbCelular = $_POST["tbCelular"];
    $tbEmail = $_POST["tbEmail"];
    $cbAlojamento = "N";
    $slCategoria = $_POST["slCategoria"];
    $tbComprovante = "";

    
    $objInscricoes = new Inscricoes;

    $objInscricao = new Inscricao(0, $_POST["tbNome"], $_POST["slSexo"], $_POST["tbEmpInst"], $evento, $trabalho, $minicurso, $_POST["tbRg"], $_POST["tbCpf"], $_POST["slCategoria"], $_POST["tbEndereco"], $_POST["tbCep"], $_POST["cidade"], $_POST["tbTelefone"], "", $_POST["tbCelular"], $_POST["tbEmail"], date("Y-m-d H:i:s"), $_POST["tbCargoCurso"], $cbAlojamento,$tbComprovante);
    $mensagem = $objInscricoes->Incluir($objInscricao, "I");
    if (is_int($mensagem)) {

        $objMinicursos = new Minicursos;
        $objMinicursos->ExcluirMinicursosDoParticipante($mensagem);

        /*
        while ($count <= 3) {
            if ($_POST["g" . $count] > 0) {
                $objParticipanteMinicurso = new ParticipanteMinicurso($_POST["g" . $count], $mensagem);
                $objParticipantesMinicursos = new ParticipantesMinicursos;
                $objParticipantesMinicursos->Incluir($objParticipanteMinicurso, "I");

                $objMinicursos->PreencherVagaMinicurso($_POST["g" . $count]);
            }
            $count++;
        }
*/
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
        $slCategoria = "";

        echo "<meta http-equiv=\"REFRESH\" content=\"0; url=comprovante.php?cod=$mensagem\">";
        exit();
    }
    
}
?>