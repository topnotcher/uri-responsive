<div id="panel">
    <div class="center">
<?php include ( get_template_directory() . '/global-nav.php' ); ?>
    </div>
<div style="clear:both;"></div>
  </div>
<div id="navsun">
  <div class="center">
    <ul>
      <li><a class="toggle open mylink" href="http://www.uri.edu/home/about">About URI</a></li>
      <li><a class="toggle open mylink" href="http://www.uri.edu/admission">Admission</a></li>
      <li><a class="toggle open mylink" href="http://www.uri.edu/home/academics">Academics</a></li>
      <li><a class="toggle open mylink" href="http://www.uri.edu/home/students">Campus Life</a></li>
      <li><a class="toggle open mylink" href="http://www.gorhody.com">Athletics</a></li>
      <li><a style="width: 184px;" class="toggle open mylink" href="http://www.uri.edu/research/tro/">Research &amp; Outreach</a></li>
      <li><a class="toggle open mylink noborder" href="http://www.urifoundation.org">Support URI</a></li>
    </ul>
    <div style="clear:both;"></div>
  </div>
</div>

<div class="drawer"><a class="toggleclose close but" style="display: none;" href="#"></a></div>

<div id="topnav"<?php if (is_home()){ ?> class="mobiletop"<?php } ?>><a class="first" href="<?php echo get_site_option('uri_gohome'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/mobile/home.png" alt="Home" />Home</a><span class="toggle"><a href="#" class="toggleclosemobile open"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/mobile/browse.png" alt="Open Navigation" />Browse</a><a class="toggleclosemobile close" style="display: none;" href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/mobile/close.png" alt="Close Navigation" />Close</a></span><a href="http://events.uri.edu"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/mobile/events.png" alt="View our calendar" />Events</a><a href="http://map.web.uri.edu"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/mobile/maps.png" alt="Campus Maps" />Maps</a><a href="http://www.uri.edu/news/myuri/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/mobile/email.png" alt="webmail" />Email</a><a href="http://sakai.uri.edu"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/mobile/sakai.png" alt="Sakai" />Sakai</a><a class="search opensearch last" href="http://www.uri.edu/ecampus"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/mobile/ecampus.png" alt="eCampus" />eCampus</a></div>
