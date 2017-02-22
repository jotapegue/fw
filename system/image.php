<?php


class image{

	private $width;
	private $height;
	private $image;
	private $photo;
	private $quality = 100;
	
	function __construct( $width = null, $height = null ){

		header("Content-type: image/jpg");
		
		$this->width = $width;
		$this->height = $height;
	}

	function backgroundColor( $red, $green, $blue ){
		$this->image = imagecreate( $this->width, $this->height );
		imagecolorallocate( $this->image, $red, $green, $blue );
	}
	
	function backgroundImage( $value = null ){
		$this->image = imagecreatefromjpeg( $value );
	}

	function text( $text , $size, $marginl, $margint, $font ){
		$color = imagecolorallocate($this->image, 0,0,0);
		imagettftext( $this->image, $size, 0, $marginl, $margint, $color, $font, $text);
	}

	function watermark( $value, $marginl, $margint ){
		$this->photo = imagecreatefromjpeg( $value );
		imagetruecolortopalette($this->photo, true, 255);
		imagecopy( $this->image , $this->photo, $marginl, $margint, 0, 0, 268, 326);
	}

	function view(){
		imagejpeg( $this->image );
		imagedestroy( $this->image );
	}

	function save( $value = null ){
		imagejpeg( $this->image, $value . ".jpg", $this->quality );
		imagedestroy( $this->image );
	}
}

// $image = new image(1004,650);
// $image->backgroundColor(255, 255, 255);
// $image->watermark( "../impressao/3x4/123456.jpg", 48, 245, 0 );
// $image->text("oi", 14, 150, 150, "../impressao/arial.ttf");
// $image->view();