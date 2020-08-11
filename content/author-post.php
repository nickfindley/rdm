<article class="post">
    <header <?php if ( has_post_thumbnail() ) : ?> class="has-post-thumbnail"<?php endif; ?>>
        <div class="row">
            <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div>
            <?php endif; ?>
            <div class="post-title">
                <h3>
                    <a class="permalink" href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                        <span class="permalink-icon"> <i class="fas fa-link"></i></span>
                        <?php if ( get_field( 'post_subtitle' ) ) : ?>
                        <span class="subheading"><?php the_field( 'post_subtitle' ); ?></span>
                        <?php endif; ?>
                    </a>
                </h3>
            </div>
        </div>
    </header>

    <div class="row">
        <section class="post-meta">
            <p class="byline">
                By <?php coauthors_posts_links(); ?><br>
                <?php echo get_the_date(); ?>
            </p>
        </section>
        <section class="post-content">
            <?php the_content(); ?>
        </section>
    </div>
</article>