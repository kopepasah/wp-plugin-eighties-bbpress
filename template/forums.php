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
				<h1 class="page-title">
					<?php echo get_the_title( get_the_ID() ); ?>
				</h1>

				<?php if ( is_singular( 'forum' ) ) : ?>
					<div class="page-description">
						<?php if ( bbp_get_forum_content() ) : ?>
							<?php bbp_forum_content(); ?>
						<?php endif; ?>

						<?php if ( bbp_get_single_forum_description() ) : ?>
							<div class="page-description">
								<?php
									$args = array(
										'before'    => '',
										'after'     => '',
										'size'      => 0
									);

									bbp_single_forum_description( $args );
								?>
							</div>
						<?php endif; ?>
					</div>
				<?php elseif ( is_singular( 'topic' ) && bbp_get_single_topic_description() ) : ?>
					<div class="page-description">
						<?php
							$args = array(
								'before'    => '',
								'after'     => '',
								'size'      => 0
							);

							bbp_single_topic_description( $args );
						?>
					</div>
				<?php endif; ?>

				<?php if ( bbp_allow_search() && ( is_post_type_archive( 'forum' ) || is_post_type_archive( 'topic' ) ) ) : ?>
					<div class="bbp-search-form">
						<?php bbp_get_template_part( 'form', 'search' ); ?>
					</div>
				<?php endif; ?>
			</header><!-- .page-header -->

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
