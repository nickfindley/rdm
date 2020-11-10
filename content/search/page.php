<?php 
    $page_color = get_field( 'page_color' ) ? get_field( 'page_color' ) : 'blue';
?>
<article class="blog-post post-color-<?php echo $post_color; ?>">
    <?php if ( has_post_thumbnail() ) : ?>
    <header class="has-post-thumbnail">
        <div class="post-thumbnail">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="overlay">
            <h3>
                <a class="permalink" href="<?php the_permalink(); ?>">
                    <?php relevanssi_the_title(); ?>
                    <?php if ( get_field( 'page_subtitle' ) ) : ?>
                    <span class="subheading"><?php the_field( 'page_subtitle' ); ?></span>
                    <?php endif; ?>
                </a>
            </h3>
        </div>
    </header>
    <?php else : ?>
    <header>
        <div class="post-title">
            <h3>
                <a class="permalink" href="<?php the_permalink(); ?>">
                    <?php relevanssi_the_title(); ?>
                    <?php if ( get_field( 'page_subtitle' ) ) : ?>
                    <span class="subheading"><?php the_field( 'page_subtitle' ); ?></span>
                    <?php endif; ?>
                </a>
            </h2>
        </div>
    </header>
    <?php endif; ?>

    <div class="row">
        <section class="post-meta">
        </section>
        <section class="post-content">
            <?php the_excerpt(); ?>
        </section>
    </div>
</article>