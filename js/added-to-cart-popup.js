jQuery( document ).ready( function($){

    $('.product_type_simple').click(function(){

        var theTrigger = $(this);

        var theProduct = theTrigger.parent();

        // Check product type 

        var ifsimple = theProduct.find('.options').length; 

        if ( ifsimple > 0 ) { 

            // Variable product 

            // Get Product Thumbnail URL 
            var image_url = theProduct.find('img.attachment-woocommerce_thumbnail').attr('src');

            // Get Product Name 
            var parentName = theProduct.find('.woocommerce-loop-product__title').html();
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

    function default_options_styles() {

        $('.options:first-child').addClass('selected');

        $('.options.selected').each(function(){

            var variation_price__default = $(this).parent().find('input[name="variation_id"]').data('variation_price');

            $(this).parent().parent().find('#variation-price--default').html('$'+variation_price__default);

        });

    }

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
    
    
});