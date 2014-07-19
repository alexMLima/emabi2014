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
	$title = 'NEWS';
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
				Fundação Isis Bruder de Maringá	
			</h4>
			<br />
			<p>
   	&nbsp;&nbsp;&nbsp;&nbsp;Com  apoio da Fundação Isis Bruder de Maringá a decoração de nosso evento será feita com materiais reutilizados e reciclados.<br />

	&nbsp;&nbsp;&nbsp;&nbsp;Será feito o reaproveitamento de vários materiais para confecção de alguns itens presentes na decoração do evento, esses materiais são desde tecidos que são descartados por fabricas de roupas até garrafas pet, caixinhas de leite,  entre outros materiais.<br />

	&nbsp;&nbsp;&nbsp;&nbsp;Durante o evento, teremos disponíveis alguns produtos feitos com materiais reutilizáveis para que cada congressista possa consumir de acordo com seu gosto, são produtos de bom gosto e com a cara da biologia. Vale a pena conferir!<br />

	&nbsp;&nbsp;&nbsp;&nbsp;A Coordenadoria de Responsabilidade Sócio Ambiental juntamente com a coordenadoria de Infra Estrutura da Semana da Biologia 2013 - UEM, busca inovar o evento utilizando meios sustentáveis que deixarão o evento cada vez mais com a cara da biologia. <br />
			</p>
	<div style="height: 100px;"></div>
	<a class="banner" href="<?=BASE_URL?>/img/Foto0169.jpg" title="Image1">
	   <img src="<?=BASE_URL?>/img/min/Foto0169.jpg"/>
	</a>
<div style="height: 100px;"></div>
	<a class="banner" href="<?=BASE_URL?>/img/Foto0157.jpg" title="Image2">
	   <img src="<?=BASE_URL?>/img/min/Foto0157.jpg"/>
	</a>
<div style="height: 100px;"></div>
	<a class="banner" href="<?=BASE_URL?>/img/Foto0160.jpg" title="Image3">
    	 <img src="<?=BASE_URL?>/img/min/Foto0160.jpg"/>
	</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<script type="text/javascript" src="scripts/ajax.js"></script>
	<script type="text/javascript" src="scripts/funcoes.js"></script>
    <? include "includes/rodape.php";?>
</body>
</html>

