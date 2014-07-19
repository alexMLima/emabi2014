<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<a name="TemplateInfo"></a>	
                <p align="justify">
                Caso o campo de data seja deixado em branco, todos os crachás ou certificados serão emitidos.
                </p>               
				<h1>Crachás</h1>                
                <p align="justify">
                <form action="../autoatendimento/crachas/emitirTodosCrachas.php?esp=N" method="post" target="_blank">
                <img src='images/impressora.gif' border='0' width="30" height="30" style="padding:0 0 0 0">                Emitir todos os crachás a partir do dia <input type="text" name="tbData" /> (dd/mm/aaaa)&nbsp;
                <input type="submit" value="OK" />
                </form>
                </p>  
                
                 <a name="TemplateInfo"></a>	
				<h1>Certificados por categoria</h1>                
                <p align="justify">
              <form action="certificados/certificadoParticipantePorDia.php" method="post" target="_blank">
                <img src="images/ico_pdf.gif" width="20"m height="20" />&nbsp;Emitir certificados dos confirmados
                <br />
                <table width="510">
   	  <tr>
                    	<td width="80">Dia:</td>
              <td width="418"> <select name="sldias">                                  
                  <option value="t" selected="selected">--Todos--</option>
                  <option value="dia03" >03/Dez</option>
                  <option value="dia04" >04/Dez</option>
                  <option value="dia05" >05/Dez</option>                 
                 </select></td>
                  </tr>
                    <tr>
                    	<td>Categoria: </td>
                        <td><select name="slcategorias">                                  
                  <option value="t" selected="selected">--Todas--</option>
                  <?							  
                  $sqlCat = "SELECT id, descricao FROM categorias ORDER BY id";
                  $qryCat = mysql_query($sqlCat);
                  while($categorias = mysql_fetch_array($qryCat)){
                  ?>
                  <option value="<? echo $categorias['id']; ?>" <? if ($categorias['id'] == $slcategorias) { echo "  selected='selected'"; } ?> ><? echo $categorias['descricao'] ?></option>
                  <? } ?>
              </select></td>
                    </tr>
                    <tr>
                    	<td colspan="2" style="text-align:center">
                        <input type="submit" value="OK" />
                        </td>
                    </tr>
                </table>
                
              </form>
              
                </p>
                
                <a name="TemplateInfo"></a>	
				<h1>Certificados</h1>                
                <p align="justify">
                <form action="certificados/certificadoParticipante.php?id=t" method="post" target="_blank">
                <img src="images/ico_pdf.gif" width="20"m height="20" />&nbsp;Emitir certificados a partir do dia de inscrição <input type="text" name="tbDataCert" /> (dd/mm/aaaa)&nbsp;
                <input type="submit" value="OK" />
                </form>
                
                </p>    
</body>
</html>
