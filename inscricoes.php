<?
//header('Content-Type: text/html; charset=utf-8');
//exit('Inscri&ccedil;&otilde;es ainda n&atilde;o est&atilde;o abertas. ');
include_once 'banco.php';	
include_once 'inscricao/Inscricao.class.php';
include_once 'inscricao/Inscricoes.class.php';
include_once 'minicursos/Minicurso.class.php';
include_once 'minicursos/Minicursos.class.php';
include_once 'participantes_minicursos/ParticipanteMinicurso.class.php';
include_once 'participantes_minicursos/ParticipantesMinicursos.class.php';

if (file_exists('scripts/init.php')) {
	require_once 'scripts/init.php';
} else {
	exit('Nao foi possivel encontrar o arquivo de inicializacao');
}
$id = '';

$action = ( ( isset( $_GET['upd'] ) )? 'upd' : 'add' );

$minicursos = array();
$cursos = new Minicursos;
$aluno = new StdClass();
$participante = new ParticipantesMinicursos();

if( $_SERVER['REQUEST_METHOD'] == 'POST' || isset( $_POST['action'] ) ){

	$objParticipantes = new Inscricoes;
	$aluno = new Inscricao( $_POST );
	
	if( $_POST['action'] == 'add' ){
		$mensagem = $objParticipantes->incluir( $aluno );
		if( is_int( $mensagem ) ){
			$cursos->ExcluirMinicursosDoParticipante($mensagem);
			$url = BASE_URL.'/comprovante.php?cod='.$mensagem;
			header( "location: $url");
        	exit();	
		}
		
	} else {
		$action = 'upd';

		$mensagem = $objParticipantes->atualizar( $aluno );
		
		if( !is_int( $mensagem ) ){
			if( isset( $_POST['minicursos'] ) ){
				$c = explode( ',', $_POST['minicursos'] );
				if( count( $c ) > 2 ){
					$mensagem .= 'Selecione no máximo 2 minicursos.';	
				} else {
					resetMinicursos( $aluno->getId() );
					foreach( $c as $curso ){
						$part = new ParticipanteMinicurso();
						$part->SetIdMinicurso( $curso );
						$part->SetIdParticipante( $aluno->getId() );
						$r = $participante->incluir( $part );
						if( $r == 'OK' ){
							$cursos->PreencherVagaMinicurso( $curso );
						}
					}
				}
			}
			$comprovante_url = BASE_URL.'/comprovante.php?cod='.$aluno->getId();
			$mensagem = NULL;
			$sucesso = 'Cadastro atualizado com sucesso';
		}
	}

} 

$my = array();
$total_cursos = false;
$current_cursos = '';
$not_payed = true;

if( isset( $_GET['cod'] ) && !empty($_GET['cod']) ){
	$id =  $_GET['cod'];
	include_once 'banco.php';	
	include_once 'inscricao/Inscricoes.class.php';
	@session_start();
	@session_register("idedit");					
	$_SESSION["idedit"] = "";
	$cpf = mysql_real_escape_string($_POST["cpf"]);
	$cod = $_GET["cod"];
	$objParticipantes = new Inscricoes;
	$qryPart = $objParticipantes->pesquisar( mysql_real_escape_string( $_GET['cod'] ) );
	
	$results = array();
	if (mysql_num_rows($qryPart) > 0) {
		$results = mysql_fetch_array( $qryPart );

		$aluno = new Inscricao( $results );
		
		// printR( $aluno );
		/*
		if( $aluno->GetDatapagamento() !== '0000-00-00 00:00:00'
			&& $aluno->GetDatapagamento() !== ''
				&& !is_null( $aluno->GetDatapagamento() ) ){
			*/
		if( $aluno->GetPago() == 'S' || $aluno->GetIsento() == 'S'){
			if( $action == 'upd' ){
				$my_cursos = $cursos->PesquisarMinicursosdoParticipante($_GET['cod']);
				$my = array();
				if (mysql_num_rows($my_cursos ) > 0) {
					$i = 0;
					while( $curso = mysql_fetch_array( $my_cursos ) ){
						$my[] = $curso;
						if( $i > 0 ){
							$current_cursos .= ',';
						}
						$current_cursos .= $curso['id'];
						$i++;
					};
				}
			
				if( count( $my ) >= 2 ){
					$total_cursos = true;	
				} else {
					$c = $cursos->PesquisarComVagas();	
					if (mysql_num_rows($c) > 0) {
						while( $curso = mysql_fetch_array( $c ) ){
							$minicursos[] = $curso;
						};
					}		
				}
			}

				$not_payed = false;

		} else {
			$not_payed = true;
		}
		$comprovante_url = BASE_URL.'/comprovante.php?cod='.$aluno->getId();
                $boleto_url =  BASE_URL.'/boleto/boleto_itau.php?cod='.$aluno->getId();
	}
} else {
	if( isset( $_GET['cod'] ) && empty($_GET['cod']) && empty( $mensagem ) ){
		$mensagem = "Usuário não encontrado na base.";
	}
}



