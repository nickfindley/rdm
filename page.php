<?php get_header(); ?>
<main id="content">
    <header class="page-header big-image-header page-header bg-red" id="pageHeader">
        <?php
            the_post_thumbnail();
        ?>
        <div class="overlay">
            <h1>
                <div class="container">
                    <?php the_title(); ?>
                </div>
            </h1>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <section class="page-content">
            <?php the_content(); ?>
            </section>
        </div>
    </div>
</main>
<?php get_footer(); ?>