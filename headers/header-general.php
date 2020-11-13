<header>

    <?php get_template_part( 'globals/brands', 'toggle' ) ?>

</header>

<?php get_template_part( 'globals/woo', 'notice' ) ?>

<div id="mobile-navbar-section">

    <div class="w-100 d-flex top-navbar-mobile justify-content-between align-items-center py-3">

        <button id="mobile-menu-toggle" class="btn">
            
            <i class="fa fa-bars text-brown fa-2x"></i>
        
        </button>

        <a href="<?php echo get_site_url() ?>" class="site-logo d-flex align-items-end justify-content-center flex-column text-decoration-none">

            <img src="<?php echo get_template_directory_uri() ?>/img/new_logos/nav-logo-shopeb.svg" alt="<?php echo get_bloginfo( 'name' ) ?>" />
            <span class="text-dark" style="font-size: 0.75rem; margin:-8px 0 0 0; padding:0;">marketplace</span>

        </a>

        <a id="mobile-shopping-bag" class="btn" style="margin-top: -8px;" href="<?php echo wc_get_cart_url(); ?>">
            
            <i class="fa fa-shopping-bag fa-2x text-brown" aria-hidden="true"></i>
        
        </a>

        <span class="cart-items-count text-dark px-2"></span>
        
    </div>

    <div class="w-100 search-bar-mobile text-center px-3">

        <?php get_template_part( 'globals/search', 'general-mobile' ) ?>

    </div>

    <div class="mobile-menu">

        <div style="width:100%; background:#fff; height: 100%; overflow-x:hidden; overflow-y:scroll; padding-left:15px; padding-right:15px;">

            <div class="p-3 bg-white border-bottom" style="position: fixed; top: 0; left: 0; display: flex; justify-content: space-between; width: 100%;">

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

                wp_nav_menu (
                    array (
                        'theme_location' => 'primary-menu',
                        'menu_class' => 'top-page-primary-menu'
                    )
                )

            ?>

            </div>

        </div>

    </div>

</div>

<div id="desktop-navbar-section" class="container-fluid container-lg">

    <div class="w-100 pt-3 px-3 px-lg-0 pb-0 d-flex align-items-center justify-content-between">

        <div id="desktop-navbar-logo" class="">
            <a href="<?php echo get_site_url() ?>" class="site-logo d-flex align-items-end justify-content-center flex-column text-decoration-none">

                <img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/img/new_logos/nav-logo-shopeb.svg" alt="<?php echo get_bloginfo( 'name' ) ?>" />
                <span class="text-dark" style="font-size: 0.75rem; margin:-8px 0 0 0; padding:0;">marketplace</span>

            </a> 
        </div>

        <div id="desktop-search-bar" class="w-100 px-lg-5">

            <?php get_template_part( 'globals/search', 'general-desktop' ) ?>             
            
        </div>
        
        <div id="my-account-bar" class="d-flex justify-content-start align-items-center">

            <a href="<?php echo wc_get_page_permalink( 'myaccount' ) ?>" style="font-size:1rem;" class="text-dark border-right pr-lg-3">
                
                <?php if( !is_user_logged_in() ) :?>    

                    <i class="fa fa-user text-dark mr-1" aria-hidden="true"></i>
                    Sign In / Create An Account    

                <?php else: ?>

                    <i class="fa fa-user text-dark mr-1" aria-hidden="true"></i>
                    Hello, <?php $current_user = wp_get_current_user(); echo $current_user->display_name; ?>

                <?php endif; ?>
                
            </a>
            
            <a id="desktop-shopping-bag" class="btn pr-0" href="<?php echo wc_get_cart_url(); ?>">
            
                <i class="fa fa-shopping-bag fa-2x text-brown" aria-hidden="true"></i>

                <span class="cart-items-count text-dark px-2"></span>
        
            </a>

        </div>

    </div>

    <div class="w-100 px-3 my-3">

        <?php get_template_part( 'headers/content', 'general' ) ?>

    </div>

</div>

<div class="custom-minicart"></div>