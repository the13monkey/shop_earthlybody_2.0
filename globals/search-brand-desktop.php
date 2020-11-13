<?php 

    $currentURL = $_SERVER['REQUEST_URI'];
    
    $currentURL_arr = explode('/', $currentURL);

    if ( (in_array('marrakesh', $currentURL_arr)) || (in_array('marrakesh-hair-care', $currentURL_arr)) ) {

        $brand = "Marrakesh Hair Care";

    }

    if ( (in_array('hempseed', $currentURL_arr)) || (in_array('hemp-seed-body-care', $currentURL_arr)) ) {

        $brand = "Hemp Seed Body Care";

    }

    if ( (in_array('emera', $currentURL_arr)) || (in_array('emera-cbd-hair-care', $currentURL_arr)) ) {

        $brand = "EMERA CBD Hair Care";

    }

    if ( (in_array('cbddaily', $currentURL_arr)) || (in_array('cbd-daily-products', $currentURL_arr)) ) {

        $brand = "CBD Daily Products";

    }

?>

<div class="my-search-dropdown-brand" id="myDropdown-brand">

    <input type="text" id="searchProductsByName-brand" onkeyup="filterFunctionbrand()" placeholder="Search <?php echo $brand ?> store" class="w-100 py-2 px-3" style="border: 2px solid #000;">

    <button id="search-brand-desktop" class="btn btn-dark rounded-0"><i class="fa fa-search" aria-hidden="true"></i></button>

    <div id="productsListbrand" class="flex-column bg-light border border-top-none align-items-start p-0 bg-white" style="display: none; position: absolute; max-height: 400px; overflow-y: scroll; z-index: 99">
                
    <?php 

        $args = array(

            'category' => array($brand),
            'numberposts' => -1, 
            'tax_query' => array( array(
                'taxonomy' => 'product_cat',
                'field' => 'id',
                'terms' => array( 348 ), // HERE the product category to exclude: impulse buy category
                'operator' => 'NOT IN',
            ) ),

        );

        $products = wc_get_products($args); 

        foreach($products as $product) {

            echo '<a href="'.get_permalink($product->get_id()).'" class="btn btn-outline-dark border-0 rounded-0 text-left w-100"><img src="'.wp_get_attachment_url( $product->get_image_id() ).'" style="width:40px; height:40px;" class="d-inline-block align-middle mr-2" /><p class="d-inline-block align-middle my-0" style="width:calc(100% - 60px);">'.$product->get_name().'</p></a>';
        }

    ?>

    </div>

    <script>
        function filterFunctionbrand() {	

            document.getElementById('productsListbrand').style.display = 'flex';	

            var input, filter, ul, li, a, i;				

            input = document.getElementById('searchProductsByName-brand');

            filter = input.value.toUpperCase();				

            div = document.getElementById('myDropdown-brand');	

            a = div.getElementsByTagName('a');
                                                        
            for (i=0; i<a.length; i++) {
                                                            
                txtValue = a[i].textContent || a[i].innerText;
                                                            
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                                    
                        a[i].style.display = "";
                                                                    
                    } else {
                                                                    
                        a[i].style.display = "none";
                                                                    
                    }
                                                            
                }
                                                        
            }
                                                    
            jQuery(document).ready(function($){
                                                        
                $('html').click(function(e){
                                                                                        
                    if ( !$(e.target).hasClass('my-search-dropdown-brand') ) {
                                                                    
                        $('#productsListbrand').css('display', 'none');
                                                                    
                    }
                                                            
                });

                var maxWidth = $('#myDropdown-brand').width();

                $('#productsListbrand').css('width', maxWidth);

                $('#search-brand-desktop').click( function(){

                    var rawQuery = $('#searchProductsByName-brand').val();

                    var queryStr = rawQuery.replace(" ", "+");

                    var destinationURL = "https://site.test/shopearthlybody/?s="+queryStr; 

                    window.location.replace(destinationURL);

                } );
                                                        
            });
    </script>

 </div>