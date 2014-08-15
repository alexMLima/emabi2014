<script language="javascript" type="text/javascript">
    function checa_formulario(email){
        if (email.nome.value == ""){
            alert("Por Favor não deixe o seu nome em branco!!!");
            email.nome.focus();
            return (false);
        }
        if (email.email_from.value == ""){
            alert("Por Favor não deixe o seu email em branco!!!");
            email.email_from.focus();
            return (false);
        }
    }
</script>
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
                            <form onSubmit="return checa_formulario(this)" action="mail.php" method="post" enctype="multipart/form-data" name="email">
                                <h1 align="center" class="style1">Formulario de envio de resumo</h1>
                                <table width="32%" border="0" align="center">
                                    <tr>
                                        <td><div align="right"><span class="texto">Nome</span></div></td>
                                        <td><input name="nome" type="text" id="nome"></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><div align="right" class="texto">Email:</div></td>
                                        <td width="67%"><input name="email_from" type="text" class="email"></td>
                                    </tr>
                                    <tr>
                                        <td><div align="right" class="texto"></div></td>
                                    </tr>
                            
                                    <tr>
                                        <td><div align="right" class="texto">Mensagem</div></td>
                                        <td><textarea name="mensagem" cols="50" rows="10" id="mensagem"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td><div align="right" class="texto">Anexo</div></td>
                                        <td><input name="arquivo" type="file"></td>
                                    </tr>
                                    <tr>
                                        <td> </td>
                                        <td><input type="submit" name="Submit" value="Enviar"></td>
                                    </tr>
                                </table>
                            </form>
         
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

