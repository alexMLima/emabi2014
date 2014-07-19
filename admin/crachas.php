<? include 'seguranca.php';

if (file_exists('scripts/init.php'))
{
	require_once 'scripts/init.php';
}
else
{
	exit('Não foi possível encontrar o arquivo de inicialização');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<link rel="stylesheet" href="images/PixelGreen.css" type="text/css" />
<script type="text/javascript" src="scripts/ajax.js"></script>
<script type="text/javascript" src="scripts/funcoes.js"></script>	
<title><? include "../titulo.php"; ?></title>
	
</head>

<body>

<div id="wrap">

	<? include 'topo.php'; ?>

</div>
	
	<!-- <div class="headerphoto"></div> -->
				
	<!-- content-wrap starts here -->
	<div id="content-wrap"><div id="content">		
		
		<div id="sidebar" >
		
			<? include 'loginMenu.php'; ?>
					
		</div>	
	
		<div id="main">
			<div class="post">
             	<?
				include '..\banco.php';
				$op = $_GET["op"];
				switch($op){
					case "1":
				?>
                <h1>Emitir Crachás</h1>
                <p align="justify">
                Caso o campo de data seja deixado em branco, todos os crachás serão emitidos.
                </p>        
                <p align="justify">
                <form action="../autoatendimento/crachas/emitirTodosCrachas.php" method="post" target="_blank">
                <img src='images/impressora.gif' border='0' width="30" height="30" style="padding:0 0 0 0">                Emitir todos os crachás a partir do dia <input type="text" name="tbData" /> (dd/mm/aaaa)&nbsp;
                <input type="submit" value="OK" />
                </form>
                </p>  
                <?   break;
				    case "2": ?>
                
                <h1>Emitir Crachá Extra</h1>
                <p align="justify">
                <form action="../autoatendimento/validar_inscricao_cracha.php" method="post">
                <table width="98%">
				 
                <tr>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td>Nome:</td>
                    <td><input type="text" name="tbNome" size="35" />            
                    </td>
                </tr> 
                <tr>
                    <td>Categoria:</td>
                    <td>
                     <select name="slCategoria">
                        <option value="0" selected="selected">--Selecione uma opção--</option>
                        <?
                        $qryCat = mysql_query("SELECT * FROM c2009_categorias order by id");
                        while ($categorias = mysql_fetch_array($qryCat)){
                        ?>
                            <option value="<? echo $categorias["id"]; ?>" <? if ($categorias["id"] == $slCategoria) { echo "selected='selected'"; } ?> ><? echo $categorias["descricao"]; ?></option>
                        <? } ?>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Empresa/Instituição:</td>
                    <td><input type="text" name="tbEmpresa" size="35" />            
                    </td>
                </tr> 
                <tr>
                    <td>Cargo/Curso:</td>
                    <td><input type="text" name="tbCargo" size="35" />            
                    </td>
                </tr> 
                <tr>
                    <td>Estado:</td>
                    <td><select name="uf" id="uf" onchange="buscaCidades(this.value)"></select></td>
                </tr> 
                <tr>
                    <td>Cidade:</td>
                    <td><select name="cidade" id="cidade">
                          <option value="">Primeiramente, selecione o estado</option>
                        </select>
                     </td>
                </tr>
                <tr>
                	<td align="center" colspan="2">
                    <input type="submit" value="Emitir" />
                    </td>
                </tr>
                </table>
                
                </form>
                </p>  
                
				<?  } ?>       
		    </div>					
		</div>					
		
	<!-- content-wrap ends here -->		
	</div></div>
	
<!-- wrap ends here -->
</div>
<? include 'rodape.php'; ?>
</body>
</html>

