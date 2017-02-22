<?php

/**
 * @author pedro
 * @copyright 2014
 */

class protocolo extends sql{
	
	private $protocolo;
	
	
	function __construct(){
		parent::__construct( "protocolo" );
	}
    
	
	public function seletc( $data ){
		
		$sql = $this->selectTable( ALL, '', 'protocolo_id DESC' );
		
		$row = mysql_fetch_assoc( $sql );
			return $row[$this->data( $data )];
			
		
	}
	

    public function protocoloCurrent(){
		return ( $this->seletc( 'status' ) == 0 ) ? "open" : "close";
    }
    

    public function createProtocolo(){
		
		if( $this->protocoloCurrent() == "close" ){
			
			$current = "AES-" . date('Ydm');
			$before = $this->seletc('cod');
			
			if( $current == $before ){
				
				$before = explode('-', $before);
				
					if( count( $before ) == 3){
						$soma = $before[2]+1;
						$this->protocolo = $before[0] ."-". $before[1] . $before[2]= "-" . $soma;
					}else{
						$this->protocolo = $before[0] ."-". $before[1] . $before[2]= "-1";
					}
			}
			else{
				$this->protocolo = $current;
			}
			
				$this->insertTable( $this->data('cod'), "'{$this->protocolo}'" );
		}
			
		if( $this->protocoloCurrent() == "open" ){ return false; }
        
    }
	

    public function closeProtocolo(){

		if( $this->protocoloCurrent() == "open" ){
			$this->editTable( $this->data('status')."='1'" , $this->data('id')."=".$this->seletc('id')."" );
		}
		
		if( $this->protocoloCurrent() == "close" ){ return false; }
		    
    }
}


?>
