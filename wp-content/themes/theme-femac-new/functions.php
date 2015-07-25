<?php
		// Add RSS links to <head> section
	automatic_feed_links();
	


	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    


      function my_theme_wrapper_start() {
        echo '<section id="main">';
      }

      function my_theme_wrapper_end() {
        echo '</section>';
      }
  


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
    return '</br></br><a class="read-more" href="'. get_permalink( get_the_ID() ) . '">→  Read More</a>';
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

    add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +
    function woo_custom_cart_button_text() {
     
            return __( '<i class="fa fa-cart-arrow-down"></i>&nbsp;&nbsp;add to Quote', 'woocommerce' );
     
    }

    add_filter( 'woocommerce_product_add_to_cart_text', 'woo_custom_cart_button_text1' );      // 2.1 +
    function woo_custom_cart_button_text1() {
     
            return __( 'Add to Quote', 'woocommerce' );
     
    }

    remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 );

    // custom admin login logo
    function custom_login_logo() {
      echo '<style type="text/css">
       h1 a { background-image: url('.get_bloginfo('template_directory').'/images/logo-admin.png) !important; }
      </style>';
    }
    add_action('login_head', 'custom_login_logo');


    add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );
    function enqueue_font_awesome() {

      wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );

    }

    $_SERVER['HTTPS'] = false;


?>