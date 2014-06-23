<?php
/**
 * Forums Loop - Single Forum
 *
 * @package Eighties Add-on - bbPress
 */

?>
<div class="bbp-forum-wrapper">
	<ul id="bbp-forum-<?php bbp_forum_id(); ?>" <?php bbp_forum_class(); ?>>

		<li class="bbp-forum-info bbp-info">

			<?php if ( bbp_is_user_home() && bbp_is_subscriptions() ) : ?>

				<span class="bbp-row-actions">

					<?php do_action( 'bbp_theme_before_forum_subscription_action' ); ?>

					<?php bbp_forum_subscription_link( array( 'before' => '', 'subscribe' => '+', 'unsubscribe' => '&times;' ) ); ?>

					<?php do_action( 'bbp_theme_after_forum_subscription_action' ); ?>

				</span>

			<?php endif; ?>

			<?php do_action( 'bbp_theme_before_forum_title' ); ?>

			<h2 class="bbp-forum-title"><a href="<?php bbp_forum_permalink(); ?>"><?php bbp_forum_title(); ?></a></h2>

			<?php do_action( 'bbp_theme_after_forum_title' ); ?>

			<?php do_action( 'bbp_theme_before_forum_description' ); ?>

			<?php if ( bbp_get_forum_content() ) : ?>
				<div class="bbp-forum-content"><?php bbp_forum_content(); ?></div>
			<?php endif; ?>

			<?php do_action( 'bbp_theme_after_forum_description' ); ?>

			<?php do_action( 'bbp_theme_before_forum_sub_forums' ); ?>

			<?php
				$args = array(
					'before'           => '<p class="bbp-forums-list-title"><span>' . __( 'Subforums', 'eighties-bbpress' ) . '</span></p><ul class="bbp-forums-list">',
					'separator'        => false,
					'show_topic_count' => false,
					'show_reply_count' => false
				);

				bbp_list_forums( $args );
			?>

			<?php do_action( 'bbp_theme_after_forum_sub_forums' ); ?>

			<?php bbp_forum_row_actions(); ?>
		</li>

		<li class="bbp-forum-counts bbp-counts">
			<div class="bbp-count-item">
				<span><?php _e( 'Topics', 'eighties-bbpress' ); ?></span>
				<span class="bbp-count-number"><?php bbp_forum_topic_count(); ?></span>
			</div>
			<div class="bbp-count-item">
				<span><?php _e( 'Replies', 'eighties-bbpress' ); ?></span>
				<span class="bbp-count-number"><?php bbp_show_lead_topic() ? bbp_forum_reply_count() : bbp_forum_post_count(); ?></span>
			</div>
		</li>

	</ul><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->
</div>