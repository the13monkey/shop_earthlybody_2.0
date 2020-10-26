<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $product_tabs ) ) : ?>

	<div class="my-woo-product-tabs px-3">

		<?php foreach ( $product_tabs as $key => $product_tab ) : ?>

			<p class="d-flex justify-content-between align-items-center my-woo-tab-control" id="tab-control-<?php echo esc_attr( $key ); ?>"><?php echo $product_tab['title']; ?><i class="fa fa-angle-down fa-2x" aria-hidden="true"></i></p>

			<div class="my-woo-product-tab-panel d-none" id="my-tab-<?php echo esc_attr( $key ); ?>">

				<?php
					if ( isset( $product_tab['callback'] ) ) {
						call_user_func( $product_tab['callback'], $key, $product_tab );
					}
				?>

			</div>

		<?php endforeach; ?>

		<?php do_action( 'woocommerce_product_after_tabs' ); ?>

	</div>

<?php endif; ?>
