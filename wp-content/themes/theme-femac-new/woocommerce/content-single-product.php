<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

 <div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="container">
    <div class="row">
	   <div class = "col-md-4">
	    <?php do_action( 'woocommerce_before_single_product_summary' );?>
       </div>

       <div class = "col-md-4"> 
	     <div class="summary entry-summary">
		  <?php do_action( 'woocommerce_single_product_summary' ); ?>
		  <hr>
		  <?php echo pdf_attachment_file(1,"download pdf");?>
	     </div><!-- .summary -->
	   </div><!-- .summary -->
	  
	   <div class="col-md-9">
	    <div itemprop="description" class = "description">
	      <?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
        </div>
       </div>
  
    </div><!-- #product-<?php the_ID(); ?> -->
  </div>
</div>


<?php do_action( 'woocommerce_after_single_product' ); ?>
