<?php
    /**
     * Template Name: Full Width Image
     *
     * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
     *
     * @package Bootscore
     */

	$args = array(
		'post_type'=> 'bs_recipie',
		'order'    => 'ASC'
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
                <?php $the_query->the_post(); ?>


                <div class="height-75 bg-dark text-light align-items-end dflex mb-3" <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?> <div id="featured-full-image" class"page-full-image" style="background-image: url('<?php echo $thumb['0'];?>')">
                    <div class="container align-items-end d-flex h-100 pb-3">
                        <?php the_post(); ?>
						<?php the_title('<h1>', '</h1>'); ?>
                    </div>
            </header>

            <div class="container pb-5">


                <div class="entry-content">

				<div class="row" data-masonry='{"percentPosition": true }'>
                <?php if ($the_query->have_posts() ) : ?>
                <?php while ($the_query->have_posts() ) : $the_query->the_post(); ?>

               		<div class="col-md-6 col-lg-4 col-xxl-3 mb-4">

                    	<div class="card">

                        <?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?>

                        <div class="card-body">

                            <?php bootscore_category_badge(); ?>

                            <h2 class="blog-post-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <?php if ( 'post' === get_post_type() ) : ?>

                            <small class="text-muted mb-2">
                                <?php
								bootscore_date();
								bootscore_author();
								bootscore_comments();
								bootscore_edit();
								?>
                            </small>

                            <?php endif; ?>

                            <div class="card-text">
                                <?php the_excerpt(); ?>
                            </div>

                            <div class="">
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

                <?php comments_template(); ?>

            </div><!-- container -->

        </main><!-- #main -->

    </div><!-- #primary -->
</div><!-- #content -->
<?php
get_footer();
