<?php get_header(); ?>
<main id="content">
    <header class="blog-header">
        <div class="blog-header-image">
            <img width="2000" height="1000" src="/wp-content/uploads/2020/07/old-courthouse-1.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="/wp-content/uploads/2020/07/old-courthouse-1.jpg 2000w, /wp-content/uploads/2020/07/old-courthouse-1-300x150.jpg 300w, /wp-content/uploads/2020/07/old-courthouse-1-1536x768.jpg 1536w, /wp-content/uploads/2020/07/old-courthouse-1-500x250.jpg 500w, /wp-content/uploads/2020/07/old-courthouse-1-540x270.jpg 540w, /wp-content/uploads/2020/07/old-courthouse-1-690x345.jpg 690w, /wp-content/uploads/2020/07/old-courthouse-1-930x465.jpg 930w, /wp-content/uploads/2020/07/old-courthouse-1-1110x555.jpg 1110w" sizes="(max-width: 2000px) 100vw, 2000px">
            <div class="blog-header-image-overlay">
                <h1>
                    Knowledge<span class="sr-only">: </span>
                    <span class="subtitle">The <span class="rdm">R</span>
                    <span class="bar">|</span>
                    <span class="rdm">D</span>
                    <span class="bar">|</span>
                    <span class="rdm">M</span> Blog</span>
                </h1>
            </div>
        </div>
    </header>

    <section class="blog-intro container">
        <div class="row">
            <div class="blog-intro-title">
                <h2>Leadership and expertise.</h2>
            </div>
            <div class="blog-intro-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sem nisi, eleifend non diam rhoncus, lobortis finibus erat. Nunc a justo nibh. Etiam lacinia eget orci eu venenatis.</p>

                <p>Curabitur eget blandit sapien. Nulla mattis imperdiet purus nec faucibus. Sed tortor massa, semper id leo vel, facilisis posuere erat. Sed metus ligula, aliquam id condimentum sed, rutrum vel lectus.</p>
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
                    <p>I'll put a form here.</p>
                    <p><input type="text"></p>
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