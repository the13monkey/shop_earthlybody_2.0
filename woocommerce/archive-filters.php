<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h3 class="woocommerce-products-header__title page-title text-center text-uppercase text-dark font-weight-light mt-4 mb-5">
		
			<?php 

				$category_name = get_the_archive_title();

				if ( strpos( $category_name, 'MM-' ) !== false ) {

					echo str_replace("MM-", "", $category_name);

				} else {

					echo $category_name; 

				}

			?>
		
		</h3>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>

<div class="container">

	<div class="row">

		<div class="col col-12 col-lg-2 border-right">
			
			<h7 class="font-weight-bold text-uppercase">Available Scents</h7>
			
			<?php 
			
			//Get the current category (could also put the desired slug or id into $product_category directly)
			$term = get_queried_object();
			$product_category = $term->slug;
 
			//Iterate through all products in this category
			$query_args = array(
			
			'product_cat' => $product_category,
			'post_type' => 'product',
			
			//Grabs ALL post
			'posts_per_page' => -1
			);
 
			$query = new WP_Query( $query_args );
			$term_array = array();
     
			while( $query->have_posts() ) {
				$query->the_post();
				$terms = get_the_terms( get_the_ID(), 'product_tag' );
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
						foreach ( $terms as $term ) {
							$term_array[] = $term->name;
						}
				}
			}
     
			//Remove any duplicates.
			$tags_unique = array_unique($term_array);
 
			//Sort alphabetically
			asort($tags_unique);
			
			?>

			<?php foreach ($tags_unique as $unique) : ?>

				<div class="form-check my-3">
					<input class="form-check-input" type="checkbox" value="<?php echo $unique ?>">
					<label class="form-check-label" for="defaultCheck1">
						<?php echo $unique ?>
					</label>
				</div>
			
			<?php endforeach; ?>

			<?php 

			//Reset the query
			wp_reset_postdata();
			
			?>

			<script>
			
			jQuery(document).ready(function($){

				$('.form-check-input').change(function(){

					$('.show').removeClass('show');

					var checkedBoxes = $('.form-check-input:checked');

					if (checkedBoxes.length > 0 ) {

						// Get all checked checkboxes
						
						checkedBoxes.each(function(){

							var value = $(this).val();

							$('.filter[value="'+value+'"]').parent().addClass('show');

						});

						$('.product').fadeOut();

						$('.show').fadeIn();

					} else {

						$('.product').fadeIn();

					}

				});

			});
		
			</script>

		</div>

		<div class="col col-12 col-lg-10">
		
		<?php
			if ( woocommerce_product_loop() ) {

				/**
				 * Hook: woocommerce_before_shop_loop.
				 *
				 * @hooked woocommerce_output_all_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );

				woocommerce_product_loop_start();

				if ( wc_get_loop_prop( 'total' ) ) {
					while ( have_posts() ) {
						the_post();

						/**
						 * Hook: woocommerce_shop_loop.
						 */
						do_action( 'woocommerce_shop_loop' );

						wc_get_template_part( 'content', 'product' );
					}
				}

				woocommerce_product_loop_end();

				/**
				 * Hook: woocommerce_after_shop_loop.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			} else {
				/**
				 * Hook: woocommerce_no_products_found.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			}

			/**
			 * Hook: woocommerce_after_main_content.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );

			/**
			 * Hook: woocommerce_sidebar.
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			do_action( 'woocommerce_sidebar' );

			?>	
		
		</div>		

	</div>

</div>

<?php

get_footer( 'shop' );
