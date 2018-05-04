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

function load_custom_wp_admin_style() {
    wp_enqueue_script('my_custom_map_script', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBMMWZaendVs4dQqffMFny74f0kDnF0rig&libraries=places', array('jquery'), '', true);
    wp_enqueue_script('my_custom_admin_script', get_template_directory_uri() . '/js/admin_cust.js', array('jquery'), '', true);
}

add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');

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
            $slide = get_post_meta($id, '_galleryid', true);
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
            if ($slide):
                $allimages = array('p' => $slide, 'post_type' => 'awl_filter_gallery', 'orderby' => 'ASC');
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
            endif;
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

//repeater field meta

add_action('admin_init', 'add_meta_boxes', 1);

function add_meta_boxes() {
    add_meta_box('repeatable-fields', 'Google map location', 'repeatable_meta_box_display', 'project', 'normal', 'high');
}

function repeatable_meta_box_display() {
    global $post;
    $repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);
    wp_nonce_field('repeatable_meta_box_nonce', 'repeatable_meta_box_nonce');
    ?>

    <table id="repeatable-fieldset-one" width="100%">
        <thead>
            <tr>
                <th width="2%"></th>
                <th width="30%">Name</th>
    <!--                <th width="60%">URL</th>-->
            </tr>
        </thead>
        <tbody>
            <?php
            if ($repeatable_fields) :
                foreach ($repeatable_fields as $field) {
                    ?>
                    <tr>
                        <td><a class="button remove-row" href="#">-</a></td>

                        <td><input type="text" id="widefat" class="widefat location_info" name="name[]" value="<?php if ($field['name'] != '') echo esc_attr($field['name']); ?>" />
                            <input type="text" name="maplat[]" class="MapLat" value="<?php if ($field['maplat'] != '') echo esc_attr($field['maplat']); ?> ">
                            <input type="text" name="maplong[]" class="MapLon" value="<?php if ($field['maplong'] != '') echo esc_attr($field['maplong']); ?>">
                        </td>
                    </tr>
                    <?php
                }
            else :
                // show a blank one
                ?>
                <tr>
                    <td><a class="button remove-row" href="#">-</a></td>
                    <td><input type="text" class="widefat location_info" name="name[]" />
                        <input type="hidden" name="maplat[]" class="MapLat" value="">
                        <input type="hidden" name="maplong[]" class="MapLon" value="">
                    </td>
                </tr>
            <?php endif; ?>

            <!-- empty hidden one for jQuery -->
            <tr class="empty-row screen-reader-text">
                <td><a class="button remove-row" href="#">-</a></td>
                <td><input type="text" class="widefat location_info" name="name[]" />
                    <input type="hidden" name="maplat[]" class="MapLat" value="">
                    <input type="hidden" name="maplong[]" class="MapLon" value="">
                </td>
            </tr>

        </tbody>
    </table>

    <p><a id="add-row" class="button" href="#">Add another</a>
        <input type="submit" class="metabox_submit" value="Save" />
    </p>

    <?php
}

add_action('save_post', 'repeatable_meta_box_save');

function repeatable_meta_box_save($post_id) {
    if (!isset($_POST['repeatable_meta_box_nonce']) ||
            !wp_verify_nonce($_POST['repeatable_meta_box_nonce'], 'repeatable_meta_box_nonce'))
        return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
    if (!current_user_can('edit_post', $post_id))
        return;
    $old = get_post_meta($post_id, 'repeatable_fields', true);
    $new = array();
    $names = $_POST['name'];
    $maplat = $_POST['maplat'];
    $maplong = $_POST['maplong'];
    $count = count($names);
    for ($i = 0; $i < $count; $i++) {
        if ($names[$i] != '') :
            $new[$i]['name'] = stripslashes(strip_tags($names[$i]));
            if ($maplat[$i])
                $new[$i]['maplat'] = $maplat[$i];
            if ($maplong[$i])
                $new[$i]['maplong'] = $maplong[$i];
        endif;
    }
    if (!empty($new) && $new != $old)
        update_post_meta($post_id, 'repeatable_fields', $new);
    elseif (empty($new) && $old)
        delete_post_meta($post_id, 'repeatable_fields', $old);
}

///end repeater meta field
// Add custom slider selection 
add_action('add_meta_boxes', 'add_custom_box');

