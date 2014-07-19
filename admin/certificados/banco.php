<?php
$host = "localhost";
$base = "ccs";
$user = "ccs";
$pass = "ccs7002";
$con  = mysql_pconnect($host,$user,$pass) or die("erro na conexão com o banco");
        mysql_select_db($base) or die("erro na conexão com a database");
?>
