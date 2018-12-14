<?php
/**
 * Configure Image Sizes and Galleries
 *
 * @package McBoots-2018
 * @since 0.1
 */

if (!defined('ABSPATH')) exit; // exit if accessed directly

add_action( 'init', function() {
	// for max-width content embedding use sneaky WP Core medium_large size
	update_option( 'medium_large_size_w', 815 );
	update_option( 'medium_large_size_h', 0 );
});

add_action( 'after_setup_theme', function() {
	// full width image for home page jumbotron or carousel
	add_image_size( 'home-slide', 1140, 485, true );

	// square thumbnails for mixed gallery images
//	add_image_size( 'square-thumb', 275, 275, true );	// supports 3 col, 1px gutter
//	add_image_size( 'small-thumb', 136, 136, true );	// 6 col, 2px gutter

	// maximum size for linked gallery image
	add_image_size( 'max-gallery', 2560, 1440 );
});

// remove unused Piklist damn 96x96 image size
add_action( 'admin_init', function () {
    remove_image_size( 'piklist_file_preview' );
}, 99);


/**
 *	Configure the gallery thumbnail and enlarged (popup) image sizes.
 *
 * @package McBoots
 */

// avoids having the gallery popup image be unnecessarily huge
// the default size is 'full'
add_filter( 'mcb_gallery_enlarged_size', function( $img_size ) {
	return 'max-gallery';
});

/*
usually no need to filter 'mcb_gallery_thumb_size' as 'thumbnail' is default
*/
add_filter( 'mcb_gallery_thumb_size', function( $img_size ) {
//	return 'square-thumb';
	return $img_size;
});

add_filter( 'mcb_gallery_columns', function( $nr_cols ) {
	return $nr_cols > 6 ? 6 : $nr_cols;
});


/**
 *	Add Gallery Titles
 *	- adds title attribute to image tags; will show up as Magnific gallery captions
 *	- uses caption if configured, otherwise image title
 */
add_filter( 'mcb_get_gallery_caption', function( $caption, $id ) {
	$_post = get_post( $id );
	if ( !$_post ) return $caption;
	$caption = $_post->post_excerpt ? $_post->post_excerpt : $_post->post_title;
	return esc_html( $caption );
}, 10, 2 );

/**
 *	Custom Image Sizes
 *	- adds the custom image sizes to the list of choices in Insert Media
 */
add_filter( 'image_size_names_choose', function ( $sizes ) {
	global $_wp_additional_image_sizes;
	if ( !empty( $_wp_additional_image_sizes ) ) {
		foreach ( $_wp_additional_image_sizes as $id => $data ) {
			if ( !isset( $sizes[$id] ) )
			$sizes[$id] = ucfirst( str_replace( '-', ' ', $id ) );
		}
	}
	return $sizes;
});
