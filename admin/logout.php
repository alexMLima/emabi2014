<?php
session_start();
unset($HTTP_SESSION_VARS['id']);
unset($HTTP_SESSION_VARS['nome']);  
session_destroy();
echo "<meta http-equiv=\"REFRESH\" content=\"0; url=index.php\">"
?>
