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
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>/css/normalize.css">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>
	<?php wp_head(); ?>
</head>

<body class = "woocommerce-page">
    <div class = "container header-container">
       <header>  
          <div class = "row divider-set">
          	<div class = "col-xs-6 social-media-panel">
          		<?php echo do_shortcode('[sharethis]');?>
          	</div>
            <div class = "col-xs-6 search-container">               
            <?php
				  if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('homepage-sidebar') ) :
			  
			endif; ?>
    	   </div><!--end of search-container-->
          </div><!--end of divider-set-->
		
	
            <div class="quote_status">Quotation List<?php global $woocommerce; ?>
                <img src = "<?php bloginfo('template_url');?>/images/quote-icon.png"><a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
                <?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?>  
                <?php //echo $woocommerce->cart->get_cart_total(); ?></a>
 		    </div><!--end of quotation status header-->  
       </div><!--end of header-container-->
      
       <div class = "container wrapper">
         <div class = "row header">
             <div class = "col-sm-2">
                 <div class = "col-sm-2 logo">
                  <a href = "http://femac.com.sg"><img src = "<?php bloginfo(template_url)?>/images/logo.png"></a>	
                </div><!--end of col-sm-2 logo-->
             </div><!--end of col-sm-2-->
           <div class = "col-sm-10 menu">              
                    <nav>
                    	<?php wp_nav_menu(array('menu'=>'upper-navigation'));?>
                          <a href="#" id="pull"></a>
                    </nav><!--end of navigation in header-->
             </div><!--end of menu container-->    
          </div><!--end of row header-->
      </header><!--end of header-->    
      <hr class = "header-hr">             
        