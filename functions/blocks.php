<?php
add_action('acf/init', 'rdm_acf_init');

function rdm_acf_init()
{	
	if( function_exists('acf_register_block') )
    {
		acf_register_block( array(
			'name'				=> 'subtitle',
			'title'				=> __('Subtitle'),
			'description'		=> __('Add a subtitle to your post.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'subtitle', 'title' ),
		) );
	}
}

function my_acf_block_render_callback( $block ) {
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/block" folder
	if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}.php") ) ) {
		include( get_theme_file_path("/template-parts/block/content-{$slug}.php") );
	}
}
?>