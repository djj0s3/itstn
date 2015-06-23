<?php
/**
 * @package WordPress
 * @subpackage TryMee
 * @since TryMee 1.0
 * 
 * Pages Header Template
 * Created by CMSMasters
 * 
 */


global $seo_enable, 
	$seo_description, 
	$seo_keywords, 
	$seo_title, 
	$site_favicon, 
	$custom_favicon, 
	$content_font, 
	$link_font, 
	$nav_title_font, 
	$nav_dropdown_font, 
	$h1_font, 
	$h2_font, 
	$h3_font, 
	$h4_font, 
	$h5_font, 
	$h6_font, 
	$dcp_font, 
	$bqt_font, 
	$code_font, 
	$small_font, 
	$input_font, 
	$custom_logo, 
	$site_name, 
	$custom_title_text, 
	$site_descr, 
	$custom_descr_text, 
	$colored_block, 
	$header_height, 
	$header_logo_top, 
	$header_nav_top;

$slider_active = get_post_meta(get_the_ID(), 'slidertools_active', true);
$slidertools_slider_id = get_post_meta(get_the_ID(), 'slidertools_slider_id', true);

if ($slider_active == 'true') {
    $sliderManager = new cmsmsSliderManager;
    $sliderOptions = $sliderManager->getSlider($slidertools_slider_id);
}

$seotools_active = get_post_meta(get_the_ID(), 'seotools_active', true);
$seotools_title = get_post_meta(get_the_ID(), 'seotools_title', true);
$seotools_description = get_post_meta(get_the_ID(), 'seotools_description', true);
$seotools_keywords = get_post_meta(get_the_ID(), 'seotools_keywords', true);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <?php if ($seo_enable) { ?>
		<meta name="description" content="<?php
		if ($seotools_active == 'true' && $seotools_description != '' && !is_home() && !is_404() && !is_archive() && !is_search()) {
			echo $seotools_description;
		} else {
			if ($seo_description == '') {
				bloginfo('description');
			} else {
				echo $seo_description;
			}
		}
		?>" />
		<meta name="keywords" content="<?php
			if ($seotools_active == 'true' && $seotools_keywords != '' && !is_home() && !is_404() && !is_archive() && !is_search()) {
				echo $seotools_keywords;
			} else {
				if ($seo_keywords == '') {
					bloginfo('name');
				} else {
					echo $seo_keywords;
				}
			}
		?>" />
		<title><?php
		if ($seotools_active == 'true' && $seotools_title != '' && !is_home() && !is_404() && !is_archive() && !is_search()) {
			echo $seotools_title;
		} else {
			if ($seo_title == '') {
			  wp_title('&laquo;', true, 'right');
			  echo ' ';
			  bloginfo('name');
			} else {
			  echo $seo_title;
			}
		}
		?></title>
        <?php } else { ?>
		<meta name="description" content="<?php bloginfo('description'); ?>" />
		<meta name="keywords" content="<?php bloginfo('name'); ?>" />
		<title><?php
		wp_title('&laquo;', true, 'right');
		bloginfo('name');
		?></title>
        <?php 
		}
        
        if ($site_favicon) {
            if (!$custom_favicon) { 
		?>
            <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon" />
        <?php } else { ?>
            <link rel="shortcut icon" href="<?php echo $custom_favicon; ?>" type="image/x-icon" />
        <?php 
			}
        } 
		?>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php 
		foreach (get_google_fonts() as $googlefont) { 
			if ( 
				$googlefont->font_parameter == $content_font || 
				$googlefont->font_parameter == $link_font || 
				$googlefont->font_parameter == $nav_title_font || 
				$googlefont->font_parameter == $nav_dropdown_font || 
				$googlefont->font_parameter == $h1_font || 
				$googlefont->font_parameter == $h2_font || 
				$googlefont->font_parameter == $h3_font || 
				$googlefont->font_parameter == $h4_font || 
				$googlefont->font_parameter == $h5_font || 
				$googlefont->font_parameter == $h6_font || 
				$googlefont->font_parameter == $dcp_font || 
				$googlefont->font_parameter == $bqt_font || 
				$googlefont->font_parameter == $code_font || 
				$googlefont->font_parameter == $small_font || 
				$googlefont->font_parameter == $input_font 
			) { 
				echo '<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=' . $googlefont->font_parameter . ':rerular,italic,bold,bolditalic" type="text/css" />';
			} 
		}
		
		$ua = $_SERVER['HTTP_USER_AGENT'];
		
		$checker = array( 
			'iphone'=>preg_match('/iPhone|iPod|iPad/', $ua), 
			'blackberry'=>preg_match('/BlackBerry/', $ua), 
			'android'=>preg_match('/Android/', $ua), 
			'mac'=>preg_match('/Macintosh/', $ua) 
		);
		
        if (is_singular() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
        
        wp_head();
		?>
        <!--[if lt IE 9]>
            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ieCss3.php" type="text/css" media="screen" />
            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie.css" type="text/css" media="screen" />
        <![endif]-->
		<style type="text/css">
			#header { 
				height : <?php echo $header_height; ?>px; 
			} 
			
			#header a.logo { 
				top : <?php echo $header_logo_top; ?>px; 
			} 
			
			#header nav { 
				top : <?php echo $header_nav_top; ?>px; 
			} 
			
			@media only screen and (max-width : 767px) { 
				
				#header { 
					height : auto; 
				} 
				
				#header a.logo, 
				#header nav { 
					top : auto; 
				} 
				
			}
		</style>
		<?php if (is_admin_bar_showing()) { ?>
			<style type="text/css">
				html {margin-top:0 !important;}
				
				#page {
					margin-top:58px !important;
				}
				
				@media only screen and (max-width : 1151px) {
					
					#page {
						margin-top:28px !important;
					}
					
				}
			</style>
		<?php } ?>
    </head>
    <body <?php body_class(); ?>>

