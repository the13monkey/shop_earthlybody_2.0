<?php 
/*
** Template Name: EBM Single Brand Page
*/
    get_header();

    $brands = array(

        'cbddaily' => array( 'Hair Care', 'Original Strength', 'Triple Strength', 'Ultra Care' ),

        'marrakesh' => array( 'Color Care', 'Fine Hair', 'Hydration', 'Men', 'Smoothing', 'Styling' ),

        'hempseed' => array( 'Body Care', 'Hair Care', 'Hemp Seed By Night', 'Miracle Oil' ),

    );

    $categories = array(

        'cbddaily' => 'CBD Daily Products', //17,

        'marrakesh' => 'Marrakesh Hair Care', //20,

        'hempseed' => 'Hemp Seed Body Care', //19, 

        'emera' => 'EMERA CBD Hair Care', //16,

    );

?>

<div class="container-fluid">

    <div class="row px-2 my-3">

        <img class="img-fluid w-100" src="<?php echo get_template_directory_uri() ?>/img/new_brands/<?php echo $name; ?>-bg-md.jpg" />

    </div>

    <div class="row my-3 mx-0 justify-content-center py-3 border-top border-bottom">

        <h4 class="mb-0 font-weight-normal text-uppercase icon-<?php echo $name; ?>">Best Sellers</h4>

    </div>

    <div class="row px-2 brand-landing-featured">
        
        <?php 

            foreach ( $categories as $category => $category_name ) {

                if ( $name == $category ) {

                    $cat_name = $category_name; 

                }

            }
        
            $args = array(

                'featured' => true,

                'category' => $cat_name,

                'limit' => 4,

            );

            $products = wc_get_products( $args );

            global $post; 

            woocommerce_product_loop_start();

            foreach ($products as $product) {

                $post = get_post($product->get_id());

                setup_postdata($post);

                wc_get_template_part('content', 'product');

            }
            wp_reset_postdata();

            woocommerce_product_loop_end();

        ?>

    </div>

    <?php if ( $name !== "emera" ) : ?>

        <div class="row px-2 justify-content-center mb-2">

            <h4 class="font-weight-normal text-uppercase icon-<?php echo $name; ?>">Shop by Category</h4>

        </div>

    <?php endif; ?>

    <div class="row pl-2" style="overflow-x: scroll; overflow-y: hidden;">

        <div class="d-flex pr-2" style="width:1000px;">

            <?php 
            
                foreach( $brands as $brand => $cats ) {

                    if ( $name == $brand ) {

                        foreach ( $cats as $cat ) { ?>

                            <div style="width: 250px;">
                            
                                <img src="<?php echo get_template_directory_uri() ?>/img/new_images/cats/<?php echo $name ?>-<?php echo $cat ?>.jpg" class="w-100 img-fluid" alt="<?php echo get_bloginfo( 'name' ) ?>" >

                                <p class="text-center mt-2 font-weight-light text-uppercase"><?php echo $cat; ?></p>

                            </div>
                            
                    <?php 
                        }

                    }

                }
            ?>

        </div>

    </div>

    <div class="row px-2 my-3">
    
        <div style="width:20%;">

            <img src="<?php echo get_template_directory_uri() ?>/img/new_images/Icon-CrueltyFree.svg" class="rounded-circle">

            <p class="text-center" style="font-size: 0.75rem;">Cruelty-Free & 100% Vegan</p>

        </div>

        <div style="width:20%;">
        
            <img src="<?php echo get_template_directory_uri() ?>/img/new_images/Icon-Solar.svg" class="rounded-circle">

            <p class="text-center" style="font-size: 0.75rem;">Made with Solar Powered Energy</p>

        </div>

        <div style="width:20%;">
        
            <img src="<?php echo get_template_directory_uri() ?>/img/new_images/Icon-Natural.svg" class="rounded-circle">

            <p class="text-center" style="font-size: 0.75rem;">Naturally-Derived Ingredients</p>

        </div>

        <div style="width:20%;">
        
            <img src="<?php echo get_template_directory_uri() ?>/img/new_images/Icon-Charity.svg" class="rounded-circle">

            <p class="text-center" style="font-size: 0.75rem;">A portion of Every Sale is Donated to Our Nonprofit</p>

        </div>

        <div style="width:20%;">
        
            <img src="<?php echo get_template_directory_uri() ?>/img/new_images/Icon-Pollution.jpg" class="img-thumbnail border-0">

            <p class="text-center" style="font-size: 0.75rem;">Member of Plastic Poluttion Coalition</p>

        </div>

    </div>

</div>
    
<?php 

    get_footer(); 
    
?>

