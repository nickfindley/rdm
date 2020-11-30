<?php
function rdm_contactmethods( $contactmethods )
{
    unset( $contactmethods['twitter'] );
    unset( $contactmethods['facebook'] );
    unset( $contactmethods['instagram'] );
    unset( $contactmethods['wikipedia'] );
    unset( $contactmethods['linkedin'] );
    unset( $contactmethods['myspace'] );
    unset( $contactmethods['pinterest'] );
    unset( $contactmethods['soundcloud'] );
    unset( $contactmethods['tumblr'] );
    unset( $contactmethods['youtube'] );

    $contactmethods['telephone'] = 'Telephone';
    $contactmethods['mobile'] = 'Mobile';
    $contactmethods['linkedin'] = 'LinkedIn';
    $contactmethods['avvo'] = 'Avvo';

    return $contactmethods;
}

add_filter('user_contactmethods','rdm_contactmethods',10,1);

add_filter( 'option_show_avatars', '__return_false' );
?>