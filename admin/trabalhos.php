<? include 'seguranca.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<link rel="stylesheet" href="images/PixelGreen.css" type="text/css" />
<script type="text/javascript" src="js/ajaxInit.js"></script>
<script type="text/javascript" src="js/enviarCartaAceite.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/confirmaExclusao.js"></script>
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
                                <?
                                
                                $cat = $_GET["cat"];


                                if ($cat == "A")
                                    $titulo = "Trabalhos Completos (Artigos)";
                                else
                                    $titulo = "Resumos";

                                ?>
                                <h1><? echo $titulo; ?></h1>

                                <?
				include_once '../banco.php';
                                include_once '../trabalhos/Trabalhos.class.php';
				include_once '../situacao/Situacoes.class.php';
                                include_once '../areas_conhecimento/AreasConhecimento.class.php';
                                include_once '../comissao/Comissoes.class.php';
				
				$objTrabalhos = new Trabalhos;
				
				if ($_SESSION["permissao"] > 10){ 
					$qryTrabalhos = $objTrabalhos->SelecionarTrabalhosdoFiltro($_POST["tbTitulo"],$_POST["tbDataEnvio"],$_POST["tbAutor"],$_POST["tbCoautor"],$_POST["slAvaliador"],$_POST["slSituacao"],$_POST["slArea"],$_POST["cbReenviado"],$cat);
				}
				else{
					$qryTrabalhos = $objTrabalhos->PesquisarTrabalhodaCategoriaeAvaliador($cat,$_SESSION["id"]);
				}
				
				
				$objSituacoes = new Situacoes;
				$objArea = new AreasConhecimento;
                                $numTrabalhos = mysql_num_rows($qryTrabalhos);
                                if ($_SESSION["permissao"] > 10){
                                ?>

                                <p align="justify">
                                    <form action="trabalhos.php?cat=<? echo $cat; ?>" method="post" name="filtro">
                                        <table>
                                            <tr>
                                                <td colspan="2">
                                                    <b>Filtro</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Título:<br/>
                                                    <input type="text" name="tbTitulo" size="40" />
                                                </td>
                                                <td>Data Envio (A partir de):<br/>
                                                <input type="text" name="tbDataEnvio" size="15" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Autor:<br/>
                                                    <input type="text" name="tbAutor" size="40" />
                                                </td>
                                                <td>Co-autor:<br/>
                                                <input type="text" name="tbCoautor" size="30" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Avaliador: <br/>
                                                    <select name="slAvaliador">
                                                       <option value="" >--Selecione um avaliador--</option>
                                                       <?
                                                      $objComissoes = new Comissoes;
                                                      $qryAval = $objComissoes->PesquisarAvaliadores();
                                                      while($avaliadores = mysql_fetch_array($qryAval)){ ?>
                                                        <option value="<? echo $avaliadores['id']; ?>" ><? echo $avaliadores['nome'] ?></option>
                                                      <? } ?>
                                                     </select>
                                                </td>
                                                <td>
                                                     Situação: <br/>
                                                    <select name="slSituacao">
                                                       <option value="" >--Selecione uma situação--</option>
                                                       <?
                                                      $qrySituacoes = $objSituacoes->Pesquisar();
                                                      while($situacoes = mysql_fetch_array($qrySituacoes)){ ?>
                                                        <option value="<? echo $situacoes['id']; ?>" ><? echo $situacoes['descricao'] ?></option>
                                                      <? } ?>
                                                     </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                     Área: <br/>
                                                    <select name="slArea">
                                                       <option value="" >--Selecione uma área--</option>
                                                       <?
                                                      $qryArea = $objArea->Pesquisar();
                                                      while($areas = mysql_fetch_array($qryArea)){ ?>
                                                        <option value="<? echo $areas['id']; ?>" ><? if (strlen($areas['descricao']) > 35) echo substr($areas['descricao'], 0, 35)."..."; else echo $areas['descricao']; ?></option>
                                                      <? } ?>
                                                     </select>
                                                </td>
                                                <td>
                                                    <br/><input type="checkbox" name="cbReenviado" value="S"></input>&nbsp;Trabalho Reenviado
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" align="center">
                                                    <br/>
                                                    <input type="submit" value="Filtrar"></input>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </p>
                                <? } ?>
                                <p align="justify">
                                  <?  if ($numTrabalhos > 0){ ?>

                                    <table width="555" border="1" bordercolor="#CCCCCC">

                                    <tr>
                                      <th width="10" align="center">N.</th>
                                      <th width="141" align="center">Título</th>
                                      <th width="55" align="center">Área</th>
                                      <th width="77" align="center">Av. 01</th>
                                      <th width="57" align="center">Av. 02</th>
                                      <th width="30" align="center">Reenv.?</th>
                                      <th width="30" align="center">Detalhes</th>
                                    </tr>
                                    <?
                                    $i = 1;
                                    while($dadosTrabalho = mysql_fetch_array($qryTrabalhos)){ ?>

                                    <?
                                      $situacao01 = mysql_fetch_array($objSituacoes->PesquisarPorid($dadosTrabalho["situacao"]));
                                      $situacao02 = mysql_fetch_array($objSituacoes->PesquisarPorid($dadosTrabalho["situacao02"]));
                                      $areaTrabalho = mysql_fetch_array($objArea->PesquisarPorid($dadosTrabalho["area_conhecimento"]));

                                      if ($dadosTrabalho["avaliador"]== 0 || $dadosTrabalho["avaliador"]== 999){
                                          $av01 = "<b>Aguardando Avaliador</b>";
                                      }
                                      else{
                                          $dadosAv01 = mysql_fetch_array($objComissoes->pesquisar($dadosTrabalho["avaliador"]));
                                          $av01 = $dadosAv01["nome"];
                                      }

                                      if ($dadosTrabalho["avaliador02"]== 0 || $dadosTrabalho["avaliador02"]== 999){
                                          $av02 = "<b>Aguardando Avaliador</b>";
                                      }
                                      else{
                                          $dadosAv02 = mysql_fetch_array($objComissoes->pesquisar($dadosTrabalho["avaliador02"]));
                                          $av02 = $dadosAv02["nome"];
                                      }
                                    ?>
                                    <tr>
                                      <td width="10" align="center"><? echo $i; $i++; ?></td>
                                      <td width="141" align="center"><a href="../geraTrabalho.php?idt=<? echo $dadosTrabalho["id"] ?>" ><? echo $dadosTrabalho["titulo"]; ?></a></td>
                                      <td width="55" align="center"><? echo $areaTrabalho["descricao"]; ?></td>
                                      <td width="77" align="center"><? echo $situacao01["descricao"]." (".$av01.")"; ?></td>
                                      <td width="57" align="center"><? echo $situacao02["descricao"]." (".$av02.")"; ?></td>
                                      <td width="30" align="center">
                                          <? if ($dadosTrabalho["datareenvio"] != "0000-00-00 00:00:00")
                                                echo "SIM";
                                             else
                                                echo "NÃO";
                                          ?>                                         
                                      </td>
                                      <td width="30" align="center">
                                          <a href="detalhes_trabalho.php?idt=<? echo $dadosTrabalho["id"] ?>" ><img alt="Editar" title="Editar" src="images/edit.gif" /></a>
                                          <? if ($_SESSION["permissao"] > 10){ ?>
                                              <? if ($dadosTrabalho["situacao"] == "3" || $dadosTrabalho["situacao"] == "4" || $dadosTrabalho["situacao02"] == "3" || $dadosTrabalho["situacao02"] == "4") { ?>
                                              
                                              <a href="javascript:enviarCartaAceite(<? echo $dadosTrabalho["id"] ?>);" ><img alt="Enviar Carta de Aceite" title="Enviar Carta de Aceite" src="images/mail.jpg" width="30%" /></a>
                                              <? } ?>
                                          <? } ?>
                                          <div id="<? echo "dataenvio_".$dadosTrabalho["id"] ?>" name="<? echo "dataenvio_".$dadosTrabalho["id"] ?>">
                                            <?
                                            if ($dadosTrabalho["dataenviocartaaceite"] != "0000-00-00 00:00:00"){
                                                echo "<font color='Green'>".date('d/m/Y', strtotime($dadosTrabalho["dataenviocartaaceite"]))."</font>";
                                            }
                                            ?>
                                          </div>
                                         
                                      </td>
                                    </tr>
                                    <? } ?>
                                    </table>
                                <?
                                } else {
                                    echo "Nenhum registro encontrado.";
                                }?>
                                </p>
		  </div>					
		</div>					
		
	<!-- content-wrap ends here -->		
	</div></div>
	
<!-- wrap ends here -->
<? include 'rodape.php'; ?>
</body>
</html>
