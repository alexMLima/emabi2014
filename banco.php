<?php
$host = "localhost";
$base = "dbi";
$user = "root";
$pass = "root";

$con  = mysql_pconnect($host,$user,$pass) or die("erro na conexao com o banco");
        mysql_select_db($base) or die("erro na conexao com a database");
        mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');

?>