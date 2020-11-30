<?php
add_action( 'pre_user_query', 'rdm_order_by_rand' );
function rdm_order_by_rand( $query )
{
    if ( 'rand' == $query->query_vars['orderby'] ) :
        $query->query_orderby = str_replace( 'user_login', 'RAND()', $query->query_orderby );
    endif;
}