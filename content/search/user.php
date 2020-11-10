<?php
    global $post;
    $uid = $post->ID;
    $info = get_userdata( $uid );
    $user_id = 'user_' . $uid;
    $practice = get_field( 'practice_areas', $user_id );
    $admissions = get_field( 'admissions', $user_id );
?>
<div class="attorney row">
    <div class="attorney-info">
        <h3>
            <a href="<?php echo get_author_posts_url( $attorney->ID ); ?>">
                <?php echo $info->first_name . ' ' . $info->last_name; ?>
                <span class="subheading"><?php the_field( 'title', $user_id ); ?></span>
            </a>
        </h3>
        <p>
            <?php rdm_trim_text( get_field( 'attorney_bio', $user_id ) ); ?> 
            <a href="<?php echo get_author_posts_url( $attorney->ID ); ?>">Learn more <span class="nobr">about <?php the_field( 'short_name', $user_id ); ?> <i class="fas fa-angle-right"></i></span></a>
        </p>
    </div>
    <div class="attorney-photo">
        <?php echo wp_get_attachment_image( get_field( 'photo', $user_id ), 'full' ); ?>
    </div>
</div>