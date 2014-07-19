<?php
$host = "localhost";
$base = "dbi";
$user = "dbi";
$pass = "dbi7002";

$con  = mysql_pconnect($host,$user,$pass) or die("erro na conex�o com o banco");
        mysql_select_db($base) or die("erro na conex�o com a database");

?>