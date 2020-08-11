<?php
add_action('acf/init', 'rdm_acf_init_block_types');
function rdm_acf_init_block_types()
{
    if ( function_exists( 'acf_register_block_type' ) ) :
        acf_register_block_type(array(
            'name'              => 'big_image_header',
            'title'             => __('Big Image Header'),
            'description'       => __('A big image and headline that goes at the top of the page.'),
            'render_template'   => 'blocks/block-big-image-header.php',
            'category'          => 'formatting',
            'icon'              => 'format-image',
            'keywords'          => array( 'header', 'image', 'photo' ),
            'supports'          => array ('align' => false )
        ));

        acf_register_block_type(array(
            'name'              => 'big_image_text_block',
            'title'             => __('Big Image Text Block'),
            'description'       => __('A block of text overlaid on a big image.'),
            'render_template'   => 'blocks/block-big-image-text-block.php',
            'category'          => 'formatting',
            'icon'              => 'format-gallery',
            'keywords'          => array( 'text', 'image', 'photo' ),
            'supports'          => array ('align' => false )
        ));

        acf_register_block_type(array(
            'name'              => 'side_by_side',
            'title'             => __('Side by Side'),
            'description'       => __('An image along side a big block of text.'),
            'render_template'   => 'blocks/block-side-by-side.php',
            'category'          => 'formatting',
            'icon'              => 'layout',
            'keywords'          => array( 'text', 'image', 'photo' ),
            'supports'          => array ('align' => false )
        ));

        acf_register_block_type(array(
            'name'              => 'case_quote',
            'title'             => __('Case Quote'),
            'description'       => __('A blockquote with a case citation.'),
            'render_template'   => 'blocks/block-case-quote.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'case', 'citation', 'quote' ),
        ));

        acf_register_block_type(array(
            'name'              => 'cta',
            'title'             => __('Call to Action'),
            'description'       => __('A call to action to be used in large blocks of text.'),
            'render_template'   => 'blocks/block-cta.php',
            'category'          => 'formatting',
            'icon'              => 'testimonial',
            'keywords'          => array( 'cta', 'call to action' ),
        ));
    endif;
}
?>