<?php global $odd_even; ?><article class="archive-<?php echo $odd_even; ?>">
    <div class="row">
        <div class="archive-section-content">
        <?php if ( has_post_thumbnail() ) : ?>
            <header class="archive-section-title has-post-thumbnail">
            <?php
                if ( get_the_ID() == 53 ) :
                    // adr replacement
                    echo wp_get_attachment_image( 988, 'full' );
                elseif ( get_the_ID() == 599 ) :
                    // premises replacement
                    echo wp_get_attachment_image( 1029, 'full' );
                else :
                    the_post_thumbnail();
                endif;
                ?>
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
                    'meta_key' => 'start_date',
                    'orderby' => 'start_date',
                    'order' => 'ASC',
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

            <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 2,
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'suppress_filters' => true,
                    'meta_query' => array(
                        array(
                            'key' => 'post_practice_areas',
                            'value' => '"' . get_the_ID() . '"',
                            'compare' => 'LIKE'
                        )
                    )
                );
                $posts_query = new WP_Query( $args );
                if ( $posts_query->have_posts() ) :
            ?>
            <h3>Recent Posts from RDM's Knowledge Blog</h3>
            <ul>
            <?php
                while ( $posts_query->have_posts() ) :
                    $posts_query->the_post();

                    $users = get_field( 'post_authors' );
                    if ( $users ) :
                        $authors = array();
                        foreach ( $users as $user ) :
                            $authors[] = $user->display_name;
                        endforeach;
                        $author_string = natural_language_join( $authors );
                    else : 
                        $author_string = get_the_author_meta( 'display_name' );
                    endif;
            ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?> <span class="post-author">by <?php echo $author_string; ?></span></a></li>
            <?php endwhile; ?>
            </ul>
            <?php
                endif;
                wp_reset_postdata();
            ?>
        </aside>
    </div>
</article>