<div class="w-100 woo-slides-container text-center p-1 bg-danger">

    <h7 class="text-light">Free Shipping over $30</h7>

    <h7 class="text-light">Join Mailing List & Get 25% Off</h7>

</div>

<script type="text/javascript">

    jQuery( document ).ready( function($){

        $( '.woo-slides-container h7' ).hide();
        
        $( '.woo-slides-container h7:first-child' ).addClass( 'active' ).slideDown();

        setInterval( function() {

            if ( $( '.woo-slides-container .active' ).is( ':last-child' ) ) {

                $( '.woo-slides-container .active' ).addClass( 'prev' ).hide();

                $( '.woo-slides-container h7' ).first().removeClass('prev').addClass( 'active' ).slideDown();

            } else {

                $( '.woo-slides-container .active' ).addClass( 'prev' ).hide();

                $( '.woo-slides-container .active' ).next().removeClass('prev').addClass( 'active' ).slideDown();

            }

            $( '.prev' ).removeClass( 'active' ).hide();

        } , 2000 );

    } );

</script>