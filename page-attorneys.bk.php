<?php
    get_header();
    $page_color = get_field( 'archive_page_color', 'option' ) ? get_field( 'archive_page_color', 'option' ) : 'blue';
?>
<main id="content">
    <header class="archive-header big-image-header page-header bg-<?php echo $page_color; ?>" id="pageHeader">
        <?php echo wp_get_attachment_image( get_field( 'archive_page_image', 'option' ), 'full' ); ?>
        <div class="overlay">
            <h1>
                <div class="container">
                    <?php the_title(); ?>
                </div>
            </h1>
        </div>
    </header>

    <div class="container">
        <section class="attorneys-content">
            <div class="attorneys-intro">
                <?php the_content(); ?>
            </div>
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
        </section>
    </div>
</main>
<?php get_footer(); ?>