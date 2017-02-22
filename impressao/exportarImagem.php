<?php
include "../system/sql.php";

class exportarImagem extends sql{
	
	private $_table = 'usu';
	
	function __construct(){
		parent::__construct();
	}
	
	function teste(){
		$sql = $this->selectTable( "*", $this->_table, "", "");
			while( $field = mysql_fetch_array( $sql ) ){
				return $field['usu_nome'];
			}
	}
}

$foto = new exportarImagem;
$foto->teste();