<?php
// Create class attribute allowing for custom "className" and "align" values.
$className = '';
if ( ! empty( $block['className'] ) ) :
    $className .= ' ' . $block['className'];
endif;

// Load values and assign defaults.
$image = get_field( 'image' );
$headline = get_field( 'headline' );
$subhead = get_field( 'subhead' );
$color = get_field( 'color' );
?>

<div class="landing-page-text bg-<?php the_field( 'color' ); ?>">
    <div class="container">
        <div class="row">
            <header class="block-header">
                <h2><?php the_field( 'headline' ); ?></h2>
            </header>
            <div class="block-body">
                <?php the_field( 'body' ); ?>
            </div>
        </div>
    </div>
</div>