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

<body onload="javascript: document.confirmar.tbId.focus()">

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
				<h1>Confirmar Participante</h1>                
				<p align="justify">               
                	     
                    <form action="confirmar_participante.php" method="post" name="confirmar">
                	<table border="1" bordercolor="#CCCCCC">
                      
                      <tr>
                            <th width="152">Código do Participante</th>
                            <td width="316"><input type="text" name="tbId" size="50" /></td>
                      </tr>                      
                      
                        <tr>
                        	<td colspan="2" align="center">
                            	<input type="submit" value="Confirmar" />
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
