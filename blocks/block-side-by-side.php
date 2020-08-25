<?php
// Create class attribute allowing for custom "className" and "align" values.
$className = '';
if ( ! empty( $block['className'] ) ) :
    $className .= ' ' . $block['className'];
endif;

// Load values and assign defaults.
$image = get_field( 'image' );
$headline = get_field( 'headline' );
$text = get_field( 'text' );
$button_text = get_field( 'button_text' ); 
$button_link = get_field( 'button_link' );
$color = get_field( 'color' );
$position = get_field( 'photo_position' );
?>

<?php
    $color_class = 'bg-' . $color;
    $side_class = 'side-by-side-' . $position;
?>
<section class="side-by-side <?php echo $color_class . ' ' . $side_class; ?>">
    <div class="container">
        <div class="row">
            <div class="side-by-side-image">
            <?php echo wp_get_attachment_image( $image, 'large' ); ?>
            </div>
            <div class="side-by-side-text">
                <div class="side-by-side-text-wrapper">
                    <h2><?php echo $headline; ?></h2>
                    <p><?php echo $text; ?></p>
                    <p><a class="btn btn-lg" href="<?php $button_link; ?>"><?php echo $button_text; ?></a></p>
                </div>
            </div>
        </div>
    </div>
</section>