<?php
    get_header();
    $page_color = get_field( 'page_color' ) ? get_field( 'page_color' ) : 'blue';
?>
<main id="content">
    
    <?php if ( has_post_thumbnail() ) : ?>
    <header class="page-header big-image-header bg-<?php echo $page_color; ?>" id="pageHeader">
        <?php the_post_thumbnail(); ?>
        <div class="overlay">
            <h1>
                <div class="container">
                    <?php the_title(); ?>
                    <?php if ( get_field( 'page_subtitle' ) ) : ?>
                    <span class="subheading"><?php the_field( 'page_subtitle' ); ?></span>
                    <?php endif; ?>
                </div>
            </h1>
        </div>
    </header>

    <?php else : ?>

    <header class="page-header plain-header bg-<?php echo $page_color; ?>" id="pageHeader">
        <h1>
            <div class="container">
                <?php the_title(); ?>
                <?php if ( get_field( 'page_subtitle' ) ) : ?>
                <span class="subheading"><?php the_field( 'page_subtitle' ); ?></span>
                <?php endif; ?>
            </div>
        </h1>
    </header>
    <?php endif; ?>

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
                        <input type="submit" class="btn btn-<?php echo $page_color; ?>" value="Go">
                    </div>
                </form>
            </section>
        </div>
    </div>
</main>
<?php get_footer(); ?>