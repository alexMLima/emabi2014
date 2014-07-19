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
		$title = 'Comprovante Inscri&ccedil;&atilde;o';
		include "includes/titulo-topo.php";
	?>
    <div id="content">
    	<div class="container">
            <div class="inner row">
            	<div id="sidebar" class="span3">
					<? include "includes/menu_lateral.php"; ?>
					<? include 'validarInscricao.php'; ?>
				</div>
                <div class="span9">
                	<div id="inscricao">
                    	<div class="entry">
                                <h2 class="title"><a href="#">Comprovante de Inscri&ccedil;&atilde;o</a></h2>
								<div class="alert alert-error">
                                        <p><h4>ATEN&Ccedil;&Atilde;O</h4>Guardar o comprovante de pagamento!! E caso os inscritos nao tiverem o pagamento confirmado em dois dias uteis. Enviar o comprovante do boleto para o email <b> inscricoes.emabi@gmail.com </b>  .</p>
                                    </div>
                                <div style="clear: both;">&nbsp;</div>
                                <div class="entry">
                                    <p>
                                        <b>PARABÉNS!</b> Sua Inscri&ccedil;&atilde;o como visitante foi efetuada com sucesso! Confira abaixo os dados de sua Inscri&ccedil;&atilde;o.<br><br>
                                        <font color="#CC0000"><b>IMPORTANTE:</b></font> IMPRIMA ESTE COMPROVANTE E GUARDE COM VOC&Ecirc;,PARA QUE NO CASO DE ALGUM PROBLEMA, ELE SER APRESENTADO JUNTO A COMISS&Atilde;O ORGANIZADORA DO EVENTO.
                                    </p>
                                    <p align="justify">
                                        <?
										include_once 'banco.php';
										include_once 'inscricao/Inscricoes.class.php';
										include_once 'minicursos/Minicursos.class.php';

										$id = $_GET["cod"];

										$objParticipantes = new Inscricoes;
										$qryPart = $objParticipantes -> pesquisar($id);
										$dadosParticipante = mysql_fetch_array($qryPart);

										$objMinicursos = new Minicursos;
										$minicursos = $objMinicursos -> PesquisarMinicursosdoParticipante($id);
                                        ?>
                                    <table>
                                        <tr>
                                            <th>Nome</th>
                                            <td><? echo $dadosParticipante["nome"]; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Sexo</th>
                                            <td><? echo $dadosParticipante["sexo"]; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Empresa/Institui&ccedil;&atilde;o</th>
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
                                            <th height="42">Data da inscri&ccedil;&atilde;o</th>
                                            <td><? echo date('d/m/Y', strtotime($dadosParticipante["datainscricao"])); ?></td>
                                        </tr>
                                        <tr>
                                            <th height="42">Pago?</th>
                                            <td>
                                                <?
												if ($dadosParticipante["isento"] != "S") {
													if ($dadosParticipante["pago"] == "S")
														echo "Sim";
													else
														echo "Pagamento n&atilde;o confirmado no sistema";
												} else
													echo "Inscri&ccedil;&atilde;o com pagamento isento";
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
                                        <tr>
                                        	<td>
		                            			
                                        		<?php
												echo "<a href='" . htmlspecialchars("http://www.dbi.uem.br/emabi2013/boleto/boleto_caixa_teste.php?cod=" . urlencode($id)) . "'>\n";
													?> Clique aqui para emitir o Boleto Banc&aacute;rio no EMABI 2013</a>
                                        	</td>
                                        </tr>
                                    </table>
                                    </p>
                                     <p>
                                     	<?php
										echo "<a href='" . htmlspecialchars("emabi2013/boleto/boleto_caixa_teste.php?cod=" . urlencode($id)) . "'>\n";
													?>
		                        	</p>
                                </div>
                            </div>                            
                            <div style="clear: both;">&nbsp;</div>
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
</html>
