<?php
if ( ! function_exists( 'rdm_enqueue_scrips' ) ) :
    function rdm_enqueue_scripts()
    {
        if ( ! is_admin() ) :
            wp_deregister_script( 'jquery' );
        endif;

        wp_deregister_script( 'wp-embed' );

        // wp_register_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', false, '1.14.3', true );
        // wp_enqueue_script( 'popper' );

        wp_register_script( 'bootstrap_bundle', get_template_directory_uri() . '/dist/js/bootstrap.bundle.min.js', false, '4.1.3', true );
        wp_enqueue_script( 'bootstrap_bundle' );

        // wp_register_script( 'underscore', ABSPATH . '/wp-includes/js/underscore.min.js', false, '1.83', true );
        // wp_enqueue_script( 'underscore' );

        wp_register_script( 'rdm_scripts', get_template_directory_uri() . '/dist/js/scripts.min.js', false, '1.0', true );
        wp_enqueue_script( 'rdm_scripts' );
    }
    add_action( 'wp_enqueue_scripts', 'rdm_enqueue_scripts' );
endif;
?>