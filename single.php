<?php
    get_header();
    $post_color = get_field( 'post_color' ) ? get_field( 'post_color' ) : 'blue';
?>
<main id="content">
    
    <?php if ( has_post_thumbnail() ) : ?>
    <header class="page-header big-image-header bg-<?php echo $post_color; ?>" id="pageHeader">
        <?php the_post_thumbnail(); ?>
        <div class="overlay">
            <h1>
                <div class="container">
                    <?php the_title(); ?>
                    <?php if ( get_field( 'post_subtitle' ) ) : ?>
                    <span class="subheading"><?php the_field( 'post_subtitle' ); ?></span>
                    <?php endif; ?>
                </div>
            </h1>
        </div>
    </header>

    <?php else : ?>

    <header class="page-header plain-header bg-<?php echo $post_color; ?>" id="pageHeader">
        <h1>
            <div class="container">
                <?php the_title(); ?>
                <?php if ( get_field( 'post_subtitle' ) ) : ?>
                <span class="subheading"><?php the_field( 'post_subtitle' ); ?></span>
                <?php endif; ?>
            </div>
        </h1>
    </header>
    <?php endif; ?>

    <article>
        <div class="container">
            <div class="single post-<?php echo $post_color; ?>">
                <section class="single-content">
                <?php
                    the_content();

                    if ( get_field( 'post_photo_credits' ) ) :
                ?>
                <p class="small muted">
                    <?php the_field( 'post_photo_credits' ); ?>
                </p>
                <?php
                    endif;
                ?>
                </section>

                <aside class="single-meta">                
                <?php
                    $users = get_field( 'post_authors' );
                    if ( $users ) :
                        if ( count ( $users ) > 1 ) :
                            echo '<h3>Authors</h3>';
                        else : 
                            echo '<h3>Author</h3>';
                        endif;
                ?>
                    <ul class="post-authors">
                <?php
                        foreach ( $users as $user ) :
                ?>
                        <li>
                            <div class="attorney-photo">
                <?php
                            echo wp_get_attachment_image( get_field( 'photo', 'user_' . $user->ID ), 'medium' );
                ?>
                            </div>
                            <a class="stretched-link" href="<?php echo get_author_posts_url( $user->ID ); ?>">
                                <?php echo $user->display_name; ?>
                                <br>
                                <span class="attorney-title">
                                    <?php the_field( 'title', 'user_' . $user->ID ); ?>
                                </span>
                            </a>
                        </li>
                <?php
                        endforeach;
                    echo '</ul>';
                    endif;
                ?>

                <h3>Published</h3>
                <p class="post-published"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?><br><span class="permalink">Permanent Link</span></a></p>

                <?php
                    $areas = get_field( 'post_practice_areas' );
                    if ( $areas ) :
                ?>
                <h3>Practice Areas</h3>
                <ul class="post-categories">
                <?php
                        foreach ( $areas as $post ) :
                            setup_postdata( $post->ID );
                ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php
                            wp_reset_postdata();
                        endforeach;
                    endif;
                ?>
                </ul>

                <?php
                    $cats = get_cats();
                    if ( ! empty( $cats ) ) :
                        $categories = get_the_category();
                ?>
                <h3>News Categories</h3>
                <ul class="post-categories">
                <?php
                        foreach ( $categories as $c ) :
                ?>
                    <li><a href="<?php echo get_category_link( $c->term_id ); ?>"><?php echo $c->name; ?></a></li>
                <?php
                        endforeach;
                ?>
                </ul>
                <?php
                    endif;

                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 5,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'post__not_in' => array( $post->ID )
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
                </aside>
            </div>
        </div>
    </article>
</main>
<?php get_footer(); ?>