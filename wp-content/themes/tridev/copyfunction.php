<?php
define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/');
require_once dirname(__FILE__) . '/inc/options-framework.php';
/*
  add_theme_support('menus');
  register_nav_menu('menu_top', 'Menu Top'); */

/* Register Navigation Menus start */

function custom_navigation_menus() {
    $locations = array(
        'primary-menu' => __('Header_menu', 'tridev'),
        'footer-menu' => __('Footer_menu', 'tridev'),
    );
    register_nav_menus($locations);
}

add_action('init', 'custom_navigation_menus');

/* Register Navigation Menus end */
add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
));

// *************************               CSS/JQUERY             *******************
function load_tridev_scripts() {
// Theme stylesheet.
    wp_enqueue_style('tridev-style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '20141010', false);
    wp_enqueue_style('iso-top', get_template_directory_uri() . '/css/isotop.css', array(), '20160412');
    wp_enqueue_style('flexslider', get_template_directory_uri() . '/css/flexslider.min.css', array(), '20160412');
    wp_enqueue_style('jquery-ui', get_template_directory_uri() . '/css/jquery-ui.css', array(), '20160412');
    wp_enqueue_style('fancybox-css', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.css', array(), '20160412');
    wp_enqueue_style('responsive-tab', get_template_directory_uri() . '/css/responsive-tabs.css', array(), '20160412');
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css', array(), '20160412');
    wp_enqueue_style('resposive', get_template_directory_uri() . '/css/responsive.css', array(), '20160412');
}

add_action('wp_enqueue_scripts', 'load_tridev_scripts');

function tridev_scripts() {
//  wp_enqueue_script('map-js', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false');
//wp_enqueue_script('jquery-script', get_template_directory_uri() . '/js/jquery.min.js');
    wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.js');
    wp_enqueue_script('jquery-fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.js');
    wp_enqueue_script('jquery-midnight', get_template_directory_uri() . '/js/midnight.jquery.min.js');
    wp_enqueue_script('bootstrap-jquery', get_template_directory_uri() . '/js/bootstrap.min.js');
    wp_enqueue_script('jquery.flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js');
    wp_enqueue_script('responsive-tab-js', get_template_directory_uri() . '/js/jquery.responsiveTabs.js');
//wp_enqueue_script('jquery-isotope', get_template_directory_uri() . '/js/isotope-docs.min.js');
    wp_enqueue_script('jquery-custom', get_template_directory_uri() . '/js/custom.js');
}

add_action('wp_footer', 'tridev_scripts');

//Add support for svg
function add_svg_to_upload_mimes($upload_mimes) {
    $upload_mimes['svg'] = 'image/svg+xml';
    $upload_mimes['svgz'] = 'image/svg+xml';
    return $upload_mimes;
}

add_filter('upload_mimes', 'add_svg_to_upload_mimes', 10, 1);

// Register sidebabr ///
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Right Sidebar',
        'id' => 'right_sidebar',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}
add_theme_support('post-thumbnails');

function add_product() {
    $labels = array(
        'name' => 'Product',
        'singular_name' => 'Product',
        'menu_name' => 'Product',
        'name_admin_bar' => 'Product',
        'add_new' => 'Add New Product',
        'add_new_item' => 'Add New Product',
        'new_item' => 'New Product ',
        'edit_item' => 'Edit Product',
        'view_item' => 'View Product',
        'all_items' => 'All Product',
        'search_items' => 'Search Product',
        'parent_item_colon' => 'Parent Product:',
        'not_found' => 'No Product found.',
        'not_found_in_trash' => 'No Product found in Trash.'
    );
    $args = array(
        'public' => true,
        'labels' => $labels,
        'supports' => array('title', 'thumbnail', 'editor')
    );
    register_post_type('product', $args);
}

add_action('init', 'add_product');

function create_topics_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

    $labels = array(
        'name' => _x('Topics', 'taxonomy general name'),
        'singular_name' => _x('Topic', 'taxonomy singular name'),
        'search_items' => __('Search Topics'),
        'all_items' => __('All Topics'),
        'parent_item' => __('Parent Topic'),
        'parent_item_colon' => __('Parent Topic:'),
        'edit_item' => __('Edit Topic'),
        'update_item' => __('Update Topic'),
        'add_new_item' => __('Add New Topic'),
        'new_item_name' => __('New Topic Name'),
        'menu_name' => __('Topics'),
    );

// Now register the taxonomy
}

add_action('init', 'testimonialtaxonomies');

