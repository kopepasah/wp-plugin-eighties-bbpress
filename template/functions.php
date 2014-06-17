<?php
/**
 * Template functions.
 *
 * @package Eighties Add-on - bbPress
 *
 * This file contains various functions and hooks
 * used for the templates.
*/

/**
 * Filter the stylesheet to use a minified style.
 *
 * @since 1.0.0
*/
function eighties_bbp_default_styles( $styles ) {
	$styles['bbp-default']['file'] = 'css/bbpress.min.css';

	return $styles;
}
add_filter( 'bbp_default_styles', 'eighties_bbp_default_styles' );

/**
 * Remove the Jetpack Infinite Scroll from the
 * forum archive.
 *
 * @since 1.0.0
*/
function eighties_bbp_jetpack_remove_infinite_scroll() {
	if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) && ( is_post_type_archive( 'forum' ) || is_post_type_archive( 'topic' ) )  ) {
		wp_dequeue_script( 'the-neverending-homepage' );
	}
}
add_action( 'wp_enqueue_scripts', 'eighties_bbp_jetpack_remove_infinite_scroll' );

/**
 * Modify the pagination links to use Font Awesome
 * icons.
 *
 * @since 1.0.0
*/
function eighties_bbp_replies_topic_pagination_icons( $args ) {
	$args['prev_text'] = is_rtl() ? '<i class="fa fa-chevron-right"></i>' : '<i class="fa fa-chevron-left"></i>';
	$args['next_text'] = is_rtl() ? '<i class="fa fa-chevron-left"></i>' : '<i class="fa fa-chevron-right"></i>';

	return $args;
}
add_filter( 'bbp_replies_pagination', 'eighties_bbp_replies_topic_pagination_icons' );
add_filter( 'bbp_topic_pagination', 'eighties_bbp_replies_topic_pagination_icons' );