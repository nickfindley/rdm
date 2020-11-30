<?php
    get_header();
    $page_color = get_field( 'page_color' ) ? get_field( 'page_color' ) : 'blue';
?>
<main id="content">
    
    <?php if ( has_post_thumbnail() ) : ?>
    <header class="page-header big-image-header bg-<?php echo $page_color; ?>" id="pageHeader">
        <?php the_post_thumbnail(); ?>
        <div class="overlay">
            <h1>
                <div class="container">
                    <?php the_title(); ?>
                    <?php if ( get_field( 'page_subtitle' ) ) : ?>
                    <span class="subheading"><?php the_field( 'page_subtitle' ); ?></span>
                    <?php endif; ?>
                </div>
            </h1>
        </div>
    </header>

    <?php else : ?>

    <header class="page-header plain-header bg-<?php echo $page_color; ?>" id="pageHeader">
        <h1>
            <div class="container">
                <?php the_title(); ?>
                <?php if ( get_field( 'page_subtitle' ) ) : ?>
                <span class="subheading"><?php the_field( 'page_subtitle' ); ?></span>
                <?php endif; ?>
            </div>
        </h1>
    </header>
    <?php endif; ?>

    <div class="container">
        <div class="row">
            <div class="practice-content">
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
                                'key' => 'practice_areas',
                                'value' => $post->ID,
                                'compare' => 'LIKE'
                            ),
                            'order_clause' => array(
                                'key' => 'start_date',
                                'compare' => 'EXISTS'
                            )
                        ),
                        'orderby' => 'order_clause'
                    );
                    $founding_members_query = new WP_User_Query( $founding_members_args );
                    $founding_members = $founding_members_query->get_results();
                    if ( ! empty ( $founding_members ) ) :
                        foreach ( $founding_members as $attorney ) : 
                            include( 'content/attorney-card.php' );
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
                                'key' => 'practice_areas',
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
                            include( 'content/attorney-card.php' );
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
                                'key' => 'practice_areas',
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
                            include( 'content/attorney-card.php' );
                        endforeach;
                    endif;
                ?>
                </ul>
                <?php
                    if ( get_field( 'page_photo_credits' ) ) :
                ?>
                <p class="small muted">
                    <?php the_field( 'page_photo_credits' ); ?>
                </p>
                <?php
                    endif;
                ?>
            </div>

            <aside class="single-sidebar">
                <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 5,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'suppress_filters' => true,
                        'meta_query' => array(
                            array(
                                'key' => 'post_practice_areas',
                                'value' => '"' . $post->ID . '"',
                                'compare' => 'LIKE'
                            )
                        )
                    );
                    
                    $posts_query = new WP_Query( $args );
                    if ( $posts_query->have_posts() ) :
                ?>
                <h3>Recent Posts from RDM's <?php the_field( 'blog_name', 'options' ); ?> Blog</h3>
                <ul>
                <?php
                    while ( $posts_query->have_posts() ) :
                        $posts_query->the_post();

                        $users = get_field( 'post_authors' );
                        if ( $users ) :
                            $authors = array();
                            foreach ( $users as $user ) :
                                $authors[] = $user->display_name;
                            endforeach;
                            $author_string = natural_language_join( $authors );
                        else : 
                            $author_string = get_the_author_meta( 'display_name' );
                        endif;
                    ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?> <span class="post-author">by <?php echo $author_string; ?></span></a></li>
                    <?php
                        endwhile;
                    ?>
                    <li><a href="/knowledge/" class="view-all">Visit RDM's Knowledge Blog <i class="fas fa-angle-right"></i></a></li>
                </ul>
                <?php
                    endif;
                    wp_reset_postdata();
                ?>

                <h3>Other Practice Areas</h3>
                <ul>
                <?php
                    $args = array(
                        'post_type' => 'practice_areas',
                        'posts_per_page' => -1,
                        'orderby' => 'title',
                        'order' => 'ASC',
                        'post__not_in' => array( get_the_ID() )
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

                <h3><?php the_title(); ?> Attorneys</h3>
                <ul>
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
                                'key' => 'practice_areas',
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
                            include( 'content/modal-attorneys-listing.php' );
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
                                'key' => 'practice_areas',
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
                            include( 'content/modal-attorneys-listing.php' );
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
                                'key' => 'practice_areas',
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
                            include( 'content/modal-attorneys-listing.php' );
                        endforeach;
                    endif;
                ?>
                </ul>
            </aside>
        </div>
    </div>
</main>
<?php get_footer(); ?>