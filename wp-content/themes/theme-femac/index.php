<?php get_header(); ?>
<nav class="cbp-spmenu con-absolute cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
   <div class = "content-menu-slide"> 
    <a id="showRight" ><img src = "<?php bloginfo('template_url')?>/images/nav-icon.png"></a>
    <h3>Home Menu</h3>
   <a href="http://femac.com.sg/">Home</a>
    <a href="http://femac.com.sg/about-us/">About</a>  
    <a href="http://femac.com.sg/services/">Services</a>
    <a href="http://femac.com.sg/blog/">Blog</a> 
    <a href="http://femac.com.sg/contact-us/">Contact us</a>                               
    <h3>Product Menu</h3>
    <h4>DOUGH PROCESSING</h4>
   <a href="http://femac.com.sg/product-category/dough-processing/bakery-cabinet/">Bakery Cabinet</a>
    <a href="http://femac.com.sg/product-category/dough-processing/dough-divider-rounder/">Dough divider / Rounder</a>  
    <a href="http://femac.com.sg/product-category/dough-processing/dough-moulder/">Dough Molder</a>
    <a href="http://femac.com.sg/product-category/dough-processing/pizza-dough-flattener/">Pizza / Dough Flattener</a> 
    <a href="http://femac.com.sg/product-category/dough-processing/reversible-sheeter/">Reversible Sheeter</a>                              
    <h4>MISCELLANEOUS</h4>
     <a href="http://femac.com.sg/product-category/miscellaneous/crepe-machine/">Crepe Machine</a> 
    <a href = "http://femac.com.sg/product-category/miscellaneous/egg-processing-machine/">Egg Processing Machine</a> 
    <a href="http://femac.com.sg/product-category/miscellaneous/meat-grinder/">Meat Grinder</a>
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
                <a id="showRightPush"><img src = "<?php bloginfo('template_url')?>/images/nav-icon.png">&nbsp;&nbsp;&nbsp;MENU</a>
            </section>
        </div>
</div> 

<div class = "container banner-slider-header">  
    <div class = "row">  
           <div class = "col-sm-12 slider banner-container">
              <?php // if (function_exists('nivoslider4wp_show')) { nivoslider4wp_show(); } ?> 
                 <?php  echo do_shortcode(' [simpleresponsiveslider]'); ?> 
            </div><!--end of slider-->   
         </div><!--end of banner-container-->
    </div><!--end of row for banner-->
 
<div class = "container">
  <div class = "row">  
    <div class = "col-sm-7 Who">
        <article>
         	  <?php $id =21; $page_data = get_page($id);?>
            <h4><?php echo $page_data->post_title; ?></h4>
            <hr>
            <p><?php $post = get_page($id); $content = apply_filters('the_content', $post->post_content); echo $content; ?></p>
            <p><a href = "http://femac.com.sg/about-us/"><h5>Show More</h5></a></p> 
        </article>        

          </br></br>
        
        <article class = "logo-slider">             
         	  <?php $id =25; $page_data = get_page($id);?>
            <h4><?php echo $page_data->post_title; ?></h4>
            <hr>  
            <?php logo_slider(); ?>
        </article> 
    </div><!--end of who we are division-->
                    
      <div class = "col-sm-5 Featured">
      <h4>FEATURED PRODUCTS</h4>
      <hr>
      <?php echo do_shortcode('[featured_products per_page="4" columns="2" orderby="date" order="desc"]');?>
     </div><!--end of feature products container-->
  </div><!--end of container-->
<?php get_footer(); ?>