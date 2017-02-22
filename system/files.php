<?php

class files{
	
	private $name;
	private $path;
	private $file;
	private $type = ".txt";
	public $msg;
	
	function __construct( $path = NULL, $name = NULL ){
		
		( !empty( $path ) ) ? $this->path = $path : $this->path = false;
		( !empty( $name ) ) ? $this->name = $name : $this->name = false;
		
		$this->file = $this->path . $this->name . $this->type;

		if( file_exists( $this->file ) ){
			$this->writeFile();
			$this->closeFile();
		};

	}
	
	private function openFile(){
		return fopen( $this->file, "a+" );
	}
	
	private function closeFile(){
		return fclose( $this->openFile() );
	}
	
	public function writeFile( $content = NULL ){
		return fwrite( $this->openFile(), $content );
	}
	
	public function errorMsg(){
		return exit('<script type="text/javascript">alert("Já foi exportado um protocolo com esse mesmo nome!");</script>');
	}
	

}