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

<body>

<div align="center" style="padding-top:40px">

<p align="center">
    <img src="../../images/logoadminconf.jpg" />
<br />
<form action="oficina.php" method="post" name="palestra" >
	<table>
<tr>
        	<td colspan="2" align="center">
            <b><u>SELECIONE UMA PALESTRA</u></b>
            </td>
        </tr>        
    	<tr>
        	<td colspan="2" style="text-align:center">
             <select name="palestra" id="palestra" style="width:500px">
				<?
				include_once '../../../banco.php';
				//include_once '../../../minicursos/Minicursos.class.php';
				//$objMinicursos = new Minicursos;
                                $dataatual = date("Y-m-d H:i:s");
                                $qryMinicursos = mysql_query("SELECT * from c2014_palestras WHERE datafechamento > '".$dataatual."'");
				while ($dados = mysql_fetch_array($qryMinicursos)){ ?>
					<option value="<? echo $dados['id']; ?>" <? if ($dados['id'] == 11) echo " selected";?> ><? echo  $dados['nminicurso']." - ".$dados['titulo']; ?></option>	
				<? }?>
				</select>
            </td>
        </tr>
        <tr>        	
            <td align="center" colspan="2">
                     
            </td>
        </tr>               
        <tr>
        	<td colspan="2" align="center">
            	<input type="submit" value="Submeter" />
            </td>
        </tr>
    </table>
</form>

</p>

</div>	


</body>
</html>
