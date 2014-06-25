<?php
/**
 * Replies Loop
 *
 * @package Eighties Add-on - bbPress
 */

?>

<?php do_action( 'bbp_template_before_replies_loop' ); ?>

<ul id="topic-<?php bbp_topic_id(); ?>-replies" class="forums bbp-replies bbp-top-list">

	<li class="bbp-header">

		<div class="bbp-reply-author">
			<span class="bbp-header-title"><?php _e( 'User',  'bbpress' ); ?></span>
		</div><!-- .bbp-reply-author -->

		<div class="bbp-reply-content">

			<?php if ( ! bbp_show_lead_topic() ) : ?>

				<span class="bbp-header-title"><?php _e( 'Post', 'bbpress' ); ?></span>

				<?php bbp_user_favorites_link(); ?>

				<?php bbp_topic_subscription_link(); ?>

			<?php else : ?>

				<span><?php _e( 'Reply', 'bbpress' ); ?></span>

			<?php endif; ?>

		</div><!-- .bbp-reply-content -->

	</li><!-- .bbp-header -->

	<li class="bbp-body">

		<?php if ( bbp_thread_replies() ) : ?>

			<?php bbp_list_replies(); ?>

		<?php else : ?>

			<?php while ( bbp_replies() ) : bbp_the_reply(); ?>

				<?php bbp_get_template_part( 'loop', 'single-reply' ); ?>

			<?php endwhile; ?>

		<?php endif; ?>

	</li><!-- .bbp-body -->

</ul><!-- #topic-<?php bbp_topic_id(); ?>-replies -->

<?php do_action( 'bbp_template_after_replies_loop' ); ?>
