<?php 

/*
** Template Name: WooCommerce Checkout
** Note: change layouts of WooCommerce checkout page
*/

	get_header();

?>

<div class="container-fluid container-lg">

	<h3 class="text-uppercase text-center font-weight-light my-3">Checkout</h3>

<?php 
	if ( have_posts() ) : 

		while ( have_posts() ) : the_post(); 

			the_content();

		endwhile; 

	endif; 
?>

</div>

<?php 

	get_footer() ; 

?>