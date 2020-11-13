<?php 

/**
 * Theme Setup
 */

function my_login_logo () { 

	// Change WP login logo

	?>

    <style type="text/css"> 
    	
    	body.login div#login h1 a {

            background-image: url(https://shop.earthlybody.com/wp-content/themes/ebmarketplace/img/site/ebshop_icon.svg);  

            background-size: 60px 60px; 

        } 

    </style>

<?php 

} 

add_action( 'login_enqueue_scripts', 'my_login_logo' );


function my_theme_scripts () {

	// Add following scripts to <head>

	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', false, '', 'all' );

  wp_enqueue_style( 'globalhead', get_template_directory_uri().'/css/globalhead.css', false, '', 'all' );

  wp_enqueue_style( 'addedtocartpopupcss', get_template_directory_uri().'/css/added-to-cart-popup.css', false, '', 'all' );

  wp_enqueue_script( 'globalheadjs', get_template_directory_uri() . '/js/globalhead.js', array( 'jquery' ), '1.0.0', true );

  wp_enqueue_script( 'addedtocartpopupjs', get_template_directory_uri() . '/js/added-to-cart-popup.js', array( 'jquery' ), '1.0.0', true );

}

add_action( 'wp_enqueue_scripts', 'my_theme_scripts' ); 

function register_theme_menus () { 

  // Register theme menu

  register_nav_menus (

      array (
          'primary-menu' => __( 'Primary Menu' ),
      )

  );

}
add_action( 'init', 'register_theme_menus' );


function woocommerce_theme_setup () { 
  // Set WooCommerce theme support: remove WooCommerce default CSS

  add_theme_support( 'woocommerce' );

  add_theme_support( 'wc-product-gallery-slider' );

  // add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

}

add_action( 'after_setup_theme', 'woocommerce_theme_setup' );

function place_tracking_codes_head () { ?>

	<!-- Global site tag (gtag.js) - Google Analytics -->

        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-137898394-4"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-137898394-4');
        </script>
 
    <!-- Global site tag (gtag.js) - Google Ads: 778357835 -->

        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-778357835"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'AW-778357835');
        </script>

        <meta name="google-site-verification" content="eWq0tjK7MxSO0bs64lBy7aCOpVv_xFk2H6BzpcjkY38" />

    <!-- Facebook Pixel Code -->

        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '975935092922711');
        fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=975935092922711&ev=PageView&noscript=1"
        /></noscript>

<?php 

}

add_action( 'wp_head', 'place_tracking_codes_head' ); 

/**
 * WooCommerce Related Functions
 */

// Add added to cart popup to wp_footer 
function add_added_to_cart_popup() {

  include('added-to-cart-popup.php'); //Simple add to cart loop button

  include('add-variable-to-cart.php'); //Variable add to cart loop button

  include('buy-now.php'); //Simple buy loop button

  include('buy-variable-now.php'); //Variable buy now loop button

}

add_action( 'wp_footer', 'add_added_to_cart_popup' );

// Custom star rating 
function woocommerce_template_loop_rating () { //Customize star rating
  global $product; 
  $average = $product->get_average_rating();
  $process = explode( '.', $average );
  $num1 = $process[0];
  $num2 = $process[1];
  $root_url = get_template_directory_uri();	

  if ( $num1 == 0 ) {
      $output = "Be the first to rate this product!";
      $html = '<div class="my-loop-rating row justify-content-center my-2 py-2 text-brown border-top border-bottom mx-1"><span style="font-size: 0.85rem; margin-top:0; margin-bottom: 0; text-align: center; line-height: 0.85rem;">'. $output .'</span></div>';
      echo $html; 
  } else if ( $num1 == 5 ) {
      $html = '<div class="my-loop-rating row justify-content-center my-2 py-0">';
      for ( $i = 0; $i < $num1; $i++ ) {
          $star = '<img src="'. $root_url .'/img/site/star-solid.svg" style="width: 16px; height: 16px;" alt="Shop Earthly Body" />';
          $html .= $star; 
      }
      echo $html.'</div>'; 
  } else {
      $html = '<div class="my-loop-rating row justify-content-center my-2 py-0">';
      $rest = 5 - $num1; 
      for ( $i = 0; $i < $num1; $i++ ) {
          $star = '<img src="'. $root_url .'/img/site/star-solid.svg" style="width: 16px; height: 16px;" alt="Shop Earthly Body" />';
          $html .= $star; 
      }
  if ( $num2 > 50 ) {
    for ( $j = 0; $j < $rest; $j ++ ) {
            $hollow = '<img src="'. $root_url .'/img/site/star-solid.svg" style="width: 16px; height: 16px;" alt="Shop Earthly Body" />';
            $html .= $hollow;
        }
  } else if ( $num2 > 0 && $num2 <= 50 ) {
    for ( $j = 0; $j < $rest; $j ++ ) {
            $hollow = '<img src="'. $root_url .'/img/site/star-half.svg" style="width: 16px; height: 16px;" alt="Shop Earthly Body" />';
            $html .= $hollow;
        }
  } else {
    for ( $j = 0; $j < $rest; $j ++ ) {
            $hollow = '<img src="'. $root_url .'/img/site/star-outline.svg" style="width: 16px; height: 16px;" alt="Shop Earthly Body" />';
            $html .= $hollow;
        }
  }
      echo $html.'</div>';
  }
}

