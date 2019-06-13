<?php
function bfec_setup() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Lato|Oswald|Raleway|Roboto&display=swap' );
    wp_enqueue_style('style', get_stylesheet_uri(), NULL, microtime(), all);
    //version must change every time we change css, change microtime to 
    //version number after finished developement. 
    wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css');
    wp_enqueue_script('main', get_theme_file_uri('/js/main.js'), NULL, microtime(), true);

}

add_action('wp_enqueue_scripts', 'bfec_setup');

function bfec_init() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5', 
    array('comment-list', 'comment-form', 'search-form'));
}

add_action('after_setup_theme', 'bfec_init');

// staff post type
function bfec_custom_post_type() {
    register_post_type('staff', 
    array(
        'rewrite' => array('slug' => 'Employees'),
        'labels' => array(
            'name' => 'Employees', 
            'singular_name' => 'staff',
            'add_new_item' => 'Add Name',
            'edit_item' => 'Edit employee'
        ),
        'menu-icon' => 'dashicons-clipboard',
        'public' => true,
        'has_archive' => true,
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt', 'comments', 'custom-fields'
        ),
        'taxonomies' => array('Job Title')
        ));

        register_post_type('opportunity', 
        array(
        'rewrite' => array('slug' => 'opportunities'),
        'labels' => array(
            'name' => 'Opportunities', 
            'singular_name' => 'opportunity',
            'add_new_item' => 'Add opportunity',
            'edit_item' => 'Edit opportunity'
        ),
        'menu-icon' => 'dashicons-clipboard',
        'public' => true,
        'has_archive' => true,
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt', 'comments', 'custom-fields'
        ),
        'taxonomies' => array('Job Opening')
        ));
        
        register_post_type('landing-item', 
            array(
        'rewrite' => array('slug' => 'landing-items'),
        'labels' => array(
            'name' => 'landing-items', 
            'singular_name' => 'landing-item',
            'add_new_item' => 'Add Landing Item',
            'edit_item' => 'Edit Landing Item'
        ),
        'menu-icon' => 'dashicons-clipboard',
        'public' => true,
        'has_archive' => true,
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt', 'comments', 'custom-fields'
        )
        ));

        register_post_type('portfolio', 
        array(
        'rewrite' => array('slug' => 'portfolio-items'),
        'labels' => array(
            'name' => 'Portfolio-items', 
            'singular_name' => 'Portfolio',
            'add_new_item' => 'Add Portfolio Item',
            'edit_item' => 'Edit Portfolio Item'
        ),
        'menu-icon' => 'dashicons-clipboard',
        'public' => true,
        'has_archive' => true,
        'supports' => array(
            'title', 'thumbnail', 'editor', 'excerpt', 'comments', 'custom-fields'
        ),
        'taxonomies' => array('category', 'sub-category')
        ));
        
}
add_action('init', 'bfec_custom_post_type');
//front page items

// function reg_cat() {
//          register_taxonomy_for_object_type('category','staff');
// };
// add_action('init', 'reg_cat');

function mySearchFilter($articleQuery) {
    if( isset($_GET['search-type']) && $_GET['search-type']){
        $type = $_GET['search-type'];
    }
    if ($articleQuery->is_search && $type == 'blog') {
        $articleQuery->set('post_type', 'post');
    };
    return $articleQuery;
};

add_filter('pre_get_posts','mySearchFilter');

?>