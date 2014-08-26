<? include 'seguranca.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>

        <link rel="stylesheet" href="images/PixelGreen.css" type="text/css" />
        <? include "acoesEnvioMensagem.php"; ?>
        <title><? include "../titulo.php"; ?></title>

    </head>

    <body>

        <div id="wrap">

            <? include 'topo.php'; ?>

        </div>

        <!-- <div class="headerphoto"></div> -->

        <!-- content-wrap starts here -->
        <div id="content-wrap"><div id="content">

                <div id="sidebar" >

                    <? include 'loginMenu.php'; ?>

                </div>

                <div id="main">

                    <div class="post">

                        <a name="TemplateInfo"></a>

                        <h1>Enviar Mensagens</h1>
                        <p>
                            <form action="enviarMensagens.php?cod=1" name="Mensagens" method="post">
                                <table class="tabelaSemBorda">
                                    <? if ($mensagem != "" && $mensagem != "OK") {
 ?>
                                        <tr>
                                            <td colspan="2" align="center">ALERTAS</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="left"><font color="#CC0000"><? echo $mensagem; ?></font><br /></td>
                                        </tr>
<? } ?>
                                    <tr>
                                        <th> * De</th>
                                        <td>
                                            <input type="text" name="tbDe" size="50" value="LEIFAMS 2011 <leifams2011@pse.uem.br>" readonly="true" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> * Para</th>
                                        <td>
                                        <select name="slPara">
                                            <option value="" selected="true">--Selecione um destino--</option>
                                            <option value="inscricao">Participantes</option>
                                            <option value="comissao">Avaliadores</option>                                            
                                        </td>
                                    </tr>

                                    <tr>
                                        <th> * Assunto</th>
                                        <td>
                                            <input type="text" name="tbAssunto" size="50" value="<? if ($tbAssunto) {
                                        echo $tbAssunto;
                                    } ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> * Mensagem</th>
                                        <td>
                                            <textarea name="tbMensagem"><? if ($tbMensagem) {
                                        echo $tbMensagem;
                                    } ?></textarea>
                                        </td>
                                    </tr>



                                    <tr>
                                        <td colspan="2" align="center"><input type="submit" value="Enviar" /></td>
                                    </tr>

                                </table>
                            </form>
                        </p>

                    </div>
                </div>

                <!-- content-wrap ends here -->
            </div>
        </div>
        <!-- wrap ends here -->
<? include 'rodape.php'; ?>
    </body>
</html>
