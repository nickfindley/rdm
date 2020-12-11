<?php
    get_header();
    $page_color = get_field( 'page_color' ) ? get_field( 'page_color' ) : 'blue';
?>
<main id="content">
    
    <?php if ( has_post_thumbnail() ) : ?>
    <header class="page-header big-image-header big-image-header-4x3 bg-<?php echo $page_color; ?>" id="pageHeader">
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

    <div class="container page-with-sidebar">
        <div class="row page-wrapper">
            <section class="page-content">
            <?php the_content(); ?>
            </section>

            <aside class="page-sidebar">
                <h3>Offices</h3>
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

                <h3>Members &amp; Associates</h3>
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
            </aside>
        </div>
    </div>
</main>
<?php get_footer(); ?>