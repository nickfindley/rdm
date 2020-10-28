<?php global $odd_even; ?><article class="archive-<?php echo $odd_even; ?>">
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

                <p><a href="<?php the_permalink(); ?>">Learn more about <?php the_title(); ?> &hellip;</a></p>
            </div>
        </div>
        <div class="archive-section-related">
            <h3><?php the_title(); ?> <br>Attorneys</h3>
            <ul>
            <?php
                $temp_post = $post;
                $args = array(
                    'number' => 5,
                    'meta_key' => 'start_date',
                    'orderby' => 'start_date',
                    'order' => 'ASC',
                    'role' => 'contributor',
                    'fields' => 'all',
                    'meta_query' => array(
                        'key' => 'practice_areas',
                        'value' => get_the_ID(),
                        'compare' => 'LIKE'
                    )
                );
                $attorneys_query = new WP_User_Query( $args );
                $attorneys_count = $attorneys_query->found_posts;
                $attorneys = $attorneys_query->get_results();
                if ( ! empty ( $attorneys ) ) :
                    foreach ( $attorneys as $attorney ) :
                        $info = get_userdata( $attorney->ID );
                        $user_id = 'user_' . $attorney->ID;
                        ?>
                <li>
                    <a href="<?php echo get_author_posts_url( $attorney->ID ); ?>"><span class="attorney-name"><?php echo $info->first_name . ' ' . $info->last_name; ?></span><br>
                    <span class="attorney-title"><?php the_field( 'title', $user_id ); ?></span></a>
                </li>
                        <?php
                    endforeach;
                    wp_reset_postdata();
                endif;
                $post = $temp_post;
                if ( $attorneys_count > 5 ) :
                ?>
                <li class="view-all"><a href="<?php the_permalink(); ?>">See all <?php the_title(); ?> attorneys <svg class="mdi" width="12" height="12" viewBox="0 0 24 24"><path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" /></svg></a></li>
                <?php
                endif;
                ?>
            </ul>

            <?php
                $category = get_the_category( $post );
                $categories = array();
                foreach ( $category as $cat ) :
                    $categories[] = $cat->term_id;
                endforeach;
                // echo '<pre>' . var_dump( $category ) . '</pre>';
                if ( ! empty( $categories ) ) :

                $args = array(
                    'posts_per_page' => 3,
                    'category__in' => $categories,
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'suppress_filters' => true
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
                endif;
            ?>
        </div>
    </div>
</article>