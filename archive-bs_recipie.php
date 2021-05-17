<?php

/**
 * Archive Template: Equal Height Sidebar Right
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();
?>
<div id="content" class="site-content container py-5 mt-5">
	<div id="primary" class="content-area">

		<!-- Hook to add something nice -->
		<?php bs_after_primary(); ?>

		<div class="row">
			<div class="col">

				<main id="main" class="site-main">

					<header class="page-header mb-4">
						<h1><?php the_archive_title(); ?></h1>
						<?php the_archive_description('<div class="archive-description">', '</div>'); ?>
					</header>

					<div class="row archive-page">
						<?php if (have_posts()) : ?>
							<?php while (have_posts()) : the_post(); ?>
								<div class="col-md-12 col-lg-6 col-xxl-4 mb-2">
									<a href="<?php the_permalink(); ?>">
										<div class="card">

											<?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?>

											<div class="card-body">

												<h4 class="blog-post-title">
													<a href="<?php the_permalink(); ?>">
														<?php the_title(); ?>
													</a>
												</h4>

												<div class="card-text">
													<?php the_excerpt(); ?>
												</div>

											</div>
										</div><!-- card -->
									</a>
								</div><!-- col -->
							<?php endwhile; ?>
						<?php endif; ?>
					</div>

					<!-- Pagination -->
					<div>
						<?php bootscore_pagination(); ?>
					</div>

				</main><!-- #main -->

			</div><!-- col -->
			<?php get_sidebar(); ?>
		</div><!-- row -->

	</div><!-- #primary -->
</div><!-- #content -->
<?php
get_footer();
