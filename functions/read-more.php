<?php
function rdm_read_more()
{
    return '<a class="more-link" href="' . get_permalink() . '">Continue reading <span>' . get_the_title() . '</span> <i class="fas fa-angle-right"></i></a>';
}

add_filter( 'the_content_more_link', 'rdm_read_more' );

function rdm_ellipses_more( $more )
{
    return '&hellip;</p><p><a class="more-link" href="' . get_the_permalink() . '">Continue reading  <span>' . get_the_title() . '</span> <i class="fas fa-angle-right"></i></a></p>';
}

add_filter( 'excerpt_more', 'rdm_ellipses_more' );