<?php get_header(); ?>
<main id="content">
    <?php the_content(); ?>

    <section class="front-page-content">
        <div class="container">
            <div class="row">
                <div class="blog">
                    <header>
                        <h2>From RDM&apos;s Knowledge Blog</h2>
                        <p>Read more at <a href="#">rdm.law/knowledge</a>.</p>
                    </header>
                <?php 
                    $args = array(
                        'posts_per_page' => 3
                    );
                    $blog_query = new WP_Query( $args );
                    if ( $blog_query->have_posts() ) :
                        while ( $blog_query->have_posts() ) :
                            $blog_query->the_post();
                            ?>
                    <article class="blog-post">
                        <header>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="blog-post-featured-image">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        <?php endif ?>
                            <h3><?php the_title(); ?></h3>
                        </header>
                        <?php the_excerpt(); ?>
                        <footer>
                            <p>Posted <?php echo get_the_date(); ?></p>
                        </footer>
                    </article>
                            <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                ?>
                </div>
                <div class="additional-content">
                    <h3>Practice <br>Areas</h3>
                    <ul>
                    <?php
                        $args = array(
                            'post_type' => 'services',
                            'posts_per_page' => -1,
                            'orderby' => 'title',
                            'order' => 'ASC'
                        );
                        $services_query = new WP_Query( $args );
                        if ( $services_query->have_posts() ) :
                            while ( $services_query->have_posts() ) :
                                $services_query->the_post();
                                ?>
                                <li><?php the_title(); ?></l1>
                                <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                    ?>
                    </ul>
                </div>
                <div class="additional-content">
                    <h3>Office <br>Locations</h3>
                    <ul>
                        <li>Kansas City</li>
                        <li>St. Louis</li>
                        <li>Los Angeles</li>
                        <li>Chicago</li>
                    </ul>

                    <h3>Diversity &amp;<br>Inclusion</h3>
                    <p>RDM is committed to promoting diversity and inclusion regardless of race, gender, sexual orientation, religion, or any other factor. <a href="#">Read our diversity statement here.</a></p>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>