function testimonialtaxonomies() {
    register_taxonomy(
            'product category', 'product', array(
        'hierarchical' => true,
        'label' => 'product Categories',
        'singular_label' => 'product Categories',
        'rewrite' => true
            )
    );
}

//End custom post type
//add project custom post type:
function add_project() {
    $labels = array(
        'name' => 'Project',
        'singular_name' => 'Project',
        'menu_name' => 'Project',
        'name_admin_bar' => 'Project',
        'add_new' => 'Add New Project',
        'add_new_item' => 'Add New Project',
        'new_item' => 'New Project ',
        'edit_item' => 'Edit Project',
        'view_item' => 'View Project',
        'all_items' => 'All Project',
        'search_items' => 'Search Project',
        'parent_item_colon' => 'Parent Project:',
        'not_found' => 'No Project found.',
        'not_found_in_trash' => 'No Project found in Trash.'
    );
    $args = array(
        'public' => true,
        'labels' => $labels,
        'supports' => array('title', 'thumbnail', 'editor')
    );
    register_post_type('project', $args);
}

add_action('init', 'add_project');

//function to get latitude 

function getLatLong($address) {
    if (!empty($address)) {
//Formatted address
        $formattedAddr = str_replace(' ', '+', $address);
//Send request and receive json data by address
        $geocodeFromAddr = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddr . '&sensor=false&key=AIzaSyBMMWZaendVs4dQqffMFny74f0kDnF0rig');
        $output = json_decode($geocodeFromAddr);
//Get latitude and longitute from json data

        $data['latitude'] = $output->results[0]->geometry->location->lat;
        $data['longitude'] = $output->results[0]->geometry->location->lng;
//Return latitude and longitude of the given address
        if (!empty($data)) {
            return $data;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

////Our product location section shortcode
//function product_locationmap() {
//    
//}
//
//add_shortcode('project_map', 'product_locationmap');
// End our product location section shortcode
//home page video shortcode
function bannervideo() {
    $outvide = "";
    $outvide .= '<section class = "banner_video_section">
    <video loop = "" muted = "" autoplay = "" id = "MY_VIDEO_1" class = "video-js vjs-default-skin fullscreen_bg__video" preload = "auto" poster = " ' . get_template_directory_uri() . '/images/tridev-image.jpg">';
    $uploadedvideo = of_get_option('video_file');
    if ($uploadedvideo):
        $outvide .= '<source src = "' . $uploadedvideo . '" type = "video/mp4"> >
    <source src = "' . $uploadedvideo . '" type = "video/ogg">
    <source src = "' . $uploadedvideo . '" type = "video/webm">';
    endif;
    $outvide .= ' </video>
    </section>';
    return $outvide;
}

add_shortcode('display_banner_video', 'bannervideo');

//Our Product Section shortcode

function ourproductsection() {

    $out = "";
    $out .= '<section class = "our_products section" data-midnight = "white">
    <div class = "our_products_tab">
    <div class = "section_title">
    <div class = "container">
    <h3> ' . get_the_title(10) . '</h3>
    </div>
    </div>
    <div id = "responsiveTabs1">
    <ul class = "products_catagories">';
    $our_product = array(
        'post_type' => 'product',
        'posts_per_page' => 6,
        'order' => 'ASC'
    );
    $productloop = new WP_Query($our_product);
    $count = 0;
    if ($productloop->have_posts()):
        while ($productloop->have_posts()): $productloop->the_post();
            $count++;
            $featuredimg = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'thumbnail');
            $out .= '<li class = "rooms"><a href = "#tab-' . $count . '" style = "background: url(' . $featuredimg .
                    '); background-position: 50% 50%;  background-repeat: no-repeat;"></a></li>';

            wp_reset_postdata();
        endwhile;
    endif;
    $out .= '</ul>';

    $product_detail = array(
        'post_type' => 'product',
        'posts_per_page' => 6,
        'order' => 'ASC'
    );
    $productdetailloop = new WP_Query($product_detail);
    $i = 0;
    if ($productdetailloop->have_posts()):

        while ($productdetailloop->have_posts()): $productdetailloop->the_post();
            $i++;
            $id = get_the_ID();


            $out .= '<div id = "tab-' . $i . '">
    <div class = "tab-content">
    <div class = "tab_heading">
    <a href = "' . get_the_title() . '"> ' . get_the_title() . ' </a>
    </div>
    <div class = "view_more">
    <a href = " ' . get_permalink() . '">View More</a>
    </div>
    <div class = "product_slider">
    <div class = "flexslider">
    <ul class = "slides">';

            $allimages = array('p' => 235, 'post_type' => 'awl_filter_gallery', 'orderby' => 'ASC');
            $loop = new WP_Query($allimages);
            while ($loop->have_posts()) : $loop->the_post();
                $post_id = get_the_ID();

                $all_category = get_option('awl_portfolio_filter_gallery_categories');
                $pf_gallery_settings = unserialize(base64_decode(get_post_meta($post_id, 'awl_filter_gallery' . $post_id, true)));
                $pf_gallery_id = $post_id;
                // collect all selected filters assigned on images
                for ($ia = 0; $ia < count($pf_gallery_settings['image-ids']); $ia++) {
                    $attachment_id = $pf_gallery_settings['image-ids'][$ia];
                    $thumb = wp_get_attachment_image_src($attachment_id, 'thumb', true);
                    $thumbnail = wp_get_attachment_image_src($attachment_id, 'thumbnail', true);
                    $full = wp_get_attachment_image_src($attachment_id, 'full', true);
                    $postthumbnail = wp_get_attachment_image_src($attachment_id, 'post-thumbnail', true);
                    //set thumbnail size
                    $out .= '<li>
    <img src = "' . $thumb[0] . '" alt = "slider_img" class = "img-responsive "/>
    <a class = "fancybox" href = "' . $full[0] . '" data-fancybox = "gallery1"> <span class = "flex-caption "><img src = "' . get_template_directory_uri() . '/images/zoomin_flexscaption.png" alt = "zoomin"/> </span></a>
    </li>';
                }

            endwhile;

            $out .= '</ul>
    </div>
    </div>
    </div>
    </div>';

            wp_reset_postdata();
        endwhile;
    endif;


    $out .= '</div>
    </div>
    </section>';
    return $out;
}

add_shortcode('display_product_section', 'ourproductsection');

//shortcode to display map
function googlemap() {
    $location = of_get_option('contactandlocation');
    $out = "";
    if ($location):
        $out .= '<iframe src = "https://www.google.com/maps/embed/v1/place?key=AIzaSyCAftrFcin9nv1VdP9fndXz-o5znjoepJA &q=' . $location . '" allowfullscreen></iframe>';
    endif;
    return $out;
}

add_shortcode('display_googlemap', 'googlemap');



add_action('add_meta_boxes', 'dynamic_add_custom_box');

/* Do something with the data entered */
add_action('save_post', 'dynamic_save_postdata');

/* Adds a box to the main column on the Post and Page edit screens */

function dynamic_add_custom_box() {
    add_meta_box(
            'dynamic_sectionid', __('My Tracks', 'myplugin_textdomain'), 'dynamic_inner_custom_box', 'post');
}

/* Prints the box content */

function dynamic_inner_custom_box() {
    global $post;
    // Use nonce for verification
    wp_nonce_field(plugin_basename(__FILE__), 'dynamicMeta_noncename');
    ?>
    <div id="meta_inner">
        <?php
        //get the saved meta as an array
        $songs = get_post_meta($post->ID, 'location_info', false);

        $c = 0;
        if (count($songs) > 0) {

            foreach ($songs as $track) {

                print_r($songs);

                echo '<p>Song Title <input type="text" name="location_info[]" value="' . $track[5]['title'] . '" /></p>';
                $c = $c + 1;
            }
        }
        ?>
        <span id="here"></span>
        <span class="add"><?php _e('Add Tracks'); ?></span>
        <script>
            var $ = jQuery.noConflict();
            $(document).ready(function () {
                var count = <?php echo $c; ?>;
                $(".add").click(function () {
                    count = count + 1;

                    $('#here').append('<p> Song Title <input type="text" name="songs[]" value="" /></p>');
                    return false;
                });
                $(".remove").live('click', function () {
                    $(this).parent().remove();
                });
            });
        </script>
    </div><?php
}

/* When the post is saved, saves our custom data */

function dynamic_save_postdata($post_id) {
    // verify if this is an auto save routine. 
    // If it is our form has not been submitted, so we dont want to do anything
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if (!isset($_POST['dynamicMeta_noncename']))
        return;

    if (!wp_verify_nonce($_POST['dynamicMeta_noncename'], plugin_basename(__FILE__)))
        return;

    // OK, we're authenticated: we need to find and save the data

    $location_info = $_POST['location_info'];

    update_post_meta($post_id, 'location_info', $songs);
}
