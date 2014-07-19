<?php
/*
 * Script adaptado a partir deste:
 * http://forum.imasters.uol.com.br/index.php?showtopic=202215
*/

//evita acesso direto ao init.php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__))
    exit('Este arquivo n�o pode ser acessado diretamente.');

date_default_timezone_set('America/Sao_Paulo'); 
    
	
	
//if (!(version_compare(phpversion(), "5.0", ">=")))
   //exit("O sistema requer PHP vers�o 5.0 ou superior.");
    
/*
$prefix = (PHP_SHLIB_SUFFIX == 'dll') ? 'php_' : '';

if (!extension_loaded('mysqli'))
{
     if (function_exists('dl'))
	 {
         if (!dl($prefix . 'mysqli.' . PHP_SHLIB_SUFFIX))
             exit("N�o foi poss�vel carregar a extens�o MySQLi.");
         
    }
}

*/

if (!(defined('BARRA')))
	    define('BARRA', DIRECTORY_SEPARATOR);   


if(function_exists('ini_set'))
{
    ini_set('error_reporting', E_ALL - E_WARNING^E_NOTICE);
    ini_set('display_errors', '1');
}

@set_magic_quotes_runtime(FALSE);


$constantes = array(
                    //dados para conex�o ao servidor MySQL
					"BD_SERVIDOR" => "localhost",
					"BD_USUARIO" => "dbi",
					"BD_SENHA" => "dbi7002",
					"BD_NOME" => "dbi"
					);
   
$nome_const = array_keys($constantes);
$valor_const = array_values($constantes);
 
for($i = 0; $i < count($nome_const); $i++)
{
    if (!(defined($nome_const[$i])))
        define($nome_const[$i], $valor_const[$i]);
}
include "includes/config.php";


function printR( $var ){
	echo '<pre>'.print_r( $var, true ).'</pre>';
	exit();	
}

function getBuscaCpf( $code ){
	require "buscaporcpf.php";
}


?>