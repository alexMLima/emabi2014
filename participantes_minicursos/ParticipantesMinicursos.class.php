<?
Class ParticipantesMinicursos{
   public $id;
   public $idMinicurso;
   public $idParticipante;


   function __construct(){  }


   public function incluir($ParticipantesMinicursos){
      $retorno = $this->validar($ParticipantesMinicursos);
      if ($retorno == 'OK'){
         $this->idMinicurso = $ParticipantesMinicursos->GetIdMinicurso();
         $this->idParticipante = $ParticipantesMinicursos->GetIdParticipante();
         $data_entrada = date( 'Y-m-d H:s:i' );

      $query = "INSERT INTO c2014_participantes_minicursos (ID_MINICURSO,ID_PARTICIPANTE,DATA_ENTRADA) VALUES ('$this->idMinicurso','$this->idParticipante', '$data_entrada')";
      mysql_query($query) or die("Erro: ".mysql_error());
		
      return 'OK';
      }
      else{
         return $retorno;
      }
   }

   public function excluir($id){
      $query = "DELETE FROM c2014_participantes_minicursos WHERE id = '$id'";
      mysql_query($query) or die("Erro: ".mysql_error()); 
      return 'Exclus�o efetuada com sucesso.';
   }
   
   public function excluirMinicursodoParticipante($idp, $idm){
      $query = "DELETE FROM c2014_participantes_minicursos WHERE id_participante = '$idp' AND id_minicurso = '$idm'";
      mysql_query($query) or die("Erro: ".mysql_error());
      return 'Exclus�o efetuada com sucesso.';
   }

   public function pesquisar($id){
      $query = "SELECT * FROM c2014_participantes_minicursos WHERE id = '$id'";
      $resultado = mysql_query($query) or die("Erro: ".mysql_error());
      return $resultado;
   }

   public function validar($ParticipantesMinicursos){
      $erro = 0;
      $msg = "";

      if($ParticipantesMinicursos->GetIdMinicurso() == ""){
         $msg.="O campo IDMINICURSO deve ser preenchido!<br>";
         $erro = 1;
      }

      if($ParticipantesMinicursos->GetIdParticipante() == ""){
         $msg.="O campo IDPARTICIPANTE deve ser preenchido!<br>";
         $erro = 1;
      }

      if ($erro == 1){
         return $msg;
      }
      else{
         return 'OK';
      }
   }

}

?>