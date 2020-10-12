<div id="add-variable-to-cart">

    <div id="add-variable-content">

        <div class="container">
        
            <div class="row justify-content-between align-items-center p-3">

                <h6 style="max-width: 80%; line-height: 1.25rem;" class="mb-0 text-uppercase font-weight-normal" id="choose-size">Choose Size</h6>

                <button id="close-add-variable-to-cart" class="font-weight-normal">x</button>

            </div>

            <hr class="my-0">

            <div class="row justify-content-center align-items-center p-3" id="variations-content">

                <!-- Different Sizes, Dynamically Content by JS -->

            </div>

            <div class="row justify-content-center align-items-center p-3 mt-n5 d-none" id="upsells-content">

                <!-- Same cross-sells from the cart page -->
                <?php woocommerce_cross_sell_display(); ?>

            </div>

            <div class="row justify-content-between align-items-center p-3" id="action-buttons">
            
                <button class="btn btn-dark text-uppercase rounded-0 w-100" style="font-size:0.85rem;" id="confirm-size">Confirm Size</button>
                
                <a href="?add-to-cart=14759" class="btn btn-dark text-uppercase rounded-0 w-100 d-none mt-n5 product_type_simple add_to_cart_button ajax_add_to_cart" style="font-size:0.85rem;" id="go-checkout">Proceed to Checkout</a>
  

                <button id="cancel-purchase" class="my-1 btn btn-outline-dark text-uppercase rounded-0 w-100" style="font-size:0.85rem;">Cancel</button>

            </div>
        
        </div>
    
    </div>

</div>