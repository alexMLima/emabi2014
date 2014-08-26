<?php
date_default_timezone_set('America/Sao_Paulo');

$host = "localhost";
$base = "emabi";
$user = "layou503_master";//"dbi"; 
$pass = "lay**09089816";//"dbi7002";

var_dump($host);
var_dump($user);
var_dump($pass);
exit();

$con  = mysql_pconnect($host,$user,$pass) or die("erro na conexão com o banco");
        mysql_select_db($base) or die("erro na conexão com a database");

?>