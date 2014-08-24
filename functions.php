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
	wp_enqueue_script('crossbrowserselector', get_bloginfo('stylesheet_directory')."/js/css_browser_selector.js");
	wp_enqueue_script('scripts', get_bloginfo('stylesheet_directory')."/js/scripts.js");

	wp_enqueue_style( 'twentytwelve-style', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'barebone_load_assets' );

/*
 * Set up shortcodes
 */

function barebone_blog_url() {
	return get_bloginfo("url");
}

function barebone_stylesheet_directory() {
	return get_bloginfo("stylesheet_directory");
}

function barebone_nav($atts) {
	ob_start();
	wp_nav_menu($atts);
	$output = ob_get_contents();
	ob_end_clean();
	
	return $output;
}

add_shortcode('blog_url', 'barebone_blog_url');
add_shortcode('stylesheet_directory', 'barebone_stylesheet_directory'); 
add_shortcode('wp_nav_menu', 'barebone_nav'); 
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
 * Format the page title
 *
 * @param string $title Default title text
 * @param string $sep Separator
 * @return string Formatted title
 */
function barebone_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . max( $paged, $page );

	return $title;
}
add_filter( 'wp_title', 'barebone_wp_title', 10, 2 );