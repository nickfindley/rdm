<?php
    get_header();
    $page_color = get_field( 'page_color' ) ? get_field( 'page_color' ) : 'blue';
?>
<main id="content">
    <header class="page-header big-image-header big-image-header-2x1 bg-<?php echo $page_color; ?>" id="pageHeader">
        <?php the_post_thumbnail(); ?>
        <div class="overlay">     
            <h1>
                <div class="container">
                    <?php the_title(); ?>
                </div>
            </h1>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <section class="practice-content">
                <?php the_content(); ?>

                <h3>RDM&rsquo;s <?php the_title(); ?> Attorneys</h3>
                <ul class="content-attorneys">
                <?php
                    $founding_members_args = array(
                        'role' => 'contributor',
                        'fields' => 'all',
                        'meta_query' => array(
                            'relation' => 'AND',
                            'title_clause' => array(
                                'key' => 'title',
                                'value' => 'Founding Member',
                                'compare' => '=='
                            ),
                            'practice_clause' => array(
                                'key' => 'office',
                                'value' => $post->ID,
                                'compare' => 'LIKE'
                            ),
                            'order_clause' => array(
                                'key' => 'last_name',
                                'compare' => 'EXISTS'
                            )
                        ),
                        'orderby' => 'order_clause'
                    );
                    $founding_members_query = new WP_User_Query( $founding_members_args );
                    $founding_members = $founding_members_query->get_results();
                    if ( ! empty ( $founding_members ) ) :
                        foreach ( $founding_members as $attorney ) : 
                            include( 'content/attorney-card-short.php' );
                        endforeach;
                    endif;

                    $members_args = array(
                        'role' => 'contributor',
                        'fields' => 'all',
                        'meta_query' => array(
                            'relation' => 'AND',
                            'title_clause' => array(
                                'key' => 'title',
                                'value' => 'Member',
                                'compare' => '=='
                            ),
                            'practice_clause' => array(
                                'key' => 'office',
                                'value' => $post->ID,
                                'compare' => 'LIKE'
                            ),
                            'order_clause' => array(
                                'key' => 'last_name',
                                'compare' => 'EXISTS'
                            )
                        ),
                        'orderby' => 'order_clause'
                    );
                    $members_query = new WP_User_Query( $members_args );
                    $members = $members_query->get_results();
                    if ( ! empty ( $members ) ) :
                        foreach ( $members as $attorney ) :     
                            include( 'content/attorney-card-short.php' );
                        endforeach;
                    endif;

                    $associates_args = array(
                        'role' => 'contributor',
                        'fields' => 'all',
                        'meta_query' => array(
                            'relation' => 'AND',
                            'title_clause' => array(
                                'key' => 'title',
                                'value' => 'Associate',
                                'compare' => '=='
                            ),
                            'practice_clause' => array(
                                'key' => 'office',
                                'value' => $post->ID,
                                'compare' => 'LIKE'
                            ),
                            'order_clause' => array(
                                'key' => 'last_name',
                                'compare' => 'EXISTS'
                            )
                        ),
                        'orderby' => 'order_clause'
                    );
                    $associates_query = new WP_User_Query( $associates_args );
                    $associates = $associates_query->get_results();
                    if ( ! empty ( $associates ) ) :
                        foreach ( $associates as $attorney ) :  
                            include( 'content/attorney-card-short.php' );
                        endforeach;
                    endif;
                ?>
                </ul>
            </section>

            <aside class="single-sidebar">
                <h3>Contact RDM in <?php the_title(); ?></h3>
                <ul>
                    <li>
                        <a href="<?php the_field( 'google_map_url' ); ?>">
                        <?php the_field( 'address' ); ?><br>
                        <?php the_field( 'address_2' ); ?><br>
                        <?php the_field( 'city' ); ?>, <?php the_field( 'state' ); ?> <?php the_field( 'zip' ); ?><br>
                        <span class="sc-smaller-light">click for directions <i class="fas fa-external-link-alt"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="tel:<?php the_field( 'main_phone' ); ?>">
                            <?php echo phone_format( get_field( 'main_phone' ) ); ?>
                        </a>
                    </li>
                    <li><a href="/contact/">Send us a message</a></li>
                </ul>

                <h3>Practice Areas</h3>
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
            </aside>
        </div>
    </div>
</main>
<?php get_footer(); ?>