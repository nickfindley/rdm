<?php
// add_action( 'pre_get_posts', 'rdm_archive_sort_order'); 
function rdm_archive_sort_order( $query )
{
    if ( is_post_type_archive( 'practice_areas' ) ) :
        $query->set( 'order', 'ASC' );
        $query->set( 'orderby', 'title' );
    endif;    
};
?>