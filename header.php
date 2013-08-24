<!doctype html>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<!-- reset viewport for mobile - now in theme-functions.php -->

<title><?php if (is_home() || is_front_page()) { echo bloginfo('name'); } else { echo wp_title(''); } ?></title>

<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.png" />

<?php
	if ( class_exists('Zend_Layout') ) : 
		$zfl = Zend_Layout::getMvcInstance()->getView();
	  	echo $zfl->headLink();
		echo $zfl->headScript();
	endif;	
?>

<?php
/**
 *  Stylesheets and Javascript files are enqueued in theme-functions.php
 */
?>

<!-- wp_header -->
<?php wp_head(); ?>

<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-8382499-1']);
	_gaq.push(['_setDomainName', 'uri.edu']);
	_gaq.push(['_trackPageview']);
	
	(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>

</head>

<body <?php body_class($class); ?>>

<div id="headerwrap">
	

    <div id="top">
        <!-- START top global menu -->
                <?php require_once ( get_stylesheet_directory() . '/global-header.php' ); ?>
<div class="toggle">
<div class="drawer"><a class="close but" style="display: none;" href="#"></a></div>
</div>  <!-- end of toggle -->
        <!-- END top global menu -->

		<!-- START toplogo area -->
        <div id="toplogo-bar">
			<div class="pagewidth clearfix">
 				<div class="logo"><a class="urilogo" href="http://www.uri.edu" title="URI Home Page">The University of Rhode Island</a>
                </div>
                        <div class="logoprint"><img width="179" height="75" src="<?php bloginfo('template_directory'); ?>/images/logo-print.png" alt="URI" /></div>
                 
 				<!-- Search Form -->
				 <?php if(!themify_check('setting-exclude_search_form')): ?>
	
     			 <div class="sf">
				<form method="get" action="http://web.uri.edu/searchuri/" name="global_general_search_form">
                	<input type="hidden" name="cx" value="016863979916529535900:17qai8akniu" />
                	<input type="hidden" name="cof" value="FORID:11" />
                	<input name="q" id="q" value="Search The University of Rhode Island" onFocus="if (this.value == 'Search The University of Rhode Island') {this.value=''}" type="text" />
                 	<input class="submit" type="image" src="<?php bloginfo('template_directory'); ?>/images/icon_search.png" alt="Search" />
				</form>
      			</div>
                
                <?php endif ?>
                
                <!-- Quick Links -->
                <div class="quick"><a href="http://www.uri.edu/news/myuri/"><img width="16" height="20" src="<?php bloginfo('template_directory'); ?>/images/icon_mail.png" alt="my.uri.edu" />Webmail</a><a href="http://web.uri.edu/ecampus/"><img width="16"  height="20" src="<?php bloginfo('template_directory'); ?>/images/icon_ecampus.png" alt="eCampus" />eCampus</a><a href="https://sakai.uri.edu"><img width="20" height="20" src="<?php bloginfo('template_directory'); ?>/images/icon_sakai.png" alt="Sakai at URI" />Sakai</a>
                </div>
                <div class="lhwm"><img width="200" height="75" src="<?php bloginfo('template_directory'); ?>/images/wmprint.png" alt="Think Big, We Do." /></div>
                                <div style="clear:both;"></div>
                <div id="riseal"><img width="200" height="50" src="<?php bloginfo('template_directory'); ?>/images/wmbprint.png" alt="Rhode Island Seal" /></div>
             </div>
             
		</div><!-- END toplogo area -->
        
	</div><!-- END top  -->
    
    <!-- START topdept-bar -->
    <div id="topdept-bar">
    	<div class="pagewidth clearfix">
 		
        <?php if(themify_get('setting-site_logo') == 'image' && themify_check('setting-site_logo_image_value')){ ?>
					<?php themify_image("src=".themify_get('setting-site_logo_image_value')."&w=".themify_get('setting-site_logo_width')."&h=".themify_get('setting-site_logo_height')."&alt=".get_bloginfo('name')."&before=<div id='site-logo'><a href='".get_option('home')."'>&after=</a></div>"); ?>
				<?php } else { ?><div id="site-logo">
                	<a href="<?php echo get_option('home'); ?>/  ">
                    <img width="190" height="90" alt="Department Banner Image" src="<?php bloginfo('template_directory'); ?>/images/iStock_000019865267XSmall-crop.jpg" /></a></div><?php } ?>
        
			<div id="deptsec" class="pagewidth">
				<h1 id="site-title"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
				<h4 id="site-tagline"><?php bloginfo('description'); ?></h4>
			</div><!-- /deptsec -->
            
              <!--URI Home Page Icon and Link-->
            <?php if(themify_get('setting-home_button_enabled')) { ?>
            <div id="urihomebutton">
        		<a href="http://www.uri.edu/"><img width="16" height="16" src="<?php bloginfo('template_directory'); ?>/images/icon_urihomepage.png" alt="URI Homepage" />URI Homepage</a>
			</div>
            <?php } ?>
            
         </div><!-- /.page_width -->
	</div><!-- END topdept-bar -->
	
    <!-- START header widgets -->
    <header id="header" class="pagewidth">
        
        <!-- general and weather alert -->       
    	<?php 
			//$alert_general_enable = get_option("alert_general_enable");
        	//$alert_general = get_option("alert_general");  
			$alert_general_enable = get_site_option("alert_general_enable");
        	$alert_general = get_site_option("alert_general");  
		 	if (strpos($alert_general, "\\")) {
				$alert_general = str_replace("\\\"", "", $alert_general);
				$alert_general = str_replace("\\'", "", $alert_general);
			}
			if ($alert_general_enable) {
		?>
        		<div class="header-widget-alert-message">
        			<?php	echo $alert_general;		?>
				</div>
        <?php
			}
			
			//$alert_weather_enable = get_option("alert_weather_enable");
			//$alert_weather = get_option("alert_weather");
			$alert_weather_enable = get_site_option("alert_weather_enable");
			$alert_weather = get_site_option("alert_weather");
			if (strpos($alert_weather, "\\")) {
				$alert_weather = str_replace("\\\"", "", $alert_weather);
				$alert_weather = str_replace("\\'", "", $alert_weather);
			}
			if ($alert_weather_enable) {
		?>
				<div class="header-widget-weather-alert">
					<?php	echo $alert_weather;		?>
				</div>
        <?php
		}

         ?>
        <!-- /general and weather alerts -->  
    
		<!--header widget --> 
        <div class="header-widget">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Header_Widget') ) ?>
		</div>
		<!--/header widget --> 
        
            <!--Social Media Links-->            
            <div class="social-widget">
	
			<?php if(!themify_check('setting-exclude_rss')): ?>
                
                <div class="rss">
				<?php 	// If the site was just installed and the social widget options not yet set, display each social widget with the default URL.
						// 		The Custom URL is taken first, but if the site is just install there will be no custom URL, and the default will be taken.
						// If the disable option is selected, then hide the icon.
				if (!themify_get('setting-facebook_disable')) { ?>
                <a href="<?php if(themify_get('setting-facebook_url') != ""){ echo themify_get('setting-facebook_url'); } else { echo 'http://www.facebook.com/universityofri'; } ?>">
				<img width="16" height="16" src="<?php bloginfo('template_directory'); ?>/images/icon_facebook.png" alt="Facebook" /></a>
                <?php } ?>
                
                <?php if (!themify_get('setting-twitter_disable')) { ?>
                <a href="<?php if(themify_get('setting-twitter_url') != ""){ echo themify_get('setting-twitter_url'); } else { echo 'http://twitter.com/#!/urinews'; } ?>">
				<img width="16" height="16" src="<?php bloginfo('template_directory'); ?>/images/icon_twitter.png" alt="Twitter" /></a>
                <?php } ?>
                
                <?php if (!themify_get('setting-google_plus_disable')) { ?>
                <a href="<?php if(themify_get('setting-google_plus_url') != ""){ echo themify_get('setting-google_plus_url'); } else { echo 'https://plus.google.com/117011233656720960212'; } ?>">
				<img width="16" height="16" src="<?php bloginfo('template_directory'); ?>/images/icon_google_plus.png" alt="Google Plus" /></a>
                <?php } ?>
                
                <?php if (!themify_get('setting-youtube_disable')) { ?>
                <a href="<?php if(themify_get('setting-youtube_url') != ""){ echo themify_get('setting-youtube_url'); } else { echo 'http://www.youtube.com/user/UniversityOfRI'; } ?>">
				<img width="16" height="16" src="<?php bloginfo('template_directory'); ?>/images/icon_youtube.png" alt="Youtube" /></a>
                <?php } ?>
                
                <?php if (!themify_get('setting-custom_feed_disable')) { ?>
                <a href="<?php if(themify_get('setting-custom_feed_url') != ""){ echo themify_get('setting-custom_feed_url'); } else { echo bloginfo('rss2_url'); } ?>">
                <img width="16" height="16" src="<?php bloginfo('template_directory'); ?>/images/icon_rss.png" alt="RSS" /></a>
                <?php } ?>
                
                </div>
                
			<?php endif ?>
			</div><!-- /.social-widget -->
            
    	<nav>        
			<?php if (function_exists('wp_nav_menu')) {
					wp_nav_menu(array('theme_location' => 'main-nav' , 'fallback_cb' => '' , 'container'  => '' , 'menu_id' => 'main-nav' , 'menu_class' => 'main-nav'));
				} else {
					//default_main_nav();
				} ?>
				<!-- /#main-nav -->   
		</nav>	
	</header><!-- /#header -->			
</div><!-- /#headerwrap -->
	
<div id="body" class="pagewidth clearfix"> 
