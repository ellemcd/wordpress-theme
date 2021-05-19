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

					<div class="recipes-header height-75 bg-dark text-light align-items-end dflex mb-3" style="background-image: linear-gradient(360deg, rgba(0,0,0,0.7805497198879552) 0%, rgba(0,0,0,0.4500175070028011) 34%, rgba(255,255,255,0) 87%), url('<?php echo $thumb['0']; ?>;'); background-position: center bottom;">
						<div class="container align-items-end justify-content-between d-flex h-100 pb-3">
							<?php the_title('<h1>', '</h1>'); ?>
							<h5>
								<?php sweet_recipes_servings(); ?>
							</h5>
						</div>
					</div>
				<?php endif; ?>

            </header>

            <div class="container pb-5">

                <div class="entry-content single-page mb-10">

					<?php if (!has_post_thumbnail()): ?>
						<?php the_title('<h1>', '</h1>'); ?>
					<?php endif; ?>

                    <p class="entry-meta">
                        <small class="text-muted">
							<?php _e('Categories:','bootscore') ?>
							<?php sweet_recipes_categories_links(); ?>
                        </small>
                    </p>

						<div class="row">
							<div class="col-lg-6 mb-4">
								<?php the_content(); ?>
							</div>
							<div class="col-lg-6 mb-4 d-flex justify-content-evenly">
								<?php sweet_recipes_prep_time(); ?>
								<?php sweet_recipes_cooking_time(); ?>
							</div>
						</div>

						<div class="row">
							<div class="col-6">
								<?php if (empty(sweet_recipes_image())): ?>
							</div>
							<div class="col-6 align-self-center">
								<?php sweet_recipes_ingredients_details(); ?>
							</div>
						</div>
						<?php endif; ?>

						<div class="row flex-row-reverse">
							<div class="col-sm-12 col-md-6 mb-4">
								<?php sweet_recipes_instructions(); ?>
							</div>

							<div class="col-sm-12 col-md-6 align-self-center">
								<?php if(empty(sweet_recipes_notes())): ?><?php endif;  ?>
							</div>

						</div>

						<!-- Gallery -->
						<?php sweet_recipes_gallery(); ?>

                </div>

                <footer class="entry-footer clear-both">

                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center pt-5">

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
