<?php
/**
 * View Order
 *
 * Shows the details of a particular order on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/view-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

defined( 'ABSPATH' ) || exit;

$notes = $order->get_customer_order_notes();
?>

<div class="border-top d-flex justify-content-between align-items-center py-3 mb-0">
	<h5 class="mb-0" style="line-height:2rem">Order details</h5>
	<a href="<?php get_site_url() ?>/customer-service" target="_blank" class="btn btn-outline-secondary btn-sm">Help</a>	
</div>

<table class="mb-3">
	<tr>
		<td class="pr-3">Order#: <?php echo $order->get_order_number() ?></td>
		<td class="border-left border-right px-3">Order Date: <?php echo wc_format_datetime( $order->get_date_created() ) ?></td>
		<td class="pl-3">Order Status: <?php echo wc_get_order_status_name( $order->get_status() ) ?></td>
	</tr>
</table>

<?php do_action( 'woocommerce_view_order', $order_id ); ?>
