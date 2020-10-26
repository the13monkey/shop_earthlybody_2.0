<?php 

/*
** Template Name: WooCommerce Cart
** Note: change the general style of woocommerce cart page
*/

	get_header();
	
?>

<?php 
	if ( have_posts() ) : 

		while ( have_posts() ) : the_post(); 

			echo 
				'<div class="container-fluid container-lg px-lg-4">
					
					<div class="row justify-content-start p-3">

						<a href="'.wc_get_page_permalink( 'shop' ).'" class="text-secondary text-uppercase" style="font-size: 0.85rem; font-weight: 400;">&#8592; Continue Shopping</a>

					</div>

					<div class="row justify-content-start px-3">

						<h4>';

						echo get_the_title();
						
					echo'</h4>

					</div>

					<hr>
				
				</div>';
		
			the_content();

		endwhile; 

	endif; 
?>

<?php 

	get_footer(); 

?>
