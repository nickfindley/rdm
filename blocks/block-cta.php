<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-' . $block['id'];
if ( ! empty( $block['anchor'])  ) :
    $id = $block['anchor'];
endif;

// Create class attribute allowing for custom "className" and "align" values.
$className = '';
if ( ! empty( $block['className'] ) ) :
    $className .= ' ' . $block['className'];
endif;

if ( ! empty( $block['align'] ) ) :
    $className .= ' align-' . $block['align'];
endif;

// Load values and assign defaults.
$headline = get_field( 'headline' );
$text = get_field( 'text' );
$button_text = get_field( 'button_text' );
$button_link = get_field( 'button_link' );
$color = get_field( 'color' );
?>

<div class="cta cta-<?php echo $color . $className; ?>" id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className ); ?>">
    <h3><?php echo $headline; ?></h3>
    <?php echo $text; ?>
    <p><a class="btn" href="<?php echo $button_link; ?>"><?php echo $button_text; ?></a></p>
</div>