<?php
  @session_start();
  @session_register("nome");
  @session_register("yes");
  @session_register("id");
  $_SESSION['yes'] = "-";
  if ($_GET['verificar'] == '1'){
  	include_once ("../banco.php");
	include_once '../comissao/Comissoes.class.php';	
    $login  = mysql_real_escape_string($_POST['tbLogin']);
	$senha = mysql_real_escape_string($_POST['tbSenha']);				
	if($senha != ""){
		$objComissoes = new Comissoes;
		$resultado = $objComissoes->PesquisarLogin($login);
		$linha = mysql_fetch_array($resultado);
		$nome = strtok($linha["nome"], ' '); 						
		$_SESSION['nome'] = $nome;
		$_SESSION['id'] = $linha['id'];	
		$_SESSION['permissao'] = $linha['permissao'];						
		if (mysql_num_rows($resultado) > 0){
			if($senha == $linha["senha"]){
			    $_SESSION['yes'] = 1;			
			}else{
				$_SESSION['yes'] = 0;
			}
		}
	}
    if ($linha['permissao'] > 10)
		echo "<META HTTP-EQUIV='REFRESH'CONTENT=\"0; URL=participantes.php\">";
	else
		echo "<META HTTP-EQUIV='REFRESH'CONTENT=\"0; URL=trabalhos.php\">";	
  }
  else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<link rel="stylesheet" href="images/PixelGreen.css" type="text/css" />

<title>Administradores</title>
	
</head>

<body>

<div align="center" style="padding-top:40px">

<p align="center">
<form action="index.php?verificar=1" method="post" name="admin" style="background-color:transparent; border:0">
	<table>		       
        <tr>
        	<td height="50" colspan="2" align="center">              
            	<b>ÁREA DE ADMINISTRADORES</b>           </td>
      </tr>
        
    	<tr>
        	<td>Login:</td>
            <td><input type="text" name="tbLogin" size="30" /></td>
        </tr>
        
        <tr>
        	<td height="32">Senha:</td>
          <td><input type="password" name="tbSenha" size="30" /></td>           
        </tr>
        <tr>
        	<td colspan="2" align="center">
            	<input type="submit" value="Enviar" />
            </td>
        </tr>
    </table>
</form>

</p>

</div>	


</body>
</html>
<? } ?>