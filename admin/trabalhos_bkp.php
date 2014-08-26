<? include 'seguranca.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<link rel="stylesheet" href="images/PixelGreen.css" type="text/css" />
<script type="text/javascript" src="js/confirmaExclusao.js"></script>
<title><? include "../titulo.php"; ?></title>
	
</head>

<body>
<? include 'atualizar_trabalho.php' ?>
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
                <?
                $titulo = "Trabalhos Completos (Artigos)";
				$cat = "A";				
				?>
				<h1><? echo $titulo; ?></h1>
                
                <?				
				include_once '../inscricao/Inscricoes.class.php';				
				include_once '../coautores_trabalho/CoautoresTrabalhos.class.php';				
				include_once '../comissao/Comissoes.class.php';		
				include_once '../situacao/Situacoes.class.php';								
				
				$objTrabalhos = new Trabalhos;
				
				if ($_SESSION["permissao"] > 10){ 
					$qryTrabalhos = $objTrabalhos->PesquisarTrabalhodaCategoria($cat);					
				}
				else{
					$qryTrabalhos = $objTrabalhos->PesquisarTrabalhodaCategoriaeAvaliador($cat,$_SESSION["id"]);
				}
				
				$objCoautoresTrabalho = new CoautoresTrabalhos;
				$objParticipantes = new Inscricoes;
				
				
				$objComissoes = new Comissoes;
				$objSituacoes = new Situacoes;
								
				?>               
                
                
				<p align="justify">               
                
                <?
                $numTrabalhos = mysql_num_rows($qryTrabalhos);
				if ($numTrabalhos > 0){
                ?>
                
                
                </p>
                <p align="justify">
                
                
                <? 
				while($dadosTrabalho = mysql_fetch_array($qryTrabalhos)){ ?>
                	
                    <?
					$qryPart = $objParticipantes->pesquisarParticipantedoTrabalho($dadosTrabalho["id"]);					
					$dadosPart = mysql_fetch_array($qryPart);
					
					$qryCoautores = $objCoautoresTrabalho->pesquisarCoautoresdoTrabalho($dadosTrabalho["id"]);
					
					$nomeCoautores = "";
					while($dadosCoaut = mysql_fetch_array($qryCoautores)){
						$nomeCoautores = $nomeCoautores.$dadosCoaut["nome"].", "; 
					}
					
					$nomeCoautores = substr($nomeCoautores,0,strlen($nomeCoautores)-2);
					
					?>
                    <form action="trabalhos.php?idt=<? echo $dadosTrabalho["id"] ?>&cod=1&ct=<? echo $cat ?>&av1=<? echo $dadosTrabalho["avaliador"] ?>&av2=<? echo $dadosTrabalho["avaliador02"] ?>" method="post" name="resumos">
                	<table border="1" bordercolor="#CCCCCC">
                    	<tr>
                            <th width="152">Título</th>
                            <td width="316"><a href="../geraTrabalho.php?idt=<? echo $dadosTrabalho["id"] ?>" ><? echo $dadosTrabalho["titulo"]; ?></a></td>
                      </tr>                        
                        
                        <tr>
                            <th width="152">Data Envio</th>
                            <td width="316"><? echo date('d/m/Y H:i:s', strtotime($dadosTrabalho["data_envio"])); ?></td>
                      </tr> 
                      
                        <tr>
                            <th>Autor</th>
                            <td><a href="detalhes_participante.php?idp=<? echo $dadosPart["id"] ?>" ><? echo $dadosPart["nome"]; ?></a></td>
                        </tr>
                        <tr>
                            <th>Co-Autores</th>
                            <td><? echo $nomeCoautores ?></td>
                        </tr>
                        <tr>
                            <th>Apresentador</th>
                            <td>
							    <?
								$qryCoautores = $objCoautoresTrabalho->pesquisarCoautoresdoTrabalho($dadosTrabalho["id"]);
								?> 
                            	<select name="slApresentador">
                                	<option value="">--Selecione um apresentador--</option> 
                                    <option value="A" <? if ($dadosTrabalho["apresentador"] == "A") { echo " selected"; } ?>  ><? echo $dadosPart['nome'] ?></option> 
                                    
                                    <?
									 $ncoaut = 1;
									 while($dadosCoaut = mysql_fetch_array($qryCoautores)){ ?>
                                    	<option value=<? echo "'C".$ncoaut."'"; ?> <? if ($dadosTrabalho["apresentador"] == "C".$ncoaut) { echo " selected"; } ?>  ><? echo $dadosCoaut['nome'] ?></option>
                                    <?
                                    	$ncoaut ++;
									}
									?>
                                </select>
                            
                            </td>
                        </tr>
                        <?											
						if ($_SESSION["permissao"] > 10 || $_SESSION["id"] == $dadosTrabalho["avaliador"]) { 						
						?>
                        
                        <tr>
                        	<th>Avaliador</th>
                            <td>
                            
                                  <select name="slAvaliador">
                                  
                                  <?							  
                                  
                                  $qryAval = $objComissoes->PesquisarAvaliadores();
                                  while($avaliadores = mysql_fetch_array($qryAval)){
                                  	if ($_SESSION["permissao"] > 10 || $_SESSION["id"] == $avaliadores["id"]) {
								  ?>
                                  <option value="<? echo $avaliadores['id']; ?>" <? if ($avaliadores['id'] == $dadosTrabalho["avaliador"]) { echo "  selected"; } ?>  ><? echo $avaliadores['nome'] ?></option>
                                  	<? } ?>
								  <? } ?>
                                  </select>
                                  
                                  <br /><br />
                                   <select name="slSituacao">
                                  
                                  <?							  
                                  
                                  $qrySit = $objSituacoes->Pesquisar();
                                  while($situacoes = mysql_fetch_array($qrySit)){
                                  ?>
                                  <option value="<? echo $situacoes['id']; ?>" <? if ($situacoes['id'] == $dadosTrabalho["situacao"]) { echo "  selected"; } ?>  ><? echo $situacoes['descricao'] ?></option>
                                  <? } ?>
                            </select>
                            <br /><br />  
                                                      
                            </td>
                        </tr>
                        
                        <tr>
                        	<th>Parecer</th>
                            <td>
                            	<textarea rows="10" cols="10" name="tbParecerAv01"><? echo nl2br($dadosTrabalho["parecerav01"]); ?></textarea>
                            </td>
                        </tr>
                       <? } ?>
                       
                       <?											
						if ($_SESSION["permissao"] > 10 || $_SESSION["id"] == $dadosTrabalho["avaliador02"]) { 						
						?>
                        
                        <tr>
                        	<th>Avaliador</th>
                            <td>
                            
                                  <select name="slAvaliador02">
                                  
                                  <?							  
                                  
                                  $qryAval = $objComissoes->PesquisarAvaliadores();
                                  while($avaliadores = mysql_fetch_array($qryAval)){
                                  	if ($_SESSION["permissao"] > 10 || $_SESSION["id"] == $avaliadores["id"]) {
								  ?>
                                  <option value="<? echo $avaliadores['id']; ?>" <? if ($avaliadores['id'] == $dadosTrabalho["avaliador02"]) { echo "  selected"; } ?>  ><? echo $avaliadores['nome'] ?></option>
                                  	<? } ?>
								  <? } ?>
                                  </select>
                                  
                                  <br /><br />
                                   <select name="slSituacao02">
                                  
                                  <?							  
                                  
                                  $qrySit = $objSituacoes->Pesquisar();
                                  while($situacoes = mysql_fetch_array($qrySit)){
                                  ?>
                                  <option value="<? echo $situacoes['id']; ?>" <? if ($situacoes['id'] == $dadosTrabalho["situacao02"]) { echo "  selected"; } ?>  ><? echo $situacoes['descricao'] ?></option>
                                  <? } ?>
                            </select>
                            <br /><br />                            
                            </td>
                        </tr>
                         <tr>
                        	<th>Parecer</th>
                            <td>
                            	<textarea rows="10" cols="10" name="tbParecerAv02"><? echo nl2br($dadosTrabalho["parecerav02"]); ?></textarea>
                            </td>
                        </tr>
                       <? } ?>
                        
                       <?											
						if ($_SESSION["permissao"] > 10 || $_SESSION["id"] == $dadosTrabalho["avaliador01"] || $_SESSION["id"] == $dadosTrabalho["avaliador02"]) { 						
						?>
                        
                         <tr>
                        	<th>Parecer Aluno</th>
                            <td>
                            	<? echo nl2br($dadosTrabalho["pareceraluno"]); ?>
                            </td>
                        </tr>
                        
                        <? } ?>                        
                        <? if ($_SESSION["permissao"] > 10) { ?>
                        <tr>
                        	<th>Excluir</th>
                            <td>
                            <a href="javascript: abrir('excluir_trabalho.php?id=<?echo $dadosTrabalho[0]?>&ct=<?echo $cat?>')"><img src='images/excluir.gif' border='0' width="15" height="15"></a>
                            </td>
                        </tr>
                        <? } ?>                        
                       
                        <tr>
                        	<td colspan="2" align="center">
                            	<input type="submit" value="Atualizar" />
                            </td>
                        </tr>
                    </table>
                	</form>
                <? } ?>
                <?
				} else {
					echo "Nenhum registro encontrado.";
				}?>                               
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
