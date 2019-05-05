<?php


function blankslate_setup() {
    
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus(array(
        'main-menu' => 'Main Menu'
    ));

}
add_action('after_setup_theme', 'blankslate_setup');


function blankslate_load_scripts() {
    
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('style', get_stylesheet_uri());
    
    wp_enqueue_script('jquery', '/wp-includes/js/jquery/jquery.js', null, null, true);
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/bootstrap/js/bootstrap.min.js', null, null, true);
    
}
add_action('wp_enqueue_scripts', 'blankslate_load_scripts');


function blankslate_widgets_init() {
    
    register_sidebar(array(
        'name'          => 'Widgets',
        'id'            => 'widgets',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>'
    ));
    
}
add_action('widgets_init', 'blankslate_widgets_init');