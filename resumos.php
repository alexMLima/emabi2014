<?
if (file_exists('scripts/init.php')) {
    require_once 'scripts/init.php';
} else {
    exit('Nao foi possivel encontrar o arquivo de inicializacao');
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
    $title = 'Resumos e exposição de painel';
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

                            <h3>Normas para submiss&atilde;o de resumos e exposição de painel.</h3>
                            
                                <p>
                                    Durante o 15º Encontro Maringaense de Biologia (EMABI) e 
                                    a 28ª Semana de Biologia, os resumos serão apresentados em formato de pôster, 
                                    observando as seguintes informações gerais:
                                </p>
                                <div class="alert alert-error">
                                    
                                <p>
                                    Os resumos deverão ser enviados para <b>resumo.emabi2014@gmail.com</b>  até 18 de agosto de 2014.
                                </p>
                                </div>
                                <p>
                                    Serão aceitos resumos em português, espanhol ou inglês.
                                </p>
                                <p>
                                    O texto científico apresentado pelos autores é de responsabilidade dos mesmos.
                                </p>
                            </div>
                            <p>
                                Os resumos de trabalhos científicos deverão ser enviados
                                SOMENTE eletronicamente para o e-mail: <b>resumo.emabi2014@gmail.com</b>,
                                impreterivelmente até o dia 18 de agosto de 2014.
                            </p>
                            <p><b>Normas para submissão de resumos online</b></p>
                            <ul>
<li>O texto do resumo deverá seguir as seguintes normas de formatação:</li>
<li>Os resumos deverão ser redigidos em português, inglês ou espanhol, no Microsoft Word (fonte Times News Roman, tamanho 12, espaçamento 1,5, e com todas as margens ajustadas em 2,5 cm).</li> 
<li>Deve ser em parágrafo único e conter até 2500 caracteres (incluindo espaços).</li> 
<li>Resumos com número maior que 2500 caracteres não serão aceitos.</li>
<li>Título: deve ser informativo e escrito em letra maiúscula e em negrito, centralizado.</li>
<li>Nome dos autores sem abreviação; nome e endereço das instituições; e-mail para correspondência.</li>
<li>O texto deve conter introdução, metodologia, resultados e conclusões - Fontes financiadoras ou de Apoio (opcionais).</li>
<li>Projetos de pesquisa não serão aceitos.</li>
<li>Tabelas, gráficos, citações ou referências bibliográficas, não deverão constar no texto.</li>
<li>Modelo de resumo simples: ver <a href="http://www.dbi.uem.br/emabi2014/ModeloResumo.pdf" title="Resumos">ANEXO 1 MODELO DE RESUMO</a></li>
                            </ul>
                           
                           
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
                            
                            <p><b>Exposição de painel</b></p>
                                  <ul>
                                    <li>Serão apresentados entre os dias 01 a 03 de setembro de 2014, no local e data que serão divulgados pela comissão organizadora do evento.</li>
                                    <li>O painel deverão medir 90 cm (largura) x 100 cm (altura)</li>
                                    <li>Deverão ser afixados às 08h00min e retirados no final de cada sessão de apresentação (a comissão não se responsabilizará pela retirada dos mesmos)</li>
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

