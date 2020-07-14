<?php
if ( ! function_exists( 'rdm_image_sizes' ) ) :
    function rdm_image_sizes()
    {
        add_image_size( 'xs', 500, 1500 );
        add_image_size( 'sm', 540, 1620 );
        add_image_size( 'md', 690, 2070 );
        add_image_size( 'lg', 930, 2790 );
        add_image_size( 'xl', 1110, 3330 );
    }
endif;
add_action( 'init', 'rdm_image_sizes' );

if ( ! function_exists( 'rdm_intermediate_image_sizes' ) ) :
    function rdm_intermediate_image_sizes( $sizes )
    {    
        unset( $sizes[ 'medium_large' ] );
        unset( $sizes[ 'large' ] ); 
        return $sizes;
    }
endif;
add_filter( 'intermediate_image_sizes_advanced', 'rdm_intermediate_image_sizes', 10, 2 );
?>