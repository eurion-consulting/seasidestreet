<?php

/**
 * Class Name: seaside_navwalker
 * GitHub URI: see parent
 * Description: Test table renderer
 * Version: 0.0.1
 * Author: Daniel Velev

 */

class seaside_navwalker extends Walker_Nav_Menu {

	function start_lvl(&$output, $depth=0, $args=array()) {
        $output .= '\n<div class="row-fluid" style="height: 20%;">\n';
    }

	function end_lvl(&$output, $depth=0, $args=array()) {
        $output .= "</div>\n";
    }
	
	public function start_el( &$output, $item, $depth = 0, $args = NULL, $id = 0 )
    {
        $output     .= '<div class="col-lg-1 col-md-3 col-xs-6 col-sm-4" style="height: 100%;"	ondrop="drop(event)" ondragover="allowDrop(event)">';

        $attributes  = '';
        if ( ! empty ( $item->url ) )
            $attributes .= ' href="' . esc_url( $item->url ) .'"';

        $description = empty ( $item->description )
            ? '<p>Please add a description!</p>'
            : wpautop( $item->description );

        $title       = apply_filters( 'the_title', $item->title, $item->ID );
       
		$item_output = "<a $attributes draggable='true' id='$title' ondragstart='drag(event)'>" . 
							"<img src='" . get_stylesheet_directory_uri() . "/img/$item->title.png' alt='$item->title' title='$item->title'/>" .
							"<span style='text-align: center;'>$item->title</span>" .
						"</a>";

        // Since $output is called by reference we don't need to return anything.
        $output .= apply_filters(
            'walker_nav_menu_start_el'
            ,   $item_output
            ,   $item
            ,   $depth
            ,   $args
        );
    }

	public function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= "</div>\n";
	}
}
