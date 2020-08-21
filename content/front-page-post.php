<article class="blog-post post-color-<?php global $post_color; echo $post_color; ?>">
    <header>
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail(); ?>
        </div>
    <?php endif ?>
        <h3><?php the_title(); ?></h3>
        <div class="post-meta">
            <p class="byline">
            <?php
                $users = get_field( 'post_authors' );
                if ( $users ) :
                    $authors = array();
                    foreach ( $users as $user ) :
                        $authors[] = '<a href="' . get_author_posts_url( $user->ID ) . '">' . $user->display_name . '</a>';
                    endforeach;
                    echo 'By ' . natural_language_join( $authors );
                else : 
                    echo 'By <a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"> ' . get_the_author_meta( 'display_name' ) . '</a>';
                endif;
            ?> &bull; <?php echo get_the_date(); ?>
            </p>
        </div>
    </header>

    <div class="post-content">
        <?php the_excerpt(); ?>
    </div>
</article>