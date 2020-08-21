<?php
// filter to keep admission selection ordered by parent page
function rdm_pre_get_posts( $query )
{
	if( is_admin() ) :		
		return $query;
	endif;
    
	if( isset( $query->query_vars['post_type'] ) && $query->query_vars['post_type'] == 'admissions' ):		
		$query->set( 'orderby', 'post_parent' );	
		$query->set( 'order', 'DESC' ); 
	endif; 
	return $query;
}
add_action( 'pre_get_posts', 'rdm_pre_get_posts' );

if( function_exists( 'acf_add_options_page' ) ) :
    function rdm_options_pages()
    {
        acf_add_options_page(array(
            'page_title' 	=> 'Archive Page Settings',
            'menu_title'	=> 'Page Settings',
            'menu_slug' 	=> 'archive-page-settings',
            'capability'	=> 'edit_posts',
            'redirect'		=> false
        ));
        
        acf_add_options_sub_page(array(
            'page_title' 	=> 'Admissions Page Settings',
            'menu_title'	=> 'Admissions Page',
            'parent_slug'	=> 'archive-page-settings',
        ));
        
        acf_add_options_sub_page(array(
            'page_title' 	=> 'Office Page Settings',
            'menu_title'	=> 'Office Page',
            'parent_slug'	=> 'archive-page-settings',
        ));

        acf_add_options_sub_page(array(
            'page_title' 	=> 'Practice Page Settings',
            'menu_title'	=> 'Practice Page',
            'parent_slug'	=> 'archive-page-settings',
        ));
    }
    add_action('acf/init', 'rdm_options_pages');
endif;
?>