/**
 * Display free shipping in loop if available 
 */
function my_woocommerce_free_shipping_sign () {

  global $product; 

  $product_id = $product->get_id();

  $shipping_class = $product->get_shipping_class();

  if ( $shipping_class == 'free-shipping' ) {
    
      echo '<p class="text-success text-uppercase font-weight-bold text-center">Free Shipping</p>';

  }

}
add_action( 'woocommerce_after_shop_loop_item_title', 'my_woocommerce_free_shipping_sign', 15 );

/**
 * Display total cart items after it's added to cart
 */
function show_item_number ( $fragments ) {

  ob_start(); 

  echo '<span class="cart-items-count px-2 text-dark">';

    $item_count = WC()->cart->get_cart_contents_count();

    if ( $item_count !== 0 ) {

      echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); 

    }

  echo '</span>';

  $fragments['span.cart-items-count'] = ob_get_clean();

  return $fragments;

}
add_filter( 'woocommerce_add_to_cart_fragments', 'show_item_number' );

add_filter( 'woocommerce_add_to_cart_fragments', function($fragments) {

  ob_start();
  ?>

  <div class="custom-minicart" id="my-minicart">

      <?php woocommerce_mini_cart() ?>

  </div>

  <?php $fragments['div.custom-minicart'] = ob_get_clean(); 

  return $fragments;

} );

add_filter( 'woocommerce_add_to_cart_fragments', function($fragments) {

  ob_start();
  ?>

    <div id="cart-content-popup-items" class="row justify-content-between align-items-center p-3 bg-light">
    
      <h6 class="text-uppercase font-weight-light">
        Items in your bag: <?php echo WC()->cart->get_cart_contents_count(); ?>
      </h6>

      <h6 class="text-uppercase font-weight-bold">
        Subtotal: <?php echo WC()->cart->get_cart_subtotal(); ?>
      </h6>
    
    </div>      

  <?php $fragments['div#cart-content-popup-items'] = ob_get_clean(); 

  return $fragments;

} );

function mini_cart_free_shipping() {

  if ( sizeof( WC()->cart->get_cart() ) > 0 ) {

    $subtotal = WC()->cart->cart_contents_total;

    $amount = floatval($subtotal);

    if ( $amount < 30 ) {

      $number = 30 - $amount; 

      $result = number_format( $number, 2, );

      echo "<p class='alert alert-success rounded-0 text-left'>You're $". $result ." away from Free Shipping.</p>";

    } else {

      echo "<p class='alert alert-success rounded-0 text-left'>Enjoy Free Shipping on this order.</p>";

    }

  }

}
add_action( 'woocommerce_before_mini_cart_contents', 'mini_cart_free_shipping' );

function remove_default_mini_cart_buttons() {

  remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10 );

  remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 20 );

}
add_action( 'woocommerce_widget_shopping_cart_buttons', 'remove_default_mini_cart_buttons', 1 );

add_action( 'woocommerce_widget_shopping_cart_buttons', 'my_widget_shopping_cart_button_view_cart', 10 );

add_action( 'woocommerce_widget_shopping_cart_buttons', 'my_widget_shopping_cart_button_checkout', 20 );


function my_widget_shopping_cart_button_view_cart() {

  echo "<a href='#' class='btn btn-dark rounded-0 text-white' onclick='closeMiniCart(event)'>Continue Shopping</a>";

}

function my_widget_shopping_cart_button_checkout() {

  echo "<a href='".wc_get_cart_url()."' class='btn bg-brown rounded-0 text-white' id='mini-cart-checkout-btn'>Check Out</a>";;

}

