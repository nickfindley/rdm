<?php
    global $attorney;
    $info = get_userdata( $attorney->ID );
    $user_id = 'user_' . $attorney->ID;
    $practice = get_field( 'practice_areas', $user_id );
    $admissions = get_field( 'admissions', $user_id );
?>
<div class="col">
<div class="attorney card">
    <div class="attorney-photo card-img-top">
        <?php echo wp_get_attachment_image( get_field( 'photo', $user_id ), 'full' ); ?>
    </div>
    <div class="attorney-info card-body">
        <h2 class="card-title">
            <a href="<?php echo get_author_posts_url( $attorney->ID ); ?>"><?php echo $info->first_name . ' <br class="name-split">' . $info->last_name; ?>
            <span class="attorney-title"><?php the_field( 'title', $user_id ); ?></span></a>
        </h2>

        <div class="card-body">
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

            <!--<h3>Admissions</h3>
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
            </ul>-->

            <p><a href="<?php echo get_author_posts_url( $attorney->ID ); ?>">Learn more <span class="nobr">about <?php the_field( 'short_name', $user_id ); ?> <i class="fas fa-angle-right"></i></span></a></p>
        </div>
    </div>
</div>
</div>