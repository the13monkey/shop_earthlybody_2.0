<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>

<div class="row justify-content-center mt-n3 py-5" style="background: #fcf7f2;" id="HiUser-sm">

	<h4>Hello, <?php echo $current_user->display_name; ?></h4>

</div>

<hr class="mt-0">

<div class="row mb-md-5">

	<div class="col col-12 col-md-4">

		<div class="row justify-content-between align-items-end px-3 mb-3">

			<h5 class="mb-0">Orders</h5>

			<a href="<?php echo wc_get_endpoint_url( 'orders' ) ?>" class="text-uppercase text-muted" style="font-size: 0.85rem;">View All ></a>

		</div>

		<div class="row px-3">
			<img src="<?php echo get_template_directory_uri() ?>/img/new_images/recent_orders.jpg" class="img-fluid w-100" alt="My Orders | Shop Earthly Body" />
		</div>

	</div>

	<div class="col col-12 col-md-4">

		<div class="row justify-content-between align-items-end px-3 my-3 mt-md-0">

			<h5 class="mb-0">Addresses</h5>

			<a href="<?php echo wc_get_endpoint_url( 'edit-address' ) ?>" class="text-uppercase text-muted" style="font-size: 0.85rem;">View All ></a>

		</div>

		<div class="row px-3">

			<img src="<?php echo get_template_directory_uri() ?>/img/new_images/my_addresses.jpg" class="img-fluid w-100" alt="My Addresses | Shop Earthly Body" />

		</div>

	</div>

	<div class="col col-12 col-md-4">

		<div class="row justify-content-between align-items-end px-3 my-3 mt-md-0">

			<h5 class="mb-0">Account Details</h5>

			<a href="<?php echo wc_get_endpoint_url( 'edit-account' ) ?>" class="text-uppercase text-muted" style="font-size: 0.85rem;">Edit ></a>

		</div>

		<div class="row px-3">

			<img src="<?php echo get_template_directory_uri() ?>/img/new_images/change_password.jpg" class="img-fluid w-100" alt="My Addresses | Shop Earthly Body" />
			
		</div>

	</div>

</div>

<div class="row justify-content-center px-3 mt-3 d-flex d-md-none">

	<a class="text-uppercase text-muted" href="<?php echo wc_logout_url() ?>"><i class="fa fa-sign-out mr-1" aria-hidden="true"></i>Log Out</a>

</div>

<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
