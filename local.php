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
		$title = 'Local do Evento';
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
                     <iframe width="700" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.br/maps/ms?msid=215565739253637962762.0004b83b3c2a8cb5032bb&amp;msa=0&amp;ie=UTF8&amp;ll=-23.405719,-51.936686&amp;spn=0.010949,0.021136&amp;t=m&amp;iwloc=lyrftr:msid:215565739253637962762.0004b83b3c2a8cb5032bb,0004b860907cc1c94073b,-23.404065,-51.939776,0,-16&amp;output=embed"></iframe><br /><small>Ver <a href="https://maps.google.com.br/maps/ms?msid=215565739253637962762.0004b83b3c2a8cb5032bb&amp;msa=0&amp;ie=UTF8&amp;ll=-23.405719,-51.936686&amp;spn=0.010949,0.021136&amp;t=m&amp;iwloc=lyrftr:msid:215565739253637962762.0004b83b3c2a8cb5032bb,0004b860907cc1c94073b,-23.404065,-51.939776,0,-16&amp;source=embed" style="color:#0000FF;text-align:left">Campus da UEM</a> num mapa maior</small>
                </div>
            </div>
        </div>
    </div>
    <?
		include "includes/rodape.php";
	?>
</body>
</html>
