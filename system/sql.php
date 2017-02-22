<?php

/**
 * @author pedro
 * @copyright 2014
 */

class sql
{
	public $sintaxe;
	private $table;
	
	function __construct( $table = NULL )
	{
		mysql_connect( "localhost", "root", "1" );
		mysql_select_db( "aei" );
		
		$this->table = $table;	
	}
	
	public function selectTable( $fields, $condition = NULL , $order = NULL, $limit = NULL )
	{
		if( $condition != "" )$condition = " WHERE " . $condition . " ";
		if( $order != "" )$order = " ORDER BY " . $order;
		if( $limit != "" )$limit = " LIMIT " . $limit;
		
		// SELECT * FROM tabela WHERE campo='condicao' ORDER BY campo
		$this->sintaxe = "SELECT " . $fields . " FROM " . $this->table . $condition . $order . $limit;
		return mysql_query( $this->sintaxe );
	}
	
		public function data( $data ){
			return $this->table . "_" . $data;
		}

	public function insertTable( $fields, $values )
	{
		//INSERT INTO tabela ( campos ) values ( valores );
		$this->sintaxe = "INSERT INTO " . $this->table . " ( " . $fields . " ) values ( " . $values . " )";
		return mysql_query( $this->sintaxe );
	}


	public function editTable( $set, $condition = NULL )
	{
		//UPDATE table SET campo='valor' WHERE campo='valor'
		$this->sintaxe = "UPDATE " . $this->table . " SET " . $set . " WHERE " . $condition;
		return mysql_query( $this->sintaxe );
	}


	public function deleteTable( $condition = NULL )
	{
		// DELETE FROM table WHERE campo='valor'
		$this->sintaxe = "DELETE FROM " . $this->table . " WHERE " . $condition;
		return mysql_query( $this->sintaxe );
	}
	
	
}


?>
