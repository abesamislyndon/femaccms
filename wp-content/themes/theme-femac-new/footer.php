	<footer>
		<div class="row no-gutters">
         <div class="col-md-12 footer">
            <div class="col-md-4">
              <div class="social-media-link">
                  <ul>
                    <li><i class="fa fa-facebook-official"></i></li>
                    <li><i class="fa fa-instagram"></i></li>
                    <li><i class="fa fa-twitter-square"></i></li>
                  </ul>
              </div>
            </div>

            <div class="col-md-8">
               <div class="copyright">
               <p>©2013 Femac Singapore Pte Ltd. All Rights Reserved. Design by Exhibit Media Pte Ltd </p>
               </div>
            </div>
        </div> 
     </div>
   </footer>   

    </div><!--end og bg-container-gray-->
  </div><!--end of container 2-->


 <script>
      $(function(){
      $('#nav').click(function() {
        $(this).toggleClass('open');
      });
    });
  </script>
 <?php wp_footer(); ?>
  <script src="<?php echo bloginfo('template_url');?>/js/script.js"></script>
</body>
</html>