<?php
/**
* This is where you can copy and paste your functions !
*/

/**
 * Proper way to enqueue scripts and styles
 */
function theme_name_scripts() {
	//TODO: remove hardcoded scripts
	//wp_enqueue_style( 'google-maps-css', "http://code.google.com/apis/maps/documentation/javascript/examples/default.css" );
	//wp_enqueue_script( 'google-maps-api', 'http://maps.google.com/maps/api/js?sensor=false');
	//wp_enqueue_script( 'map', ' http://localhost/seasidestreet/wp-content/themes/customized_seaside_theme/js/map.js', array('google-maps-api'), '1.0.0', true );
	
	//wp_enqueue_style('bootstrap-css', "http://localhost/seasidestreet/wp-content/themes/customized_seaside_theme/css/bootstrap.min.css");
	//wp_enqueue_script('bootstrap', "http://localhost/seasidestreet/wp-content/themes/customized_seaside_theme/js/bootstrap.min.js", array('jquery'));
}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

// Register custom navigation walker
require_once('seaside_navwalker.php');

function initialize_globals() {
  
  //register custom navigation locations
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'extra-menu' => __( 'Extra Menu' )
    )
  );
    
  //TODO: extract in a template parameters 	
  $GLOBALS['percentage_of_sale_orders'] = 60;
  $GLOBALS['seaside_min_discount'] = 10;
  $GLOBALS['seaside_max_discount'] = 12;

}
add_action( 'init', 'initialize_globals' );

add_action('template_redirect' , function() {
  //leave only the menu section in the front page template
  if ( is_front_page() ){
 	  //remove actions
	  /*remove_all_actions('__header');
	  remove_all_actions('__before_header');
	  remove_all_actions('__after_header');
	  remove_all_actions('__footer');
	 
	  remove_all_actions('__loop');
	  remove_all_actions('__before_article');
	  remove_all_actions('__after_article');
	  remove_all_actions('__before_main_wrapper');
	  remove_all_actions('__before_main_container');
	  remove_all_actions('__before_article_container');
	  remove_all_actions('__before_loop');
	  remove_all_actions('__after_main_wrapper');
	  remove_all_actions('__after_main_container');
	  remove_all_actions('__after_article_container');
	  remove_all_actions('__after_loop');*/
  }
});

// Add specific CSS class by filter
add_filter( 'body_class', function ( $classes ) {
	
	// add specific background class to the body $classes array. Landing image for front page only
	if(is_front_page())
		$classes[] = 'front-page-background';
	
	// return the $classes array
	return $classes;
}, 10, 1);

add_action('woocommerce_before_shop_loop', 'apply_discounts', 15);

function apply_discounts(){

	echo "woocommerce_before_shop_loop :: called... ";
	
	if(/*$GLOBALS['sales_price_initialized_for_today'] != date("Ymd")*/ true){
	
		//set current date as flag
		$GLOBALS['sales_price_initialized_for_today'] = date("Ymd");
			
		//TODO: investigate woocommerce_product_is_on_sale filter
		 
		 $args = array( 
			'post_type' => 'product', 
			//'orderby' => 'post_excerpt', 
			'order' => 'ASC',
			//'product_cat' => 'My Product Category',
			'post_status' => 'publish'
		);
		$loop = new WP_Query( $args );

		$products = $loop->found_posts;
		$sale_products_count = round($products * $GLOBALS['percentage_of_sale_orders'] / 100);
		
		$products_for_sale = range(0, $products-1);
		shuffle($products_for_sale);
		$products_for_sale_array_id = array_slice($products_for_sale, 0, $sale_products_count);
		$index = 0;
		
		while ( $loop->have_posts() ) {
			
			$loop->the_post();
			$price = get_post_meta( get_the_ID(), '_regular_price');
			$sale_price = get_post_meta( get_the_ID(), '_sale_price');
			
			$discount_percentage = rand($GLOBALS['seaside_min_discount'], $GLOBALS['seaside_max_discount']);
			
			//calculate the Sale price
			$sale_price =  $price[0]*(1 - $discount_percentage / 100);
			
			if(in_array($index, $products_for_sale_array_id)){
				update_post_meta( get_the_ID(), '_sale_price', $sale_price);
				update_post_meta( get_the_ID(), '_price', $sale_price);
			}else{
				//reset the sale price potentially set on previously
				update_post_meta( get_the_ID(), '_sale_price', null);
				update_post_meta( get_the_ID(), '_price', $price[0]);
			}
			
			$index = $index + 1;
		}
	
	}
}