<?php
    global $post;
    $uid = $post->ID;
    $info = get_userdata( $uid );
    $user_id = 'user_' . $uid;
    $practice = get_field( 'practice_areas', $user_id );
    $admissions = get_field( 'admissions', $user_id );
?>
<div class="office row">
    <aside class="office-info">
        <h2><?php the_title(); ?> Office</h2>
        <h3>Contact Us</h3>
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
    </aside>
    <div class="office-photo">
        <?php the_post_thumbnail(); ?>
    </div>
</div>