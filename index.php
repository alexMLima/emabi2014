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
    <? include "includes/menu_topo.php";?>
    <div id="content">
    	<div class="container">
            <div class="inner row">
            	<div id="sidebar" class="span3">
                	<? include "includes/menu_lateral.php";?>
                </div>
                <div class="span9">
                	<div class="tab-content">
                    	<div id="home" class="tab-pane fadein active">
                            <? include "pages/home.php";?>
                        </div>
                        <div id="local" class="tab-pane fade">
                            <? include "pages/local.php";?>
                        </div>
                        <? include "pages/programacao.php";?>
                        <div id="instrucoes" class="tab-pane fade">
                            <? include "pages/instrucoes.php";?>
                        </div>
                        <div id="ambiental" class="tab-pane fade">
                            <? include "pages/socioambiental.php";?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <? include "includes/rodape.php";?>
    <script type="text/javascript">
  $(function () {
    $('#tabs a:first').tab('show');
	
	$('#tabs a[data-toggle="tab"]').on('show', function (e) {
		
	  console.log( $(e.target).attr('href') ); // activated tab
	  console.log( e.relatedTarget ); // previous tab
	})
  })
</script>
</body>
</html>