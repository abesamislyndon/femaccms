<?php
		// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"), false);
	   wp_enqueue_script('jquery');
	}
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    


remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="main">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}
add_theme_support( 'woocommerce' );


add_action( 'init', 'register_my_menus' ); 
function register_my_menus() {
    register_nav_menus(
        array(
            'primary-menu' => __( 'upper-navigation' ),
            'secondary-menu' => __( 'side-bar-dough-processing' )
        )
    );
}

function my_wp_nav_menu_args( $args = '' ) {
    $args['container'] = false;
    return $args;
}
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );



// ADD ATTACHMENTS TO PRODUCT SUMMARY
    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_summary_pdf', 30, 2);

    function woocommerce_template_summary_pdf() {
        global $woocommerce, $product, $post;
        
        $args = array( 'post_type'      => 'attachment', 
                       'post_status'    => null, 
                       'post_parent'    => $post->ID, 
                       'numberposts'    => '999', 
                       'post_mime_type' => array( 'application/pdf','application/vnd.ms-excel','application/msword' )
                       ); 
        
        $attachments = get_posts( $args );
        
        if ( $attachments ) :
            
            $download = '<ul class="download">';
            
            foreach ( $attachments as $attachment ) :
                    
                    setup_postdata($attachment);
                    
                    // SETUP THE ATTACHMENT ICON
                    $attachment_icon = get_post_mime_type( $attachment->ID );
                    $attachment_icon = explode( '/',$attachment_icon );
                    $attachment_icon = $attachment_icon[1];         
                
                    // MAKE THE ATTACHMENT LIST ITEM
                    $download .= '<li><a href="' . wp_get_attachment_url($attachment->ID) . 
                                 '" target="_blank"><span>' . $attachment_icon . get_the_title($attachment->ID) . '<span></a></li>';
            
            endforeach;
            
            $download .= '</ul><div class="clear"></div>';
            
            echo $download;
            
        endif;
    }

add_action( 'genesis_meta', 'wpb_add_google_fonts', 5);

function wpb_add_google_fonts() {
        echo "<link href='http://fonts.googleapis.com/css?family=Share+Tech' rel='stylesheet' type='text/css'>";
}


if ( function_exists('register_sidebar') ) {
register_sidebar(array(
'name' => 'Woo Search',
'id' => 'homepage-sidebar',
'description' => 'Appears as the sidebar on the custom homepage',
'before_widget' => '<div style="height:5px"></div><li id="%1$s" class="widget %2$s">',
'after_widget' => '</li>',
'before_title' => '<h2 class="widgettitle">',
'after_title' => '</h2>',
));
}   

    // enable to limit excerpt and force to add read more links in post
    function new_excerpt_more( $more ) 
    {
    return '</br></br><a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read More</a>';
    }
    add_filter( 'excerpt_more', 'new_excerpt_more' );
    function get_cat_slug($cat_id) 
    {
    $cat_id = (int) $cat_id;
    $category = the_content($cat_id);
    return $category->slug;
    }

    // enable wordpress to trim rea more the_content or the_excerpt
    function new_excerpt_length($length) {
      return 30;
    }
    add_filter('excerpt_length', 'new_excerpt_length');

    add_filter('loop_shop_per_page', create_function('$cols', 'return 200;'));


if (function_exists('st_makeEntries')) :
add_shortcode('sharethis', 'st_makeEntries');
endif;

function woocommerce_output_related_products() {
woocommerce_related_products(8,4); // Display 3 products in rows of 3
}


add_action( 'wp_enqueue_scripts', 'frontend_scripts_include_lightbox' );
function frontend_scripts_include_lightbox() {
  global $woocommerce;
  $suffix      = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
  $lightbox_en = get_option( 'woocommerce_enable_lightbox' ) == 'yes' ? true : false;
  if ( $lightbox_en ) {
    wp_enqueue_script( 'prettyPhoto', $woocommerce->plugin_url() . '/assets/js/prettyPhoto/jquery.prettyPhoto' . $suffix . '.js', array( 'jquery' ), $woocommerce->version, true );
    wp_enqueue_script( 'prettyPhoto-init', $woocommerce->plugin_url() . '/assets/js/prettyPhoto/jquery.prettyPhoto.init' . $suffix . '.js', array( 'jquery' ), $woocommerce->version, true );
    wp_enqueue_style( 'woocommerce_prettyPhoto_css', $woocommerce->plugin_url() . '/assets/css/prettyPhoto.css' );
  }
}


// custom admin login logo
function custom_login_logo() {
  echo '<style type="text/css">
   h1 a { background-image: url('.get_bloginfo('template_directory').'/images/logo-admin.png) !important; }
  </style>';
}
add_action('login_head', 'custom_login_logo');


?>