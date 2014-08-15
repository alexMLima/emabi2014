<? include 'seguranca.php'; 
header('Content-Type: text/html; charset=utf-8');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>

        <link rel="stylesheet" href="images/PixelGreen.css" type="text/css" />
        <script type="text/javascript" src="js/confirmaExclusao.js"></script>
        <script type="text/javascript" src="js/ajaxInit.js"></script>
        <script type="text/javascript" src="js/salvarDataPagamento.js"></script>
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
                        <h1>Participantes</h1>

                        <?
                        include_once '../cidades/Cidades.class.php';
                        include_once '../comissao/Comissoes.class.php';
                        $hoje = strtotime(date("Y-m-d H:i:s"));
                        $dias_de_prazo_para_pagamento = 5;

                        $objCidades = new Cidades;

                        $order = $_POST["pOrderBy"];
                        if ($order == "") {
                            $order = "nome";
                        }

                        $objParticipantes = new Inscricoes;
                        $queryPart = $objParticipantes->ConsultaTabelaOrdenada($order);
                        $i = 1;

                        $objComissoes = new Comissoes();
                        $qryComissao = $objComissoes->pesquisar($_SESSION["id"]);
                        $dadosComissao = mysql_fetch_array($qryComissao);
                        ?>

                        <p align="justify">

                            <img src="images/pdf2.gif" /><a href="certificados/certificadoParticipante.php?id=t&lim=0" target="_blank">Emitir Certificados para Todos os Participantes</a>
                        </p>

                        <p align="justify">

                            <img src="images/pdf2.gif" /><a href="relatorios/ParticipantesPDF.php" target="_blank">Emitir Listagem de Participantes (Pagos)</a><br />

                        </p>

                         <p align="justify">

                            <img src="images/pdf2.gif" /><a href="relatorios/relatorioParticipantes.php" target="_blank">Emitir Listagem de Participantes (Detalhado)</a><br />

                        </p>

                        <p align="justify">

                            <img src="images/pdf2.gif" /><a href="relatorios/ParticipantesFrequenciaPDF.php" target="_blank">Emitir Listagem de Participantes (Frequência nas Palestras)</a><br />

                        </p>
                        

                        <p align="justify">
                            <form action="participantes.php" method="post" name="filtro">
                                Ordenar listagem por:&nbsp;&nbsp;
                                <select name="pOrderBy" style="width:150px">
                                    <option value="nome" <? if ($order == "nome") {
                            echo 'selected="selected"';
                        } ?> >Nome</option>
                                    <option value="datainscricao" <? if ($order == "datainscricao") {
                            echo 'selected="selected"';
                        } ?>>Data de Inscrição (Crescente)</option>
                                    <option value="datainscricao desc" <? if ($order == "datainscricao desc") {
                            echo 'selected="selected"';
                        } ?>>Data de Inscrição (Decrescente)</option>
                                </select>
                                &nbsp;&nbsp;
                                <input type="submit" value="OK" />
                            </form>

                            <p align="justify">
                                <b>Obs: Os nomes em vermelho indicam os participantes que não efetuaram pagamento em até 5 dias desde a data da inscrição.</b>	               </p>

                            <table width="525" border="1" bordercolor="#CCCCCC">

                                <tr>
                                    <th width="37" align="center">N.</th>
                                    <th width="37" align="center">Cod.</th>
                                    <th width="124" align="center">Nome</th>
                                    <th width="45" align="center">CPF</th>
                                    <th width="77" align="center">Inscrição</th>
                                    <th width="57" align="center">Pago</th>
                                    <th width="145" align="center">Operações</th>
                                </tr>

                                <? while ($dadosPart = mysql_fetch_array($queryPart)) {
 ?>
                                <?
                                    $cor = '#555';
                                    $data_inscricao = strtotime($dadosPart['datainscricao']) + ($dias_de_prazo_para_pagamento * 86400);

                                    if ($data_inscricao < $hoje) {
                                        if (($dadosPart["pago"] == "N") && ($dadosPart["isento"] == "N")) {
                                            $cor = 'Red';
                                        }
                                    }
                                ?>
                                    <tr>
                                        <td align="center"><? echo $i;
                                    $i++; ?></td>
                                        <td align="center"><? echo $dadosPart["id"] ?></td>
                                    <td align="center"><a href="detalhes_participante.php?idp=<? echo $dadosPart["id"] ?>" ><font color='<? echo $cor ?>'><? echo $dadosPart["nome"]; ?></font></a></td>

                                    <td align="center">
                                        <?
                                        $dadosPart["cpf"] = str_replace(".", "", $dadosPart["cpf"]);
                                        $dadosPart["cpf"] = str_replace("-", "", $dadosPart["cpf"]);
                                        echo $dadosPart["cpf"];
                                        ?>
                                    </td>
                                    <td>
<? echo date('d/m/Y H:i:s', strtotime($dadosPart["datainscricao"])); ?>                            
                                    </td>

                                    <td>
                                        <div id="<? echo "pago_" . $dadosPart["id"]; ?>" name="<? echo "pago_" . $dadosPart["id"]; ?>">
                                            <?
                                            if ($dadosPart["pago"] == "S") {
                                                echo "<font color='Green'><b>SIM</b></font>";
                                            } else {
                                                if ($dadosPart["isento"] == "S")
                                                    echo "<font color='Green'><b>ISENTO</b></font>";
                                                else
                                                    echo "<font color='Red'><b>NÃO</b></font>";
                                            }
                                            ?>
                                        </div>
                                    </td>
                                    <td>
<? if ($dadosComissao["permissao"] > 10) { ?>
                                                <a href="editarInscricao.php?idp=<? echo $dadosPart[0]; ?>" style="text-align:center"><img src='images/edit.gif' border='0' style="padding:0; margin:0;" alt="Editar Inscrição" title="Editar Inscrição"></a>

                                                <a href="javascript: abrir('excluir_participante.php?idp=<? echo $dadosPart[0] ?>')"><img src='images/excluir.gif' border='0' width="9" height="9" alt="Excluir Inscrição" title="Excluir Inscrição"></a>

                                                <a href="../autoatendimento/crachas/EmitirCrachas.php?id=<? echo $dadosPart["id"]; ?>" target="_blank"><img src='images/impressora.gif' border='0' width="25" height="25" style="padding:0 0 0 0" alt="Crachá" title="Crachá"></a>

                                                <a href="certificados/certificadoParticipante.php?id=<? echo $dadosPart["id"]; ?>" target="_blank"><img src="images/ico_pdf.gif" width="15" height="15" border="0" alt="Certificado" title="Certificado" /></a>

                                                <a href="javascript:atualizarDataPagamento(<? echo $dadosPart["id"].",'I'"; ?>); " ><img src="images/validar2.png" width="15" height="15" border="0" alt="Isentar Pagamento" title="Isentar Pagamento" /></a>
<? } ?>
                                            <a href="javascript:atualizarDataPagamento(<? echo $dadosPart["id"].",'N'"; ?>); " ><img src="images/npago.jpg" width="15" height="15" border="0" alt="Cancelar Pagamento" title="Cancelar Pagamento" /></a> <br/>
                                            Dt. Pagto.<br/>
                                            <input size="10" type="text" name="<? echo "dtpgto_" . $dadosPart["id"]; ?>" id="<? echo "dtpgto_" . $dadosPart["id"]; ?>" value="<? if ($dadosPart["datapagamento"] != "0000-00-00 00:00:00")
                                                echo date('d/m/Y H:i:s', strtotime($dadosPart["datapagamento"])); ?>" />&nbsp;<button onclick="javascript:atualizarDataPagamento(<? echo $dadosPart["id"].",'S'"; ?>)" value="OK" title="OK" >OK</button>



                                        </td>
                                    </tr>

<? } ?>


                                    </table>
                                    </form>
                                </p>
                            </div>
                        </div>

                        <!-- content-wrap ends here -->
                    </div></div>

                <!-- wrap ends here -->
                </div>
<? include 'rodape.php'; ?>
    </body>
</html>

