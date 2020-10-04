<?php 

    $slugs = array(

        'cbd-daily-products' => 'cbddaily',

        'hemp-seed-body-care' => 'hempseed',

        'emera-cbd-hair-care' => 'emera',

        'marrakesh-hair-care' => 'marrakesh',

    );

    $colors = array(

        'cbddaily' => '#5d7041',

        'hempseed' => '#683816',

        'emera' => '#004c45',

        'marrakesh' => '#a51e35',

    );

    $url = $_SERVER['REQUEST_URI'];

    $url_parts = explode( '/', $url );

    foreach ( $slugs as $slug => $brand ) {

        if ( in_array( $slug, $url_parts ) ) {

            $name = $brand; 

            foreach ( $colors as $color => $brand_color ) {

                if ( $name == $color ) {
    
                    $text_color = $brand_color; 
    
                }
    
            }

        } 

        

    }

    

?>


<header>

    <?php get_template_part( 'globals/brands', 'toggle' ) ?>

</header>

<?php get_template_part( 'globals/woo', 'notice' ) ?>

<div class="w-100 d-flex top-navbar-mobile justify-content-between align-items-center py-3">

    <button id="mobile-menu-toggle" class="btn">
        
        <i class="fa fa-bars fa-2x" style="color:<?php echo $text_color; ?>;"></i>
    
    </button>

    <a href="<?php echo get_site_url() ?>" class="d-flex align-items-end justify-content-center flex-column text-decoration-none">

        <img src="<?php echo get_template_directory_uri() ?>/img/new_logos/<?php echo $name; ?>-logo.png" alt="<?php echo get_bloginfo( 'name' ) ?>" style="max-width: 212px; max-height: 55px;"/>

    </a>

    <a id="mobile-shopping-bag" class="btn" style="margin-top: -8px;" href="<?php echo wc_get_cart_url(); ?>">
        
        <i class="fa fa-shopping-bag fa-2x" aria-hidden="true" style="color:<?php echo $text_color; ?>"></i>
    
    </a>

    <span class="cart-items-count text-dark px-2"></span>
    

</div>

<div class="w-100 search-bar-mobile text-center">

    <?php get_product_search_form(); ?>

</div>

<div class="w-100 mobile-menu">

    <div class="container-fluid">

        <div class="p-3 w-100 bg-white border-bottom" style="position: fixed; top: 0; left: 0; display: flex; justify-content: space-between;">

            <a href="<?php echo wc_get_page_permalink( 'myaccount' ) ?>" style="font-size:0.85rem;" class="text-dark">

                <i class="fa fa-user text-dark mr-1" aria-hidden="true"></i>
                Sign In / Create An Account    

            </a>

            <a href="#" id="close-mobile-menu" class="text-dark" style="font-size:0.85rem;">

                <i class="fa fa-times" aria-hidden="true"></i>
                Close

            </a>

        </div>

        <div class="row flex-column p-3 mt-5">

        <?php 

            echo "Dynamic Brand Menu Items";

        ?>

        </div>

    </div>

</div>

<div class="custom-minicart"></div>

