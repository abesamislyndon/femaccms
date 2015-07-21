<?php get_header(); ?>
  <div class="container">
    <div class="bg-container">
      <div class="row no-gutters">
          <div class="col-md-9">
          	 <?php the_post(); ?>
              <h4 class = "page-title1"><i class="fa fa-rss"></i>&nbsp;&nbsp;&nbsp;<?php the_title();?></h4>
            <div class="page">
               
  					<p>by &nbsp;<?php the_author();?>&nbsp;&nbsp;on&nbsp;<?php the_time('jS F Y'); ?></p>
  					<p><?php the_content();?></p>
  					<p><?php comments_template();?></p>
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




