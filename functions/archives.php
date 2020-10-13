<?php
function rdm_archive_posts_per_page( $query )
{
    if ( $query->is_post_type_archive( 'practice_areas' ) && !is_admin() ) :
        $query->set( 'posts_per_page', -1 );
    endif;
}
add_action( 'pre_get_posts', 'rdm_archive_posts_per_page' );
?>