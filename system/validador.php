<?php

/**
 * @author pedro
 * @copyright 2014
 */

class validador{
    
    
    static function verifica( $campo, $tamanho ){
    
        $field = strlen($campo);
        
        if( $field < $tamanho ){
            
            $espaco = $tamanho - $field;
            
            $i = 1;
            while( $i <= $espaco ){
                @$espacamento .=  " ";
                $i++;
            }
             return $campo . $espacamento . " ";
        }else{
            return $campo . " ";
        }

    }
}
?>
