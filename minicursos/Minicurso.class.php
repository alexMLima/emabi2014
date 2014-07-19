<?php
class Minicurso{
	private $id;
	private $nminicurso;
	private $titulo;
	private $descricao;
	private $nvagas;
	private $nvagaspreenc;
	private $observacao;
	private $grupo;
	private $cancelada;
	private $horario;
	private $diasemana;	
	
	function __construct($id,$nminicurso,$titulo,$descricao,$nvagas, $nvagaspreenc, $observacao, $grupo, $cancelada,$horario, $diasemana){
		$this->id = $id;
		$this->nminicurso = $nminicurso;
		$this->titulo = $titulo;
		$this->descricao = $descricao;
		$this->nvagas = $nvagas;
		$this->nvagaspreenc = $nvagaspreenc;
		$this->observacao = $observacao;
		$this->grupo = $grupo;
		$this->cancelada = $cancelada;
		$this->horario = $horario;
		$this->diasemana = $diasemana;
	}
	
	public function GetId(){
		return $this->id;
	}
	public function SetId($id){
		$this->id = $id;
	}
	
	//########################################################
	public function GetNminicurso(){
		return $this->nminicurso;
	}
	public function SetNminicurso($nminicurso){
		$this->nminicurso = $nminicurso;
	}
	
	//########################################################
	public function GetTitulo(){
		return $this->titulo;
	}
	public function SetTitulo($titulo){
		$this->titulo = $titulo;
	}
	
	//########################################################
	
	public function GetDescricao(){
		return $this->descricao;
	}
	public function SetDescricao($descricao){
		$this->descricao = $descricao;
	}
	//########################################################
	public function GetNvagas(){
		return $this->nvagas;
	}
	
	public function SetNvagas($nvagas){
		$this->nvagas = $nvagas;
	}
	//########################################################
	public function GetNvagaspreenc(){
		return $this->nvagaspreenc;
	}
	public function SetNvagaspreenc($nvagaspreenc){
		$this->nvagaspreenc = $nvagaspreenc;
	}
	//########################################################
    public function GetObservacao(){ 
    	return $this->observacao; 
    } 
	
    public function SetObservacao($observacao){
    	$this->observacao = $observacao;
    }
	//########################################################
	public function GetGrupo(){ 
    	return $this->grupo; 
    } 
	
    public function SetGrupo($grupo){
    	$this->grupo = $grupo;
    }
	//########################################################
	public function GetCancelada(){ 
    	return $this->cancelada; 
    } 
	
    public function SetCancelada($cancelada){
    	$this->cancelada = $cancelada;
    }
	//########################################################
	public function GetHorario(){ 
    	return $this->horario; 
    } 
	
    public function SetHorario($cancelada){
    	$this->horario = $horario;
    }
	//########################################################
	public function GetDiasemana(){ 
    	return $this->diasemana; 
    } 
	
    public function SetDiasemana($diasemana){
    	$this->diasemana = $diasemana;
    }
	//########################################################
}
?>
