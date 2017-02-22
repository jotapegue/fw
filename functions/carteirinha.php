<?php


class carteirinha extends image{

	private $titleFont = "fonts/arial.ttf";
	private $caracterFont = "fonts/arialbd.ttf";
	private $titleSize = 14;
	private $caracterSize = 20;
	private $marginl = 340;
	private $margint = 275;
	
	function __construct(){
		parent::__construct(1004,650);
		self::backgroundColor(255,255,255);
		// self::backgroundImage("molde.jpg");

		self::text( "ESCOLA:", $this->titleSize, $this->marginl, $this->margint, $this->titleFont );
		self::text( "NOME:", $this->titleSize, $this->marginl, $this->margint+70, $this->titleFont );
		self::text( "TURNO:", $this->titleSize, $this->marginl, $this->margint+135, $this->titleFont );
		self::text( "SÉRIE:", $this->titleSize, $this->marginl+180, $this->margint+135, $this->titleFont );
		self::text( "NASCIMENTO:", $this->titleSize, $this->marginl+350, $this->margint+135, $this->titleFont );
		self::text( "ENDEREÇO:", $this->titleSize, $this->marginl, $this->margint+200, $this->titleFont );
		
	}

	function thumb( $value ){
		self::watermark( $value, 48, 245, 0 );
	}

	function escola( $value ){
		self::text( $value, $this->caracterSize, $this->marginl, $this->margint+25, $this->caracterFont );
	}

	function nome( $value ){
		self::text( $value, $this->caracterSize, $this->marginl, $this->margint+95, $this->caracterFont );
	}

	function turno( $value ){
		self::text( $value, $this->caracterSize, $this->marginl, $this->margint+160, $this->caracterFont );
	}

	function serie( $value ){
		self::text( $value, $this->caracterSize, $this->marginl+180, $this->margint+160, $this->caracterFont );
	}

	function nascimento( $value ){
		self::text( $value, $this->caracterSize, $this->marginl+350, $this->margint+160, $this->caracterFont );
	}

	function endereco( $value ){
		self::text( $value, $this->caracterSize, $this->marginl, $this->margint+225, $this->caracterFont );
	}

	function responsavel( $value = null ){
		if( $value ){
			self::text( "RESPONSÁVEL:", $this->titleSize, $this->marginl, $this->margint+255, $this->titleFont );
			self::text( $value, $this->caracterSize, $this->marginl, $this->margint+280, $this->caracterFont );
		}
	}
}

// $carteirinha = new carteirinha;
// $carteirinha->thumb("../impressao/3x4/123456.jpg");
// $carteirinha->escola("FELISBELO JAGUAR SUSSUARANA");
// $carteirinha->nome("JOAO PEDRO FIGUEIRA GARCIA");
// $carteirinha->turno("INTEGRAL");
// $carteirinha->serie("TEC SEGU");
// $carteirinha->nascimento("05/05/1989");
// $carteirinha->endereco("RUA SAO LUIS - 618");
// $carteirinha->responsavel("ANA MARIA FIGUEIRA GARCIA");
// $carteirinha->view();