<?php
// +----------------------------------------------------------------------+
// | BoletoPhp - Vers�o Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo est� dispon�vel sob a Licen�a GPL dispon�vel pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Voc� deve ter recebido uma c�pia da GNU Public License junto com     |
// | esse pacote; se n�o, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colabora��es de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de Jo�o Prado Maia e Pablo Martins F. Costa				        |
// | 														                                   			  |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Equipe Coordena��o Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
// | Desenvolvimento Boleto CEF SIGCB: Davi Nunes Camargo				  |
// +----------------------------------------------------------------------+

// ------------------------- DADOS DIN�MICOS DO SEU CLIENTE PARA A GERA��O DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formul�rio c/ POST, GET ou de BD (MySql,Postgre,etc)	//

include_once '../banco.php';
include_once '../inscricao/Inscricoes.class.php';
include_once '../minicursos/Minicursos.class.php';

$id = $_GET["cod"];

$objParticipantes = new Inscricoes;
$qryPart = $objParticipantes -> pesquisar($id);
$dadosParticipante = mysql_fetch_array($qryPart);


// DADOS DO BOLETO PARA O SEU CLIENTE
$dias_de_prazo_para_pagamento = 7;
$taxa_boleto = 0.00;
$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));
// Prazo de X dias OU informe data: "13/04/2006";
$valor_cobrado = "70,00";
// Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".", $valor_cobrado);
$valor_boleto = number_format($valor_cobrado + $taxa_boleto, 2, ',', '');

// Composi��o Nosso Numero - CEF SIGCB
$dadosboleto["nosso_numero1"] = "000";
// tamanho 3
$dadosboleto["nosso_numero_const1"] = "2";
//constanto 1 , 1=registrada , 2=sem registro
$dadosboleto["nosso_numero2"] = "000";
// tamanho 3
$dadosboleto["nosso_numero_const2"] = "4";
//constanto 2 , 4=emitido pelo proprio cliente
//$dadosboleto["nosso_numero3"] = "000000019";
$dadosboleto["nosso_numero3"] = formata($id);
// tamanho 9

//$dadosboleto["numero_documento"] = "27.030195.10";	// Num do pedido ou do documento
$dadosboleto["numero_documento"] = "000.".$id;
// $obj->id Num do pedido ou do documento
$dadosboleto["data_vencimento"] = $data_venc;
// Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y");
// Data de emiss�o do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y");
// Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto;
// Valor do Boleto - REGRA: Com v�rgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = $dadosParticipante['nome'];

$dadosboleto["endereco1"] = $dadosParticipante["enderecocompleto"];
//$obj->endereco
$dadosboleto["endereco2"] = $dadosParticipante["cidade"]. ' - '. $dadosParticipante["estado"] . ' - '.$dadosParticipante["cep"] ;

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = "Pagamento Emabi - 2013";
$dadosboleto["demonstrativo2"] = "Pagamento referente ao emabi SEM TAXA<br>Taxa banc�ria - R$ " . number_format($taxa_boleto, 2, ',', '');
$dadosboleto["demonstrativo3"] = "http://www.dbi.uem.br/emabi2013";

// INSTRU��ES PARA O CAIXA
$dadosboleto["instrucoes1"] = "- N�o receber ap�s vencimento";
$dadosboleto["instrucoes2"] = "- Pagavel Somente nas agencias da CAIXA";
$dadosboleto["instrucoes3"] = "- Em caso de d�vidas entre em contato conosco: xxxx@xxxx.com.br";
$dadosboleto["instrucoes4"] = "&nbsp; Emitido pelo sistema http://www.dbi.uem.br/emabi2013";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "";
$dadosboleto["valor_unitario"] = "";
$dadosboleto["aceite"] = "";
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "";

// ---------------------- DADOS FIXOS DE CONFIGURA��O DO SEU BOLETO --------------- //

// DADOS DA SUA CONTA - CEF
$dadosboleto["agencia"] = "3178";
// Num da agencia, sem digito
$dadosboleto["conta"] = "39";
// Num da conta, sem digito
$dadosboleto["conta_dv"] = "8";
// Digito do Num da conta

// DADOS PERSONALIZADOS - CEF
$dadosboleto["conta_cedente"] = "46612";
// C�digo Cedente do Cliente, com 6 digitos (Somente N�meros)
$dadosboleto["carteira"] = "SR";
// C�digo da Carteira: pode ser SR (Sem Registro) ou CR (Com Registro) - (Confirmar com gerente qual usar)

// SEUS DADOS
$dadosboleto["identificacao"] = "Universidade Estadual de Maringá";
$dadosboleto["cpf_cnpj"] = "";
$dadosboleto["endereco"] = "Av. Colombo, 5.790 • Jd. Universitário";
$dadosboleto["cidade_uf"] = "Maring� / PR";
$dadosboleto["cedente"] = "Universidade Estadual de Maringá";

// N�O ALTERAR!
include ("include/funcoes_cef_sigcb.php");
include ("include/layout_cef.php");

function formata($value){
	while (strlen($value) < 9){
		$value = '0'.$value;
	}	
	return $value;
}
	
?>
