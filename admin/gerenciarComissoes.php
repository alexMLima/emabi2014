<? include 'seguranca.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<link rel="stylesheet" href="images/PixelGreen.css" type="text/css" />
<script type="text/javascript" src="js/confirmaExclusao.js"></script>
<title><? include "../titulo.php"; ?></title>
	
</head>

<body>

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
                <h1>Comissão/Avaliadores</h1>
				<? 
				  include_once '../banco.php';
				  include_once '../comissao/Comissoes.class.php';
				
				  $oComissoes = new Comissoes;
				  $query = $oComissoes->ConsultaTabela();
				  $total = mysql_num_rows($query);
				  $i = 1;
				?>           
                
                <p>
                <img src="images/icn_add.gif" />  <a href="incluirComissao.php">Incluir novo registro</a>
                </p>
				<p align="justify">               
                
					<? if ($total > 0) { ?>
              <table width="525" border="1" bordercolor="#CCCCCC">
      <tr>
                            <th>Nº</th>
                            <th>Nome</th>                            
                            <th>E-mail</th>                         
                            <th>Av.?</th>                         
                            <th>Editar</th>
                            <th>Excluir</th>
                          </tr>
                        <? while ($dados = mysql_fetch_array($query)){ ?>
                          <tr>
                            <td><? echo $i; $i++; ?></td>                            
                            <td><? echo $dados["nome"]; ?></td>
                            <td><? echo $dados["email"]; ?></td>

                            <td>
							<? 
							if ($dados["avaliador"] == "S")
							  echo "SIM";
							else
							  echo "NÃO";   
							?>
                            </td>
                            <td width="59" align="center"><a href="editarComissao.php?idc=<? echo $dados["id"] ?>"><img src="images/editar.gif" width="14" height="14" /></a></td>
                            <td width="65" align="center"><a href="javascript: abrir('acoesComissao.php?cod=3&idc=<?echo $dados[0]?>')"><img src='images/excluir.gif' border='0' width="9" height="9"></a></td>
                </tr>
                         <? } ?>
                        </table>
                        <? } else { ?>
                        <font color="#CC0000"><b>Nenhum registro encontrado.</b></font>
                    <? } ?>
                                            
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
