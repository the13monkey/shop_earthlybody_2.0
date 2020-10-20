<?php 

/*
** Template Name: Front Page
*/

	get_header(); 

?> 

<div class="container-fluid" id="home-content-wrapper">

	<div class="row justify-content-center align-items-center mt-3 mb-0">
		
		<h5 class="text-brown text-uppercase font-weight-bold">Shop by Brand</h5>

	</div>

	<div class="row justify-content-center align-items-center mt-0 mb-3" id="shop-by-brand">
	
		<div class="shop-single-brand">
			
			<a href="<?php echo get_site_url() ?>/marrakesh/">
				<img src="<?php echo get_template_directory_uri() ?>/img/home/marrakesh1.jpg" class="w-100 img-thumbnail rounded-0 border-0" alt="<?php echo get_bloginfo( 'name' ) ?>" />
			</a>

		</div>

		<div class="shop-single-brand">
			
			<a href="<?php echo get_site_url() ?>/hempseed/">
				<img src="<?php echo get_template_directory_uri() ?>/img/home/home-hempseed1.jpg" class="w-100 img-thumbnail rounded-0 border-0" alt="<?php echo get_bloginfo( 'name' ) ?>" />
			</a>

		</div>

		<div class="shop-single-brand">
		
			<a href="<?php echo get_site_url() ?>/cbddaily/">
				<img src="<?php echo get_template_directory_uri() ?>/img/home/home-cbddaily1.jpg" class="w-100 img-thumbnail rounded-0 border-0" alt="<?php echo get_bloginfo( 'name' ) ?>" />
			</a>

		</div>

		<div class="shop-single-brand">
		
			<a href="<?php echo get_site_url() ?>/emera/">
				<img src="<?php echo get_template_directory_uri() ?>/img/home/home-emera1.jpg" class="w-100 img-thumbnail rounded-0 border-0" alt="<?php echo get_bloginfo( 'name' ) ?>" />
			</a>

		</div>
	
	</div>

	<div class="row justify-content-center align-items-center my-3">
	
		<h5 class="text-brown text-uppercase font-weight-bold">New Arrivals</h5>

	</div>

	<div style="padding-left: 15px; padding-right: 15px;" id="home-new-arrival">
		
		<?php echo do_shortcode( '[products limit="8" orderby="date"]' ); ?>

	</div>

	<div class="row justify-content-center align-items-center flex-column p-5 mb-5 join-mailing-list-row" style="background: radial-gradient(circle, #b38764 0%, #613d20 100%)">

		<h1 class="text-uppercase my-0 text-white pt-3 font-weight-bold">Save 25%</h1>

		<p class="text-white">Sign up for our mailing list</p>

		<a href="#" class="text-uppercase btn btn-light mb-5">Save on your next order ></a>

		<img src="<?php echo get_template_directory_uri() ?>/img/new_images/mk.png" id="marrakesh-dec" alt="<?php echo bloginfo('name') ?>" />

		<img src="<?php echo get_template_directory_uri() ?>/img/new_images/cbd.png" id="cbd-dec" alt="<?php echo bloginfo('name') ?>" />

	</div>

	<div class="row px-2 justify-content-center mt-5 mb-3">

		<h5 class="text-brown text-uppercase font-weight-bold mb-lg-3">We Are Earthly-Friendly</h5>

    </div>

    <?php get_template_part( 'globals/row', 'icons'); ?>

</div>

<?php get_footer(); ?>



