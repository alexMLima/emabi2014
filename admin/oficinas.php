<? include 'seguranca.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<link rel="stylesheet" href="images/PixelGreen.css" type="text/css" />

<title><? include "../titulo.php"; ?></title>
	
</head>
<script type="text/javascript" src="scripts/ajax.js"></script>
<script type="text/javascript" src="scripts/funcoes.js"></script>

<body>

<?
$idoficina = $_GET["of"];
if ($idoficina == ""){
	$idoficina = 0;
}
?>

<div id="wrap">

	<? include 'topo.php'; ?>

</div>
	
	<!-- <div class="headerphoto"></div> -->
				
	<!-- content-wrap starts here -->
	<div id="content-wrap"><div id="content">		
		
		<div id="sidebar" >
		
			<? include 'loginMenu.php'; ?>
					
		</div>	
	
		<div id="main">		
		
			<div class="post">
			
				<a name="TemplateInfo"></a>	
				
                <h1>Minicursos</h1>                
                                <p align="justify">
                                    <img src="images/pdf2.gif" /><a href="certificados/certificadoMinistrantesPalestra.php" target="_blank">Emitir Certificados para Todos os Palestrantes</a>
                                </p>
				<p align="justify">
                <span style="font-size:14px">Selecione abaixo o minicurso:</span><br /><br />
                <select name="oficinas" id="oficinas" onChange="carregaInfo(this[this.selectedIndex].value)" style="width:300px">
				<option value="0" selected>--Selecione um minicurso--</option>
                                <?
				include_once '../banco.php';
				include_once '../minicursos/Minicursos.class.php';
				$objMinicursos = new Minicursos;
        	    $qryMinicursos = $objMinicursos->PesquisarNaoCanceladas();
				while ($dados = mysql_fetch_array($qryMinicursos)){ ?>
					<option value="<? echo $dados['id']; ?>" <? if ($dados['id'] == $idoficina) echo " selected";?> ><? echo  $dados['nminicurso']." - ".substr($dados['titulo'], 0, 75); ?></option>	
				<? }?>
				</select>
				<br><br>
				<div id="info" style=" padding-left:10px; padding-right:10px">&nbsp;</div>	               
                </p>
		  </div>					
		</div>					
		
	<!-- content-wrap ends here -->		
	</div></div>
	
<!-- wrap ends here -->
</div>
<? include 'rodape.php'; ?>
</body>
</html>
