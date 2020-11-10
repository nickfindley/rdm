<?php
add_filter('relevanssi_excerpt_content', 'excerpt_function', 10, 3);

function excerpt_function($content, $post, $query) {
        //add whatever you want to $content here
	return $content;
}