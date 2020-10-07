<?php
/**
 * Email Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-addresses.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates/Emails
 * @version 3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$text_align = is_rtl() ? 'right' : 'left';
$address    = $order->get_formatted_billing_address();
$shipping   = $order->get_formatted_shipping_address();

?>

<table id="addresses" cellspacing="0" cellpadding="0" style="width: 100%; vertical-align: top;" border="0">
 <tr>
 <?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() && ( $shipping = $order->get_formatted_shipping_address() ) ) : ?>
 <td class="td" style="text-align:<?php echo $text_align; ?>; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;" valign="top" width="50%">
 <h3><?php _e( 'Billing address', 'woocommerce' ); ?></h3>

<p class="text">
 <?php echo get_post_meta($order->ID,'_shipping_first_name', true).' '.get_post_meta($order->ID,'_shipping_last_name', true); ?><br/>
 <?php echo get_post_meta($order->ID,'_shipping_address_1', true).' '.get_post_meta($order->ID,'_shipping_address_2', true); ?><br/>
 <?php echo get_post_meta($order->ID,'_shipping_city', true).'<br/>';
 $state = get_post_meta($order->ID,'_shipping_state', true);
 $state = str_replace('Victoria', 'VIC', $state);
 $state = str_replace('Australian Capital Territory', 'ACT', $state);
 $state = str_replace('Western Australia', 'WA', $state);
 $state = str_replace('Tasmania', 'TAS', $state);
 $state = str_replace('New South Wales', 'NSQ', $state);
 $state = str_replace('South Australia', 'SA', $state);
 $state = str_replace('Queensland', 'QLD', $state);
 $state = str_replace('Northern Territory', 'NT', $state);
 echo $state.' '.get_post_meta($order->ID,'_shipping_postcode', true); ?><br/>
 <?php if (get_post_meta($order->ID,'_shipping_country', true) != 'AU') { echo get_post_meta($order->ID,'_shipping_country', true); } ?>
 </p>
 </td>
 <?php endif; ?>
 <td class="td" style="text-align:<?php echo $text_align; ?>; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;" valign="top" width="50%">
 <h3><?php _e( 'Shipping address', 'woocommerce' ); ?></h3>

<p class="text" style="color: #000000;">
 <?php echo get_post_meta($order->ID,'_billing_first_name', true).' '.get_post_meta($order->ID,'_billing_last_name', true); ?><br/>
 <?php echo get_post_meta($order->ID,'_billing_address_1', true).' '.get_post_meta($order->ID,'_billing_address_2', true); ?><br/>
 <?php echo get_post_meta($order->ID,'_billing_city', true).'<br/>';
 $state = get_post_meta($order->ID,'_billing_state', true);
 $state = str_replace('Victoria', 'VIC', $state);
 $state = str_replace('Australian Capital Territory', 'ACT', $state);
 $state = str_replace('Western Australia', 'WA', $state);
 $state = str_replace('Tasmania', 'TAS', $state);
 $state = str_replace('New South Wales', 'NSQ', $state);
 $state = str_replace('South Australia', 'SA', $state);
 $state = str_replace('Queensland', 'QLD', $state);
 $state = str_replace('Northern Territory', 'NT', $state);
 echo $state.' '.get_post_meta($order->ID,'_billing_postcode', true); ?><br/>
 <?php if (get_post_meta($order->ID,'_billing_country', true) != 'AU') { echo get_post_meta($order->ID,'_billing_country', true); } ?>
 </p>
 </td>
 </tr>
</table>
