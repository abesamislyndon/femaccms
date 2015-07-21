<?php get_header(); ?>
  <div class="container">
    <div class="bg-container">
      <div class="row no-gutters">
          <div class="col-md-9">
		         <div class="page2">
		         	<img src="<?php echo bloginfo('template_url');?>/img/404.jpg " alt="">
		         	<p>PAGE NOT FOUND</p>
		         	<p>Sorry, but the page you are looking for  has not been found.Try Checking the URL for errors or check sidebar menu, if cannot please contact us so we could serve your queries </p>
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




