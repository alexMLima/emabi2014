<?php
// +----------------------------------------------------------------------+
// | BoletoPhp - Versao Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo esta disponivel sob a Licenca GPL disponivel pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Voce deve ter recebido uma copia da GNU Public License junto com     |
// | esse pacote; se nao, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colaboracoes de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de Joao Prado Maia e Pablo Martins F. Costa				        |
// | 														                                   			  |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Equipe Coordenacao Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
// | Desenvolvimento Boleto CEF SIGCB: Davi Nunes Camargo				  |
// +----------------------------------------------------------------------+

// ------------------------- DADOS DINaMICOS DO SEU CLIENTE PARA A GERAcaO DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formulario c/ POST, GET ou de BD (MySql,Postgre,etc)	//

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
$valor_cobrado = "60,00";//"60,00";
// Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".", $valor_cobrado);
$valor_boleto = number_format($valor_cobrado + $taxa_boleto, 2, ',', '');

$dadosboleto["nosso_numero"] = $id;

//$dadosboleto["numero_documento"] = "27.030195.10";	// Num do pedido ou do documento
$dadosboleto["numero_documento"] = $id;
// $obj->id Num do pedido ou do documento
$dadosboleto["data_vencimento"] = $data_venc;
// Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y");
// Data de emissio do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y");
// Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto;
// Valor do Boleto - REGRA: Com virgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = $dadosParticipante['nome'];

$dadosboleto["endereco1"] = $dadosParticipante["enderecocompleto"];
//$obj->endereco
$dadosboleto["endereco2"] = $dadosParticipante["cidade"]. ' - '. $dadosParticipante["estado"] . ' - '.$dadosParticipante["cep"] ;

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = "Pagamento Emabi - 2014";
$dadosboleto["demonstrativo2"] = "Pagamento referente ao emabi SEM TAXA<br>Taxa bancaria - R$ " . number_format($taxa_boleto, 2, ',', '');
$dadosboleto["demonstrativo3"] = "http://www.dbi.uem.br/emabi2014";

// INSTRUCOES PARA O CAIXA
$dadosboleto["instrucoes1"] = "- Sr. caixa n&atilde;o receber ap&aacute;s vencimento";
$dadosboleto["instrucoes2"] = "&nbsp; Emitido pelo sistema http://www.dbi.uem.br/emabi2014";
$dadosboleto["instrucoes3"] = "";
$dadosboleto["instrucoes4"] = "";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "";
$dadosboleto["valor_unitario"] = "";
$dadosboleto["aceite"] = "";
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "";

// ---------------------- DADOS FIXOS DE CONFIGURACAO DO SEU BOLETO --------------- //

// DADOS DA SUA CONTA - ITAÚ
$dadosboleto["agencia"] = "3928"; // Num da agencia, sem digito
$dadosboleto["conta"] = "06872";	// Num da conta, sem digito
$dadosboleto["conta_dv"] = "9"; 	// Digito do Num da conta

// DADOS PERSONALIZADOS - ITAÚ
$dadosboleto["carteira"] = "175";  // Código da Carteira: pode ser 175, 174, 104, 109, 178, ou 157


// SEUS DADOS
$dadosboleto["identificacao"] = "XV EMABI";
$dadosboleto["cpf_cnpj"] = "";
$dadosboleto["endereco"] = "Av. Colombo, 5.790 • Jd. Universit&aacute;rio";
$dadosboleto["cidade_uf"] = "Maring&aacute; / PR";
$dadosboleto["cedente"] = "DBI - Universidade Estadual de Maring&aacute;";

// NAO ALTERAR!
include("include/funcoes_itau.php"); 
include("include/layout_itau.php");

function formata($value){
	while (strlen($value) < 9){
		$value = '0'.$value;
	}	
	return $value;
}
	
?>
