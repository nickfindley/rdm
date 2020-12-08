<?php
if ( ! function_exists( 'rdm_preload' ) ) :
    function rdm_preload()
    {
        // echo '<link rel="preload" href="https://use.typekit.net/" as="font" crossorigin="anonymous">' . "\n";
        // echo '<link rel="preload" href="' . get_template_directory_uri() . '/dist/fonts/fontawesome/fa-solid-900.woff2" as="font" crossorigin="anonymous">';
        // https://stackoverflow.com/q/25577981/636781
        
        echo '<link rel="preload" href="https://use.typekit.net/" as="font">' . "\n";
        echo '<link rel="preload" href="' . get_template_directory_uri() . '/dist/fonts/fontawesome/fa-solid-900.woff2" as="font" crossorigin="anonymous">';
    }

    add_action( 'wp_head', 'rdm_preload' );
endif;