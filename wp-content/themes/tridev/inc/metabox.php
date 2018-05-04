<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */


add_filter( 'rwmb_meta_boxes', 'your_prefix_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @return void
 */
function your_prefix_register_meta_boxes( $meta_boxes )
{
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'pho_';

	$meta_boxes[] = array(
		'title' => __( 'Add Gallary', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'portfolio' ),
		'fields' => array(
			
			array(
				'name'             => __( 'Gallary Image Upload', 'rwmb' ),
				'id'               => "{$prefix}pro_gallary",
				'type'             => 'plupload_image',
				'max_file_uploads' => 10,
			),
			
		)
	);

	return $meta_boxes;
}