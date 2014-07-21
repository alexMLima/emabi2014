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
    $title = 'Normas para Submiss&atilde;o de Resumos ';
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

                            <h3>Normas para Submiss&atilde;o de Resumos s&iacute;mples, Resumos
                                Expandidos e Apresenta&ccedil;&atilde;o de Trabalhos Cient&iacute;ficos.</h3>
                            
                                <p>
                                    Durante o 14º Encontro Maringaense de Biologia (EMABI) e 
                                    a 28ª Semana de Biologia, os resumos serão apresentados em formato de pôster, 
                                    observando as seguintes informações gerais:
                                </p>
                                <div class="alert alert-error">
                                    
                                <p>
                                    Os resumos deverão ser submetidos no site até 18 de agosto de 2014.
                                </p>
                                </div>
                                <p>
                                    Serão aceitos resumos em português, espanhol ou inglês.
                                </p>
                                <p>
                                    O texto científico apresentado pelos autores é de responsabilidade dos mesmos. Solicitamos
                                </p>
                            </div>
                            <p>
                                Os resumos (simples ou expandidos) de trabalhos científicos deverão ser enviados
                                SOMENTE eletronicamente para o e-mail: <b>resumos.emabi2013@gmail.com</b>,
                                impreterivelmente até o dia 18 de agosto de 2014.
                            </p>
                            
                            <p><a href="http://www.dbi.uem.br/emabi2014/resumos-norma.pdf" title="Resumos">CLIQUE AQUI PARA VISUALIZAR AS NORMAS</a></li></p>
                            <p>Poderão ser submetidos trabalhos científicos nas seguintes áreas:</p>
                            <ul>
                                <li>Celular e Genética </li>
                                <li>Bioquímica</li>
                                <li>Botânica</li>
                                <li>Ecologia</li>
                                <li>Ensino de Biologia</li>
                                <li>Micologia</li>
                                </li>Morfofisiologia Humana e Animal
                                </li>Saúde</li>
                                </li>Zoologia</li>
                                <li>Áreas Afins</li>
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

