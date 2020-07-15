<article class="post">
    <header class="post-header container<?php if ( has_post_thumbnail() ) : ?> has-post-thumbnail<?php endif; ?>">
        <div class="row">
            <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail(); ?>
                <div class="post-thumbnail-overlay">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
            <?php endif; ?>
            <div class="post-title">
                <h2>
                    <a class="permalink" href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="permalink-icon"> <i class="fas fa-link"></i></span></a>
                </h2>
            </div>
        </div>
    </header>

    <section class="post-content container">
        <div class="post-content-wrapper">
            <?php the_content(); ?>
        </div>
    </section>
</article>