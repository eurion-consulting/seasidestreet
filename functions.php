<?php
/**
* This is where you can copy and paste your functions !
*/

add_action('template_redirect' , function() {
  //leave only the menu section in the front page template
  if ( is_front_page() ){
 	  //remove actions
	  remove_all_actions('__header');
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
	  remove_all_actions('__after_loop');
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

/**
	Replace the text menu item with an image named the same way as the menu item and with 'png' file type.
	For example:
		if the menu option is named "News", a image named News.png is used in "theme/img/" folder
*/
function add_image_to_menu($item_output, $item, $depth, $args) {
    
	$title = $item->title;
	$menu_title_position = strpos($item_output, $title);
	
	$image_menu_item = "<img src='" . get_stylesheet_directory_uri() . "/img/$item->title.png' alt='$item->title' title='$item->title'/>";
	
	$item_output = substr_replace($item_output, $image_menu_item, $menu_title_position, strlen($title));
	return $item_output;
}
add_filter('walker_nav_menu_start_el', 'add_image_to_menu', 20, 4);

/*
	// Remove 3-bars from menu button (only the three lines)
	add_filter('tc_menu_display', function ($output) {
		return preg_replace('|<span class="icon-bar"></span>|', null, $output);
	});

	add_filter('tc_menu_args', function($args){
	
	//$args['walker'] = Seaside_Walker_Nav_Menu::$instance;
	$args['items_wrap'] = '<ul><li id="item-id">Menu: </li>%3$s</ul>';
	print_r($args);
	}, 12);

	function load_child_class(){
		//get_template_directory() : D:\dev\Apache\Apache24\htdocs\seasidestreet\wp-content\themes\customizr\inc\parts\class-header-menu.php
		
		require_once get_template_directory().'\inc\parts\class-header-menu.php';
		
	}
	add_action( 'after_setup_theme', 'load_child_class' );

	class Seaside_Walker_Nav_Menu extends Walker_Nav_Menu {
  
		static $instance;
		
		function __construct () {
			self::$instance =& $this;
		}
	  
		function start_el ( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		
			$item_html = '';
			parent::start_el( $item_html, $item, $depth, $args);

			if ( $item->is_dropdown ) {
			  //makes top menu not clickable (default bootstrap behaviour)
			  $search         = '<a';
			  $replace        = ( ! wp_is_mobile() && 'hover' == esc_attr( TC_utils::$inst->tc_opt( 'tc_menu_type' ) ) ) ? $search : '<a class="dropdown-toggle" data-toggle="dropdown" data-target="#"';
			  $replace       .= strpos($item_html, 'href=') ? '' : ' href="#"' ;
			  $replace        = apply_filters( 'tc_menu_open_on_click', $replace , $search );
			  $item_html      = str_replace( $search , $replace , $item_html);

			  //adds arrows down
			  if ( $depth === 0 )
				  $item_html      = str_replace( '</a>' , ' <b class="caret"></b></a>' , $item_html);
			}
			elseif (stristr( $item_html, 'li class="divider' )) {
			  $item_html = preg_replace( '/<a[^>]*>.*?<\/a>/iU' , '' , $item_html);
			}
			elseif (stristr( $item_html, 'li class="nav-header' )) {
			  $item_html = preg_replace( '/<a[^>]*>(.*)<\/a>/iU' , '$1' , $item_html);
			}

			$output .= $item_html;
		}

		function end_el( &$output, $item, $depth = 0, $args = array() ) {
			$output .= "</li>\n";
		}
	}

	function wpse_remove_parent_theme_locations()
	{
		// @link http://codex.wordpress.org/Function_Reference/unregister_nav_menu
		unregister_nav_menu( 'primary' );
		unregister_nav_menu( 'Smart_Menu' );
		unregister_nav_menu( 'Menu_Smart' );
	}
	add_action( 'after_setup_theme', 'wpse_remove_parent_theme_locations', 20 );

	add_filter('nav_menu_css_class' , 'special_nav_class' , 30 , 2);
	function special_nav_class($classes, $item){
		 //echo "$item";
		 print_r($item->title . " ");
		 if(is_single() && $item->title == 'Live'){ //Notice you can change the conditional from is_single() and $item->title
				 print_r("IN");
				 $classes[] = "special-class";
		 }
		 return $classes;
	}
*/