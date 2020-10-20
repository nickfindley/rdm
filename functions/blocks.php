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

        acf_register_block_type(array(
            'name'              => 'cta-form',
            'title'             => __('Call to Action Form'),
            'description'       => __('A call to action with a form.'),
            'render_template'   => 'blocks/block-cta-form.php',
            'category'          => 'formatting',
            'icon'              => 'testimonial',
            'keywords'          => array( 'cta', 'call to action', 'form' ),
        ));

        acf_register_block_type(array(
            'name'              => 'blurb_container',
            'title'             => __('Blurb Container'),
            'description'       => __('A container to hold blurb boxes'),
            'render_template'   => 'blocks/block-blurb-container.php',
            'category'          => 'formatting',
            'icon'              => 'testimonial',
            'keywords'          => array( 'blurb', 'box', 'container' ),
            'supports'          => array(
                'align' => false,
                'jsx' => true,
                'mode' => 'edit'
            ),
        ));

        acf_register_block_type(array(
            'name'              => 'blurb_box',
            'title'             => __('Blurb Box'),
            'description'       => __('A small block for a short piece of info to be highlighted.'),
            'render_template'   => 'blocks/block-blurb-box.php',
            'category'          => 'formatting',
            'icon'              => 'testimonial',
            'keywords'          => array( 'blurb', 'box', 'text' ),
            'supports'          => array( 'mode' => 'edit' )
        ));

        acf_register_block_type(array(
            'name'              => 'big_image_form',
            'title'             => __('Big Image Form'),
            'description'       => __('Text and a form over a big image.'),
            'render_template'   => 'blocks/block-big-image-form.php',
            'category'          => 'formatting',
            'icon'              => 'testimonial',
            'keywords'          => array( 'image', 'form', 'text' ),
            'supports'          => array(
                'align' => false,
                'mode' => 'edit'
            ),
        ));

        acf_register_block_type(array(
            'name'              => 'landing_page_text',
            'title'             => __('Landing Page Text'),
            'description'       => __('Headline and text block for landing page.'),
            'render_template'   => 'blocks/block-landing-page-text.php',
            'category'          => 'formatting',
            'icon'              => 'testimonial',
            'keywords'          => array( 'landing page', 'text' ),
            'supports'          => array( 'mode' => 'edit' ),
        ));

        acf_register_block_type(array(
            'name'              => 'landing_page_image_columns',
            'title'             => __('Landing Page Image Columns'),
            'description'       => __('Columns overlaid on an image.'),
            'render_template'   => 'blocks/block-landing-page-image-columns.php',
            'category'          => 'formatting',
            'icon'              => 'testimonial',
            'keywords'          => array( 'landing page', 'text', 'image' ),
            'supports'          => array( 'mode' => 'edit' ),
        ));
    endif;
}
?>