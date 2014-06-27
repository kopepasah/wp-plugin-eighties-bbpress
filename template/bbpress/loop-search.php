<?php
/**
 * Search Loop
 *
 * @package Eighties Add-on - bbPress
 */

?>

<?php do_action( 'bbp_template_before_search_results_loop' ); ?>

<div id="bbp-search-results" class="forums bbp-search-results">

	<ul class="bbp-results">
		<?php while ( bbp_search_results() ) : bbp_the_search_result(); ?>

			<?php bbp_get_template_part( 'loop', 'search-' . get_post_type() ); ?>

		<?php endwhile; ?>
	</ul>

</div><!-- #bbp-search-results -->

<?php do_action( 'bbp_template_after_search_results_loop' ); ?>