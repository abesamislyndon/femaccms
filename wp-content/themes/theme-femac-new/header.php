<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes" />
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
	<meta name="google-site-verification" content="QHMbdrJi423YwBlL5u0D0KmExkD0HW0kCKp7NmfrYyY" />
	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
	<link rel="shortcut icon" href="<?php bloginfo('template_url');?>/favicon.ico">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/menu.css">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<?php wp_head(); ?>
</head>

<body>
<div class="container">
		<div class="upper-bg">	
			<div class="row">
				<div class="social_search">
					<div class="col-md-4">
						Quotation List<?php global $woocommerce; ?>&nbsp;→&nbsp;&nbsp;&nbsp;
                <i class="fa fa-pencil-square-o"></i><a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
                <?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?>  
                <?php //echo $woocommerce->cart->get_cart_total(); ?></a>


					</div>
					<div class="col-md-4">s</div>
					<div class="col-md-4">
						<div class="search-container">
						<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
						<div>
							<label class="screen-reader-text" for="s"><?php __( 'Search for:', 'woocommerce' ); ?></label>
							<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php __( 'Search for products', 'woocommerce' ); ?>" />
							<input type="submit" id="searchsubmit" value="<?php echo esc_attr__( 'Search' ); ?>" />
							<input type="hidden" name="post_type" value="product" />
						</div>
	 				   </form>
						</div>
					</div>
				</div>
			</div>
		 </div>
	</div><!-- end of container 1-->

<header id="header">
 <div class="container">	
   <div class="bg-container1">
     <div class="container1">
     <h1><img src="<?php echo bloginfo('template_url'); ?>/img/logo.png" alt=""></h1>
   
       <nav id="nav">
       	  <div id="hide">
           <?php wp_nav_menu(array('menu'=>'upper-navigation'));?>
             </div>
       </nav>
     </div>
    </div>
  </div>  
  </header>
