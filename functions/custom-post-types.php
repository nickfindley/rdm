<?php
// show private post types in CPTUI taxonomy selection
add_filter( 'cptui_attach_post_types_to_taxonomy', '__return_empty_array' );