function add_custom_box($post) {
    add_meta_box(
            'Meta Box', // ID, should be a string.
            'Gallery Selection', // Meta Box Title.
            'display_product_meta_box', // Your call back function, this is where your form field will go.
            'product', // The post type you want this to show up on, can be post, page, or custom post type.
            'normal' // The placement of your meta box, can be normal or side.
            //  'core' // The priority in which this will be displayed.
    );
}

function display_product_meta_box($post) {
    wp_nonce_field('my_awesome_nonce', 'awesome_nonce');

    $getid = get_post_meta($post->ID, '_galleryid', true);
    $allimages = array('post_type' => 'awl_filter_gallery', 'orderby' => 'ASC');
    $loop = new WP_Query($allimages);
    while ($loop->have_posts()) : $loop->the_post();
        ?>
        <input type="radio" name="galleryid" value="<?php echo get_the_ID(); ?>"  <?php echo ($getid == get_the_ID()) ? "checked" : ""; ?> />   <?php the_title(); ?> <br>

        <?php
    endwhile;
}

add_action('save_post', 'save_selection_types');

function save_selection_types($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
    if (( isset($_POST['my_awesome_nonce']) ) && (!wp_verify_nonce($_POST['my_awesome_nonce'], plugin_basename(__FILE__)) ))
        return;
    if (( isset($_POST['post_type']) ) && ('page' == $_POST['post_type'] )) {
        if (!current_user_can('edit_page', $post_id)) {
            return;
        }
    } else {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    }


//saves Cases's value
    if (isset($_POST['galleryid'])) {
        $updateid = $_POST['galleryid'];
        update_post_meta($post_id, '_galleryid', $updateid);
    }
}

////map shortcode

function add_masection() {
    $out = "";
    $out .= '<section class="our_projects section" data-midnight="red">
                <div class="our_project_tab">
                    <div id="responsiveTabs2">
                     <div class="project_heading">
                            <h3>' . of_get_option('map_sec_title') . '</h3>
                        </div>
                       <ul class="r-tabs-nav">';

    $product_detail = array(
        'post_type' => 'project',
        'posts_per_page' => 6,
        'order' => 'ASC'
    );
    $productdetailloop = new WP_Query($product_detail);
    $i = 10;
    $ids = array();
    $min = 0;
    if ($productdetailloop->have_posts()):
        while ($productdetailloop->have_posts()): $productdetailloop->the_post();
            $min++;
            $i++;
            $id = get_the_ID();
            $ids[] = $id;

            $out .= '<li class="r-tabs-tab r-tabs-state-default" data-min="' . $min . '"><a href = "#tab-' . $i . '" class="r-tabs-anchor">' . get_the_title() . '</a></li>';
        endwhile;
    endif;
    $out .= '</ul>';
// $arrlength = count($ids);
    $args = array(
        'post_type' => 'project',
        'posts_per_page' => 6,
        'order' => 'ASC'
    );
    $pcnt = 10;
    $map = 0;
// $project = new WP_Query($product_detail);
    $locations = array();
    if ($productdetailloop->have_posts()):
        while ($productdetailloop->have_posts()): $productdetailloop->the_post();
            $pcnt++;
            $map++;
            $mpimg = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'thumbnail');
            $out .= '<div id = "tab-' . $pcnt . '">
         <div class="map_id' . $map . '" id="map' . $map . '" ></div>';
            $out .= '<input type = "hidden" class = "mapimg" value = "' . $mpimg . '" />';
            $repeatable_fields = get_post_meta(get_the_ID(), 'repeatable_fields', true);
            if ($repeatable_fields) :
                foreach ($repeatable_fields as $field) {
                    $address = $field['name'];
                    $latitude = $field['maplat'] ? $field['maplat'] : '';
                    $longitude = $field['maplong'] ? $field['maplong'] : '';
                    $out .= '<input type = "hidden" data-add="' . $address . '" class = "mapdata_' . $map . '" data-img="' . $mpimg . '" data-lat="' . $latitude . '" data-longitude="' . $longitude . '"/>';
                }
            endif;
            $out .= '</div>';
        endwhile;
    endif;
    $out .= '<div id = "output"></div>
    </div>
    </div>
    </section>';
    return $out;
}

add_shortcode('display_masection', 'add_masection');


