<?php

/**
 * @author pedro
 * @copyright 2014
 */

include("topo.php");

$exportar = new exportarunico($_GET['id']);

$sql = new sql('usu');
	$nome = mysql_fetch_assoc( $sql->selectTable(ALL, $sql->data('id')."=".$_GET['id'] ) );
	
	$files = new files("protocolo/", $nome[$sql->data('nome')]);
	$files->writeFile($exportar->conteudo[0]);


	header("location: FormEditar.php?id=".$_GET['id']);
?>
