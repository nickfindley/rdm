<?php
    get_header();
    $post_color = get_field( 'post_color' ) ? get_field( 'post_color' ) : 'blue';
?>
<main id="content">
    <header class="page-header bg-<?php echo $post_color; ?> big-image-header" id="pageHeader">
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
            <div class="practice-content">
                <?php the_content(); ?>

                <h3>RDM&apos;s <?php the_title(); ?> Attorneys</h3>
                <ul class="content-attorneys">
                <?php
                    $practice_id = get_the_ID();

                    $args = array(
                        'role' => 'contributor',
                        'fields' => 'all',
                        'meta_query' => array(
                            'relation' => 'AND',
                            'practice_clause' => array(
                                'key' => 'practice_areas',
                                'value' => $practice_id,
                                'compare' => 'LIKE'
                            ),
                            'order_clause' => array(
                                'key' => 'start_date',
                                'compare' => 'EXISTS'
                            )
                        ),
                        'orderby' => 'order_clause'
                    );
                    $attorneys_query = new WP_User_Query( $args );
                    $attorneys = $attorneys_query->get_results();
                    if ( ! empty ( $attorneys ) ) :
                        foreach ( $attorneys as $attorney ) :
                            $info = get_userdata( $attorney->ID );
                            $user_id = 'user_' . $attorney->ID;
                            ?>
                    <li>
                        <div class="card">
                            <?php echo wp_get_attachment_image( get_field( 'photo', $user_id ), 'full' ); ?>
                            <div class="card-body">
                                <a class="stretched-link" href="<?php echo get_author_posts_url( $attorney->ID ); ?>"><span class="attorney-name"><?php echo $info->first_name . ' ' . $info->last_name; ?></span><br>
                                <span class="attorney-title"><?php the_field( 'title', $user_id ); ?></span></a>
                            </div>
                        </div>
                    </li>
                            <?php
                        endforeach;
                    endif;
                ?>
                </ul>
            </div>

            <div class="practice-sidebar">
                <div class="practice-attorneys">
                    <h3><?php the_title(); ?> Attorneys</h3>
                    <ul>
                    <?php
                        $practice_id = get_the_ID();

                        $args = array(
                            'role' => 'contributor',
                            'fields' => 'all',
                            'meta_query' => array(
                                'relation' => 'AND',
                                'practice_clause' => array(
                                    'key' => 'practice_areas',
                                    'value' => $practice_id,
                                    'compare' => 'LIKE'
                                ),
                                'order_clause' => array(
                                    'key' => 'start_date',
                                    'compare' => 'EXISTS'
                                )
                            ),
                            'orderby' => 'order_clause'
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
                </div>

                <div class="practice-areas">
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
                </div>

                <?php
                    $args = array(
                        'posts_per_page' => 15
                    );
                    $posts_query = new WP_Query( $args );
                    if ( $posts_query->have_posts() ) :
                ?>
                <div class="practice-posts">
                    <h3>Recent Posts from RDM's Knowledge Blog</h3>
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
                <?php endwhile; ?>
                    </ul>
                    <p><a href="/knowledge/">Visit RDM's Knowledge Blog</a></p>
                </div>
                <?php
                    endif;
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>