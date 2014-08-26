<?
if (file_exists('scripts/init.php')) {
    require_once 'scripts/init.php';
} else {
    exit('N�o foi poss�vel encontrar o arquivo de inicializa��o');
}
include "includes/head.php";
?>
<body>
    <? include "includes/header.php"; ?>
    <? include "includes/banner.php"; ?>
    <?
    $title = 'Instru&ccedil;&otilde;es para Inscri&ccedil;&atilde;o';
    include "includes/titulo-topo.php";
    ?>
    <div id="content">
        <div class="container">
            <div class="inner row">
                <div id="sidebar" class="span3">
<? include "includes/menu_lateral.php"; ?>
                </div>
                <div class="span9">
                    <div id="inscricao">
                        <div class="entry">
                            <h3>Investimento</h3>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Categoria</th>
                                    <th>Valor (R$)</th>
                                </tr>                                       

                                <tr>
                                    <td>2 minicursos e palestras</td>
                                    <td>80,00</td>
                                </tr>
                                <tr>
                                    <td>3 minicursos e palestras</td>
                                    <td>100,00</td>
                                </tr>
                            </table>                                    
                            <div>
                                <p><h4>ATEN&Ccedil;&Atilde;O</h4> A sele&ccedil;&atilde;o dos minicursos s&oacute; poder&aacute; ser feita AP&Oacute;S CONFIRMA&Ccedil;&Atilde;O DO PAGAMENTO. Para selecionar o(s) mini-curso(s), o participante dever&aacute; acessar a op&ccedil;&atilde;o "Editar Inscri&ccedil;&atilde;o", digitar seu CPF e ent&atilde;o selecionar o(s) mini-curso(s). Se mesmo ap&oacute;s o pagamento, os minicursos n&atilde;o aparecerem para sele&ccedil;&atilde;o nesta op&ccedil;&atilde;o, favor entrar em contato com a organiza&ccedil;&atilde;o do evento (Secretaria do DBI).</p>
                            </div>
                            <p>A inscri&ccedil;&atilde;o nos minicursos estar&aacute; condicionada à disponibilidade de vagas.</p>
                            <p>Cada participante inscrito poder&aacute; submeter at&eacute; 2 resumos cient&iacute;ficos como primeiro autor.</p>
                            

                            <div class="alert alert-error">
                                <p><h4>ATEN&Ccedil;&Atilde;O</h4>Guardar o comprovante de pagamento!! E caso os inscritos nao tiverem o pagamento confirmado em dois dias uteis. Enviar o comprovante do boleto para o email <b> contato.emabi2014@gmail.com </b>  .</p>
                            </div>

                            <div class="alert alert-error">
                                <p><h4>ATEN&Ccedil;&Atilde;O</h4> A sele&ccedil;&atilde;o dos minicursos s&oacute; poder&aacute; ser feita AP&Oacute;s CONFIRMA&Ccedil;&Atilde;O DO PAGAMENTO. Para selecionar o(s) mini-curso(s), o participante dever&aacute; acessar a op&ccedil;&atilde;o "Editar Inscri&ccedil;&atilde;o", digitar seu CPF e ent&atilde;o selecionar o(s) mini-curso(s). Se mesmo ap&oacute;s o pagamento, os minicursos n&atilde;o aparecerem para sele&ccedil;&atilde;o nesta op&ccedil;&atilde;o, favor entrar em contato com a organiza&ccedil;&atilde;o do evento (Secretaria do DBI).</p>
                            </div>
                            
                            
                            <h3>Procedimentos para Inscri&ccedil;&atilde;o e Pagamento da Inscri&ccedil;&atilde;o</h3>

                            <ol>
                                <li>
                                    <strong>Primeiro Passo: Efetuar ou Alterar Inscri&ccedil;&atilde;o</strong>
                                    <p>Preencha, ou complemente sua inscri&ccedil;&atilde;o com cuidado o Formul&acute;rio de Inscri&ccedil;&atilde;o, atentando para a necessidade de informa&ccedil;&atilde;o sobre a participa&ccedil;&atilde;o em mini-cursos (caso a inscri&ccedil;&atilde;o j&acute; tenha tido a confirma&ccedil;&atilde;o do pagamento no sistema). Cada inscrito tem direito a participar de at&eacute; 2 mini-cursos.</p>
                                    <p>Clique aqui para <a href="http://www.dbi.uem.br/emabi2014/inscricoes.php">efetuar</a> ou <a href="buscaporcpf.php?cod=3">complementar</a> sua inscri&ccedil;&atilde;o no EMABI 2014.</p>
                                </li>
                                <li>
                                    <strong>Segundo Passo: Emiss&atilde;o do Boleto Banc&aacute;rio</strong>
                                    <p>
                                        A empresa respons&aacute;vel pelo controle financeiro do evento &eacute; a FADEC - Funda&ccedil;&atilde;o de Apoio ao Desenvolvimento Cient&iacute;fico. Relembrando, a confirma&ccedil;&atilde;o de sua inscri&ccedil;&atilde;o no evento ser&ccedil;&atilde; efetuada pelo pagamento <b>via Boleto Banc&aacute;rio.</b>
                                    </p>


                                </li>
                            </ol>

                            <p>
                                <a href="">Clique aqui para emitir o Boleto Banc&aacute;rio no EMABI 2014</a>
                            </p>


                            <div class="alert alert-error">
                                <h4>IMPORTANTE</h4>
                                <p>AP&Oacute;S REALIZA&Ccedil;&Atilde;O DA INSCRI&Ccedil;&Atilde;O E PAGAMENTO DO BOLETO, &Eacute; NECESSARIO ENTRAR <a href="#cpf_modal" title="Verifique sua insrição" data-toggle="modal">NESTE LINK</a> PARA SELECIONAR OS MINICURSOS APARTIR DO DIA 05/08/2014.</font></b>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script language="javascript1.2" src="scripts/mascaraHellas.js"></script>
    <script type="text/javascript" src="scripts/ajax.js"></script>
    <script type="text/javascript" src="scripts/funcoes.js"></script>
<? include "includes/rodape.php"; ?>
</body>
</html>