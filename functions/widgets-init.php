<?php
if ( ! function_exists( 'rdm_widgets_init' ) ) : 
    function rdm_widgets_init()
    {
        register_sidebar( array(
			'name'          => esc_html__( 'Footer One', 'rdm' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'rdm' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Two', 'rdm' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'rdm' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Three', 'rdm' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'rdm' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		) );
    }
endif;
add_action( 'widgets_init', 'rdm_widgets_init' );
?>