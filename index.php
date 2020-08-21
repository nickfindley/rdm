<?php get_header(); ?>
<main id="content">
    <header class="blog-header big-image-header page-header page-header-red" id="pageHeader">
        <?php
            $page_for_posts = get_option( 'page_for_posts' );
            echo get_the_post_thumbnail( $page_for_posts, 'full' );
        ?>
        <div class="overlay">
            <h1>
                <div class="container">
                    Knowledge <span class="subheading">The<img class="rdm-logo" src="/wp-content/themes/rdm/dist/img/rdm.white.trans.png" alt="RDM">Blog</span>
                </div>
            </h1>
        </div>
    </header>

    <section class="side-by-side side-by-side-blue side-by-side-left">
        <div class="container">
            <div class="row">
                <div class="side-by-side-image">
                <?php echo wp_get_attachment_image( 58, 'large' ); ?>
                </div>
                <div class="side-by-side-text">
                    <div class="side-by-side-text-wrapper">
                        <h2>Subscribe</h2>
                        <p>RDM's Knowledge Blog brings the latest industry news from around the country to your inbox. Sign up today.</p>
                        <p><input class="form-control form-control-lg" placeholder="email address"></p>
                        <p><a class="btn btn-lg" href="#">Subscribe</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blg-content">
    <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                get_template_part( 'content/post' );
            endwhile;
        endif;
    ?>
    </section>
</main>
<?php get_footer(); ?>