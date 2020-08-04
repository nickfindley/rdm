<?php get_header(); ?>
<main id="content">
    <header class="blog-header" id="pageHeader">
        <div class="blog-header-image">
        <?php
            $page_for_posts = get_option( 'page_for_posts' );
            echo get_the_post_thumbnail( $page_for_posts );
        ?>
            <div class="blog-header-image-overlay">
                <h1>
                    Title TBD<span class="sr-only">: </span>
                    <!--<span class="subtitle">The <span class="rdm">R</span><span class="bar">|</span><span class="rdm">D</span><span class="bar">|</span><span class="rdm">M</span> Blog</span>-->
                    <span class="subtitle">The <img class="rdm-logo" src="/wp-content/themes/rdm/dist/img/rdm.white.trans.png" alt="RDM"> Blog</span>
                </h1>
            </div>
        </div>
    </header>

    <section class="blog-intro container">
        <div class="row">
            <div class="blog-intro-title">
                <div class="blog-intro-title-wrapper">
                    <h2>Leadership and expertise.</h2>
                </div>
            </div>
            <div class="blog-intro-content">
                <div class="blog-intro-content-wrapper">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sem nisi, eleifend non diam rhoncus, lobortis finibus erat. Nunc a justo nibh. Etiam lacinia eget orci eu venenatis.</p>

                    <p>Curabitur eget blandit sapien. Nulla mattis imperdiet purus nec faucibus. Sed tortor massa, semper id leo vel, facilisis posuere erat. Sed metus ligula, aliquam id condimentum sed, rutrum vel lectus.</p>
                </div>
            </div>
            <div class="blog-intro-cta">
                <div class="blog-intro-cta-wrapper">
                    <p>We're ready to work for you.</p>
                    <p><a class="btn btn-primary" href="#">Work with us</a></p>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-subscribe">
        <div class="container">
            <div class="row">
                <div class="blog-subscribe-title">
                    <h2>Subscribe<span class="sr-only">&nbsp;</span><span class="subtitle">to the RDM Knowledge Blog</span></h2>
                </div>
                <div class="blog-subscribe-content">
                    <div class="input-group input-group-lg">
                        <input type="text" class="form-control">
                        <input type="submit" class="btn btn-primary" value="Sign Up">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-content">
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