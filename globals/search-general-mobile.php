<div class="w-100 my-search-dropdown-mobile" id="myDropdown-mobile">

    <input type="text" id="searchProductsByName-mobile" onkeyup="filterFunctionMobile()" placeholder="Search products by name" class="w-100 py-2 px-3">

    <button id="search-general-mobile" class="btn btn-dark rounded-0 bg-dark"><i class="fa fa-search" style="right: 1rem;" aria-hidden="true"></i></button>

    <div id="productsListMobile" class="flex-column bg-light border border-top-none align-items-start p-0 bg-white" style="display: none; position: absolute; max-height: 400px; overflow-y: scroll; z-index: 99">
                
    <?php 

        $args = array(

            'post_type' => 'product',
            'posts_per_page' => -1, 
            'post_status' => 'publish',
            'tax_query' => array( array(
                'taxonomy' => 'product_cat',
                'field' => 'id',
                'terms' => array( 348 ), // HERE the product category to exclude: impulse buy category
                'operator' => 'NOT IN',
            ) ),

        );

        $loop = new WP_Query($args);

        while ( $loop->have_posts() ) : $loop->the_post();

            global $product;

            echo '<a href="'.get_permalink().'" class="btn btn-outline-dark border-0 rounded-0 text-left w-100"><img src="'.get_the_post_thumbnail_url($product->ID).'" style="width:40px; height:40px;" class="d-inline-block align-middle mr-2"><p class="d-inline-block align-middle my-0" style="width:calc(100% - 60px);">'.get_the_title().'</p></a>';

        endwhile;

        wp_reset_query();

    ?>

    </div>

    <script>
        function filterFunctionMobile() {	

            document.getElementById('productsListMobile').style.display = 'flex';	

            var input, filter, ul, li, a, i;				

            input = document.getElementById('searchProductsByName-mobile');

            filter = input.value.toUpperCase();				

            div = document.getElementById('myDropdown-mobile');	

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
                                                                                        
                    if ( !$(e.target).hasClass('my-search-dropdown-mobile') ) {
                                                                    
                        $('#productsListMobile').css('display', 'none');
                                                                    
                    }
                                                            
                });

                var maxWidth = $('#myDropdown-mobile').width();

                $('#productsListMobile').css('width', maxWidth);

                $('#search-general-mobile').click( function(){

                    var rawQuery = $('#searchProductsByName-mobile').val();

                    var queryStr = rawQuery.replace(" ", "+");

                    var destinationURL = "https://site.test/shopearthlybody/?s="+queryStr; 

                    window.location.replace(destinationURL);

                    console.log(queryStr);

                } );
                                                        
            });
    </script>

 </div>