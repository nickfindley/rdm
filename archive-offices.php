<?php
    get_header();
    $acf_prefix = 'office';
    $page_color = get_field( $acf_prefix . '_page_color', 'option' ) ? get_field( $acf_prefix . '_page_color', 'option' ) : 'blue';
?>
<main id="content">
    
    <?php if ( get_field( $acf_prefix . '_page_image', 'option' ) ) : ?>
    <header class="page-header big-image-header big-image-header-4x3 bg-<?php echo $page_color; ?>" id="pageHeader">
        <?php echo wp_get_attachment_image( get_field( $acf_prefix . '_page_image', 'option' ), 'full' ); ?>
        <div class="overlay">
            <h1>
                <div class="container">
                    <?php
                        if ( get_field( $acf_prefix . '_page_title', 'option' ) ) :
                            the_field( $acf_prefix . '_page_title', 'option' );
                        else : 
                            echo get_the_archive_title();
                        endif;
                    ?>
                    <?php if ( get_field( $acf_prefix . '_page_subtitle', 'option' ) ) : ?>
                    <span class="subheading">
                        <?php the_field( $acf_prefix . '_page_subtitle', 'option' ); ?>
                    </span>
                    <?php endif; ?>
                </div>
            </h1>
        </div>
    </header>

    <?php else : ?>

    <header class="page-header plain-header bg-<?php echo $page_color; ?>" id="pageHeader">
        <h1>
            <div class="container">
                <?php
                    if ( get_field( $acf_prefix . '_page_title', 'option' ) ) :
                        the_field( $acf_prefix . '_page_title', 'option' );
                    else : 
                        echo get_the_archive_title();
                    endif;
                ?>
                <?php if ( get_field( $acf_prefix . '_page_subtitle', 'option' ) ) : ?>
                <span class="subheading">
                    <?php the_field( $acf_prefix . '_page_subtitle', 'option' ); ?>
                </span>
                <?php endif; ?>
            </div>
        </h1>
    </header>
    <?php endif; ?>

    <div class="container">
        <section class="archive-content">
            <?php if ( get_field( $acf_prefix . '_page_content', 'option' ) ) : ?>
            <div class="lede-wrapper">
                <div class="lede">
                    <?php the_field( $acf_prefix . '_page_content', 'option' ); ?>
                </div>
            </div>
            <?php endif; ?>
        <?php
            $args = array(
                'post_type' => 'offices',
                'order' => 'ASC'
            );

            $posts_query = new WP_Query( $args );
            if ( $posts_query->have_posts() ) :
                $count = 0;
                $odd_even = '';
                while ( $posts_query->have_posts() ) :
                    $count++;
                    if ( $count % 2 ) :
                        $odd_even = 'odd';
                    else :
                        $odd_even = 'even';
                    endif;
                    $posts_query->the_post();
                    get_template_part( 'content/office' );
                endwhile;
                wp_reset_postdata();
            endif;
        ?>
        </section>
    </div>
</main>
<?php get_footer(); ?>