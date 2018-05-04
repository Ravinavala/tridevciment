<?php

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */
function optionsframework_option_name() {
    // This gets the theme name from the stylesheet
    $themename = wp_get_theme();
    $themename = preg_replace("/\W/", "_", strtolower($themename));
    $optionsframework_settings = get_option('optionsframework');
    $optionsframework_settings['id'] = $themename;
    update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */
function optionsframework_options() {
    $options = array();
    $options[] = array(
        'name' => __('Header & home page Settings', 'options_framework'),
        'type' => 'heading');
    $options[] = array(
        'name' => __('Logo', 'options_framework_theme'),
        'desc' => __('Upload Header Logo.', 'options_framework'),
        'id' => 'header_logo',
        'type' => 'upload');
    $options[] = array(
        'name' => __('Menu Logo', 'options_framework_theme'),
        'desc' => __('Upload Menu Logo.', 'options_framework'),
        'id' => 'menu_logo',
        'type' => 'upload');
    $options[] = array(
        'name' => __('Favicon Icon', 'options_framework_theme'),
        'desc' => __('Upload Favicon Icon.', 'options_framework'),
        'id' => 'favicon_icon',
        'type' => 'upload');

    $options[] = array(
        'name' => __('Video', 'options_framework_theme'),
        'desc' => __('Upload video', 'options_framework'),
        'id' => 'video_file',
        'type' => 'upload');

    $options[] = array(
        'name' => __('Map Section Title', 'options_framework_theme'),
        'desc' => __('map section title', 'options_framework'),
        'id' => 'map_sec_title',
        'type' => 'text');
    $options[] = array(
        'name' => __('Other pages header Setting', 'options_framework'),
        'type' => 'heading');

    $options[] = array(
        'name' => __('Logo', 'options_framework_theme'),
        'desc' => __('Upload Header Logo.', 'options_framework'),
        'id' => 'otherpage_logo',
        'type' => 'upload');



    $options[] = array(
        'name' => __('Footer Setting', 'options_framework'),
        'type' => 'heading');
    $options[] = array(
        'name' => __('Copyright text', 'options_framework_theme'),
        'desc' => __('Footer Copyright text', 'options_framework'),
        'id' => 'copyright_text',
        'type' => 'textarea');

    $options[] = array(
        'name' => __('Power by Text', 'options_framework_theme'),
        'desc' => __('Footer Text', 'options_framework'),
        'id' => 'powerby_text',
        'type' => 'text');

    $options[] = array(
        'name' => __('Power by Url', 'options_framework_theme'),
        'desc' => __('Footer Text', 'options_framework'),
        'id' => 'powerby_url',
        'type' => 'text');

    $options[] = array(
        'name' => __('Social Setting', 'options_framework'),
        'type' => 'heading');
    $options[] = array(
        'name' => __('Twitter Url', 'options_framework_theme'),
        'desc' => __('Twitter Url', 'options_framework'),
        'id' => 'twitter',
        'type' => 'text');
    $options[] = array(
        'name' => __('Facebook Url', 'options_framework_theme'),
        'desc' => __('Facebook Url', 'options_framework'),
        'id' => 'facebook',
        'type' => 'text');
    $options[] = array(
        'name' => __('Google + ', 'options_framework_theme'),
        'desc' => __('Google + Url', 'options_framework'),
        'id' => 'google_plus',
        'type' => 'text');

    $options[] = array(
        'name' => __('Contact & Location Info', 'options_framework'),
        'type' => 'heading');
    $options[] = array(
        'name' => __('Email', 'options_framework_theme'),
        'desc' => __('Email', 'options_framework'),
        'id' => 'email',
        'type' => 'text');
    $options[] = array(
        'name' => __('Contact no', 'options_framework_theme'),
        'desc' => __('Contact no', 'options_framework'),
        'id' => 'contact_no',
        'type' => 'text');
    $options[] = array(
        'name' => __('Location Type', 'options_framework_theme'),
        'desc' => __('Location type text', 'options_framework'),
        'id' => 'location_text',
        'type' => 'text');
    $options[] = array(
        'name' => __('Location ', 'options_framework_theme'),
        'desc' => __('Location', 'options_framework'),
        'id' => 'contactandlocation',
        'type' => 'textarea');

    return $options;
}
