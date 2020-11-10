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
            <section class="practice-content">
                <?php the_content(); ?>

                <h3>RDM&rsquo;s <?php the_title(); ?> Attorneys</h3>
                <ul class="content-attorneys">
                <?php
                    $office_id = get_the_ID();

                    $args = array(
                        'role' => 'contributor',
                        'fields' => 'all',
                        'meta_query' => array(
                            'relation' => 'AND',
                            'practice_clause' => array(
                                'key' => 'office',
                                'value' => $office_id,
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
            </section>

            <aside class="single-sidebar">
                <h3>Contact RDM in <?php the_title(); ?></h3>
                <ul>
                    <li>
                        <?php the_field( 'address' ); ?><br>
                        <?php the_field( 'address_2' ); ?><br>
                        <?php the_field( 'city' ); ?>, <?php the_field( 'state' ); ?> <?php the_field( 'zip' ); ?>
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