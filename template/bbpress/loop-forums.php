<?php
/**
 * Forums Loop
 *
 * @package Eighties Add-on - bbPress
 */
?>

<?php do_action( 'bbp_template_before_forums_loop' ); ?>

	<?php while ( bbp_forums() ) : bbp_the_forum(); ?>

		<?php bbp_get_template_part( 'loop', 'single-forum' ); ?>

	<?php endwhile; ?>

<?php do_action( 'bbp_template_after_forums_loop' ); ?>
