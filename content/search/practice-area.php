<article>
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

                <p><a href="<?php the_permalink(); ?>">Learn more about <?php the_title(); ?> <i class="fas fa-angle-right"></i></a></p>
            </div>
        </div>
        <aside class="archive-section-related">
            <h3><?php the_title(); ?> Attorneys</h3>
            <ul>
            <?php
                $temp_post = $post;
                $args = array(
                    'number' => 6,
                    'meta_key' => 'title',
                    'orderby' => 'rand',
                    // 'order' => 'RAND',
                    'role' => 'contributor',
                    'fields' => 'all',
                    'meta_query' => array(
                        array(
                            'key' => 'practice_areas',
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