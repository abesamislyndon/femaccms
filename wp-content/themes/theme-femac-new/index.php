<?php get_header(); ?>
  <div class="container">
   <div class="bg-container">
      <div class="row no-gutters">
        <div class="banner">
          <div class="row no-gutters">
            <div class="col-md-6 banner-photo">
              <img src="<?php echo bloginfo('template_url'); ?>/img/banner.png" alt="">
            </div>
            <div class="col-md-6">
                <div class="col-md-12">
                  <div class="call-us">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis quos pariatur ipsa velit animi alias, nemo ea provident cumque molestias, voluptatum, voluptatibus porro neque eveniet odio ullam voluptas accusantium beatae!</p>
                  </div><!--end of lend of call us-->
                </div>

                <div class="col-md-12">
                  <div class="who-we">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas accusamus repellat aliquid veritatis suscipit sed alias quaerat eveniet, enim magni accusantium itaque vel quibusdam placeat mollitia, quod, ratione molestiae facere.
                   </div> 
                </div><!--end of who we are-->
            </div>
          </div>
          </div>
      </div>
  
    <div class="row no-gutters">
      <div class="col-md-3 ">      
       <div class="brand-arrow">
           <div class="arrow_box">
           <p>choose wide variety of</p>
           <p class = "brand-typo">OUR BRANDS</p>   
          </div><!--end of arrow box-->
        </div>
     </div>

      <div class="col-md-9">
        <div class="brand-logo">
              <?php echo do_shortcode('[logo-slider]');?>
        </div><!--end of brand logo-->
      </div>
   </div>
    
    <div class="row">
        <div class="col-md-12">
          <div class="product-latest">
               <?php echo do_shortcode('[featured_products per_page="8" columns="4" orderby="date" order="desc"]');?>
          </div><!--end of product-latest-->
        </div>
    </div>

    <div class="row no-gutters">
      <hr>
        <div class="col-md-4">
            <div class="contact">
            </div><!--end of contact-->
        </div>

        <div class="col-md-8">
            <div class="col-md-12">
                <div class="latest-blog">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed alias tempora et asperiores laudantium ipsa, expedita ab suscipit qui eligendi numquam maxime ipsam sequi recusandae illo molestiae? Quasi, temporibus, atque.</p>
                </div><!--end of blog -->
            </div>
            <div class="col-md-12">
                <div class="latest-news">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita velit adipisci, architecto sint illum ut nobis molestiae, laudantium perferendis perspiciatis odio hic reprehenderit nam vero earum magnam eaque tenetur doloremque!</p>
                </div><!--end of latest-news-->
            </div>
        </div>
    </div>
     

<?php get_footer(); ?>