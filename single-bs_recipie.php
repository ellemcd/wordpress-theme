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
						Test
                        </small>
                    </p>

					<div class="row">
						<div class="col-6">
							<?php the_content(); ?>
						</div>
						<div class="col-6">
							<?php sweet_recipes_details(); ?>
						</div>
					</div>


					<?php sweet_recipes_image(); ?>

					<?php sweet_recipes_instructions(); ?>
					<?php sweet_recipes_ingredients_details(); ?>



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
