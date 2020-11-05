<div class="menu-primary-menu-new-container">

    <ul id="menu-primary-menu-new-2" class="top-page-primary-menu">

        <li class="menu-item menu-item-has-children" id="shopByProduct">

            <a href="#">Shop by Product</a>

            <ul class="sub-menu">

                <div class="container-fluid pr-0">

                    <?php 

                        $cats = array('MM-CBD Topicals', 'MM-CBD Hair Care', 'MM-Massage Lotions & Candles', 'MM-Hair Care', 'MM-Body Care', 'Marrakesh for Men', 'Hemp Seed by Night');

                        $products = array();

                        foreach( $cats as $cat ) {

                            $args = array(

                                'category' => array($cat),
                                'limit' => 1,
                                'orderby' => array('meta_value_num' => 'DESC', 'title' => 'ASC'),
                                'meta_key' => 'total_sales',
    
                            );

                            $return_products = wc_get_products( $args );

                            $product = $return_products[0];

                            array_push( $products, $product );

                        } ?>

                        

                    <div class="row">

                        <div class="col col-3 col-xl-2 px-0">

                            <div class="nav flex-column justify-content-start ml-0" id="tab-names">

                                <button class="rounded-0 btn w-100 text-left text-uppercase py-1 border-top" data-tab_name="cbd-topicals">CBD Topicals</button>

                                <button class="rounded-0 btn w-100 text-left text-uppercase py-1 border-top" data-tab_name="cbd-hair-care">CBD Hair Care</button>

                                <button class="rounded-0 btn w-100 text-left text-uppercase py-1 border-top" data-tab_name="massage-lotions-candles">Massage Lotions & Candles</button>
                                
                                <button class="rounded-0 btn w-100 text-left text-uppercase py-1 border-top" data-tab_name="hair-care">Hair Care</button>

                                <button class="rounded-0 btn w-100 text-left text-uppercase py-1 border-top" data-tab_name="body-care">Body Care</button>

                                <button class="rounded-0 btn w-100 text-left text-uppercase py-1 border-top" data-tab_name="mens-care">Men's Care</button>

                            </div>

                        </div>

                        <div class="col col-9 col-xl-10 px-3">
                            
                            <div class="nav flex-row d-none" id="tab-content__cbd-topicals">
                            
                                <div style="width: 60%">
                                
                                    <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">
                                    
                                        <a href="#" class="category-link font-weight-bold">CBD Cream<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">CBD Daily Intensive Cream - Triple Strength - CBD Mint Scent</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">CBD Daily Intensive Cream - Triple Strength - Lavender Scent</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">CBD Daily Intensive Cream - CBD Mint Scent</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">CBD Daily Intensive Cream - Lavender Scent</a>

                                    </p>

                                    <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">
                                    
                                        <a href="#" class="category-link font-weight-bold">CBD Serum<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">CBD Daily Soothing Serum - Triple Strength</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">CBD Daily Soothing Serum</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">CBD Daily Soothing Serum Rollerball</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">CBD Daily Soothing Serum - Lavender</a>

                                    </p>

                                    <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">
                                    
                                        <a href="#" class="category-link font-weight-bold">CBD Ultra Care<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">CBD Daily Ultra Care Foot Cream</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">CBD Daily Ultra Care Hand & Body Lotion</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">CBD Daily Ultra Care Cuticle Oil</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">CBD Daily Ultra Care Hand Wash</a>
                                    
                                    </p>

                                    <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">
                                    
                                        <a href="#" class="category-link font-weight-bold">CBD Spray<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">CBD Daily Active Spray - Triple Strength</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">CBD Daily Active Spray</a>
                                    
                                    </p>

                                    <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">
                                    
                                        <a href="#" class="category-link font-weight-bold">CBD Lip Balm<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>
                                    
                                    </p>
                              
                                </div>

                                <div style="width: 40%" class="text-center border-left pl-4 pr-0 mb-3">
                                
                                    <p class="text-center py-1 bg-success text-uppercase font-weight-bold w-100 text-light mb-0">Best Seller!</p>

                                    <a href="<?php echo get_permalink($products[0]->get_id()) ?>" class="mega-menu-product">

                                        <img src="<?php echo wp_get_attachment_url($products[0]->get_image_id()) ?>" alt="<?php echo $products[0]->get_name() ?> | Shop Earthly Body" class="w-100" style="max-width:280px"/>

                                        <h5 class="px-2 mb-0" style="font-size:1rem; line-height: 1.15"><?php echo $products[0]->get_name(); ?></h5>

                                        <p class="w-100 text-center"><?php echo $products[0]->get_price_html() ?></p>

                                        <button class="btn btn-outline-dark text-uppercase font-weight-bold rounded-0">learn more</button>

                                    </a>

                                </div>
                            
                            </div>

                            <div class="nav flex-row d-none" id="tab-content__cbd-hair-care">
                            
                                <div style="width: 60%">
                                
                                    <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">
                                        
                                        <a href="#" class="category-link font-weight-bold">CBD Hair Shampoo<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">EMERA CBD Hair Shampoo</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">CBD Daily Shampoo</a>
                                    
                                    </p>

                                    <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">
                                        
                                        <a href="#" class="category-link font-weight-bold">CBD Conditioner<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">EMERA CBD Hair Conditioner</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">CBD Daily Hair Conditioner</a>
                                    
                                    </p>

                                    <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">
                                        
                                        <a href="#" class="category-link font-weight-bold">EMERA Detangler Plus<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>
                                    
                                    </p>

                                    <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">
                                        
                                        <a href="#" class="category-link font-weight-bold">EMERA Scalp Therapy<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>
                                    
                                    </p>

                                    <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">
                                        
                                        <a href="#" class="category-link font-weight-bold">EMERA Reparative Treatment<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>
                                    
                                    </p>

                                    <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">
                                        
                                        <a href="#" class="category-link font-weight-bold">EMERA Hair Serum<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>
                                    
                                    </p>

                                </div>

                                <div style="width: 40%" class="text-center border-left pl-4 pr-0 mb-3">
                                
                                    <p class="text-center py-1 bg-success text-uppercase font-weight-bold w-100 text-light mb-0">Best Seller!</p>

                                    <a href="<?php echo get_permalink($products[1]->get_id()) ?>" class="mega-menu-product">

                                        <img src="<?php echo wp_get_attachment_url($products[1]->get_image_id()) ?>" alt="<?php echo $products[1]->get_name() ?> | Shop Earthly Body" class="w-100" style="max-width:280px"/>

                                        <h5 class="px-2 mb-0" style="font-size:1rem; line-height: 1.15"><?php echo $products[1]->get_name(); ?></h5>

                                        <p class="w-100 text-center"><?php echo $products[1]->get_price_html() ?></p>

                                        <button class="btn btn-outline-dark text-uppercase font-weight-bold rounded-0">learn more</button>

                                    </a>
                                
                                </div>
                            
                            </div>

                            <div class="nav flex-row d-none" id="tab-content__massage-lotions-candles">
                            
                                <div style="width: 60%">
                                
                                    <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">
                                        
                                        <a href="#" class="category-link font-weight-bold">Massage Oils<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">CBD Daily Massage Oil</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Hemp Seed Massage Oils - Multiple Scents</a>
                                    
                                    </p>

                                    <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">
                                        
                                        <a href="#" class="category-link font-weight-bold">Massage Candles<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">CBD Daily Massage Candle</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Hemp Seed 3-in-1 Massage Candles - Multiple Scents</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh Melt Candle</a>
                                    
                                    </p>

                                    <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">
                                        
                                        <a href="#" class="category-link font-weight-bold">Massage Lotions<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">CBD Daily Massage Lotion</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Hemp Seed Massage Lotions - Multiple Scents</a>
                                    
                                    </p>
                                
                                </div>

                                <div style="width: 40%" class="text-center border-left pl-4 pr-0 mb-3">
                                
                                    <p class="text-center py-1 bg-success text-uppercase font-weight-bold w-100 text-light mb-0">Best Seller!</p>

                                    <a href="<?php echo get_permalink($products[2]->get_id()) ?>" class="mega-menu-product">

                                        <img src="<?php echo wp_get_attachment_url($products[2]->get_image_id()) ?>" alt="<?php echo $products[2]->get_name() ?> | Shop Earthly Body" class="w-100" style="max-width:280px"/>

                                        <h5 class="px-2 mb-0" style="font-size:1rem; line-height: 1.15"><?php echo $products[2]->get_name(); ?></h5>

                                        <p class="w-100 text-center"><?php echo $products[2]->get_price_html() ?></p>

                                        <button class="btn btn-outline-dark text-uppercase font-weight-bold rounded-0">learn more</button>

                                    </a>

                                </div>
                            
                            </div>

                            <div class="nav flex-row d-none" id="tab-content__hair-care">
                            
                                <div style="width: 60%">
                                
                                    <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">
                                        
                                        <a href="#" class="category-link font-weight-bold">Shampoo<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh Nourish Shampoo for Fine Hair</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh Color Care Shampoo</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh Nourish Shampoos - Multiple Fragrances</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Hemp Seed Shampoo - Multiple Fragrances</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Miracle Oil Tea Tree Shampoo</a>
                                    
                                    </p>

                                    <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">
                                        
                                        <a href="#" class="category-link font-weight-bold">Conditioner<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh Hydrate Conditioner for Fine Hair</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh Color Care Conditioner</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh Hydrate Conditioners - Multiple Fragrances</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Hemp Seed Conditioners - Multiple Fragrances</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Miracle Oil Tea Tree Conditioner</a>
                                    
                                    </p>

                                    <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">
                                        
                                        <a href="#" class="category-link font-weight-bold">Detangler<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh X for Fine Hair - Multiple Scents</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh X for Fine Hair</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh Color Care X</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Hemp Seed Leave In Treatment</a>
                                    
                                    </p>

                                    <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">
                                        
                                        <a href="#" class="category-link font-weight-bold">Marrakesh Styling Hair Sprays<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh Hold</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh Wave</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh Bounce</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh Let It Shine</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh Mod</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh Finite Hairspray</a>
                                    
                                    </p>

                                    <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">
                                        
                                        <a href="#" class="category-link font-weight-bold">Hair Oil<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh Oil Light for Fine Hair</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh Oils - Multiple Scents</a>
                                    
                                    </p>

                                    <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">
                                        
                                        <a href="#" class="category-link font-weight-bold">Hair Masque<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh Moisture Masque</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh Miracle Masque</a>
                                    
                                    </p>
                                
                                </div>

                                <div style="width: 40%" class="text-center border-left pl-4 pr-0">
                                
                                    <p class="text-center py-1 bg-success text-uppercase font-weight-bold w-100 text-light mb-0">Best Seller!</p>

                                    <a href="<?php echo get_permalink($products[3]->get_id()) ?>" class="mega-menu-product">

                                        <img src="<?php echo wp_get_attachment_url($products[3]->get_image_id()) ?>" alt="<?php echo $products[3]->get_name() ?> | Shop Earthly Body" class="w-100" style="max-width:280px"/>

                                        <h5 class="px-2 mb-0" style="font-size:1rem; line-height: 1.15"><?php echo $products[3]->get_name(); ?></h5>

                                        <p class="w-100 text-center"><?php echo $products[3]->get_price_html() ?></p>

                                        <button class="btn btn-outline-dark text-uppercase font-weight-bold rounded-0">learn more</button>

                                    </a>

                                </div>
                            
                            </div>

                            <div class="nav flex-row d-none" id="tab-content__body-care">
                            
                                <div style="width: 60%">
                                
                                    <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">
                                        
                                        <a href="#" class="category-link font-weight-bold">Body Moisturizers<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Hand & Body Lotions</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh Velvet Lotion</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Skin Butters - Multiple Fragrances</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Lip Balms - Multiple Fragrances</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Moisturizing Oil Sprays - Multiple Fragrances</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Hemp Seed Body Mists - Multiple Fragrances</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Miracle Oil Tea Tree Creme</a>
                                    
                                    </p>

                                    <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">
                                        
                                        <a href="#" class="category-link font-weight-bold">Hand Washes<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">CBD Daily Ultra Care Hand Wash</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Hemp Seed Hand Wash</a>

                                    </p>

                                    <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">
                                        
                                        <a href="#" class="category-link font-weight-bold">Body Washes<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">CBD Daily Bath Bomb</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Hemp Seed Bath + Shower Gels - Multiple Scents</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Skin Butters - Multiple Scents</a>
                                    
                                    </p>

                                    <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">
                                        
                                        <a href="#" class="category-link font-weight-bold">Shave Creams<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Hemp Seed Shave Cream</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Miracle Oil Tea Tree Shave Cream</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Hemp Seed Hand Wash</a>

                                    </p>
                                
                                </div>

                                <div style="width: 40%" class="text-center border-left pl-4 pr-0 mb-3">

                                    <p class="text-center py-1 bg-success text-uppercase font-weight-bold w-100 text-light mb-0">Best Seller!</p>
                                
                                   <a href="<?php echo get_permalink($products[4]->get_id()) ?>" class="mega-menu-product">

                                        <img src="<?php echo wp_get_attachment_url($products[4]->get_image_id()) ?>" alt="<?php echo $products[4]->get_name() ?> | Shop Earthly Body" class="w-100" style="max-width:280px"/>

                                        <h5 class="px-2 mb-0" style="font-size:1rem; line-height: 1.15"><?php echo $products[4]->get_name(); ?></h5>

                                        <p class="w-100 text-center"><?php echo $products[4]->get_price_html() ?></p>

                                        <button class="btn btn-outline-dark text-uppercase font-weight-bold rounded-0">learn more</button>

                                    </a>

                                </div>
                            
                            </div>

                            <div class="nav flex-row d-none" id="tab-content__mens-care">
                            
                                <div style="width: 60%">
                                
                                    <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">
                                        
                                        <a href="#" class="category-link font-weight-bold">Hair Care<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh Kahm Smoothing Shampoo</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh Kahm Smoothing Conditioner</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh for Men Stout Conditioner</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh Kahm Smoothing Treatment</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh for Men Porter Styling Gel</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh for Men Lager Styling Paste</a>
                                    
                                    </p>

                                    <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">
                                        
                                        <a href="#" class="category-link font-weight-bold">Other Personal Care Products<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh for Men Shave Cream</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh for Men Beard Oil</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh for Men Hand & Body Lotion</a>

                                        <a href="#" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 1rem">Marrakesh for 2-in-1 Shampoo + Body Wash</a>
                                    
                                    </p>

                                    <p class="text-uppercase d-block d-xl-inline-block font-weight-bold align-top pl-xl-4">

                                        <a href="#" class="category-link font-weight-bold">Shop Marrakesh Kahm Collections<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                    </p>

                                </div>

                                <div style="width: 40%" class="text-center border-left pl-4 pr-0 mb-3">
                                
                                    <p class="text-center py-1 bg-success text-uppercase font-weight-bold w-100 text-light mb-0">Best Seller!</p>

                                    <a href="<?php echo get_permalink($products[5]->get_id()) ?>" class="mega-menu-product">

                                        <img src="<?php echo wp_get_attachment_url($products[5]->get_image_id()) ?>" alt="<?php echo $products[5]->get_name() ?> | Shop Earthly Body" class="w-100" style="max-width:280px"/>

                                        <h5 class="px-2 mb-0" style="font-size:1rem; line-height: 1.15"><?php echo $products[5]->get_name(); ?></h5>

                                        <p class="w-100 text-center"><?php echo $products[5]->get_price_html() ?></p>

                                        <button class="btn btn-outline-dark text-uppercase font-weight-bold rounded-0">learn more</button>

                                    </a>

                                </div>
                            
                            </div> 
                            
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

                        <p class="mb-xl-0">Marrakesh Hair Care</p>
                               
                    </a>

                </li>

                <li class="menu-item text-center">

                    <a href="<?php echo get_site_url() ?>/hempseed/">

                        <img src="<?php echo get_template_directory_uri() ?>/img/new_brands/home-hempseed1.jpg" class="border-0 rounded-circle" width="100" height="100" alt="Hemp Seed Body Care | <?php echo get_bloginfo( 'name' ) ?>" />

                        <p class="mb-xl-0">Hemp Seed Body Care</p>
                               
                    </a>

                </li>

                <li class="menu-item text-center">

                    <a href="<?php echo get_site_url() ?>/cbddaily/">

                        <img src="<?php echo get_template_directory_uri() ?>/img/new_brands/home-cbddaily1.jpg" class="border-0 rounded-circle" width="100" height="100" alt="CBD Daily | <?php echo get_bloginfo( 'name' ) ?>" />

                        <p class="mb-xl-0">CBD Daily</p>
                               
                    </a>

                </li>

                <li class="menu-item text-center">

                    <a href="<?php echo get_site_url() ?>/emera/">

                        <img src="<?php echo get_template_directory_uri() ?>/img/new_brands/home-emera1.jpg" class="border-0 rounded-circle" width="100" height="100" alt="CBD Daily | <?php echo get_bloginfo( 'name' ) ?>" />

                        <p class="mb-xl-0">EMERA CBD Hair Care</p>
                               
                    </a>

                </li>

            </ul>

        </li>
         
        <li class="menu-item" id="shopByFragrance">

            <a href="#">Shop by Fragrance</a>

        </li>

        <li class="menu-item menu-item-has-children" id="shopHempSeedByNight">
        
            <a href="#">Hemp Seed By Night</a>

            <ul class="sub-menu">
            
                <p class="text-uppercase d-block d-xl-inline-block align-top px-xl-2">
                                        
                    <a href="#" class="category-link font-weight-bold">Edible Massage Candles - Multiple Flavors<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>
                                                        
                </p>

                <p class="text-uppercase d-block px-xl-2">
                 
                    <a href="#" class="category-link font-weight-bold">Edible Massage Oils - Multiple Flavors<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                </p>

                <p class="text-uppercase d-block px-xl-2">
                 
                    <a href="#" class="category-link font-weight-bold">Personal Lubricant<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                </p>

                <p class="text-uppercase d-block px-xl-2">
                
                    <a href="#" class="category-link font-weight-bold">Toy Cleaner<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>
                
                </p>

                <p class="text-uppercase d-block px-xl-2">
                
                    <a href="#" class="category-link font-weight-bold">Arousal Balm<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>
                
                </p>
            
            </ul>

        </li>

        <li class="menu-item menu-item-has-children" id="shopByFreeShipping">
        
            <a href="#" class="text-danger font-weight-bold">Sale!</a>

            <ul class="sub-menu">
            
                <p class="text-uppercase d-block px-xl-2">
                                        
                    <a href="#" class="category-link font-weight-bold">Discounted Collections<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>
                                    
                </p>

                <p class="text-uppercase d-block px-xl-2">
                                        
                    <a href="#" class="category-link font-weight-bold">4/5-pc. Bundles<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>
                                    
                </p>

                <p class="text-uppercase d-block px-xl-2">
                                        
                    <a href="#" class="category-link font-weight-bold">Free Shipping!<i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>
                                    
                </p>
            
            </ul>

        </li>

    </ul>

</div>