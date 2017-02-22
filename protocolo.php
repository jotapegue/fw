<?php

/**
 * @author pedro
 * @copyright 2014
 */

include("topo.php");

if( $_GET['protocolo'] == "true"){
		
	$protocolo->createProtocolo();
	
	header("location: index.php");
	
}else{
	
	$exportar = new exportar( $protocolo->seletc('cod') );
	$files = new files ("protocolo/", $protocolo->seletc('cod') );
	
	for( $i=0; $i <= count( $exportar->conteudo ); $i++ ){
		
		@$files->writeFile( $exportar->conteudo[$i] );
		
	}
	
	$protocolo->closeProtocolo();
	
	
	header("location: index.php");
}


?>
