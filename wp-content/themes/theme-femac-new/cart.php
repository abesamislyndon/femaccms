<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

$woocommerce->show_messages();
?>
<?php get_header(); ?>
<nav class="cbp-spmenu con-absolute cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
    <h3>Menu</h3>
    <a id="showRight" ><img src = "<?php bloginfo('template_url')?>/images/nav-icon.png"></a>
    <h4>DOUGH PROCESSING</h4>
    <a href="http://femac.com.sg/product-category/dough-processing/bakery-cabinet/">Bakery Cabinet</a>
    <a href="http://femac.com.sg/product-category/dough-processing/dough-divider-rounder/">Dough divider / Rounder</a>  
    <a href="http://femac.com.sg/product-category/dough-processing/dough-moulder/">Dough Molder</a>
    <a href="http://femac.com.sg/product-category/dough-processing/pizza-dough-flattener/">Pizza / Dough Flattener</a> 
    <a href="http://femac.com.sg/product-category/dough-processing/pizza-dough-flattener/">Reversible Sheeter</a>                                 
    <h4>MISCELLANEOUS</h4>
     <a href="http://femac.com.sg/product-category/miscellaneous/crepe-machine/">Crepe Machine</a> 
    <a href = "http://femac.com.sg/product-category/miscellaneous/egg-processing-machine/">Egg Processing Machine</a> 
    <a href="http://femac.com.sg/product-category/miscellaneous/meat-grinder/">Meat Grinder</a>
    <h4>MIXERS</h4>
    <a href="http://femac.com.sg/product-category/Mixers/Dual-head">Dual Head</a> 
    <a href="http://femac.com.sg/product-category/Mixers/Horizontal">Horizontal</a> 
    <a href="http://femac.com.sg/product-category/Mixers/Planetary">Planetary</a>
    <a href="http://femac.com.sg/product-category/Mixers/Sprial">Spiral</a>
        <h4>DOUGH PROCESSING</h4>
    <a href="http://femac.com.sg/product-category/dough-processing/bakery-cabinet/">Bakery Cabinet</a>
    <a href="http://femac.com.sg/product-category/dough-processing/dough-divider-rounder/">Dough divider / Rounder</a>  
    <a href="http://femac.com.sg/product-category/dough-processing/dough-moulder/">Dough Molder</a>
    <a href="http://femac.com.sg/product-category/dough-processing/pizza-dough-flattener/">Pizza / Dough Flattener</a> 
    <a href="http://femac.com.sg/product-category/dough-processing/pizza-dough-flattener/">Reversible Sheeter</a>                            
    <a href="http://femac.com.sg/product-category/dough-processing/pizza-dough-flattener/">Reversible Sheeter</a>                              
    <h4>MISCELLANEOUS</h4>
    <a href="http://localhost/femac/product-category/miscellaneous/crepe-machine/">Crepe Machine</a> 
    <a href = "http://localhost/femac/product-category/miscellaneous/egg-processing-machine/">Egg Processing Machine</a> 
    <a href="http://localhost/femac/product-category/miscellaneous/meat-grinder/">Meat Grinder</a>
    <h4>MIXERS</h4>
    <a href="http://femac.com.sg/product-category/Mixers/Dual-head">Dual Head</a> 
    <a href="http://femac.com.sg/product-category/Mixers/Horizontal">Horizontal</a> 
    <a href="http://femac.com.sg/product-category/Mixers/Planetary">Planetary</a>
    <a href="http://femac.com.sg/product-category/Mixers/Sprial">Spiral</a>
    <h4>OVENS</h4>
    <a href="http://femac.com.sg/product-category/ovens/bakery-cabinet/">Convection/Combi</a>
    <a href="http://femac.com.sg/product-category/ovens/dough-divider-rounder/">Deck</a>  
    <a href="http://femac.com.sg/product-category/ovens/dough-moulder/">Microwave Convection</a>
    <a href="http://femac.com.sg/product-category/ovens/pizza-dough-flattener/">Pizza</a> 
    <a href="http://femac.com.sg/product-category/ovens/pizza-dough-flattener/">Rotary Rack</a>                            
    <a href="http://femac.com.sg/product-category/ovens/pizza-dough-flattener/">Tunnel</a>                            
    <h4>REFRIGERATION PRODUCTS</h4>
    <a href="http://femac.com.sg/product-category/RefrigerationProducts/bakery-cabinet/">Bakery Cabinet</a> 
    <a href = "http://femac.com.sg/product-category/RefrigerationProducts/compact-refrigerators-freezers/">Compact Refrigerators & Freezers</a> 
    <a href="http://femac.com.sg/product-category/RefrigerationProducts/counter-chiller/">Counter Chiller</a>
    <a href="http://femac.com.sg/product-category/RefrigerationProducts/showcase">Display Showcase</a> 
    <a href="http://femac.com.sg/product-category/RefrigerationProducts/open-refrigeration-showcase">Open Refrigeration Showcase</a> 
    <a href="http://femac.com.sg/product-category/RefrigerationProducts/quick-chillers">Quick Chillers / Freezers</a>
    <a href="http://femac.com.sg/product-category/RefrigerationProducts/upright-refrigeration">Upright Refrigeration</a>
   </div> 
