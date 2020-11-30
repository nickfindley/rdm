<?php
    get_header();
    $acf_prefix = '404';
    $page_color = get_field( $acf_prefix . '_page_color', 'option' ) ? get_field( $acf_prefix . '_page_color', 'option' ) : 'red';
?>
<main id="content">
    <header class="404-header big-image-header page-header bg-<?php echo $page_color; ?>" id="pageHeader">
        <?php echo wp_get_attachment_image( get_field( $acf_prefix . '_page_image', 'option' ), 'full' ); ?>
        <div class="overlay">
            <h1>
                <div class="container">
                    <?php the_field( $acf_prefix . '_page_title', 'option' ); ?>
                    <?php if ( get_field( $acf_prefix . '_page_subtitle', 'option' ) ) : ?>
                    <span class="subheading"><?php the_field( $acf_prefix . '_page_subtitle', 'option' ); ?></span>
                    <?php endif; ?>
                </div>
            </h1>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <section class="page-content">
            <?php
                if ( get_field( $acf_prefix . '_page_content', 'option' ) ) :
                    the_field( $acf_prefix . '_page_content', 'option' );
                else :
            ?>  
                <p>It appears the page you were looking for isn&apos;t here. Perhaps you would like to search our website?</p>
            <?php
                endif;
            ?>
                <form id="searchform" role="search" action="<?php echo esc_url( site_url() ); ?>" method="get" class="search-results-inline">
                    <div class="search-input">
                        <label for="s">Search RDM.law</label>
                        <input zid="s" name="s" type="text" class="form-control" placeholder="<?php esc_attr_e( 'Search &hellip;', 'rdm' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>">
                    </div>
                    <div class="search-submit">
                        <input type="submit" class="btn btn-<?php echo $page_color;?>" value="Go">
                    </div>
                </form>
                <?php echo '<p>' . get_post_thumbnail_id()->post_content . '</p>'; ?>
            </section>
        </div>
    </div>
</main>
<?php get_footer(); ?>