<?php
	/**
	 * The sidebar containing the main widget area
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Bootscore
	 */

	if ( ! is_active_sidebar( 'blog-sidebar' ) ) {
		return;
	}
	?>
<div class="col-md-4 col-xxl-3 mt-4 mt-md-0">
	<aside id="secondary" class="widget-area blog-sidebar">
		<?php dynamic_sidebar( 'blog-sidebar' ); ?>
	</aside>
	<!-- #secondary -->
</div>
