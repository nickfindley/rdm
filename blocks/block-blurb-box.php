<?php
// Create class attribute allowing for custom "className" and "align" values.
$className = '';
if ( ! empty( $block['className'] ) ) :
    $className .= ' ' . $block['className'];
endif;

if ( ! empty( $block['align'] ) ) :
    $className .= ' align-' . $block['align'];
endif;

// Load values and assign defaults.
$heading = get_field( 'heading' );
$body = get_field( 'body' );
$color = get_field( 'color' );
?>

<div class="blurb-box">
    <div class="blurb-box-inner h-100 bg-<?php echo $color . $className; ?>">
        <div class="card-body">
            <h3 class="card-title"><?php echo $heading; ?></h3>
            <div class="card-text">
                <?php echo $body; ?>
            </div>
        </div>
    </div>
</div>