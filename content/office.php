<?php 
    $post_color = get_field( 'page_color' ) ? get_field( 'page_color' ) : 'blue';
?>
<?php global $odd_even; global $page_color; ?>
<article class="archive-<?php echo $odd_even; ?> post-<?php echo $page_color; ?>">
    <div class="row">
        <div class="archive-section-content">
        <?php if ( has_post_thumbnail() ) : ?>
            <header class="archive-section-title has-post-thumbnail">
                <?php the_post_thumbnail(); ?>
                <div class="overlay">
                    <h2>
                        <a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                    </h2>
                </div>
            </header>
            <?php else : ?>
            <header class="archive-section-title">
                <h2>
                    <a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                </h2>
            </header>
            <?php endif; ?>
            </header>
            <div class="archive-section-body">
                <?php the_excerpt(); ?>
            </div>
        </div>

        <aside class="archive-section-related">
            <h3>Contact RDM in <span class="nobr"><?php the_title(); ?></span></h3>
            <ul>
                <li>
                    <?php the_field( 'address' ); ?><br>
                    <?php the_field( 'address_2' ); ?><br>
                    <?php the_field( 'city' ); ?>, <?php the_field( 'state' ); ?> <?php the_field( 'zip' ); ?>
                </li>
                <li>
                    <a href="tel:<?php the_field( 'main_phone' ); ?>">
                        <?php echo phone_format( get_field( 'main_phone' ) ); ?>
                    </a>
                </li>
                <li><a href="/contact/">Send us a message</a></li>
            </ul>

            <h3><?php the_title(); ?> Attorneys</h3>
            <ul>
            <?php
                $temp_post = $post;
                $args = array(
                    'number' => 6,
                    'meta_key' => 'start_date',
                    'orderby' => 'start_date',
                    'order' => 'ASC',
                    'role' => 'contributor',
                    'fields' => 'all',
                    'meta_query' => array(
                        array(
                            'key' => 'office',
                            'value' => '"' . get_the_ID() . '"',
                            'compare' => 'LIKE'
                        )
                    )
                );
                $attorneys_query = new WP_User_Query( $args );
                $attorneys_count = $attorneys_query->found_posts;
                $attorneys = $attorneys_query->get_results();
                if ( ! empty ( $attorneys ) ) :
                    $count = 0;
                    foreach ( $attorneys as $attorney ) :
                        $count++;
                        if ( $count > 5 ) : break; endif;
                        $info = get_userdata( $attorney->ID );
                        $user_id = 'user_' . $attorney->ID;
                        ?>
                <li>
                    <a href="<?php echo get_author_posts_url( $attorney->ID ); ?>"><span class="attorney-name"><?php echo $info->first_name . ' ' . $info->last_name; ?></span><br>
                    <span class="attorney-title"><?php the_field( 'title', $user_id ); ?></span></a>
                    <br><?php echo $attorneys_count; ?>
                </li>
                        <?php
                    endforeach;
                    wp_reset_postdata();
                endif;
                $post = $temp_post;
                if ( $count > 5 ) :
                ?>
                <li><a href="<?php the_permalink(); ?>" class="view-all">See all <?php the_title(); ?> <span class="nobr">attorneys <i class="fas fa-angle-right"></i></span></a></li>
                <?php
                endif;
                ?>
            </ul>
        </aside>
    </div>
</article>