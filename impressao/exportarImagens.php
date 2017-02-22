<?php

class carteirinha{
	
	
	//predefinicioes dos campos a serem preenchidos
	private $escola;
	private $nome;
	private $turno;
	private $serie;
	private $nascimento;
	private $endereco;
	private $responsavel;

	function escola( $campo ){
		return $this->escola = $campo;
	}	

	function nome( $campo ){
		return $this->nome = $campo;
	}	
	
	function turno( $campo ){
		return $this->turno = $campo;
	}	
	
	function serie( $campo ){
		return $this->serie = $campo;
	}	
	
	function nascimento( $campo ){
		return $this->nascimento = $campo;
	}	
	
	function endereco( $campo ){
		return $this->endereco = $campo;
	}	
	
	function responsavel( $campo ){
		return $this->responsavel = $campo;
	}
	
								
	function imprime( ){
		header( "Content-type: image/jpg" );
		
			// predefinição da imagem
			$altura		= 650;
			$largura	= 1004;
			$qualidade	= 100;
			$local		= '';

			//predefinição do texto
			$normal = 'arial.ttf';
			$negrito = 'arialbd.ttf';
			$italico = 'trebucit.ttf';
			$negritoItalico = 'trebucbi.ttf';
			
			$fontTitulo	= $normal;			
			$fontTexto	= $negrito;
			
			$fontTamanho = 15;
			
			$fontTituloSize = 10;
			$fontTextoSize	= $fontTamanho + 2;
			
			
			//predefinição de margens
			$marginLeft = 350;
			$marginTop	= 255;
			
			$paddinTitulo = 40;
			$paddinTexto = 	20;
			
			$paddinLeft = 150;
							
				//criando a imagem
				$imagem = imagecreate( $largura, $altura );
					
				//definição de cores
				$background	= imagecolorallocate( $imagem, 255, 255, 255 );
				$fontColor	= imagecolorallocate( $imagem, 255, 255, 0 );
										
				//campos impressos na imagem
				
				//campo escola
					//setando as margens
					$escolaTop1 = $marginTop;
					$escolaTop2 = $escolaTop1 + $paddinTexto;
				imagettftext( $imagem, $fontTituloSize, 0, $marginLeft, $marginTop, $fontColor, $fontTitulo, "ESCOLA:" );
				imagettftext( $imagem, $fontTextoSize, 0, $marginLeft, $marginTop+20, $fontColor, $fontTexto, $this->escola );

				//campo nome
					//setando as margens
					$nomeTop1 = $escolaTop2 + $paddinTitulo;
					$nomeTop2 = $nomeTop1 + $paddinTexto;
				imagettftext( $imagem, $fontTituloSize, 0, $marginLeft, $nomeTop1, $fontColor, $fontTitulo, "NOME:" );
				imagettftext( $imagem, $fontTextoSize, 0, $marginLeft, $nomeTop2, $fontColor, $fontTexto, $this->nome );


				//campo turno, serie, nascimento
					//setando as margens
					$grupoTop1 = $nomeTop2 + $paddinTitulo;
					$grupoTop2 = $grupoTop1 + $paddinTexto;
					
				//
					$turnoLef1 = $marginLeft;
					$turnoLef2 = $turnoLef1;			
				imagettftext( $imagem, $fontTituloSize, 0, $turnoLef1, $grupoTop1, $fontColor, $fontTitulo, "TURNO:" );
				imagettftext( $imagem, $fontTextoSize, 0, $turnoLef2, $grupoTop2, $fontColor, $fontTexto, $this->turno );
				//
					$serieLef1 = $turnoLef2 + $paddinLeft;
					$serieLef2 = $serieLef1;
				imagettftext( $imagem, $fontTituloSize, 0, $serieLef1, $grupoTop1, $fontColor, $fontTitulo, "SÉRIE:" );
				imagettftext( $imagem, $fontTextoSize, 0, $serieLef2, $grupoTop2, $fontColor, $fontTexto, $this->serie );
				//
					$nascLef1 = $serieLef2 + $paddinLeft;
					$nascLef2 = $nascLef1;
				imagettftext( $imagem, $fontTituloSize, 0, $nascLef1, $grupoTop1, $fontColor, $fontTitulo, "NASCIMENTO:" );
				imagettftext( $imagem, $fontTextoSize, 0, $nascLef2, $grupoTop2, $fontColor, $fontTexto, $this->nascimento );															
					

				//campo endereco
					//setando as margens
					$endTop1 = $grupoTop2 + $paddinTitulo;
					$endTop2 = $endTop1 + $paddinTexto;
				imagettftext( $imagem, $fontTituloSize, 0, $marginLeft, $endTop1, $fontColor, $fontTitulo, "ENDEREÇO:" );
				imagettftext( $imagem, $fontTextoSize, 0, $marginLeft, $endTop2, $fontColor, $fontTexto, $this->endereco );

				//campo resposavel
					//setando as margens
					$respTop1 = $endTop2 + $paddinTitulo;
					$respTop2 = $respTop1 + $paddinTexto;
				imagettftext( $imagem, $fontTituloSize, 0, $marginLeft, $respTop1, $fontColor, $fontTitulo, "RESPOSÁVEL:" );
				imagettftext( $imagem, $fontTextoSize, 0, $marginLeft, $respTop2, $fontColor, $fontTexto, $this->responsavel );
				
				//criando a imagem
				imagejpeg( $imagem, $local, $qualidade );
				
				//liberando a memoria
				imagedestroy( $imagem );
	}
}

$imagem = new carteirinha;
$imagem->endereco('TV. SAO LUIS, 618');
$imagem->escola('FELISBELO JARGUAR SUSSUARANA');
$imagem->nascimento('05/05/1989');
$imagem->nome('FABIANA LETICIA SILVA');
$imagem->responsavel('ANA M F GARCIA');
$imagem->serie('3 ANO');
$imagem->turno('TARDE');
$imagem->imprime();
