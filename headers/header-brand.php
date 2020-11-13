<?php 

    $slugs = array(

        'cbd-daily-products' => 'cbddaily',

        'hemp-seed-body-care' => 'hempseed',

        'emera-cbd-hair-care' => 'emera',

        'marrakesh-hair-care' => 'marrakesh',

    );

    $cats = array(

        'cbddaily' => 'CBD Daily Products',

        'marrakesh' => 'Marrakesh Hair Care',

        'hempseed' => 'Hemp Seed Body Care',

        'emera' => 'EMERA CBD Hair Care', 

    );

    $websites = array(

        'cbddaily' => 'https://cbddailyproducts.com',

        'marrakesh' => 'https://marrakeshhaircare.com',

        'hempseed' => 'https://hempseedbodycare.com',

        'emera' => 'https://emerahaircare.com',

    );

    $url = $_SERVER['REQUEST_URI'];

    $url_parts = explode( '/', $url );

    foreach ( $slugs as $slug => $brand ) {

        if ( in_array( $slug, $url_parts ) ) {

            $name = $brand; 

        } 

    }

?>


<header>

    <?php get_template_part( 'globals/brands', 'toggle' ) ?>

</header>

<?php get_template_part( 'globals/woo', 'notice' ) ?>

<div id="mobile-navbar-section">

    <div class="w-100 d-flex top-navbar-mobile justify-content-between align-items-center py-3">

        <button id="mobile-menu-toggle" class="btn">
            
            <i class="fa fa-bars fa-2x icon-<?php echo $name; ?>"></i>
        
        </button>

        <a href="<?php echo get_site_url() ?>/<?php echo $name; ?>/" class="d-flex align-items-end justify-content-center flex-column text-decoration-none">

            <img class="brand-logo brand-logo-<?php echo $name; ?>" src="<?php echo get_template_directory_uri() ?>/img/new_logos/<?php echo $name; ?>-logo.png" alt="<?php echo $name; ?> | <?php echo get_bloginfo( 'name' ) ?>" />

        </a>

        <a id="mobile-shopping-bag" class="btn" style="margin-top: -8px;" href="<?php echo wc_get_cart_url(); ?>">
            
            <i class="fa fa-shopping-bag fa-2x icon-<?php echo $name; ?>" aria-hidden="true"></i>
        
        </a>

        <span class="cart-items-count text-dark px-2"></span>
        

    </div>

    <div class="w-100 search-bar-mobile text-center">

        <?php get_template_part( 'globals/search', 'brand-mobile' ) ?>

    </div>

    <div class="mobile-menu">

        <div style="width:100%; background:#fff; height: 100%; overflow-x:hidden; overflow-y:scroll; padding-left:15px; padding-right:15px;">

            <div class="p-3 border-bottom bg-white" style="position: fixed; top: 0; left: 0; display: flex; justify-content: space-between; width: 100%">

                <a href="<?php echo wc_get_page_permalink( 'myaccount' ) ?>" style="font-size:0.85rem;" class="text-dark">

                    <i class="fa fa-user text-dark mr-1" aria-hidden="true"></i>
                    Sign In / Create An Account    

                </a>

                <a href="#" id="close-mobile-menu" class="text-dark" style="font-size:0.85rem;">

                    <i class="fa fa-times" aria-hidden="true"></i>
                    Close

                </a>

            </div>

            <div class="row flex-column p-3 mt-5 brand-nav-list">

            <?php 

                $category = $cats[$name];

                $IdByName = get_term_by( 'name', $category, 'product_cat' );

                $product_cat_ID = $IdByName->term_id; 

                $args = array (

                    'hierarchical' => 1,

                    'show_option_none' => '',

                    'hide_empty' => 0,

                    'parent' => $product_cat_ID,

                    'taxonomy' => 'product_cat'

                );

                $subcats = get_categories( $args );

                foreach ( $subcats as $subcat ) {

                    $sub_link = get_term_link( $subcat->slug, $subcat->taxonomy );

                    $subcat_name = $subcat->name; 

                    $subIDbyName = get_term_by( 'name', $subcat_name, 'product_cat' );

                    $product_subcat_ID = $subIDbyName->term_id; 

                    $sub_args = array (

                        'hierarchical' => 1,

                        'show_option_none' => '',

                        'hide_empty' => 0,

                        'parent' => $product_subcat_ID,

                        'taxonomy' => 'product_cat'

                    );

                    $sub_subcats = get_categories( $sub_args );

                    if ( count( $sub_subcats ) > 0 ) {

                        $html = '<li class="nav-item has-dropdown"><a class="nav-link" href="'. $sub_link .'">'. $subcat_name .'</a><div class="dropdown">';

                        for ( $i=0; $i<count( $sub_subcats ); $i++ ) {

                            $sub_sublink = get_term_link( $sub_subcats[$i]->slug, 
                            $sub_subcats[$i]->taxonomy );

                            $sub_subname = $sub_subcats[$i]->name;

                            $html .= '<a href="'. $sub_sublink .'" class="nav-item">'. $sub_subname .'</a>';

                        }

                        $html .= '</div></li>';

                    } else {

                        $html = '<li class="nav-item">
                                    <a class="nav-link" href="'. $sub_link .'">'. $subcat_name .'</a>
                                </li>';

                    }
                    
                    echo $html; 
                }
            ?> 

            <li class="nav-item">
            
                <a href="<?php echo $websites[$name]; ?>" class="nav-link" target="_blank">About Our Brand</a>
            
            </li>

            </div>

        </div>

    </div>