function add_plus_to_qty_input () { // Add plus to global/quantity-input.php AKA woocommerce_quantity_input() function
	$html = '<input type="button" value="-" class="minus">';
    echo $html;
}
add_action( 'woocommerce_before_quantity_input_field', 'add_plus_to_qty_input' );

function add_minus_to_qty_input () { // Add minus to global/quantity-input.php AKA woocommerce_quantity_input() function
	$html = '<input type="button" value="+" class="plus">';
    echo $html; 
}
add_action( 'woocommerce_after_quantity_input_field', 'add_minus_to_qty_input' );


add_action( 'wp_footer', 'bbloomer_add_cart_quantity_plus_minus' );

function bbloomer_add_cart_quantity_plus_minus() {

  if (is_product()) {
  
  ?>
    <script type="text/javascript">
          
      jQuery(document).ready(function($){   
        
        $('form.cart').on( 'click', 'input.plus, input.minus', function() {
  
            // Get current quantity values
            var qty = $( this ).closest( 'form.cart' ).find( '.qty' );
            var val   = parseFloat(qty.val());
            var max = parseFloat(qty.attr( 'max' ));
            var min = parseFloat(qty.attr( 'min' ));
            var step = parseFloat(qty.attr( 'step' ));
  
            // Change the value if plus or minus
            if ( $( this ).is( '.plus' ) ) {
                if ( max && ( max <= val ) ) {
                  qty.val( max );
                } else {
                  qty.val( val + step );
                }
            } else {
                if ( min && ( min >= val ) ) {
                  qty.val( min );
                } else if ( val > 1 ) {
                  qty.val( val - step );
                }
            }
              
        }); 
          
      });

    </script>
  <?php
  }

  if (is_cart()) {

  ?>

    <script type="text/javascript">
  
      jQuery(document).ready(function($){   
        
        $('form.woocommerce-cart-form').on( 'click', 'input.plus, input.minus', function() {

            $('input[type="number"]').css('cursor', 'no-drop');
  
            // Get current quantity values
            var qty = $( this ).closest( 'form.woocommerce-cart-form' ).find( '.qty' );
            var val   = parseFloat(qty.val());
            var max = parseFloat(qty.attr( 'max' ));
            var min = parseFloat(qty.attr( 'min' ));
            var step = parseFloat(qty.attr( 'step' ));
  
            // Change the value if plus or minus
            if ( $( this ).is( '.plus' ) ) {
                if ( max && ( max <= val ) ) {
                  qty.val( max ).change();
                } else {
                  qty.val( val + step ).change();
                }
            } else {
                if ( min && ( min >= val ) ) {
                  qty.val( min ).change();
                } else if ( val > 1 ) {
                  qty.val( val - step ).change();
                }
            }

            //Auto-update
            
            $('button[name="update_cart"]').trigger('click');
              
        }); 
          
      });

    </script>

  <?php
  }
}

// Display $0.00 when at free shipping class
function bbloomer_add_0_to_shipping_label( $label, $method ) { 

  if ( ! ( $method->cost > 0 ) ) {
      $label .= ': ' . wc_price(0);
  } 
  return $label;

}

add_filter( 'woocommerce_cart_shipping_method_full_label', 'bbloomer_add_0_to_shipping_label', 10, 2 );

/**
 * Hide shipping rates when free shipping is available.
 * Updated to support WooCommerce 2.6 Shipping Zones.
 *
 * @param array $rates Array of rates found for the package.
 * @return array
 */
