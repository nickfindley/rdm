<?php
    $attachment_id = block_value( 'photo' );
    $color_class = 'page-header-' . block_value( 'color' );
?>
<header class="page-header <?php echo $color_class; ?>" id="pageHeader">
    <?php echo wp_get_attachment_image( $attachment_id, 'full' ); ?>
    <div class="overlay">
        <h1>
            <div class="container">
                <?php block_field( 'headline' ); ?> <span class="subheading"><?php block_field( 'subhead' ); ?></span>
            </div>
        </h1>
    </div>
</header>