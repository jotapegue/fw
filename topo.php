<?php
include ( "system/defines.php" );

function __autoload( $class ){
	$file = "system/". $class .".php";
	if( file_exists( $file ) ){
		include( $file );
	}else{
		include("functions/". $class .".php");
	}
}

	

$protocolo = new protocolo;
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="pedro" />
    <meta charset="ISO-8859-1" />

	<title>Exportador de Dados</title>
    
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="includes/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="includes/css/bootstrap-responsive.min.css">
    
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="includes/css/font-awesome.css">
    	<!--[if IE 7]>
    		<link rel="stylesheet" type="text/css" href="includes/css/font-awesome-ie7.min.css">
    	<![endif]-->
	<!-- End Font Awesome -->
 	
       
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="includes/js/html5shiv.js"></script>
      <script src="includes/js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="includes/js/jquery.js"></script>
	<script type="text/javascript">

		function er_replace( pattern, replacement, subject ){
			return subject.replace( pattern, replacement );
		}

		$(document).ready(function(){
		
			$("#usu_cod_form").keyup(function() {
				var $this = $( this );
				$this.val( er_replace( /[^0-9]+/gi,'', $this.val()));
				}
			);
		

			$("#usu_nome").keyup(function() {
				var $this = $( this );
				$this.val( er_replace( /[^a-z]+/gi,' ', $this.val()));
				}
			);


			$("#usu_abreviatura").keyup(function() {
				var $this = $( this );
				$this.val( er_replace( /[^a-z]+/gi,' ', $this.val()));
				}
			);


			$("#usu_dt_nascto").keyup(function() {
				var $this = $( this );
				$this.val( er_replace( /[^0-9]+/gi,'/', $this.val()));
				}
			);


			$("#usu_telefone").keyup(function() {
				var $this = $( this );
				$this.val( er_replace( /[^0-9]+/gi,'', $this.val()));
				}
			);


			$("#usu_serie").keyup(function() {
				var $this = $( this );
				$this.val( er_replace( /[^a-z0-9]+/gi,' ', $this.val()));
				}
			);			

			$("#usu_endereco").keyup(function() {
				var $this = $( this );
				$this.val( er_replace( /[^a-z0-9]+/gi,' ', $this.val()));
				}
			);

			$("#usu_end_num").keyup(function() {
				var $this = $( this );
				$this.val( er_replace( /[^0-9]+/gi,'', $this.val()));
				}
			);


			$("#usu_bairro").keyup(function() {
				var $this = $( this );
				$this.val( er_replace( /[^a-z]+/gi,' ', $this.val()));
				}
			);


			$("#usu_resp_nome").keyup(function() {
				var $this = $( this );
				$this.val( er_replace( /[^a-z]+/gi,' ', $this.val()));
				}
			);


			$("#usu_tiragem").keyup(function() {
				var $this = $( this );
				$this.val( er_replace( /[^0-9]+/gi,'', $this.val()));
				}
			);

		});


		function formatar(mascara, documento){
		  var i = documento.value.length;
		  var saida = mascara.substring(0,1);
		  var texto = mascara.substring(i)
		  
		  if (texto.substring(0,1) != saida){
		            documento.value += texto.substring(0,1);
		  }
		  
	}
	</script>    
</head>
<body>