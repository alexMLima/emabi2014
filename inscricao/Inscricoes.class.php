<?

Class Inscricoes {

    public $id;
    public $nome;
    public $sexo;
    public $empinst;
    public $rg;
    public $cpf;
    public $categoria;
    public $enderecocompleto;
    public $cep;
    public $municipio;
    public $estado;
    public $telefone;
    public $fax;
    public $celular;
    public $email;
    public $datainscricao;
    public $cargocurso;
    public $evento;
    public $trabalho;
    public $minicurso;
    public $alojamento;
    public $comprovante;
    public $tipomime_comprovante;
    public $extensao_comprovante;
    public $pago = 'N';
    public $isento = 'S';

    function __construct() {
        
    }

    public function incluir($Inscricao) {

        $retorno = $this->validar($Inscricao, 'I');

        if ($retorno == 'OK') {
            $this->nome = $Inscricao->GetNome();
            $this->sexo = $Inscricao->GetSexo();
            $this->empinst = $Inscricao->GetEmpinst();
            $this->evento = $Inscricao->GetEvento();
            $this->trabalho = $Inscricao->GetTrabalho();
            $this->minicurso = $Inscricao->GetMinicurso();
            $this->rg = $Inscricao->GetRg();
            $this->cpf = $Inscricao->GetCpf();
            $this->categoria = $Inscricao->GetCategoria();
            $this->enderecocompleto = $Inscricao->GetEnderecocompleto();
            $this->cep = $Inscricao->GetCep();
            $this->municipio = $Inscricao->GetMunicipio();
            $this->telefone = $Inscricao->GetTelefone();
            $this->fax = $Inscricao->GetFax();
            $this->celular = $Inscricao->GetCelular();
            $this->email = $Inscricao->GetEmail();
            $this->datainscricao = date("Y-m-d H:i:s");
            $this->cargocurso = $Inscricao->GetCargocurso();
            $this->alojamento = $Inscricao->GetAlojamento();

            $this->comprovante = $Inscricao->GetComprovante();
            $this->tipomime_comprovante = $this->comprovante["type"];
            $this->extensao_comprovante = strrchr($this->comprovante["name"], ".");

            $data = $Inscricao->GetDatapagamento();
            if (empty($data)) {
                $Inscricao->SetDatapagamento();
                $this->datapagamento = $Inscricao->GetDatapagamento();
            }
            if ($this->tipomime_comprovante != "") {
                $pontTrabalho = fopen($this->comprovante["tmp_name"], "r");
                $dadosTrabalho = addslashes(fread($pontTrabalho, 5242880));
            } else {
                $dadosTrabalho = null;
            }

            $query = "INSERT INTO c2013_inscricao (NOME,SEXO,EMPINST,EVENTO, TRABALHO, MINICURSO, RG,CPF,CATEGORIA,ENDERECOCOMPLETO,CEP,MUNICIPIO,TELEFONE,FAX,CELULAR,EMAIL,DATAINSCRICAO,CARGOCURSO,ALOJAMENTO,COMPROVANTE, TIPOMIME_COMPROVANTE, EXTENSAO_COMPROVANTE) VALUES ('$this->nome','$this->sexo','$this->empinst','$this->evento','$this->trabalho','$this->minicurso','$this->rg','$this->cpf','$this->categoria','$this->enderecocompleto','$this->cep','$this->municipio','$this->telefone','$this->fax','$this->celular','$this->email','$this->datainscricao','$this->cargocurso','$this->alojamento', '$dadosTrabalho', '$this->tipomime_comprovante','$this->extensao_comprovante')";

            mysql_query($query) or die("Erro: " . mysql_error());

            return mysql_insert_id();
        } else {
            return $retorno;
        }
    }

    public function atualizar($Inscricao) {
        /**
          [id:Inscricao:private] => 2115
          [nome:Inscricao:private] => Stefano Sendtkok
          [sexo:Inscricao:private] => Feminino
          [empinst:Inscricao:private] => dsvsdv
          [rg:Inscricao:private] =>
          [cpf:Inscricao:private] => 069.252.629-33
          [categoria:Inscricao:private] => 16
          [enderecocompleto:Inscricao:private] => zona 07 rua jose clemente 836 ap 02
          [cep:Inscricao:private] => 87020-071
          [municipio:Inscricao:private] => 883
          [uf:Inscricao:private] => 9
          [telefone:Inscricao:private] => (44)3649-4252
          [fax:Inscricao:private] =>
          [celular:Inscricao:private] => (44)9953-0586
          [email:Inscricao:private] => geniuspescando@gmail.com
          [datainscricao:Inscricao:private] =>
          [cargocurso:Inscricao:private] => aluno2
          [evento:Inscricao:private] =>
          [trabalho:Inscricao:private] =>
          [minicurso:Inscricao:private] =>
          [alojamento:Inscricao:private] =>
          [comprovante:Inscricao:private] =>
          [datapagamento:Inscricao:private] =>
         */
        $retorno = $this->validar($Inscricao, 'A');



        if ($retorno == 'OK') {
            $this->id = $Inscricao->GetId();
            $this->nome = $Inscricao->GetNome();
            $this->sexo = $Inscricao->GetSexo();
            $this->empinst = $Inscricao->GetEmpinst();
            $this->evento = $Inscricao->GetEvento();
            $this->trabalho = $Inscricao->GetTrabalho();
            $this->minicurso = $Inscricao->GetMinicurso();
            $this->rg = $Inscricao->GetRg();
            $this->cpf = $Inscricao->GetCpf();
            $this->categoria = $Inscricao->GetCategoria();
            $this->enderecocompleto = $Inscricao->GetEnderecocompleto();
            $this->cep = $Inscricao->GetCep();
            $this->municipio = $Inscricao->GetMunicipio();
            $this->telefone = $Inscricao->GetTelefone();
            $this->fax = $Inscricao->GetFax();
            $this->celular = $Inscricao->GetCelular();
            $this->email = $Inscricao->GetEmail();
            $this->datainscricao = $Inscricao->GetDatainscricao();
            $this->cargocurso = $Inscricao->GetCargocurso();
            $this->alojamento = $Inscricao->GetAlojamento();
            $this->estado = $Inscricao->GetUf();
            $this->comprovante = $Inscricao->GetComprovante();
            $this->tipomime_comprovante = $this->comprovante["type"];
            $this->extensao_comprovante = strrchr($this->comprovante["name"], ".");

            if ($this->tipomime_comprovante != "") {
                $pontTrabalho = fopen($this->comprovante["tmp_name"], "r");
                $dadosTrabalho = addslashes(fread($pontTrabalho, 5242880));
            }



            $query = "UPDATE c2013_inscricao SET nome = '$this->nome',sexo = '$this->sexo',empinst = '$this->empinst',evento = '$this->evento',trabalho = '$this->trabalho',minicurso = '$this->minicurso',rg = '$this->rg',cpf = '$this->cpf',categoria = '$this->categoria', enderecocompleto = '$this->enderecocompleto',cep = '$this->cep',telefone = '$this->telefone',fax = '$this->fax',celular = '$this->celular',email = '$this->email', cargocurso = '$this->cargocurso', alojamento = '$this->alojamento'";

            if ($Inscricao->GetMunicipio() != 0 && $Inscricao->GetMunicipio() != "") {
                $query .= " ,municipio = '$this->municipio'";
            }

            if ($Inscricao->GetUf() != 0 && $Inscricao->GetUf() != "") {
                $query .= " ,estado = '$this->estado'";
            }

            if ($this->tipomime_comprovante != "") {
                $query .= " ,comprovante = '$dadosTrabalho', tipomime_comprovante = '$this->tipomime_comprovante', extensao_comprovante = '$this->extensao_comprovante' ";
            }



            $query .= " WHERE id = '$this->id'";

            mysql_query($query) or die("Erro: " . mysql_error());

            return 'OK';
        } else {
            return $retorno;
        }
    }

    public function excluir($id) {
        $query = "DELETE FROM c2013_inscricao WHERE id = '$id'";
        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }

    public function pesquisar($id) {
        $query = "SELECT * FROM c2013_inscricao WHERE id = '$id'";
        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }

    public function pesquisarPorCpf($cpf) {
        $query = "SELECT * FROM c2013_inscricao WHERE cpf = '$cpf'";
        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }

    public function pesquisarPorCpfdaLista($cpf) {
        $query = "SELECT * FROM c2013_inscricao WHERE cpf = '$cpf' AND espera = 'N'";
        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }

    public function ConsultaTabela() {
        $query = "SELECT * FROM c2013_inscricao ORDER BY nome";
        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }

    public function ConsultaTabelaOrdenada($ordem) {
        $query = "SELECT * FROM c2013_inscricao ORDER BY " . $ordem;
        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }

    public function pesquisarPorMunicipio($mun) {
        $query = "SELECT * FROM c2013_inscricao WHERE municipio = '$mun' order by municipio, nome";
        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }

    public function pesquisarPorHotel($hotel) {
        $query = "SELECT * FROM c2013_inscricao WHERE hotelconv = '$hotel' order by hotelconv, nome";
        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }

    public function pesquisarPorCategoria($cat) {
        $query = "SELECT * FROM c2013_inscricao WHERE categoria = '$cat' order by categoria,nome";
        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }

    public function AtualizarNumeroCrachas($id) {
        $query = "UPDATE c2013_inscricao SET ncrachasimpressos = ncrachasimpressos + 1 WHERE id = '$id'";
        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }

    public function ConferirPagamento($id, $op, $dt) {
        if ($op != "N") {
            if ($dt == "")
                $datapag = date("Y-m-d H:i:s");
            else
                $datapag = $dt;
        }
        else
            $datapag = "0000-00-00 00:00:00";

        if ($op != "I") {
            $query = "UPDATE c2013_inscricao SET pago = '$op', isento = 'N', datapagamento = '$datapag' WHERE id = '$id'";
        }
        else
            $query = "UPDATE c2013_inscricao SET isento = 'S', datapagamento = '$datapag' WHERE id = '$id'";

        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }

    public function pesquisarInscricoesaPartirDaData($data) {
        $query = "SELECT * FROM c2013_inscricao WHERE datainscricao >= '$data' order by nome";
        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }

    public function pesquisarParticipantesdoMinicurso($id) {
        $query = "select p.id, p.nome, pm.data_entrada" .
                "  FROM c2013_inscricao as p," .
                "       c2013_participantes_minicursos as pm," .
                "       c2013_minicursos as m" .
                " where m.id = $id" .
                "   and p.id = pm.id_participante" .
                "   and m.id = pm.id_minicurso order by p.nome";

        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }

    public function pesquisarListadeEspera($sn) {
        $query = "SELECT * FROM c2013_inscricao WHERE espera = '$sn' ORDER BY nome";
        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }

    public function pesquisarListadeEsperaOrderBy($sn, $orderBy) {
        $query = "SELECT * FROM c2013_inscricao WHERE espera = '$sn' ORDER BY " . $orderBy;
        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }

    public function AtualizaListaEspera($sn, $id) {
        $query = "UPDATE c2013_inscricao SET espera = '$sn' WHERE id = '$id'";
        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }

    public function pesquisarParticipantesConfirmados() {
        $query = "SELECT * FROM c2013_inscricao WHERE ncrachasimpressos > 0 ORDER BY nome";
        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }

    public function pesquisarParticipantesForadoMinicurso($id) {
        $query = "SELECT * FROM c2013_inscricao WHERE id NOT IN (select id_participante from c2013_participantes_minicursos where id_minicurso = $id) order by nome";
        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }

    public function pesquisarParticipantedoTrabalho($id) {
        $query = "select p.id, p.nome, p.email" .
                "  FROM c2013_inscricao as p," .
                "       c2013_participantes_trabalhos as pr," .
                "       c2013_trabalhos as r" .
                " where r.id = $id" .
                "   and p.id = pr.id_participante" .
                "   and r.id = pr.id_trabalho";

        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }

    public function validar($Inscricao, $origem) {
        $erro = 0;
        $msg = "";


        $cpf = $Inscricao->GetCpf();
        if ($origem == 'A' || $origem == 'I') {
            if ($origem == 'A') {
                $id = $Inscricao->GetId();
                $select = "SELECT ID, NOME FROM c2013_inscricao" .
                        " WHERE ID = '$id'";
                $resultado = mysql_query($select) or die("Erro: " . mysql_error());
                $total = mysql_num_rows($resultado);
                if ($total == 0) {
                    $nome = mysql_fetch_array($resultado);
                    $msg.="Id não encontrado em nossa base de dados.<br>";
                    $erro = 1;
                }
            } else {
                $select = "SELECT ID, NOME FROM c2013_inscricao" .
                        " WHERE cpf = '$cpf'";
                $total = 0;
                $resultado = mysql_query($select) or die("Erro: " . mysql_error());
                $total = mysql_num_rows($resultado);
                if ($total > 0) {
                    $nome = mysql_fetch_array($resultado);
                    $msg.="Este CPF já está cadastrado!<br>";
                    $erro = 1;
                }
            }
        }
        if ($Inscricao->GetNome() == "") {
            $msg.="O campo NOME deve ser preenchido!<br>";
            $erro = 1;
        }

        if ($Inscricao->GetSexo() == "0") {
            $msg.="O campo SEXO deve ser preenchido!<br>";
            $erro = 1;
        }
        if ($Inscricao->GetCategoria() == "0") {
            $msg.="O campo CATEGORIA deve ser preenchido!<br>";
            $erro = 1;
        }
        if ($Inscricao->GetEmpInst() == "") {
            $msg.="O campo EMPRESA/INSTITUIÇÃO deve ser preenchido!<br>";
            $erro = 1;
        }
        /*
          if ($Inscricao->GetEvento() == "" && $Inscricao->GetTrabalho() == "" && $Inscricao->GetMinicurso() == "") {
          $msg.="O campo MODALIDADE deve ser preenchido!<br>";
          $erro = 1;
          }
         */ 

        if ($Inscricao->GetCpf() == "" || strlen($Inscricao->GetCpf()) < 11 || strlen($Inscricao->GetCpf()) > 15) {
            $msg.="O campo CPF deve ser preenchido e deve ter 11 digitos!<br>";
            $erro = 1;
        }

        if ($Inscricao->GetEnderecocompleto() == "") {
            $msg.="O campo ENDEREÇO COMPLETO deve ser preenchido!<br>";
            $erro = 1;
        }

        if ($origem != "A") {

            if ($Inscricao->GetMunicipio() == 0 || $Inscricao->GetMunicipio() == "") {
                $msg.="O campo CIDADE deve ser preenchido!<br>";
                $erro = 1;
            }

            /*

              $comprovante = $Inscricao->GetComprovante();

              if (($comprovante["type"] == "") && ($Inscricao->GetCategoria() >= 17)) {
              $msg.="O campo COMPROVANTE deve ser preenchido!<br>";
              $erro = 1;
              }

             */
        }

        if ($Inscricao->GetCep() == "") {
            $msg.="O campo CEP deve ser preenchido!<br>";
            $erro = 1;
        }


        if ($Inscricao->GetTelefone() == "") {
            $msg.="O campo TELEFONE deve ser preenchido!<br>";
            $erro = 1;
        }
        if ($Inscricao->GetEmail() == "") {
            $msg.="O campo E-MAIL deve ser preenchido!<br>";
            $erro = 1;
        }

        if ($erro == 1) {
            return utf8_decode($msg);
        } else {
            return 'OK';
        }
    }

}

?>