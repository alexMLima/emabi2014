<?php

class Minicursos {

    function __construct() {

    }

    public function PreencherVagaMinicurso($id) {
        $query = "UPDATE c2014_minicursos SET nvagaspreenc = nvagaspreenc + 1 WHERE id = $id";
        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
    }

    public function ExcluirMinicursosDoParticipante($id) {
        $qryMinicursos = $this->PesquisarMinicursosdoParticipante($id);
        while ($dadosMinicursoPart = mysql_fetch_array($qryMinicursos)){
          mysql_query("DELETE FROM c2014_participantes_minicursos WHERE id_minicurso = ".$dadosMinicursoPart["id"]." AND id_participante = '$id'");
          mysql_query("UPDATE c2014_minicursos SET nvagaspreenc = nvagaspreenc - 1 WHERE id = ".$dadosMinicursoPart["id"]);
        }        
    }

    public function PesquisarPorId($id) {
        $query = "SELECT * FROM c2014_minicursos
						   WHERE id = '$id'";
        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }

    public function PesquisarMinicursosdoParticipante($participante) {
        $query = "SELECT m.* FROM c2014_minicursos as m, c2014_participantes_minicursos as pm, c2014_inscricao as p" .
                " WHERE p.id = '$participante'" .
                "   AND m.id = pm.id_minicurso" .
                "   AND p.id = pm.id_participante order by m.nminicurso";

        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }

    public function PesquisarMinicursosdoParticipanteEGrupo($participante, $grupo) {
        $query = "SELECT m.* FROM c2014_minicursos as m, c2014_participantes_minicursos as pm, c2014_inscricao as p" .
                " WHERE p.id = '$participante' and m.grupo = '$grupo'" .
                "   AND m.id = pm.id_minicurso" .
                "   AND p.id = pm.id_participante order by m.nminicurso";

        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }

    public function PesquisarPorGrupo($grupo) {
        $query = "SELECT * FROM c2014_minicursos
						   WHERE grupo = '$grupo' and cancelada = 'N' order by nminicurso";
        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }

    public function PesquisarPorGrupoComVagas($grupo) {
        $query = "SELECT * FROM c2014_minicursos
						   WHERE grupo = '$grupo' and (nvagas - nvagaspreenc) > 0";
        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }
	
	public function PesquisarComVagas() {
        $query = "SELECT * FROM c2014_minicursos
						   WHERE (nvagas - nvagaspreenc) > 0";
        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }

    public function Pesquisar() {
        $query = "SELECT * FROM c2014_minicursos order by nminicurso";
        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }

    public function LiberarVagaMinicurso($id) {
        $query = "UPDATE c2014_minicursos SET nvagaspreenc = nvagaspreenc - 1 WHERE id = $id";
        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
    }

    public function PesquisarNaoCanceladas() {
        $query = "SELECT * FROM c2014_minicursos
						   WHERE cancelada = 'N' order by nminicurso";
        $resultado = mysql_query($query) or die("Erro: " . mysql_error());
        return $resultado;
    }

}

?>
