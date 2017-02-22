<?php

/**
 * @author pedro
 * @copyright 2014
 */

class usuario extends sql{
	
	private $protocolo;
	private $formulario;
	private $nome;
	private $abreviatura;
    private $abreviatura_carteira;
	private $nascimento;
	private $fone;
	private $turno;
	private $serie;
	private $escola;
	private $logradouro;
	private $numero;
	private $bairro;
	var $foto;
	private $fotoPath = "impressao/3x4/";
	private $responsavel;
	private $id;
    
	function __construct( $protocolo = NULL ){
	   
	   parent::__construct('usu');
	   
   
		$this->protocolo = $protocolo;
		( !empty( $_POST["usu_cod_form"] ) )	? $this->formulario		= $_POST["usu_cod_form"]				 : "''";
		( !empty( $_POST["usu_nome"] ) )		? $this->nome			= strtoupper( $_POST["usu_nome"] )		 : "''";
		( !empty( $_POST["usu_abreviatura"] ) )	? $this->abreviatura	= strtoupper( $_POST["usu_abreviatura"] ): "''";
        ( !empty( $_POST["usu_abreviatura_carteira"] ) )	? $this->abreviatura_carteira	= strtoupper( $_POST["usu_abreviatura_carteira"] ): "''";
		( !empty( $_POST["usu_dt_nascto"] ) )	? $this->nascimento		= $_POST["usu_dt_nascto"]				 : "''";
		( !empty( $_POST["usu_telefone"] ) ) 	? $this->fone			= $_POST["usu_telefone"]				 : "''";
		( !empty( $_POST["usu_turno"] ) )	 	? $this->turno			= strtoupper( $_POST["usu_turno"] )		 : "''";
		( !empty( $_POST["usu_serie"] ) )	 	? $this->serie			= strtoupper($_POST["usu_serie"] )		 : "''";
		( !empty( $_POST["usu_ent_id"] ) )	 	? $this->escola			= strtoupper( $_POST["usu_ent_id"] )	 : "''";
		( !empty( $_POST["usu_endereco"] ) ) 	? $this->logradouro		= strtoupper( $_POST["usu_endereco"] )   : "''";
		( !empty( $_POST["usu_end_num"] ) )	 	? $this->numero			= $_POST["usu_end_num"]					 : "''";
		( !empty( $_POST["usu_bairro"] ) )	 	? $this->bairro			= strtoupper ( $_POST["usu_bairro"] )	 : "''";
		( !empty( $_POST["usu_resp_nome"] ) )	? $this->responsavel	= strtoupper ( $_POST["usu_resp_nome"] ) : "''";
		( !empty( $_POST["usu_protoloco"] ) )	? $this->protocolo		= $_POST["usu_protoloco"]				 : "''";
		( !empty( $_GET['id'] ) )				? $this->id				= $_GET['id']							 : false;
	}

	private function setFoto(){
		
		if( !$_FILES['3x4']['error'] == 4 ){
			$this->foto = $this->fotoPath . $this->formulario . ".jpg";
				$upload = $this->foto;
					move_uploaded_file( $_FILES['3x4']['tmp_name'], $upload );
		}else{
			return $this->foto = $this->fotoPath . "sem-foto.jpg";
		}
			
	}

		
	function createUser(){
		
		$this->setFoto();
		
		$fields =
			self::data('protocolo') . ",".
			self::data('cod_form') . ",".
			self::data('nome') . ",".
			self::data('abreviatura') . ",".
			self::data('dt_nascto') . ",".
			self::data('telefone') . ",".
			self::data('turno') . ",".
			self::data('serie') . ",".
			self::data('ent_id') . ",".
			self::data('endereco') . ",".
			self::data('end_num') . ",".
			self::data('bairro') . ",".
			self::data('foto_3x4') . ",".
			self::data('resp_nome') . ""
		;

		$values = "
			'{$this->protocolo}',
			'{$this->formulario}',
			'{$this->nome}',
			'{$this->abreviatura}',
			'{$this->nascimento}',
			'{$this->fone}',
			'{$this->turno}',
			'{$this->serie}',
			'{$this->escola}',
			'{$this->logradouro}',
			'{$this->numero}',
			'{$this->bairro}',
			'{$this->foto}',
			'{$this->responsavel}'
		";
		
		$this->insertTable( $fields, $values );
	}
	
	function editUser(){
		
		$this->setFoto();
		
		if( !$_FILES['3x4']['error'] == 4 ){
			$set =
				self::data('protocolo') . "='{$this->protocolo}',".
				self::data('cod_form') . "='{$this->formulario}',".
				self::data('nome') . "='{$this->nome}',".
				self::data('abreviatura') . "='{$this->abreviatura}',".
				self::data('dt_nascto') . "='{$this->nascimento}',".
				self::data('telefone') . "='{$this->fone}',".
				self::data('turno') . "='{$this->turno}',".
				self::data('serie') . "='{$this->serie}',".
				self::data('ent_id') . "='{$this->escola}',".
				self::data('endereco') . "='{$this->logradouro}',".
				self::data('end_num') . "='{$this->numero}',".
				self::data('bairro') . "='{$this->bairro}',".
				self::data('foto_3x4') . "='{$this->foto}',".			
				self::data('resp_nome') . "='{$this->responsavel}'"
			;
		}else{		
			$set =
				self::data('protocolo') . "='{$this->protocolo}',".
				self::data('cod_form') . "='{$this->formulario}',".
				self::data('nome') . "='{$this->nome}',".
				self::data('abreviatura') . "='{$this->abreviatura}',".
				self::data('dt_nascto') . "='{$this->nascimento}',".
				self::data('telefone') . "='{$this->fone}',".
				self::data('turno') . "='{$this->turno}',".
				self::data('serie') . "='{$this->serie}',".
				self::data('ent_id') . "='{$this->escola}',".
				self::data('endereco') . "='{$this->logradouro}',".
				self::data('end_num') . "='{$this->numero}',".
				self::data('bairro') . "='{$this->bairro}',".
				self::data('resp_nome') . "='{$this->responsavel}'"
			;
		}
		
		$this->editTable( $set, self::data('id')."='{$this->id}'");
	}
	
	function deleteUser(){ $this->deleteTable( self::data('id')."='{$this->id}'" ); }
	
	function viewUser( $data ){
		
		$sql = $this->selectTable( ALL, self::data('id')."='{$this->id}'" );
			$row = mysql_fetch_assoc( $sql );
			return $row[self::data($data)];
		
	}
	
}


?>
