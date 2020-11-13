<?php get_header(); ?>

    <?php 

        //Copy and paste woocommerce_content() 
        if ( is_singular( 'product' ) ) {

            do_action( 'woocommerce_before_main_content' );

            while ( have_posts() ) :

                the_post();

                wc_get_template_part( 'content', 'single-product' );

            endwhile;


        } elseif ( is_product_category( array( 'Shop By Scent', 'Shop Fragrances', 'Fragrances', 'Our Fragrances', 'Shop by Fragrance' ) ) ) { 

            wc_get_template_part( 'archive', 'fragrance' );

        } elseif ( is_product_category( 'Hand &amp; Body Lotions' ) ) {

            wc_get_template_part( 'archive', 'filters' );

        } else {

            wc_get_template_part( 'archive', 'product' );

        }

        
        
    ?>


<?php get_footer(); ?>