</div>

<div id="desktop-navbar-section" class="container-fluid container-lg">

    <div class="w-100 pt-3 px-3 px-lg-0 pb-0 d-flex align-items-center justify-content-start">

        <div id="desktop-navbar-logo" class="">
            <a href="<?php echo get_site_url() ?>/<?php echo $name; ?>" class="site-logo site-logo-<?php echo $name; ?> d-flex align-items-start justify-content-center flex-column text-decoration-none">

                <img src="<?php echo get_template_directory_uri() ?>/img/new_logos/<?php echo $name; ?>-logo.png" alt="<?php echo get_bloginfo( 'name' ) ?>" />

            </a> 
        </div>

        <div id="desktop-search-bar" class="w-100 px-5">

            <?php get_template_part( 'globals/search', 'brand-desktop' ) ?>

        </div>
        
        <div id="my-account-bar" class="d-flex justify-content-start align-items-center">

            <a href="<?php echo wc_get_page_permalink( 'myaccount' ) ?>" style="font-size:1rem;" class="text-dark border-right pr-lg-3">

                <i class="fa fa-user text-dark mr-1" aria-hidden="true"></i>
                Sign In / Create An Account    

            </a>
            
            <a id="desktop-shopping-bag" class="btn pr-0" href="<?php echo wc_get_cart_url(); ?>">
            
                <i class="fa fa-shopping-bag fa-2x text-brown" aria-hidden="true"></i>

                <span class="cart-items-count text-dark px-2"></span>
        
            </a>

        </div>

    </div>

    <div class="w-100 px-3 text-center justify-content-start d-flex brand-nav-list my-lg-3">

    <?php 

        $category = $cats[$name];

        $IdByName = get_term_by( 'name', $category, 'product_cat' );

        $product_cat_ID = $IdByName->term_id; 

        $args = array (

            'hierarchical' => 1,

            'show_option_none' => '',

            'hide_empty' => 0,

            'parent' => $product_cat_ID,

            'taxonomy' => 'product_cat'

        );

        $subcats = get_categories( $args );

        foreach ( $subcats as $subcat ) {

            $sub_link = get_term_link( $subcat->slug, $subcat->taxonomy );

            $subcat_name = $subcat->name; 

            $subIDbyName = get_term_by( 'name', $subcat_name, 'product_cat' );

            $product_subcat_ID = $subIDbyName->term_id; 

            $sub_args = array (

                'hierarchical' => 1,

                'show_option_none' => '',

                'hide_empty' => 0,

                'parent' => $product_subcat_ID,

                'taxonomy' => 'product_cat'

            );

            $sub_subcats = get_categories( $sub_args );

            if ( count( $sub_subcats ) > 0 ) {

                $html = '<li class="nav-item has-dropdown text-center"><a class="nav-link" href="'. $sub_link .'">'. $subcat_name .'</a><div class="dropdown text-center">';

                for ( $i=0; $i<count( $sub_subcats ); $i++ ) {

                    $sub_sublink = get_term_link( $sub_subcats[$i]->slug, 
                    $sub_subcats[$i]->taxonomy );

                    $sub_subname = $sub_subcats[$i]->name;

                    $thumb_id = get_woocommerce_term_meta($sub_subcats[$i]->term_id, 'thumbnail_id', true);
                    
                    if ( $thumb_id ) {
                        
                        $thumb_link = wp_get_attachment_url( $thumb_id );

                    } else {
                        
                        $thumb_link = "http://source.unsplash.com/100x100";

                    }

                    $html .= '<a href="'. $sub_sublink .'" class="nav-item"><img src="'. $thumb_link .'" class="border-0 rounded-circle" style="width:100px;height:100px" /><p class="mt-2">'. $sub_subname .'</p></a>';

                }

                $html .= '</div></li>';

            } else {

                $html = '<li class="nav-item"><a class="nav-link" href="'. $sub_link .'"><img src="http://source.unsplash.com/100x100" class="border-0 rounded-circle" width="100" height="100" /><p>'. $subcat_name .'</p></a></li>';

            }
            
            echo $html; 
        }
    ?> 

    <li class="nav-item">

        <a href="<?php echo $websites[$name]; ?>" class="nav-link" target="_blank">About Our Brand</a>

    </li>

    </div>

</div>

<div class="custom-minicart"></div>

