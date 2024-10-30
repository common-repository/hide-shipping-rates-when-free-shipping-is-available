<?php
/**
 * @package hide shipping if free
 */
/*
Plugin Name: Hide shipping rates when free shipping is available
Description: This simple plugin hides all shipping methods when the free shipping method conditions are met
Version: 1.0.0
Author: face 2 face
Author URI: https://f2f.co.il/
License: GPLv2 or later
Text Domain: hide-shipping-if-free
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