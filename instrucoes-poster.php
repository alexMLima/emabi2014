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
    $title = 'Instruções exposição poster ';
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

                            <h3>Instruções para exposição de poster</h3>
                            
                                Sobre a apresentação dos pôsters:
                                <ul>
                                    <li>Serão apresentados entre os dias 01 a 03 de setembro de 2014, no local e data que serão divulgados pela comissão organizadora do evento.</li>
                                    <li>Os pôsters deverão medir 90 cm (largura) x 100 cm (altura)</li>
                                    <li>Deverão ser afixados às 08h00 min e retirados no final de cada sessão de apresentação (a comissão não se responsabilizará pela retirada dos mesmos)</li>
                                    <li>Pelo menos um dos autores deverá estar presente durante o período de apresentação dos trabalhos</li>
                                    <li>O certificado do trabalho apresentado será entregue após a apresentação do trabalho no evento</li>
                                </ul>
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

