<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>

	<div class="container-fluid"><!-- replace the <table> element --> 

		<?php do_action( 'woocommerce_before_cart_contents' ); ?>

		<?php 
		
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {

				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
				
				/**
				 * Show Brand Name
				 */
				if ( $_product->is_type( 'simple' ) ) {
					$cat_ids = $_product->category_ids;	
					$cat_names = [];
					foreach ( $cat_ids as $cat_id ) {
						$term = get_term_by( 'id', $cat_id, 'product_cat' );
						$cat_name = $term->name; 
						array_push( $cat_names, $cat_name );
					}
				} else {
					$parent_id = $_product->get_parent_id();
					$cat_ids = wc_get_product( $parent_id )->category_ids;
					$cat_names = [];
					foreach ( $cat_ids as $cat_id ) {
						$term = get_term_by( 'id', $cat_id, 'product_cat' );
						$cat_name = $term->name; 
						array_push( $cat_names, $cat_name );
					}
				}
				if ( in_array( 'CBD Daily Products', $cat_names ) ) {
					$show_cat_name = 'CBD Daily Products';
					$brand_color = '#5d7041';
				}	
				
				if ( in_array( 'Hemp Seed Body Care', $cat_names ) ) {
					$show_cat_name = 'Hemp Seed Body Care';
					$brand_color = '#3d8e26';
				}

				if ( in_array( 'Marrakesh Hair Care', $cat_names ) ) {
					$show_cat_name = 'Marrakesh Hair Care';
					$brand_color = '#a51e35';
				}
				
				if ( in_array( 'Emera CBD Hair Care', $cat_names  ) ) {
					$show_cat_name = 'Emera CBD Hair Care';
					$brand_color = '#004c45';
				}
				
				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key ); ?>

					<div class="row justify-content-between align-items-start px-3 cart-single-item woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

						<div style="width: 40%;">

							<h6 class="text-center text-light p-2" style="font-size: 0.85rem; background-color:<?php echo $brand_color; ?>"><?php echo $show_cat_name; ?></h6>
					
							<?php
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

							if ( ! $product_permalink ) {
								echo $thumbnail; // PHPCS: XSS ok.
							} else {
								printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
							}
							?>

						</div>

						<div style="width: 56%;" class="px-3">
					
							<?php 
							
								$product_name = $_product->get_name();

								$product_name_array = explode( "<br>", $product_name );

								$product_name_name = $product_name_array[0];

								$product_name_meta = $product_name_array[1];

								echo '<h6 class="text-uppercase">';

									echo $product_name_name; 

								echo '</h6>';

								echo '<p style="font-size: 0.9rem;">';

									echo $product_name_meta; 

								echo '</p>';
							
							?>
							<!-- Product Unit Price -->
							<?php
								echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
							?>
							<!-- Product Quantity --> 
							<div class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
							<?php
								if ( $_product->is_sold_individually() ) {
									$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
								} else {
									$product_quantity = woocommerce_quantity_input(
										array(
											'input_name'   => "cart[{$cart_item_key}][qty]",
											'input_value'  => $cart_item['quantity'],
											'max_value'    => $_product->get_max_purchase_quantity(),
											'min_value'    => '0',
											'product_name' => $_product->get_name(),
										),
										$_product,
										false
									);
								}

								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
							?>
							</div>
							<!-- Product Total --> 
							<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
							?>
							<!-- Free Shipping? --> 
							<?php 
								$shipping_class = $_product->get_shipping_class();

								if ( $shipping_class == 'free-shipping' ) {
								  
									echo '<p class="mt-3 text-white px-3 py-1 box-shadow text-center" style="font-size:0.85rem;background:#5d7041">Free Shipping</p>';
							  
								}
							?>
						</div>

						<div style="width: 4%">
							
							<?php
								echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									'woocommerce_cart_item_remove_link',
									sprintf(
										'<a href="%s" class="remove d-flex justify-content-end align-items-end" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										esc_html__( 'Remove this item', 'woocommerce' ),
										esc_attr( $product_id ),
										esc_attr( $_product->get_sku() )
									),
									$cart_item_key
								);
							?>

						</div>

					</div>

					<hr style="height: 0.5px; background-color: #000; border: none;">

			<?php 
				}
			}
		?>

		<?php do_action( 'woocommerce_cart_contents' ); ?>

		<div class="row px-3 my-4 justify-content-center">

			<button type="submit" class="button rounded-0 btn btn-dark px-5 font-weight-normal text-uppercase" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

		</div>

		<?php do_action( 'woocommerce_cart_actions' ); ?>

		<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>

		<div class="row p-3 border mx-1 mb-3">

			<h7 class="text-uppercase font-weight-bold mb-3">Promotion Code</h7>

			<?php 

				if ( wc_coupons_enabled() ) { ?>

					<div class="coupon d-flex justify-content-between align-items-center w-100">
						<input type="text" name="coupon_code" class="input-text py-1" style="width:50%" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <button type="submit" style="width:50%" class="button text-uppercase bg-brown rounded-0 text-white" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
						<?php do_action( 'woocommerce_cart_coupon' ); ?>
					</div>

			<?php 
				
				} ?>

		</div>

		<?php do_action( 'woocommerce_after_cart_contents' ); ?>

	</div>

	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>

<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

<div class="cart-collaterals px-3">
	<?php
		/**
		 * Cart collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
		do_action( 'woocommerce_cart_collaterals' );
	?>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
