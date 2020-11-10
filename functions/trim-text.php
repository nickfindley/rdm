<?php
function rdm_trim_text( $text, $count = 35 )
{
    $text = strip_tags( str_replace( "  ", " ", $text ) );
    $string = explode( " ", $text );

    for ( $counter = 0; $counter <= $count; $counter++ ) :
        $trimmed .= $string[$counter];
        if ( $counter < $count ) :
            $trimmed .= " ";
        else :
            $trimmed = trim( $trimmed, ',;:' );
            $trimmed .= "...";
        endif;
    endfor;

    echo $trimmed;
}