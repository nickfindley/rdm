<?php
function rdm_archive_posts_per_page( $query )
{
    if ( $query->is_post_type_archive( 'practice_areas' ) && !is_admin() ) :
        $query->set( 'posts_per_page', -1 );
    endif;
}
add_action( 'pre_get_posts', 'rdm_archive_posts_per_page' );

function rdm_archive_title( $title )
{    
    if ( is_category() ) :    
        $title = single_cat_title( '', false );    
    elseif ( is_tag() ) :   
        $title = single_tag_title( '', false );    
    elseif ( is_author() ) :  
        $title = get_the_author();    
    elseif ( is_tax() ) :
        $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
    elseif ( is_post_type_archive( 'practice_areas' ) ) :
        $title = 'testing' . post_type_archive_title( '', false );
    endif;
    return $title;    
}

add_filter( 'get_the_archive_title', 'rdm_archive_title' );
?>