<?php
$host = "localhost";
$base = "dbi";
$user = "dbi";//"dbi";
$pass = "dbi7002";//"dbi7002";

$con  = mysql_pconnect($host,$user,$pass) or die("erro na conexão com o banco");
        mysql_select_db($base) or die("erro na conexão com a database");

?>