<div class="menu-primary-menu-new-container">

    <ul id="menu-primary-menu-new-2" class="top-page-primary-menu">

        <li class="menu-item menu-item-has-children" id="shopByProduct">

            <a href="#">Shop by Product</a>

            <ul class="sub-menu">

                <div class="container-fluid pr-0">

                    <div class="row">

                        <div class="col col-3 col-xl-2 px-0">

                            <div class="nav flex-column justify-content-start ml-0" id="tab-names">

                                <?php 

                                $buttons = array(
                                                
                                        "CBD Topicals",
                                        "CBD Hair Care",
                                        "Massage Oils, Lotions & Candles",
                                        "Hair Care",
                                        "Body Care",
                                        "Marrakesh for Men",

                                );

                                foreach ( $buttons as $button ) : ?>

                                <button class="rounded-0 btn w-100 text-left text-uppercase py-1 border-top" data-tab_name="<?php $str = preg_replace("/[^A-Za-z0-9]/", "-", $button); echo strtolower($str); ?>"><?php echo $button ?></button>

                                <?php endforeach; ?>

                            </div>

                        </div>

                        <div class="col col-9 col-xl-10 px-3">

                            <?php

                            foreach ( $buttons as $button ) : ?>

                            <div class="nav flex-row d-none" id="tab-content__<?php $str = preg_replace("/[^A-Za-z0-9]/", "-", $button); echo strtolower($str); ?>">
                            
                                <?php 

                                    $str2 = preg_replace("/[^A-Za-z0-9]/", "-", $button);
                                    $fileName = strtolower($str2);

                                get_template_part( 'headers/content', $fileName ) ?>

                                <div style="width: 40%" class="text-center border-left pl-4 pr-0 mb-3">
                                
                                    <p class="text-center py-1 bg-success text-uppercase font-weight-bold w-100 text-light mb-0 mb-md-3">Best Seller!</p>
                            
                                    <?php 
                                
                                        $products = wc_get_products(array(
                                                                        'category' => $button,
                                                                        'limit' => 1, 
                                                                        'orderby' => array('meta_value_num' => 'DESC', 'title' => 'ASC'),
                                                                        'meta_key' => 'total_sales',

                                                                    ));

                                        foreach( $products as $product ) {
                                    
                                    ?>
                                        
                                        <a href="<?php echo get_permalink($product->get_id()) ?>" class="mega-menu-product">

                                            <img src="<?php echo wp_get_attachment_url($product->get_image_id()) ?>" alt="<?php echo $product->get_name() ?> | Shop Earthly Body" class="w-100" style="max-width:280px"/>

                                            <h5 class="px-2 mb-0" style="font-size:1rem; line-height: 1.15"><?php echo $product->get_name(); ?></h5>

                                            <p class="w-100 text-center"><?php echo $product->get_price_html() ?></p>

                                            <button class="btn btn-outline-dark text-uppercase font-weight-bold rounded-0">learn more</button>

                                        </a>    
                                        
                                    <?php
                                    
                                        }
                                                          
                                    ?>   
                                                                                   
                                </div>
                        
                            </div>

                            <?php endforeach; ?>

                        </div>
                    
                    </div>

                </div>

            </ul>

        </li>

        <li class="menu-item menu-item-has-children" id="shopByBrand">

            <a href="#">Shop by Brand</a>

            <ul class="sub-menu">

                <li class="menu-item text-center">

                    <a href="<?php echo get_site_url() ?>/marrakesh/">

                        <img src="<?php echo get_template_directory_uri() ?>/img/new_brands/marrakesh1.jpg" class="border-0 rounded-circle" width="100" height="100" alt="Marrakesh Hair Care | <?php echo get_bloginfo( 'name' ) ?>" />

                        <p class="my-xl-2" style="line-height: 1;">Marrakesh Hair Care</p>
                               
                    </a>

                </li>

                <li class="menu-item text-center">

                    <a href="<?php echo get_site_url() ?>/hempseed/">

                        <img src="<?php echo get_template_directory_uri() ?>/img/new_brands/home-hempseed1.jpg" class="border-0 rounded-circle" width="100" height="100" alt="Hemp Seed Body Care | <?php echo get_bloginfo( 'name' ) ?>" />

                        <p class="my-xl-2" style="line-height: 1;">Hemp Seed Body Care</p>
                               
                    </a>

                </li>

                <li class="menu-item text-center">

                    <a href="<?php echo get_site_url() ?>/cbddaily/">

                        <img src="<?php echo get_template_directory_uri() ?>/img/new_brands/home-cbddaily1.jpg" class="border-0 rounded-circle" width="100" height="100" alt="CBD Daily | <?php echo get_bloginfo( 'name' ) ?>" />

                        <p class="my-xl-2" style="line-height: 1;">CBD Daily</p>
                               
                    </a>

                </li>

                <li class="menu-item text-center">

                    <a href="<?php echo get_site_url() ?>/emera/">

                        <img src="<?php echo get_template_directory_uri() ?>/img/new_brands/home-emera1.jpg" class="border-0 rounded-circle" width="100" height="100" alt="CBD Daily | <?php echo get_bloginfo( 'name' ) ?>" />

                        <p class="my-xl-2" style="line-height: 1;">EMERA CBD Hair Care</p>
                               
                    </a>

                </li>

            </ul>

        </li>
         
        <li class="menu-item" id="shopByFragrance">

            <a href="<?php echo get_site_url() ?>/shop-fragrances">Shop by Fragrance</a>

        </li>

        <li class="menu-item menu-item-has-children" id="shopHempSeedByNight">
            
            <?php 
            
            // Hemp Seed By Night, cat_id = 190
            $args = array(
                
                'hierarchical' => 1,

                'show_option_none' => '',

                'hide_empty' => 1,

                'parent' => 190,

                'taxonomy' => 'product_cat'
            );

            $subCategories = get_categories($args);

            ?>
            <a href="#">Hemp Seed By Night</a> <!-- Hemp Seed By Night: cat_id = 190 -->

            <ul class="sub-menu text-center">

                <?php foreach ( $subCategories as $subCategory ) : ?>

                    <li class="menu-item text-center">

                        <?php 
                        
                        $thumb_id = get_woocommerce_term_meta($subCategory->term_id, 'thumbnail_id', true);

                        if ($thumb_id == 0) {

                            $thumb_url = "http://source.unsplash.com/100x100";

                        } else {

                            $thumb_url = wp_get_attachment_url($thumb_id);

                        }

                        ?>

                        <a href="<?php echo get_term_link($subCategory->slug, $subCategory->taxonomy) ?>">
                            
                            <img src="<?php echo $thumb_url ?>" class="border-0 rounded-circle" width="100" height="100" alt="Shop Earthly Body">
                            <p class="my-xl-2" style="line-height: 1;"><?php echo $subCategory->name; ?></p>

                        </a>

                    </li>
                    
                <?php endforeach; ?>

            </ul>

        </li>

        <li class="menu-item menu-item-has-children" id="shopByFreeShipping">

            <?php 
            
            // Deals, cat_id = 337
            $args2 = array(
                
                'hierarchical' => 1,

                'show_option_none' => '',

                'hide_empty' => 1,

                'parent' => 337,

                'taxonomy' => 'product_cat'
            );

            $subCategories2 = get_categories($args2);

            ?>
        
            <a href="#" class="text-danger font-weight-bold">Deals!</a><!-- Sale ID = 337 --> 

            <ul class="sub-menu text-center">
                
                <?php foreach ( $subCategories2 as $subCategory2 ) : ?>

                    <li class="menu-item text-center">

                        <?php 
                        
                        $thumb_id = get_woocommerce_term_meta($subCategory2->term_id, 'thumbnail_id', true);

                        if ($thumb_id == 0) {

                            $thumb_url = "http://source.unsplash.com/100x100";

                        } else {

                            $thumb_url = wp_get_attachment_url($thumb_id);

                        }

                        ?>

                        <a href="<?php echo get_term_link($subCategory2->slug, $subCategory2->taxonomy) ?>">
                            
                            <img src="<?php echo $thumb_url ?>" class="border-0 rounded-circle" width="100" height="100" alt="Shop Earthly Body">
                            <p class="my-xl-2" style="line-height: 1;"><?php echo $subCategory2->name; ?></p>

                        </a>

                    </li>
                    
                <?php endforeach; ?>
            
            </ul>

        </li>

    </ul>

</div>