<?php 

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ugwps_widgets_init() {
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Footer Top Left', 'underscores-gbs' ),
			'id'            => 'footer-left-widget',
			'description'   => esc_html__( 'Footer Top Left widget area (Address)', 'underscores-gbs' ),
			'before_widget' => '<address>',
			'after_widget'  => '</address>'
		)
	);

	register_sidebar( 
		array(
			'name'          => esc_html__( 'Footer Top Right', 'underscores-gbs' ),
			'id'            => 'footer-right-widget',
			'description'   => esc_html__( 'Footer Top Right widget area (above form title and text)', 'underscores-gbs' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>'
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Mid - Info', 'underscores-gbs' ),
			'id'            => 'footer-mid-widget',
			'description'   => esc_html__( 'Footer Mid - Info (Text that goes below main links)', 'underscores-gbs' ),
			'before_widget' => '<i>',
			'after_widget'  => '</i>'
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog index', 'underscores-gbs' ),
			'id'            => 'blog-index-widget',
			'description'   => esc_html__( 'Blog index (Categories, Tag cloud in sidebar)', 'underscores-gbs' ),
			'before_widget' => '<div class="widget">',
			'after_widget'  => '</div>'
		)
	);
}
add_action( 'widgets_init', 'ugwps_widgets_init' );