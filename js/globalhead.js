jQuery( document ).ready( function($){

    $( '#mobile-menu-toggle' ).click( function(e){

        $( '.mobile-menu' ).addClass( 'show-mobile-menu' );

    } );

    $( '.top-page-primary-menu .menu-item-has-children a:first-child' ).click( function(event){

        event.preventDefault();

        var hasClass = $(this).parent().hasClass('submenu-opened');

        if ( hasClass == false ) {

            $('.submenu-opened .sub-menu').slideUp();

            $('.submenu-opened').removeClass('submenu-opened');

            $(this).parent().addClass('submenu-opened');

            $(this).parent().find('.sub-menu').slideDown();

        } else {

            $(this).parent().find('.sub-menu').slideUp();

            $(this).parent().removeClass('submenu-opened');

        }

        $(this).parent().find( '.sub-menu .menu-item' ).click( function(event) {

            var url = $(this).parent().find('a').attr('href');

            window.location.replace(url);

        } );

    } );

    $( '.brand-nav-list .has-dropdown' ).click( function(event){

        event.preventDefault();

        var hasClass = $(this).hasClass('opened');

        if ( hasClass == false ) {

            $('.opened .dropdown').slideUp();

            $('.opened').removeClass('opened');

            $(this).addClass('opened');

            $(this).find('.dropdown').slideDown();

        } else {

            $(this).find('.dropdown').slideUp();

            $(this).removeClass('opened');

        }



        $(this).find( '.dropdown .nav-item' ).click( function(event){

            var url = $(this).attr('href');

            window.location.replace(url);

        } );

    } );

    $(document).click(function(event){

        var target = $(event.target);

        if ( !target.closest('.top-page-primary-menu').length ) {

            $('.submenu-opened').find('.sub-menu').slideUp();

            $('.submenu-opened').removeClass('submenu-opened');

        }

        if ( !target.closest('.brand-nav-list').length ) {

            $('.opened').find('.dropdown').slideUp();

            $('.opened').removeClass('opened');

        }

    });

    $( '#close-mobile-menu' ).click( function(e){

        e.preventDefault();

        $( '.mobile-menu' ).removeClass( 'show-mobile-menu' ); 

    } );

    $( '#mobile-shopping-bag, #desktop-shopping-bag' ).click( function(event){

        event.preventDefault();

        $( '#my-minicart' ).css( 'right', '0' );

    } );

    $( '.top-page-primary-menu #shopByProduct .sub-menu #tab-names button ' ).first().addClass('btn-dark');

    $('.top-page-primary-menu #shopByProduct .sub-menu [id^="tab-content__"]').first().removeClass('d-none').addClass('d-flex');

    $('.top-page-primary-menu #shopByProduct .sub-menu #tab-names button').click(function(){

        $('.top-page-primary-menu #shopByProduct .sub-menu #tab-names button.btn-dark').removeClass('btn-dark');

        $(this).addClass('btn-dark');

        var tabName = $(this).data('tab_name');

        $('.top-page-primary-menu #shopByProduct .sub-menu [id^="tab-content__"].d-flex').removeClass('d-flex').addClass('d-none');

        $('.top-page-primary-menu #shopByProduct .sub-menu #tab-content__'+tabName).removeClass('d-none').addClass('d-flex');

    });

    $('.top-page-primary-menu #shopByProduct .sub-menu [id^="tab-content__"]').find('a').click(function(){

        $(this).addClass('bg-light');
        
        var url = $(this).attr('href');

        window.location.replace(url);

    });

    $( window ).scroll( function(){

        var scroll = $(window).scrollTop();

        if ( scroll > 120 ) {

            $( '.top-navbar-mobile' ).addClass( 'topnavbar-fixed shadow' );

            $('.site-logo img').css('maxWidth', '200px');

            $( '.search-bar-mobile' ).hide();

        } else {

            $( '.top-navbar-mobile' ).removeClass( 'topnavbar-fixed shadow' );

            $('.site-logo img').css('maxWidth', '300px');

            $( '.search-bar-mobile' ).show();

        }

    } );

    $( '.cart-single-item .product-quantity' ).next().addClass( 'cart-single-total' );

    $( '.added_to_cart.wc-forward' ).click( function(event){

        event.preventDefault();

    } );

    // Change texts of brand categories in the navigation 

    $( '.brand-nav-list .has-dropdown:first-child' ).find( '.nav-link' ).text( 'Shop Products' );

    $( '.brand-nav-list .has-dropdown:first-child' ).find( '.dropdown .nav-item:last-child p' ).text( 'Shop All' );

    $( '.brand-nav-list .has-dropdown:nth-child(2)' ).find( '.nav-link' ).text( 'Shop By Scent' );

    $( '.brand-nav-list .has-dropdown:nth-child(3)' ).find( '.nav-link' ).text( 'Shop By Category' );

    $( '.showlogin' ).click( function(){

        $(this).find('i').toggleClass( 'arrow-clicked' );

    } );

    // Make divs equal length

    function getEveryDivLength() {

        var theHeights = [];

        $('.products .product').each( function(){

            var height = $(this).height();

            var buttonHeight = $(this).find('.add_to_cart_button').outerHeight();

            var buttonHeightTotal = parseInt(buttonHeight) * 2; 

            var totalHeight = parseInt(height) + buttonHeightTotal + 60; 

            theHeights.push(totalHeight);

        } );

        var maxHeight = Math.max.apply(Math, theHeights);

        $('.products .product').each( function(){
        
            $(this).css('height', maxHeight);
        
        } );

    }

    getEveryDivLength();

    function verticalCenterBrandCaptions() {

        var brandVisible = $('.brand-hero-image:visible');

        var brandHeroHeight = parseInt( brandVisible.height() ); 

        $('.brand-captions').css('height', brandHeroHeight);

    }

    verticalCenterBrandCaptions();

    $('.my-woo-product-tabs .my-woo-tab-control').click(function(){

        if ( $(this).hasClass('active-tab') ) {

            $('.my-woo-product-tabs .active-tab').removeClass('active-tab');

            $(this).parent().find('.my-woo-product-tab-panel').addClass('d-none');

        } else {
            
            $('.my-woo-product-tabs .active-tab').removeClass('active-tab');

            $(this).addClass('active-tab');

            var tabID = $(this).attr('id');

            var tabIDarr = tabID.split("-");

            var index = tabIDarr.length - 1; 

            console.log(index);

            var tabKey = tabIDarr[index];

            var tabContentID = '#my-tab-'+tabKey; 

            $('.my-woo-product-tabs .my-woo-product-tab-panel').addClass('d-none');

            $('.my-woo-product-tabs').find(tabContentID).removeClass('d-none');

        }
        
    });

    $('.coupon-message').click(function(){

        $(this).toggleClass('coupon-clicked');

    });

    $('#toggleMyAccountNav').click(function(){

        $('.woocommerce-MyAccount-navigation').slideToggle();

    });


} );