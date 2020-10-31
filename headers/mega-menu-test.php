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
                                    <button class="rounded-0 btn w-100 text-left text-uppercase py-1 border-top" data-tab_name="<?php echo $tab_name; ?>"><?php echo str_replace( 'MM ', '', $subcat->name); ?></button>
                                
                                <?php endforeach; ?>

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

                                    $sub_cat_name = $subcat->name; 
                                    
                                    $sub_term_name = get_term_by('name', $sub_cat_name, 'product_cat');

                                    $sub_cat_ID = $sub_term_name->term_id; 

                                ?> 
                                
                                <div class="nav flex-row d-none" id="tab-content__<?php echo $tab_name; ?>">

                                    <div style="width: 60%;">
                                        
                                        <?php 
                                        
                                            $subargs = array(
                                                'hierarchical' => 1,
                                                'show_option_none' => '',
                                                'hide_empty' => 0,
                                                'parent' => $sub_cat_ID, 
                                                'taxonomy' => 'product_cat'
                                            );
        
                                            $subSubCats = get_categories($subargs);

                                            foreach( $subSubCats as $subSubCat ) : ?>

                                            <p class="text-uppercase d-block d-xl-inline-block font-weight-bold align-top pl-xl-4">
                                                
                                                <?php 

                                                    $subSubCatNameStr = $subSubCat->name;

                                                    echo str_replace('MM ', '', $subSubCatNameStr);

                                                    $p_args = array(
                                                        'category' => array( $subSubCatNameStr )
                                                    );

                                                    $products = wc_get_products( $p_args ); 

                                                    foreach ($products as $product) : ?>

                                                        <a href="<?php echo get_permalink($product->get_id()) ?>" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100" style="font-size: 0.85rem"><?php echo $product->get_name(); ?><i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                                    <?php endforeach; 
                                                    
                                                ?>

                                            </p>

                                        <?php endforeach; ?>

                                            <p class="text-uppercase d-block d-xl-inline-block font-weight-bold align-top pl-xl-4">

                                                More products
                                                <a href="<?php echo get_permalink($product->get_id()) ?>" class="nav-link px-0 py-1 text-dark text-capitalize my-1 w-100" style="font-size: 0.85rem">Shop All <?php echo $sub_cat_name; ?> <i class="fa fa-angle-double-right ml-1" aria-hidden="true"></i></a>

                                            </p>

                                    </div>

                                    <div style="width: 40%" class="border-left pl-3">
                                
                                        <p class="w-100 text-center text-white text-uppercase bg-success">Best Seller!</p>

                                        <?php 

                                            $args = array(
                                                'posts_per_page' => 1,
                                                'product_cat' => 'CBD Topicals',
                                                'meta_key' => 'total_sales',
                                                'orderby' => 'meta_value_num',
                                                'order' => 'DESC',
                                            );

                                            $query = new WP_Query( $args );
                                            if( $query->have_posts()) : while( $query->have_posts() ) : $query->the_post();
                                                
                                                $product = wc_get_product( get_the_ID() );
                                                $product_type = $product->get_type();
                                                $product_price = $product->get_price();
                                                
                                              
                                                echo '<a href="'.get_post_permalink().'" class="btn rounded-0 w-100 text-center menu-featured-product"><img src="'.get_the_post_thumbnail_url().'" alt="Shop Earthly Body" class="img-fluid w-100"/></a>';
                                                echo '<h6 class="text-center">'.get_the_title().'</h6>';
                                                if ( $product_type == 'simple' ) {
                                                    echo '<h5 class="text-center">$'.$product_price.'</h5>';
                                                } else {
                                                    echo '<h5 class="text-center">'.$product->get_price_html().'</h5>';
                                                }
                                                echo '<a href="'.get_post_permalink().'" class="btn btn-outline-dark rounded-0 w-100 text-center my-3 menu-featured-product">Learn more</a>';

                                            endwhile;
                                                endif;

                                        ?>

                                    </div>
                            
                                </div>

                            <?php endforeach; ?>