<?php

class entidades extends sql{
	
	private $cod;
	private $nome;
	
	function __construct( $cod = NULL ){
		
		parent::__construct('ent');
		$this->cod = $cod;

		if(empty($this->cod)){
			$this->cod = $_POST["cod"];
			$this->nome = strtoupper ( $_POST["nome"] );
		}
		
	}
	
	
	function dataEnt( $data ){
		
		$sql = $this->selectTable( ALL, "{$this->data('cod')}='$this->cod'" );
			
			$row = mysql_fetch_assoc( $sql );
				return $row[self::data($data)];
	}

	function createEnt(){
		$field = 
			self::data('cod') . ",".
			self::data('nome')
		;

		$values = "
			'{$this->cod}',
			'{$this->nome}'
		";

		$this->insertTable( $field, $values );
	}
}