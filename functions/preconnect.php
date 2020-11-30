<?php
function rdm_preconnect()
{
    echo '<link rel="preload" href="https://use.typekit.net/" as="style">';
}

add_action( 'wp_head', 'rdm_preconnect' );