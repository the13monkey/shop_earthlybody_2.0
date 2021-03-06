jQuery( document ).ready( function($){

    $('.product_type_simple').click(function(){

        var theTrigger = $(this);

        var theProduct = theTrigger.parent();

        // Check product type 

        var ifsimple = theProduct.find('.options').length; 

        if ( ifsimple > 0 ) { // Variable product 

            // Get Product Thumbnail URL 
            var image_url = theProduct.find('img.attachment-woocommerce_thumbnail').attr('src');

            // Get Parent Product Name 
            var parentName = theProduct.find('.woocommerce-loop-product__title').html(); 

            // Get Selected Variation's Name (eg. 8 oz)
            var variationName = theProduct.find('.options.selected').next().data('variation_name');
            var theName = parentName +' ('+ variationName +') ';

            // Get Product Price 
            var thePriceNumber = theProduct.find('.options.selected').next().data('variation_price');
            var thePrice = '$'+thePriceNumber;        

        } else {

            // Simple product

            // Get Product Thumbnail URL 
            var image_url = theProduct.find('img.attachment-woocommerce_thumbnail').attr('src');

            // Get Product Name 
            var theName = theProduct.find('.woocommerce-loop-product__title').html();

            // Check If On Sale to Get Product Current Price 
            var ifonsale = theProduct.find('.price del').length; 

            if (ifonsale > 0) {

                var thePrice = theProduct.find('.price').find('ins').find('span.woocommerce-Price-amount').html();
    
            } else {
    
                var thePrice = theProduct.find('span.woocommerce-Price-amount').html();
    
            }

        }

        var myInterval = setInterval( function(){

            var loaded = theTrigger.hasClass('added');
    
            if ( loaded ) {

                $('#last-added-image').attr('src', image_url);

                $('#last-added-name').html(theName);

                $('#last-added-price').html(thePrice);

                $('#added-cart-popup').css('display', 'flex');

                $('.ready-to-add').removeClass('ready-to-add');

                clearInterval(myInterval);
    
            }
    
        }, 200 );

    });

    $('#close-added-cart-popup').click(function(){

        $('#added-cart-popup').css('display', 'none');

        clearInterval(myInterval);

        // Switch variable product my and default add to cart buttons 

        $('.woo-default-variable-add').removeClass('.ready-to-add').addClass('d-none');

        $('.my_add_variable').removeClass('d-none');

        // Remove dynamic content in the #variations-content 

        $('#variations-content').html('');

    });

    $('#continue-shopping-button').click(function(){

        $('#added-cart-popup').css('display', 'none');

        clearInterval(myInterval);
        
        // Switch variable product my and default add to cart buttons 

        $('.woo-default-variable-add').removeClass('.ready-to-add').addClass('d-none');

        $('.my_add_variable').removeClass('d-none');

        // Remove dynamic content in the #variations-content 

        $('#variations-content').html('');

    });

    default_options_styles();
    
    $('.options').click(function(event){

        event.preventDefault();

        $(this).parent().find('.options.selected').removeClass('selected');

        $(this).addClass('selected');

        var variation_price__selected = $(this).next().data('variation_price');

        var variation_thumb_selected = $(this).next().data('thumb_url');

        $(this).parent().parent().find('#variation-price--default').html('$'+variation_price__selected);

        $(this).parent().parent().find('.attachment-woocommerce_thumbnail').attr({
            'src' : variation_thumb_selected,
            'lazy' : '',
            'srcset' : '',
        });

    });

    $('.my_add_variable').click( function(e){

        e.preventDefault();

        $(this).parent().find('.woo-default-variable-add').addClass('ready-to-add'); 

        var variations = $(this).parent().find('.variations');

        var variations_array = [];

        $.each( variations, function(index, item) {

            variations_array.push( { variationID: $(item).data('variation_id'), variationName: $(item).data('variation_name'), variationThumbURL: $(item).data('thumb_url'), variationPrice: $(item).data('variation_price') } );

        }) 

        var i;

        for( i=0; i< variations_array.length; i++) {

            var variation_id = variations_array[i]['variationID'];

            var variation_thumb_url = variations_array[i]['variationThumbURL'];

            var variation_name = variations_array[i]['variationName'];

            var variation_price = variations_array[i]['variationPrice'];

            var width = Math.floor(100/3); 

            $('#variations-content').append(`<div style="width:${width}%"><img class="img-thumbnail rounded-0" style="border-radius:0px!important;" src="${variation_thumb_url}" alt="Shop Earthly Body"/><p class="text-center mb-0">${variation_name}</p><p class="text-center">$${variation_price}</p><input type="hidden" value="${variation_id}"></div>`);

        }

        $('#add-variable-to-cart').css('display', 'flex');

        var variation_id__default = $(this).parent().find('.options.selected').next().data('variation_id');

        $('#variations-content').find('input[value="'+variation_id__default+'"]').parent().find('*').addClass('img-thumbnail-clicked');

        $('#variations-content .img-thumbnail').click(function(){

            $('.img-thumbnail-clicked').removeClass('img-thumbnail-clicked');

            $(this).parent().find('*').addClass('img-thumbnail-clicked'); 

            // Also change selected variations for the "product in bag" popup 

            var variation_id_selected = $('input.img-thumbnail-clicked').val();

            $('input.variations[data-variation_id='+variation_id_selected+']').prev().click();

        });

        
        $('#close-add-variable-to-cart').click(function(){

            location.reload();
    
        });

        $('#cancel-purchase').click(function(){

           location.reload();

        });

    } );

    $('#confirm-size').click(function(){

        // check if size is selected

        var length = $('.img-thumbnail-clicked').length;

        if (length > 0) {

            var variation_id = $('.img-thumbnail-clicked').parent().find('input').val();

            $('.ready-to-add').attr({

                'href': '?add-to-cart='+variation_id,

                'data-product_id': variation_id

            });

            $('.ready-to-add').click();

            $('.img-thumbnail-clicked').removeClass('img-thumbnail-clicked');

            $('#add-variable-to-cart').css('display', 'none');

            $('.ready-to-add').parent().find('.my_add_variable').addClass('d-none');

            $('.ready-to-add').removeClass('d-none');


        } else {

            alert('Please choose a size');

        }

    });
    
    $('.buy_now_button').click(function(){

        // Check product type 
        var theTrigger = $(this);

        var theProduct = theTrigger.parent();

        // Check product type 

        var ifsimple = theProduct.find('.options').length; 

        if ( ifsimple > 0 ) {

            // Variable product
            // Confirm size 
            
            // Insert variations into the popup area 
            var variations = $(this).parent().find('.variations');

            var parent_name = $(this).parent().find('.woocommerce-loop-product__title').html();

            $('#variable-product-name').html(parent_name);

            var variations_array = [];

            $.each( variations, function(index, item) {

                variations_array.push( { variationID: $(item).data('variation_id'), variationName: $(item).data('variation_name'), variationThumbURL: $(item).data('thumb_url'), variationPrice: $(item).data('variation_price') } );

            }) 

            var i;

            for( i=0; i< variations_array.length; i++) {

                var variation_id = variations_array[i]['variationID'];

                var variation_thumb_url = variations_array[i]['variationThumbURL'];

                var variation_name = variations_array[i]['variationName'];

                var variation_price = variations_array[i]['variationPrice'];

                var width = Math.floor(100/3); 

                $('#buy-variations-content').append(`<div style="width:${width}%; text-align:center;"><img class="img-thumbnail rounded-0" style="border-radius:0px!important;max-width:120px; margin-bottom: 15px;" src="${variation_thumb_url}" alt="Shop Earthly Body"/><p class="text-center mb-0">${variation_name}</p><p class="text-center">$${variation_price}</p><input type="hidden" value="${variation_id}"></div>`);

            }

            $('#buy-variable-now').css('display', 'flex');

            var variation_id__default = $(this).parent().find('.options.selected').next().data('variation_id');

            $('#buy-variations-content').find('input[value="'+variation_id__default+'"]').parent().find('*').addClass('img-thumbnail-clicked');

            $('#buy-variations-content .img-thumbnail').click(function(){

                $('.img-thumbnail-clicked').removeClass('img-thumbnail-clicked');
    
                $(this).parent().find('*').addClass('img-thumbnail-clicked'); 
    
                // Also change selected variations for the "product in bag" popup 
    
                var variation_id_selected = $('input.img-thumbnail-clicked').val();
    
                $('input.variations[data-variation_id='+variation_id_selected+']').prev().click();
    
            });

            $('.impulse-button').click(function(){
        
                $(this).removeClass('text-success').addClass('impulseClicked text-muted');
        
                $(this).css('cursor', 'no-drop');
        
                $(this).html('Added to bag');
        
            });

            $('#buy-now-variable-checkout').click(function(){

                $(this).html('Processing...');

                // Check if impulse buys
                var ifImpulse = $('.impulseClicked').length;

                var variation_id = $('input.img-thumbnail-clicked').val();

                if (ifImpulse > 0) {

                    var Ids = [];

                    Ids.push(variation_id);
    
                    $('.impulseClicked').each(function(){
    
                        var impulseID = $(this).data('product_id');
    
                        Ids.push(impulseID);
    
                    });

                    var checkoutStr = Ids.join(",");

                    var checkoutURL = "https://site.test/shopearthlybody/checkout/?add-to-cart="+checkoutStr; 

                    window.location.replace(checkoutURL);
    
                } else {

                    var checkoutURL2 = "https://site.test/shopearthlybody/checkout/?add-to-cart="+variation_id; 

                    window.location.replace(checkoutURL2);

                }

            });


        } else {

            // Simple product 
            // Get all the information needed 
            var product_id = theProduct.find('.my_add_simple').data('product_id');

            var product_name = theProduct.find('.woocommerce-loop-product__title').html();

            var product_image_url = theProduct.find('.attachment-woocommerce_thumbnail').attr('src');

            // Check If On Sale to Get Product Current Price 
            var ifonsale = theProduct.find('.price del').length; 

            if (ifonsale > 0) {

                var thePrice = theProduct.find('.price').find('ins').find('span.woocommerce-Price-amount').html();
    
            } else {
    
                var thePrice = theProduct.find('span.woocommerce-Price-amount').html();
    
            }

            $('#buy-now-popup #product-buy-image').attr('src', product_image_url);

            $('#buy-now-popup #product-buy-name').html(product_name);

            $('#buy-now-popup #product-buy-price').html(thePrice);

            // Open popup 

            $('#buy-now-popup').css('display', 'flex');

            $('.impulse-button').click(function(){
        
                $(this).removeClass('text-success').addClass('impulseClicked text-muted');
        
                $(this).css('cursor', 'no-drop');
        
                $(this).html('Added to bag');
        
            });

            $('#buy-now-checkout').click(function(){

                $(this).html('Processing...');

                // Check if impulse buys
                var ifImpulse = $('.impulseClicked').length;

                if (ifImpulse > 0) {

                    var Ids = [];

                    Ids.push(product_id);
    
                    $('.impulseClicked').each(function(){
    
                        var impulseID = $(this).data('product_id');
    
                        Ids.push(impulseID);
    
                    });

                    var checkoutStr = Ids.join(",");

                    var checkoutURL = "https://site.test/shopearthlybody/checkout/?add-to-cart="+checkoutStr; 

                    window.location.replace(checkoutURL);
    
                } else {

                    var checkoutURL2 = "https://site.test/shopearthlybody/checkout/?add-to-cart="+product_id; 

                    window.location.replace(checkoutURL2);

                }

            });

        }

    });

    $('#close-buy-now-popup').click(function(){

        $('#buy-now-popup').css('display', 'none');

        deSelectImpulseBuys();

    });

    $('#close-buy-variable-now').click(function(){

        $('#buy-variable-now').css('display', 'none');

        $('#buy-variations-content').html('');

        deSelectImpulseBuys();

    });

    $('.impulse-button').click(function(){
        
        $(this).removeClass('text-success').addClass('impulseClicked text-muted');

        $(this).css('cursor', 'no-drop');

        $(this).html('Added to bag');

    });

    function default_options_styles() {

        $('.options:first-child').addClass('selected');

        $('.options.selected').each(function(){

            var variation_price__default = $(this).parent().find('input[name="variation_id"]').data('variation_price');

            $(this).parent().parent().find('#variation-price--default').html('$'+variation_price__default);

        });

    }

    function deSelectImpulseBuys () {

        $('.impulse-button').removeClass('text-muted impluseClicked').addClass('text-success');

        $(this).css('cursor', 'pointer');

        $(this).html('Add to bag');

        var Ids = [];

    }

});