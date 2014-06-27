<?php
/**
 * Search Loop - Single Reply
 *
 * @package Eighties Add-on - bbPress
 */

?>

<li id="post-<?php bbp_reply_id(); ?>" class="bbp-results-item bbp-results-reply">
	<a href="<?php bbp_reply_url(); ?>"><span class="result-type"><?php _e( 'Reply', 'bbpress' ); ?></span></a>
	<?php bbp_reply_author_link( array( 'sep' => '', 'type' => 'avatar', 'size' => 50 ) ); ?>
	<a href="<?php bbp_reply_url(); ?>">#<?php bbp_reply_id(); ?></a>
	<span class="dash">&ndash;</span>
	<?php bbp_reply_author_link( array( 'sep' => '', 'type' => 'name', 'class' => 'result-secondary-link' ) ); ?>
	<span class="reply-to"><?php _e( ' in reply to ', 'bbpress' ); ?></span>
	<a class="result-secondary-link" href="<?php bbp_topic_permalink( bbp_get_reply_topic_id() ); ?>"><?php bbp_topic_title( bbp_get_reply_topic_id() ); ?></a>
	<p><?php echo get_the_excerpt( bbp_get_reply_id() ); ?></p>
</li>