function my_hide_shipping_when_free_is_available( $rates ) {
	$free = array();
	foreach ( $rates as $rate_id => $rate ) {
		if ( 'free_shipping' === $rate->method_id ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}
	return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );

/**
 * Dictate cart page cross-sells
 */
function woocommerce_cross_sell_display () {

  global $woocommerce; 

  $cross_sell_products_id = [12833, 12836, 12841, 12846, 12849, 12852, 12855, 12858, 12861, 12864, 12867, 12870, 12873, 12877, 12881, 12884, 12887, 12890, 12894, 12897, 12900, 12903, 12906, 12909, 12914, 12917];

  shuffle( $cross_sell_products_id );

  $product_ids = [];

  for ($i = 0; $i < 4; $i++) {

    $_product_id = $cross_sell_products_id[$i];

    array_push( $product_ids, $_product_id );

  }

  $str = implode( ",", $product_ids );

  echo '<h6 class="text-center mt-5 mb-3 text-uppercase">Wait! Don\'t Forget</h6>';

  echo do_shortcode( '[products ids='.$str.']' );

}

/**
 * Automatically Update Cart on Quantity Change - WooCommerce
 */
 
add_action( 'wp_footer', 'bbloomer_cart_refresh_update_qty' ); 
 
function bbloomer_cart_refresh_update_qty() {

   if (is_cart()) {

      ?>
      <script type="text/javascript">

         jQuery('div.woocommerce').on('click', 'input.qty', function(){
            jQuery("[name='update_cart']").trigger("click");
         });
      
      </script>

      <?php
   }

}

remove_action( 'woocommerce_cart_is_empty', 'wc_empty_cart_message', 10 );

function my_empty_cart_message() {

  echo "<div class='row justify-content-center m-3 px-3 border-bottom pb-3'>";

    echo "Your Shopping Bag is Empty";

  echo "</div>";

}

add_action( 'woocommerce_cart_is_empty', 'my_empty_cart_message', 10 );

add_action( 'woocommerce_cart_is_empty', 'woocommerce_cross_sell_display', 12 );

// Only show primary category in breadcrumb 

function remove_breadcrumb_from_before_shop () { 
  
  // Unhook breadcrumb from before shop content 
  remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

}

add_action( 'woocommerce_before_main_content', 'remove_breadcrumb_from_before_shop', 5 );

//add_action( 'woocommerce_before_single_product_summary', 'woocommerce_breadcrumb', 5 );

function my_yoast_breadcrumb () {

	if ( is_product() ) {

		if ( function_exists( 'yoast_breadcrumb' ) ) {

      yoast_breadcrumb( '<p id="breadcrumb">','</p>' );
      
    }
    
  }
  
}

add_action( 'woocommerce_before_single_product_summary', 'my_yoast_breadcrumb', 5 );

// Remove single product meta tags

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

// Remove single product related products (cross-sells)

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

// Remove WooCommerce sidebar from the catelogue page 

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

// Open ship to a different address by default 

//add_filter( 'woocommerce_ship_to_different_address_checked', '__return_true' );

function checkout_progress_flow() {

  echo "<div class='container'>";

    echo "<div class='row justify-content-center'>";

      echo "<div class='text-left my-4'>
              <div class='d-flex justify-content-center align-items-center'>
                <span class='btn btn-dark rounded-circle' style='font-size:0.75rem;padding-left:0.75rem;padding-right:0.75rem;'>1</span>
                <span style='width:4rem;height:2px;' class='bg-dark'></span>
              </div>
              <span style='font-size:0.7rem;'>Shipping</span>
            </div>";

      echo "<div class='text-left my-4'>
              <div class='d-flex justify-content-center align-items-center'>
                <span class='btn btn-outline-dark rounded-circle' style='font-size:0.75rem;padding-left:0.75rem;padding-right:0.75rem;'>2</span>
                <span style='width:4rem;height:2px;' class='bg-secondary'></span>
              </div>
              <span style='font-size:0.7rem;'>Billing</span>
            </div>";

      echo "<div class='text-left my-4'>
              <div class='d-flex justify-content-center align-items-center'>
                <span class='btn btn-outline-dark rounded-circle' style='font-size:0.75rem;padding-left:0.75rem;padding-right:0.75rem;'>3</span>
              </div>
              <span style='font-size:0.7rem;'>Review</span>
            </div>";

    echo "</div>";

  echo "</div>";

}

// add_action( 'woocommerce_before_checkout_form', 'checkout_progress_flow', 1 );

// Hide order notes section from checkout page 

add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );

// Remove have a coupon? from checkout page 

// remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );


 // Remove default state 

add_filter( 'default_checkout_billing_state', 'change_default_checkout_state' );

add_filter( 'default_checkout_shipping_state', 'change_default_checkout_state' );

function change_default_checkout_state() {

    return ''; //set state code if you want to set it otherwise leave it blank.

}

// Change default log in option @checkout page 

add_filter( 'woocommerce_checkout_login_message', 'mycheckoutmessage_return_customer_message' );
 
function mycheckoutmessage_return_customer_message() {

  return '<h5 class="login-message text-dark font-weight-bold text-uppercase mb-0">Sign in for faster checkout</h5>';

}

// To change add to cart text on single product page

add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 

function woocommerce_custom_single_add_to_cart_text() {

    return __( 'Add to bag', 'woocommerce' ); 

}

// To change add to cart text on product archives(Collection) page
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );  

function woocommerce_custom_product_add_to_cart_text() {

    return __( 'Add to bag', 'woocommerce' );

}

// Add Size Attribute image and details to product loop 

