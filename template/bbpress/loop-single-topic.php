<?php
/**
 * Topics Loop - Single
 *
 * @package Eighties Add-on - bbPress
 */

?>

<ul id="bbp-topic-<?php bbp_topic_id(); ?>" <?php bbp_topic_class(); ?>>

	<li class="bbp-topic-title">

		<?php if ( bbp_is_user_home() ) : ?>

			<?php if ( bbp_is_favorites() ) : ?>

				<span class="bbp-row-actions">

					<?php do_action( 'bbp_theme_before_topic_favorites_action' ); ?>

					<?php bbp_topic_favorite_link( array( 'before' => '', 'favorite' => '+', 'favorited' => '&times;' ) ); ?>

					<?php do_action( 'bbp_theme_after_topic_favorites_action' ); ?>

				</span>

			<?php elseif ( bbp_is_subscriptions() ) : ?>

				<span class="bbp-row-actions">

					<?php do_action( 'bbp_theme_before_topic_subscription_action' ); ?>

					<?php bbp_topic_subscription_link( array( 'before' => '', 'subscribe' => '+', 'unsubscribe' => '&times;' ) ); ?>

					<?php do_action( 'bbp_theme_after_topic_subscription_action' ); ?>

				</span>

			<?php endif; ?>

		<?php endif; ?>

		<?php do_action( 'bbp_theme_before_topic_title' ); ?>

		<a class="bbp-topic-permalink" href="<?php bbp_topic_permalink(); ?>"><?php bbp_topic_title(); ?></a>

		<?php do_action( 'bbp_theme_after_topic_title' ); ?>

		<?php bbp_topic_row_actions(); ?>

	</li>

	<?php if ( is_post_type_archive( 'topic' ) ) : ?>
		<li class="bbp-topic-forum">
			<?php do_action( 'bbp_theme_before_topic_started_in' ); ?>

			<?php printf( __( '<a href="%1$s">%2$s</a>', 'eighties-bbpress' ), bbp_get_forum_permalink( bbp_get_topic_forum_id() ), bbp_get_forum_title( bbp_get_topic_forum_id() ) ); ?>

			<?php do_action( 'bbp_theme_after_topic_started_in' ); ?>
		</li>
	<?php endif; ?>

	<li class="bbp-topic-voices"><?php bbp_topic_voice_count(); ?></li>

	<li class="bbp-topic-replies"><?php bbp_show_lead_topic() ? bbp_topic_reply_count() : bbp_topic_post_count(); ?></li>

	<li class="bbp-topic-activity">

		<?php do_action( 'bbp_theme_before_topic_freshness_link' ); ?>

		<?php bbp_topic_freshness_link(); ?>

		<?php do_action( 'bbp_theme_after_topic_freshness_link' ); ?>
	</li>

	<?php if ( ! is_post_type_archive( 'topic' ) ) : ?>
		<li class="bbp-topic-author">
			<?php bbp_author_link( array( 'post_id' => bbp_get_forum_last_active_id(), 'size' => 24, 'type' => 'avatar' ) ) ?>
		</li>
	<?php endif; ?>

</ul><!-- #bbp-topic-<?php bbp_topic_id(); ?> -->
