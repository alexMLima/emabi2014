<? include 'seguranca.php' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<link rel="stylesheet" href="images/PixelGreen.css" type="text/css" />
<title><? include "../titulo.php"; ?></title>
</head>

<body>
<!-- wrap starts here -->
<div id="wrap">
    <? include "acoesComissao.php" ?>
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
				<?
				  $idc = $_GET["idc"];
				  $oComissoes = new Comissoes;
				  $query = $oComissoes->pesquisar($idc);
				  $dados = mysql_fetch_array($query);
				?>
                <a name="TemplateInfo"></a>					
                 <h1>Editar Comissão</h1>                
                               
				<p align="justify">
               	Os campos com <font color="#FF0000">*</font> são de preenchimento obrigatório.
                </p>
                <p>
                	<form action="editarComissao.php?cod=2&idc=<? echo $idc ?>" name="Comissoes" method="post">
                        <table class="tabelaSemBorda">
                          <? if ($mensagem!= "" && $mensagem!= "OK"){ ?>
                          <tr>
                            <td colspan="2" align="center">ALERTAS</td>
                          </tr>
                          <tr>
                            <td colspan="2" align="left"><font color="#CC0000"><? echo $mensagem; ?></font><br /></td>
                          </tr>
                          <? } ?>
                           <tr>
                            <th> * Nome</th>
                            <td>
                              <input type="text" name="nome" size="50" value="<? echo $dados["nome"]; ?>" />
                            </td>
                          </tr>
                          <tr>
                            <th> * E-mail</th>
                            <td>
                              <input type="text" name="email" size="50" value="<? echo $dados["email"]; ?>" />
                            </td>
                          </tr>
                          
                          <tr>
                            <th> * Login</th>
                            <td>
                              <input type="text" name="login" size="50" value="<? echo $dados["login"]; ?>" />
                            </td>
                          </tr>
                          <tr>
                            <th> * Senha</th>
                            <td>
                              <input type="password" name="senha" size="50" value="<? echo $dados["senha"]; ?>" />
                            </td>
                          </tr>
                         
                          <tr>
                            <th> * Permissão</th>
                            <td>
                              <input type="text" name="permissao" size="10" value="<? echo $dados["permissao"]; ?>" />
                              &nbsp;10 para avaliadores, 100 para administradores
                            </td>
                          </tr>
                          <tr>
                            <th> * Avaliador?</th>
                            <td>
                              <input type="checkbox" value="S" name="avaliador"  <? if ($dados["avaliador"] == "S") { echo 'checked="checked"'; } ?> />
                            </td>
                          </tr>
                            <tr>
                            <th> * Área 01:</th>
                            <td>
                              <select name="slArea01">
                               <option value="" >--Selecione uma área--</option>
                               <?
                              $objArea = new AreasConhecimento;
                              $qryArea = $objArea->Pesquisar();
                              while($areas = mysql_fetch_array($qryArea)){ ?>
                               <option value="<? echo $areas['id']; ?>" <? if ($dados["area1"] == $areas['id']) { echo ' selected'; } ?> ><? if (strlen($areas['descricao']) > 35) echo substr($areas['descricao'], 0, 35)."..."; else echo $areas['descricao']; ?></option>
                              <? } ?>
                             </select>
                            </td>
                          </tr>
                            <tr>
                            <th> * Área 02:</th>
                            <td>
                              <select name="slArea02">
                               <option value="" >--Selecione uma área--</option>
                               <?
                              $objArea = new AreasConhecimento;
                              $qryArea = $objArea->Pesquisar();
                              while($areas = mysql_fetch_array($qryArea)){ ?>
                               <option value="<? echo $areas['id']; ?>" <? if ($dados["area2"] == $areas['id']) { echo ' selected'; } ?> ><? if (strlen($areas['descricao']) > 35) echo substr($areas['descricao'], 0, 35)."..."; else echo $areas['descricao']; ?></option>
                              <? } ?>
                             </select>
                            </td>
                          </tr>
                            <tr>
                            <th> * Área 03:</th>
                            <td>
                              <select name="slArea03">
                               <option value="" >--Selecione uma área--</option>
                               <?
                              $objArea = new AreasConhecimento;
                              $qryArea = $objArea->Pesquisar();
                              while($areas = mysql_fetch_array($qryArea)){ ?>
                               <option value="<? echo $areas['id']; ?>" <? if ($dados["area3"] == $areas['id']) { echo ' selected'; } ?> ><? if (strlen($areas['descricao']) > 35) echo substr($areas['descricao'], 0, 35)."..."; else echo $areas['descricao']; ?></option>
                              <? } ?>
                             </select>
                            </td>
                          </tr>
                          <tr>
                            <td colspan="2" align="center"><input type="submit" value="Atualizar" /></td>
                          </tr>
                          <tr>
                            <td colspan="2" align="center"><a href="gerenciarComissoes.php"><< Voltar para a listagem</a></td>
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
