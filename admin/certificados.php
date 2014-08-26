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
             	<?
				$op = $_GET["op"];
				switch($op){
					case "1":
				?>
                <h1>Emitir Certificados</h1>
                <p align="justify">
                Caso o campo de data seja deixado em branco, todos os certificados serão emitidos.
                </p>        
                 <p align="justify">
                <form action="certificados/certificadoParticipante.php?id=t" method="post" target="_blank">
                <img src="images/ico_pdf.gif" width="20"m height="20" />&nbsp;Emitir certificados a partir do dia de inscrição <input type="text" name="tbDataCert" /> (dd/mm/aaaa)&nbsp;
                <input type="submit" value="OK" />
                </form>
                
                </p>     
                
				<?  } ?>       
		    </div>					
		</div>					
		
	<!-- content-wrap ends here -->		
	</div></div>
	
<!-- wrap ends here -->
</div>
<? include 'rodape.php'; ?>
</body>
</html>