<!-- _________________________ Start Page _________________________ -->
        <section id="container">
		
<!-- _________________________ Start Page _________________________ -->
			<section id="page">
				<a href="#" id="slide_top"></a>

<!-- _________________________ Start Header _________________________ -->
				<header id="header"<?php if (!$checker['iphone'] && !$checker['blackberry'] && !$checker['android'] && !$checker['mac']) { echo ' class="csstransition"'; } ?>>
				<?php 
				if ($site_name) {
					if ($custom_title_text) {
						$blog_title = $custom_title_text;
					} else {
						$blog_title = get_bloginfo('name');
						$blog_title = ($blog_title) ? $blog_title : 'TryMee';
					}
					
					if ($custom_descr_text) {
						$blog_descr = $custom_descr_text;
					} else {
						$blog_descr = get_bloginfo('description');
						$blog_descr = ($blog_descr) ? $blog_descr : 'Premium Responsive WordPress Theme';
					}
					
					echo '<a href="' . home_url() . '/" title="' . $blog_title . '" class="logo">' . 
						'<span class="title">' . $blog_title . '</span>';
					
					if ($site_descr) { 
						echo '<br />' . 
						'<span class="title_text">' . $blog_descr . '</span>'; 
					}
					
					echo '</a>';
				} else {
					if (!$custom_logo) { 
						echo '<a href="' . home_url() . '/" title="' . get_bloginfo('name') . '" class="logo">' . 
							'<img src="' . get_template_directory_uri() . '/images/logo.png" alt="' . get_bloginfo('name') . '" />' . 
						'</a>';
					} else { 
						echo '<a href="' . home_url() . '/" title="' . get_bloginfo('name') . '" class="logo">' . 
							'<img src="' . $custom_logo . '" alt="' . get_bloginfo('name') . '" />' . 
						'</a>';
					}
				}
				?> 
				<div class=""><h4 class="tag-line tagline-wrapper">Intelligent Transportation Society of Tennessee</h4></div>
				<div id="header_login">
				<?php 
					if (function_exists('wpmem_inc_sidebar')) { 
						wpmem_inc_sidebar();
					}
				?>
				</div>
				

<!-- _________________________ Start Navigation _________________________ -->
					<nav>
					<?php
					if (has_nav_menu('primary')) {
						wp_nav_menu(array( 
							'theme_location' => 'primary', 
							'container' => false, 
							'menu_id' => 'navigation', 
							'menu_class' => 'navigation', 
							'link_before' => '<span>', 
							'link_after' => '</span>' 
						));
						
						wp_nav_menu(array( 
							'theme_location' => 'primary', 
							'container' => false, 
							'menu_id' => 'resp_navigation', 
							'menu_class' => 'resp_navigation', 
							'items_wrap' => '<select id="%1$s" class="%2$s"><option value="" selected="selected"> - - ' . __('Navigate to...', 'cmsmasters') . ' - - </option>%3$s</select>', 
							'walker' => new Nav_Select() 
						));
					} else {
						echo '<ul id="navigation">';
						
						wp_list_pages(array( 
							'title_li' => '', 
							'link_before' => '<span>', 
							'link_after' => '</span>' 
						));
						
						echo '</ul>';
						
						wp_dropdown_pages('name=resp_navigation');
					}
					?>
					</nav>
