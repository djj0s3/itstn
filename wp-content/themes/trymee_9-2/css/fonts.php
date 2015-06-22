<?php 
/**
 * @package WordPress
 * @subpackage TryMee
 * @since TryMee 1.3.1
 * 
 * Fonts & Colors Settings File
 * Created by CMSMasters
 * 
 */


header('Content-type: text/css');
require('../../../../wp-load.php');
require('../theme/classes/var.php');


$colors = str_replace('#', '', $link_color);
$color1 = hexdec(substr($colors, 0, 2));
$color2 = hexdec(substr($colors, 2, 2));
$color3 = hexdec(substr($colors, 4, 2));

$rgba = 'rgba(' . $color1 . ', ' . $color2 . ', ' . $color3 . ', .05)';

?>
/* Fonts */

body, 
input[type="submit"] {
	font : <?php echo $content_font_size . 'px/' . 
	$content_line_height . 'px ' . 
	((strpos(stripslashes($content_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($content_font)) . "'" : stripslashes($content_font)); ?>;
}

h1, 
a.logo span.title {
	font : <?php echo $h1_font_size . 'px/' . 
	$h1_line_height . 'px ' . 
	((strpos(stripslashes($h1_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($h1_font)) . "'" : stripslashes($h1_font));
	
	if (str_replace('+', ' ', stripslashes($h1_font)) !== str_replace('+', ' ', stripslashes($content_font))) { 
		echo ((strpos(stripslashes($content_font), '+')) ? ", '" . str_replace('+', ' ', stripslashes($content_font)) . "'" : ', ' . stripslashes($content_font));
	} ?>;
}

h2, 
q:before, 
q:after, 
blockquote:before, 
blockquote:after {
	font : <?php echo $h2_font_size . 'px/' . 
	$h2_line_height . 'px ' . 
	((strpos(stripslashes($h2_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($h2_font)) . "'" : stripslashes($h2_font));
	
	if (str_replace('+', ' ', stripslashes($h2_font)) !== str_replace('+', ' ', stripslashes($content_font))) { 
		echo ((strpos(stripslashes($content_font), '+')) ? ", '" . str_replace('+', ' ', stripslashes($content_font)) . "'" : ', ' . stripslashes($content_font));
	} ?>;
}

h3, 
.sitemap > li > a {
	font : <?php echo $h3_font_size . 'px/' . 
	$h3_line_height . 'px ' . 
	((strpos(stripslashes($h3_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($h3_font)) . "'" : stripslashes($h3_font));
	
	if (str_replace('+', ' ', stripslashes($h3_font)) !== str_replace('+', ' ', stripslashes($content_font))) { 
		echo ((strpos(stripslashes($content_font), '+')) ? ", '" . str_replace('+', ' ', stripslashes($content_font)) . "'" : ', ' . stripslashes($content_font));
	} ?>;
}

h4 {
	font : <?php echo $h4_font_size . 'px/' . 
	$h4_line_height . 'px ' . 
	((strpos(stripslashes($h4_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($h4_font)) . "'" : stripslashes($h4_font));
	
	if (str_replace('+', ' ', stripslashes($h4_font)) !== str_replace('+', ' ', stripslashes($content_font))) { 
		echo ((strpos(stripslashes($content_font), '+')) ? ", '" . str_replace('+', ' ', stripslashes($content_font)) . "'" : ', ' . stripslashes($content_font));
	} ?>;
}

h5 {
	font : <?php echo $h5_font_size . 'px/' . 
	$h5_line_height . 'px ' . 
	((strpos(stripslashes($h5_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($h5_font)) . "'" : stripslashes($h5_font));
	
	if (str_replace('+', ' ', stripslashes($h5_font)) !== str_replace('+', ' ', stripslashes($content_font))) { 
		echo ((strpos(stripslashes($content_font), '+')) ? ", '" . str_replace('+', ' ', stripslashes($content_font)) . "'" : ', ' . stripslashes($content_font));
	} ?>;
}

h6, 
.table th, 
.sitemap > li > ul > li > a, 
.cms_archive li a, 
.cms_category li a {
	font : <?php echo $h6_font_size . 'px/' . 
	$h6_line_height . 'px ' . 
	((strpos(stripslashes($h6_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($h6_font)) . "'" : stripslashes($h6_font));
	
	if (str_replace('+', ' ', stripslashes($h6_font)) !== str_replace('+', ' ', stripslashes($content_font))) { 
		echo ((strpos(stripslashes($content_font), '+')) ? ", '" . str_replace('+', ' ', stripslashes($content_font)) . "'" : ', ' . stripslashes($content_font));
	} ?>;
}

h6 {
	font-weight:bold;
}

q, 
blockquote {
	font : <?php echo $bqt_font_size . 'px/' . 
	$bqt_line_height . 'px ' . 
	((strpos(stripslashes($bqt_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($bqt_font)) . "'" : stripslashes($bqt_font));
	
	if (str_replace('+', ' ', stripslashes($bqt_font)) !== str_replace('+', ' ', stripslashes($content_font))) { 
		echo ((strpos(stripslashes($content_font), '+')) ? ", '" . str_replace('+', ' ', stripslashes($content_font)) . "'" : ', ' . stripslashes($content_font));
	} ?>;
}

code {
	font : <?php echo $code_font_size . 'px/' . 
	$code_line_height . 'px ' . 
	((strpos(stripslashes($code_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($code_font)) . "'" : stripslashes($code_font));
	
	if (str_replace('+', ' ', stripslashes($code_font)) !== str_replace('+', ' ', stripslashes($content_font))) { 
		echo ((strpos(stripslashes($content_font), '+')) ? ", '" . str_replace('+', ' ', stripslashes($content_font)) . "'" : ', ' . stripslashes($content_font));
	} ?>;
}

small, 
abbr, 
.widget_custom_twitter_entries .tweet_time {
	font : <?php echo $small_font_size . 'px/' . 
	$small_line_height . 'px ' . 
	((strpos(stripslashes($small_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($small_font)) . "'" : stripslashes($small_font));
	
	if (str_replace('+', ' ', stripslashes($small_font)) !== str_replace('+', ' ', stripslashes($content_font))) { 
		echo ((strpos(stripslashes($content_font), '+')) ? ", '" . str_replace('+', ' ', stripslashes($content_font)) . "'" : ', ' . stripslashes($content_font));
	} ?>;
}

input, 
textarea, 
select, 
option, 
.cmsms-form-builder .check_parent input[type="checkbox"]+label, 
.cmsms-form-builder .check_parent input[type="radio"]+label, 
.wpcf7 .wpcf7-list-item input[type="checkbox"]+span, 
.wpcf7 .wpcf7-list-item input[type="radio"]+span {
	font : <?php echo $input_font_size . 'px/' . 
	$input_line_height . 'px ' . 
	((strpos(stripslashes($input_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($input_font)) . "'" : stripslashes($input_font));
	
	if (str_replace('+', ' ', stripslashes($input_font)) !== str_replace('+', ' ', stripslashes($content_font))) { 
		echo ((strpos(stripslashes($content_font), '+')) ? ", '" . str_replace('+', ' ', stripslashes($content_font)) . "'" : ', ' . stripslashes($content_font));
	} ?>;
}

em, 
.link_arrow, 
.widget.widget_archive ul li a, 
.widget.widget_nav_menu ul li a, 
.widget.widget_links ul li a, 
.widget.widget_meta ul li a, 
.widget.widget_pages ul li a, 
.widget.widget_recent_entries ul li a, 
.widget.widget_categories ul li a, 
.comments_number, 
.cmsms_info .category_name a, 
.cmsms_info .user_name a, 
.post_category a, 
.commentlist .published, 
.published > a, 
#bottom a {
	font-family : <?php echo ((strpos(stripslashes($link_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($link_font)) . "'" : stripslashes($link_font));
	
	if (str_replace('+', ' ', stripslashes($link_font)) !== str_replace('+', ' ', stripslashes($content_font))) { 
		echo ((strpos(stripslashes($content_font), '+')) ? ", '" . str_replace('+', ' ', stripslashes($content_font)) . "'" : ', ' . stripslashes($content_font));
	} ?>;
}
/*
#navigation li > a {
	font : <?php echo $nav_title_font_size . 'px/' . 
	$nav_title_line_height . 'px ' . 
	((strpos(stripslashes($nav_title_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($nav_title_font)) . "'" : stripslashes($nav_title_font));
	
	if (str_replace('+', ' ', stripslashes($nav_title_font)) !== str_replace('+', ' ', stripslashes($content_font))) { 
		echo ((strpos(stripslashes($content_font), '+')) ? ", '" . str_replace('+', ' ', stripslashes($content_font)) . "'" : ', ' . stripslashes($content_font));
	} ?>;
}
*/
#navigation ul li a {
	font-family : <?php echo ((strpos(stripslashes($nav_dropdown_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($nav_dropdown_font)) . "'" : stripslashes($nav_dropdown_font));
	
	if (str_replace('+', ' ', stripslashes($nav_dropdown_font)) !== str_replace('+', ' ', stripslashes($content_font))) { 
		echo ((strpos(stripslashes($content_font), '+')) ? ", '" . str_replace('+', ' ', stripslashes($content_font)) . "'" : ', ' . stripslashes($content_font));
	} ?>;
}

#navigation ul li a {
	font-size:<?php echo $nav_dropdown_font_size; ?>px;
	line-height:<?php echo $nav_dropdown_line_height; ?>px;
}


/* Colors */

body {
	color : <?php echo $text_color; ?>;
}

a, 
.color_3, 
.short .entry-title a:hover, 
h2.entry-title a:hover, 
h3.entry-title a:hover, 
h5.entry-title a:hover, 
.cmsmsLike:hover span,
.cmsmsLike.active span,
.togg .tog:hover, 
.togg .tog.current {
	color : <?php echo $link_color; ?>;
}

a:hover, 
.color_1, 
#bottom a, 
div.jp-playlist li.jp-playlist-current a, 
.tour li.current a, 
ul.p_filter li a {
	color : <?php echo $link_hover_color; ?>;
}

h1, 
a.logo span.title {
	color : <?php echo $h1_color; ?>;
}

h2, 
h2.entry-title a {
	color : <?php echo $h2_color; ?>;
}

h3, 
h3.entry-title a {
	color : <?php echo $h3_color; ?>;
}

h4 {
	color : <?php echo $h4_color; ?>;
}

h5, 
.short .entry-title a, 
h5.entry-title a, 
.togg .tog {
	color : <?php echo $h5_color; ?>;
}

h6 {
	color : <?php echo $h6_color; ?>;
}

.responsiveSlider, 
.responsiveSlider h1, 
.responsiveSlider h2, 
.responsiveSlider h3, 
.responsiveSlider h4, 
.responsiveSlider h5, 
.responsiveSlider h6 {
	color : <?php echo $slider_color; ?>;
}

#navigation li > a {
	color : <?php echo $nav_title_color; ?>;
}

#navigation li.current-menu-ancestor > a, 
#navigation li.current-menu-item > a, 
#navigation li:hover > a:hover, 
#navigation li:hover > a {
	color : <?php echo $nav_title_active_color; ?>;
}

#navigation li li > a {
	color : <?php echo $nav_dropdown_color; ?>;
}

#navigation li li.current-menu-ancestor > a, 
#navigation li li.current-menu-item > a, 
#navigation li li:hover > a:hover, 
#navigation ul li:hover > a {
	color : <?php echo $nav_dropdown_active_color; ?>;
}

q, 
blockquote, 
#bottom a:hover, 
span.dropcap {
	color : <?php echo $bqt_color; ?>;
}

code {
	color : <?php echo $code_color; ?>;
}

small, 
abbr, 
.color_2 {
	color : <?php echo $small_color; ?>;
}

input, 
textarea, 
select, 
option, 
.cmsms-form-builder .check_parent input[type="checkbox"]+label, 
.cmsms-form-builder .check_parent input[type="radio"]+label, 
.wpcf7 .wpcf7-list-item input[type="checkbox"]+span, 
.wpcf7 .wpcf7-list-item input[type="radio"]+span {
	color : <?php echo $input_color; ?>;
}

.cmsmsLike span {
	color : #cccccc;
}

.table th, 
span.dropcap2 {
	color : #ffffff;
}

#navigation > li.current-menu-ancestor > a > span, 
#navigation > li.current_page_item > a > span, 
#navigation > li > a:hover > span {
	border: 0 none;
	/* border-color : <?php echo $link_color; ?>; */
}

#bottom .cmsms-form-builder input[type="text"]:focus, 
#bottom .cmsms-form-builder textarea:focus, 
#bottom .widget .wpcf7 input[type="text"]:focus, 
#bottom .widget .wpcf7 textarea:focus, 
input[type="text"]:focus, 
textarea:focus, 
select:focus, 
code {
	border-color : <?php echo $link_color; ?>;
}

#navigation ul li a {
	background-color : #ffffff;
}

#navigation li li.current-menu-ancestor > a, 
#navigation li li.current-menu-item > a, 
#navigation li li:hover > a:hover, 
#navigation ul li:hover > a {
	background-color : <?php echo $link_color; ?>;
}

.shortcode_slideshow ul.shortcode_slideshow_pager li.current a, 
.shortcode_slideshow ul.shortcode_slideshow_pager li a:hover, 
.cmsmsLike:hover, 
.cmsmsLike.active, 
.table th, 
span.dropcap2, 
#slide_top,  
.tour li.current a .arrow_block, 
.tour li a:hover .arrow_block,  
.togg .tog:hover .cmsms_plus span, 
.togg .tog.current .cmsms_plus span {
	background-color : <?php echo $link_color; ?>;
}

.box {
	background-color : <?php echo $rgba; ?>;
}

.cmsms_plus span {
	background-color : <?php echo $bqt_color; ?>;
}

.cmsmsLike {
	background-color : #cccccc;
}

a.cmsms_prev_slide:hover span, 
a.cmsms_next_slide:hover span, 
a.cmsms_close_video:hover,
ul.cmsms_slides_nav li.active a, 
ul.cmsms_slides_nav li:hover a {
	background-color : #3a3a3a;
}
 