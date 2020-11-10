<?php
class rdm_walker extends Walker_page
{
    public function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 )
    {
        if( $depth ) :
            $indent = str_repeat("\t", $depth);
        else :
            $indent = '';
        endif;

        extract( $args, EXTR_SKIP );
        $css_class = array( 'page_item' );
        
        if ( ! empty( $current_page ) ) :
            $_current_page = get_page( $current_page );
            $children = get_children( 'post_type=page&post_status=publish&post_parent=' . $page->ID) ;
            if( count( $children ) != 0 ) :
                $css_class[] = 'hasChildren';
            endif;

            if( isset( $_current_page->ancestors ) && in_array( $page->ID, (array) $_current_page->ancestors ) ) :
                $css_class[] = 'current_page_ancestor';
            endif;

            if( $page->ID == $current_page ) :
                $css_class[] = 'current_page_item';
            elseif ( $_current_page && $page->ID == $_current_page->post_parent ) :
                $css_class[] = 'current_page_parent';
            endif;
        elseif ( $page->ID == get_option( 'page_for_posts' ) ) :
            $css_class[] = 'current_page_parent';
        endif;

        $css_class = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );
        if( $page->ID == $current_page ) :
            $output .= $indent .'<li class="' . $css_class . '">' . $page->post_title;
        else :
            $output .= $indent .'<li class="' . $css_class . '"><a href="' . get_permalink($page->ID) . '">' . $page->post_title .'</a>';
        endif;
    }
}

class rdm_no_link_walker extends Walker_page
{
    public function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 )
    {
        if( $depth ) :
            $indent = str_repeat("\t", $depth);
        else :
            $indent = '';
        endif;

        extract( $args, EXTR_SKIP );
        $css_class = array( 'page_item' );
        
        if ( ! empty( $current_page ) ) :
            $_current_page = get_page( $current_page );
            $children = get_children( 'post_type=page&post_status=publish&post_parent=' . $page->ID) ;
            if( count( $children ) != 0 ) :
                $css_class[] = 'hasChildren';
            endif;

            if( isset( $_current_page->ancestors ) && in_array( $page->ID, (array) $_current_page->ancestors ) ) :
                $css_class[] = 'current_page_ancestor';
            endif;

            if( $page->ID == $current_page ) :
                $css_class[] = 'current_page_item';
            elseif ( $_current_page && $page->ID == $_current_page->post_parent ) :
                $css_class[] = 'current_page_parent';
            endif;
        elseif ( $page->ID == get_option( 'page_for_posts' ) ) :
            $css_class[] = 'current_page_parent';
        endif;

        $css_class = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );
        if( $page->ID == $current_page ) :
            $output .= $indent .'<li class="' . $css_class . '">' . $page->post_title;
        else :
            $output .= $indent .'<li class="' . $css_class . '">' . $page->post_title;
        endif;
    }
}