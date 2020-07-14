<?php get_header(); ?>
<main id="content">
    <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                get_template_part( 'content/post' );
            endwhile;
        endif;
    ?>
</main>
<?php get_footer(); ?>