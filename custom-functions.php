<?php

/********************************************************/
//	URI Options admin menu - weather and general alert	//
/********************************************************/

$shortname = 'alert';
$options = array (
$shortname."_general" => 
array("name" => "General Alert",
	  "desc" => "Enter a description for the alert message.",
	  "id" => $shortname."_general",
	  "type" => "text"),

$shortname."_weather" => 
array("name" => "Weather Alert",
	  "desc" => "Enter a description for the weather alert message.",
	  "id" => $shortname."_weather",
	  "type" => "text"),

$shortname."_general_enable" => 
array("name" => "Enable General Alert:",
	  "desc" => "Check this box if you would like to ENABLE the alert message.",
	  "id" => $shortname."_general_enable",
	  "type" => "checkbox",
	  "std" => "false"),

$shortname."_weather_enable" => 
array("name" => "Enable Weather Alert:",
	  "desc" => "Check this box if you would like to ENABLE the weather alert message.",
	  "id" => $shortname."_weather_enable",
	  "type" => "checkbox",
	  "std" => "false")
);


if ( is_multisite() ) 
	add_action('network_admin_menu','add_uri_options_admin_menus');
else
	add_action('admin_menu','add_uri_options_admin_menus');

function add_uri_options_admin_menus() {
	global $options;

	if (isset($_POST["update_settings"])) {
		foreach ($options as $value) 
			update_site_option($value['id'], $_REQUEST[$value['id']]);

		foreach ($options as $value) {
			if(isset($_REQUEST[$value['id']])) { 
				//update_option($value['id'], $_REQUEST[$value['id']]);
				update_site_option($value['id'], $_REQUEST[$value['id']]);
			} 
			else { 
				//delete_option($value['id']);
				delete_site_option($value['id']);
			}
		}
		?>  
			<div id="message" class="updated">Settings saved</div>  
		<?php
	}
	add_menu_page('URI Network', 'URI Network', 'manage_network', 'uri_network_options', 'theme_uri_network_options', null, 59);
}

// TODO: add hyperlink recognition
// TODO: add time start & time end
// TODO: create page from options array above
function theme_uri_network_options(){
	global $options;
	
	//$alert_general_enable = get_option("alert_general_enable");
	//$alert_general = get_option("alert_general");  
	$alert_general_enable = get_site_option("alert_general_enable");
	$alert_general = get_site_option("alert_general");  
	if (strpos($alert_general, "\\")) {
		$alert_general = str_replace("\\", "", $alert_general);
		$alert_general = str_replace("\"", "'", $alert_general);
	}
			
	//$alert_weather_enable = get_option("alert_weather_enable");
	//$alert_weather = get_option("alert_weather");
	$alert_weather_enable = get_site_option("alert_weather_enable");
	$alert_weather = get_site_option("alert_weather");

		if ( strpos($alert_weather, "\\") ) {
			$alert_weather = str_replace("\\", "", $alert_weather);
			$alert_weather = str_replace("\"", "'", $alert_weather);
		}
	
	?>  
	<div class="wrap">  
		<?php screen_icon('themes'); ?> <h2>Network Alert Messages</h2>  
		
		<form method="POST" action="">  
			<table class="form-table">  
				<tr valign="top">  
					<td width="15%">  
						<label for="<?php echo $options["alert_general"]["id"]?>">  
							<?php echo $options["alert_general"]["name"]?>
						</label>  
					</td>  
					<td width="85%">  
						<input type="<?php echo $options["alert_general"]["type"]?>" 
							name="<?php echo $options["alert_general"]["id"]?>" 
							style="width:700px;" value="<?php echo $alert_general;?>"/> <br />
						 <?php echo $options["alert_general"]["desc"]?>
					</td>  
				</tr>
				<tr valign="top">  
					<td width="15%">  
						<label for="<?php echo $options["alert_general_enable"]["id"]?>">  
							<?php echo $options["alert_general_enable"]["name"]?>
						</label>  
					</td>  
					<td width="85%">  
						<input type="checkbox" name="<?php echo $options["alert_general_enable"]["id"]?>" 
							<?php if($alert_general_enable) echo 'checked="yes"';?>/>
						 <?php echo $options["alert_general_enable"]["desc"]?>
						 <br /><br />
					</td> 
				</tr>
				
				<tr valign="top">
					<td width="15%">  
						<label for="<?php echo $options["alert_weather"]["id"]?>">  
							<?php echo $options["alert_weather"]["name"]?>
						</label>	
					</td>  
					<td width="85%">  
						<input type="<?php echo $options["alert_weather"]["type"]?>" 
							name="<?php echo $options["alert_weather"]["id"]?>" 
							style="width:700px;" value="<?php echo $alert_weather;?>"/> <br />
						 <?php echo $options["alert_weather"]["desc"]?>
					</td>  
				</tr>
				 <tr valign="top">  
					<td width="15%">  
						<label for="<?php echo $options["alert_weather_enable"]["id"]?>">  
							<?php echo $options["alert_weather_enable"]["name"]?>
						</label> 
					</td>  
					<td width="85%">  
						<input type="checkbox" name="<?php echo $options["alert_weather_enable"]["id"]?>" 
							<?php if($alert_weather_enable) echo 'checked="yes"';?>/>
						 <?php echo $options["alert_weather_enable"]["desc"]?>
					</td>  
				</tr>
			</table>
			 <p class="submit">
				<input name="save" type="submit" value="Save changes" />
				<input type="hidden" name="update_settings" value="save" />
			</p>
		</form> 
		</div>
   		<?php
	
} 


/********************************************************/
//			Enqueue Custom Stylesheets and Scripts	   //
/********************************************************/

add_action('wp_enqueue_scripts', 'uri_responsive_enqueue_scripts');
function uri_responsive_enqueue_scripts() {
	///////////////////
	//Enqueue scripts
	///////////////////
	//wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
	// $handle : Name that wordpress handles this script with.
	// $src : location of the script file, if it's not included already.
	// $deps : Other scripts THIS scripts depends upon. Default - array()
	// $ver : Version of the script. Optional. - Default - WordPress version.
	// $in_footer : Loads the script in footer. - Default - false.
		
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
		
	
	///////////////////
	//Enqueue styles
	///////////////////
	//wp_enqueue_style( $handle, $src, $deps, $ver, $media );
	// $handle : Name of the stylesheet.
	// $src : Path to the stylesheet.
	// $deps : Styles that should be loaded before this style.
	// $ver : Version of the style.
	// $media : screen , media, handheld or print.
	
	//Google Web Fonts embedding
	//wp_enqueue_style( 'custom-google-fonts', 'http://fonts.googleapis.com/css?family=Merriweather');
	
		//Print letterhead styling
	if (themify_get('setting-letterhead_print_enabled')) {
		wp_register_style( 'uri-responsive-print-styles', get_template_directory_uri() . '/print.css', array(), '', 'print' );  
		wp_enqueue_style( 'uri-responsive-print-styles');
	}	
}
	
	
//add_action( $tag, $function_to_add, $priority, $accepted_args );
//The $priority parameter defaults to 10, and the $accepted_args parameter defaults to 1. 
//If we want our scripts or styles to be enqueued earlier, we simply lower the value for $priority from the default.
add_action('wp_enqueue_scripts', 'uri_responsive_enqueue_scripts2', 5);
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
add_action('wp_enqueue_scripts', 'kill_autocomplete');
