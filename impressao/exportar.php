<?php

	include ( "../system/defines.php" );

	function __autoload( $class ){
		$file = "../system/". $class .".php";
		if( file_exists( $file ) ){
			include( $file );
		}else{
			include("../functions/". $class .".php");
		}
	}


	$nome = $_GET['nome'];
	$user = new sql('usu');
	$sql = $user->selectTable( ALL, "{$user->data('nome')}='$nome'" );

	while ( $dado = mysql_fetch_assoc( $sql ) ) {
		$carteirinha = new carteirinha;
		$carteirinha->thumb("/var/www/html/aes/".$dado['usu_foto_3x4']);

		$ent = new entidades($dado['usu_ent_id']);
		
		$carteirinha->escola( $ent->dataEnt('nome') );
		
		if( strlen( $dado['usu_nome'] ) > 37 ){
			$carteirinha->nome($dado["usu_abreviatura_carteira"]);
		}
		else{
			$carteirinha->nome($dado["usu_nome"]);
		}
		
		$carteirinha->turno($dado["usu_turno"]);
		$carteirinha->serie($dado["usu_serie"]);
		$carteirinha->nascimento($dado["usu_dt_nascto"]);
		$carteirinha->endereco( $dado['usu_endereco']." - ".$dado['usu_end_num'] );
		$carteirinha->responsavel( $dado['usu_resp_nome'] );
		// $carteirinha->view();

				if (!@dir("/var/www/html/aes/impressao/exportados/".$dado['usu_protocolo'])) {
					mkdir("/var/www/html/aes/impressao/exportados/".$dado['usu_protocolo']);
					chmod("/var/www/html/aes/impressao/exportados/".$dado['usu_protocolo'], 0777);
				}else{
					chmod("/var/www/html/aes/impressao/exportados/".$dado['usu_protocolo'], 0777);
				}

		$carteirinha->save("/var/www/html/aes/impressao/exportados/".$dado['usu_protocolo']."/".$dado['usu_cod_form']);
	}

		( !empty( $_GET['id'] ) )? $id = "?id=".$_GET['id'] : $id = false;
	
		header("location:../".$_GET['pagina'].".php".$id);