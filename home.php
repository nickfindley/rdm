<?php
    get_header();
    $page_for_posts = get_option( 'page_for_posts' );
    $page_color = get_field( 'page_color', $page_for_posts ) ? get_field( 'page_color', $page_for_posts ) : 'blue';
?>
<main id="content" class="blog-page">
    <?php       
        if ( has_post_thumbnail( $page_for_posts ) ) : ?>
    <header class="page-header big-image-header big-image-header-4x3 bg-<?php echo $page_color; ?>" id="pageHeader">
        <?php echo get_the_post_thumbnail( $page_for_posts, 'full' ); ?>
        <div class="overlay">
            <h1>
                <div class="container">
                    <?php the_field( 'blog_name', 'options' ); ?>
                    <span class="subheading">
                        The <img class="rdm-logo" src="/wp-content/themes/rdm/dist/img/rdm.white.trans.png" alt="RDM"> Blog
                    </span>
                </div>
            </h1>
        </div>
    </header>

    <?php else : ?>

    <header class="page-header plain-header bg-<?php echo $page_color; ?>" id="pageHeader">
        <h1>
            <div class="container">
                <?php the_field( 'blog_name', 'options' ); ?>
                <span class="subheading">
                    The <img class="rdm-logo" src="/wp-content/themes/rdm/dist/img/rdm.white.trans.png" alt="RDM"> Blog
                </span>
            </div>
        </h1>
    </header>
    <?php endif; ?>

    <div class="container">
        <div class="row">
            <section class="blog-content">
            <?php
                if ( have_posts() ) :
                    while ( have_posts() ) :
                        the_post();
                        get_template_part( 'content/post' );
                    endwhile;
                    echo bootstrap_pagination();
                endif;
            ?>
            </section>

            <div class="blog-sidebars">
                <div class="blog-sidebars-row">
                    <aside class="blog-sidebar">
                        <h3>RDM's <?php the_field( 'blog_name', 'options' ); ?> Blog</h3>
                        <?php the_field( 'blog_description', 'options' ); ?>

                        <h3>Post Categories</h3>
                        <ul class="blog-sidebar-categories">
                            <?php wp_list_categories( array( 'title_li' => '', 'hide_empty' => 0, 'exclude' => '1' ) ); ?>
                        </ul>
                    </aside>

                    <aside class="blog-sidebar">
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

                        <h3>Members &amp; <br>Associates</h3>
                        <ul class="blog-sidebar-attorneys">
                        <?php
                            $args = array(
                                'number' => 15,
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
                            <li><a href="/attorneys/" class="view-all">Meet all of the attorneys at RDM <i class="fas fa-angle-right"></i></a></li>
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>