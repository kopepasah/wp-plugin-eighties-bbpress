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