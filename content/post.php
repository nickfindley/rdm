<?php 
    $post_color = get_field( 'post_color' ) ? get_field( 'post_color' ) : 'blue';
?>
<article class="blog-post post post-<?php echo $post_color; ?>">
    <header class="post-header bg-<?php echo $post_color; ?><?php if ( has_post_thumbnail() ) : ?> has-post-thumbnail<?php endif; ?>">
        <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="overlay">
            <h2>
                <a class="permalink" href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                    <?php if ( get_field( 'post_subtitle' ) ) : ?>
                    <span class="subheading"><?php the_field( 'post_subtitle' ); ?></span>
                    <?php endif; ?>
                </a>
            </h2>
        </div>
        <?php else : ?>
        <div class="post-title">
            <h2>
                <a class="permalink" href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                    <?php if ( get_field( 'post_subtitle' ) ) : ?>
                    <span class="subheading"><?php the_field( 'post_subtitle' ); ?></span>
                    <?php endif; ?>
                </a>
            </h2>
        </div>
        <?php endif; ?>
    </header>

    <section class="post-body">
        <div class="row">
            <div class="post-meta">
                <?php
                    $users = get_field( 'post_authors' );
                    if ( $users ) :
                        foreach ( $users as $user ) :
                            $authors[] = '<a href="' . get_author_posts_url( $user->ID ) . '">' . $user->display_name . '</a>';
                        endforeach;
                        echo '<p class="byline">By ' . natural_language_join( $authors ) . '<br>';
                    else : 
                        echo '<p class="byline">By <a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"> ' . get_the_author_meta( 'display_name' ) . '</a><br>';
                    endif;
                    echo get_the_date() . '</p>';
                ?>
                <ul class="post-categories">
                    <li>Filed under</li>
                <?php
                    $cats = get_the_category();
                    foreach ( $cats as $c ) :
                ?>
                    <li><a href="<?php echo get_category_link( $c->term_id ); ?>"><?php echo $c->name; ?></a></li>
                <?php
                    endforeach;
                ?>
                </ul>
            </div>

            <div class="post-content">
                <?php the_content(); ?>
            </div>
        </div>
    </section>
</article>