<?php

/**
 * Template Name: Full Width Image
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

$args = array(
	'post_type' => 'bs_recipie',
	'posts_per_page' => 9,
);

$the_query = new WP_Query( $args );

get_header();
?>

<div id="content" class="site-content">
	<div id="primary" class="content-area">

		<!-- Hook to add something nice -->
		<?php bs_after_primary(); ?>

		<main id="main" class="site-main">

			<header class="entry-header">
				<?php the_post(); ?>

				<?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>

				<div class="frontpage-header bg-dark text-light align-items-end dflex mb-3" style="background-image: linear-gradient(360deg, rgba(0,0,0,0.3805497198879552) 0%, rgba(0,0,0,0.1500175070028011) 34%, rgba(255,255,255,0) 97%), url('<?php echo $thumb['0']; ?>;'); background-position: center center; background-size: cover;">

			</header>

			<div class="container front-page pb-5">

				<div class="entry-content">

					<p class="entry-meta text-center">
						<small class="text-muted">
							<?php sweet_recipes_all_categories(); ?>
						</small>
					</p>

					<div class="row" data-masonry='{"percentPosition": true }'>

						<h3 class="latest-added mb-4">
							<?php _e('Latest added recipies','bootscore')?>
						</h3>

						<?php if ($the_query->have_posts()) : ?>
							<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

								<div class="col-md-6 col-lg-4 col-xxl-3 col-sm-12">

								<a href="<?php the_permalink(); ?>">
									<div class="card">

										<?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?>

										<div class="card-body">

											<h4 class="blog-post-title">
												<a href="<?php the_permalink(); ?>">
													<?php the_title(); ?>
												</a>
											</h4>

										</div><!-- card-body -->

									</div><!-- card -->
									</a>

								</div><!-- col -->

							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>

					</div><!-- row -->

					<?php the_content(); ?>

				</div>

				<footer class="entry-footer">

				</footer>

				<?php the_content(); ?>

			</div><!-- container -->

		</main><!-- #main -->



	</div><!-- #primary -->
</div><!-- #content -->
<?php
get_footer();