function add_attributes_to_product_loop () {

    global $product; 

    if( $product->is_type( 'variable' ) ) {

      $variation_ids = $product->get_children();

      echo '<div class="w-100 d-flex justify-content-center my-3" id="options-row">';

      foreach ( $variation_ids as $variation_id ) {

        $variation = new WC_Product_Variation( $variation_id );
        
        $thumb_id = $variation->get_image_id();

        $thumb_url = wp_get_attachment_url( $thumb_id, 'thumbnail' );

        $variation_name = $variation->get_name();

        $variation_price = $variation->get_price();

        $variation_name_array = explode('-', $variation_name);

        $count = count( $variation_name_array );

        $attribute_value = $variation_name_array[ $count - 1 ];

        echo '<button class="options">'.$attribute_value.'</button>';

        echo '<input class="variations" type="hidden" name="variation_id" data-variation_id="'.$variation_id.'" data-variation_name="'.$attribute_value.'" data-thumb_url="'.$thumb_url.'" data-variation_price="'.$variation_price.'">';

      }

      echo '</div>';

      echo '<div class="row justify-content-center my-2 py-0>
              <span class="price">
                <span class="woocommerce-Price-amount amount" id="variation-price--default"></span>
              </span>
            </div>';

    }

}

add_action( 'woocommerce_after_shop_loop_item', 'add_attributes_to_product_loop', 3 );

/**
 * Display all products on the same archive page 
 */ 
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {   
  // Return the number of products you wanna show per page.
  $cols = -1;
  return $cols;
}

/**
 * Remove "Description" Heading Title @ WooCommerce Single Product Tabs
 */
add_filter( 'woocommerce_product_description_heading', '__return_null' );

/** 
 * remove on single product panel 'Additional Information' since it already says it on tab.
 */
add_filter('woocommerce_product_additional_information_heading', 'isa_product_additional_information_heading');
 
function isa_product_additional_information_heading() {
    echo '';
}

add_filter ( 'woocommerce_account_menu_items', 'misha_remove_my_account_links' );
function misha_remove_my_account_links( $menu_links ){
  
	unset( $menu_links['downloads'] ); // Disable Downloads
 
	return $menu_links;
 
}

/**
 * Get rid of archive page system default tags 
 */

function my_theme_archive_title( $title ) {
  if ( is_category() ) {
      $title = single_cat_title( '', false );
  } elseif ( is_tag() ) {
      $title = single_tag_title( '', false );
  } elseif ( is_author() ) {
      $title = '<span class="vcard">' . get_the_author() . '</span>';
  } elseif ( is_post_type_archive() ) {
      $title = post_type_archive_title( '', false );
  } elseif ( is_tax() ) {
      $title = single_term_title( '', false );
  }

  return $title;
}

add_filter( 'get_the_archive_title', 'my_theme_archive_title' );

/**
 * Add multiple product to cart with URL 
 */
