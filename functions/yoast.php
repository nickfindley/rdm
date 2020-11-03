<?php
add_filter( 'wpseo_title', 'rdm_author_title' );

function rdm_author_title( $title )
{
    if ( is_author() ) :
        $author = get_queried_object();
        $author_id = $author->ID;
        $attorney_title = get_field( 'title', 'user_' . $author_id );
        if ( ! empty ( get_the_author_meta( 'last_name', $author_id ) ) ) : 
            $last_name = ' ' . get_the_author_meta( 'last_name', $author_id );
        endif;
        $title = get_the_author_meta( 'first_name', $author_id ) . $last_name . ', '  . $attorney_title . ' at Rasmussen Dickey Moore | RDM';
    endif;
    return $title;
}

add_filter( 'wpseo_breadcrumb_links', 'rdm_author_breadcrumbs' );

function rdm_author_breadcrumbs( $links )
{
    if ( is_author() ) :
        $author = get_queried_object();
        $author_id = $author->ID;
        if ( ! empty ( get_the_author_meta( 'last_name', $author_id ) ) ) : 
            $last_name = ' ' . get_the_author_meta( 'last_name', $author_id );
        endif;

        $links = array (
            array (
                'url' => '/',
                'text' => 'RDM.law'
            ),
            array (
                'url' => '\/attorneys\/',
                'text' => 'Attorneys'
            ),
            array (
                'url' => null,
                'text' => get_the_author_meta( 'first_name', $author_id ) . $last_name
            )
        );
    endif;
    return $links;
}