<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<link rel="stylesheet" href="images/PixelGreen.css" type="text/css" />

<title>Menu</title>
<script type="text/javascript" src="scripts/ajax.js"></script>
<script type="text/javascript" src="scripts/funcoes.js"></script>
<script type="text/javascript">
function IEHoverPseudo() {

	var navItems = document.getElementById("primary-nav").getElementsByTagName("li");
	
	for (var i=0; i<navItems.length; i++) {
		if(navItems[i].className == "menuparent") {
			navItems[i].onmouseover=function() { this.className += " over"; }
			navItems[i].onmouseout=function() { this.className = "menuparent"; }
		}
	}
	buscaEstados();

}

window.onload = IEHoverPseudo;

</script>

<style type="text/css">

ul#primary-nav,
ul#primary-nav ul {
	margin: 0;
	padding: 0;
	width: 192px; /* Width of Menu Items */
	border-bottom: 1px solid #ccc;
	background: #999999; /* IE6 Bug */
	font-size: 100%;	
	}

ul#primary-nav li {
	position: relative;
	list-style: none;
	}

ul#primary-nav li a {
	display: block;
	text-decoration: none;
	padding: 5px;
	border-bottom: 1px dashed #ccc;
	border-top:0;
	color:#FFFFFF;
	}

ul#primary-nav li a:hover {	
	border-left: 2px solid  #FFFFFF;
	color: #FFFFFF;
	}
	


/* Fix IE. Hide from IE Mac \*/
* html ul#primary-nav li { float: left; height: 1%; }
* html ul#primary-nav li a { height: 1%; }
/* End */

ul#primary-nav ul {
	position: absolute;
	display: none;
	left: 191px; /* Set 1px less than menu width */
	top: 0;
	}

ul#primary-nav li ul li a { padding: 2px 5px; } /* Sub Menu Styles */

ul#primary-nav li:hover ul ul,
ul#primary-nav li:hover ul ul ul,
ul#primary-nav li.over ul ul,
ul#primary-nav li.over ul ul ul { display: none; } /* Hide sub-menus initially */

ul#primary-nav li:hover ul,
ul#primary-nav li li:hover ul,
ul#primary-nav li li li:hover ul,
ul#primary-nav li.over ul,
ul#primary-nav li li.over ul,
ul#primary-nav li li li.over ul { display: block; } /* The magic */

ul#primary-nav li.menuparent { background: transparent url(images/arrow.gif) right center no-repeat; font-weight:bold }

ul#primary-nav li.menuparent:hover,
ul#primary-nav li.over { background-color: #333333; }

.sidebox {
	background: #333333;
	border: 1px solid #EFEDED;
	margin-bottom: 5px;
	color:#000000;
}

</style>
</head>

<body>

<div class="sidebox">
	<?
	
	include_once '../banco.php';	
	include_once '../inscricao/Inscricoes.class.php';
    include_once '../comissao/Comissoes.class.php';		
	
	$objComissoes = new Comissoes();
    $qryComissao = $objComissoes->pesquisar($_SESSION["id"]);
	$dadosComissao = mysql_fetch_array($qryComissao);
					
	$objParticipantes = new Inscricoes;
    $qryParticipantes = $objParticipantes->ConsultaTabela();
		
	$totalParticipantes = mysql_num_rows($qryParticipantes);
	
	
   
	?>	
    <p align="center">
    Ol&aacute; <b><? echo $_SESSION["nome"]; ?></b>
    </p>
    <p align="center">
    <b>Participantes: <? echo $totalParticipantes ?></b><br /> 
       <br />
    <a href="logout.php"><img src="images/logout.gif" border="0" /></a>   
    </p>    
</div>

<ul id="primary-nav">
  <? if ($dadosComissao["permissao"] > 10){ ?>
  <li><a href="home.php"><b>Home</b></a></li>
 
    <ul>
      <li><a href="crachas.php?op=1">Por data de inscri��o</a></li>
      
    </ul>
  </li>
  
  <li><a href="participantes.php"><b>Participantes</b></a></li>
  
  <? } ?> 
  
  
  <? if ($dadosComissao["permissao"] > 10){ ?> 
  <li><a href="oficinas.php"><b>Minicursos</b></a></li>
  
  <li class="menuparent"><a href="#">Relat�rios</a> 
    <ul>
       <li><a href="relatorios.php?op=1">Todos os participantes</a></li>      
       <li><a href="relatorios.php?op=2">Participantes por munic�pio</a></li>
       <li><a href="relatorios.php?op=3">Participantes confirmados por dia</a></li>
    </ul>
  </li>
  
  
  <li><a href="gerenciarComissoes.php"><b>Comiss�o</b></a></li>
  
  <? } ?>  
  <li><a href="dados_comissao.php"><b>Meus dados</b></a></li>
  <li><a href="confirmar_inscritos/index.php"><b>Confirmar Inscritos</b></a></li>
 	
</ul>
<br />
<div class="sidebox">
	<p align="center">
    Contador de visitas<br /><br />	
	<?
	$qry = mysql_query("SELECT nvisitas from c2014_contador");
	$dados =mysql_fetch_array($qry);
	echo "<b>".str_pad($dados["nvisitas"], 6, "0", STR_PAD_LEFT)."</b>";
	?>	
    </p>
</div>


</body>
</html>
