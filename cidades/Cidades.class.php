<?php
class Cidades{
	function __construct(){
	}	
    
	public function PesquisarPorId($id){
		$query = "SELECT * FROM c2013_cidades
						   WHERE id = '$id'";
		$resultado = mysql_query($query) or die("Erro: ".mysql_error());
		return $resultado;	
    }		
	public function PesquisarCidadesdoEstado($id){
		$query = "SELECT * FROM c2013_cidades
						   WHERE id_uf = '$id'";
		$resultado = mysql_query($query) or die("Erro: ".mysql_error());
		return $resultado;	
    }		
	
}
?>
