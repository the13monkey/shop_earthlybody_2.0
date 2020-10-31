<div class="menu-primary-menu-new-container">

    <ul id="menu-primary-menu-new-2" class="top-page-primary-menu">

        <li class="menu-item menu-item-has-children" id="shopByProduct">

            <a href="#">Shop by Product</a>

            <ul class="sub-menu" style="display:block;">

                <div class="container-fluid pr-0">

                    <div class="row">

                        <div class="col col-3 col-xl-2 px-0">

                            <div class="nav flex-column justify-content-start ml-0" id="tab-names">
        
                                <?php 
                                    //Home Mega Menu Cat ID = 276
                                    $parent_cat_ID = 276; 

                                    $args = array(
                                        'hierarchical' => 1,
                                        'show_option_none' => '',
                                        'hide_empty' => 0,
                                        'parent' => $parent_cat_ID, 
                                        'taxonomy' => 'product_cat'
                                    );

                                    $subcats = get_categories($args);

                                    foreach ($subcats as $subcat): ?>

                                    <?php 
                                    
                                        $cat_name_str = strtolower( $subcat->name ); 
                                        $tab_name = preg_replace('/[\W]/', '_', $cat_name_str);
                                        
                                    ?>
                                    <button class="rounded-0 btn w-100 text-left text-uppercase py-1 border-top" data-tab_name="<?php echo $tab_name; ?>"><?php echo str_replace( 'MM-', '', $subcat->name); ?></button>
                                
                                <?php endforeach; ?>
                                
                            </div>

                        </div>

                        <div class="col col-9 col-xl-10 px-3">
                            
                            <?php 
                                //Home Mega Menu Cat ID = 276
                                $parent_cat_ID = 276; 

                                $args = array(
                                        'hierarchical' => 1,
                                        'show_option_none' => '',
                                        'hide_empty' => 0,
                                        'parent' => $parent_cat_ID, 
                                        'taxonomy' => 'product_cat'
                                );

                                $subcats = get_categories($args);

                                foreach ($subcats as $subcat): ?>

                                <?php 
                                    
                                    $cat_name = $subcat->name; 

                                    $cat_id = $subcat->term_id; 

                                    $cat_name_str = strtolower( $subcat->name ); 
                                    
                                    $tab_name = preg_replace('/[\W]/', '_', $cat_name_str);

                                    $sub_term_name = get_term_by('name', $cat_name, 'product_cat');

                                    $sub_cat_ID = $sub_term_name->term_id; 
                                        
                                ?>
                                
                                <div class="nav flex-row d-none" id="tab-content__<?php echo $tab_name; ?>">
                                
                                    <div style="width: 60%;">
                                
                                        <?php 
                                        
                                        $args = array(
                                            'hierarchical' => 1,
                                            'show_option_none' => '',
                                            'hide_empty' => 0,
                                            'parent' => $sub_cat_ID, 
                                            'taxonomy' => 'product_cat'
                                        );
        
                                        $subSubCats = get_categories($args);

                                        foreach( $subSubCats as $subSubCat ) : ?>

                                            <p class="text-uppercase d-block d-xl-inline-block font-weight-bold align-top pl-xl-4">

                                                <?php echo str_replace('MM-', '', $subSubCat->name); ?>

                                                <?php 

                                                    $subSubCatName = $subSubCat->name;

                                                    $product_args = array(
                                                        'category' => array(
                                                            $subSubCatName
                                                        )
                                                    );

                                                    $products = wc_get_products( $product_args );

                                                    foreach ($products as $product) : ?>

                                                        <a href="<?php echo get_permalink( $product->get_id() ) ?>" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100" style="font-size: 0.95rem"><?php echo $product->get_name(); ?><i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                                    <?php endforeach; 
                                                
                                                ?>

                                            </p>

                                        <?php endforeach; ?>

                                            <p class="text-uppercase d-block d-xl-inline-block font-weight-bold align-top pl-xl-4">

                                                More products

                                                <a href="<?php echo get_permalink( $product->get_id() ) ?>" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100" style="font-size: 0.95rem">Shop All <?php echo str_replace('MM-', '', $cat_name); ?><i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                            </p>            

                                    </div>

                                    <div style="width: 40%;">
                                
                                                                
                                
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

    </ul>

</div>