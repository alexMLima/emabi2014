<?php
$host = "localhost";
$base = "dbi";
$user = "root";
$pass = "root";

$con  = mysql_pconnect($host,$user,$pass) or die("erro na conex�o com o banco");
        mysql_select_db($base) or die("erro na conex�o com a database");

?>