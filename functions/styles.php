<?php
if ( ! function_exists( 'rdm_enqueue_styles' ) )
{
    function rdm_enqueue_styles()
    {
        wp_enqueue_style( 'typekit', 'https://use.typekit.net/esg0wvn.css' );
        wp_enqueue_style( 'main', autoversion( '/wp-content/themes/rdm/dist/css/main.min.css' ) );
    }

    add_action( 'wp_enqueue_scripts', 'rdm_enqueue_styles' );
}
?>