</nav>

    <div class="container">
            <div class="main">
                <section>
                    <!-- Class "cbp-spmenu-open" gets applied to menu -->
                    <button id="showLeft" class = "hibebtn">Show/Hide Left Slide Menu</button>
                    <button id="showRight" class = "hibebtn">Show/Hide Right Slide Menu</button>
                    <button id="showTop" class = "hibebtn">Show/Hide Top Slide Menu</button>
                    <button id="showBottom" class = "hibebtn">Show/Hide Bottom Slide Menu</button>
                </section>
                <section class="buttonset">
                    <!-- Class "cbp-spmenu-open" gets applied to menu and "cbp-spmenu-push-toleft" or "cbp-spmenu-push-toright" to the body -->
                    <button id="showLeftPush" class = "hibebtn">Show/Hide Left Push Menu</button>
             <a id="showRightPush"><img src = "<?php bloginfo('template_url')?>/images/nav-icon.png">&nbsp; Products</a>
                </section>
            </div>
        </div>
<div class = "container">
          <div class = "sidebar-menu">  
      		<div class = "row col-sm-3 sliding-navigation">            
         		 <a href="http://femac.com.sg/product-category/dough-processing"><h2>Dough Processing</h2></a>
                      <ul>                            
                            <li><a href="http://femac.com.sg/product-category/dough-processing/bakery-cabinet/">Bakery Cabinet</a></li>  
                            <li><a href="http://femac.com.sg/product-category/dough-processing/dough-divider-rounder/">Dough divider / Rounder</a></li>  
                            <li><a href="http://femac.com.sg/product-category/dough-processing/dough-moulder/">Dough Molder</a></li>  
                            <li><a href="http://femac.com.sg/product-category/dough-processing/pizza-dough-flattener/">Pizza / Dough Flattener</a></li>  
                            <li><a href="http://femac.com.sg/product-category/dough-processing/pizza-dough-flattener/">Reversible Sheeter</a></li>                            
                        </ul>
                       <a href = "http://femac.com.sg/product-category/Miscellaneous/"><h2>Miscellaneous</h2></a>
                        <ul>                            
                            <li><a href="http://femac.com.sg/product-category/miscellaneous/crepe-machine/">Crepe Machine</a></li>  
                            <li><a href = "http://femac.com.sg/product-category/miscellaneous/egg-processing-machine/">Egg Processing Machine</a></li>  
                            <li><a href="http://femac.com.sg/product-category/miscellaneous/meat-grinder/">Meat Grinder</a></li>  
                        </ul>
                        <a href = "http://femac.com.sg/product-category/Mixers/"><h2>Mixers</h2></a>
                        <ul>                            
                            <li><a href="http://femac.com.sg/product-category/Mixers/Dual-head">Dual Head</a></li>  
                            <li><a href="http://femac.com.sg/product-category/Mixers/Horizontal">Horizontal</a></li>  
                            <li><a href="http://femac.com.sg/product-category/Mixers/Planetary">Planetary</a></li>  
                            <li><a href="http://femac.com.sg/product-category/Mixers/Spiral">Spiral</a></li>  
                                                     
                        </ul>
                        <a href = "http://femac.com.sg/product-category/Ovens/"><h2>Ovens</h2></a>
                        <ul>                            
                            <li><a href="http://femac.com.sg/product-category/Ovens/Combi">Convection / Combi</a></li>
                            <li><a href="http://femac.com.sg/product-category/Ovens/Deck">Deck</a></li>  
                            <li><a href="http://femac.com.sg/product-category/Ovens/Microwave-Convection">Microwave Convection</a></li>  
                            <li><a href="http://femac.com.sg/product-category/Ovens/Pizza">Pizza</a></li>
                            <li><a href="http://femac.com.sg/product-category/Rotary-Rack">Rotary Rack</a></li>  
                            <li><a href="http://femac.com.sg/product-category/Ovens/Tunnel">Tunnel </a></li>   
                                                     
                        </ul>
                        <a href = "http://femac.com.sg/product-category/RefrigerationProducts/"><h2>Refrigeration Products</h2></a>
                        <ul>                            
                            <li><a href="http://femac.com.sg/product-category/RefrigerationProducts/BakeryCabinet">Bakery Cabinet</a></li>
                            <li><a href="http://femac.com.sg/product-category/RefrigerationProducts/Compact Refrigerators-Freezers">Compact Refrigerators & Freezers</a></li>  
                            <li><a href="http://femac.com.sg/product-category/RefrigerationProducts/CounterChiller">Counter Chiller</a></li>  
                            <li><a href="http://femac.com.sg/product-category/RefrigerationProducts/DisplayShowcase">Display Showcase</a></li>
                            <li><a href="http://femac.com.sg/product-category/RefrigerationProducts/OpenRefrigerationShowcase">Open Refrigeration Showcase</a></li>  
                            <li><a href="http://femac.com.sg/product-category/RefrigerationProducts/QuickChillers">Quick Chillers / Freezers</a></li>
                            <li><a href="http://femac.com.sg/product-category/RefrigerationProducts/Upright Refrigeration">Upright Refrigeration</a></li>    
                                                     
                        </ul>  
            </div><!--end of row sliding-navigation-->
         </div><!--end of sidebar-menu-->
    
            
                <div class = "col-sm-9 about-content"> </br>
                	<?php do_action( 'woocommerce_before_cart' ); ?>

