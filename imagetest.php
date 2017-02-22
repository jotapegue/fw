<?php
	header("Content-type: image/png");
	
	$width = 250;
	$heigth = 250;

	$image = imagecreate( $width, $heigth );
	imagecolorallocate( $image, 255, 255, 255 );
	$fontColor = imagecolorallocate( $image, 0, 0, 0 );

	imagettftext(
		$image,
		12,
		0,
		$width/2,
		$heigth/2,
		$fontColor,
		'impressao/arialbd.ttf',
		'teste'
	);

	imagejpeg( $image );
	imagedestroy( $image );
