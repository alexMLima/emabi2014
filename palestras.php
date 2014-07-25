<?
if (file_exists('scripts/init.php')) {
	require_once 'scripts/init.php';
} else {
	exit('N�o foi poss�vel encontrar o arquivo de inicializa��o');
}
include "includes/head.php";
?>
<body>
	<?
	include "includes/header.php";
	?>
	<?
	include "includes/banner.php";
	?>
	<?
	$title = 'Programa&ccedil;&atilde;o';
	include "includes/titulo-topo.php";
	?>
	<div id="content">
		<div class="container">
			<div class="inner row">
				<div id="sidebar" class="span3">
					<?
					include "includes/menu_lateral.php";
					?>
				</div>
				<div class="span9">
					<div id="inscricao">
						<div class="entry">
							<h2>Programa&ccedil;&atilde;o</h2>
					
							
						<p><b>Em breve será disponibilizada a programação completa do evento. </b></p>	
							<br />
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="scripts/ajax.js"></script>
	<script type="text/javascript" src="scripts/funcoes.js"></script>
	<?
	include "includes/rodape.php";
?>
</body>
</html>
