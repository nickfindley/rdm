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
$button_text = get_field( 'button_text' );
$button_link = get_field( 'button_link' );

// $color = get_field( 'color' );
$attorney = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) );
$user_id = 'user_' . $attorney->ID;

global $post;
if ( get_field( 'post_color', $post->ID ) ) :
    $color = get_field( 'post_color', $post->ID );
elseif ( get_field( 'page_color' ) ) :
    $color = get_field( 'page_color' );
else :
    $color = 'blue';
endif;
?>

<div class="cta bg-<?php echo $color . $className; ?>" id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className ); ?>">
    <h3><?php echo $headline; ?></h3>
    <?php echo $text; ?>
    <p><a class="btn" href="<?php echo $button_link; ?>"><?php echo $button_text; ?></a></p>
</div>