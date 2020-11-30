<?php
if ( ! function_exists( 'rdm_enqueue_scrips' ) ) :
    function rdm_enqueue_scripts()
    {
        if ( ! is_admin() ) :
            wp_deregister_script( 'jquery' );

            wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.5.1.min.js', false, '3.5.1', true );
            wp_enqueue_script( 'jquery' );
        endif;

        wp_deregister_script( 'wp-embed' );

        wp_register_script( 'main_js', get_template_directory_uri() . '/dist/js/main.js', false, '4.1.3', true );
        wp_enqueue_script( 'main_js' );
    }

    add_action( 'wp_enqueue_scripts', 'rdm_enqueue_scripts' );
endif;

if ( ! function_exists( 'rdm_deregister_forminator' ) ) :
    function rdm_deregister_forminator()
    {
        if ( ! is_page( 'contact' ) ) :
            wp_dequeue_script( 'forminator-jquery-validate' );
            wp_dequeue_script( 'forminator-custom-form-moment' );
            wp_dequeue_script( 'forminator-select2' );
            wp_dequeue_script( 'forminator-form' );
            wp_dequeue_script( 'forminator-front-scripts' );
            wp_dequeue_script( 'forminator-intlTelInput' );
        endif;
    }

    add_action( 'wp_enqueue_scripts', 'rdm_deregister_forminator', 100 );
endif;
?>