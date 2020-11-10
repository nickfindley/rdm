<?php
    get_header();
    $acf_prefix = 'search_results';
    $page_color = get_field( $acf_prefix . '_page_color', 'option' ) ? get_field( $acf_prefix . '_page_color', 'option' ) : 'red';
?>
<main id="content">
    <header class="404-header big-image-header page-header bg-<?php echo $page_color; ?>" id="pageHeader">
        <?php echo wp_get_attachment_image( get_field( $acf_prefix . '_page_image', 'option' ), 'full' ); ?>
        <div class="overlay">
            <h1>
                <div class="container">
                    <span class="subheading search-subheading"><span class="search-number"><?php echo $wp_query->found_posts; ?></span> <?php _e( 'Search results for', 'dutchtown' ); ?> </span><?php the_search_query(); ?>
                </div>
            </h1>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <section class="page-content search-results">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    if ( get_post_type() == 'post' ) :
                        get_template_part( 'content/search/post' );
                    elseif ( get_post_type() == 'page' ) :
                        get_template_part( 'content/search/page' );
                    elseif ( get_post_type() == 'practice_areas' ) :
                        get_template_part( 'content/search/practice-area' );
                    elseif ( get_post_type() == 'user' ) :
                        get_template_part( 'content/search/user' );
                    else :
                        echo get_post_type();
                    endif;
                endwhile;
                echo bootstrap_pagination();
            else :
            ?>
                <p>It doesn&rsquo;t look like your search for <b><i><?php the_search_query(); ?></i></b> returned any results. Would you like to try searching for another term?</p>
                <form id="searchform" role="search" action="<?php echo esc_url( site_url() ); ?>" method="get" class="search-results-inline">
                    <div class="search-input">
                        <label for="s">Search RDM.law</label>
                        <input zid="s" name="s" type="text" class="form-control" placeholder="<?php esc_attr_e( 'Search &hellip;', 'rdm' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>">
                    </div>
                    <div class="search-submit">
                        <input type="submit" class="btn btn-primary" value="Go">
                    </div>
                </form>
            <?php
            endif;
            ?>
            </section>
        </div>
    </div>
</main>
<?php get_footer(); ?>