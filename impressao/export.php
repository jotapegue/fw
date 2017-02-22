<?php
	include_once('topo.php');
	include_once('exportarDados.php');   


        mysql_connect( "localhost", "root", "" );
		mysql_select_db( "carteirinha" );
        
        $sql = mysql_query("SELECT * FROM usu WHERE usu_protoloco = '$protocCod' ORDER BY usu_nome ASC");
           
        
        while( $campo = mysql_fetch_array( $sql ) ){
			
            $imagem = new carteirinha;
			$imagem->codForm( $campo['usu_cod_form'] );
			$imagem->endereco( $campo['usu_endereco'] . " - " .  $campo['usu_end_num'] );
			
				$sqlescolaid = mysql_query("SELECT * FROM entidades where ent_cod=". $campo["usu_ent_id"] ."");
				$campoescolaid = mysql_fetch_assoc( $sqlescolaid );
				
			$imagem->escola( $campoescolaid["ent_nome"] );
			$imagem->nascimento( $campo['usu_dt_nascto'] );
			$imagem->nome( $campo['usu_abreviatura'] );
			$imagem->responsavel( $campo['usu_resp_nome'] );
			$imagem->serie( $campo['usu_serie'] );
			$imagem->turno( $campo['usu_turno'] );
			$imagem->folder( $protocCod );
			$imagem->imprime();

            echo $campo['usu_nome'];
            

        }
		
//		header("location: index.php");

?>