<!-- _________________________ Finish Navigation _________________________ -->

				</header>
<!-- _________________________ Finish Header _________________________ -->


<!-- _________________________ Start Middle _________________________ -->
				<section id="middle"<?php if (is_page_template('portfolio.php')) { echo ' class="portfolio_page"'; } ?>>
					<div class="middle_inner">

<!-- _________________________ Start Top _________________________ -->
						<section id="top">
						<?php 
						if ( 
							!is_home() && 
							!is_404() && 
							!is_archive() && 
							!is_search() && 
							$slider_active == 'true' && 
							!empty($sliderOptions) 
						) {
						?>
						
<!-- _________________________ Start Slider __________________________ -->
							<?php include CMSMASTERS_PAGES . '/slider.php'; ?>
<!-- _________________________ Finish Slider __________________________ -->

						<?php 
						}
						
						echo '</section>';
						
						if (!is_page_template('colored.php')) {
							echo '<div class="double_divider"></div>';
						}
						?>
<!-- _________________________ Finish Top _________________________ -->

						<?php
						$breadcrumbs_active = get_post_meta(get_the_ID(), 'selected_breadcrumbs_active', true);
						$page_layout = get_post_meta(get_the_ID(), 'page_layout', true);
						$heading = get_post_meta(get_the_ID(), 'headingtools_active', true);
						$heading_title = get_post_meta(get_the_ID(), 'headingtools_title', true);
						$heading_description = get_post_meta(get_the_ID(), 'headingtools_description', true);
						$heading_icon = get_post_meta(get_the_ID(), 'headingtools_icon', true);
						$filter_active = get_post_meta(get_the_ID(), 'filter_active', true);
						
						if (!$page_layout || is_home() || is_archive() || is_search()) {
							$page_layout = 'sidebar_bg';
						}
						
						if (is_404()) {
							$page_layout = 'nobg';
						}
						
						if (!$heading) {
							$heading = 'default';
						}
						
						if (!is_404() && !is_home()) {
							if (is_archive() || is_search() || $heading == 'default') {
								if (!is_front_page() && $breadcrumbs_active != 'disable') {
									include CMSMASTERS_PAGES . '/breadcrumbs.php';
								}
						?>
							<div class="headline">
								<div class="headline_inner">
									<h1><?php
									if (is_search()) {
										echo __('Search Results for', 'cmsmasters') . ': <em>' . get_search_query() . '</em>';
									} elseif (is_archive()) {
										if (is_day()) {
											echo __('Daily Archives', 'cmsmasters') . ': <em>' . get_the_date() . '</em>';
										} elseif (is_month()) {
											echo __('Monthly Archives', 'cmsmasters') . ': <em>' . get_the_date('F Y') . '</em>';
										} elseif (is_year()) {
											echo __('Yearly Archives', 'cmsmasters') . ': <em>' . get_the_date('Y') . '</em>';
										} elseif (is_category()) {
											echo __('Category Archives', 'cmsmasters') . ': <em>' . single_cat_title('', false) . '</em>';
										} elseif (is_tag()) {
											echo __('Tag Archives', 'cmsmasters') . ': <em>' . single_tag_title('', false) . '</em>';
										} elseif (is_author()) {
											the_post();
											
											echo __('Author Archives', 'cmsmasters') . ': <em>' . get_the_author() . '</em>';
											
											rewind_posts();
										} elseif (taxonomy_exists('pt-sort-categ') || taxonomy_exists('pt-tags')) {
											_e('Portfolio Archives', 'cmsmasters');
										} else {
											_e('Website Archives', 'cmsmasters');
										}
									} else {
										the_title();
									}
									?></h1>
								</div>
							</div>
							<?php
							} elseif (!is_archive() && !is_search() && $heading == 'custom') { 
								if (!is_front_page() && $breadcrumbs_active != 'disable') {
									include CMSMASTERS_PAGES . '/breadcrumbs.php';
								}
							?>
							<div class="headline">
								<div class="headline_inner">
								<?php
								if ($heading_icon == '') {
									if ($heading_description == '') { 
										echo '<h1>' . (($heading_title != '') ? $heading_title : get_the_title()) . '</h1>';
									} else { 
									?>
									<table class="pagehead">
										<tbody>
											<tr>
												<td class="with_text">
													<?php 
													echo '<h1>' . (($heading_title != '') ? $heading_title : get_the_title()) . '</h1>' . 
													'<h5>' . $heading_description . '</h5>';
													?>
												</td>
											</tr>
										</tbody>
									</table>
									<?php 
									}
								} else { 
									?>
									<table class="pagehead clpad">
										<tbody>
											<tr>
												<td><img class="no_border" alt="" src="<?php echo $heading_icon; ?>" /></td>
												<td>
												<?php 
													echo '<h1 class="icon_heading">' . (($heading_title != '') ? $heading_title : get_the_title()) . '</h1>';
													
													if ($heading_description != '') {
														echo '<h5>' . $heading_description . '</h5>';
													}
												?>
												</td>
											</tr>
										</tbody>
									</table>
								<?php } ?>
								</div>
							</div>
							<?php 
							} elseif ( 
								( 
									!is_archive() && 
									!is_search() && 
									$heading == 'sidebar' && 
									is_active_sidebar('sidebar_top') 
								) || 
								( 
									!is_archive() && 
									!is_search() && 
									$heading == 'sidebar' && 
									is_active_sidebar('sidebar_colored') && 
									is_page_template('colored.php') 
								) 
							) { 
								if (!is_front_page() && $breadcrumbs_active != 'disable') {
									include CMSMASTERS_PAGES . '/breadcrumbs.php';
								}
								
								if (is_page_template('colored.php')) {
									echo '<section id="top_sidebar" style="padding:0; margin-top:2px;">';
									
									if (function_exists('dynamic_sidebar')) {
										dynamic_sidebar('sidebar_colored');
									}
									
									echo '</section>';
								} else {
									echo '<section id="top_sidebar">';
									
									if (function_exists('dynamic_sidebar')) {
										dynamic_sidebar('sidebar_top');
									}
									
									echo '</section>';
								}
								
								if (!is_page_template('colored.php')) {
									echo '<div class="double_divider"></div>';
								}
							} else if (!is_front_page() && $breadcrumbs_active != 'disable') {
								include CMSMASTERS_PAGES . '/breadcrumbs.php';
							}
						}
						
						if (is_page_template('portfolio.php')) { 
							wp_enqueue_script('isotope');
							wp_enqueue_script('isotopeRun');
							
							if ($filter_active == 'true') { 
						?>
							<div class="pj_sort_wrap">
								<div class="pj_sort">
									<div class="p_options_loader"></div>
									<div class="p_options_block">
										<div class="p_sort">
											<a name="p_name" class="button" title="<?php _e('Name', 'cmsmasters'); ?>" href="#"><span><span><?php _e('Name', 'cmsmasters'); ?></span></span></a>
											<a name="p_date" class="button" title="<?php _e('Date', 'cmsmasters'); ?>" href="#"><span><span><?php _e('Date', 'cmsmasters'); ?></span></span></a>
										</div>
										<div class="p_filter">
											<div class="p_filter_container">
												<a class="p_cat_filter button" data-filter="article.portfolio" title="<?php _e('All Categories', 'cmsmasters'); ?>" href="#"><span><span><?php _e('All Categories', 'cmsmasters'); ?></span></span></a>
												<ul class="p_filter">
													<li class="current"><a data-filter="article.portfolio" title="<?php _e('All Categories', 'cmsmasters'); ?>" href="#" class="current"><?php _e('All Categories', 'cmsmasters'); ?></a></li>
													<?php
													$pt_categs = get_terms('pt-sort-categ', 'orderby=name');
													
													if (is_array($pt_categs) && !empty($pt_categs)) {
														foreach ($pt_categs as $pt_categ) {
															echo '<li><a href="#" data-filter="article.portfolio[data-category~=\'' . $pt_categ->slug . '\']" title="' . $pt_categ->name . '">' . $pt_categ->name . '</a></li>' . "\n";
														}
													}
													?>
												</ul>
											</div>
											<div class="cl"></div>
										</div>
										<div class="cl"></div>
									</div>
								</div>
							</div>
						<?php 
							}
						}
						?>
						<div class="content_wrap <?php echo $page_layout; ?>">
