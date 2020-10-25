<?php
function azad_woo_mini_cart() { 

	$total = WC()->cart->cart_contents_count; ?>
	
	<div class="cart-sidebar-head">
		<h4 class="cart-sidebar-title"><?php esc_html_e( 'Shopping cart', 'woostify' ); ?></h4>
		<span class="shop-cart-count"><?php echo esc_html( $total ); ?></span>
		<button id="close-cart-sidebar-btn" class="ti-close"></button>
	</div>
	
	<?php
}
add_action( 'azad_woo_mini_cart', 'azad_woo_mini_cart' );