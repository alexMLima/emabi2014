<? include 'seguranca.php'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>


<link rel="stylesheet" href="images/PixelGreen.css" type="text/css" />
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
             	<br />
                <table width="520">
                	<tr>
                    	<th height="40" colspan="2" style="text-align:center">
                    	Crachás
                        </th>                
                  </tr>
                    <tr>
                    	<td width="254" colspan="2" height="46" align="center">
                    	<a href="crachas.php?op=1"><img src="images/impressora2.gif"/></a></td> 
                                   
                  </tr>
                    <tr>
                    	<td align="center">
                    	Emitir crachás por data de inscrição
                    	</td> 
                                    
                    </tr>
                </table>
               
                
                
                <table width="520">
                	<tr>
                    	<th colspan="2" style="text-align:center">
                    	Certificados
                    	</th>                
                    </tr>
                    <tr>
                    	<td align="center" colspan="2">                    	
                    	<a href="certificados.php?op=1"><img src="images/pdf2.gif"/></a></td>                
                  </tr>
                    <tr>
                    	
                        <td align="center" colspan="2">
                    	Emitir certificados por data de inscrição
                    	</td>                
                    </tr>
                </table>
               
                <table width="520">
                	<tr>
                    	<th colspan="3" style="text-align:center">
                    	Geral
                    	</th>                
                    </tr>
                    <tr>
                    	<td width="260" height="45" align="center">
                    	<a href="participantes.php"><img src="images/part.jpg" /></a></td> 
                      <td width="248" align="center">
                    	<a href="oficinas.php"><img src="images/minicurso.jpg" /></a></td>                                      
                  </tr>
                    <tr>
                    	<td align="center">
                    	Participantes
                    	</td> 
                        <td align="center">
                    	Minicursos
                    	</td>                                     
                    </tr>
                    
                     <tr>
                    	<td width="260" height="45" align="center">
                    	<a href="participantes.php"><img src="images/news.png" /></a></td> 
                                             
                  </tr>
                    <tr>
                    	<td align="center">
                    	Trabalhos
                    	</td> 
                                                     
                    </tr>
                   
                </table>
               
                <table width="520">
                	<tr>
                    	<th colspan="3" style="text-align:center">
                    	Relatórios
                    	</th>                
                    </tr>
                    <tr>
                    	<td height="52" align="center">
                    	<a href="relatorios.php?op=1"><img src="images/report.jpg" /></a></td> 
                      <td align="center">
                    	<a href="relatorios.php?op=2"><img src="images/report.jpg" /></a>
                   	  </td>                                  
                    </tr>
                    <tr>
                    	<td align="center">
                    	Listagem geral de participantes
                    	</td> 
                        <td align="center">
                    	Participantes por município
                    	</td>                                          
                    </tr>
                   
                </table>
               
		    </div>					
		</div>					
		
	<!-- content-wrap ends here -->		
	</div></div>
	
<!-- wrap ends here -->
</div>
<? include 'rodape.php'; ?>
</body>
</html>

