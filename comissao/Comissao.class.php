<?
Class Comissao{
   private $id;
   private $nome;
   private $email;
   private $login;
   private $senha;
   private $permissao;
   private $avaliador;
   private $area1;
   private $area2;
   private $area3;



   function __construct($id,$nome,$email,$login,$senha,$permissao,$avaliador,$area1,$area2,$area3) {

      $this->id = $id;
      $this->nome = $nome;
      $this->email = $email;
      $this->login = $login;
      $this->senha = $senha;
      $this->permissao = $permissao;
      $this->avaliador = $avaliador;
      $this->area1 = $area1;
      $this->area2 = $area2;
      $this->area3 = $area3;
   }

   public function GetId(){
      return $this->id;
   }

   public function SetId($id){
      $this->id = $id;
   }

   public function GetNome(){
      return $this->nome;
   }

   public function SetNome($nome){
      $this->nome = $nome;
   }

   public function GetEmail(){
      return $this->email;
   }

   public function SetEmail($email){
      $this->email = $email;
   }

   public function GetLogin(){
      return $this->login;
   }

   public function SetLogin($login){
      $this->login = $login;
   }

   public function GetSenha(){
      return $this->senha;
   }

   public function SetSenha($senha){
      $this->senha = $senha;
   }

   public function GetPermissao(){
      return $this->permissao;
   }

   public function SetPermissao($permissao){
      $this->permissao = $permissao;
   }

   public function GetAvaliador(){
      return $this->avaliador;
   }

   public function SetAvaliador($avaliador){
      $this->avaliador = $avaliador;
   }

   public function GetArea1(){
      return $this->area1;
   }

   public function SetArea1($area1){
      $this->area1 = $area1;
   }

   public function GetArea2(){
      return $this->area2;
   }

   public function SetArea2($area2){
      $this->area2 = $area2;
   }

   public function GetArea3(){
      return $this->area3;
   }

   public function SetArea3($area3){
      $this->area3 = $area3;
   }

} 

?>