<?php
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/sass/child-theme.min.css', array(), '1.0.4' );
    wp_enqueue_style( 'font_awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), null, all );
    // wp_enqueue_script( 'bundle-scripts', get_stylesheet_directory_uri() . '/js/bundle-child.min.js', array(), $the_theme->get( 'Version' ), true);
    wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), false);
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
function register_my_menus() {
    register_nav_menus(
      array(
        'top-main-menu' => __( 'Top Main Menu' )
      )
    );
  }
  add_action( 'init', 'register_my_menus' );

add_filter( 'allowed_http_origins', 'add_allowed_origins' );
function add_allowed_origins( $origins ) {
    $origins[] = 'https://www.resortrelease.com';
    $origins[] = 'https://www.resortreleasecrm.com';
    return $origins;
}
add_action( ‘init’, ‘blockusers_init’ );
function blockusers_init() {
if ( is_admin() && ! current_user_can( ‘administrator’ ) &&
! ( defined( ‘DOING_AJAX’ ) && DOING_AJAX ) ) {
wp_redirect( home_url() );
exit;
}
}