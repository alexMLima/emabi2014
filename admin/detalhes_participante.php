<? include 'seguranca.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>

        <link rel="stylesheet" href="images/PixelGreen.css" type="text/css" />

        <title><? include "../titulo.php"; ?></title>

    </head>

    <body>
        <!-- wrap starts here -->
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
                        <?
                        include_once '../banco.php';
                        include_once '../inscricao/inscricoes.class.php';
                        include_once '../minicursos/Minicursos.class.php';
                        $idp = $_GET["idp"];

                        $objParticipantes = new Inscricoes;
                        $qryPart = $objParticipantes->pesquisar($idp);
                        $dadosParticipante = mysql_fetch_array($qryPart);
                        $objMinicursos = new Minicursos;
                        $minicursos = $objMinicursos->PesquisarMinicursosdoParticipante($idp);
                        ?>
                        <p align="justify">
                            <a href="participantes.php"><< Voltar</a>
                        </p>

                        <a name="TemplateInfo"></a>
                        <h1>DETALHES DO PARTICIPANTE</h1>

                        <p align="justify">
<?
                        include_once '../estados/Estados.class.php';
                        include_once '../cidades/Cidades.class.php';

                        $objCidades = new Cidades;
                        $objEstados = new Estados;
?>

                            <table width="474" border="1">

                                <tr>
                                    <th>Nome</th>
                                    <td><? echo $dadosParticipante["nome"]; ?></td>
                                </tr>
                                <tr>
                                    <th>Sexo</th>
                                    <td><? echo $dadosParticipante["sexo"]; ?></td>
                                </tr>
                                <tr>
                                            <th>Categoria</th>
                                            <td>
                                                <?
                                                $dadosCategoria = mysql_fetch_array(mysql_query("SELECT descricao FROM c2013_categorias WHERE id = " . $dadosParticipante["categoria"]));
                                                echo $dadosCategoria["descricao"];

                                                if ($dadosParticipante["categoria"] >= 17){
                                                    echo "<br/><br/><a href='../geraComprovante.php?idp=".$dadosParticipante["id"]."'>[Visualizar comprovante anexado]</a><br/><br/>";
                                                }
                                                ?>

                                            </td>
                                        </tr>
                                <tr>
                                    <th>Empresa/Institui��o</th>
                                    <td><? echo $dadosParticipante["empinst"]; ?></td>
                                </tr>
                                <tr>
                                    <th>Cargo/Curso</th>
                                    <td>
<?
                                        echo $dadosParticipante["cargocurso"];
?>                        
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th>CPF</th>
                                    <td><? echo $dadosParticipante["cpf"]; ?></td>
                                </tr>
                                <tr>
                                    <th>RG</th>
                                    <td><? echo $dadosParticipante["rg"]; ?></td>
                                </tr>
                                <tr>
                                    <th>Endere�o</th>
                                    <td><? echo $dadosParticipante["enderecocompleto"]; ?></td>
                                </tr>
                                <tr>
                                    <th>CEP</th>
                                    <td><? echo $dadosParticipante["cep"]; ?></td>
                                </tr>
                                <tr>
                                    <th>Cidade</th>
                                    <td>
<?
                                        $dadosCidade = mysql_fetch_array(mysql_query("SELECT nome, id_uf FROM c2013_cidades WHERE id = " . $dadosParticipante["municipio"]));
                                        echo $dadosCidade["nome"];
?>
                                    </td>
                                </tr>


                                <tr>
                                    <th>Estado</th>
                                    <td>
<?
                                        $dadosEstado = mysql_fetch_array(mysql_query("SELECT nome FROM c2013_estados WHERE id = " . $dadosCidade["id_uf"]));
                                        echo $dadosEstado["nome"];
?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Telefone</th>
                                    <td><? echo $dadosParticipante["telefone"]; ?></td>
                                </tr>

                                <tr>
                                    <th>Celular</th>
                                    <td><? echo $dadosParticipante["celular"]; ?></td>
                                </tr>
                                <tr>
                                    <th>E-mail</th>
                                    <td><? echo $dadosParticipante["email"]; ?></td>
                                </tr>
                               
                                <tr>
                                    <th height="42">Data da inscri��o</th>
                                    <td><? echo date('d/m/Y', strtotime($dadosParticipante["datainscricao"])); ?></td>
                                </tr>
                                <tr>
                                            <th height="42">Pago?</th>
                                            <td>
                                                <?
                                                if ($dadosParticipante["isento"] != "S"){
                                                    if ($dadosParticipante["pago"] == "S")
                                                        echo "Sim";
                                                    else
                                                        echo "Pagamento n�o confirmado no sistema";
                                                }
                                                else
                                                    echo "Inscri��o com pagamento isento";
                                                ?>

                                            </td>
                                        </tr>
                                <tr>
                                    <th>Minicurso(s) selecionado(s)</th>
                                    <td>
<?
                                        while ($dadosmc = mysql_fetch_array($minicursos)) {
                                            echo "<b>Grupo 0" . $dadosmc["grupo"] . ": " . $dadosmc["nminicurso"] . " - " . $dadosmc["titulo"] . "</b><br />" . $dadosmc["diasemana"] . "<br />" . $dadosmc["horario"] . "<br /><br />";
                                        }
?>
                                    </td>
                                </tr>

                            </table>
                        </p>

                        <p align="justify">
                            <a href="participantes.php"><< Voltar</a>
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
