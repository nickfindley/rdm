<?php
if ( ! function_exists( 'natural_language_join' ) ) :
    function natural_language_join( array $list, $conjunction = ', and' )
    {
        if ( count( $list ) > 2 ) :
            $last = array_pop( $list );
            return implode(', ', $list) . '' . $conjunction . ' ' . $last;
        elseif ( count( $list ) == 2 ) :
            return $list[0] . ' and ' . $list[1];
        else :
            return $list[0];
        endif;
        return $last;
    }
endif;
?>