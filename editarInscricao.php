<?
//exit('Não esta liberado ainda para editar somente apartir do dia 22/05/2013');
if (file_exists('scripts/init.php')) {
	require_once 'scripts/init.php';
} else {
	exit('N�o foi poss�vel encontrar o arquivo de inicializa��o');
}
?>
<?
include "includes/head.php";
?>
<body onload="javascript:buscaEstados()">
	<?
	include "includes/header.php";
	?>
	<?
	include "includes/banner.php";
	?>
	<?
	$title = 'Instru&ccedil;&otilde;es para Inscri&ccedil;&atilde;o';
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
		<h2 class="table table-bordered">Editar Inscri&ccedil;&atilde;o</h2>
                                    <p>
                                        Os campos com <font color="#FF0000">*</font> s�o de preenchimento obrigat�rio.
                                    </p>

                                    <form action="editarInscricao.php?cod=1" method="post" name="inscricao"  enctype="multipart/form-data">
                                        <table>
                                            <? if ($mensagem != 'OK') {
 			?>
                                                <tr>
                                                    <td colspan="2" align="center">
    									ALERTAS
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <font color="#CC0000"><? echo $mensagem; ?></font>
                                                    <br />
                                                </td>
                                            </tr>

<? } ?>
                                            <tr>
                                                <th><font color="#FF0000">*</font> Nome:</th>
                                                <td><input type="text" name="tbNome" size="30" value="<?
												if ($tbNome) {
													echo $tbNome;
												}
											?>" /></td>
                                            </tr>
                                            <tr>
                                                <th><font color="#FF0000">*</font> Sexo</th>
                                                <td>
                                                    <select name="slSexo">
                                                        <option value="0" selected="selected">--Selecione uma op��o--</option>
                                                        <option value="Masculino" <?
														if ($slSexo == "Masculino") {
															echo "selected='selected'";
														}
													?> >Masculino</option>
                                                        <option value="Feminino" <?
														if ($slSexo == "Feminino") {
															echo "selected='selected'";
														}
													?> >Feminino</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th><font color="#FF0000">*</font> Categoria:</th>
                                                <td>
                                                 <select name="slCategoria">
                                                        <option value="0" selected="selected">--Selecione uma op��o--</option>
                                                    <?
                                                                                        $qryCat = mysql_query("SELECT * FROM c2013_categorias order by codigo");
                                                                                        while ($categorias = mysql_fetch_array($qryCat)){
                                                                                        ?>
                                                        <option value="<? echo $categorias["id"]; ?>" <?
														if ($categorias["id"] == $slCategoria) { echo "selected='selected'";
														}
 ?> ><? echo $categorias["descricao"]; ?></option>
                                                    <? } ?>
                                                </select>
                                                </td>
                                            </tr>
                                           
                                            <tr>
                                                <th><font color="#FF0000" style="font-size:11px">*</font><span style="font-size:11px">Empresa/Institui��o:</span></th>
                                                <td><input type="text" name="tbEmpInst" size="30"  value="<?
												if ($tbEmpInst) {
													echo $tbEmpInst;
												}
											?>"  /></td>
                                            </tr>
                                            <tr>
                                                <th>Cargo/Curso:</th>
                                                <td><input type="text" name="tbCargoCurso" size="30"  value="<?
												if ($tbCargoCurso) {
													echo $tbCargoCurso;
												}
											?>"  />
                                                </td>
                                            </tr>
                                            <tr>
                                                <th><font color="#FF0000">*</font> CPF:</th>
                                                <td><input type="text" name="tbCpf" id="cpf" size="30" onKeyUp="mascaraHellas(this.value, this.id, '###.###.###-##', event)" value="<?
												if ($tbCpf) {
													echo $tbCpf;
												}
											?>" /><br />
                                                    Digite apenas os n�meros</td>
                                            </tr>


                                            <tr>
                                                <th>RG:</th>
                                                <td><input type="text" name="tbRg" size="30"  value="<?
												if ($tbRg) {
													echo $tbRg;
												}
 ?>"  /></td>
                                            </tr>
                                            <tr>
                                                <th><font color="#FF0000">*</font> Endere�o Completo:</th>
                                                <td><input type="text" name="tbEndereco" size="30" value="<?
												if ($tbEndereco) {
													echo $tbEndereco;
												}
											?>" /></td>
                                            </tr>
                                            <tr>
                                                <th>Cidade/Estado</th>
                                                <td>
                                                    <b>
