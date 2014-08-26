<?php
class Comissoes{
   public $id;
   public $nome;
   public $email;
   public $login;
   public $senha;
   public $permissao;
   public $avaliador;
   public $area1;
   public $area2;
   public $area3;


   function __construct(){  }


   public function incluir($Comissao){
      $retorno = $this->validar($Comissao,'S');
      if ($retorno == 'OK'){        
         $this->nome = $Comissao->GetNome();
         $this->email = $Comissao->GetEmail();
         $this->login = $Comissao->GetLogin();
         $this->senha = $Comissao->GetSenha();
         $this->permissao = $Comissao->GetPermissao();
         $this->avaliador = $Comissao->GetAvaliador();
         $this->area1 = $Comissao->GetArea1();
         $this->area2 = $Comissao->GetArea2();
         $this->area3 = $Comissao->GetArea3();
       

      $query = "INSERT INTO c2014_comissao (NOME,EMAIL,LOGIN,SENHA,PERMISSAO,AVALIADOR,AREA1, AREA2, AREA3) VALUES ('$this->nome','$this->email','$this->login','$this->senha','$this->permissao','$this->avaliador','$this->area1','$this->area2','$this->area3')";

      mysql_query($query) or die("Erro: ".mysql_error());

      return 'OK';
      }
      else{
         return $retorno; 

      }
   }
   
   
   public function atualizar($Comissao, $updArea){
      $retorno = $this->validar($Comissao, $updArea);
      if ($retorno == 'OK'){
         $this->id = $Comissao->GetId();
         $this->nome = $Comissao->GetNome();
         $this->email = $Comissao->GetEmail();
         $this->login = $Comissao->GetLogin();
         $this->senha = $Comissao->GetSenha(); 
	 $this->permissao = $Comissao->GetPermissao();
         $this->avaliador = $Comissao->GetAvaliador();
         $this->area1 = $Comissao->GetArea1();
         $this->area2 = $Comissao->GetArea2();
         $this->area3 = $Comissao->GetArea3();

      $query =  "UPDATE c2014_comissao ";
	  $query .= "   SET NOME = '$this->nome',";
	  $query .= "   EMAIL = '$this->email',";
	  $query .= "   LOGIN = '$this->login',";
	  $query .= "   SENHA = '$this->senha',";
	  $query .= "   PERMISSAO = '$this->permissao'";

          if ($updArea == 'S'){
          
              $query .= "   ,AREA1 = '$this->area1',";
              $query .= "   AREA2 = '$this->area2',";
              $query .= "   AREA3 = '$this->area3'";

          }

	  $query .= "   ,AVALIADOR = '$this->avaliador' WHERE id = '$this->id'";

      mysql_query($query) or die("Erro: ".mysql_error());

      return 'OK';
      }
      else{
         return $retorno; 

      }
   }
   
    
   public function excluir($id){
      $query = "DELETE FROM c2014_comissao WHERE id = '$id'";
      mysql_query($query) or die("Erro: ".mysql_error());
      return 'Exclus�o efetuada com sucesso.';
   }

   public function pesquisar($id){
      $query = "SELECT * FROM c2014_comissao WHERE id = '$id'";
      $resultado = mysql_query($query) or die("Erro: ".mysql_error());
      return $resultado;
   }

   public function validar($Comissao,$updArea){
      $erro = 0;
      $msg = "";

      if($Comissao->GetNome() == ""){
         $msg.="O campo NOME deve ser preenchido!<br>";
         $erro = 1;
      }

      if($Comissao->GetEmail() == ""){
         $msg.="O campo EMAIL deve ser preenchido!<br>";
         $erro = 1;
      }

      if($Comissao->GetLogin() == ""){
         $msg.="O campo LOGIN deve ser preenchido!<br>";
         $erro = 1;
      }

      if($Comissao->GetSenha() == ""){
         $msg.="O campo SENHA deve ser preenchido!<br>";
         $erro = 1;
      }
	  
	  if($Comissao->GetPermissao() == ""){
         $msg.="O campo PERMISSAO deve ser preenchido!<br>";
         $erro = 1;
      }
	  
      if($Comissao->GetAvaliador() == ""){
         $msg.="O campo AVALIADOR deve ser preenchido!<br>";
         $erro = 1;
      }
      if ($updArea == 'S'){
          if($Comissao->GetArea1() == ""){
             $msg.="O campo AREA 01 deve ser preenchido!<br>";
             $erro = 1;
          }

          if($Comissao->GetArea2() == ""){
             $msg.="O campo AREA 02 deve ser preenchido!<br>";
             $erro = 1;
          }

          if($Comissao->GetArea3() == ""){
             $msg.="O campo AREA 03 deve ser preenchido!<br>";
             $erro = 1;
          }
      }
      if ($erro == 1){
         return $msg;
      }
      else{
         return 'OK';
      }
   }   
		
    
	public function PesquisarLogineSenha($login, $senha){
		$query = "SELECT * FROM c2014_comissao
						   WHERE login = '$login' and senha = '$senha'";
		$resultado = mysql_query($query) or die("Erro: ".mysql_error());
		return $resultado;	
    }
	public function PesquisarLogin($login){
		$query = "SELECT * FROM c2014_comissao
						   WHERE login = '$login'";
		$resultado = mysql_query($query) or die("Erro: ".mysql_error());
		return $resultado;	
    }		
	public function PesquisarAvaliadores(){
		$query = "SELECT * FROM c2014_comissao
						   WHERE avaliador = 'S'";
		$resultado = mysql_query($query) or die("Erro: ".mysql_error());
		return $resultado;	
    }

    public function PesquisarAvaliadoresDaArea($area){
		$query = "SELECT * FROM c2014_comissao WHERE avaliador = 'S' AND (AREA1 = $area OR AREA2 = $area OR AREA3 = $area)";
		$resultado = mysql_query($query) or die("Erro: ".mysql_error());
		return $resultado;
    }
	public function ListarTodos(){
		$query = "SELECT * FROM c2014_comissao WHERE avaliador = 'S' AND id <> '999' ORDER BY nome";
		$resultado = mysql_query($query) or die("Erro: ".mysql_error());
		return $resultado;	
    }
	
	public function ConsultaTabela(){
		$query = "SELECT * FROM c2014_comissao WHERE id <> '999' ORDER BY nome";
		$resultado = mysql_query($query) or die("Erro: ".mysql_error());
		return $resultado;	
    }
}
?>
