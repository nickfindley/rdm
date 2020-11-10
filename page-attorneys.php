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
        <section class="attorneys-content">
            <div class="lede-wrapper">
                <div class="lede">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="attorneys-cards">
        <?php
            $members_args = array(
                'role' => 'contributor',
                'fields' => 'all',
                'meta_query' => array(
                    array(
                        'key' => 'title',
                        'value' => array( 'Founding Member', 'Member'),
                        'compare' => 'IN'
                    )
                ),
                'meta_key' => 'last_name',
                'orderby' => 'meta_value'
            );
            $members_query = new WP_User_Query( $members_args );
            $members = $members_query->get_results();
            if ( ! empty ( $members ) ) :
            ?>
            <?php
            foreach ( $members as $attorney ) :              
                get_template_part( 'content/page-attorneys-listing' );
            endforeach;
            ?>
            <?php
            endif;

            $associates_args = array(
                'role' => 'contributor',
                'fields' => 'all',
                'meta_query' => array(
                    array(
                        'key' => 'title',
                        'value' => array( 'Associate'),
                        'compare' => 'IN'
                    )
                ),
                'meta_key' => 'last_name',
                'orderby' => 'meta_value'
            );
            $associates_query = new WP_User_Query( $associates_args );
            $associates = $associates_query->get_results();
            if ( ! empty ( $associates ) ) :
            ?>
            <?php
            foreach ( $associates as $attorney ) :              
                get_template_part( 'content/page-attorneys-listing' );
            endforeach;
            ?>
            <?php
            endif;
        ?>
            </div>
        </section>
    </div>
</main>
<?php get_footer(); ?>