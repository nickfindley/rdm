<?php
// Create class attribute allowing for custom "className" and "align" values.
$className = '';
if ( ! empty( $block['className'] ) ) :
    $className .= ' ' . $block['className'];
endif;

// Load values and assign defaults.
$image = get_field( 'image' );
$image_ratio = get_field( 'image_ratio' );
$headline = get_field( 'headline' );
$subhead = get_field( 'subhead' );
$color = get_field( 'color' );
?>

<header class="big-image-header big-image-header-<?php echo $image_ratio; ?> page-header bg-<?php echo $color . $className; ?>" id="pageHeader">
    <?php echo wp_get_attachment_image( $image, 'full' ); ?>
    <div class="overlay">
        <h1>
            <div class="container">
                <?php echo $headline; ?> <span class="subheading"><?php echo $subhead; ?></span>
            </div>
        </h1>
    </div>
</header>