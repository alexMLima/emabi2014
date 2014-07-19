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
	$title = 'Hot&eacute;is e Alojamento';
	include "includes/titulo-topo.php";?>
    <div id="content">
    	<div class="container">
            <div class="inner row">
            	<div id="sidebar" class="span3">
                	<? include "includes/menu_lateral.php";?>
                </div>
				<div class="span9">
                	<div id="inscricao">
                    	<div class="entry">
			<h4>
					Você congressista, n&atilde;o &eacute; de Maring&aacute; e vir&aacute; para o evento?
			</h4>
			<br />
					<h5>Precisa de hospedagem?</h5>

					<a href="http://issuu.com/barbara.ecoalize/docs/hospedagem.docx_3b19ec7bc093aa">Veja as opções que preparamos para você!</a></br>



<p>Qualquer dúvida, entre em contato:</p>
<p>emabiuem2013@gmail.com</p>
 			
 					 </div>
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

