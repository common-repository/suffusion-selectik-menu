<?php

/* 
Plugin Name: Suffusion Selectik Menu
Version: 0.2
Plugin URI: http://drafie-design.nl
Description: This Plugin improve the look of Select Lists loaded by Suffusion on mobile devices. Based on selectik jQuery plugin by Ivan Kubrakov (https://github.com/Brankub/selectik) 
Author: Ciprian Dracea (Drake)
Requires at least: 3.4
Tested up to: 3.9.1
Stable tag: 0.2
Licence:  GPLv2 or later. (http://www.gnu.org/licenses/gpl-2.0.html)
*/ 

//////////////////////////////////////////////////
// REGISTER & ENQUEUE SELECTIK JAVASCRIPT
//////////////////////////////////////////////////

function register_suf_selectik() {                          	// FUNCTION FOR REGISTER SCRIPT
   wp_register_script(                              		// REGISTER SCRIPT "suf_selectik"
     'suf_selectik',                                        	// REQUIRED: NAME FOR CUSTOM SCRIPT
      plugins_url('/includes/jquery.selectik.min.js', __FILE__),
      array('jquery'),                              		// Optional: SCRIPT TYPE (jQuery)
      false                                         		// OPTIONAL: LOAD SCRIPT IN FOOTER
    );
}
add_action('init', 'register_suf_selectik');                	// ADD "suf_selectik" SCRIPT REGISTRATION

function enqueue_suf_sel_scripts(){                          	// FUNCTION FOR ENQUEUE SCRIPT
  wp_enqueue_script('suf_selectik');                           // ENQUEUE SCRIPT "suf_selectik"
}
add_action('wp_print_scripts', 'enqueue_suf_sel_scripts');   	// ADD "suf_selectik" TO "WP_PRINT_SCRIPTS"

function register_selopt() {                         		// FUNCTION FOR REGISTER SCRIPT
   wp_register_script(                                		// REGISTER SCRIPT "TINYOPT"
     'selopt',                                       		// REQUIRED: NAME FOR CUSTOM SCRIPT
      plugins_url('/includes/selectik-option.js', __FILE__),
      array('jquery'),                                		// Optional: SCRIPT TYPE (jQuery)
      true                                           		// OPTIONAL: LOAD SCRIPT IN FOOTER
    );
}
add_action('init', 'register_selopt');               		// ADD "selopt" JAVA SCRIPT REGISTRATION

function enqueue_selopt(){                           		// FUNCTION FOR ENQUEUE SCRIPT
  wp_enqueue_script('selopt');                       		// ENQUEUE SCRIPT
}
add_action('wp_enqueue_scripts', 'enqueue_selopt', 20);    	// ADD SCRIPT "selopt" TO "WP_ENQUEUE_SCRIPTS"

//////////////////////////////////////////////////
// LOADING DEFAULT STYLESHEET
//////////////////////////////////////////////////

function suf_selectik_styles() {                               // FUNCTION FOR CUSTOM STYLE
    wp_register_style( 'suf_selectik_style',                   // REGISTER CUSTOM STYLE
      plugins_url('/includes/selectik.css', __FILE__)   	// GET STYLESHEET URL
);                                                	
  wp_enqueue_style( 'suf_selectik_style' );             	// ENQUEING STYLE
}
add_action('wp_enqueue_scripts', 'suf_selectik_styles');   	// ADD CUSTOM STYLE

//////////////////////////////////////////////////
// RETRIEVE SUFFUSION BREAKPOINTS
//////////////////////////////////////////////////
global $suf_responsive_stops, $suf_responsive_nav_switch, $suf_selectik_ret; 
$options=get_option('suffusion_options');
$suf_responsive_nav_switch = $options['suf_responsive_nav_switch'];
$suf_responsive_stops = $options['suf_responsive_stops'];
$suf_selectik_ret='';

// GENERATE CSS FOR EACH BREAKPOINT
function suffusion_get_selectik_width_css() {
global $suf_responsive_stops, $suf_responsive_nav_switch, $suf_selectik_ret;
	$stops = explode(',', $suf_responsive_stops);
	$nav_switch = 10000;
	$selectik_nav = '';
	$no_selectik ='';
	$selectik_nav .= ".custom-select {display: none;}\n";
	$no_selectik .= "#nav ul, #nav-top ul {display:inline-block !important;}\n";

	if ($suf_responsive_nav_switch == 'always') {
		$suf_selectik_ret .= '';
	}
	else if ($suf_responsive_nav_switch == 'never') {
		$suf_selectik_ret .= $no_selectik;
		$suf_selectik_ret .= $selectik_nav;
	}
	else  {
		$nav_switch = rtrim($suf_responsive_nav_switch, 'px');
	}
	
	foreach ($stops as $stop) {
	$n_stop = rtrim($stop, 'px');
		$suf_selectik_ret .= "@media screen and (min-width: $stop) {";
		if ($n_stop >= $nav_switch) {
			$suf_selectik_ret .= $selectik_nav;
		}
		$suf_selectik_ret .= "}";
	}
	return $suf_selectik_ret;
}

// ADD CSS INTO HEAD SECTION
function add_selectik_breakpoints() {
echo '<style>'.suffusion_get_selectik_width_css().'</style>';
}
add_action('wp_head','add_selectik_breakpoints');