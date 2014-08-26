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
	$title = 'Alimenta&ccedil;&atilde;o';
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
							<h4> Opções para sua alimentação durante o evento: </h4>
							<br/>
							<p>No Restaurante Pasárgada apresentando o crachá do evento você ganhará o suco.<p>
							<br/>
							<p>Endereço: R Mario Cladier Urbinati, 567 - Z-07  - Maringá - PR<p>

						<div style="height: 50px;"></div>
	<a class="banner" href="<?=BASE_URL?>/img/RESTAURANTE.jpg" title="Image1">
	   <img src="<?=BASE_URL?>/img/RESTAURANTE.jpg"/>
	</a>
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

