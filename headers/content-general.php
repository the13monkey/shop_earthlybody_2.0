<div class="menu-primary-menu-new-container">

    <ul id="menu-primary-menu-new-2" class="top-page-primary-menu">

        <li class="menu-item menu-item-has-children" id="shopByProduct">

            <a href="#">Shop by Product</a>

            <ul class="sub-menu">

                <div class="container-fluid">

                    <div class="row">

                        <div class="col col-3 px-0">

                            <div class="nav flex-column justify-content-start ml-0">

                                <button class="mb-1 rounded-0 btn btn-dark w-100 text-left text-uppercase py-0">CBD Topicals</button>

                                <button class="mb-1 rounded-0 btn w-100 text-left text-uppercase py-0">CBD Hair Care</button>

                                <button class="mb-1 rounded-0 btn w-100 text-left text-uppercase py-0">Massage Lotions & Candles</button>

                                <button class="mb-1 rounded-0 btn w-100 text-left text-uppercase py-0">Hair Care</button>

                                <button class="mb-1 rounded-0 btn w-100 text-left text-uppercase py-0">Body Care</button>

                                <button class="mb-1 rounded-0 btn w-100 text-left text-uppercase py-0">Hemp Seed by Night</button>

                                <button class="mb-1 rounded-0 btn w-100 text-left text-uppercase text-success py-0">Free Shipping</button>

                            </div>

                        </div>

                        <div class="col col-6 px-3">

                            <div class="nav d-flex flex-row">

                                <p class="nav-link text-uppercase d-flex flex-column font-weight-bold pl-0">
                                    
                                    CBD Cream
                                    
                                    <a href="#" class="nav-link pl-0 py-1 text-dark text-capitalize my-1 font-weight-light">CBD Daily Intensive Cream - Original Strength</a>

                                    <a href="#" class="nav-link pl-0 py-1 text-dark mb-1 font-weight-light text-capitalize">CBD Daily Intensive Cream - Triple Strength</a>

                                    <a href="#" class="nav-link pl-0 py-1 text-dark text-capitalize my-1 font-weight-light">CBD Daily Intensive Cream - Original Strength (Lavender)</a>

                                </p>

                                <p class="nav-link text-uppercase d-flex flex-column font-weight-bold pl-0">

                                    CBD Serum

                                    <a href="#" class="nav-link pl-0 py-1 text-dark text-capitalize my-1 font-weight-light">CBD Daily Soothing Serum - Original Strength</a>

                                    <a href="#" class="nav-link pl-0 py-1 text-dark mb-1 font-weight-light text-capitalize">CBD Daily Soothing Serum - Triple Strength</a>

                                    <a href="#" class="nav-link pl-0 py-1 text-dark mb-1 font-weight-light text-capitalize">CBD Daily Soothing Serum - Original Strength (Lavender)</a>

                                </p>

                                <p class="nav-link text-uppercase d-flex flex-column font-weight-bold pl-0">

                                    CBD Spray

                                    <a href="#" class="nav-link pl-0 py-1 text-dark text-capitalize my-1 font-weight-light">CBD Daily Active Spray - Original Strength</a>

                                    <a href="#" class="nav-link pl-0 py-1 text-dark mb-1 font-weight-light text-capitalize">CBD Daily Active Spray - Triple Strength</a>

                                </p>

                                <p class="nav-link text-uppercase d-flex flex-column font-weight-bold pl-0">

                                    CBD Ultra Care
                                   
                                    <a href="#" class="nav-link pl-0 py-1 text-dark text-capitalize my-1 font-weight-light">CBD Cuticle Oil</a>

                                    <a href="#" class="nav-link pl-0 py-1 text-dark mb-2 font-weight-light text-capitalize">CBD Foot Cream</a>

                                    <a href="#" class="nav-link pl-0 py-1 text-dark mb-1 font-weight-light text-capitalize">CBD Hand Wash</a>

                                    <a href="#" class="nav-link pl-0 py-1 text-dark mb-1 font-weight-light text-capitalize">CBD Hand & Body Lotion</a>

                                </p>
                                
                                <p class="nav-link text-uppercase d-flex flex-column font-weight-bold pl-0">

                                    CBD Lip Balm

                                    <a href="#" class="nav-link pl-0 py-1 text-dark text-capitalize my-1 font-weight-light">CBD Daily Lip Balm & Salve</a>

                                </p>


                            </div>

                        </div>

                        <div class="col col-3 border-left">

                            <p class="w-100 text-center text-white text-uppercase bg-success">new!</p>

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
                                    echo '<a href="'.get_post_permalink().'" class="btn btn-outline-dark rounded-0 w-100 text-center my-3 menu-featured-product">Learn more</a>';

                                endwhile;
                                    endif;

                            ?>

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

    </ul>

</div>