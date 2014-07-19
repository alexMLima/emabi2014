<? include 'seguranca.php'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

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
               
				<h1>Incluir nova notícia</h1>
				<p align="justify">
                	<form action="GerenciarNoticias.php?cod=1" name="noticias" method="post" enctype="multipart/form-data">
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
                                <td><input type="text" name="tbTitulo" value="<? if ($tbTitulo) { echo $tbTitulo; } ?>" style="width:350px" /></td>
                            </tr>
							<tr>
                            	<th>Notícia</th>
                                <td><textarea name="tbNoticia"><? if ($tbNoticia) { echo $tbNoticia; } ?></textarea></td>
                            </tr>
                            <tr>
                            	<th>Foto (Caso haja)</th>
                                <td><input type="file" name="tfImagem" size="40" /></td>
                            </tr>
                            
                            <tr>                            	
                                <td colspan="2" align="center">                                
                                <input type="submit" value="Cadastrar" /></td>
                            </tr>
                        </table>
                    </form>
                </p>
                <?				
				$oNoticias = new Noticias;
				$qry = $oNoticias->ConsultaTabela();
				$total = mysql_num_rows($qry);
				$i = 1;
				?>
      <a name="TemplateInfo"></a>	
				<h1>Editar/excluir notícias</h1>
				<p align="justify">
              	<? if ($total > 0) { ?>
                <table width="527" border="1" bordercolor="#CCCCCC">
                    <tr>
                      <th width="37">N.</th>
                      <th width="283">Título</th>                    
                      <th width="85">Editar</th>                        
                      <th width="94">Excluir</th>
                  </tr>
                    <? 
					$i = 1;
					while ($dados = mysql_fetch_array($qry)){ ?>
                    <tr>
                    	<td><? echo $i; $i++; ?></td>                        
                        <td><? echo $dados["titulo"]; ?></td>
                        
                        <td><a href="EditarNoticias.php?id=<? echo $dados["id"] ?>"><img src="images/editar.gif" width="14" height="14" /></a></td>
                        <td><a href="javascript: abrir('acoesNoticias.php?cod=3&id=<?echo $dados[0]?>')"><img src='images/excluir.gif' border='0' width="9" height="9"></a></td>
                    </tr>
                    <? } ?>                    
                </table>
                <? } else { ?>
                	<font color="#CC0000"><b>Nenhum registro encontrado.</b></font>
                <? } ?>
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
