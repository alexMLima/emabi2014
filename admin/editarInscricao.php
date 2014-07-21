<? include 'seguranca.php';

if (file_exists('scripts/init.php'))
{
	require_once 'scripts/init.php';
}
else
{
	exit('N�o foi poss�vel encontrar o arquivo de inicializa��o');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<meta name="Description" content="Information architecture, Web Design, Web Standards." />
<meta name="Keywords" content="Hotel Show 2009" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="Author" content="Erwin Aligam - ealigam@gmail.com" />
<meta name="Robots" content="index,follow" />
<script type="text/javascript" src="scripts/ajax.js"></script>
<script type="text/javascript" src="scripts/funcoes.js"></script>	
<script language="javascript1.2" src="../js/mascaraHellas.js"></script>
<link rel="stylesheet" href="images/PixelGreen.css" type="text/css" />
<title><? include "../titulo.php"; ?></title>
</head>

<body>
<!-- wrap starts here -->
<div id="wrap">
	<? include 'validar_inscricao.php'; ?>
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
                 <h1>Editar Inscri��o</h1>                
                               
				<p align="justify">
               	Os campos com <font color="#FF0000">*</font> s�o de preenchimento obrigat�rio.
                </p>
                <p>
                    <form action="editarInscricao.php?cod=1&idp=<? echo $idp ?>" method="post" name="inscricao" enctype="multipart/form-data">
                    	<table width="513" border="1" bordercolor="#CCCCCC">
           	  				<?						
								if ($mensagem != ""){ ?>
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
                            	<th><font color="#FF0000">*</font> Nome:</th>                               
                                <td><input type="text" name="tbNome" size="30" value="<? if ($tbNome) { echo $tbNome; }?>" /></td>
                            </tr>
                             <tr>
                            	<th><font color="#FF0000">*</font> Sexo</th>
                                <td>
                                <select name="slSexo">
                                	<option value="0" selected="selected">--Selecione uma op��o--</option>
                                    <option value="Masculino" <? if ($slSexo == "Masculino") { echo "selected='selected'"; } ?> >Masculino</option>
                                    <option value="Feminino" <? if ($slSexo == "Feminino") { echo "selected='selected'"; } ?> >Feminino</option>
                                </select>
                                </td>
                            </tr> 
                            <tr>
                                                <th><font color="#FF0000">*</font> Categoria:</th>
                                                <td>
                                                 <select name="slCategoria">
                                                        <option value="0" selected="selected">--Selecione uma op��o--</option>
                                                    <?
                                                                                        $qryCat = mysql_query("SELECT * FROM c2014_categorias order by codigo");
                                                                                        while ($categorias = mysql_fetch_array($qryCat)){
                                                                                        ?>
                                                        <option value="<? echo $categorias["id"]; ?>" <? if ($categorias["id"] == $slCategoria) { echo "selected='selected'"; } ?> ><? echo $categorias["descricao"]; ?></option>
                                                    <? } ?>
                                                </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th><font color="#FF0000">*</font> Comprovante:</th>
                                                <td>
                                                    Caso n�o queira alterar o comprovante, deixe este campo em branco <br/>
                                                    <input type="file" name="tbComprovante" id="tbComprovante" size="40" />
                                                </td>
                                            </tr>
                            
                            <tr>
                            	<th><font color="#FF0000" style="font-size:11px">*</font><span style="font-size:11px">Empresa/Institui��o:</span></th>
                                <td><input type="text" name="tbEmpInst" size="30"  value="<? if ($tbEmpInst) { echo $tbEmpInst; }?>"  /></td>
                            </tr>
                            <tr>
                            	<th>Cargo/Curso:</th>
                                <td><input type="text" name="tbCargoCurso" size="30"  value="<? if ($tbCargoCurso) { echo $tbCargoCurso; }?>"  />
                                </td>
                            </tr>
                            <tr>
                            	<th><font color="#FF0000">*</font> CPF:</th>
                                <td><input type="text" name="tbCpf" id="cpf" size="30" onKeyUp="mascaraHellas(this.value, this.id, '###.###.###-##', event)" value="<? if ($tbCpf) { echo $tbCpf; }?>" /><br />
                                Digite apenas os n�meros</td>
                            </tr>
                            
                            <tr>
                            	<th>RG:</th>
                                <td><input type="text" name="tbRg" size="30"  value="<? if ($tbRg) { echo $tbRg; }?>"  /></td>
                            </tr>                              
                             <tr>
                            	<th><font color="#FF0000">*</font> Endere�o Completo:</th>
                                <td><input type="text" name="tbEndereco" size="30" value="<? if ($tbEndereco) { echo $tbEndereco; }?>" /></td>
                            </tr>
                            <tr>
                            	<th>Cidade/Estado</th>
                                <td>
                                    <b>
									<?
                                	$municipio = mysql_fetch_array(mysql_query("SELECT nome, id_uf from c2014_cidades where id = '$slCidade'"));
									$estado = mysql_fetch_array(mysql_query("SELECT nome from c2014_estados where id = ".$municipio["id_uf"]));
									echo $municipio['nome']." - ".$estado['nome'];								
									?>
                                    </b>
                                    <br />
                                    Para alterar a cidade/estado, selecione abaixo:
                                </td>
                            </tr> 
                             <tr>
                            	<th><font color="#FF0000">*</font> Estado:</th>
                                <td><select name="uf" id="uf" onchange="buscaCidades(this.value)"></select></td>
                            </tr> 
                            <tr>
                            	<th><font color="#FF0000">*</font> Cidade:</th>
                                <td><select name="cidade" id="cidade">
								      <option value="">Primeiramente, selecione o estado</option>
                                    </select>
                                 </td>
                            </tr> 
                             <tr>
                            	<th><font color="#FF0000">*</font> CEP:</th>
                                <td><input type="text" name="tbCep" size="30" id="cep" onKeyUp="mascaraHellas(this.value, this.id, '#####-###', event)" value="<? if ($tbCep) { echo $tbCep; }?>" /><br />
                                Digite apenas os n�meros</td>
                            </tr> 
                             <tr>
                            	<th><font color="#FF0000">*</font> Telefone:</th>
                                <td><input type="text" name="tbTelefone" size="30" value="<? if ($tbTelefone) { echo $tbTelefone; }?>" id="telefone" onKeyUp="mascaraHellas(this.value, this.id, '(##)####-####', event)" /><br />
                                DDD + N�mero - Digite apenas os n�meros</td>
                            </tr>
                           
                             <tr>
                            	<th>Celular:</th>
                                <td><input type="text" name="tbCelular" size="30" value="<? if ($tbCelular) { echo $tbCelular; }?>" id="telefone2" onKeyUp="mascaraHellas(this.value, this.id, '(##)####-####', event)" /><br />
                                DDD + N�mero - Digite apenas os n�meros</td>
                            </tr> 
                             <tr>
                            	<th><font color="#FF0000">*</font> E-mail:</th>
                                <td><input type="text" name="tbEmail" size="30" value="<? if ($tbEmail) { echo $tbEmail; }?>" /></td>
                            </tr>
                            
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="submit" value="Submeter" style="padding:5px 5px 5px 5px" />
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
