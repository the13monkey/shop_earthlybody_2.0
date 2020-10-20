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

    $titles = array(

        'cbddaily' => array(

            'title' => 'Your best days start with cbd',

            'subtitle' => 'The #1 CBD brand choice of beauty professionals to soothe, moisturize, and ease discomforts',

        ),

        'marrakesh' => array(

            'title' => 'The Best Hair Days Smell Good Too',

            'subtitle' => 'Professional hair care infused with argan & hemp seed oil and enticing fragrances',

        ),

        'hempseed' => array(

            'title' => 'Products Inspired by Nature',

            'subtitle' => 'Hemp-based, uniquely scented body care made from high-quality, natural ingredients',

        ),

        'emera' => array(

            'title' => 'Scalp & Hair Care Powered By CBD',

            'subtitle' => 'The first professional CBD hair care line for optimal scalp and hair health',

        ),

    );

?>

<div class="container-fluid">

    <div class="row px-2 my-3">

        <img class="img-fluid w-100 brand-hero-image d-block d-lg-none" src="<?php echo get_template_directory_uri() ?>/img/new_brands/<?php echo $name; ?>-bg-md.jpg" />

        <img class="img-fluid w-100 brand-hero-image d-none d-lg-block" src="<?php echo get_template_directory_uri() ?>/img/new_brands/<?php echo $name; ?>-bg-lg.jpg" />

        <div class="brand-captions d-flex justify-content-center flex-column brand-captions-<?php echo $name; ?>">

            <h1 class="font-weight-light text-uppercase"><?php echo $titles[$name]['title']; ?></h1>
            
            <hr class="mt-0 mb-2">

            <h2><?php echo $titles[$name]['subtitle'] ?></h2>

        </div>

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

                'limit' => 12,

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

    <div class="row pl-2 brand-category-row px-lg-5 mx-xl-5">

        <div class="d-flex pr-2 brand-category-innerrow">

            <?php 
            
                foreach( $brands as $brand => $cats ) {

                    if ( $name == $brand ) {

                        foreach ( $cats as $cat ) { ?>

                            <div class="brand-single-category">
                            
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

    <div class="row px-2 justify-content-center mt-5 mb-3">

        <h4 class="font-weight-normal text-uppercase icon-<?php echo $name; ?>">We Are Earthly-Friendly</h4>

    </div>

    <?php get_template_part( 'globals/row', 'icons'); ?>

</div>
    
<?php 

    get_footer(); 
    
?>

