<?php //This part is required for WordPress to recognize it as a page template
/*
Template Name:woocommerce
*/
?>
<?php get_header(); ?>
<div class="container">
  <div class="bg-container">
    <div class="row no-gutters">
  		<div class="col-md-9">
          <div class="woo-custom">
                <?php woocommerce_content(); ?> 
          </div>
  		</div>
  		
      <div class="col-md-3 sidebar-con" >
        <div  id='cssmenu' class = "sidebar1">
          <h3><i class="fa fa-cubes"></i>&nbsp;Product Categories</h3>
          <?php wp_nav_menu(array('menu'=>'sidebar'));?>
        </div>
  		</div>
  </div>

    <div class="row no-gutters">
       <div class = "col-md-12">
        <div class="page-bg">
        </div>
          <div class="related-pro">
          <hr class = "divider">
          <?php do_action( 'woocommerce_after_single_product_summary' );?>
          <meta itemprop="url" content="<?php the_permalink(); ?>" />
          </div>

      </div><!-- #product-<?php the_ID(); ?> -->
   </div>
<?php get_footer(); ?>