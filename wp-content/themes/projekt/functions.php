<?php

require 'post-types/team.php';

add_theme_support('menus');
add_theme_support('post-thumbnails');


//functions.php
function cl_scripts()
{
    //Add popper
    wp_enqueue_script('popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', ['jquery'], null, true);
    //Add bootstrap
    wp_enqueue_script('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', ['jquery', 'popper'], null, true);

    wp_enqueue_script('slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', ['jquery'], null, true);

    //Add botstrap styles
    wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');

    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/css/main.css', null, '1.0.0', 'all');

}
add_action('wp_enqueue_scripts', 'cl_scripts');

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

    register_sidebar( array(
        'name'          => 'Home right sidebar',
        'id'            => 'home_right_1',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

add_filter( 'excerpt_length', function($length) {
    return 20;
} );

if ( ! function_exists( 'post_pagination' ) ) :
    function post_pagination() {
        global $wp_query;
        $pager = 999999999; // need an unlikely integer


        echo paginate_links( array(
            'base' => str_replace( $pager, '%#%', esc_url( get_pagenum_link( $pager ) ) ),
            'category_name' => 'news',
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
        ) );
    }
endif;






