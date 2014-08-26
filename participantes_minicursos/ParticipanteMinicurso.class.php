<?
class ParticipanteMinicurso{
   private $id;
   private $idMinicurso;
   private $idParticipante;


   function __construct($idMinicurso,$idParticipante) {
      $this->idMinicurso = $idMinicurso;
      $this->idParticipante = $idParticipante;
   }

   public function GetId(){
      return $this->id;
   }

   public function SetId($id){
      $this->id = $id;
   }

   public function GetIdMinicurso(){
      return $this->idMinicurso;
   }

   public function SetIdMinicurso($idMinicurso){
      $this->idMinicurso = $idMinicurso;
   }

   public function GetIdParticipante(){
      return $this->idParticipante;
   }

   public function SetIdParticipante($idParticipante){
      $this->idParticipante = $idParticipante;
   }

} 

?>