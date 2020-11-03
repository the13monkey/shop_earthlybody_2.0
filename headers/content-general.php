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
                                    //Home Mega Menu Cat ID
                                    $parent_cat_ID = 272; 

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
                                //Home Mega Menu Cat ID
                                $parent_cat_ID = 272; 

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
                                            'hide_empty' => 1,
                                            'parent' => $sub_cat_ID, 
                                            'taxonomy' => 'product_cat'
                                        );
        
                                        $subSubCats = get_categories($args);

                                        foreach( $subSubCats as $subSubCat ) : ?>

                                            <p class="text-uppercase d-block d-xl-inline-block align-top pl-xl-4">

                                                <a href="<?php echo get_category_link($subSubCat->cat_ID) ?>" class="category-link font-weight-bold"><?php echo str_replace('MM-', '', $subSubCat->name); ?><i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                                <?php 

                                                    $subSubCatName = $subSubCat->name;

                                                    $product_args = array(
                                                        'category' => array(
                                                            $subSubCatName
                                                        ),
                                                        'orderby' => array('meta_value_num' => 'DESC', 'title' => 'ASC'),
                                                        'meta_key' => 'total_sales', 
                                                        'limit' => 4,
                                                    );

                                                    $products = wc_get_products( $product_args );

                                                    foreach ($products as $product) : ?>

                                                        <a href="<?php echo get_permalink( $product->get_id() ) ?>" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100 font-weight-normal" style="font-size: 0.95rem"><?php echo $product->get_name(); ?></a>

                                                    <?php endforeach; 
                                                
                                                ?>

                                            </p>

                                        <?php endforeach; ?>

                                            <p class="text-uppercase d-block d-xl-inline-block font-weight-bold align-top pl-xl-4">

                                                More products

                                                <a href="<?php echo get_permalink( $product->get_id() ) ?>" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100" style="font-size: 0.95rem">Shop All <?php echo str_replace('MM-', '', $cat_name); ?><i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                            </p>            

                                    </div>

                                    <div style="width: 40%;" class="text-center border-left pl-4 pr-0">

                                        <p class="text-center py-1 bg-success text-uppercase font-weight-bold w-100 text-light">Best Seller!</p>
                                
                                        <?php 
                                        
                                        $args = array(
                                                    'category' => array( $cat_name ),
                                                    'limit' => '1',
                                                    'orderby' => array('meta_value_num' => 'DESC', 'title' => 'ASC'),
                                                    'meta_key' => 'total_sales', 

                                                );

                                        $products_obj = wc_get_products( $args );

                                        foreach ($products_obj as $product_obj): ?>

                                            <a href="<?php echo get_permalink($product_obj->get_id()) ?>" class="mega-menu-product">

                                                <img src="<?php echo wp_get_attachment_url($product_obj->get_image_id()) ?>" alt="<?php echo $product_obj->get_name() ?> | Shop Earthly Body" class="w-100" style="max-width:280px"/>

                                                <h5 class="px-2 mb-0" style="font-size:0.95rem; line-height: 1.15"><?php echo $product_obj->get_name(); ?></h5>

                                                <p class="w-100 text-center"><?php echo $product_obj->get_price_html() ?></p>

                                                <button class="btn btn-outline-dark text-uppercase font-weight-bold rounded-0">learn more</button>

                                            </a>

                                        <?php endforeach; ?>                    
                                
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