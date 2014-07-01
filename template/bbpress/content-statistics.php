<?php
/**
 * Statistics Content Part
 *
 * @package Eighties Add-on - bbPress
 */

// Get the statistics
$stats = bbp_get_statistics(); ?>

<ul role="main" class="bbp-widget-statistics">

	<?php do_action( 'bbp_before_statistics' ); ?></span>

	<li>
		<span><?php _e( 'Registered Users', 'eighties-bbpress' ); ?></span>
		<span class="stat-count"><?php echo esc_html( $stats['user_count'] ); ?></span>
	</li>
	<li>
		<span><?php _e( 'Forums', 'eighties-bbpress' ); ?></span>
		<span class="stat-count"><?php echo esc_html( $stats['forum_count'] ); ?></span>
	</li>
	<li>
		<span><?php _e( 'Topics', 'eighties-bbpress' ); ?></span>
		<span class="stat-count"><?php echo esc_html( $stats['topic_count'] ); ?></span>
	</li>
	<li>
		<span><?php _e( 'Replies', 'eighties-bbpress' ); ?></span>
		<span class="stat-count"><?php echo esc_html( $stats['reply_count'] ); ?></span>
	</li>
	<li>
		<span><?php _e( 'Topic Tags', 'eighties-bbpress' ); ?></span>
		<span class="stat-count"><?php echo esc_html( $stats['topic_tag_count'] ); ?></span>
	</li>

	<?php if ( ! empty( $stats['empty_topic_tag_count'] ) ) : ?>
		<li>
			<span><?php _e( 'Empty Topic Tags', 'eighties-bbpress' ); ?></span>
			<span class="stat-count"><?php echo esc_html( $stats['empty_topic_tag_count'] ); ?></span>
		</li>
	<?php endif; ?>

	<?php if ( ! empty( $stats['topic_count_hidden'] ) ) : ?>
		<li>
			<span><?php _e( 'Hidden Topics', 'eighties-bbpress' ); ?></span>
			<span class="stat-count"><?php echo esc_html( $stats['topic_count_hidden'] ); ?></span>
		</li>
	<?php endif; ?>

	<?php if ( !empty( $stats['reply_count_hidden'] ) ) : ?>
		<li>
			<span><?php _e( 'Hidden Replies', 'eighties-bbpress' ); ?></span>
			<span class="stat-count"><?php echo esc_html( $stats['reply_count_hidden'] ); ?></span>
		</li>
	<?php endif; ?>

	<?php do_action( 'bbp_after_statistics' ); ?></span>

</ul>

<?php unset( $stats );