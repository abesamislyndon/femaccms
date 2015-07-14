        <div class = "container footer">  
          <hr class = "header-hr">  
            <div class = "row">  
               <div class = "col-sm-2 social-footer">
               <h4>FOLLOW US</h4>
                  <ul>
                    <li><a href = "https://www.facebook.com/pages/Femac-Singapore-Pte-Ltd/112687172130315?ref=hl"><img src = "<?php bloginfo(template_url)?>/images/social-icon/fb.png"></a></li>
                    <li><a href = "https://plus.google.com/113510475962068325927/posts?hl=en"><img src = "<?php bloginfo(template_url)?>/images/social-icon/g-plus.png"></a></li>
                  <li><a href = "http://instagram.com/femacsingapore"><img src = "<?php bloginfo(template_url)?>/images/social-icon/instagram.png"></a></li> 
                  </ul>
                </div>
                 <div class = "col-sm-3 contact-us-footer">
                  <h4>CONTACT US</h4>
                  <p> Femac Singapore Pte. Ltd</br>
                      12 Tagore Lane</br>
                      Singapore 787474</br>
                      Tel: +65 6454 7277</br>
                      Fax: +65 6458 7701</br>
                      Email: info@femac.com.sg</p>
                </div><!--end of contact us footer-->
                
                <div class = "col-sm-4 latest blog">
                  <h4>LATEST BLOG</h4>
                    <ul>
                        <li>          
                            <?php
                            $temp = $wp_query;
                            $wp_query= null;
                            $wp_query = new WP_Query();     
                              $wp_query->query('showposts=1'.'&paged='.$paged.'&category_name=blog');
                            while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                                 <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail(array(210,210), array ('class' => 'alignleft')); ?></5>                        
                                 <h5><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                                  <span>by&nbsp;<?php the_author(); ?>&nbsp;on&nbsp;<?php the_time('jS F Y') ?></span> 
                                   <?php the_excerpt(__('(more…)')); ?> 
                                 <div class="clear"></div>
                          <?php endwhile; ?>  
                            
                           </li>
                        </ul>
                </div><!--end of latest blog-->

                <div class = "col-sm-3 news blog">
                  <h4>NEWS</h4>
                    <ul>
                        <li>          
                            <?php
                            $temp = $wp_query;
                            $wp_query= null;
                            $wp_query = new WP_Query();     
                              $wp_query->query('showposts=1'.'&paged='.$paged.'&category_name=news');
                            while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                                 <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail(array(210,210), array ('class' => 'alignleft')); ?></5>                        
                                 <h5><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                                  <span>by&nbsp;<?php the_author(); ?>&nbsp;on&nbsp;<?php the_time('jS F Y') ?></span> 
                                   <?php the_excerpt(__('(more…)')); ?> 
                                 <div class="clear"></div>
                          <?php endwhile; ?>  
                            
                           </li>
                        </ul>  
                      </div><!--end of news div-->
             </div>
        </div><!--end of container footer-->
         
      <div class = "container"><div class = "col-lg-12 footer-gray"></div></div>  

      <div class = "container">  
         <div class = "col-sm-12 footer-info">
       <?php wp_nav_menu(array('menu'=>'footer-menu'));?>
        <p>©2013 Femac Singapore Pte Ltd. All Rights Reserved. Design by Exhibit Media Pte Ltd</p>
          </div><!--end of footer-info-->
        </div><!--end of footer container-->  
     </div><!--end of container-->

<script src="<?php bloginfo('template_directory'); ?>/jquery.js"></script>
    <!-- Include the Sidr JS -->
    <script src="<?php bloginfo('template_directory'); ?>/jquery.sidr.min.js"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/classie.js"></script>
      <script src="<?php bloginfo('template_directory'); ?>/js/modernizr.custom.js"></script>
    <script>
      var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
        menuRight = document.getElementById( 'cbp-spmenu-s2' ),
        menuTop = document.getElementById( 'cbp-spmenu-s3' ),
        menuBottom = document.getElementById( 'cbp-spmenu-s4' ),
        showLeft = document.getElementById( 'showLeft' ),
        showRight = document.getElementById( 'showRight' ),
        showTop = document.getElementById( 'showTop' ),
        showBottom = document.getElementById( 'showBottom' ),
        showLeftPush = document.getElementById( 'showLeftPush' ),
        showRightPush = document.getElementById( 'showRightPush' ),
        body = document.body;

      showLeft.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( menuLeft, 'cbp-spmenu-open' );
        disableOther( 'showLeft' );
      };
      showRight.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( menuRight, 'cbp-spmenu-open' );
        disableOther( 'showRight' );
      };
      showTop.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( menuTop, 'cbp-spmenu-open' );
        disableOther( 'showTop' );
      };
      showBottom.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( menuBottom, 'cbp-spmenu-open' );
        disableOther( 'showBottom' );
      };
      showLeftPush.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( body, 'cbp-spmenu-push-toright' );
        classie.toggle( menuLeft, 'cbp-spmenu-open' );
        disableOther( 'showLeftPush' );
      };
      showRightPush.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( body, 'cbp-spmenu-push-toleft' );
        classie.toggle( menuRight, 'cbp-spmenu-open' );
        disableOther( 'showRightPush' );
      };

      function disableOther( button ) {
        if( button !== 'showLeft' ) {
          classie.toggle( showLeft, 'disabled' );
        }
        if( button !== 'showRight' ) {
          classie.toggle( showRight, 'disabled' );
        }
        if( button !== 'showTop' ) {
          classie.toggle( showTop, 'disabled' );
        }
        if( button !== 'showBottom' ) {
          classie.toggle( showBottom, 'disabled' );
        }
        if( button !== 'showLeftPush' ) {
          classie.toggle( showLeftPush, 'disabled' );
        }
        if( button !== 'showRightPush' ) {
          classie.toggle( showRightPush, 'disabled' );
        }
      }
    </script>
       <script src="http://femac.exhibitmedia.sg/wp-content/themes/theme-femac/js/cycle.js"></script>
    <script type="text/javascript">
jQuery(document).ready(function($) {
  $('#logo-slider')
      .before('<div class="slider-controls"><a href="#" id="prev">&lt;</a> <a href="#" id="next">&gt;</a></div>')
    .cycle({ 
    timeout: 12000,
    fx:      'scrollHorz',
    next:   '#prev',
  prev:   '#next',
});
});
</script>



<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48507623-1', 'femac.com.sg');
  ga('send', 'pageview');

</script>
  </body>
</html>