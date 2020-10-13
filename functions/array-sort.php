<?php
function arrSortObjsByKey($key, $order = 'DESC')
{
    return function($a, $b) use ($key, $order)
    {
        // Swap order if necessary
        if ($order == 'DESC') :
            list($a, $b) = array($b, $a);
        endif;

        // Check data type
        if ( is_numeric ( $a->$key ) ) :
            return $a->$key - $b->$key; // compare numeric
        else :
            return strnatcasecmp( $a->$key, $b->$key ); // compare string
        endif;
    };
}
?>