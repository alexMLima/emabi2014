<?

@session_start();
$mensagem = 'OK';
$cod = $_GET["cod"];
$id = $_SESSION["idedit"];

if ($id == "" || $id == null) {
    echo "<script>";
    echo "javascript:alert('Para edição dos dados, é necessário localizar a inscrição!');  void 0";
    echo "</script>";
    echo "<meta http-equiv=\"REFRESH\" content=\"0; url=buscaporcpf.php?cod=3\">";
    exit();
}

include_once 'banco.php';
include_once 'inscricao/Inscricao.class.php';
include_once 'inscricao/Inscricoes.class.php';
include_once 'minicursos/Minicursos.class.php';
include_once 'participantes_minicursos/ParticipanteMinicurso.class.php';
include_once 'participantes_minicursos/ParticipantesMinicursos.class.php';

if ($cod == 1) {


    $tbNome = $_POST["tbNome"];
    $slSexo = $_POST["slSexo"];
    $slCategoria = 14;
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
    $tbComprovante = "";

    
    $objInscricoes = new Inscricoes;

    $objInscricao = new Inscricao($id, $_POST["tbNome"], $_POST["slSexo"], $_POST["tbEmpInst"], $evento, $trabalho, $minicurso, $_POST["tbRg"], $_POST["tbCpf"], $_POST["slCategoria"], $_POST["tbEndereco"], $_POST["tbCep"], $_POST["cidade"], $_POST["tbTelefone"], "", $_POST["tbCelular"], $_POST["tbEmail"], date("Y-m-d H:i:s"), $_POST["tbCargoCurso"], $cbAlojamento, $tbComprovante);

    $mensagem = $objInscricoes->Atualizar($objInscricao, "A");

    if ($mensagem == 'OK') {

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

        $_SESSION["idedit"] = "";
        $count = 1;
        $objMinicursos = new Minicursos;
        $objMinicursos->ExcluirMinicursosDoParticipante($id);

        while ($count <= 3) {
            if ($_POST["g" . $count] > 0) {
                $objParticipanteMinicurso = new ParticipanteMinicurso($_POST["g" . $count], $id);
                $objParticipantesMinicursos = new ParticipantesMinicursos;
                $objParticipantesMinicursos->Incluir($objParticipanteMinicurso, "I");

                $objMinicursos->PreencherVagaMinicurso($_POST["g" . $count]);
            }
            $count++;
        }

        echo "<script>";
        echo "javascript:alert('Atualização realizada com sucesso!');  void 0";
        echo "</script>";
        echo "<meta http-equiv=\"REFRESH\" content=\"0; url=buscaporcpf.php?cod=3\">";
        exit();
    }
    
} else {

    $objInscricoes = new Inscricoes;
    $qryInsc = $objInscricoes->pesquisar($id);
    $dadosInsc = mysql_fetch_array($qryInsc);

    $tbNome = $dadosInsc["nome"];
    $slSexo = $dadosInsc["sexo"];
    $tbEmpInst = $dadosInsc["empinst"];   
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
    $slCategoria = $dadosInsc["categoria"];
    $pago = $dadosInsc["pago"];
    $isento = $dadosInsc["isento"];
    
    $objMinicursos = new Minicursos;
    $queryg1 = $objMinicursos->PesquisarMinicursosdoParticipanteEGrupo($id, 1);
    if (mysql_num_rows($queryg1) > 0) {
        $dadosg1 = mysql_fetch_array($queryg1);
        $g1 = $dadosg1["id"];
    } else {
        $g1 = 0;
    }

    $queryg2 = $objMinicursos->PesquisarMinicursosdoParticipanteEGrupo($id, 2);
    if (mysql_num_rows($queryg2) > 0) {
        $dadosg2 = mysql_fetch_array($queryg2);
        $g2 = $dadosg2["id"];
    } else {
        $g2 = 0;
    }

    $queryg3 = $objMinicursos->PesquisarMinicursosdoParticipanteEGrupo($id, 3);
    if (mysql_num_rows($queryg3) > 0) {
        $dadosg3 = mysql_fetch_array($queryg3);
        $g3 = $dadosg3["id"];
    } else {
        $g3 = 0;
    }
}
?>