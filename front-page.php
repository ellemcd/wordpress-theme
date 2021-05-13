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
	'order'    => 'ASC'
);


$the_query = new WP_Query($args);



get_header();
?>

<div id="content" class="site-content">
	<div id="primary" class="content-area">

		<!-- Hook to add something nice -->
		<?php bs_after_primary(); ?>

		<main id="main" class="site-main">

			<header class="entry-header">
				<?php the_post(); ?>

				<div class="height-75 bg-dark text-light align-items-end dflex mb-3" <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?> <div id="featured-full-image" class"page-full-image" style="background-image: url('<?php echo $thumb['0']; ?>')">
					<div class="container align-items-end d-flex h-100 pb-3">

						<?php the_title('<h1>', '</h1>'); ?>
					</div>
			</header>

			<div class="container pb-5">


				<div class="entry-content">

					<div class="row" data-masonry='{"percentPosition": true }'>

						<h3><?php _e('Latest added recipies', 'bootscore'); ?> </h3>

						<?php if ($the_query->have_posts()) : ?>
							<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

								<div class="col-md-6 col-lg-4 col-xxl-3 mb-4">

									<div class="card">

										<?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?>

										<div class="card-body">

											<?php bootscore_category_badge(); ?>
											<?php

											if (have_rows('recipe_details')) :
												// Loop through rows.
												while (have_rows('recipe_details')) : the_row();

													$cooking_time = get_sub_field('cooking_time');


													if (!empty($cooking_time)) {

														printf(
															'<div class="badge bg-info mb-2">%s</div>',
															sprintf(
																__('%s mins', 'bootscore'),
																$cooking_time
															)
														);
													}

												endwhile;

											endif;


											?>

											<h3 class="blog-post-title">
												<a href="<?php the_permalink(); ?>">
													<?php the_title(); ?>
												</a>
											</h3>

											<div class="card-text">
												<?php the_excerpt(); ?>
											</div>

											<div class="btn btn-warning">
												<a class="read-more" href="<?php the_permalink(); ?>"><?php _e('Read more »', 'bootscore'); ?></a>
											</div>

											<?php bootscore_tags(); ?>

										</div><!-- card-body -->

									</div><!-- card -->

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
