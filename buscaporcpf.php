<script language="javascript1.2" src="scripts/mascaraHellas.js"></script>
<div id="cpf_modal" data-width="450" class="cpf_modal modal hide fade form top" tabindex="-1" role="dialog" aria-labelledby="BuscaPorCpf" aria-hidden="true">
	<form method="post" class="form form-horizontal" action="redirecionar.php?cod=3" name="buscar" />
    	<div class="modal-header">
    	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">ï¿½</button>
            <h3>Alterar Dados da Inscrição</h3>
        </div>
        <div class="modal-body">
        	<div class="control-group">
                <label class="control-label">Informe seu cpf:</label>
                <div class="controls">
                <input type="text" name="tbCpf" id="cpf" size="30" onKeyUp="mascaraHellas(this.value, this.id, '###.###.###-##', event)" />&nbsp;
                </div>
    		</div>
        </div>
        <div class="modal-footer">
            <input type="submit" value="Buscar" class="btn btn-success"/>
        </div>
    </form>
</div>
<script language="javascript1.2" src="scripts/mascaraHellas.js"></script>
<div id="cpf_modal1" data-width="450" class="cpf_modal modal hide fade form top" tabindex="-1" role="dialog" aria-labelledby="BuscaPorCpf" aria-hidden="true">
	<form method="post" class="form form-horizontal" action="redirecionar.php?cod=1" name="buscar" />
    	<div class="modal-header">
    	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">ï¿½</button>
            <h3>Alterar Dados da Inscri&ccedil;&atilde;o</h3>
        </div>
        <div class="modal-body">
        	<div class="control-group">
                <label class="control-label">Informe seu cpf:</label>
                <div class="controls">
                <input type="text" name="tbCpf" id="cpf" size="30" onKeyUp="mascaraHellas(this.value, this.id, '###.###.###-##', event)" />&nbsp;
                </div>
    		</div>
        </div>
        <div class="modal-footer">
            <input type="submit" value="Buscar" class="btn btn-success"/>
        </div>
    </form>
</div>
<? /*
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
        <title><? include 'titulo.php' ?></title>
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
        
    </head>
    <body>
        <div id="wrapper">
            <? include 'menu_topo.php'; ?>
            <!-- end #menu -->
            <div id="header">
                <div id="logo">

                </div>
            </div>
            <!-- end #header -->
            <div id="page">
                <div id="page-bgtop">
                    <div id="page-bgbtm">
                        <div id="content">
                            <div class="post">
                                <h2 class="title">
                                    <a href="#">
                                        <?
                                        if ($_GET["cod"] == "1") {
                                            echo "Visualizar meus dados";
                                        }
                                        if ($_GET["cod"] == "2") {
                                            echo "Visualizar/Enviar Trabalhos Completos";
                                        }
                                        if ($_GET["cod"] == "3") {
                                            echo "Alterar Dados da Inscriï¿½ï¿½o";
                                        }
                                        if ($_GET["cod"] == "4") {
                                            echo "Submeter Artigos";
                                        }
                                        if ($_GET["cod"] == "5") {
                                            echo "Submeter Resumos";
                                        }
                                        ?>
                                    </a>
                                </h2>

                                <div style="clear: both;">&nbsp;</div>
                                <div class="entry">
                                    <p style="text-align:center">
                                    <form method="post" action="redirecionar.php?cod=<? echo $_GET["cod"]; ?>" name="buscar" />
                                    <br />
                                    CPF: <input name="tbCpf" id="cpf" size="30" onKeyUp="mascaraHellas(this.value, this.id, '###.###.###-##', event)" />&nbsp;
                                    <input type="submit" value="Buscar" style="padding:3px 3px 3px 3px" />
                                    <br />
                                    </form>
                                    </p>
                                </div>
                            </div>                            
                            <div style="clear: both;">&nbsp;</div>
                        </div>
                        <!-- end #content -->
                        <div id="sidebar">
                            <ul>                                
                                <li>
                                    <? include 'menu_lateral.php' ?>
                                    </li>

                                </ul>
                            </div>
                            <!-- end #sidebar -->
                            <div style="clear: both;">&nbsp;</div>
                        </div>
                    </div>
                </div>
                <!-- end #page -->
            </div>
        <? include 'rodape.php' ?>
        <!-- end #footer -->
    </body>
</html>
*/ ?>