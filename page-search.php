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

                <form id="searchform" role="search" action="<?php echo esc_url( site_url() ); ?>" method="get">
                    <div class="search-input">
                        <label for="s">Search RDM.law</label>
                        <input zid="s" name="s" type="text" class="form-control" placeholder="<?php esc_attr_e( 'Search &hellip;', 'rdm' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>">
                    </div>
                    <div class="search-submit">
                        <input type="submit" class="btn btn-primary" value="Go">
                    </div>
                </form>
            </section>
        </div>
    </div>
</main>
<?php get_footer(); ?>