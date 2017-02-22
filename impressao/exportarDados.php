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
	private $codForm;
	private $folder;
	private $tiragem;

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
	
	function codForm( $campo ){
		return $this->codForm = $campo;
	}
	
	function folder( $campo ){
		return $this->folder = $campo;
	}

	function tiragem( $campo ){
		return $this->tiragem = $campo;
	}

	function alldate(){
		return array( $this->escola, $this->nome, $this->turno, $this->serie, $this->nascimento, $this->endereco, $this->responsavel, $this->codForm, $this->folder, $this->tiragem );
	}
									
	function imprime( ){
		header( "Content-type: image/jpg" );
		
			// predefinição da imagem
			$altura		= 650;
			$largura	= 1004;
			$qualidade	= 100;
			$local		= '';

			//predefinição do texto
			$normal = 'arialbd.ttf';
			$negrito = 'ariblk.ttf';
			$italico = 'trebucit.ttf';
			$negritoItalico = 'trebucbi.ttf';
			
			$fontTitulo	= $normal;			
			$fontTexto	= $negrito;
			
			$fontTamanho = 18;
			
			$fontTituloSize = 14;
			$fontTextoSize	= 20;
			
			
			//predefinição de margens
			$marginLeft = 340;
			$marginTop	= 275;
			
			$paddinTitulo = 40;
			$paddinTexto = 	25;
			
			$paddinLeft = 150;
							
				//criando a imagem
				// @$imagem = imagecreate( $largura, $altura );

				@$imagem = imagecreatefromjpeg("molde.jpg");
					
				//definição de cores
				$background	= imagecolorallocate( $imagem, 255, 255, 255 );
				$fontColor	= imagecolorallocate( $imagem, 0, 0, 0 );
				$fontAlert	= imagecolorallocate( $imagem, 128, 0, 0 );
										
				//campos impressos na imagem
				

				//campo tiragem
					//setando as margens
					$escolaTop1 = $marginTop;
					$escolaTop2 = $escolaTop1 + $paddinTexto;
				if( !empty( $this->tiragem ) ){
				imagettftext( $imagem, $fontTextoSize-4, 0, $marginLeft+150, $marginTop-60, $fontAlert, $fontTexto, "TIRAGEM ESPECIAL " . $this->tiragem  . "/1.500 und \n      VÁLIDO ATÉ 31/03/2016");

				
				}


				//campo escola
					//setando as margens
					$escolaTop1 = $marginTop;
					$escolaTop2 = $escolaTop1 + $paddinTexto;
				imagettftext( $imagem, $fontTituloSize, 0, $marginLeft, $marginTop, $fontColor, $fontTitulo, "ESCOLA:" );
				imagettftext( $imagem, $fontTextoSize, 0, $marginLeft, $marginTop+25, $fontColor, $fontTexto, $this->escola );

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

					
					if( !empty( $this->responsavel ) ){
						//campo resposavel
							//setando as margens
							$respTop1 = $endTop2 + $paddinTitulo;
							$respTop2 = $respTop1 + $paddinTexto;

						imagettftext( $imagem, $fontTituloSize, 0, $marginLeft, $respTop1, $fontColor, $fontTitulo, "RESPONSÁVEL:" );
						imagettftext( $imagem, $fontTextoSize, 0, $marginLeft, $respTop2, $fontColor, $fontTexto, $this->responsavel );
						
					}
				
				//criando a imagem
				
				if (!@dir($this->folder)) {
					mkdir($this->folder);
					chmod($this->folder, 0777);
				}else{
					chmod($this->folder, 0777);
				}


				// @imagejpeg( $imagem, $this->folder."/".$this->codForm.".jpg", $qualidade );
				@imagepng( $imagem );
				
				//liberando a memoria
				imagedestroy( $imagem );
	}
}
