<div id="added-cart-popup">

    <div id="cart-content">

        <div class="container">
        
            <div class="row justify-content-between align-items-center p-3">

                <h6 style="max-width: 80%; line-height: 1.25rem;" class="mb-0 text-uppercase font-weight-normal">It's in the Bag!</h6>

                <button id="close-added-cart-popup" class="font-weight-normal">x</button>

            </div>

            <hr class="my-0">

            <div class="row justify-content-between align-items-center py-3">

                <div style="width:50%">

                    <img src="" class="w-100 img-fluid" id="last-added-image" />

                </div>

                <div style="width:50%; text-align: left; padding-right:1rem;">
            
                    <h6 id="last-added-name" class="font-weight-light"></h6>

                    <h7 id="last-added-price" class="font-weight-bold"></h7>

                </div>

            </div>

            <div id="cart-content-popup-items" class="row justify-content-between align-items-center p-3"></div>

            <div class="row justify-content-between align-items-center p-3">
            
                <button class="btn btn-dark text-uppercase rounded-0 w-100" style="font-size:0.85rem;" id="continue-shopping-button">Continue Shopping</button>

                <a href="<?php echo wc_get_cart_url() ?>" class="btn btn-outline-dark text-uppercase rounded-0 w-100 mt-1" style="font-size:0.85rem;">View Bag & Checkout</a>

            </div>
        
        </div>
    

        
    
    </div>

</div>