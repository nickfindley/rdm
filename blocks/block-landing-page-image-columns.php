<?php
// Create class attribute allowing for custom "className" and "align" values.
$className = '';
if ( ! empty( $block['className'] ) ) :
    $className .= ' ' . $block['className'];
endif;

// Load values and assign defaults.
$image = get_field( 'image' );
$color = get_field( 'color' );
?>

<section class="landing-page-image-columns bg-<?php echo $color . $className; ?>">
    <?php echo wp_get_attachment_image( $image, 'full' ); ?>
    <div class="overlay">
        <div class="container">
            <div class="row">
            <?php
                if ( have_rows( 'columns' ) ) :
                    while ( have_rows( 'columns' ) ) :
                        the_row();
            ?>
                <div class="image-column">
                    <div class="image-column-content">
                        <h3><?php the_sub_field( 'headline' ); ?></h3>
                        <?php the_sub_field( 'body' ); ?>
                    </div>
                </div>
            <?php     
                    endwhile;
                endif;
            ?>
            </div>
        </div>
    </div>
</section>