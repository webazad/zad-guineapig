<?php
/**
 * Displays the menu icon and modal
 *
 * @package azad-x
 * @since 1.0.0
 */
?>

<div class="cart-modal cover-modal header-footer-group" data-modal-target-string=".cart-modal">

	<div class="cart-modal-inner modal-inner">

		<div class="cart-wrapper section-inner">

			<div class="cart-top">

				<button class="toggle close-cart-toggle fill-children-current-color" data-toggle-target=".cart-modal" data-toggle-body-class="showing-cart-modal" aria-expanded="false" data-set-focus=".cart-modal">
					<span class="toggle-text"><?php _e( 'Close Menu', 'azad-guineapig' ); ?></span>
					<?php azad_the_svg( 'cross' ); ?>
				</button><!-- .nav-toggle -->
				
				Cart

			</div><!-- .menu-top -->

			<div class="menu-bottom">

			</div><!-- .menu-bottom -->

		</div><!-- .menu-wrapper -->

	</div><!-- .menu-modal-inner -->

</div><!-- .menu-modal -->