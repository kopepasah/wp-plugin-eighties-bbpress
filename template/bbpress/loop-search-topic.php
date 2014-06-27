<?php
/**
 * Search Loop - Single Topic
 *
 * @package Eighties Add-on - bbPress
 */

?>

<li id="post-<?php bbp_topic_id(); ?>" class="bbp-results-item bbp-results-topic">
	<a href="<?php bbp_topic_permalink(); ?>"><span class="result-type"><?php _e( 'Topic', 'bbpress' ); ?></span></a>
	<?php bbp_author_link( array( 'post_id' => bbp_get_topic_id(), 'size' => 50, 'type' => 'avatar' ) ) ?>
	<a href="<?php bbp_topic_permalink(); ?>"><?php bbp_topic_title(); ?></a>
	<p><?php echo get_the_excerpt( bbp_get_topic_id() ); ?></p>
</li>