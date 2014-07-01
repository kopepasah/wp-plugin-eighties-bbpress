<?php
/**
 * User Subscriptions
 *
 * @package Eighties Add-on - bbPress
 */

?>

	<?php do_action( 'bbp_template_before_user_subscriptions' ); ?>

	<?php if ( bbp_is_subscriptions_active() ) : ?>

		<?php if ( bbp_is_user_home() || current_user_can( 'edit_users' ) ) : ?>

			<div id="bbp-user-subscriptions" class="bbp-user-subscriptions">
				<div class="bbp-user-section">

					<?php if ( bbp_get_user_forum_subscriptions() ) : ?>

						<?php bbp_get_template_part( 'loop', 'forums' ); ?>

					<?php else : ?>

						<p class="bbp-user-notice notice"><?php bbp_is_user_home() ? _e( 'You are not currently subscribed to any forums.', 'eighties-bbpress' ) : _e( 'This user is not currently subscribed to any forums.', 'eighties-bbpress' ); ?></p>

					<?php endif; ?>

				</div>

				<div class="bbp-user-section">

					<?php if ( bbp_get_user_topic_subscriptions() ) : ?>

						<?php bbp_get_template_part( 'pagination', 'topics' ); ?>

						<?php bbp_get_template_part( 'loop',       'topics' ); ?>

						<?php bbp_get_template_part( 'pagination', 'topics' ); ?>

					<?php else : ?>

						<p><?php bbp_is_user_home() ? _e( 'You are not currently subscribed to any topics.', 'eighties-bbpress' ) : _e( 'This user is not currently subscribed to any topics.', 'eighties-bbpress' ); ?></p>

					<?php endif; ?>

				</div>
			</div><!-- #bbp-user-subscriptions -->

		<?php endif; ?>

	<?php endif; ?>

	<?php do_action( 'bbp_template_after_user_subscriptions' ); ?>
