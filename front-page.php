<?php get_header(); ?>
<main id="content">
    <?php the_content(); ?>

    <section class="front-page-content">
        <div class="container">
            <div class="row">
                <div class="front-page-blog">
                    <header>
                        <h2>From RDM&rsquo;s Knowledge Blog</h2>
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
                            $post_color = get_field( 'post_color' ) ? get_field( 'post_color' ) : 'blue';
                            get_template_part( 'content/front-page-post' );
                        endwhile;
                    endif;
                    wp_reset_postdata();
                ?>
                </div>

                <aside class="attorneys">
                    <h3>Members &amp; <br>Associates</h3>
                    <ul>
                    <?php
                        $args = array(
                            'number' => -1,
                            'meta_key' => 'start_date',
                            'orderby' => 'start_date',
                            'order' => 'ASC',
                            'role' => 'contributor',
                            'fields' => 'all'
                        );
                        $attorneys_query = new WP_User_Query( $args );
                        $attorneys = $attorneys_query->get_results();
                        if ( ! empty ( $attorneys ) ) :
                            foreach ( $attorneys as $attorney ) :
                                $info = get_userdata( $attorney->ID );
                                $user_id = 'user_' . $attorney->ID;
                                ?>
                        <li>
                            <a href="<?php echo get_author_posts_url( $attorney->ID ); ?>"><span class="attorney-name"><?php echo $info->first_name . ' ' . $info->last_name; ?></span><br>
                            <span class="attorney-title"><?php the_field( 'title', $user_id ); ?></span></a>
                        </li>
                                <?php
                            endforeach;
                        endif;
                    ?>
                    </ul>

                    <h3>Diversity &amp; <br>Inclusion</h3>
                    <p>RDM is committed to promoting diversity and inclusion regardless of race, gender, sexual orientation, religion, or any other factor. <a href="/diversity/">Read our diversity statement here.</a></p>
                </aside>

                <aside class="additional-content additional-content-col-1">
                    <h3>Practice <br>Areas</h3>
                    <ul>
                    <?php
                        $args = array(
                            'post_type' => 'practice_areas',
                            'posts_per_page' => -1,
                            'orderby' => 'title',
                            'order' => 'ASC'
                        );
                        $services_query = new WP_Query( $args );
                        if ( $services_query->have_posts() ) :
                            while ( $services_query->have_posts() ) :
                                $services_query->the_post();
                                ?>
                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></l1>
                                <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                    ?>
                    </ul>

                    <h3>Knowledge</h3>
                    <p>RDM brings decades of experience and deep industry knowledge to our clients. Read our <a href="/knowledge/">Knowledge Blog</a> for insight and opinions on news that affects our corner of the legal world.</p>
                    <h4>News Categories</h4>
                    <ul>
                        <?php wp_list_categories( array( 'title_li' => '', 'hide_empty' => 0, 'exclude' => '1' ) ); ?>
                    </ul>
                </aside>

                <aside class="additional-content additional-content-col-2">
                    <h3>Office <br>Locations</h3>
                    <ul>
                    <?php
                        $args = array(
                            'post_type' => 'offices',
                            'posts_per_page' => -1,
                            'orderby' => 'menu_order',
                            'order' => 'ASC'
                        );
                        $offices_query = new WP_Query( $args );
                        if ( $offices_query->have_posts() ) :
                            while ( $offices_query->have_posts() ) :
                                $offices_query->the_post();
                                ?>
                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></l1>
                                <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                    ?>
                    </ul>

                    <h3>Licensed <br>to Practice</h3>
                    <ul class="admissions">
                    <?php
                    wp_list_pages( array(
                            'post_type' => 'admissions', // replace with your cpt's slug
                            'title_li' => '', // don't include a title LI
                            'post_status' => 'publish', // don't include private/draft/etc.
                            'sort_column' => 'post_title', // order by post title
                            'walker' => new rdm_walker
                        )
                    );
                    ?>
                    </ul>
                </aside>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>