<?php get_header(); ?>
<main id="content">
    <header class="blog-header big-image-header page-header bg-red" id="pageHeader">
        <?php
            $page_for_posts = get_option( 'page_for_posts' );
            echo get_the_post_thumbnail( $page_for_posts, 'full' );
        ?>
        <div class="overlay">
            <h1>
                <div class="container">
                    404
                </div>
            </h1>
        </div>
    </header>
</main>
<?php get_footer(); ?>