<?php //This part is required for WordPress to recognize it as a page template
/*
Template Name:PAGE-BLOG
*/
?>
<?php get_header(); ?>
<div class="container">
  <div class="bg-container">
    <div class="row no-gutters">
        <div class="col-md-9">
          <h4 class = "page-title1"><i class="fa fa-rss"></i>&nbsp;&nbsp;&nbsp;Blog</h4>
          <div class="page">
              <ul>
                      <li>                  
                          <?php
                            $temp = $wp_query;
                            $wp_query= null;
                            $wp_query = new WP_Query();         
                            $wp_query->query('showposts=6'.'&paged='.$paged.'&category_name=BLOG');
                             while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                            <div class = "grid_21 post-div">
                            <article>   
                                <h5><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h5>
                                <span>by&nbsp;<?php the_author(); ?>&nbsp;on&nbsp;<?php the_time('jS F Y') ?></span>
                                <p><?php the_excerpt(__('(more…)')); ?><h6 class = "blog-response"><?php comments_number( 'no comment', '1 comment', '% comment' ); ?><img src = "<?php bloginfo('template_url')?>/images/comment.png"></h6></p>
                            </article>
                                     <hr class = "blog-hr">
                            </div>  
                            <?php endwhile; ?>  
                            </li>
                            <li><?php if(function_exists('wp_simple_pagination')) { wp_simple_pagination();}?></li></br>    
                        </ul>
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