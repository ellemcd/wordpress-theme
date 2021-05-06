<?php function cptui_register_my_taxes() {

/**
 * Taxonomy: Categories.
 */

$labels = [
	"name" => __( "Categories", "bootscore" ),
	"singular_name" => __( "Category", "bootscore" ),
	"menu_name" => __( "Categories", "bootscore" ),
	"all_items" => __( "All Categories", "bootscore" ),
	"edit_item" => __( "Edit Category", "bootscore" ),
	"view_item" => __( "View Category", "bootscore" ),
	"update_item" => __( "Update Category name", "bootscore" ),
	"add_new_item" => __( "Add new Category", "bootscore" ),
	"new_item_name" => __( "New Category name", "bootscore" ),
	"parent_item" => __( "Parent Category", "bootscore" ),
	"parent_item_colon" => __( "Parent Category:", "bootscore" ),
	"search_items" => __( "Search Categories", "bootscore" ),
	"popular_items" => __( "Popular Categories", "bootscore" ),
	"separate_items_with_commas" => __( "Separate Categories with commas", "bootscore" ),
	"add_or_remove_items" => __( "Add or remove Categories", "bootscore" ),
	"choose_from_most_used" => __( "Choose from the most used Categories", "bootscore" ),
	"not_found" => __( "No Categories found", "bootscore" ),
	"no_terms" => __( "No Categories", "bootscore" ),
	"items_list_navigation" => __( "Categories list navigation", "bootscore" ),
	"items_list" => __( "Categories list", "bootscore" ),
	"back_to_items" => __( "Back to Categories", "bootscore" ),
];


$args = [
	"label" => __( "Categories", "bootscore" ),
	"labels" => $labels,
	"public" => true,
	"publicly_queryable" => true,
	"hierarchical" => false,
	"show_ui" => true,
	"show_in_menu" => true,
	"show_in_nav_menus" => true,
	"query_var" => true,
	"rewrite" => [ 'slug' => 'bs_recipie_category', 'with_front' => true, ],
	"show_admin_column" => false,
	"show_in_rest" => true,
	"rest_base" => "bs_recipie_category",
	"rest_controller_class" => "WP_REST_Terms_Controller",
	"show_in_quick_edit" => false,
	"show_in_graphql" => false,
];
register_taxonomy( "bs_recipie_category", [ "bs_recipie" ], $args );

/**
 * Taxonomy: Tags.
 */

$labels = [
	"name" => __( "Tags", "bootscore" ),
	"singular_name" => __( "Tag", "bootscore" ),
	"menu_name" => __( "Tags", "bootscore" ),
	"all_items" => __( "All Tags", "bootscore" ),
	"edit_item" => __( "Edit Tag", "bootscore" ),
	"view_item" => __( "View Tag", "bootscore" ),
	"update_item" => __( "Update Tag name", "bootscore" ),
	"add_new_item" => __( "Add new Tag", "bootscore" ),
	"new_item_name" => __( "New Tag name", "bootscore" ),
	"parent_item" => __( "Parent Tag", "bootscore" ),
	"parent_item_colon" => __( "Parent Tag:", "bootscore" ),
	"search_items" => __( "Search Tags", "bootscore" ),
	"popular_items" => __( "Popular Tags", "bootscore" ),
	"separate_items_with_commas" => __( "Separate Tags with commas", "bootscore" ),
	"add_or_remove_items" => __( "Add or remove Tags", "bootscore" ),
	"choose_from_most_used" => __( "Choose from the most used Tags", "bootscore" ),
	"not_found" => __( "No Tags found", "bootscore" ),
	"no_terms" => __( "No Tags", "bootscore" ),
	"items_list_navigation" => __( "Tags list navigation", "bootscore" ),
	"items_list" => __( "Tags list", "bootscore" ),
	"back_to_items" => __( "Back to Tags", "bootscore" ),
];


$args = [
	"label" => __( "Tags", "bootscore" ),
	"labels" => $labels,
	"public" => true,
	"publicly_queryable" => true,
	"hierarchical" => false,
	"show_ui" => true,
	"show_in_menu" => true,
	"show_in_nav_menus" => true,
	"query_var" => true,
	"rewrite" => [ 'slug' => 'bs_recipie_tags', 'with_front' => true, ],
	"show_admin_column" => false,
	"show_in_rest" => true,
	"rest_base" => "bs_recipie_tags",
	"rest_controller_class" => "WP_REST_Terms_Controller",
	"show_in_quick_edit" => false,
	"show_in_graphql" => false,
];
register_taxonomy( "bs_recipie_tags", [ "bs_recipie" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );
