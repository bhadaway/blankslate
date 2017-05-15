<?php
// General Setup
function blankslate_setup() {
  add_theme_support( 'title-tag' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
  global $content_width;
  if ( ! isset( $content_width ) ) $content_width = 640;
  register_nav_menus( array(
    'main-menu' => 'Main Menu'
  ));
}
add_action( 'after_setup_theme', 'blankslate_setup' );

// Styles & Scripts
function blankslate_load_scripts() {
  wp_enqueue_style( 'style', get_stylesheet_uri() );
  wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );


// Setup Widgets
function blankslate_widgets_init() {
  register_sidebar( array (
    'name'          => 'Sidebar Widget Area',
    'id'            => 'primary-widget-area',
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget'  => "</li>",
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
