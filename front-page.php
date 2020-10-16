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

	<div style="padding-left: 15px; padding-right: 15px;">

		<div style="width:30px; position:absolute; left:0; z-index:10" class="new-arrival-arrow justify-content-start d-none">

			<i class="fa fa-long-arrow-left py-3 px-1 text-white bg-dark" aria-hidden="true"></i>

		</div>

		<div style="width:30px; position:absolute; right:0px; z-index:10" class="new-arrival-arrow justify-content-end d-flex">

			<i class="fa fa-long-arrow-right bg-dark py-3 text-white px-1" aria-hidden="true"></i>

		</div>
		
		<?php echo do_shortcode( '[products limit="8" orderby="date DESC"]' ); ?>

	</div>

	<div class="row justify-content-center align-items-center flex-column p-5 mb-5" style="background: radial-gradient(circle, #b38764 0%, #613d20 100%)">

		<h1 class="text-uppercase my-0 text-white pt-3" style="line-height: 1; font-size: 2.5rem; font-weight-bold">Save 25%</h1>

		<p class="text-white">Sign up for our mailing list</p>

		<a href="#" class="text-uppercase btn btn-light mb-5">Save on your next order ></a>

		<img src="<?php echo get_template_directory_uri() ?>/img/new_images/mk.png" id="marrakesh-dec" alt="<?php echo bloginfo('name') ?>" />

		<img src="<?php echo get_template_directory_uri() ?>/img/new_images/cbd.png" id="cbd-dec" alt="<?php echo bloginfo('name') ?>" />

	</div>

	<div class="row px-2 justify-content-center mt-5 mb-3">

		<h5 class="text-brown text-uppercase font-weight-bold">We Are Earthly-Friendly</h5>

    </div>

    <div class="row px-2 my-3">
    
        <div style="width:20%;">

            <img src="<?php echo get_template_directory_uri() ?>/img/new_images/Icon-CrueltyFree.svg" class="rounded-circle">

            <p class="text-center" style="font-size: 0.75rem;">Cruelty-Free & 100% Vegan</p>

        </div>

        <div style="width:20%;">
        
            <img src="<?php echo get_template_directory_uri() ?>/img/new_images/Icon-Solar.svg" class="rounded-circle">

            <p class="text-center" style="font-size: 0.75rem;">Made with Solar Powered Energy</p>

        </div>

        <div style="width:20%;">
        
            <img src="<?php echo get_template_directory_uri() ?>/img/new_images/Icon-Natural.svg" class="rounded-circle">

            <p class="text-center" style="font-size: 0.75rem;">Naturally-Derived Ingredients</p>

        </div>

        <div style="width:20%;">
        
            <img src="<?php echo get_template_directory_uri() ?>/img/new_images/Icon-Charity.svg" class="rounded-circle">

            <p class="text-center" style="font-size: 0.75rem;">A portion of Every Sale is Donated to Our Nonprofit</p>

        </div>

        <div style="width:20%;">
        
            <img src="<?php echo get_template_directory_uri() ?>/img/new_images/Icon-Pollution.jpg" class="img-thumbnail border-0">

            <p class="text-center" style="font-size: 0.75rem;">Member of Plastic Poluttion Coalition</p>

        </div>


    </div>


</div>



<?php get_footer(); ?>



