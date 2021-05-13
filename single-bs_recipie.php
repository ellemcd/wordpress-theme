<?php
	/*
	 * Template Name: Full width image
	 * Template Post Type: post
	 */

	 get_header();  ?>

<div id="content" class="site-content <?php if (!has_post_thumbnail()): ?>py-5 mt-4<?php endif; ?>">
    <div id="primary" class="content-area">

        <!-- Hook to add something nice -->
        <?php bs_after_primary(); ?>

        <main id="main" class="site-main">

            <header class="entry-header">
                <?php the_post(); ?>
                <!-- Featured Image-->
				<?php if (has_post_thumbnail()): ?>

					<?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>

					<div class="height-75 bg-dark text-light align-items-end dflex mb-3" style="background-image: url('<?php echo $thumb['0']; ?>;'); background-position: center;">
						<div class="container align-items-end justify-content-between d-flex h-100 pb-3">
							<?php the_title('<h1>', '</h1>'); ?>
							<div class="h4">
								<?php sweet_recipes_details(); ?>
							</div>
						</div>
					</div>
				<?php endif; ?>

            </header>

            <div class="container pb-5">

                <div class="entry-content">

					<?php if (!has_post_thumbnail()): ?>
						<?php the_title('<h1>', '</h1>'); ?>
					<?php endif; ?>

                    <?php bootscore_category_badge(); ?>

                    <p class="entry-meta">
                        <small class="text-muted">

                        </small>
                    </p>


					<?php the_content(); ?>
					<?php sweet_recipes_instructions(); ?>
					<?php sweet_recipes_ingredients_details(); ?>



					<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
					<div class="carousel-inner">
					<div class="col-lg-4">
						<?php while (have_rows('page-slider')) : the_row(); ?>

							<div class="carousel-item <?php if(get_row_index() == 1) echo 'active'; ?>">
							<?php
								$image = get_sub_field('image');
								$image_url = $image['sizes']['large'];
							?>
								<img src="<?php echo $image_url; ?>" class="d-block w-100">
							</div>

						<?php endwhile; ?>
						</div>
						</div>

					</div>


                </div>

                <footer class="entry-footer clear-both">
                    <div class="mb-4">
                        <?php bootscore_tags(); ?>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <?php previous_post_link('%link'); ?>
                            </li>
                            <li class="page-item">
                                <?php next_post_link('%link'); ?>
                            </li>
                        </ul>
                    </nav>
                </footer>

                <?php comments_template(); ?>

            </div><!-- container -->

        </main><!-- #main -->

    </div><!-- #primary -->
</div><!-- #content -->
<?php get_footer(); ?>
