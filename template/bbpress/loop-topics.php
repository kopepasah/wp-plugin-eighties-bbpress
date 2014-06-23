<?php
/**
 * Topics Loop
 *
 * @package Eighties Add-on - bbPress
 */

?>

<?php do_action( 'bbp_template_before_topics_loop' ); ?>

<ul id="bbp-forum-<?php bbp_forum_id(); ?>" class="bbp-topics bbp-top-list">

	<li class="bbp-header">

		<ul class="item-names">
			<li class="bbp-topic-title"><?php _e( 'Topic', 'bbpress' ); ?></li>
			<?php if ( is_post_type_archive( 'topic' ) ) : ?>
				<li class="bbp-topic-forum"><?php _e( 'Forum', 'bbpress' ); ?></li>
			<?php endif; ?>
			<li class="bbp-topic-voices"><?php _e( 'Voices', 'bbpress' ); ?></li>
			<li class="bbp-topic-replies"><?php bbp_show_lead_topic() ? _e( 'Replies', 'bbpress' ) : _e( 'Posts', 'bbpress' ); ?></li>
			<li class="bbp-topic-activity"><?php _e( 'Latest Activity', 'bbpress' ); ?></li>
			<?php if ( ! is_post_type_archive( 'topic' ) ) : ?>
				<li class="bbp-topic-author"><?php _e( 'Poster', 'bbpress' ); ?></li>
			<?php endif; ?>
		</ul>

	</li>

	<li class="bbp-body">

		<?php while ( bbp_topics() ) : bbp_the_topic(); ?>

			<?php bbp_get_template_part( 'loop', 'single-topic' ); ?>

		<?php endwhile; ?>

	</li>

</ul><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->

<?php do_action( 'bbp_template_after_topics_loop' ); ?>
