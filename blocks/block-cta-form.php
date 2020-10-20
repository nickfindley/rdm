<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'cta-' . $block['id'];
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
$color = get_field( 'color' );
?>

<div class="cta cta-form bg-<?php echo $color . $className; ?>" id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className ); ?>">
    <h3><?php echo $headline; ?></h3>
    <?php echo $text; ?>
    <?php echo do_shortcode( '[forminator_form id="' . get_field( 'form' ) . '"]' ); ?>
</div>