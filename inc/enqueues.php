<?php

/**
 * Enqueue scripts and styles.
 */
function ugwps_scripts() {
	// STYLES

	// bootstrap
	wp_enqueue_style( 'underscores-gbs-style-fonts', 'https://fonts.googleapis.com/css?family=Archivo:400,400i,500,500i,600,600i,700,700i|Quicksand:300,400,500,700|Roboto+Slab:100,300,400,700' );
	wp_enqueue_style( 'underscores-gbs-style-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' );


	// Swiper slider - uncomment when needed
	wp_enqueue_style( 'underscores-gbs-swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css' );


	// Main css file
	wp_enqueue_style( 'underscores-gbs-style', get_stylesheet_uri() );

	// JAVASCRIPT
	// jQuery CDN // DEPRECATED
	// wp_enqueue_script( 'underscores-gbs-jquery', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', array(), false, true );

	// bootstrap
	// wp_enqueue_script( 'underscores-gbs-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array(), false, true );	
	// Native bootstrap CDN 1
	wp_enqueue_script( 'underscores-gbs-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap.native@2.0.15/dist/bootstrap-native-v4.min.js', array(), false, true );
	// Native bootstrap CDN 2
	// wp_enqueue_script( 'underscores-gbs-bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap.native/2.0.15/bootstrap-native-v4.min.js', array(), false, true );


	// Swiper slider - uncomment when needed
	wp_enqueue_script( 'underscores-gbs-swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/js/swiper.min.js', array(), false, true );


	// Main js file
	wp_enqueue_script( 'underscores-gbs-main', get_template_directory_uri() . '/js-compiled/app.min.js', array(), false, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ugwps_scripts' );