<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-' . $block['id'];
if ( ! empty( $block['anchor'])  ) :
    $id = $block['anchor'];
endif;

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonial';
if ( ! empty( $block['className'] ) ) :
    $className .= ' ' . $block['className'];
endif;

if ( ! empty( $block['align'] ) ) :
    $className .= ' align' . $block['align'];
endif;

// Load values and assign defaults.
$quote = get_field( 'quote' );
$case_name = get_field( 'case_name' );
$case_citation = get_field( 'case_citation' );
$case_link = get_field( 'case_link' );
?>

<blockquote id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>"<?php if ( $case_link ) : ?> cite="<?php echo $case_link; ?>"<?php endif; ?>>
    <?php echo $quote; ?>
    <footer>
        <cite><?php if ( $case_link ) : ?><a href="<?php echo $case_link; ?>"><?php endif; ?><span class="case-name"><?php echo $case_name; ?></span><span class="case-separator">, </span><span class="case-citation"> <?php echo $case_citation; ?></span><?php if ( $case_link ) : ?></a><?php endif; ?></cite>
    </footer>
</blockquote>