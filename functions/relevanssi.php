<?php
function rlv_skip_custom_fields( $custom_fields )
{
    $unwanted_fields = array(
        'post_authors',
        'post_practice_areas',
        'post_color',
        'page_color',
        'button_text',
        'button_link'
    );
    $custom_fields = array_diff( $custom_fields, $unwanted_fields );
    return $custom_fields;
}

add_filter( 'relevanssi_index_custom_fields', 'rlv_skip_custom_fields' );