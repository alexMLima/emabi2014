<?php
date_default_timezone_set ('America/Sao_Paulo');
	@session_start();
	if ($_SESSION['yes'] != 1){
	   ?>
	   	<script language="javascript" type="text/javascript">
				alert("<? echo "Login/Senha inválidos!"; ?>");
		</script>
		<?
        echo "<META HTTP-EQUIV='REFRESH'CONTENT=\"0; URL=index.php\">";
  		exit();
    }
?>
