<?php

/**
 * Category Template: Masonry
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

		<main id="main" class="site-main">

			<header class="page-header mb-4">
				<h1><?php single_cat_title(); ?></h1>
				<?php the_archive_description('<div class="archive-description">', '</div>'); ?>
			</header>

			<pre>taxonomy-tags.php</pre>

			<div class="row cards-section">
				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
						<div class="col-md-12 col-lg-6 col-xxl-4 mb-2">
							<?php get_template_part('template-parts/content-cards'); ?>
						</div><!-- col -->
					<?php endwhile; ?>
				<?php endif; ?>
			</div>

			<!-- Pagination -->
			<div>
				<?php bootscore_pagination(); ?>
			</div>

		</main><!-- #main -->

	</div><!-- #primary -->
</div><!-- #content -->
<?php
get_footer();
