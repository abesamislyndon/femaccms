<?php //This part is required for WordPress to recognize it as a page template
/*
Template Name:PAGE-PRODUCT
*/
?>
<?php get_header(); ?>
<div class="container">
  <div class="bg-container">
    <div class="row no-gutters">
        <div class="col-md-9">
            <h4 class = "page-contact"><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;&nbsp;Contact us</h4>
          <div class="page">
            <?php echo do_shortcode(' [CONTACT-US-FORM] ');?>
            <hr>
            <iframe width="100%" height="670" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.sg/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=+Femac+Singapore+Pte+Ltd&amp;aq=&amp;sll=1.385848,103.828987&amp;sspn=0.013193,0.018926&amp;gl=sg&amp;ie=UTF8&amp;hq=Femac+Singapore+Pte+Ltd&amp;hnear=&amp;t=m&amp;cid=7173022648295114273&amp;ll=1.396499,103.827152&amp;spn=0.030032,0.05579&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com.sg/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=+Femac+Singapore+Pte+Ltd&amp;aq=&amp;sll=1.385848,103.828987&amp;sspn=0.013193,0.018926&amp;gl=sg&amp;ie=UTF8&amp;hq=Femac+Singapore+Pte+Ltd&amp;hnear=&amp;t=m&amp;cid=7173022648295114273&amp;ll=1.396499,103.827152&amp;spn=0.030032,0.05579&amp;z=14&amp;iwloc=A" style="color:#0000FF;text-align:left">View Larger Map</a></small>
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