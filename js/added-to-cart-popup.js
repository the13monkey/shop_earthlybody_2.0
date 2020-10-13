jQuery( document ).ready( function($){

    $('.product_type_simple').click(function(){

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

        $('.options.selected').removeClass('selected');

        $(this).addClass('selected');

        var variation_price__selected = $(this).next().data('variation_price');

        var variation_thumb_selected = $(this).next().data('thumb_url');

        $('#variation-price--default').html('$'+variation_price__selected);

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

        var variation_id__default = $('.options.selected').next().data('variation_id');

        $('#variations-content').find('input[value="'+variation_id__default+'"]').parent().find('*').addClass('img-thumbnail-clicked');

        $('#variations-content .img-thumbnail').click(function(){

            $('.img-thumbnail-clicked').removeClass('img-thumbnail-clicked');

            $(this).parent().find('*').addClass('img-thumbnail-clicked');

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

        var variation_price__default = $('.options.selected').parent().find('input[name="variation_id"]').data('variation_price');

        $('#variation-price--default').html('$'+variation_price__default);

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

            $('.my_add_variable').addClass('d-none');

            $('.ready-to-add').removeClass('d-none');


        } else {

            alert('Please choose a size');

        }

    });
    
    
});