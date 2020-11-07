<div id="buy-variable-now">

    <div id="buy-variable-now-content">

        <div class="container">

            <div class="row justify-content-between align-items-center p-3">

                <h6 style="max-width: 80%; line-height: 1.25rem;" class="mb-0 text-uppercase font-weight-normal" id="confirm-variable-size">Buy Now</h6>

                <button id="close-buy-variable-now" class="font-weight-normal">x</button>

            </div>

            <hr class="my-0">

            <div class="row justify-content-center">

                <div class="col col-12 text-center">
                    <p class="text-uppercase font-weight-bold mt-3 mb-0" id="variable-product-name"></p>
                    <p class="mb-0">Please confirm its size as below.</p>
                </div>

            </div>

            <div class="row justify-content-center align-items-center p-3" id="buy-variations-content">

                <!-- Dynamically inserted by JS -->

            </div>

            <hr class="mt-n3 mb-3">

            <div class="row justify-content-center">

                <h6 class="text-uppercase">Wait! Don't forget</h6>

            </div>

            <div class="w-100" style="overflow-x:hidden;" id="buy-now-recommendations">

                <div style="max-width:800px; width:100%; text-align:center;">

                <?php
                
                global $woocommerce; 

                $cross_sell_products_id = [12833, 12836, 12841, 12846, 12849, 12852, 12855, 12858, 12861, 12864, 12867, 12870, 12873, 12877, 12881, 12884, 12887, 12890, 12894, 12897, 12900, 12903, 12906, 12909, 12914, 12917];
              
                shuffle( $cross_sell_products_id );
              
                $product_ids = [];
              
                for ($i = 0; $i < 4; $i++) {
              
                  $_product_id = $cross_sell_products_id[$i];
              
                  array_push( $product_ids, $_product_id );
              
                }
                
                foreach( $product_ids as $product_id ) {
                
                $product = wc_get_product( $product_id );
                $thumbnail_url = get_the_post_thumbnail_url( $product_id );

                ?>
            
                <div style="width:150px;" class="d-inline-block align-top text-center mx-2">

                    <img class="w-100 img-fluid" src="<?php echo $thumbnail_url; ?>" alt="Shop Earthly Body | <?php echo $product->get_name(); ?>">

                    <h7 class="w-100"><?php echo $product->get_name(); ?></h7>

                    <button data-product_id="<?php echo $product_id; ?>" style="font-size: 0.85rem; text-decoration: underline;" class="text-uppercase my-3 text-success font-weight-bold w-100 btn btn-transparent impulse-button">Add to bag</button>

                </div>

                <?php 
                }
                
                ?>

                </div>

            </div>


            <div class="row justify-content-between align-items-center p-3">

                <button class="btn btn-dark text-uppercase rounded-0 mt-1 mt-md-0 w-100" id="buy-now-variable-checkout">Place Order</button>

            </div>

        </div>

    </div>

</div>