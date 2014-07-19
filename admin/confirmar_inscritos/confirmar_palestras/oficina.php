<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<meta name="Description" content="Information architecture, Web Design, Web Standards." />
<meta name="Keywords" content="your, keywords" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="Author" content="Erwin Aligam - ealigam@gmail.com" />
<meta name="Robots" content="index,follow" />

<link rel="stylesheet" href="../../images/PixelGreen.css" type="text/css" />

<title>XXVI SEMANA DE BIOLOGIA � XIII EMABI</title>
<script language="javascript1.2" src="js/mascaraHellas.js"></script>

<script language="javascript">

</script>	
</head>

<body onload="javascript: document.oficina.tbParticipante.focus()">

<div align="center" style="padding-top:40px">

<p align="center">
    <img src="../../images/logoadminconf.jpg" />
<br />

<?
include_once '../../../banco.php';
include_once '../../../minicursos/Minicursos.class.php';
$objMinicursos = new Minicursos;

if ($_POST["palestra"] != ""){
	$palestra = $_POST["palestra"];
}
else{
	$palestra = $_GET["pal"];
}

$qryMinicursos = mysql_query("SELECT * from c2013_palestras WHERE id = '$palestra'");
$dados = mysql_fetch_array($qryMinicursos);

?>
<form action="confirmar_inscrito.php?pal=<? echo $palestra; ?>" method="post" name="oficina" >
	<table>
		<tr>
        	<td colspan="2" align="center" style="font-size:14px">
                    <u>CONFIRMAR INSCRITO</u>   
            </td>
        </tr>        
    	<tr>
        	<td colspan="2" style="text-align:center; font-size:16px">
             <b>Palestra: <? echo $dados["nminicurso"]." - ".$dados["titulo"]; ?></b>
            </td>
        </tr>
        <tr>
        	<td colspan="2" style="text-align:center; font-size:16px">
             <b><? echo $dados["diasemana"]." - ".$dados["horario"]; ?></b>
            </td>
        </tr>
        <tr>        	          
            <td align="center" colspan="2">
            C�digo:&nbsp;&nbsp;<input type="text" name="tbParticipante" id="tbParticipante" size="35"   />       
            </td>
        </tr>               
        <tr>
        	<td colspan="2" align="center">
            	<input type="submit" value="Submeter" />
            </td>
        </tr>
    </table>
</form>

<a href="index.php">[Voltar]</a><br /><br />

</p>

</div>	


</body>
</html>
