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
    
        });

        $('#continue-shopping-button').click(function(){

            $('#added-cart-popup').css('display', 'none');
    
            clearInterval(myInterval);

        });

    });

    $('.my_add_variable').click( function(e){

        e.preventDefault();

        var variations = $(this).parent().find('.variations');

        var variations_array = [];

        $.each( variations, function(index, item) {

            variations_array.push( { variationID: $(item).data('variation_id'), variationName: $(item).data('variation_name'), variationThumbURL: $(item).data('thumb_url') } );

        }) 

        var i;

        for( i=0; i< variations_array.length; i++) {

            var variation_id = variations_array[i]['variationID'];

            var variation_thumb_url = variations_array[i]['variationThumbURL'];

            var variation_name = variations_array[i]['variationName'];

            var width = Math.floor(100/3); 

            $('#variations-content').append(`<div style="width:${width}%"><img class="img-thumbnail rounded-0" style="border-radius:0px!important;" src="${variation_thumb_url}" alt="Shop Earthly Body"/><p class="text-center">${variation_name}</p><input type="hidden" value="${variation_id}"></div>`);

        }

        $('#add-variable-to-cart').css('display', 'flex');

        $('#variations-content .img-thumbnail').click(function(){

            $('.img-thumbnail-clicked').removeClass('img-thumbnail-clicked');

            $(this).addClass('img-thumbnail-clicked');

        });

        $('#confirm-size').click(function(){

            // check if size is selected

            var length = $('.img-thumbnail-clicked').length;

            if (length > 0) {

                var variation_id = $('.img-thumbnail-clicked').parent().find('input').val();

                $('#variations-content').addClass('d-none');

                $('#confirm-size').addClass('d-none');

                $('#upsells-content').removeClass('d-none');

                $('#go-checkout').removeClass('d-none');

                $('#action-buttons').addClass('mt-n5');

            } else {

                alert('Please choose a size');

            }

        });

        $('#close-add-variable-to-cart').click(function(){

            $('#add-variable-to-cart').css('display', 'none');
            
            $('#variations-content').html('');

            $('.img-thumbnail-clicked').removeClass('img-thumbnail-clicked');

            $('#variations-content').removeClass('d-none');

            $('#confirm-size').removeClass('d-none');

            $('#upsells-content').addClass('d-none');

            $('#go-checkout').addClass('d-none');

            $('#action-buttons').removeClass('mt-n5');

            // clearInterval(myInterval);
    
        });

        $('#cancel-purchase').click(function(){

            $('#add-variable-to-cart').css('display', 'none');

            $('#variations-content').html('');

            $('.img-thumbnail-clicked').removeClass('img-thumbnail-clicked');

            $('#variations-content').removeClass('d-none');

            $('#confirm-size').removeClass('d-none');

            $('#upsells-content').addClass('d-none');

            $('#go-checkout').addClass('d-none');

            $('#action-buttons').removeClass('mt-n5');

           // clearInterval(myInterval);

        });

    } );
    
    
});