function woocommerce_maybe_add_multiple_products_to_cart() {
  // Make sure WC is installed, and add-to-cart qauery arg exists, and contains at least one comma.
  if ( ! class_exists( 'WC_Form_Handler' ) || empty( $_REQUEST['add-to-cart'] ) || false === strpos( $_REQUEST['add-to-cart'], ',' ) ) {
      return;
  }

  remove_action( 'wp_loaded', array( 'WC_Form_Handler', 'add_to_cart_action' ), 20 );

  $product_ids = explode( ',', $_REQUEST['add-to-cart'] );
  $count       = count( $product_ids );
  $number      = 0;

  foreach ( $product_ids as $product_id ) {
      if ( ++$number === $count ) {
          // Ok, final item, let's send it back to woocommerce's add_to_cart_action method for handling.
          $_REQUEST['add-to-cart'] = $product_id;

          return WC_Form_Handler::add_to_cart_action();
      }

      $product_id        = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $product_id ) );
      $was_added_to_cart = false;

      $adding_to_cart    = wc_get_product( $product_id );

      if ( ! $adding_to_cart ) {
          continue;
      }

      if ( $adding_to_cart->is_type( 'simple' ) ) {

          // quantity applies to all products atm
          $quantity          = empty( $_REQUEST['quantity'] ) ? 1 : wc_stock_amount( $_REQUEST['quantity'] );

          $passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity );

          if ( $passed_validation && false !== WC()->cart->add_to_cart( $product_id, $quantity ) ) {
              wc_add_to_cart_message( array( $product_id => $quantity ), true );
          }

      } else {

          $variation_id       = empty( $_REQUEST['variation_id'] ) ? '' : absint( wp_unslash( $_REQUEST['variation_id'] ) );
          $quantity           = empty( $_REQUEST['quantity'] ) ? 1 : wc_stock_amount( wp_unslash( $_REQUEST['quantity'] ) ); // WPCS: sanitization ok.
          $missing_attributes = array();
          $variations         = array();
          $adding_to_cart     = wc_get_product( $product_id );

          if ( ! $adding_to_cart ) {
            continue;
          }

          // If the $product_id was in fact a variation ID, update the variables.
          if ( $adding_to_cart->is_type( 'variation' ) ) {
            $variation_id   = $product_id;
            $product_id     = $adding_to_cart->get_parent_id();
            $adding_to_cart = wc_get_product( $product_id );

            if ( ! $adding_to_cart ) {
              continue;
            }
          }

          // Gather posted attributes.
          $posted_attributes = array();

          foreach ( $adding_to_cart->get_attributes() as $attribute ) {
            if ( ! $attribute['is_variation'] ) {
              continue;
            }
            $attribute_key = 'attribute_' . sanitize_title( $attribute['name'] );

            if ( isset( $_REQUEST[ $attribute_key ] ) ) {
              if ( $attribute['is_taxonomy'] ) {
                // Don't use wc_clean as it destroys sanitized characters.
                $value = sanitize_title( wp_unslash( $_REQUEST[ $attribute_key ] ) );
              } else {
                $value = html_entity_decode( wc_clean( wp_unslash( $_REQUEST[ $attribute_key ] ) ), ENT_QUOTES, get_bloginfo( 'charset' ) ); // WPCS: sanitization ok.
              }

              $posted_attributes[ $attribute_key ] = $value;
            }
          }

          // If no variation ID is set, attempt to get a variation ID from posted attributes.
          if ( empty( $variation_id ) ) {
            $data_store   = WC_Data_Store::load( 'product' );
            $variation_id = $data_store->find_matching_product_variation( $adding_to_cart, $posted_attributes );
          }

          // Do we have a variation ID?
          if ( empty( $variation_id ) ) {
            throw new Exception( __( 'Please choose product options&hellip;', 'woocommerce' ) );
          }

          // Check the data we have is valid.
          $variation_data = wc_get_product_variation_attributes( $variation_id );

          foreach ( $adding_to_cart->get_attributes() as $attribute ) {
            if ( ! $attribute['is_variation'] ) {
              continue;
            }

            // Get valid value from variation data.
            $attribute_key = 'attribute_' . sanitize_title( $attribute['name'] );
            $valid_value   = isset( $variation_data[ $attribute_key ] ) ? $variation_data[ $attribute_key ]: '';

            /**
             * If the attribute value was posted, check if it's valid.
             *
             * If no attribute was posted, only error if the variation has an 'any' attribute which requires a value.
             */
            if ( isset( $posted_attributes[ $attribute_key ] ) ) {
              $value = $posted_attributes[ $attribute_key ];

              // Allow if valid or show error.
              if ( $valid_value === $value ) {
                $variations[ $attribute_key ] = $value;
              } elseif ( '' === $valid_value && in_array( $value, $attribute->get_slugs() ) ) {
                // If valid values are empty, this is an 'any' variation so get all possible values.
                $variations[ $attribute_key ] = $value;
              } else {
                throw new Exception( sprintf( __( 'Invalid value posted for %s', 'woocommerce' ), wc_attribute_label( $attribute['name'] ) ) );
              }
            } elseif ( '' === $valid_value ) {
              $missing_attributes[] = wc_attribute_label( $attribute['name'] );
            }
          }
          if ( ! empty( $missing_attributes ) ) {
            throw new Exception( sprintf( _n( '%s is a required field', '%s are required fields', count( $missing_attributes ), 'woocommerce' ), wc_format_list_of_items( $missing_attributes ) ) );
          }

        $passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity, $variation_id, $variations );

        if ( $passed_validation && false !== WC()->cart->add_to_cart( $product_id, $quantity, $variation_id, $variations ) ) {
          wc_add_to_cart_message( array( $product_id => $quantity ), true );
        }
      }
  }
}
add_action( 'wp_loaded', 'woocommerce_maybe_add_multiple_products_to_cart', 15 );



