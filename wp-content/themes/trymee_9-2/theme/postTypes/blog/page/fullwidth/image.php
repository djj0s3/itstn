<?php
/**
 * @package WordPress
 * @subpackage TryMee
 * @since TryMee 1.0
 * 
 * Blog Page Full Width Image Post Format Template
 * Created by CMSMasters
 * 
 */

 
$attachments =& get_children(array(
	'post_type' => 'attachment', 
	'post_mime_type' => 'image', 
	'post_parent' => get_the_ID(), 
	'orderby' => 'menu_order', 
	'order' => 'ASC'
));

if (has_post_thumbnail() || sizeof($attachments) > 0) { 
	$noimg_class = '';
} else { 
	$noimg_class = 'format-noimg';
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class($noimg_class); ?>>
	<header class="entry-header">
		<?php cmsms_heading(get_the_ID()); ?>
	</header>
	<footer class="entry-meta">
		<div class="double_divider"></div>
		<?php cmsms_meta(); ?>
	</footer>
    <?php 
		if (has_post_thumbnail()) { 
			cmsms_thumb(get_the_ID(), 'full-slider-thumb', false, 'prettyPhoto', true, true, true, true, false);
		} elseif (!has_post_thumbnail() && sizeof($attachments) > 0) {
			foreach ($attachments as $attachment) { 
				if (!isset($counter) && $counter = true) { 
					cmsms_thumb(get_the_ID(), 'full-slider-thumb', false, 'prettyPhoto', true, true, true, true, $attachment->ID);
				}
			}
		}
		
		cmsms_exc_cont();
		
		cmsms_more(get_the_ID());
	?>
</article>