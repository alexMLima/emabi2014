<? include 'seguranca.php';

if (file_exists('scripts/init.php'))
{
	require_once 'scripts/init.php';
}
else
{
	exit('Não foi possível encontrar o arquivo de inicialização');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<meta name="Description" content="Information architecture, Web Design, Web Standards." />
<meta name="Keywords" content="your, keywords" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="Author" content="Erwin Aligam - ealigam@gmail.com" />
<meta name="Robots" content="index,follow" />

<link rel="stylesheet" href="images/PixelGreen.css" type="text/css" />

<script type="text/javascript" src="scripts/ajax.js"></script>
<script type="text/javascript" src="scripts/funcoes.js"></script>	

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
				$op = $_GET["op"];
				switch($op){
					case "1":
				?>
                <h1>Lista de Participantes</h1>
                <p align="justify">
                Obs: Preencher a data no formato <u>dd/mm/aaaa</u>.
                <form action="relatorios/relatorioParticipantes.php" method="post" name="relat" target="_blank">
                Emitir listagens dos participantes inscritos a partir do dia:                
                <input type="text" name="tbData" size="15" />
                &nbsp;&nbsp;
                <input type="submit" value="Emitir" />
                </form>                
                </p>
                <?   break;
				    case "2": ?>
                                    
                <h1>Participantes por Município</h1>
                <p align="justify">
                Selecione o município desejado e clique em "Emitir". Caso queira a listagem completa por município, clique <a href="relatorios/relatorioParticipantesPorCidade.php?cod=t" target="_blank">[AQUI]</a>
                <form action="relatorios/relatorioParticipantesPorCidade.php?cod=s" method="post" name="relat" target="_blank">
                <table width="100%">
                	<tr>
                    	<td>Estado:</td>
                        <td><select name="uf" id="uf" onchange="buscaCidades(this.value)"></select></td> 
                    </tr>
                    <tr>
                    	<td>Cidade:</td>
                        <td> <select name="cidade" id="cidade">
                            <option value="0">Primeiramente, selecione o estado</option>
                        </select></td> 
                    </tr>
                    <tr>
                    	<td colspan="2" align="center"><input type="submit" value="Emitir" /></td>                      
                    </tr>                           
                
                </table>
                </form>
                </p>
                <?   break;
				    case "3": ?>
                <h1>Participantes confirmados por dia</h1>
                <p align="justify">
                Clique no link abaixo para emitir um relatório com dados referentes a entrega de materiais e confirmação de presença dos participantes. 
                </p>
                <p align="justify">
                <img src="images/ico_pdf.gif" width="20"m height="20" /><a href="relatorios/relatorioConfirmacoes.php" target="_blank">&nbsp;Emitir listagens dos dados de confirmação dos participantes</a>
                </p>
                <p align="justify">
                <img src="images/ico_pdf.gif" width="20"m height="20" /><a href="relatorios/PalestrasPDF.php" target="_blank">&nbsp;Emitir relatório geral com o total de participantes confirmados por palestra.</a>
                </p>
                <?   break;
				    case "4": ?>
                 <h1>Total de participantes por dia</h1>
                <p align="justify">
                Clique no link abaixo para emitir um relatório geral com o total de participantes confirmados por dia.
                </p>
                <p align="justify">
                <img src="images/ico_pdf.gif" width="20"m height="20" /><a href="relatorios/relatorioGeral.php" target="_blank">&nbsp;Emitir relatório geral com o total de participantes confirmados por dia.</a>
                </p>
                
                <?  } ?>
		  </div>					
		</div>					
		
	<!-- content-wrap ends here -->		
	</div></div>
	
<!-- wrap ends here -->
</div>
<? include 'rodape.php'; ?>
</body>
</html>
