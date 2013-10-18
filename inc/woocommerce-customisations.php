<?php
/**
 * WOOCOMMERCE CUSTOMISATION
 * 
 * Custom filters and hooks for integration with WooCommerce
 * 
 */


add_action('woocommerce_before_shop_loop_item','tanlinell_woocommerce_before_shop_loop_item');

function tanlinell_woocommerce_before_shop_loop_item() {
	echo '<div class="product__info">';
}

add_action('woocommerce_after_shop_loop_item','tanlinell_woocommerce_after_shop_loop_item', 1);

function tanlinell_woocommerce_after_shop_loop_item() {
	echo '</div>';
}


