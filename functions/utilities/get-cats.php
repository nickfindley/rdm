<?php
function get_cats()
{
    $post_cats = array();
    $categories = get_the_category();
    foreach ( $categories as $cat ) :
        if ( $cat->category_parent == 1 || $cat->cat_ID == 1 )
        continue;
        array_push( $post_cats, $cat->cat_ID );
    endforeach;
    return $post_cats;
}