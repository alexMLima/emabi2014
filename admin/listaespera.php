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
<title>II Encontro de Prefeitas e Prefeitos Eleitos. Foz do Iguaçu, 03 a 05 de Dezembro de 2008</title>
	
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
				<h1>Crachás</h1>
                <p align="justify">
                <img src='images/impressora.gif' border='0' width="30" height="30" style="padding:0 0 0 0">
                <a href="../autoatendimento/crachas/emitirTodosCrachas.php?esp=S" target="_blank"> Emitir todos os crachás</a>
                </p>  
                
                <a name="TemplateInfo"></a>	
				<h1>Certificados</h1>                
                <p align="justify">
                <img src="images/ico_pdf.gif" width="20"m height="20" /><a href="#" target="_blank">&nbsp;Emitir certificados para todos os participantes</a>
                
                </p>
                <p align="justify">
                </p>                
                
				<a name="TemplateInfo"></a>	
				<h1>Lista de Espera - A Confirmar</h1>
                
                <?
				$objParticipantes = new Inscricoes;
				$queryPart = $objParticipantes->pesquisarListadeEspera("S");
				$i = 1;				
				?>
                
                               
				<p align="justify">
                
                <table width="467" border="1" bordercolor="#CCCCCC">
                
				<tr>
                  <th width="50" align="center">N.</th>              
                  <th width="107" align="center">Nome</th>              
                  <th width="97" align="center">Cidade</th>                  
                  <th width="44" align="center">Exc.</th>                  
                  <th width="57" align="center">Crachá</th>
                  <th width="57" align="center">Cert.</th>                  
                </tr>
                    
                    <? while($dadosPart = mysql_fetch_array($queryPart)){ ?>
                    
                        <tr>
                            <td align="center"><? echo $i; $i++; ?></td>                           
                            <td align="center"><a href="detalhes_participante.php?id=<? echo $dadosPart["id"] ?>" ><? echo $dadosPart["nome"]; ?></a></td>                            
                           
                            <td align="center"><? echo $dadosPart["municipio"]; ?></td>                                
                            <td>
                            <a href="javascript: abrir('excluir_participante.php?id=<?echo $dadosPart[0]?>')"><img src='images/excluir.gif' border='0' width="9" height="9"></a>
                            </td>
                            <td>
                            <a href="../autoatendimento/comprovante.php?id=<? echo $dadosPart["id"]; ?>" target="_blank"><img src='images/impressora.gif' border='0' width="25" height="25" style="padding:0 0 0 0"></a>
                            </td>
                            <td align="center">                            
                            <a href="certificados/certificadoParticipante.php?id=<? echo $dadosPart["id"] ?>" target="_blank"><img src="images/ico_pdf.gif" width="15" height="15" border="0" /></a>                            
                            </td>
                        </tr>
                    	
                    <? } ?>
                        
                    
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

