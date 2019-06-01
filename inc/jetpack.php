<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package noa
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

function noa_jetpack_setup() {
	
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container'      => 'content',
		'render'         => 'noa_infinite_scroll_render',
		'footer'         => 'page',
		'posts_per_page' => 30,
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support for Content Options.
	add_theme_support( 'jetpack-content-options', array(
		'author-bio'         => true, // display or not the author bio: true or false.
    	'author-bio-default' => false, // the default setting of the author bio, if it's being displayed or not: true or false (only required if false).
    	'masonry'            => '.site-main',
		'post-details'    => array(
			'stylesheet' => 'noa-style',
			'date'       => '.post-date',
			'categories' => '.cat-links',
			'tags'       => '.tags-links',
			'author'     => '.byline',
			'comment'    => '.comments-link',
		),
		'featured-images' => array(
			'archive'    => true,
			'post'       => true,
			'page'       => true,
		),
	) );

	/**
	 * Author Bio Avatar Size.
	 */
	function noa_author_bio_avatar_size() {
		return 100; // in px
	}
	add_filter( 'jetpack_author_bio_avatar_size', 'noa_author_bio_avatar_size' );
}
add_action( 'after_setup_theme', 'noa_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function noa_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
			get_template_part( 'template-parts/content', 'search' );
		else :
			get_template_part( 'template-parts/content', get_post_type() );
		endif;
	}
}
