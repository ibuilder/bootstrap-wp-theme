<?php
/**
 * Bootstrap 5 Nav Walker
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Class Bootstrap_Navwalker
 * A custom WordPress nav walker class for Bootstrap 5 navigation
 */
class Bootstrap_Navwalker extends Walker_Nav_Menu {
    /**
     * Starts the element output.
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'nav-item';
        
        // Add dropdown class for items with children
        $has_children = in_array('menu-item-has-children', $classes);
        if ($has_children) {
            $classes[] = 'dropdown';
        }
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $output .= $indent . '<li' . $class_names . '>';
        
        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';
        
        // Add nav-link class
        $atts['class'] = 'nav-link';
        
        // For dropdowns
        if ($has_children) {
            $atts['class'] .= ' dropdown-toggle';
            $atts['data-bs-toggle'] = 'dropdown';
            $atts['aria-expanded'] = 'false';
        }
        
        // Add active class
        if (in_array('current-menu-item', $classes)) {
            $atts['class'] .= ' active';
        }
        
        // Dropdown items
        if ($depth > 0) {
            $atts['class'] = 'dropdown-item';
        }
        
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        
        $title = apply_filters('the_title', $item->title, $item->ID);
        
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
    /**
     * Starts the list before the elements are added.
     */
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }
}