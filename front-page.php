<?php 

/*
** Template Name: Front Page
*/

	get_header(); 

?> 

<div class="container-fluid">

	<div class="row justify-content-center align-items-center mt-3 mb-0">
		
		<h5 class="text-brown text-uppercase font-weight-bold">Shop by Brand</h5>

	</div>

	<div class="row justify-content-center align-items-center mt-0 mb-3">
	
		<div style="width: 50vw">
			
			<a href="<?php echo get_site_url() ?>/marrakesh-hair-care/">
				<img src="<?php echo get_template_directory_uri() ?>/img/home/marrakesh1.jpg" class="w-100 img-thumbnail rounded-0 border-0" alt="<?php echo get_bloginfo( 'name' ) ?>" />
			</a>

		</div>

		<div style="width: 50vw">
			
			<a href="<?php echo get_site_url() ?>/hemp-seed-body-care/">
				<img src="<?php echo get_template_directory_uri() ?>/img/home/home-hempseed1.jpg" class="w-100 img-thumbnail rounded-0 border-0" alt="<?php echo get_bloginfo( 'name' ) ?>" />
			</a>

		</div>

		<div style="width: 50vw">
		
			<a href="<?php echo get_site_url() ?>/cbd-daily-products/">
				<img src="<?php echo get_template_directory_uri() ?>/img/home/home-cbddaily1.jpg" class="w-100 img-thumbnail rounded-0 border-0" alt="<?php echo get_bloginfo( 'name' ) ?>" />
			</a>

		</div>

		<div style="width: 50vw">
		
			<a href="<?php echo get_site_url() ?>/emera-cbd-hair-care/">
				<img src="<?php echo get_template_directory_uri() ?>/img/home/home-emera1.jpg" class="w-100 img-thumbnail rounded-0 border-0" alt="<?php echo get_bloginfo( 'name' ) ?>" />
			</a>

		</div>
	
	</div>

	<div class="row justify-content-center align-items-center my-3">
	
		<h5 class="text-brown text-uppercase font-weight-bold">New Arrivals</h5>

	</div>

	<?php echo do_shortcode( '[products limit="8" orderby="date DESC"]' ); ?>

	<div class="row justify-content-center align-items-center flex-column p-5 mb-5" style="background: radial-gradient(circle, #b38764 0%, #613d20 100%)">

		<h1 class="text-uppercase my-0 text-white pt-3" style="line-height: 1; font-size: 2.5rem; font-weight-bold">Save 25%</h1>

		<p class="text-white">Sign up for our mailing list</p>

		<a href="#" class="text-uppercase btn btn-light mb-5">Save on your next order ></a>

	</div>


</div>



<?php get_footer(); ?>



