<?php

/**
* 
*/

class baixa extends sql{

	function __construct(){
		parent::__construct("usu");
	}

	function impressao( $id ){

		$this->editTable( self::data('status')."='1'", self::data('id')."='".$id."'" );
		

	}

	function entrega( $id ){

		$this->editTable( self::data('status')."='2'", self::data('id')."='".$id."'" );
		
	}
}


?>