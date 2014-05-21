<?php get_header(); ?>
<?php $layout = themify_get('setting-default_page_layout'); if($layout == ''): $layout = 'sidebar1'; endif;  /* get default page layout setting */ ?>

<!-- layout-container -->

<div id="layout" class="clearfix pagewidth <?php echo $layout; ?>">
  <div id="contentwrap"> 
    <!-- content -->
    <div id="content" class="clearfix">
      <h1 class="page-title">404 - Page Not Found</h1>
      <p>The page you requested was not found or has moved. You may have used an outdated link or typed the URL incorrectly. Please try to search the site or use one of the following links.</p>
      <ul>
        <li><a href="http://www.uri.edu/home/services/" align="left"><strong>URI A-Z </strong></a>(an alphabetical list of URI departments, programs, resources, organizations, and more) </li>
        <li><a href="http://www.uri.edu/home/academics/departments.html" align="left"><strong>Academic Departments </strong></a>(list of links to all academic departments) </li>
        <li><a href="http://www.uri.edu/home/dir/admin_dir.html" align="left"><strong>Administration Quick Reference </strong></a>(list of primary officers of administration for the University) </li>
        <li><a href="http://www.uri.edu/home/about/index.html" align="left"><strong>About URI </strong></a>(facts, history, maps, local area information, and more) </li>
        <li><a href="http://www.uri.edu/admission/" align="left"><strong>Admission </strong></a>(information for prospective students about applying, tuition, financial aid, and more</li>
        <li><a href="http://www.uri.edu/home/dir/contact.html" align="left"><strong>Contact URI </strong></a>phone and email contacts</li>
        <li><a href="http://www.uri.edu/home/dir/" align="left"><strong>People Search </strong></a>online directory of all current students, faculty and staff </li>
        <li><a href="http://www.advance.uri.edu/alumni/" align="left"><strong>Alumni Services </strong></a>information about its programs and services, committees, membership and others</li>
	  </ul>

<script>
  (function() {
	      var cx = '001847722320550981808:3pqypyy9wiq';
		      var gcse = document.createElement('script');
		      gcse.type = 'text/javascript';
			      gcse.async = true;
			      gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
					          '//www.google.com/cse/cse.js?cx=' + cx;
				      var s = document.getElementsByTagName('script')[0];
				      s.parentNode.insertBefore(gcse, s);
					    })();
</script>
<gcse:search></gcse:search>

    </div>
    <!-- /content --> 
    
  </div>
  <!-- /contentwrap --> 
  <?php if ($layout != "sidebar-none"): get_sidebar(); endif; ?>
</div>
<!-- /layout-container -->

<?php get_footer(); ?>

