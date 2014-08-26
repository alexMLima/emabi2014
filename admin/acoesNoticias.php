<?
$cod = $_GET["cod"];

include_once '../banco.php';
include_once '../noticias/Noticia.class.php';
include_once '../noticias/Noticias.class.php';

if ($cod == 1){	//Inclusão		
	
	$tbTitulo = $_POST["tbTitulo"];	
	$tbNoticia = $_POST["tbNoticia"];
	$tfImagem = $_FILES["tfImagem"];
		
	$tipomime = $tfImagem["type"];
	$extensao = strrchr($tfImagem["name"],".");		 
	$pont = fopen($tfImagem["tmp_name"], "r");   
	$dadosArquivo = addslashes(fread($pont, 5242880)); 
	
	$objNoticia = new Noticia(0,$tbTitulo,$tbNoticia,$_SESSION["id"],date("Y-m-d H:i:s"),$dadosArquivo,$tipomime,$extensao);
		
	$objNoticias = new Noticias;
	
	$mensagem = $objNoticias->incluir($objNoticia);
	
	if ($mensagem == "OK"){			
		echo "<meta http-equiv=\"REFRESH\" content=\"0; url=GerenciarNoticias.php\">";
	}	
}

if ($cod == 2){	//Alteração		
	
	$tbTitulo = $_POST["tbTitulo"];	
	$tbNoticia = $_POST["tbNoticia"];
	$tfImagem = $_FILES["tfImagem"];
		
	$tipomime = $tfImagem["type"];
	$extensao = strrchr($tfImagem["name"],".");		 
	$pont = fopen($tfImagem["tmp_name"], "r");   
	$dadosArquivo = addslashes(fread($pont, 5242880)); 
	
	$objNoticia = new Noticia($_GET["id"],$tbTitulo,$tbNoticia,$_SESSION["id"],date("Y-m-d H:i:s"),$dadosArquivo,$tipomime,$extensao);
		
	$objNoticias = new Noticias;
	
	$mensagem = $objNoticias->atualizar($objNoticia);
	
	if ($mensagem == "OK"){			
		echo "<meta http-equiv=\"REFRESH\" content=\"0; url=GerenciarNoticias.php\">";
	}	
}

if ($cod == 3) { //Exclusão
	$id = $_GET["id"];
		
	$objNoticias = new Noticias;
	
	$objNoticias->excluir($id);	
		
	echo "<meta http-equiv=\"REFRESH\" content=\"0; url=GerenciarNoticias.php\">";
}
?>