<form action="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" method="post">

<?php do_action( 'woocommerce_before_cart_table' ); ?>

<table class="shop_table cart" cellspacing="0">
	<thead>
		<tr>
			<th class="product-remove">&nbsp;</th>
			<th class="product-thumbnail">&nbsp;</th>
			<th class="product-name">&nbsp;&nbsp;<?php _e( 'Product', 'woocommerce' ); ?></th>
			<th class="product-quantity"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php do_action( 'woocommerce_before_cart_contents' ); ?>

		<?php
		if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) {
			foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values ) {
				$_product = $values['data'];
				if ( $_product->exists() && $values['quantity'] > 0 ) {
					?>
					<tr class = "<?php echo esc_attr( apply_filters('woocommerce_cart_table_item_class', 'cart_table_item', $values, $cart_item_key ) ); ?>">
						<!-- Remove from cart link -->
						<td class="product-remove">
							<?php
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">&times;</a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key );
							?>
						</td>

						<!-- The thumbnail -->
						<td class="product-thumbnail">
							<?php
								$thumbnail = apply_filters( 'woocommerce_in_cart_product_thumbnail', $_product->get_image(), $values, $cart_item_key );

								if ( ! $_product->is_visible() || ( ! empty( $_product->variation_id ) && ! $_product->parent_is_visible() ) )
									echo $thumbnail;
								else
									printf('<a href="%s">%s</a>', esc_url( get_permalink( apply_filters('woocommerce_in_cart_product_id', $values['product_id'] ) ) ), $thumbnail );
							?>
						</td>

						<!-- Product Name -->
						<td class="product-name">
							<?php
								if ( ! $_product->is_visible() || ( ! empty( $_product->variation_id ) && ! $_product->parent_is_visible() ) )
									echo apply_filters( 'woocommerce_in_cart_product_title', $_product->get_title(), $values, $cart_item_key );
								else
									printf('<a href="%s">%s</a>', esc_url( get_permalink( apply_filters('woocommerce_in_cart_product_id', $values['product_id'] ) ) ), apply_filters('woocommerce_in_cart_product_title', $_product->get_title(), $values, $cart_item_key ) );

								// Meta data
								echo $woocommerce->cart->get_item_data( $values );

                   				// Backorder notification
                   				if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $values['quantity'] ) )
                   					echo '<p class="backorder_notification">' . __( 'Available on backorder', 'woocommerce' ) . '</p>';
							?>
						</td>

						<!-- Quantity inputs -->
						<td class="product-quantity">
							<?php
								if ( $_product->is_sold_individually() ) {
									$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
								} else {

									$step	= apply_filters( 'woocommerce_quantity_input_step', '1', $_product );
									$min 	= apply_filters( 'woocommerce_quantity_input_min', '', $_product );
									$max 	= apply_filters( 'woocommerce_quantity_input_max', $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(), $_product );

									$product_quantity = sprintf( '<div class="quantity"><input type="number" name="cart[%s][qty]" step="%s" min="%s" max="%s" value="%s" size="3" title="' . _x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ) . '" class="input-text qty text" maxlength="12" /></div>', $cart_item_key, $step, $min, $max, esc_attr( $values['quantity'] ) );
								}

								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
							?>
						</td>

						<!-- Product subtotal -->
					</tr>
					<?php
				}
			}
		}

		do_action( 'woocommerce_cart_contents' );
		?>
		<tr>
			<td colspan="6" class="actions">
				<?php if ( $woocommerce->cart->coupons_enabled() ) { ?>
				<?php } ?>

				<input type="submit" class="button" name="update_cart" value="<?php _e( 'Update Quote', 'woocommerce' ); ?>" /> <input type="submit" class="checkout-button button alt" name="proceed" value="<?php _e( 'Proceed to Checkout &rarr;', 'woocommerce' ); ?>" />

				<?php do_action('woocommerce_proceed_to_checkout'); ?>

				<?php $woocommerce->nonce_field('cart') ?>
			</td>
		</tr>

		<?php do_action( 'woocommerce_after_cart_contents' ); ?>
	</tbody>
</table>

<?php do_action( 'woocommerce_after_cart_table' ); ?>

</form>

<div class="cart-collaterals">

	<?php do_action('woocommerce_cart_collaterals'); ?>

	<?php woocommerce_cart_totals(); ?>

	<?php woocommerce_shipping_calculator(); ?>

</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
                </div><!--end of col-sm-9 blog-content-->   
        	</div><!--end of container-->
    
<?php get_footer(); ?>
