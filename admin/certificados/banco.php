<?php
$host = "localhost";
$base = "ccs";
$user = "ccs";
$pass = "ccs7002";
$con  = mysql_pconnect($host,$user,$pass) or die("erro na conex�o com o banco");
        mysql_select_db($base) or die("erro na conex�o com a database");
?>
