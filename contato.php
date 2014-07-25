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
    $title = 'Contato';
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
                    </br></br>
                                    <table>
                                        <tr>
                                            <td>
                                                <img src="images/faleConosco.jpg" />
                                            </td>
                                            <td>
						DBI-UEM<br/>
						Av. Colombo, 5790 - Bloco H-78<br/>						
                                                CEP: 87020-900 - Maring&acute - Paran&aacute; - Brasil<br />
                                                Fone/Fax: (44) 3011-4613<br />
                                                E-mail: <a href=mailto:contato.emabi2014@gmail.com>contato.emabi2014@gmail.com</a>
                                            </td>
                                        </tr>
                                    </table>
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
