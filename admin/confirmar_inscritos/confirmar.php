<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<meta name="Description" content="Information architecture, Web Design, Web Standards." />
<meta name="Keywords" content="your, keywords" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="Author" content="Erwin Aligam - ealigam@gmail.com" />
<meta name="Robots" content="index,follow" />

<link rel="stylesheet" href="../images/PixelGreen.css" type="text/css" />

<title>XXVI SEMANA DE BIOLOGIA – XIII EMABI</title>
<script language="javascript1.2" src="js/mascaraHellas.js"></script>

<script language="javascript">

</script>	
</head>

<body onload="javascript: document.confirmar.tbId.focus()">

<div align="center" style="padding-top:40px">

<p align="center">
<img src="../images/logoadminconf.jpg" />
<br />
<?
$cod = $_GET["cod"];

switch($cod){

	case "1":
	  $titulo = "Confirmar Entrega de Material";
	  break;
	case "2":
	  $titulo = "Confirmar Presença - 29 de agosto";
	  break;	
	case "3":
	  $titulo = "Confirmar Presença - 30 de agosto";
	  break;
	case "4":
          $titulo = "Confirmar Presença - 31 de agosto";
	  break;
        case "5":
          $titulo = "Confirmar Presença - 01 de setembro";
	  break;
        case "6":
          $titulo = "Confirmar Presença - 02 de setembro";
	  break;
}
?>
<h1>
<? echo $titulo; ?>
</h1>
<br />
<form action="confirmar_participante.php?cod=<? echo $cod; ?>" method="post" name="confirmar">
<table border="1" bordercolor="#CCCCCC">
  
  <tr>
        <th width="152">Código do Participante</th>
        <td width="316"><input type="text" name="tbId" size="50" /></td>
  </tr>                      
  
    <tr>
        <td colspan="2" align="center">
            <input type="submit" value="Confirmar" />
        </td>
    </tr>
</table>
</form>  

</p>
<a href="index.php">[Voltar]</a><br /><br />
</div>	


</body>
</html>
