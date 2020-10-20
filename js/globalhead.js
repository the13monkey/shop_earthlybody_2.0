jQuery( document ).ready( function($){

    $( '#mobile-menu-toggle' ).click( function(e){

        $( '.mobile-menu' ).addClass( 'show-mobile-menu' );

    } );

    $('.new-arrival-arrow').click(function(){

        $('#home-content-wrapper .woocommerce .products .product').toggle();

        $('.new-arrival-arrow').toggleClass('d-flex d-none');

    });

    $( '.top-page-primary-menu .menu-item-has-children' ).click( function(event){

        event.preventDefault();

        var hasClass = $(this).hasClass('submenu-opened');

        if ( hasClass == false ) {

            $('.submenu-opened .sub-menu').slideUp();

            $('.submenu-opened').removeClass('submenu-opened');

            $(this).addClass('submenu-opened');

            $(this).find('.sub-menu').slideDown();

        } else {

            $(this).find('.sub-menu').slideUp();

            $(this).removeClass('submenu-opened');

        }

        $(this).find( '.sub-menu .menu-item' ).click( function(event) {

            var url = $(this).find('a').attr('href');

            window.location.replace(url);

        } );

    } );

    $(document).click(function(event){

        var target = $(event.target);

        if ( !target.closest('.top-page-primary-menu').length ) {

            $('.submenu-opened').find('.sub-menu').slideUp();

            $('.submenu-opened').removeClass('submenu-opened');

        }

    });

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

    $( '#mobile-shopping-bag, #desktop-shopping-bag' ).click( function(event){

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

    // Make divs equal length

    function getEveryDivLength() {

        var theHeights = [];

        $('#home-new-arrival .products .product').each( function(){

            var height = $(this).height();

            var buttonHeight = $(this).find('.add_to_cart_button').outerHeight();

            var buttonHeightTotal = parseInt(buttonHeight) * 2; 

            var totalHeight = parseInt(height) + buttonHeightTotal + 60; 

            theHeights.push(totalHeight);

        } );

        var maxHeight = Math.max.apply(Math, theHeights);

        $('#home-new-arrival .products .product').each( function(){
        
            $(this).css('height', maxHeight).addClass('bg-light');
        
        } );

    }

    getEveryDivLength();

} );