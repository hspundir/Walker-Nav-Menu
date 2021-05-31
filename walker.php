<?php

// Walker class here

class Walker_Bootsrap_Nav_Menu extends Walker_Nav_Menu{

    function start_lvl( &$output, $depth = 0, $args = array() ){
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .="\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";

    }
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){
        $indent = ( $depth ) ? str_repeat("\t", $depth): '';
        $li_attributes = '';
        $class_names = $value ='';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = ($args->walker->has_children) ? 'dropdown' : 'nav-item';
        $classes[] = ($item->current || $item->current_item_anchestor) ? 'active' : '';
        $classes[] = 'menu-item-'.$item->ID;
        if($depth && $args->walker->has_children ){
            $classes[] = 'dropdown-submenu';            
        }
        $class_names = join(' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = 'class="'.esc_attr($class_names).'"'; 
        $id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args );
        $id = strlen( $id ) ? ' id="'.esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes. '>';

        $attributes = !empty( $item->attr_title ) ? 'title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty( $item->target ) ? 'target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty( $item->rel ) ? 'rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty( $item->url ) ? 'href="' . esc_attr($item->url) . '"' : '';
        
        $attributes .= ( $args->walker->has_children && $depth == 0) ? 'class="nav-link dropdown-toggle" data-toggle="dropdown"' : '';
        $attributes .= ( $args->walker->has_children && $depth == 1) ? 'class="dropdown-item dropdown-toggle" data-toggle="dropdown"' : '';
        $attributes .= ( $depth == 0 ) ? 'class="nav-link"' : '';
        $attributes .= ( $depth == 1 ) ? 'class="dropdown-item"' : '';
        $attributes .= ( $depth == 2 ) ? 'class="dropdown-item"' : '';

        $item_output = $args->before;
        $item_output .= '<a ' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->id ) . $args->link_after;
        $item_output .=($depth == 0 && $args->walker->has_children ) ? '<b class="caret"></b></a>': '</a>';
        $item_output .=$args->after; 
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
    /* function start_el(&$output, $item, $depth=0, $args=[], $id=0) {      
        
        
        $output .= "<li class='" .  implode(" ", $item->classes) . "'>";
 
		if ($item->url && $item->url != '#') {
			$output .= '<a href="' . $item->url . '">';
		} else {
			$output .= '<span>';
		}
 
		$output .= $item->title;
 
		if ($item->url && $item->url != '#') {
			$output .= '</a>';
		} else {
			$output .= '</span>';
		}
	} */

    // function end_el(){

    // }
    // function end_lvl(){
        
    // }








}