<?php
    $color_class = 'side-by-side-' . block_value( 'color' );
    $side_class = 'side-by-side-' . block_value( 'photo-position' );
?>
<section class="side-by-side <?php echo $color_class . ' ' . $side_class; ?>">
    <div class="container">
        <div class="row">
            <div class="side-by-side-image">
            <?php
                $attachment_id = block_value( 'photo' );
                echo wp_get_attachment_image( $attachment_id, 'large' );
            ?>
            </div>
            <div class="side-by-side-text">
                <div class="side-by-side-text-wrapper">
                    <h2><?php block_field( 'headline' ); ?></h2>
                    <?php block_field( 'text' ); ?>
                    <p><a class="btn btn-lg btn-secondary" href="<?php echo block_value( 'button-link' ); ?>"><?php echo block_value( 'button-text' ); ?></a></p>
                </div>
            </div>
        </div>
    </div>
</section>