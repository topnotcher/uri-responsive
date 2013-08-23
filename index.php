<?php get_header(); ?>

<?php if (is_home() && !is_paged()) { get_template_part( 'includes/header-slider'); } ?>

<?php 
/////////////////////////////////////////////
// Setup Default Variables	 							
/////////////////////////////////////////////
?>

<?php 
global $post_layout, $hide_title, $hide_image, $hide_title, $hide_meta, $hide_date, $display_content; 

$post_layout = themify_get('setting-default_post_layout'); 

$layout = themify_get('setting-default_layout'); 
if ( empty($layout) ) $layout = 'sidebar2';


$page_title = themify_get('setting-hide_page_title');
$hide_title = themify_get('setting-default_post_title');
$unlink_title = themify_get('setting-default_unlink_post_title');
$hide_image = themify_get('setting-default_post_image');
$unlink_image = themify_get('setting-default_unlink_post_image');
$hide_meta = themify_get('setting-default_post_meta');
$hide_date = themify_get('setting-default_post_date');

$display_content = themify_get('setting-default_layout_display');
$post_image_width = themify_get('image_width');
$post_image_height = themify_get('image_height');
$page_navigation = themify_get('hide_navigation');
$posts_per_pages = themify_get('posts_per_page');

?>
<!-- layout-container -->
<div id="layout" class="clearfix pagewidth <?php echo $layout; ?>">
	
	<?php 
	
	/////////////////////////////////////////////
	// Set Default Image Sizes 							
	/////////////////////////////////////////////
	
	$content_width = 978;
	$sidebar1_content_width = 642;
	$sidebar2_content_width = 474;

	// Grid4
	$grid4_width = 222;
	$grid4_height = 140;
	
	// Grid3
	$grid3_width = 306;
	$grid3_height = 190;
	
	// Grid2
	$grid2_width = 474;
	$grid2_height = 270;
		
	// List Large
	$list_large_image_width = 716;
	$list_large_image_height = 390;
	 
	// List Thumb
	$list_thumb_image_width = 160;
	$list_thumb_image_height = 100;
	
	// List Post
	$list_post_width = 978;
	$list_post_height = 400;

	// List Grid2 Thumb
	$grid2_thumb_width = 110;
	$grid2_thumb_height = 100;
			
	///////////////////////////////////////////
	// Setting image width, height
	///////////////////////////////////////////
	
	global $width, $height;
	
	if($post_layout == 'grid4'):
	
		$width = $grid4_width;
		$height = $grid4_height;
	
	elseif($post_layout == 'grid3'):
	
		$width = $grid3_width;
		$height = $grid3_height;
	
	elseif($post_layout == 'grid2'):
	
		$width = $grid2_width;
		$height = $grid2_height;
		
	elseif($post_layout == 'list-large-image'):
	
		$width = $list_large_image_width;
		$height = $list_large_image_height;
	
	elseif($post_layout == 'list-thumb-image'):
	
		$width = $list_thumb_image_width;
		$height = $list_thumb_image_height;
		
	elseif($post_layout == 'list-post'):
	
		$width = $list_post_width;
		$height = $list_post_height;
	
	elseif($post_layout == 'grid2-thumb'):
	
		$width = $grid2_thumb_width;
		$height = $grid2_thumb_height;

	else:
				
		$width = $list_post_width;
		$height = $list_post_height;
		
	endif;
	
	if($layout == "sidebar1"):
	
		$ratio = $width / $content_width;
		$aspect = $height / $width;
		$width = round($ratio * $sidebar1_content_width);
		if($height != '' && $height != 0):
			$height = round($width * $aspect);
		endif;
	
	elseif($layout == "sidebar2"):
	
		$ratio = $width / $content_width;
		$aspect = $height / $width;
		$width = round($ratio * $sidebar2_content_width);
		if($height != '' && $height != 0):
			$height = round($width * $aspect);
		endif;
	
	endif;
	?>
			
	<!-- contentwrap -->
	<div id="contentwrap">
		<!-- content -->
		<div id="content" class="clearfix">
			
			<?php 
			/////////////////////////////////////////////
			// Author Page	 							
			/////////////////////////////////////////////
			?>
			<?php if(is_author()) : ?>
				<?php
				$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
				$author_url = $curauth->user_url;
				?>
				<div class="author-bio clearfix">
					<p class="author-avatar"><?php echo get_avatar( $curauth->user_email, $size = '48' ); ?></p>
					<h2 class="author-name"><?php _e('About','themify'); ?> <?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?></h2>
					<?php if($author_url != ''): ?><p class="author-url"><a href="<?php echo $author_url; ?>"><?php echo $author_url; ?></a></p><?php endif; //author url ?>
					<div class="author-description">
						<?php echo $curauth->user_description; ?>
					</div>
					<!-- /.author-description -->
				</div>
				<!-- /.author bio -->
				
				<h2 class="author-posts-by"><?php _e('Posts by','themify'); ?> <?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?>:</h2>
			<?php endif; ?>
	
			<?php 
			/////////////////////////////////////////////
			// Search Title	 							
			/////////////////////////////////////////////
			?>
			<?php if(is_search()): ?>
				<h1 class="page-title"><?php _e('Search Results for:','themify'); ?> <em><?php echo get_search_query(); ?></em></h1>
			<?php endif; ?>
	
			<?php 
			/////////////////////////////////////////////
			// Category Title	 							
			/////////////////////////////////////////////
			?>
			<?php if(is_category() || is_tag() || is_tax() ): ?>
				<h1 class="page-title"><?php single_cat_title(); ?></h1>
				<?php
					$category_description = category_description();
					if ( !empty( $category_description ) ){
						echo '<div class="category-description">' . $category_description . '</div>';
					}
				?>
			<?php endif; ?>
	
			<?php 
			/////////////////////////////////////////////
			// Default query categories	 							
			/////////////////////////////////////////////
			?>
			<?php $query_cats = themify_get('setting-default_query_cats'); ?>
			<?php if(($query_cats !="") && !is_search()): ?>
				<?php query_posts($query_string . '&cat='.$query_cats); ?>
			<?php endif; ?>
	
			<?php 
			/////////////////////////////////////////////
			// Loop	 							
			/////////////////////////////////////////////
			?>
			<?php if (have_posts()) : ?>
			
				<!-- loops-wrapper -->
				<div class="loops-wrapper <?php echo $post_layout; ?>">
	
					<?php while (have_posts()) : the_post(); ?>
			
						<?php if(is_search()): ?>
							<?php get_template_part( 'includes/loop','search'); ?>
						<?php else: ?>
							<?php get_template_part( 'includes/loop','index'); ?>
						<?php endif; ?>
			
					<?php endwhile; ?>
								
				</div>
				<!-- /loops-wrapper -->
	
				<?php get_template_part( 'includes/pagination'); ?>
			
			<?php 
			/////////////////////////////////////////////
			// Error - No Page Found	 							
			/////////////////////////////////////////////
			?>
	
			<?php else : ?>
		
				<p><?php _e( 'Sorry, nothing found.', 'themify' ); ?></p>
		
			<?php endif; ?>			
	
		</div>
		<!--/content -->

		<?php 
		/////////////////////////////////////////////
		// Sidebar-alt						
		/////////////////////////////////////////////
		?>
		<?php if( ($layout == "sidebar2") || ($layout == "sidebar2 content-left") || ($layout == "sidebar2 content-right") ): get_template_part( 'includes/sidebar-alt'); endif; ?>

	</div>
	<!-- /contentwrap -->
	
	<?php 
	/////////////////////////////////////////////
	// Sidebar							
	/////////////////////////////////////////////
	?>

	<?php if ($layout != "sidebar-none"): get_sidebar(); endif; ?>
	
</div>
<!-- layout-container -->

<?php get_footer(); ?>
