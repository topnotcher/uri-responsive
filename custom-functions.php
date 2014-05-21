<?php

/**
 * URI Options admin menu - weather and general alert	//
 */
$shortname = 'alert';

$options = array(
	$shortname.'_general' => array(
		'name' => 'General Alert',
		'desc' => 'Enter a description for the alert message.',
		'id' => $shortname.'_general',
		'type' => 'text'
	),
	$shortname.'_weather' => array(
		'name' => 'Weather Alert',
		'desc' => 'Enter a description for the weather alert message.',
		'id' => $shortname."_weather",
		'type' => 'text'
	),
	$shortname.'_general_enable' => array(
		'name' => 'Enable General Alert:',
		'desc' => 'Check this box if you would like to ENABLE the alert message.',
		'id' => $shortname.'_general_enable',
		'type' => 'checkbox',
		'std' => 'false'
	),
	$shortname.'_weather_enable' => array(
		'name' => 'Enable Weather Alert:',
		'desc' => 'Check this box if you would like to ENABLE the weather alert message.',
		'id' => $shortname.'_weather_enable',
		'type' => 'checkbox',
		'std' => 'false'
	)
);

add_action((is_multisite() ? 'network_' : '').'admin_menu','uri_options_admin_menus');
add_action('wp_enqueue_scripts', 'kill_autocomplete');
add_action('wp_enqueue_scripts', 'uri_responsive_enqueue_scripts');

//The $priority parameter defaults to 10, and the $accepted_args parameter defaults to 1. 
//If we want our scripts or styles to be enqueued earlier, we simply lower the value for $priority from the default.
add_action('wp_enqueue_scripts', 'uri_responsive_enqueue_scripts2', 5);


function uri_options_admin_menus() {
	global $options;

	add_menu_page('URI Network', 'URI Network', 'manage_network', 'uri_network_options', 'theme_uri_network_options', null, 59);

	if ( isset($_POST['update_settings']) ) {
		foreach ($options as $value) {
			if (isset($_REQUEST[$value['id']]) ) 
				update_site_option($value['id'], $_REQUEST[$value['id']]);
			else 
				delete_site_option($value['id']);
		}
		echo '<div id="message" class="updated">Settings saved</div>';
	}
}

function theme_uri_network_options(){
	global $options;
	
	$alert_general_enable = get_site_option("alert_general_enable");
	$alert_general = get_site_option("alert_general");  

	if (strpos($alert_general, "\\")) {
		$alert_general = str_replace("\\", "", $alert_general);
		$alert_general = str_replace("\"", "'", $alert_general);
	}
			
	$alert_weather_enable = get_site_option("alert_weather_enable");
	$alert_weather = get_site_option("alert_weather");

	if ( strpos($alert_weather, "\\") ) {
		$alert_weather = str_replace("\\", "", $alert_weather);
		$alert_weather = str_replace("\"", "'", $alert_weather);
	}

	require 'theme-options.php';
} 

/**
 *		Enqueue Custom Stylesheets and Scripts
 */

function uri_responsive_enqueue_scripts() {
		
	// Deregister the included library  
	wp_deregister_script( 'jquery' );  
		
	wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery.js', array(), null, false );  
		 
	 // Register the script: 
	wp_register_script( 'global-header-slide-script', get_template_directory_uri() . '/js/slide.js', array( 'jquery' ) );
	wp_enqueue_script( 'global-header-slide-script');
	//wp_enqueue_script( 'global-header-slide-script', get_template_directory_uri() . '/js/slide.js', array('jquery'), false, true );
			 
	wp_register_script( 'expMenu-script', get_template_directory_uri() . '/js/expMenu.js', array( 'jquery' ) ); 
	wp_enqueue_script( 'expMenu-script');
	//wp_enqueue_script( 'expMenu-script', get_template_directory_uri() . '/js/expMenu.js', array('jquery'), false, true );
		
	
	//Google Web Fonts embedding
	//wp_enqueue_style( 'custom-google-fonts', 'http://fonts.googleapis.com/css?family=Merriweather');
	
	//Print letterhead styling
	if (themify_get('setting-letterhead_print_enabled')) {
		wp_register_style( 'uri-responsive-print-styles', get_template_directory_uri() . '/print.css', array(), '', 'print' );  
		wp_enqueue_style( 'uri-responsive-print-styles');
	}	
}
		
function uri_responsive_enqueue_scripts2(){		
	//Global-header styling
	wp_register_style( 'global-header-styles', get_template_directory_uri() . '/global-header.css', array(), '', 'all' );  
	wp_enqueue_style( 'global-header-styles');
		
}

//To disable Autocomplete HTML attribute for password field
function kill_autocomplete() {
   wp_register_script('kill-ac',
	   get_template_directory_uri() . '/js/autocompleteoff.js',
	   array('jquery'),
	   '1.0' );
   wp_enqueue_script('kill-ac');
}


