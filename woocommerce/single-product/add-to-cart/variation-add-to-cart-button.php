<?php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>
<div class="woocommerce-variation-add-to-cart variations_button">
	
	<div class="d-flex w-100 justify-content-between align-items-center mb-4">

		<label style="font-weight:700; font-size:1rem;" class="mb-0">Select Quantity</label>

		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<?php
		do_action( 'woocommerce_before_add_to_cart_quantity' );

		woocommerce_quantity_input(
			array(
				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
				'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
			)
		);

		do_action( 'woocommerce_after_add_to_cart_quantity' );
		?>

	</div>
	
	<div class="d-flex w-100 justify-content-start align-items-center">

		<button class="variable_add_to_cart_button button alt rounded-0 w-100 text-uppercase mb-1" style="width:50%;"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

		<button type="submit" class="d-none button alt rounded-0 w-100 text-uppercase mb-1 default-variable-add-to-cart" style="width:50%;"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button> <!-- Hide ! -->

		<button class="single_buy_now_button button alt rounded-0 w-100 text-uppercase mb-1" style="width:50%;">1-Click Buy</button>

	</div>

	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="you" />
</div>
