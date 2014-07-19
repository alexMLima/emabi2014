<?php include 'seguranca.php';

if (file_exists('scripts/init.php'))
{
	require_once 'scripts/init.php';
}
else
{
	exit('Não foi possível encontrar o arquivo de inicialização');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="scripts/ajax.js"></script>
<script type="text/javascript" src="scripts/funcoes.js"></script>
<script language="javascript1.2" src="js/mascaraHellas.js"></script>
<link rel="stylesheet" href="images/PixelGreen.css" type="text/css" />
<title>Hotel Show 2009 - 04 a 06 de Junho - Foz do Iguaçu</title>
</head>
<body onload="buscaEstados()">
<div id="wrap">
	<? include 'validar_inscricao.php'; ?>
	<? include 'topo.php'; ?>

</div>

<div id="content-wrap"><div id="content">		
		
		<div id="sidebar" >
		
			
					
		</div>	
   </div>
</div>
<form method="post" action="">
  <p>
    <select name="uf" id="uf" onchange="buscaCidades(this.value)">
    </select>
  </p>
  <p>
    <select name="cidade" id="cidade">
      <option value="">Primeiramente, selecione o estado</option>
    </select>
  </p>
</form>

</body>
</html>