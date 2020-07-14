<?php
if ( ! function_exists( 'rdm_setup' ) ) :
	function rdm_setup()
    {		
		load_theme_textdomain( 'rdm', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		register_nav_menus( array(
			'primary' => __( 'Primary Nav', 'rdm' ),
            'locations' => __( 'Locations Nav', 'rdm' )
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'gallery',
			'caption',
		) );

		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'rdm_setup' );
?>