<?
$municipio = mysql_fetch_array(mysql_query("SELECT nome, id_uf from c2013_cidades where id = '$slCidade'"));
$estado = mysql_fetch_array(mysql_query("SELECT nome from c2013_estados where id = " . $municipio["id_uf"]));
echo $municipio['nome'] . " - " . $estado['nome'];
?>
                                                    </b>
                                                    <br />
                                                    Para alterar a cidade/estado, selecione abaixo:
                                                </td>
                                            </tr>
                                            <tr>
                                                <th><font color="#FF0000">*</font> Estado:</th>
                                                <td><select name="uf" id="uf" onchange="buscaCidades(this.value)"></select></td>
                                            </tr>
                                            <tr>
                                                <th><font color="#FF0000">*</font> Cidade:</th>
                                                <td><select name="cidade" id="cidade">
                                                        <option value="">Primeiramente, selecione o estado</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th><font color="#FF0000">*</font> CEP:</th>
                                                <td><input type="text" name="tbCep" size="30" id="cep" onKeyUp="mascaraHellas(this.value, this.id, '#####-###', event)" value="<?
												if ($tbCep) {
													echo $tbCep;
												}
											?>" /><br />
                                                    Digite apenas os n�meros</td>
                                            </tr>
                                            <tr>
                                                <th><font color="#FF0000">*</font> Telefone:</th>
                                                <td><input type="text" name="tbTelefone" size="30" value="<?
												if ($tbTelefone) {
													echo $tbTelefone;
												}
											?>" id="telefone" onKeyUp="mascaraHellas(this.value, this.id, '(##)####-####', event)" /><br />
                                                    DDD + N�mero - Digite apenas os n�meros</td>
                                            </tr>

                                            <tr>
                                                <th>Celular:</th>
                                                <td><input type="text" name="tbCelular" size="30" value="<?
												if ($tbCelular) {
													echo $tbCelular;
												}
 ?>" id="telefone2" onKeyUp="mascaraHellas(this.value, this.id, '(##)####-####', event)" /><br />
                                                                    DDD + N�mero - Digite apenas os n�meros</td>
                                                            </tr>
                                                            <tr>
                                                                <th><font color="#FF0000">*</font> E-mail:</th>
                                                                <td><input type="text" name="tbEmail" size="30" value="<?
																if ($tbEmail) {
																	echo $tbEmail;
																}
															?>" /></td>
                                                            </tr>


                                                        </table>
                                                        <? if ($pago == "S" || $isento == "S") { ?>

                                                        <h2>Minicursos</h2>

                                            <?
                                                        $i = 1;
                                                        while ($i <= 3) {
                                                            $objMinicursos = new Minicursos;
                                                            $qryMinicursos = $objMinicursos->PesquisarPorGrupo($i);
                                                            $minicursos = mysql_fetch_array($qryMinicursos)
                                            ?>
                                                        <table border="1" bordercolor="#CCCCCC">
                                                            <tr>
                                                                <td colspan="3">
                                                                    <b>Grupo 0<? echo $i . " - " . $minicursos['diasemana'] . " - " . $minicursos['horario']; ?></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="radio" name="<? echo "g" . $i; ?>" checked="checked" value="0" /></td>
                                                                <td> </td>
                                                                <td>Nenhum minicurso</td>
                                                            </tr>
                                                    <?
                                                            $qryMinicursos = $objMinicursos->PesquisarPorGrupo($i);

                                                            switch ($i) {
                                                                case 1:
                                                                    $gminicurso = $g1;
                                                                    break;
                                                                case 2:
                                                                    $gminicurso = $g2;
                                                                    break;
                                                                case 3:
                                                                    $gminicurso = $g3;
                                                                    break;
                                                            }

                                                            while ($minicursos = mysql_fetch_array($qryMinicursos)) {
                                                    ?>

                                                        <tr>
                                                            <td>
                                                    <? if ($minicursos["nvagas"] - $minicursos["nvagaspreenc"] > 0) {
                                                    ?>
                                                                    <input type="radio" name="<? echo "g" . $i; ?>" value="<? echo $minicursos['id']; ?>" <?
																	if ($minicursos['id'] == $gminicurso) {
																		echo 'checked = "checked" ';
																	}
                                                    ?> />

<? } else { ?>
                                                                                <img src="images/exc.gif" />
<? } ?>
                                                                        </td>
                                                                        <td><? echo $minicursos['nminicurso']; ?></td>
                                                                        <td>
<?
                                                                echo "<b>" . $minicursos['titulo'] . "</b>";

                                                                if ($minicursos["nvagas"] - $minicursos["nvagaspreenc"] <= 0) {
?>
                                                                                <font color="#FF0000"> (Esgotada) </font>
<?
} else {
echo " (" . ($minicursos["nvagas"] - $minicursos["nvagaspreenc"]) . " Vaga(s) )";
}
?>
                                                                        </td>
                                                                    </tr>
<? } ?>
                                                                </table>
<? $i++;
																	}
 ?>
                                                        <? } ?>
                                                            <div align="center">
                                                                <input type="submit" value="Submeter" />
                                                            </div>                    
                                                        </form>

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
    <?
	include "includes/rodape.php";
	?>
</body>