// printR( $mensagem );

function resetMinicursos( $user_id ){
	$cursos = new Minicursos;
	$participante = new ParticipantesMinicursos();
	$my_cursos = $cursos->PesquisarMinicursosdoParticipante( $user_id );
	if (mysql_num_rows( $my_cursos ) > 0) {
		while( $curso = mysql_fetch_array( $my_cursos ) ){
			$r = $participante->excluirMinicursodoParticipante( $user_id, $curso['id'] );
			if( $r == 'OK' ){
				$cursos->LiberarVagaMinicurso( $curso );
			}

		};
	}
}
function setValue( $aluno, $key ){
	$method = 'Get'.ucfirst( strtolower( $key ) );
	if( method_exists( $aluno, $method ) ){
		return utf8_encode( $aluno->$method() );	
	} else {
		return '';	
	}
}

include "includes/head.php";
?>
<body onload="javascript:buscaEstados()">
	<? include "includes/header.php";?>
	<? include "includes/banner.php"; ?>
	<?
	$title = 'Formul&aacute;rio de Inscri&ccedil;&atilde;o';
	include "includes/titulo-topo.php";
	?>
	<div id="content">
    	<div class="container">
            <div class="inner row">
				<div id="sidebar" class="span3">
					<? include "includes/menu_lateral.php"; ?>
				</div>
				<div class="span9">
					<div id="inscricao" class="row">
                        
						<div class="span9">
							<? 

							/*
                            <ol>
                                <li>
                                    <strong>Primeiro Passo: Efetuar ou Alterar Inscri&ccedil;&atilde;o</strong>
                                    <p>Preencha, ou complemente sua inscri&ccedil;&atilde;o com cuidado o Formul&acute;rio de Inscri&ccedil;&atilde;o, atentando para a necessidade de informa&ccedil;&atilde;o sobre a participa&ccedil;&atilde;o em mini-cursos (caso a inscri&ccedil;&atilde;o j&acute; tenha tido a confirma&ccedil;&atilde;o do pagamento no sistema). Cada inscrito tem direito a participar de at&eacute; 2 mini-cursos.</p>
                                    <p>Clique aqui para <a href="http://www.dbi.uem.br/emabi2013/inscricoes.php">efetuar</a> ou <a href="buscaporcpf.php?cod=3">complementar</a> sua inscri&ccedil;&atilde;o no EMABI 2013.</p>
                                </li>
                                <li>
                                    <strong>Segundo Passo: Emiss&atilde;o do Boleto Banc&acute;rio</strong>
                                    <p>
                                        A empresa respons&acute;vel pelo controle financeiro do evento &eacute; a FADEC - Funda&ccedil;&atilde;o de Apoio ao Desenvolvimento Cient&iacute;fico. Relembrando, a confirma&ccedil;&atilde;o de sua inscri&ccedil;&atilde;o no evento ser&ccedil;&atilde; efetuada pelo pagamento <b>via Boleto Banc&aacute;rio.</b>
                                    </p>
                                </li>
                            </ol>
						*/	 ?>
							
                            

                            <p>Os campos com <font color="#FF0000">*</font> s&atilde;o de preenchimento obrigat&aacute;rio.</p>
                            
						</div>

        				<div class="span6">
                            <form action="inscricoes.php?cod=<?=$id?>&<?=$action?>" class="form-horizontal" method="post" name="inscricao" enctype="multipart/form-data">
                            	<? 
								
								if( $action == 'upd' ){ ?>
                                	<input type="hidden" name="id" value="<?=$id?>"/>
                                	<input type="hidden" name="action" value="upd"/>
                                <? } elseif( $action == 'add' ) { ?>
                                	<input type="hidden" name="action" value="add"/>
                                <? } ?>
                                
                                <? if ( !is_int($sucesso) && !empty($sucesso) ) { ?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <p><? echo html_entity_decode( utf8_encode( $sucesso ) ); ?></p>
                                </div>
                                <? } ?>

								<? if ( !is_int($mensagem) && !empty($mensagem) ) { ?>
                                <div class="alert alert-error">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <p><? echo html_entity_decode( utf8_encode( $mensagem ) ); ?></p>
                                </div>
                                <? } ?>
                                <? 
								if( $action == 'upd' && !$total_cursos && !$not_payed ){ ?>
                                    <div id="minicursos">
                                        <h3>Selecione at&eacute; 2 minicursos</h3>
                                        <ul class="to_select">
                                            <? foreach( $minicursos as $curso ){ ?>
                                            <li data-id="<?=$curso['id']?>">
                                                <?=$curso['titulo']?>
                                                <strong><?=$curso['diasemana']?>  /  <span><?=utf8_encode($curso['horario'])?></span></strong>
                                            </li>
                                            <? } ?>
                                        </ul>
                                        <input type="hidden" name="minicursos" value="<?=$current_cursos?>">
                                    </div>
                                <? } ?>
                                <? if( !$not_payed ){ ?>
                                    <div class="minicursos_selected">
                                        <h3>Cursos selecionados</h3>
                                        <ul>
                                        <? if( count( $my ) > 0 ){ ?>
                                            <? foreach( $my as $curso ){ ?>
                                            <li data-id="<?=$curso['id']?>">
                                                <?=$curso['titulo']?>
                                                <strong><?=$curso['diasemana']?>  /  <span><?=utf8_encode($curso['horario'])?></span></strong>
                                            </li>
                                            <? } ?>
                                        <? } else { ?>
                                            <li id="empty">Nenhum minicurso selecionado</li>
                                        <? } ?>
                                        </ul>
                                    </div>
                                <? } ?>
                                <br/><br/>
                                <?//var_dump($aluno); exit()?>
                                <div class="control-group">
                                    <label class="control-label">Nome*</label>
                                    <div class="controls">
                                      <input type="text" name="nome" size="30" value="<?=utf8_decode(setValue( $aluno, 'nome' ))?>" />
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label">Sexo*</label>
                                    <div class="controls">
                                        <select name="sexo">
                                            <option value="0" selected="selected">--Selecione uma op&ccedil;&atilde;o--</option>
                                            <option value="Masculino" <?
                                                if ( setValue( $aluno, 'sexo' ) == "Masculino") {
                                                    echo "selected='selected'";
                                                }
                                            ?> >Masculino</option>
                                            <option value="Feminino" <?
                                            if ( setValue( $aluno, 'sexo' ) == "Feminino") {
                                                echo "selected='selected'";
                                            }
                                            ?> >Feminino</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label">Categoria</label>
                                    <div class="controls">
                                        <select name="categoria">
                                            <option value="0" selected="selected">--Selecione uma op&ccedil;&atilde;o--</option>
                                            <?
                                            $qryCat = mysql_query("SELECT * FROM c2014_categorias order by codigo");
                                            while ($categorias = mysql_fetch_array($qryCat)){
                                            ?>
                                                <option value="<? echo $categorias["id"]; ?>" <?
                                                if ($categorias["id"] == setValue( $aluno, 'categoria' )) { echo "selected='selected'";
                                                }
                                                ?> ><? echo $categorias["descricao"]; ?></option>
                                            <? } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label">Empresa/Institui&ccedil;&atilde;o*</label>
                                    <div class="controls">
                                        <input type="text" name="empinst" size="30"  value="<?=utf8_decode(setValue( $aluno, 'empinst' ))?>"  />
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label">Cargo/Curso</label>
                                    <div class="controls">
                                        <input type="text" name="cargoCurso" size="30"  value="<?=utf8_decode(setValue( $aluno, 'cargocurso' ))?>"  />
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label">CPF*</label>
                                    <div class="controls">
                                        <input type="text" data-toggle="tooltip" placeholder="Digite apenas os n&uacute;meros" title="Digite apenas os n&uacute;meros" name="cpf" id="cpf" size="30" onKeyUp="mascaraHellas(this.value, this.id, '###.###.###-##', event)" value="<?=setValue( $aluno, 'cpf' )?>" />
                                    </div>
                                </div>
                                
                                
                                <div class="control-group">
                                    <label class="control-label">Endere&ccedil;o Completo*</label>
                                    <div class="controls">
                                        <input type="text" name="enderecocompleto" size="30" value="<?=utf8_decode(setValue( $aluno, 'enderecocompleto' ))?>" />
                                    </div>
                                </div>
                                
                                
                                <div class="control-group">
                                    <label class="control-label">Estado*</label>
                                    <div class="controls">
                                        <select name="uf" id="uf" data-selected="<?=setValue( $aluno, 'estado' )?>" onchange="buscaCidades(this.value)"></select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Cidade*</label>
                                    <div class="controls">
                                        <select name="municipio" id="cidade" data-selected="<?=setValue( $aluno, 'cidade' )?>">
                                            <option value="">Primeiramente, selecione o estado</option>
                                        </select>
                                    </div>
                                </div>
                                
                                
                                <div class="control-group">
                                    <label class="control-label">CEP*</label>
                                    <div class="controls">
                                        <input type="text" name="cep" size="30" id="cep" onKeyUp="mascaraHellas(this.value, this.id, '#####-###', event)" value="<?=setValue( $aluno, 'cep' )?>" />
                                    </div>
                                </div>
                        
                                
                                <div class="control-group">
                                    <label class="control-label">Telefone*</label>
                                    <div class="controls">
                                        <input type="text" name="telefone" placeholder="DDD + N&uacute;mero" title="DDD + N&uacute;mero" size="30" value="<?=setValue( $aluno, 'telefone' )?>" id="telefone" onKeyUp="mascaraHellas(this.value, this.id, '(##)####-####', event)" />
                                        
                                    </div>
                                </div>
                                
                                
                                <div class="control-group">
                                    <label class="control-label">Celular</label>
                                    <div class="controls">
                                        <input type="text" name="celular" placeholder="DDD + N&uacute;mero" title="DDD + N&uacute;mero" size="30" value="<?=setValue( $aluno, 'celular' )?>" id="telefone2" onKeyUp="mascaraHellas(this.value, this.id, '(##)####-####', event)" />
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label">E-mail*</label>
                                    <div class="controls">
                                        <input type="text" name="email" size="30" value="<?=setValue( $aluno, 'email' )?>" />
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label"></label>
                                    <div class="controls">
                                        <input class="btn btn-success btn-large" type="submit" value="Enviar" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="span3">
                        	<? if( isset($comprovante_url) ){ ?>
                        	<h3>Opções</h3>
                            <ul>
                            	<li><a href="<?=$comprovante_url?>" title="">Comprovante de inscrição</a></li>
                                <li><a href="<?=$boleto_url?>" title="">Emitir 2ª via Boleto bancário</a></li>
                            </ul>
                            <? } ?>
                        	<? /*
                        	<div class="alert">
                                <h4>ATEN&Ccedil;&Atilde;O</h4>
                            	<ul>
                                    <li>Caso voc&eacute; j&aacute; tenha feito sua inscri&ccedil;&atilde;o, clique <a href="buscaporcpf.php?cod=1">AQUI</a> para ver seu comprovante.</li>
                                    <li>Caso voc&eacute; j&aacute; tenha feito sua inscri&ccedil;&atilde;o e queira alter&aacute;-la, clique <a href="buscaporcpf.php?cod=3">AQUI</a>.</li>
                                </ul>
                            </div>
							*/ ?>
                        </div>
					</div>
				</div>
			</div>
		</div>
    </div>
	<script language="javascript1.2" src="scripts/mascaraHellas.js"></script>
	<script type="text/javascript" src="scripts/ajax.js"></script>
	<script type="text/javascript" src="scripts/funcoes.js"></script>
</body>
	<?
	include "includes/rodape.php";
?>
</html>
