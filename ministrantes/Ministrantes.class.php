<?php
class Ministrantes{
	function __construct(){
	}	
	
    public function PesquisarMinistrantesdoMinicurso($minicurso){
		$query = "SELECT titulacao,".
		         "       nome,".
				 "		 complemento".
				 "  FROM c2014_ministrantes as m,".
				 "	     c2014_minicursos_ministrantes as mm,".
				 "		 c2014_minicursos as mi".
				 "  WHERE mi.id = '$minicurso'".
				 "    AND m.id = mm.id_ministrante".
				 "    AND mi.id = mm.id_minicurso";				 
		$resultado = mysql_query($query) or die("Erro: ".mysql_error());
		return $resultado;	
    }	
	
	public function PesquisarPorId($id){
		$query = "SELECT * from c2014_ministrantes where id = '$id'";
		$resultado = mysql_query($query) or die("Erro: ".mysql_error());
		return $resultado;	
    }	
	
}
?>
