<?php
function rdm_read_more()
{
    return '<a class="more-link" href="' . get_permalink() . '">Continue reading <span>' . get_the_title() . '</span> <svg class="mdi" width="12" height="12" viewBox="0 0 24 24"><path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" /></svg></a>';
}

add_filter( 'the_content_more_link', 'rdm_read_more' );