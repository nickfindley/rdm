<?php
    $info = get_userdata( $attorney->ID );
    $user_id = 'user_' . $attorney->ID;
?>
                    <li>
                        <div class="card">
                            <?php echo wp_get_attachment_image( get_field( 'photo', $user_id ), 'full' ); ?>
                            <div class="card-body">
                                <a class="stretched-link" href="<?php echo get_author_posts_url( $attorney->ID ); ?>"><span class="attorney-name"><?php echo $info->first_name . ' ' . $info->last_name; ?></span><br>
                                <span class="attorney-title"><?php the_field( 'title', $user_id ); ?></span></a>
                            </div>
                        </div>
                    </li>