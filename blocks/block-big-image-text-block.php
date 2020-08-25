<?php
// Create class attribute allowing for custom "className" and "align" values.
$className = '';
if ( ! empty( $block['className'] ) ) :
    $className .= ' ' . $block['className'];
endif;

// Load values and assign defaults.
$image = get_field( 'image' );
$headline = get_field( 'headline' );
$subhead = get_field( 'text' );
$color = get_field( 'color' );
$position = get_field( 'position' );
?>

<section class="big-image-text big-image-text-<?php echo $position; ?> bg-<?php echo $color . $className; ?>">
    <?php echo wp_get_attachment_image( $image, 'full' ); ?>
    <div class="overlay">
        <div class="container">
            <div class="block-container">
                <h2><?php echo $headline; ?></h2>
                <div class="block-text">
                    <?php echo $subhead; ?>
                </div>
            </div>
        </div>
    </div>
</section>