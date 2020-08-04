<?php
    $attachment_id = block_value( 'photo' );
    $color_class = 'big-image-text-' . block_value( 'color' );
    $position_class = 'big-image-text-' . block_value( 'position' );
?>
<section class="big-image-text <?php echo $color_class . ' ' . $position_class; ?>">
    <?php echo wp_get_attachment_image( $attachment_id, 'full' ); ?>
    <div class="overlay">
        <div class="container">
            <div class="block-container">
                <h2><?php block_field( 'headline' ); ?></h2>
                <div class="block-text">
                    <?php block_field( 'text' ); ?>
                </div>
            </div>
        </div>
    </div>
</section>