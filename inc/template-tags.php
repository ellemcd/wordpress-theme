<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Bootscore
 */


 // Prep Time
if ( ! function_exists( 'sweet_recipes_prep_time' ) ) :
	function sweet_recipes_prep_time() {

		// Bail  if ACF is not installed/activated.
		if (!function_exists('get_field')) {
			return;
		}

		// Check rows exists.
		if ( have_rows('recipe_details') ):
			// Loop through rows.
			while( have_rows('recipe_details') ) : the_row();

				// Load sub field value.
				$prep_time = get_sub_field('prep_time');

				// Prep Time
				if(!empty($prep_time)){
					printf( __('<dl><dd class="mb-0">Prep Time:</dd><dt>%s</dt></dl>','bootscore'),
						sprintf(
							__('%s mins', 'bootscore'),
							$prep_time
						)
					);
				} else {
					echo '<dl><dd class="mb-0">Prep Time:</dd><dt>-</dt></dl>';
				}

			// End loop.
			endwhile;
		endif;
	}
endif;
// Prep Time End

 // Cooking Time
 if ( ! function_exists( 'sweet_recipes_cooking_time' ) ) :
	function sweet_recipes_cooking_time() {

		// Bail  if ACF is not installed/activated.
		if (!function_exists('get_field')) {
			return;
		}

		// Check rows exists.
		if ( have_rows('recipe_details') ):
			// Loop through rows.
			while( have_rows('recipe_details') ) : the_row();

				// Load sub field value.
				$cooking_time = get_sub_field('cooking_time');

				// Cooking Time
				if(!empty($cooking_time)){
					printf( __('<dl><dd class="mb-0">Cooking Time:</dd><dt>%s</dt></dl>','bootscore'),
						sprintf(
							__('%s mins', 'bootscore'),
							$cooking_time
						)
					);
				} else {
					echo '<dl><dd class="mb-0">Cooking Time:</dd><dt>-</dt></dl>';
				}

			// End loop.
			endwhile;
		endif;
	}
endif;
// Cooking Time End

 // Prep Time
 if ( ! function_exists( 'sweet_recipes_servings' ) ) :
	function sweet_recipes_servings() {

		// Bail  if ACF is not installed/activated.
		if (!function_exists('get_field')) {
			return;
		}

		// Check rows exists.
		if ( have_rows('recipe_details') ):
			// Loop through rows.
			while( have_rows('recipe_details') ) : the_row();

				// Load sub field value.
				$servings = get_sub_field('servings');

				// Prep Time
				if (!empty($servings)) {
					printf ('<div class="border-bottom border-3 border-primary">%s</div>',
						sprintf(
							__('%s servings', 'bootscore'),
							$servings
						)
					);
				}

			// End loop.
			endwhile;
		endif;
	}
endif;
// Prep Time End

/**
 * Output custom logo (if set, otherwise output site title).
 *
 * @return void
 */
function sweet_recipes_navbar_brand() {
	$custom_logo_id = get_theme_mod('custom_logo');
	$logo = wp_get_attachment_image_src($custom_logo_id, 'full');

	if ($logo) {
		echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
	} else {
		echo get_bloginfo('name');
	}
}



if (!function_exists('sweet_recipes_gallery')) {
	function sweet_recipes_gallery() {
		// bail if ACF is not installed/activated, as we won't have a movie gallery to show anyway 😝
		if (!function_exists('get_field')) {
			return;
		}

		$gallery = get_field('gallery');
		// dump($gallery);

		if (!$gallery) {
			return;
		}

		?>
			<div class="owl-carousel owl-theme mt-5">
				<?php foreach ($gallery as $image): ?>
					<div class="item">
						<img src="<?php echo $image['url']; ?>">
					</div>
				<?php endforeach; ?>
			</div>

		<?php
	}
}

// Photo
if (!function_exists('sweet_recipes_image')) {
	function sweet_recipes_image() {
		// bail if ACF is not installed/activated.
		if (!function_exists('get_field')) {
			return;
		}

		$image = get_field('image');

		$img = wp_get_attachment_image_src($image['ID'], 'medium_large');
		$img_srcset = wp_get_attachment_image_srcset($image['ID'], 'medium_large');

		if (!$img) {
			return;
		}

		printf('<img src="%s" srcset="%s" class="w-100 me-3 mb-3 float-start img-fluid">', $img[0], $img_srcset);
	}
}
// Photo End

