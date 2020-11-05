<div id="buy-now-popup">

    <div id="buy-now-content">

        <div class="container">
        
            <div class="row justify-content-between align-items-center p-3">

                <h6 style="max-width: 80%; line-height: 1.25rem;" class="mb-0 text-uppercase font-weight-normal" id="add-to-bag-heading">Buy Now</h6>

                <button id="close-buy-now-popup" class="font-weight-normal">x</button>

            </div>

            <hr class="my-0">

            <div class="row justify-content-between align-items-center py-3">

                <div style="width:50%" class="added-image-container text-md-center">

                    <img src="" class="w-100" id="product-buy-image" />

                </div>

                <div style="width:50%; text-align: left; padding-right:1rem;" class="product-buy-details">
            
                    <h6 id="product-buy-name" class="font-weight-light"></h6>

                    <h7 id="product-buy-price" class="font-weight-bold"></h7>

                </div>

            </div>

            <hr>

            <div class="row justify-content-center">

                <h6 class="text-uppercase">Wait! Don't forget</h6>

            </div>

            <div class="row">

                <p>Product 1</p>
                <p>Product 2</p>

            </div>


            <div class="row justify-content-between align-items-center p-3">

                <a href="<?php echo wc_get_cart_url() ?>" class="btn btn-dark text-uppercase rounded-0 mt-1 mt-md-0 w-100" id="buy-now-checkout">Place Order</a>

            </div>
        
        </div>
    
    </div>

</div>
