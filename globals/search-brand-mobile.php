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

<div class="w-100 my-search-dropdown-brand-mobile px-3" id="myDropdown-brand-mobile">

    <input type="text" id="searchProductsByName-brand-mobile" onkeyup="filterFunctionbrandmobile()" placeholder="Search <?php echo $brand ?> products by name" class="w-100 py-2 px-3">

    <div id="productsListbrand-mobile" class="flex-column bg-light border border-top-none align-items-start p-0 bg-white" style="display: none; position: absolute; max-height: 400px; overflow-y: scroll; z-index: 99">
                
    <?php 

        $args = array(

            'category' => array($brand),
            'numberposts' => -1,

        );

        $products = wc_get_products($args); 

        foreach($products as $product) {
            echo '<a href="'.get_permalink($product->get_id()).'" class="btn btn-outline-dark border-0 rounded-0 text-left w-100">'.$product->get_name().'</a>';
        }

    ?>

    </div>

    <script>
        function filterFunctionbrandmobile() {	

            document.getElementById('productsListbrand-mobile').style.display = 'flex';	

            var input, filter, ul, li, a, i;				

            input = document.getElementById('searchProductsByName-brand-mobile');

            filter = input.value.toUpperCase();				

            div = document.getElementById('myDropdown-brand-mobile');	

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
                                                                                        
                    if ( !$(e.target).hasClass('my-search-dropdown-brand-mobile') ) {
                                                                    
                        $('#productsListbrand-mobile').css('display', 'none');
                                                                    
                    }
                                                            
                });

                var maxWidth = $('#myDropdown-brand-mobile').width();

                $('#productsListbrand-mobile').css('width', maxWidth);
                                                        
            });
    </script>

 </div>