// Ingridients
if (!function_exists('sweet_recipes_ingredients_details')) {
	function sweet_recipes_ingredients_details() {
		// bail if ACF is not installed/activated.
		if (!function_exists('get_field')) {
			return;
		}

		if (have_rows('ingredients-details')) {
			// yes we have at least one row of sub-fields to show!

			echo '<h4 class="border-bottom border-4 border-info">' . esc_html__( 'Ingredients', 'bootscore' ) . '</h4>';
			echo'<ul class="recipes-ingredients list-group list-group-flush mb-4">';
			while (have_rows('ingredients-details')) {
				the_row();

				$quantity = get_sub_field('quantity');
				$measures = get_sub_field('measures');
				$ingredient = get_sub_field('ingredient');

				printf('<li class="list-group-item">%s %s %s</li> ', $quantity, $measures, $ingredient);
			}
			echo '</ul>';
		}
	}
}

// Ingredients End

// Notes for Recipes
if (!function_exists('sweet_recipes_notes')) {
	function sweet_recipes_notes() {
		// bail if ACF is not installed/activated, as we won't have a movie poster to show anyway 😝
		if (!function_exists('get_field')) {
			return;
		}

		if (have_rows('recipe-notes')) {
			// yes we have at least one row of sub-fields to show!

			echo '<h4 class="border-bottom border-4 border-primary">' . esc_html__( 'Notes', 'bootscore' ) . '</h4>';
			echo'<ul class="recipes-notes list-group mb-4">';
			while (have_rows('recipe-notes')) {
				the_row();

				$notes = get_sub_field('note');
				printf('<li class="list-group-item">%s</li> ', $notes);
			}
			echo '</ul>';

		}
	}
}
// Notes End


if ( ! function_exists( 'sweet_recipes_all_categories' ) ) :
	function sweet_recipes_all_categories() {

		// Bail  if ACF is not installed/activated.
		if (!function_exists('get_field')) {
			return;
		}

		$categories = get_terms([
			'taxonomy' => 'bs_recipie_category',
			'hide_empty' => false,
		]);

		$badges = [];

		foreach ($categories as $category) {
			// get URL to the archive page for $genre
			$category_url = get_term_link($category, 'bs_recipie_category');

			// Create anchor link
			$category= sprintf(
				'<a class="category-link" href="%s">%s</a>',
				$category_url,
				$category->name
			);

			// add anchor link to list of genre badges
			array_push($badges, $category);
		}

		// output badges with a space between them
		echo implode(' • ', $badges);


	}
endif;

// Category Badge For Archive
if ( ! function_exists( 'sweet_recipes_categories_badge' ) ) :
	function sweet_recipes_categories_badge() {
		// get all movie genres for the current post
		$categories = get_the_terms(get_the_ID(), 'bs_recipie_category');

		// bail if no movie genres exist for this post
		if (!$categories) {
			return;
		}

		echo '<div class="mb-2">';
		$badges = [];

		// loop over all genres and construct a HTML-link for each of them
		foreach ($categories as $category) {
			// get URL to the archive page for $genre
			$category_url = get_term_link($category, 'bs_recipie_category');

			// Create anchor link

			$category= sprintf(
				'<a href="%s" class="badge bg-info mt-2">%s</a>',
				$category_url,
				$category->name
			);

			// add anchor link to list of genre badges
			array_push($badges, $category);
		}

		// output badges with a space between them
		echo implode(' ', $badges);

		echo '</div>';
	}
endif;
// Category Badge End


// Category Links
if ( ! function_exists( 'sweet_recipes_categories_links' ) ) :
	function sweet_recipes_categories_links() {
		// get all movie genres for the current post
		$categories = get_the_terms(get_the_ID(), 'bs_recipie_category');

		// bail if no movie genres exist for this post
		if (!$categories) {
			return;
		}


		$badges = [];

		// loop over all genres and construct a HTML-link for each of them
		foreach ($categories as $category) {
			// get URL to the archive page for $genre
			$category_url = get_term_link($category, 'bs_recipie_category');

			// Create anchor link
			$category= sprintf(
				'<span class="divider">&nbsp;/&nbsp;<a href="%s">%s</a></span>',
				$category_url,
				$category->name
			);

			// add anchor link to list of genre badges
			array_push($badges, $category);
		}

		// output badges with a space between them
		echo implode('', $badges);


	}
endif;
// Category Links End




// Instructions
if (!function_exists('sweet_recipes_instructions')) {
	function sweet_recipes_instructions() {
		// bail if ACF is not installed/activated, as we won't have a movie poster to show anyway 😝
		if (!function_exists('get_field')) {
			return;
		}

		if (have_rows('recipe-instructions')) {
			// yes we have at least one row of sub-fields to show!

			echo '<h4 class="border-bottom border-4 border-info">' . esc_html__( 'Instructions', 'bootscore' ) . '</h4>';
			echo '<ol class="recipe-instructions" style="text-align: justify;">';
			while (have_rows('recipe-instructions')) {
				the_row();

				$instructions = get_sub_field('instructions');

				printf('<li>%s</li> ', $instructions);
			}
			echo '</ol>';
		}
	}
}
// Instructions End