function single_variable_options() {

  if (is_product()) {
?>

  <script>

    jQuery(document).ready(function($){
      
      $('.my-variation-pick').click(function(event){

        event.preventDefault();

        $('.my-variation-pick').removeClass('btn-dark my-picked-variation').addClass('btn-outline-dark');

        if ( $('.reset_variations').is(':visible') ) {

            $('.reset_variations').click();
        }

        $(this).removeClass('btn-outline-dark').addClass('btn-dark my-picked-variation');

        var selectedValue = $('.my-picked-variation').data('variation_slug');

        $('.variations .value select').find('option[value='+selectedValue+']').prop('selected', true).trigger('change');

        if ( $('.woocommerce-variation.single_variation').is(':visible') ) {

          var currentPrice = $('.woocommerce-variation.single_variation').find('.woocommerce-variation-price').html();

          $('.price').html(currentPrice);

        }

      });

    });

  </script>

<?php 
  }
  
}

add_action('wp_footer', 'single_variable_options');

function single_product_popup () {

  if ( is_product() ) {
  
  ?>
  <script>

    jQuery(document).ready(function($){

      var ifSuccess = $('.woocommerce-message.alert-success').length; 

      if (ifSuccess > 0) {

        // simple or variable products 
        var ifVariable = $('.summary.entry-summary .cart').hasClass('variations_form'); 

        var image_url = $('.woocommerce-product-gallery__image img.wp-post-image').attr('src');

        var theNameHeading = $('.product_title.entry-title').html();

        if (ifVariable) {

          var theNameSubheading = $('.my-picked-variation').html();

          var selectedOption = $('.value select').val();

          var theNameSubheading = $('.value option[value="'+selectedOption+'"]').html();

          var variations_arr = $('form.variations_form').data('product_variations');

          console.log(variations_arr);

          for (var i = 0; i<variations_arr.length; i++) {

            var attribute = variations_arr[i]['attributes']['attribute_pa_size'];

            if ( attribute == selectedOption ) {

              var thePrice = '$'+variations_arr[i]['display_price'];

            }
          }

        } else {

          var theNameSubheading = $('.product_title.entry-title').next().html();

          var ifonsale = $('.entry-summary .price del').length; 

          if (ifonsale>0) {

            var thePrice = $('.entry-summary .price ins span.woocommerce-Price-amount').html();

          } else {

            var thePrice = $('.entry-summary span.woocommerce-Price-amount').html();

          }

        }

        var theProductQty = $('input.qty').val();

        $('#last-added-image').attr('src', image_url);

        if (theNameSubheading == '') {

          $('#last-added-name').html(theNameHeading);

        }else {

          $('#last-added-name').html(theNameHeading+' ('+theNameSubheading+')');

        }

        $('#last-added-price').html(thePrice+' x '+theProductQty);

        $('#added-cart-popup').css('display', 'flex');

      }

      $('.single_buy_now_button').click(function(event){

          event.preventDefault();

          // Decide if product is simple or variable 
          var ifVariable = $('.summary.entry-summary .cart').hasClass('variations_form'); 

          if (ifVariable) {

            // check if size is selected 
            var ifSelectedVariation = $('.my-picked-variation').length; 

            if (ifSelectedVariation > 0) {

                var theProductQty = $('form.variations_form .quantity input.qty').val();

                var variation_id = $('.single_variation_wrap input.variation_id').val();

                var image_url = $('.woocommerce-product-gallery__image img.wp-post-image').attr('src');

                var theNameHeading = $('.product_title.entry-title').html();

                var theNameSubheading = $('.my-picked-variation').html();

                var thePrice = $('.price').html();

                $('#product-buy-image').attr('src', image_url);

                $('#product-buy-name').html(theNameHeading+' ('+theNameSubheading+')');

                $('#product-buy-price').html(thePrice+' x '+theProductQty);

                $('#buy-now-popup').css('display', 'flex');

                $('#buy-now-checkout').click(function(){

                  $(this).html('Processing...');

                  // Check if impulse buys
                  var ifImpulse = $('.impulseClicked').length;

                  if (ifImpulse > 0) {

                      var Ids = [];

                      var theProductQtyNum = parseInt(theProductQty);

                      if (theProductQtyNum > 1) {

                        for (var i = 0; i<theProductQtyNum; i++) {

                          Ids.push(variation_id);

                        }

                      } 

                      $('.impulseClicked').each(function(){

                          var impulseID = $(this).data('product_id');

                          Ids.push(impulseID);

                      });

                      var checkoutStr = Ids.join(",");

                      var checkoutURL = "https://site.test/shopearthlybody/checkout/?add-to-cart="+checkoutStr; 

                      window.location.replace(checkoutURL);

                  } else {

                      var theProductQtyNum = parseInt(theProductQty);

                      if (theProductQtyNum > 1) {

                        variationIDs = [];

                        for (var i = 0; i<theProductQtyNum; i++) {

                          variationIDs.push(variation_id);

                        }

                        variation_id_final = variationIDs.join(",");

                        var checkoutURL2 = "https://site.test/shopearthlybody/checkout/?add-to-cart="+variation_id_final; 

                        window.location.replace(checkoutURL2);

                      } else {

                        var checkoutURL2 = "https://site.test/shopearthlybody/checkout/?add-to-cart="+variation_id; 

                        window.location.replace(checkoutURL2);

                      }
        
                  }

                });

            } else {

                $('.variations .label .mb-0').addClass('text-danger');

                alert('Please select a product size.');

            }

          } else {

            var image_url = $('.woocommerce-product-gallery__image img.wp-post-image').attr('src');

            var theNameHeading = $('.product_title.entry-title').html();

            var theNameSubheading = $('.product_title.entry-title').next().html();

            var theProductQty = $('input.qty').val();

            var product_id = $('form.cart').find('button[name="add-to-cart"]').val();

            var ifonsale = $('.entry-summary .price del').length; 

            if (ifonsale>0) {

              var thePrice = $('.entry-summary .price ins span.woocommerce-Price-amount').html();

            } else {

              var thePrice = $('.entry-summary span.woocommerce-Price-amount').html();

            }

            $('#product-buy-image').attr('src', image_url);

            if (theNameSubheading == '') {

              $('#product-buy-name').html(theNameHeading);

            } else {

              $('#product-buy-name').html(theNameHeading+' ('+theNameSubheading+')');

            }

            $('#product-buy-price').html(thePrice+' x '+theProductQty);

            $('#buy-now-popup').css('display', 'flex');

            $('#buy-now-checkout').click(function(){

              $(this).html('Processing...');

              // Check if impulse buys
              var ifImpulse = $('.impulseClicked').length;

              if (ifImpulse > 0) {

                  var theProductQtyNum = parseInt(theProductQty);

                  var Ids = [];

                  for (var i = 0; i<theProductQtyNum; i++) {

                    Ids.push(product_id);

                  }

                  $('.impulseClicked').each(function(){

                      var impulseID = $(this).data('product_id');

                      Ids.push(impulseID);

                  });

                  var checkoutStr = Ids.join(",");

                  var checkoutURL = "https://site.test/shopearthlybody/checkout/?add-to-cart="+checkoutStr; 

                  window.location.replace(checkoutURL);

              } else {

                var theProductQtyNum = parseInt(theProductQty);

                if (theProductQtyNum > 1) {

                  productIDs = [];

                  for (var i = 0; i<theProductQtyNum; i++) {

                    productIDs.push(product_id);

                  }

                  var product_id_final = productIDs.join(",");

                  var checkoutURL2 = "https://site.test/shopearthlybody/checkout/?add-to-cart="+product_id_final; 

                  window.location.replace(checkoutURL2);

                } else {

                  var checkoutURL2 = "https://site.test/shopearthlybody/checkout/?add-to-cart="+product_id; 

                  window.location.replace(checkoutURL2);

                }

                  

              }

            });

          }

      });

      $('.variable_add_to_cart_button').click(function(event){

        event.preventDefault();

        var ifSelectedVariation = $('.my-picked-variation').length; 

        if (ifSelectedVariation > 0) {

            $('.default-variable-add-to-cart').click();

        } else {

            $('.variations .label .mb-0').addClass('text-danger');

            alert('Please select a product size.');

        }

      });

    });

  </script>
  <?php 
  }

}

add_action('wp_footer', 'single_product_popup');

/**
 * Reverse orders of add to cart buttons and short description on product page 
 */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

function reverse_orders_single_product () {

  add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 20);
  add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 30);

}
add_action('woocommerce_single_product_summary', 'reverse_orders_single_product', 1);

// Alter search posts per page
function myprefix_search_posts_per_page($query) {
  if ( $query->is_search ) {
      $query->set( 'posts_per_page', '-1' );
  }
  return $query;
}
add_filter( 'pre_get_posts','myprefix_search_posts_per_page' );

function display_product_tags_loop () {

  global $product; 

  $taxonomy = 'product_tag';

  $terms = get_the_terms( $product->get_id(), $taxonomy );

  if ( $terms ) {

    $class = [];

    foreach ($terms as $term) {
  
      $name = $term->name; 
  
      array_push( $class, $name );
  
    }
  
    $classStr = implode("", $class);
  
    echo '<input class="filter" type="hidden" value="'.$classStr.'">';

  } else {

    echo '<input class="filter" type="hidden" value="Notags">';

  }

}

add_action('woocommerce_after_shop_loop_item', 'display_product_tags_loop', 15);
