<?php
/*
Author: Jake Giltsoff
URL: htp://createportfol.io
*/


// Fire all initial functions
// ------------------------------------------------------------

add_action('after_setup_theme','create_all_the_things', 15);

function create_all_the_things() {
	add_action('init', 'create_head_cleanup');
	add_filter('the_generator', 'create_rss_version');
	add_filter( 'wp_head', 'create_remove_wp_widget_recent_comments_style', 1 );
	add_action('wp_head', 'create_remove_recent_comments_style', 1);
	add_filter('gallery_style', 'create_gallery_style');
	add_action('wp_enqueue_scripts', 'create_scripts_and_styles', 999);
	add_action('after_setup_theme','create_theme_support');
	add_filter( 'get_search_form', 'create_wpsearch' );
	add_filter('the_content', 'create_filter_ptags_on_images');
	add_filter('excerpt_more', 'create_excerpt_more');
}


// Wordpress Cleanup
// ------------------------------------------------------------

function create_head_cleanup() {
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'feed_links', 2 );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	remove_action( 'wp_head', 'wp_generator' );
	add_filter( 'style_loader_src', 'create_remove_wp_ver_css_js', 9999 );
	add_filter( 'script_loader_src', 'create_remove_wp_ver_css_js', 9999 );
}

function create_rss_version() { return ''; }

function create_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}

function create_remove_wp_widget_recent_comments_style() {
	if ( has_filter('wp_head', 'wp_widget_recent_comments_style') ) {
		remove_filter('wp_head', 'wp_widget_recent_comments_style' );
	}
}

function create_remove_recent_comments_style() {
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
	}
}

function create_gallery_style($css) {
	return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}


// Enqueue css
// ------------------------------------------------------------

function create_scripts_and_styles() {
	if (!is_admin()) {
		wp_register_style( 'create-stylesheet', get_stylesheet_directory_uri() . '/assets/css/screen.css', array(), '', 'all' );
		wp_enqueue_style( 'create-stylesheet' );
	}
}


// Theme support
// ------------------------------------------------------------

function create_theme_support() {
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(125, 125, true);
	add_theme_support('automatic-feed-links');
	add_theme_support( 'menus' );
	register_nav_menus(
		array(
			'main-nav' => __( 'Header Menu', 'createtheme' )
		)
	);
}


// Menu
// ------------------------------------------------------------

function create_main_nav() {
	wp_nav_menu(array(
		'container' => false,
		'container_class' => 'menu',
		'menu' => __( 'Header Menu', 'createtheme' ),
		'menu_class' => 'menu nav top-nav',
		'theme_location' => 'main-nav',
		'before' => '',
		'after' => '',
		'link_before' => '',
		'link_after' => '',
		'depth' => 0,
		'fallback_cb' => 'create_main_nav_fallback'
	));
}

function create_main_nav_fallback() {
	wp_page_menu(array(
		'show_home' => true,
		'menu_class' => 'menu nav top-nav',
		'include' => '',
		'exclude' => '',
		'echo' => true,
		'link_before' => '',
		'link_after' => ''
	));
}


// Additional clear up
// ------------------------------------------------------------

function create_filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

function create_excerpt_more($more) {
	global $post;
	return '...';
}

function custom_excerpt_length( $length ) {
	return 50;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function create_get_the_author_posts_link() {
	global $authordata;
	if ( !is_object( $authordata ) )
		return false;
	$link = sprintf(
		'<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
		get_author_posts_url( $authordata->ID, $authordata->user_nicename ),
		esc_attr( sprintf( __( 'Posts by %s' ), get_the_author() ) ),
		get_the_author()
	);
	return $link;
}

?>