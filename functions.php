//This is child theme functions.php file. This code helps you to connect to main theme css with putting 
//child theme css to be last one to load, thereby overriding any other css.

<?php
function use_parent_theme_stylesheet() {
    // Use the parent theme's stylesheet
    return get_template_directory_uri() . '/style.css';
}

function my_theme_styles() {
    $themeVersion = wp_get_theme()->get('Version');

    // Enqueue our style.css with our own version
    wp_enqueue_style('child-theme-style', get_stylesheet_directory_uri() . '/style.css',
        array(), $themeVersion);
}

// Filter get_stylesheet_uri() to return the parent theme's stylesheet 
add_filter('stylesheet_uri', 'use_parent_theme_stylesheet');

// Enqueue this theme's scripts and styles (after parent theme)
add_action('wp_enqueue_scripts', 'my_theme_styles', 20);
