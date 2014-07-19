<?php

if (file_exists('init.php'))
{
	require_once 'init.php';
}
else
{
	exit('N�o foi poss�vel encontrar o arquivo de inicializa��o');
}


$acao = isset($_GET['acao']) ? $_GET['acao'] : FALSE;

header('Content-Type: application/xml');

$xml = "<?xml version='1.0' encoding='iso-8859-1'?>\r\n";

include '../banco.php';

switch ($acao)
{
	case 'buscaEstados':
	    buscaEstados();
	    break;
	case 'buscaCidades':
	    buscaCidades();
	    break;
}


function buscaEstados()
{
	global $xml;
	
	$xml .= '<estados>';
			
	$sql = mysql_query('SELECT * FROM c2013_estados Order By nome ASC');
	
	while ($f = mysql_fetch_array($sql))
	{
		$xml .= '  <estado>';
		$xml .= '    <id>' . $f["id"] . '</id>';
		$xml .= '    <sigla>' . $f["sigla"] . '</sigla>';
		$xml .= '    <nome>' . $f["nome"] . '</nome>';
		$xml .= '  </estado>';
	}

	$xml .= '</estados>';
	echo $xml;
}



function buscaCidades()
{
	$uf = isset($_GET['uf']) ? (int)$_GET['uf'] : 1;
	
	global $xml;
	
	$xml .= '<cidades>';
	
	$sql =  mysql_query('Select id, nome From c2013_cidades Where id_uf = ' . $uf . ' Order By nome ASC');
	
	while ($f = mysql_fetch_array($sql))
	{
		$xml .= '  <cidade>';
		$xml .= '    <id>' . $f["id"] . '</id>';
		$xml .= '    <nome>' . $f["nome"] . '</nome>';
		$xml .= '  </cidade>';
	}
	
		
	$xml .= '</cidades>';
	echo $xml;
}


?>