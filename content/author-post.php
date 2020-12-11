<?php 
    $post_color = get_field( 'post_color' ) ? get_field( 'post_color' ) : 'blue';
?>
<article class="blog-post post-<?php echo $post_color; ?>">
    <?php if ( has_post_thumbnail() ) : ?>
    <header class="has-post-thumbnail">
        <div class="post-thumbnail">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="overlay">
            <h3>
                <a class="permalink" href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                    <?php if ( get_field( 'post_subtitle' ) ) : ?>
                    <span class="subheading"><?php the_field( 'post_subtitle' ); ?></span>
                    <?php endif; ?>
                </a>
            </h3>
        </div>
    </header>
    <?php else : ?>
    <header>
        <div class="post-title bg-<?php echo $post_color; ?>">
            <h3>
                <a class="permalink" href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                    <?php if ( get_field( 'post_subtitle' ) ) : ?>
                    <span class="subheading"><?php the_field( 'post_subtitle' ); ?></span>
                    <?php endif; ?>
                </a>
            </h2>
        </div>
    </header>
    <?php endif; ?>

    <div class="row">
        <section class="post-meta">
        <?php
            $users = get_field( 'post_authors' );
            if ( $users ) :
                foreach ( $users as $user ) :
                    $authors[] = '<span class="nobr"><a href="' . get_author_posts_url( $user->ID ) . '">' . $user->display_name . '</a></span>';
                endforeach;
                echo '<p class="byline">By ' . natural_language_join( $authors ) . '<br>';
            else : 
                echo '<p class="byline">By <a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"> ' . get_the_author_meta( 'display_name' ) . '</a><br>';
            endif;
        ?>
                <a class="permalink" href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
            </p>
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
        </section>
        <section class="post-content">
            <?php the_content(); ?>
        </section>
    </div>
</article>