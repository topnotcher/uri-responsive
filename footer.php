<?php get_template_part( 'includes/footer-slider'); ?>


<div class="wmtop"><img width="199" height="42" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_thinkbig.png" alt="Think Big We Do" /><p>Copyright &copy; <?php print(Date("Y")); ?> University of Rhode Island.</p></div>
	</div>

	<!-- /body -->
		
	<div id="footerwrap">
    
		<footer>
        
		<div id="footer" class="pagewidth clearfix">
        
        

<div class="center clearfix" >  <img width="210" height="41" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_seal.png" alt=" "/> 			

 <div class="right">

      <p></p><p style="margin-bottom:10px;"><a href="http://www.uri.edu/home/services/">A-Z</a> &ndash; <a href="http://www.uri.edu/home/dir/">Directory</a> &ndash; <a href="http://www.uri.edu/home/dir/contact.html">Contact Us</a> &ndash; <a href="#top">Jump to top&nbsp;<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon_top.png" alt="Jump to top" /></a></p>

      <p>University of Rhode Island, Kingston, RI 02881, USA 1.401.874.1000</p>

      <p>The University of Rhode Island is an equal opportunity employer committed <br />
to community, equity, and diversity and to the principles of affirmative action.</p>

    </div>
    </div>
<div class="mobilewordmark"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/mobilewatermark.png" alt="Think Big, We Do." /></div>

<div class="mobilefooter"> <a href="http://www.uri.edu/home/services/">A-Z</a> &ndash; <a href="http://www.uri.edu/home/dir/">Directory</a> &ndash; <a href="http://www.uri.edu/home/dir/contact.html">Contact Us</a> &ndash; <a href="#top">Jump to top</a></div>

			<div class="footer-widgets clearfix">

				<?php 
					$footer_widget_option = (themify_get('setting-footer_widgets') == "") ? "footerwidget-3col" : themify_get('setting-footer_widgets');
					if($footer_widget_option != ""){ ?>
						  <?php
						  $columns = array('footerwidget-4col' 	=> array('col4-1','col4-1','col4-1','col4-1'),
												 'footerwidget-3col'	=> array('col3-1','col3-1','col3-1'),
												 'footerwidget-2col' 	=> array('col4-2','col4-2'),
												 'footerwidget-1col' 	=> array('') );
						  $x=0;
						  ?>
						<?php foreach($columns[$footer_widget_option] as $col): ?>
								<?php 
									 $x++;
									 if($x == 1){ 
										  $class = "first"; 
									 } else {
										  $class = "";	
									 }
								?>
								<div class="<?php echo $col;?> <?php echo $class; ?>">
									 <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer_Widget_'.$x) ) ?>
								</div>
						  <?php endforeach; ?>
				<?php } ?>

			</div>
			<!-- /.footer-widgets -->
	
			<div class="footer-nav-wrap">
			
				<?php if (function_exists('wp_nav_menu')) {
					wp_nav_menu(array('theme_location' => 'footer-nav' , 'fallback_cb' => '' , 'container'  => '' , 'menu_id' => 'footer-nav' , 'menu_class' => 'footer-nav')); 
				} ?>
			</div>
			<!-- /footer-nav-wrap -->
	
	
			</div>
		</footer>
		<!-- /#footer --> 
	</div>
	<!-- /#footerwrap -->
	
<!-- /#pagewrap -->

<?php
/**
 *  Stylesheets and Javascript files are enqueued in theme-functions.php
 */
?>

<!-- wp_footer -->
<?php wp_footer(); ?>

</body>
</html>
