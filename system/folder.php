<?php

class folder {
	
	static function create( $folder ){
		return mkdir( $folder );
		return self::publico( $folder );
	}
	
	static function publico( $folder ){
		return chmod( $folder, 0777 );
	}
	
	static function remove( $folder ){
		return rmdir( $folder );		
	}
}