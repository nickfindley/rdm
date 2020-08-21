<?php
    get_header();
    $page_color = get_field( 'archive_page_color', 'option' ) ? get_field( 'archive_page_color', 'option' ) : 'blue';
?>
<main id="content">
    <header class="archive-header big-image-header page-header page-header-<?php echo $page_color; ?>" id="pageHeader">
        <?php echo wp_get_attachment_image( get_field( 'archive_page_image', 'option' ), 'full' ); ?>
        <div class="overlay">
            <h1>
                <div class="container">
                    <?php
                        if ( get_field( 'archive_page_title', 'option' ) ) :
                            echo get_field( 'archive_page_title', 'option' );
                        else : 
                            the_archive_title();
                        endif;

                        if ( get_field( 'archive_page_subtitle', 'option' ) ) :
                            echo '<span class="subheading">' . get_field( 'archive_page_subtitle', 'option' ) . '</span>';
                        endif;
                    ?>
                </div>
            </h1>
        </div>
    </header>

    <div class="container">
        <section class="archive-content">
        <?php
            $post_type = get_post_type();
            if ( $post_type ) :
                $post_type_data = get_post_type_object( $post_type );
                $post_type_slug = $post_type_data->rewrite['slug'];
            endif;

            $args = array(
                'post_type' => $post_type,
                'number' => -1,
                'orderby' => 'post_title',
                'order' => 'ASC'
            );

            $posts_query = new WP_Query( $args );
            if ( $posts_query->have_posts() ) :
                $count = 0;
                $odd_even = '';
                while ( $posts_query->have_posts() ) :
                    $count++;
                    if ( $count % 2 ) : $odd_even = 'odd'; else : $odd_even = 'even'; endif;
                    $posts_query->the_post();
                    get_template_part( 'content/archive-' . $post_type_slug );
                endwhile;
                wp_reset_postdata();
            endif;
        ?>
        </section>
    </div>
</main>
<?php get_footer(); ?>