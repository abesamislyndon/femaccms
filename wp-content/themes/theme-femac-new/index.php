<?php get_header(); ?>
  <div class="container">
   <div class="bg-container">
      <div class="row no-gutters">
        <div class="banner">
          <div class="row no-gutters">
            <div class="col-md-6 banner-photo">
                <?php echo do_shortcode('[layerslider id="1"]'); ?>
            </div>
            <div class="col-md-6">
                <div class="">
                  <div class="call-us">
                  <?php $id =813; $page_data = get_page($id);?>
                      <p><?php $post = get_page($id); $content = apply_filters('the_content', $post->post_content); echo $content; ?></p>
                  </div><!--end of lend of call us-->
                </div>

                <div class="">
                  <div class="who-we">
                      <h4>who we are</h4>
                        <?php
                            $id =21;
                            $content_post = get_page($id);
                            $content = $content_post->post_content;
                            $trimmed_content = wp_trim_words($content, 25, '....' );
                            echo $trimmed_content;
                            echo '<br><br>'.'<a href="'.get_permalink($id).'">→ read more</a>';
                        ?>

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

  <div class="row no-gutters top" >
        <div class="col-md-4 mini-footer">
            <div class="contact" id="googlemaps">
                <h4>CONTACT US</h4>
                <p>Femac Singapore Pte. Ltd</br>
                   12 Tagore Lane</br>
                   Singapore 787474</br>
                   Tel: +65 6454 7277</br>
                   Fax: +65 6458 7701</br>
                   Email: info@femac.com.sg
                </p>
            </div><!--end of contact-->
        </div>

        <div class="col-md-8">
            <div class="">
                <div class="latest-blog">
                 <h4>Latest Blog <i class="fa fa-rss"></i></h4>
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
                   </div><!--end of blog -->
                 </div>

            <div class="">
                <div class="latest-news">
                 <h4>Latest News <i class="fa fa-newspaper-o"></i></h4>
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
                </div><!--end of latest-news-->
            </div>
        </div>
    </div>


<?php get_footer(); ?>
