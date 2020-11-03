<?php
    get_header();
    $page_color = get_field( 'page_color', 'option' ) ? get_field( 'page_color', 'option' ) : 'blue';
?>
<main id="content">
    <header class="archive-header big-image-header page-header bg-<?php echo $page_color; ?>" id="pageHeader">
        <?php echo wp_get_attachment_image( get_field( 'page_image', 'option' ), 'full' ); ?>
        <div class="overlay">
            <h1>
                <div class="container">
                    <?php the_field( 'page_title', 'option' ); ?>
                    <?php if ( get_field( 'page_subtitle', 'option' ) ) : ?>
                    <span class="subheading"><?php the_field( 'page_subtitle', 'option' ); ?></span>
                    <?php endif; ?>
                </div>
            </h1>
        </div>
    </header>

    <div class="container">
        <section class="archive-content">
            <?php if ( get_field( 'page_content', 'option' ) ) : ?>
            <div class="archive-lede-wrapper">
                <div class="archive-lede">
                    <?php the_field( 'page_content', 'option' ); ?>
                </div>
            </div>
            <?php endif; ?>
        <?php
            $args = array(
                'post_type' => 'practice_areas',
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
                    get_template_part( 'content/practice-area' );
                endwhile;
                wp_reset_postdata();
            endif;
        ?>
        </section>
    </div>
</main>
<?php get_footer(); ?>