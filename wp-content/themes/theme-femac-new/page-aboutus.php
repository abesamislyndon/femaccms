<?php //This part is required for WordPress to recognize it as a page template
/*
Template Name:PAGE-ABOUTUS
*/
?>
<?php get_header(); ?>
<div class="container">
  <div class="bg-container">
    <div class="row no-gutters">
  		<div class="col-md-9">
  			  <h4 class = "page-title1"><i class="fa fa-building-o"></i>&nbsp;&nbsp;&nbsp;ABOUT US</h4>
           <div class="page">
                  <?php $id =4; $page_data = get_page($id);?>
                  <p><?php $post = get_page($id); $content = apply_filters('the_content', $post->post_content); echo $content; ?></p>
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