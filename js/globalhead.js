jQuery( document ).ready( function($){

    var heights = []; 

    $('.products .product').each(function(){

        var height = parseInt( $(this).height() );

        heights.push(height);

    });

    var theMaxHeight = Math.max.apply(Math, heights);

    var maxHeight = theMaxHeight + 80; 

    $('.products .product').each(function(){

        if ( $(this).height() > maxHeight ) {

            maxHeight = $(this).height();

        }

    });

    $('.new-arrival-arrow').css('height', maxHeight).addClass('align-items-center');

    $('.products .product').height(maxHeight);

    $( '#mobile-menu-toggle' ).click( function(e){

        $( '.mobile-menu' ).addClass( 'show-mobile-menu' );

    } );

    $('.new-arrival-arrow').click(function(){

        $('#home-content-wrapper .woocommerce .products .product').toggle();

        $('.new-arrival-arrow').toggleClass('d-flex d-none');

    });

    $( '.top-page-primary-menu .menu-item-has-children' ).click( function(event){

        event.preventDefault();

        $(this).find( '.sub-menu' ).slideToggle();

        $(this).toggleClass( 'submenu-opened' );

        $(this).find( '.sub-menu .menu-item' ).click( function(event) {

            var url = $(this).find('a').attr('href');

            window.location.replace(url);

        } );

    } );

    $( '.brand-nav-list .has-dropdown' ).click( function(event){

        event.preventDefault();

        $(this).find( '.dropdown' ).slideToggle();

        $(this).toggleClass( 'submenu-opened' );

        $(this).find( '.dropdown .nav-item' ).click( function(event){

            var url = $(this).attr('href');

            window.location.replace(url);

        } );

    } );

    $( '#close-mobile-menu' ).click( function(e){

        e.preventDefault();

        $( '.mobile-menu' ).removeClass( 'show-mobile-menu' ); 

    } );

    $( '#mobile-shopping-bag' ).click( function(event){

        event.preventDefault();

        $( '#my-minicart' ).css( 'right', '0' );

    } );

    $( window ).scroll( function(){

        var scroll = $(window).scrollTop();

        if ( scroll > 120 ) {

            $( '.top-navbar-mobile' ).addClass( 'topnavbar-fixed shadow' );

            $( '.search-bar-mobile' ).hide();

        } else {

            $( '.top-navbar-mobile' ).removeClass( 'topnavbar-fixed shadow' );

            $( '.search-bar-mobile' ).show();

        }

    } );

    $( '.cart-single-item .product-quantity' ).next().addClass( 'cart-single-total' );

    $( '.added_to_cart.wc-forward' ).click( function(event){

        event.preventDefault();

    } );

    // Change texts of brand categories in the navigation 

    $( '.brand-nav-list .has-dropdown:first-child' ).find( '.nav-link' ).text( 'Shop Products' );

    $( '.brand-nav-list .has-dropdown:first-child' ).find( '.dropdown .nav-item:last-child' ).text( 'Shop All' );

    $( '.brand-nav-list .has-dropdown:nth-child(2)' ).find( '.nav-link' ).text( 'Shop By Scent' );

    $( '.brand-nav-list .has-dropdown:nth-child(3)' ).find( '.nav-link' ).text( 'Shop By Category' );

    $( '.showlogin' ).click( function(){

        $(this).find('i').toggleClass( 'arrow-clicked' );

    } );


} );