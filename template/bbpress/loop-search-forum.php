<?php
/**
 * Search Loop - Single Forum
 *
 * @package Eighties Add-on - bbPress
 */

?>

<li id="post-<?php bbp_forum_id(); ?>" class="bbp-results-item bbp-results-forum">
	<a href="<?php bbp_forum_permalink(); ?>"><span class="result-type"><?php _e( 'Forum', 'bbpress' ); ?></span></a>
	<a href="<?php bbp_forum_permalink(); ?>"><?php bbp_forum_title(); ?></a>
	<p><?php echo get_the_excerpt( bbp_get_forum_id() ); ?></p>
</li>