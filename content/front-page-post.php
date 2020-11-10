<article class="blog-post post-color-<?php global $post_color; echo $post_color; ?>">
    <?php if ( has_post_thumbnail() ) : ?>
    <header class="has-post-thumbnail">
        <div class="post-thumbnail">
            <?php the_post_thumbnail(); ?>
        </div>
    <?php else : ?>
    <header>
    <?php endif; ?>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
            ?> &bull; <a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
            </p>
        </div>
    </header>

    <div class="post-content">
        <?php 
            if ( has_excerpt() ) :
        ?>
            <p><?php echo get_the_excerpt(); ?></p>
            <p><a class="more-link" href="<?php the_permalink(); ?>">Continue reading  <span><?php the_title(); ?></span> <i class="fas fa-angle-right"></i></a></p>
        <?php
            else :
                the_excerpt();
            endif;
        ?>
    </div>
</article>