<?php

/**
 * Set up theme
 */

function barebone_setup() {

	// Register primary menu
	register_nav_menu( 'primary', 'Primary Menu' );

	//Enqueue comments script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );


}
add_action( 'after_setup_theme', 'barebone_setup' );

/**
 * Enqueue frontend scripts and styles
 */
function barebone_load_assets() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('crossbrowserselector', get_stylesheet_directory_uri()."/js/css_browser_selector.js");
	wp_enqueue_script('scripts', get_stylesheet_directory_uri()."/js/scripts.js");

	wp_enqueue_style( 'barebone-theme-style', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'barebone_load_assets' );

/**
 * Allow shortcodes on yext widgets
 */
add_filter('widget_text', 'do_shortcode');

/**
 * Register widget areas
 */

function barebone_widgets() {

	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'primary-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}
add_action( 'widgets_init', 'barebone_widgets' );

/**
 * Set default content width
 */
if ( ! isset( $content_width ) ) {
	$content_width = 960;
}

/**
 * Add theme support for auto feed links
 */
add_theme_support( 'automatic-feed-links' );

/**
 * Add theme support for post thumbnails
 */
add_theme_support( "post-thumbnails" );

/*
 * Allows the user to change the page title
 */
add_theme_support( "title-tag" );
