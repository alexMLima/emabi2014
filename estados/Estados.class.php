<?php
class Estados{
	function __construct(){
	}	
    
	public function PesquisarPorId($id){
		$query = "SELECT * FROM c2013_estados
						   WHERE id = '$id'";
		$resultado = mysql_query($query) or die("Erro: ".mysql_error());
		return $resultado;	
    }		
	
}
?>
