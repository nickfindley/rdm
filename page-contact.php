<?php
    get_header();
    $page_color = get_field( 'page_color' ) ? get_field( 'page_color' ) : 'blue';
?>
<main id="content" class="contact-page">
    <header class="page-header big-image-header page-header bg-<?php echo $page_color; ?>" id="pageHeader">
        <?php
            the_post_thumbnail();
        ?>
        <div class="overlay">
            <h1>
                <div class="container">
                    <?php the_title(); ?>
                </div>
            </h1>
        </div>
    </header>

    <div class="container page-with-sidebar">
        <div class="row">
            <section class="page-content">
            <?php the_content(); ?>
            </section>

            <aside class="page-sidebar">
                <h3>Our Offices</h3> 
                <?php
                    $args = array(
                        'post_type' => 'offices',
                        'posts_per_page' => -1,
                        'orderby' => 'title',
                        'order' => 'ASC'
                    );
                    $offices_query = new WP_Query( $args );
                    if ( $offices_query->have_posts() ) :
                ?>
                <ul class="offices">
                <?php
                        while ( $offices_query->have_posts() ) :
                            $offices_query->the_post();
                ?>
                    <li>
                        <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                        <?php echo phone_format( get_field( 'main_phone' ) ); ?><br>
                        <?php the_field( 'address' ); ?><br>
                        <?php the_field( 'address_2' ); ?><br>
                        <?php the_field( 'city' ); ?>, <?php the_field( 'state' ); ?> <?php the_field( 'zip' ); ?>
                    </li>
                <?php
                        endwhile;
                ?>
                </ul>
                <?php
                    endif;
                    wp_reset_postdata();
                ?>
            </aside>
        </div>
    </div>
</main>
<?php get_footer(); ?>