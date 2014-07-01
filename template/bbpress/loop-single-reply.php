<?php
/**
 * Replies Loop - Single Reply
 *
 * @package Eighties Add-on - bbPress
 */

?>



<div id="post-<?php bbp_reply_id(); ?>" <?php bbp_reply_class(); ?>>

	<div class="bbp-reply-author">

		<?php do_action( 'bbp_theme_before_reply_author_details' ); ?>

		<?php bbp_reply_author_link( array( 'sep' => '', 'type' => 'avatar' ) ); ?>

		<?php do_action( 'bbp_theme_after_reply_author_details' ); ?>

	</div><!-- .bbp-reply-author -->

	<div class="bbp-reply-content">
		<div class="bbp-reply-content-author">
			<?php bbp_reply_author_link( array( 'sep' => '', 'show_role' => true, 'type' => 'name' ) ); ?>
		</div>

		<?php do_action( 'bbp_theme_before_reply_content' ); ?>

		<?php bbp_reply_content(); ?>

		<?php do_action( 'bbp_theme_after_reply_content' ); ?>

		<?php do_action( 'bbp_theme_before_reply_admin_links' ); ?>

		<?php
			$args = array(
				'sep'   => ''
			);

			bbp_reply_admin_links( $args );
		?>

		<?php do_action( 'bbp_theme_after_reply_admin_links' ); ?>

	</div><!-- .bbp-reply-content -->

	<div class="bbp-reply-actions">

		<div class="bbp-meta">

			<span class="bbp-reply-post-date"><?php bbp_reply_post_date( bbp_get_reply_id(), true ); ?></span>

			<?php if ( bbp_is_user_keymaster() ) : ?>

				<?php do_action( 'bbp_theme_before_reply_author_admin_details' ); ?>

				<div class="bbp-reply-ip"><?php bbp_author_ip( bbp_get_reply_id() ); ?></div>

				<?php do_action( 'bbp_theme_after_reply_author_admin_details' ); ?>

			<?php endif; ?>

			<?php if ( bbp_is_single_user_replies() ) : ?>

				<!-- <span class="bbp-header">
					<?php _e( 'in reply to: ', 'eighties-bbpress' ); ?>
					<a class="bbp-topic-permalink" href="<?php bbp_topic_permalink( bbp_get_reply_topic_id() ); ?>"><?php bbp_topic_title( bbp_get_reply_topic_id() ); ?></a>
				</span> -->

			<?php endif; ?>

			<!-- <a href="<?php bbp_reply_url(); ?>" class="bbp-reply-permalink">#<?php bbp_reply_id(); ?></a> -->

		</div><!-- .bbp-meta -->

	</div><!-- #post-<?php bbp_reply_id(); ?> -->

</div><!-- .reply -->
