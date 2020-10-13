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
            $args = array(
                'role' => 'contributor',
                'fields' => 'all',
                'order' => 'ASC',
                'meta_key' => 'start_date',
                'orderby' => 'start_date'
            );
            $attorneys_query = new WP_User_Query( $args );
            $attorneys = $attorneys_query->get_results();
            if ( ! empty ( $attorneys ) ) :
            ?>
            <?php
            foreach ( $attorneys as $attorney ) :
                $info = get_userdata( $attorney->ID );
                $user_id = 'user_' . $attorney->ID;
                $practice = get_field( 'practice_areas', $user_id );
                $admissions = get_field( 'admissions', $user_id );
                ?>
                <div class="attorney row">
                    <div class="attorney-photo">
                        <?php echo wp_get_attachment_image( get_field( 'photo', $user_id ), 'full' ); ?>
                    </div>
                    <div class="attorney-info">
                        <h2>
                            <a href="<?php echo get_author_posts_url( $attorney->ID ); ?>"><?php echo $info->first_name . ' ' . $info->last_name; ?>
                            <span class="subheading"><?php the_field( 'title', $user_id ); ?></span></a>
                        </h2>

                        <p><a href="<?php echo get_author_posts_url( $attorney->ID ); ?>">Learn more about <?php the_field( 'short_name', $user_id ); ?></a>  <svg class="mdi" width="16" height="16" viewBox="0 0 24 24"><path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" /></svg></p>

                        <h3>Practice Areas</h3>
                        <ul class="attorney-practice-areas">
                        <?php
                            foreach ( $practice as $post ) :
                                setup_postdata( $post->ID );
                        ?>
                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php
                                wp_reset_postdata();
                            endforeach;
                        ?>
                        </ul>

                        <h3>Admissions</h3>
                        <ul class="attorney-admissions">
                        <?php
                            $adm = array();
                            foreach ( $admissions as $post ) :
                                // setup_postdata( $post->ID );
                                $parent = get_post_ancestors( $post->ID );
                                global $post;
                                $post->post_parent_title = get_the_title( $parent[0] );
                                $adm[] = $post;
                                wp_reset_postdata();
                            endforeach;

                            // echo '<pre>' . print_r( $adm ) . '</pre>';

                            usort( $adm, arrSortObjsByKey( 'post_parent_title', 'ASC' ));
                            foreach ( $adm as $post ) :
                                if ( $post->post_parent_title == 'State Courts' ) :
                                    $parent_title = '';
                                else : 
                                    $parent_title = '<span class="admission-parent">' . $post->post_parent_title . ' </span>';
                                endif;
                                echo '<li>' . $parent_title . $post->post_title . '</li>';
                            endforeach;
                        ?>
                        </ul>
                    </div>
                </div>
                <?php
            endforeach;
            ?>
            <?php
            endif;
        ?>
        </section>
    </div>
</main>
<?php get_footer(); ?>