<?

//RECEBE PARÂMETRO  
$id = $_GET["id"];

//CONECTA AO MYSQL                                               
include "../banco.php"; 
include_once '../trabalhos/Trabalhos.class.php';

$objTrabalhos = new Trabalhos;
$qry  = $objTrabalhos->pesquisar($id);

$row = mysql_fetch_array($qry);    
   $artigo  = $row["caminho_trabalho"];
   $tipo = $row["tipomime_trabalho"];
   $ext = $row["extensao_trabalho"];
    
   if ($row["categoria_trabalho"] == "A"){
   		$nomeArquivo = "Artigo_".$id.$ext;
   }
   else{
   	    $nomeArquivo = "Resumo_".$id.$ext;
   }                        
   //EXIBE ARQUIVO                                   
   //header("Content-Disposition: attachment; filename=".$nomeArquivo);   
   //header("Content-type: $tipo");
   print $artigo;
                                     
?>