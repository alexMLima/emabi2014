<?
if (file_exists('scripts/init.php')) {
	require_once 'scripts/init.php';
} else {
	exit('N�o foi poss�vel encontrar o arquivo de inicializa��o');
}
include "includes/head.php";?>
<body>
	<? include "includes/header.php";?>
    <? include "includes/banner.php";?>
    <? 
	$title = 'Concurso de Fotografias 2013';
	include "includes/titulo-topo.php";?>
    <div id="content">
    	<div class="container">
            <div class="inner row">
            	<div id="sidebar" class="span3">
                	<? include "includes/menu_lateral.php";?>
                </div>
				<div class="span9">
                	<div id="noticias">
                    	<div class="entry">
			<h4>
				Concurso de Fotografias 2013
			</h4>
			<br />
			<h5>Estão abertas as inscrições para o Concurso de Fotografias EMABI 2013.</h5>

			<h6>Leia o regulamento abaixo e participe!<h6>

<p><a href="http://issuu.com/patriciamathiaszago/docs/regulamento_fotografias?workerAddress=ec2-54-242-78-119.compute-1.amazonaws.com">Regulamento </a></p>

</body>
</html>

