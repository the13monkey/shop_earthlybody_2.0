<?php 

/*
** Template Name: WooCommerce Checkout
** Note: change layouts of WooCommerce checkout page
*/

	get_header();

?>

<?php 
	if ( have_posts() ) : 

		while ( have_posts() ) : the_post(); 

			the_content();

		endwhile; 

	endif; 
?>


<?php 

	get_footer() ; 

?>