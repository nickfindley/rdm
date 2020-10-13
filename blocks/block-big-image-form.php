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

<div class="big-image-form bg-<?php the_field( 'color' ); ?>">
    <?php echo wp_get_attachment_image( $image, 'full' ); ?>
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="header-text">
                    <h1><?php the_field( 'headline' ); ?> </h1>
                    <h2><?php the_field( 'subhead' ); ?></h2>
                    <div class="body-text">
                        <?php the_field( 'body' ); ?>
                    </div>
                </div>
                <div class="header-form">
                    <h3><?php the_field( 'form_title' ); ?></h3>
                    <?php echo do_shortcode( '[forminator_form id="' . get_field( 'form' ) . '"]' ); ?>
                    <?php if ( get_field( 'form_after' ) ) : ?>
                    <div class="form-after">
                        <?php the_field( 'form_after' ); endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>