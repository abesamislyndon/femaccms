<?php //This part is required for WordPress to recognize it as a page template
/*
Template Name: Checkout
*/
?>
<?php get_header(); ?>
<div class="container">
  <div class="bg-container">
    <div class="row no-gutters">
  		<div class="col-md-9">
          <div class="woo-cart">
               <?php echo do_shortcode('[woocommerce_checkout]'); ?>
          </div>
  		</div>
  		
      <div class="col-md-3 sidebar-con" >
        <div  id='cssmenu' class = "sidebar1">
          <h3><i class="fa fa-cubes"></i>&nbsp;Product Categories</h3>
          <?php wp_nav_menu(array('menu'=>'sidebar'));?>
        </div>
  		</div>
  </div>


<?php get_footer(); ?>