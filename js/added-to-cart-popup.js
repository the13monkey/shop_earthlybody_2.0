jQuery( document ).ready( function($){

    $('.ajax_add_to_cart').click(function(){

        var theTrigger = $(this);

        var image_url = theTrigger.parent().find('img.attachment-woocommerce_thumbnail').attr('src');

        var theName = theTrigger.parent().find('h5.woocommerce-loop-product__title').html();

        var thePrice = theTrigger.parent().find('span.woocommerce-Price-amount').html();

        var myInterval = setInterval( function(){

            var loaded = theTrigger.hasClass('added');
    
            if ( loaded ) {

                $('#last-added-image').attr('src', image_url);

                $('#last-added-name').html(theName);

                $('#last-added-price').html(thePrice);

                $('#added-cart-popup').css('display', 'flex');

                clearInterval(myInterval);
    
            }
    
        }, 200 );

        $('#close-added-cart-popup').click(function(){

            $('#added-cart-popup').css('display', 'none');
    
            clearInterval(myInterval);
    
        });

        $('#continue-shopping-button').click(function(){

            $('#added-cart-popup').css('display', 'none');
    
            clearInterval(myInterval);

        });

    });


    
    
});