<div class="card">
	<a href="<?php the_permalink(); ?>">

		<?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?>
		<?php bootscore_categories_badge(); ?>

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
	</a>
</div><!-- card -->