// Category Badge
if ( ! function_exists( 'bootscore_category_badge' ) ) :
	function bootscore_category_badge() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
            echo '<div class="category-badge mb-2">';
            $thelist = '';
			$i = 0;
            foreach( get_the_category() as $category ) {
		      if ( 0 < $i ) $thelist .= ' ';
						    $thelist .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="badge bg-secondary">' . $category->name.'</a>';
						    $i++;
            }
            echo $thelist;
            echo '</div>';
		}
	}
endif;
// Category Badge End


// Category
if ( ! function_exists( 'bootscore_category' ) ) :
	function bootscore_category() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'bootscore' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links"></span>', $categories_list ); // WPCS: XSS OK.
			}
		}
	}
endif;
// Category End


// Date
if ( ! function_exists( 'bootscore_date' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function bootscore_date() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> <span class="time-updated-separator">/</span> <time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			'%s',
			'<span rel="bookmark">' . $time_string . '</span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;
// Date End


// Author
if ( ! function_exists( 'bootscore_author' ) ) :

	function bootscore_author() {
		$byline = sprintf(
			esc_html_x( 'by %s', 'post author', 'bootscore' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;
// Author End


// Comments
if ( ! function_exists( 'bootscore_comments' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function bootscore_comments() {


		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo ' | <i class="far fa-comments"></i> <span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment', 'bootscore' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

	}
endif;
// Comments End


// Edit Link
if ( ! function_exists( 'bootscore_edit' ) ) :
	/**
	 * Prints HTML with the comment count for the current post.
	 */
	function bootscore_edit() {

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit', 'bootscore' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			' | <span class="edit-link">',
			'</span>'
		);
	}
endif;
// Edit Link End


// Single Comments Count
if ( ! function_exists( 'bootscore_comment_count' ) ) :
	/**
	 * Prints HTML with the comment count for the current post.
	 */
	function bootscore_comment_count() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo ' | <i class="far fa-comments"></i> <span class="comments-link">';

			/* translators: %s: Name of current post. Only visible to screen readers. */
			// comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'bootscore' ), get_the_title() ) );
			comments_popup_link( sprintf( __( 'Leave a comment', 'bootscore' ), get_the_title() ) );


			echo '</span>';
		}
	}
endif;
// Single Comments Count End


// Tags
if ( ! function_exists( 'bootscore_tags' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function bootscore_tags() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {


			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', ' ' );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<div class="tags-links mt-2">' . esc_html__( 'Tagged %1$s', 'bootscore' ) . '</div>', $tags_list ); // WPCS: XSS OK.
			}
		}
	}
endif;


add_filter( "term_links-post_tag", 'add_tag_class');

function add_tag_class($links) {
    return str_replace('<a href="', '<a class="badge bg-secondary" href="', $links);
}
// Tags End


// Featured Image
if ( ! function_exists( 'bootscore_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function bootscore_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail('full', array('class' => 'rounded mb-3')); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;
// Featured Image End


// Internet Explorer Warning Alert
if ( ! function_exists( 'bootscore_ie_alert' ) ) :
	/**
	 * Displays an alert if page is browsed by Internet Explorer
	 */
	function bootscore_ie_alert() {
            $ua = htmlentities($_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8');
            if (preg_match('~MSIE|Internet Explorer~i', $ua) || (strpos($ua, 'Trident/7.0') !== false && strpos($ua, 'rv:11.0') !== false)) {
                echo '
                    <div class="container pt-5">
                        <div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
                            <h1>' . esc_html__( 'Internet Explorer detected', 'bootscore' ) . '</h1>
                            <p class="lead">' . esc_html__( 'This website will offer limited functionality in this browser.', 'bootscore' ) . '</p>
                            <p class="lead">' . esc_html__( 'Please use a modern and secure web browser like', 'bootscore' ) . ' <a href="https://www.mozilla.org/firefox/" target="_blank">Mozilla Firefox</a>, <a href="https://www.google.com/chrome/" target="_blank">Google Chrome</a>, <a href="https://www.opera.com/" target="_blank">Opera</a> ' . esc_html__( 'or', 'bootscore' ) . ' <a href="https://www.microsoft.com/edge" target="_blank">Microsoft Edge</a> ' . esc_html__( 'to display this site correctly.', 'bootscore' ) . '</p>
                        </div>
                    </div>
               ';
            }

	}
endif;


