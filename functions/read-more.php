<?php
function rdm_read_more()
{
    return '<a class="more-link" href="' . get_permalink() . '">Continue reading <span>' . get_the_title() . '</span> <i class="fas fa-angle-right"></i></a>';
}

add_filter( 'the_content_more_link', 'rdm_read_more' );

function rdm_ellipses_more( $more )
{
    if ( has_excerpt() ) :
        return '&hellip;</p><p><a class="more-link" href="' . get_the_permalink() . '">Continue reading  <span>' . get_the_title() . '</span> <i class="fas fa-angle-right"></i></a></p>';
    endif;
}

add_filter( 'excerpt_more', 'rdm_ellipses_more' );

function rdm_trim_excerpt( $excerpt )
{
    global $post;
    $raw_excerpt = $excerpt;
        if ( '' == $excerpt ) :
            $excerpt = get_the_content( '' );
            $excerpt = strip_shortcodes( $excerpt );
            $excerpt = apply_filters( 'the_content', $excerpt );
            $excerpt = substr( $excerpt, 0, strpos( $excerpt, '</p>' ) + 4 );
            $excerpt = str_replace( ']]>', ']]&gt;', $excerpt );

            $excerpt_end = ' <a class="more-link" href="'. esc_url( get_permalink() ) . '">';
            if ( get_post_type() == 'offices' ) :
                $excerpt_end .= sprintf(__( 'Learn more about our <span>%s</span> office <i class="fas fa-angle-right"></i></a>', 'rdm' ), get_the_title() );
            else :
                $excerpt_end .= sprintf(__( 'Continue reading <span>%s</span> <i class="fas fa-angle-right"></i></a>', 'rdm' ), get_the_title() );
            endif;
            $excerpt_end .= '</a>'; 
            $excerpt_more = apply_filters( 'excerpt_more', ' ' . $excerpt_end ); 

            //$pos = strrpos($excerpt, '</');
            //if ($pos !== false)
            // Inside last HTML tag
            //$excerpt = substr_replace($excerpt, $excerpt_end, $pos, 0);
            //else
            // After the content
            $excerpt .= $excerpt_end;

            return $excerpt;   
        endif;
        return apply_filters( 'rdm_trim_excerpt', $excerpt, $raw_excerpt );
}

remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );
add_filter( 'get_the_excerpt', 'rdm_trim_excerpt' ); 