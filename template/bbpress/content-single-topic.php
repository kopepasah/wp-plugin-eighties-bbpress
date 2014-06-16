<?php
/**
 * Single Topic Content Part
 *
 * @package Eighties Add-on - bbPress
 */

?>

<div id="bbpress-forums">
	<?php do_action( 'bbp_template_before_single_topic' ); ?>

	<?php if ( post_password_required() ) : ?>

		<?php bbp_get_template_part( 'form', 'protected' ); ?>

	<?php else : ?>

		<?php
			$args = array(
				'before' => '<div class="bbp-topic-tags">',
				'sep'    => '',
				'after'  => '</div>'
			);

			bbp_topic_tag_list( bbp_get_topic_id(), $args );
		?>

		<?php bbp_single_topic_description(); ?>

		<?php if ( bbp_show_lead_topic() ) : ?>

			<?php bbp_get_template_part( 'content', 'single-topic-lead' ); ?>

		<?php endif; ?>

		<?php if ( bbp_has_replies() ) : ?>

			<?php bbp_get_template_part( 'pagination', 'replies' ); ?>

			<?php bbp_get_template_part( 'loop',       'replies' ); ?>

			<?php bbp_get_template_part( 'pagination', 'replies' ); ?>

		<?php endif; ?>

		<?php bbp_get_template_part( 'form', 'reply' ); ?>

	<?php endif; ?>

	<?php do_action( 'bbp_template_after_single_topic' ); ?>

</div>
