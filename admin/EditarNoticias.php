<? include 'seguranca.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<meta name="Description" content="Information architecture, Web Design, Web Standards." />
<meta name="Keywords" content="your, keywords" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="Author" content="Erwin Aligam - ealigam@gmail.com" />
<meta name="Robots" content="index,follow" />

<link rel="stylesheet" href="images/PixelGreen.css" type="text/css" />
<script type="text/javascript" src="js/confirmaExclusao.js"></script>
<title><? include "../titulo.php"; ?></title>
	
</head>

<body>
<? include 'acoesNoticias.php' ?>
<!-- wrap starts here -->
<div id="wrap">

	<? include 'topo.php'; ?>

</div>
	
	<!-- <div class="headerphoto"></div> -->
				
	<!-- content-wrap starts here -->
	<div id="content-wrap"><div id="content">		
		
		<div id="sidebar" >
		
			<?  include 'loginMenu.php'; ?>
					
		</div>	
	 
       
		<div id="main">		
		
			<div class="post">
			
				<a name="TemplateInfo"></a>
                <?
								
				$id = $_GET["id"];
				$oNoticias = new Noticias;
				$qry = $oNoticias->pesquisar($id);
				$dados = mysql_fetch_array($qry);
				?>	
				<h1>Editar notícias</h1>
				<p align="justify">
                	<form action="EditarNoticias.php?cod=2&id=<? echo $id?>" name="editais" method="post" enctype="multipart/form-data">
                    	<table width="510" border="1" bordercolor="#CCCCCC">
           	  				<? if ($mensagem!= "" && $mensagem!= "OK"){ ?>
                            <tr>
                                <td colspan="2" align="center">
                                ALERTAS
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <font color="#CC0000"><? echo $mensagem; ?></font>
                                <br />
                                </td>
                            </tr>
                            <? } ?>
							<tr>
                            	<th>Título</th>
                                <td><input type="text" name="tbTitulo" value="<? echo $dados["titulo"]; ?>" style="width:350px" /></td>
                            </tr>
							<tr>
                            	<th>Notícia</th>
                                <td><textarea name="tbNoticia"><? echo $dados["noticia"]; ?></textarea></td>
                            </tr>
                            <tr>
                            	<th>Foto (Caso haja)</th>
                                <td><input type="file" name="tfImagem" size="40" /><br />
                                Caso não queira substituir a foto, deixe o campo em branco.</td>
                            </tr>
                            
                            <tr>                            	
                                <td colspan="2" align="center">                                
                                <input type="submit" value="Cadastrar" /></td>
                            </tr>
                        </table>
                    </form>
                </p>
                
			  <br /><Br />
			</div>					
		</div>					
		
	<!-- content-wrap ends here -->		
	</div></div>
	
<!-- wrap ends here -->
</div>
<? include 'rodape.php'; ?>
</body>
</html>
