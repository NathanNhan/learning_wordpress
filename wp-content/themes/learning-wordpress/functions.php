<?php
function learningWordpress_resources () {
    wp_enqueue_style('style' , get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'learningWordpress_resources');
//navigation Menu



/** custom excerpt length */
function get_excerpt_length () {
    return 25;
}
add_filter('excerpt_length' , 'get_excerpt_length');



//add new feature images
function learningWordpress_setup () {
    //register nav menu 
    register_nav_menus(array(
    'primary' => __('Primary Menu'),
    'footer' => __('Footer Menu'),
) );
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnail' , 180, 120 , true);
    add_image_size('banner-image', 920  , 210, true);
}
add_action('after_setup_theme' , 'learningWordpress_setup')
?>




