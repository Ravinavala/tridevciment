<?php 
// Create Custom post Type in Applications
/*add_action('init', 'create_applications_type');

function create_applications_type() {
    register_post_type('application', array(
        'labels' => array(
        'name' => _x('application', 'post type general name'),
        'singular_name' => _x('application', 'post type singular name'),
        'add_new' => _x('Add New', 'ocr_gallery'),
        'add_new_item' => __("Add New application"),
        'edit_item' => __("Edit application"),
        'new_item' => __("New application"),
        'view_item' => __("View application"),
        'search_items' => __("Search application"),
        'not_found' => __('No application found'),
        'not_found_in_trash' => __('No application found in Trash'),
        'parent_item_colon' => ''
        ),
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'custom-fields', 'page-attributes', 'post-formats',),
        'taxonomies' => array(''),
        'has_archive' => true
            )
    );
}

add_action('init', 'create_applications_taxonomies', 0);

function create_applications_taxonomies() {
    register_taxonomy(
        'application_type', 'application', array(
        'labels' => array(
            'name' => 'Categories application',
            'add_new_item' => 'Add application Category',
            'new_item_name' => "New Category"
        ),
        'show_ui' => true,
        'show_tagcloud' => false,
        'hierarchical' => true
            )
    );
} */

?>
