<div class="menu-primary-menu-new-container">

    <ul id="menu-primary-menu-new-2" class="top-page-primary-menu">

        <li class="menu-item menu-item-has-children" id="shopByProduct">

            <a href="#">Shop by Product</a>

            <ul class="sub-menu" style="display:block">

               <div class="nav flex-column justify-content-start ml-0">

                    <button class="my-0 rounded-0 btn btn-dark w-100 text-left">CBD Topicals</button>

                    <button class="my-0 rounded-0 btn w-100 text-left">CBD Hair Care</button>

                    <button class="my-0 rounded-0 btn w-100 text-left">Massage Lotions & Candles</button>

                    <button class="my-0 rounded-0 btn w-100 text-left">Hair Care</button>

                    <button class="my-0 rounded-0 btn w-100 text-left">Body Care</button>

                    <button class="my-0 rounded-0 btn w-100 text-left">Hemp Seed by Night</button>

               </div>

               <div class="nav flex-row mx-0">

                    <li class="nav-item">

                        <a class="nav-link pb-0">CBD Cream</a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link pb-0">CBD Lotion</a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link pb-0">CBD Serum</a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link pb-0">CBD Spray</a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link pb-0">CBD Lip Balm & Salve</a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link pb-0">CBD Cuticle Oil</a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link pb-0">CBD Foot Cream</a>

                    </li>

               </div>

               <div class="nav single-product-space border-left pl-3">

                    <p class="w-100 text-center text-white text-uppercase bg-dark">Featured</p>

                    <?php 
                    
                        $args = array(
                            'posts_per_page' => '1',
                            'product_cat' => 'CBD Daily Products',
                            'post_type' => 'product',
                            'orderby' => 'popularity',
                        );

                        $query = new WP_Query( $args );
                        if( $query->have_posts()) : while( $query->have_posts() ) : $query->the_post();

                            echo '<img src="'.get_the_post_thumbnail_url().'" alt="Shop Earthly Body" class="img-fluid w-100"/>';
                            echo '<h6 class="text-center">'.get_the_title().'</h6>';
                            echo '<a href="'.get_post_permalink().'" class="btn btn-outline-dark rounded-0 w-100 text-center my-3 menu-featured-product">Buy Now</a>';

                        endwhile;
                            endif;
                    
                    ?>

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

    </ul>

</div>