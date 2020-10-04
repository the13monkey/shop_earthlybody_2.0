<?php 

/*
** Template Name: WooCommerce My Account
** Note: change layouts of woocommerce my account login/register/dashboard ect. 
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

	get_footer(); 

?>