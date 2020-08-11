<?php
require_once 'functions/autoversion.php';
require_once 'functions/blocks.php';
require_once 'functions/bootstrap-navwalker.php';
require_once 'functions/cp-walker.php';
require_once 'functions/image-sizes.php';
require_once 'functions/phone-format.php';
require_once 'functions/scripts.php';
require_once 'functions/setup.php';
require_once 'functions/styles.php';
require_once 'functions/users.php';
require_once 'functions/widgets-init.php';

function my_pre_get_posts( $query ) {
	
	// do not modify queries in the admin
	if( is_admin() ) {
		
		return $query;
		
	}
	

	// only modify queries for 'event' post type
	if( isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'admissions' ) {
		
		$query->set('orderby', 'post_parent');	
		$query->set('order', 'DESC'); 
		
	}
	

	// return
	return $query;

}

add_action('pre_get_posts', 'my_pre_get_posts');
?>