<?php

class exportarunico extends sql{
	
	private $id;
	public $conteudo = array();
	
	function __construct( $id = NULL ){
		parent::__construct("usu");
		$this->id = $id;
		$this->lineExport();
	}
	
		
	private function lineExport(){
		$sql = $this->selectTable( ALL, $this->data('id') . "='" . $this->id . "'" );
		
			while( $rows = mysql_fetch_array( $sql ) ){
			
            $this->conteudo[] =
              validador::verifica("777".$rows[$this->data("cod_form")]."15", 20)
            . validador::verifica($rows[$this->data("nome")], 50)
            . validador::verifica($rows[$this->data('abreviatura')], 20)
            . validador::verifica($rows[$this->data('dt_nascto')], 10)
            . validador::verifica($rows[$this->data('telefone')], 20)
            . validador::verifica("", 14)
            . validador::verifica($rows[$this->data('turno')], 20) 
            . validador::verifica("", 9)
            . validador::verifica($rows[$this->data('bairro')], 30)
            . validador::verifica("", 100)
            . validador::verifica($rows[$this->data('endereco')], 80)
            . validador::verifica("", 20)
            . validador::verifica("", 50)
            . validador::verifica("", 20)
            . validador::verifica("SANTAREM", 50)
            . validador::verifica("PA", 2)
            . validador::verifica("", 20)
            . validador::verifica($rows[$this->data('resp_nome')], 40)
            . validador::verifica("", 13)
            . validador::verifica("", 10)
            . validador::verifica($rows[$this->data('serie')], 10)
            . validador::verifica("", 2)
            . validador::verifica("", 2)
            . validador::verifica($rows[$this->data('end_num')], 10)
            . validador::verifica($rows[$this->data('end_compl')], 20)
            . validador::verifica("", 10)
            . validador::verifica($rows[$this->data('fmunicipal')], 1)
            . validador::verifica($rows[$this->data('tip_id')], 4)
            . validador::verifica(0, 4)
            . validador::verifica("", 19)
            . validador::verifica($rows[$this->data('per_id')], 4)
            . validador::verifica("", 3)
            . validador::verifica("", 4)
            . validador::verifica("", 3)
            . validador::verifica("", 4)
            . validador::verifica("", 3)
            . validador::verifica("", 4)
            . validador::verifica("", 3)
            . validador::verifica($rows[$this->data('dt_validade')], 10)
			. validador::verifica($rows[$this->data('flag_principal')], 1)
            . validador::verifica($rows[$this->data('ent_id')], 5)
            . validador::verifica($rows[$this->data('usc_prioridade')], 1)
            . validador::verifica($rows[$this->data('id_informativo')], 5)
            . validador::verifica($rows[$this->data('tipo_area')], 1)
            . validador::verifica($rows[$this->data('usa_cmm')], 4)."
";            
			}
			
			return ( $this->conteudo[0] );
	}
	
	
}

