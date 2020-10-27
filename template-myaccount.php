<?php 

/*
** Template Name: WooCommerce My Account
** Note: change layouts of woocommerce my account login/register/dashboard ect. 
*/

	get_header();

?>

<div class="container-fluid container-lg">

<?php 
	if ( have_posts() ) : 

		while ( have_posts() ) : the_post(); 

			the_content();

		endwhile; 

	endif; 
?>

</div>

<?php 

	get_footer(); 

?>