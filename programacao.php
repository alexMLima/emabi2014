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
    $title = 'Programação';
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

                    <div>
                        <table class="CSSTableGenerator">
                            <tbody>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>Segunda-feira <span class="label label-info">01/09</span></td>
                                </tr>
                                <tr>
                                    <td >
                                        08:00 - 09:30
                                    </td>
                                    <td>
                                        Entrega de Material
                                    </td>
                                </tr>
                                <tr>
                                    <td >
                                        09:30 - 10:30
                                    </td>
                                    <td>
                                        Abertura
                                    </td>
                                </tr>
                                <tr>
                                    <td >
                                        10:30 - 12:00
                                    </td>
                                    <td>
                                        Palestra 1
                                    </td>
                                </tr>
                                <tr>
                                    <td >
                                        12:00 - 14:00
                                    </td>
                                    <td>
                                        Almoço
                                    </td>
                                </tr>
                                <tr>
                                    <td >
                                        14:00 - 15:30
                                    </td>
                                    <td>
                                        Palestra 2
                                    </td>
                                </tr>
                                <tr>
                                    <td >
                                        15:30 - 16:00
                                    </td>
                                    <td>
                                        Coffee
                                    </td>
                                </tr>
                                <tr>
                                    <td >
                                        16:00 - 17:30
                                    </td>
                                    <td>
                                        Apresenta&ccedil;&atilde;o de painel
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        19:30 - 21:30
                                    </td>
                                    <td>
                                        Mesa Redonda 1
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </br>
                        <table class="CSSTableGenerator">
                            <tbody>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>Terça-feira <span class="label label-info">02/09</span></td>
                                </tr>
                                <tr>
                                    <td >08:00 - 09:30</td>
                                    <td>Palestra 3</td>
                                </tr>
                                <tr>
                                    <td >09:30 - 10:00</td>
                                    <td>Coffee</td>
                                </tr>
                                <tr>
                                    <td >10:00 - 11:30</td>
                                    <td>Palestra 4</td>
                                </tr>
                                <tr>
                                    <td >12:00 - 14:00</td>
                                    <td>Almoço</td>
                                </tr>
                                <tr>
                                    <td >14:00 - 15:30</td>
                                    <td>Palestra 5</td>
                                </tr>
                                <tr>
                                    <td >   15:30 - 16:00</td>
                                    <td>Coffee</td>
                                </tr>
                                <tr>
                                    <td >16:00 - 17:30</td>
                                    <td>Apresenta&ccedil;&atilde;o de painel</td>
                                </tr>
                                <tr>
                                    <td>19:30 - 21:30</td>
                                    <td> Mesa Redonda 2</td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <table class="CSSTableGenerator">
                            <tbody>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>Quarta-feira <span class="label label-info">03/09</span></td>
                                </tr>
                                <tr>
                                    <td >08:00 - 09:30</td>
                                    <td>Palestra 6</td>
                                </tr>
                                <tr>
                                    <td >09:30 - 10:00</td>
                                    <td>Coffee</td>
                                </tr>
                                <tr>
                                    <td >10:00 - 11:30</td>
                                    <td>Palestra 7</td>
                                </tr>
                                <tr>
                                    <td >12:00 - 14:00</td>
                                    <td>Almoço</td>
                                </tr>
                                <tr>
                                    <td >14:00 - 15:30</td>
                                    <td>Palestra 8</td>
                                </tr>
                                <tr>
                                    <td >   15:30 - 16:00</td>
                                    <td>Coffee</td>
                                </tr>
                                <tr>
                                    <td >16:00 - 17:30</td>
                                    <td>Apresenta&ccedil;&atilde;o de painel</td>
                                </tr>
                                <tr>
                                    <td>19:30 - 21:30</td>
                                    <td> Mesa Redonda 3</td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <table class="CSSTableGenerator">
                            <tbody>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>Quinta-feira <span class="label label-info">04/09</span></td>
                                </tr>
                                <tr>
                                    <td >08:00 - 10:00</td>
                                    <td>Minicurso Grupo 1</td>
                                </tr>
                                <tr>
                                    <td >10:00 - 10:30</td>
                                    <td>Coffee</td>
                                </tr>
                                <tr>
                                    <td >10:30 - 12:00</td>
                                    <td>Minicurso Grupo 1</td>
                                </tr>
                                <tr>
                                    <td >12:00 - 13:30</td>
                                    <td>Almoço</td>
                                </tr>
                                <tr>
                                    <td >13:30 - 15:30</td>
                                    <td>Minicurso Grupo 2</td>
                                </tr>
                                <tr>
                                    <td>15:30 - 16:00</td>
                                    <td>Coffee</td>
                                </tr>
                                <tr>
                                    <td >16:00 - 17:30</td>
                                    <td>Minicurso Grupo 2</td>
                                </tr>
                                <tr>
                                    <td>19:00 - 21:00</td>
                                    <td>Minicurso Grupo 3</td>
                                </tr>
                                <tr>
                                    <td>21:00 - 21:30</td>
                                    <td>Coffee</td>
                                </tr>
                                <tr>
                                    <td>21:30 - 23:00</td>
                                    <td>Minicurso Grupo 3</td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <table class="CSSTableGenerator">
                            <tbody>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>Sexta-feira <span class="label label-info">05/09</span></td>
                                </tr>
                                <tr>
                                    <td >08:00 - 10:00</td>
                                    <td>Minicurso Grupo 1</td>
                                </tr>
                                <tr>
                                    <td >10:00 - 10:30</td>
                                    <td>Coffee</td>
                                </tr>
                                <tr>
                                    <td >10:30 - 12:00</td>
                                    <td>Minicurso Grupo 1</td>
                                </tr>
                                <tr>
                                    <td >12:00 - 13:30</td>
                                    <td>Almoço</td>
                                </tr>
                                <tr>
                                    <td >13:30 - 15:30</td>
                                    <td>Minicurso Grupo 2</td>
                                </tr>
                                <tr>
                                    <td>15:30 - 16:00</td>
                                    <td>Coffee</td>
                                </tr>
                                <tr>
                                    <td >16:00 - 17:30</td>
                                    <td>Minicurso Grupo 2</td>
                                </tr>
                                <tr>
                                    <td>19:00 - 21:00</td>
                                    <td>Minicurso Grupo 3</td>
                                </tr>
                                <tr>
                                    <td>21:00 - 21:30</td>
                                    <td>Coffee</td>
                                </tr>
                                <tr>
                                    <td>21:30 - 23:00</td>
                                    <td>Minicurso Grupo 3</td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?
    include "includes/rodape.php";
    ?>
</body>
</html>
