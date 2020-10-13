<?php get_header(); ?>
<main id="content" class="blog-page">
    <header class="blog-header big-image-header page-header bg-red" id="pageHeader">
        <?php
            $page_for_posts = get_option( 'page_for_posts' );
            echo get_the_post_thumbnail( $page_for_posts, 'full' );
        ?>
        <div class="overlay">
            <h1>
                <div class="container">
                    Knowledge <span class="subheading">The <img class="rdm-logo" src="/wp-content/themes/rdm/dist/img/rdm.white.trans.png" alt="RDM"> Blog</span>
                </div>
            </h1>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <section class="blog-content">
            <?php
                if ( have_posts() ) :
                    while ( have_posts() ) :
                        the_post();
                        get_template_part( 'content/post' );
                    endwhile;
                endif;
            ?>
            </section>

            <div class="blog-sidebars">
                <div class="blog-sidebars-row">
                    <aside class="blog-sidebar">
                        <h3>RDM's Knowledge Blog</h3>
                        <p>Vivamus mattis tincidunt velit id dictum. Integer tincidunt mattis convallis. Pellentesque convallis, mauris eget efficitur lobortis, ex lacus vehicula nisi, quis faucibus nunc tellus sit amet dolor.</p>

                        <h3>News Categories</h3>
                        <ul>
                            <?php wp_list_categories( array( 'title_li' => '', 'hide_empty' => 0, 'exclude' => '1' ) ); ?>
                        </ul>
                    </aside>

                    <aside class="blog-sidebar">
                        <h3>Members &amp; <br>Associates</h3>
                        <ul>
                        <?php
                            $args = array(
                                'number' => 10,
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
                            <li class="view-all"><a href="/attorneys/">Meet all of the attorneys at RDM <svg class="mdi" width="12" height="12" viewBox="0 0 24 24"><path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" /></svg></a></li>
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>