<?
header('Content-Type: text/html; charset=utf-8');

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
		$title = 'Minicursos';
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
                	<div class="minicursos"> 
						<?
						include_once 'banco.php';
						include_once 'minicursos/Minicursos.class.php';
						include_once 'ministrantes/Ministrantes.class.php';
						$objMinicursos = new Minicursos;
						$objMinistrantes = new Ministrantes;
                        ?>
                        <div style="clear: both;">&nbsp;</div>
<!--                        <h3>Baixe a lista de minicursos</h3>
                        <p><a href="">Lista de minicursos</a>-->
                        <?
                            $i = 1;
                            while ($i <= 3) {
                        ?>
                        <div class="entry">
                            <?
                            switch($i){
                                case "1":
                                    echo "<p><h3>Grupo 1 - 04/09 e 05/09 MANHÃ - 08:00 as 12:00</h3></p>";
                                    break;
                                case "2":
                                    echo "<p><h3>Grupo 2 - 04/09 e 05/09 TARDE - 13:30 as 17:30</h3></p>";
                                    break;
                                case "3":
                                    echo "<p><h3>Grupo 3 - 04/09 e 05/09 NOITE - 19:00 as 23:00</h3></p>";
                                    break;
								
                            }

                            
                            $qryMinicursos = $objMinicursos->PesquisarPorGrupo($i);

                            while ($minicurso = mysql_fetch_array($qryMinicursos)) {
                                $nomeMinistrantes = "";
                                $qryMinistrantes = $objMinistrantes->PesquisarMinistrantesdoMinicurso($minicurso["id"]);
                                while ($ministrantes = mysql_fetch_array($qryMinistrantes)) {
                                    $nomeMinistrantes = $nomeMinistrantes . "<b>" . $ministrantes["titulacao"] . " " . $ministrantes["nome"] . "</b>";
                                    if ($ministrantes["complemento"] != "") {
                                        $nomeMinistrantes .= " (" . $ministrantes["complemento"] . ")";
                                    }

                                    $nomeMinistrantes .="<br />";
                                }
                            ?>
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="99">Minicurso</th>
                                        <td width="347"><? echo $minicurso["nminicurso"] . " - " . $minicurso["titulo"]; ?></td>
                                    </tr>
                                <? if ($minicurso["observacao"] != "") {
                                ?>
                                    <tr>
                                        <th>Observação</th>
                                        <td><? echo $minicurso["observacao"]; ?></td>
                                    </tr>
                                <? } ?>
                                <tr>
                                    <th>Ministrante(s)</th>
                                    <td><? echo $nomeMinistrantes; ?></td>
                                </tr>
                                <tr>
                                    <th>Total de Vagas</th>
                                    <td>
                                        <? echo '<strong class="label label-success">' . $minicurso["nvagas"] . '</strong>'; ?>
                                        <? if ($minicurso["nvagas"] - $minicurso["nvagaspreenc"] <= 0) {
                                        ?>
                                            <strong class="label label-important"> (Vagas Esgotadas) </strong>
                                        <?
										} else {
										echo " <span class='label label-warning'>" . ($minicurso["nvagas"] - $minicurso["nvagaspreenc"]) . " Vagas Disponíveis</span>";
										}
                                        ?>
                                    </td>
                                </tr>
                                

                            </table>
                            <br/>
                            <? } ?>

                                </div>
                        <? $i++;
									}
 ?>
                     </div>
                </div>
            </div>
        </div>
    </div>
    <?
		include "includes/rodape.php";
	?>
</body>
</html>
