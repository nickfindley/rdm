<?php
    // global $attorney;
    $info = get_userdata( $attorney->ID );
    $user_id = 'user_' . $attorney->ID;
?>
                    <li>
                        <a href="<?php echo get_author_posts_url( $attorney->ID ); ?>">
                            <span class="attorney-name"><?php echo $info->first_name . ' ' . $info->last_name; ?> </span>
                            <span class="attorney-title"><?php the_field( 'title', $user_id ); ?></span>
                        </a>
                    </li>