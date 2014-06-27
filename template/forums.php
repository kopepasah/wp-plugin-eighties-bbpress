<?php
/**
 * The template for displaying forums.
 *
 * @package Eighties bbPress
 * @author Justin Kopepasah
 * @since 1.0.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<header class="page-header">
				<?php if ( bbp_is_single_user() ) : ?>
					<?php echo get_avatar( bbp_get_displayed_user_field( 'user_email', 'raw' ), apply_filters( 'bbp_single_user_details_avatar_size', 150 ) ); ?>
				<?php endif; ?>
				<h1 class="page-title">
					<?php echo get_the_title( get_the_ID() ); ?>
				</h1>

				<?php if ( is_singular( 'forum' ) ) : ?>
					<div class="page-description">
						<?php if ( bbp_get_forum_content() ) : ?>
							<?php bbp_forum_content(); ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if ( bbp_allow_search() && ( bbp_is_forum_archive() || bbp_is_topic_archive() || bbp_is_search() ) ) : ?>
					<div class="bbp-search-form">
						<?php bbp_get_template_part( 'form', 'search' ); ?>
					</div>
				<?php endif; ?>

				<?php if ( bbp_is_topic_tag() && bbp_get_topic_tag_description() ) : ?>
					<div class="page-description">
						<?php bbp_topic_tag_description(); ?>
					</div>
				<?php endif; ?>

				<?php if ( bbp_is_single_user() ) : ?>
					<?php if ( bbp_get_displayed_user_field( 'description' ) ) : ?>
						<div class="page-description">
							<?php bbp_displayed_user_field( 'description' ); ?>
						</div>
					<?php endif; ?>
					<span><?php bbp_user_display_role(); ?></span>
				<?php endif; ?>
			</header><!-- .page-header -->

			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
