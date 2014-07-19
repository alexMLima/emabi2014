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

<title><? include "../titulo.php"; ?></title>
	
</head>

<body>
<? include 'atualizar_comissao.php' ?>
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
				<h1>Meus dados</h1>                
				<p align="justify">               
                	<?
					$objComissoes = new Comissoes();
					$qry = $objComissoes->pesquisar($_SESSION["id"]);
					$dados = mysql_fetch_array($qry);
					?>                
                    <form action="dados_comissao.php?ida=<? echo $_SESSION["id"] ?>&cod=1" method="post" name="avaliadores">
                	<table border="1" bordercolor="#CCCCCC">
                      <? if ($msg != 'OK'){ ?>
                      <tr>
                        	<td colspan="2" align="center">
                            	Alertas:
                            </td>
                        </tr>
                        <tr>
                        	<td colspan="2" align="center">
                            	<? echo $msg; ?>
                            </td>
                        </tr>
                      <? } ?>
                      <tr>
                            <th width="152">Nome</th>
                            <td width="316"><input type="text" name="tbNome" size="50" value="<? echo $dados["nome"];?>" /></td>
                      </tr>
                      <tr>
                            <th width="152">E-mail</th>
                            <td width="316"><input type="text" name="tbEmail" size="50" value="<? echo $dados["email"];?>"/></td>
                      </tr>
                      <tr>
                            <th width="152">Login</th>
                            <td width="316"><input type="text" name="tbLogin" size="50" value="<? echo $dados["login"];?>"/></td>
                      </tr>
                      <tr>
                            <th width="152">Senha</th>
                            <td width="316"><input type="password" name="tbSenha" size="50" value="<? echo $dados["senha"];?>"/>
                            <input type="hidden" name="permissao" value="<? echo $dados["permissao"];?>"  />
                            <input type="hidden" name="avaliador" value="<? echo $dados["avaliador"];?>"  />
                            </td>
                      </tr>  
                      
                        <tr>
                        	<td colspan="2" align="center">
                            	<input type="submit" value="Atualizar" />
                            </td>
                        </tr>
                    </table>
                	</form>                                           
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
