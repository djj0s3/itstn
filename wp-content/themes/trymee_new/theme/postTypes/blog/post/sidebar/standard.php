<?php
/**
 * @package WordPress
 * @subpackage TryMee
 * @since TryMee 1.0
 * 
 * Blog Post with Sidebar Standard Post Format Template
 * Created by CMSMasters
 * 
 */


global $blog_post_tags;

if (has_post_thumbnail() || sizeof($attachments) > 0) { 
	$noimg_class = 'post-article';
} else { 
	$noimg_class = 'post-article format-noimg';
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class($noimg_class); ?>>
	<header class="entry-header">
		<?php cmsms_heading(get_the_ID()); ?>
	</header>
	<footer class="entry-meta">
		<div class="double_divider"></div>
		<?php cmsms_meta('post', 'post'); ?>
	</footer>
    <?php 
		if (has_post_thumbnail()) { 
			cmsms_thumb(get_the_ID(), 'post-thumbnail', false, 'prettyPhoto', true, false, true, true, false);
		}
	?>
	<div class="entry-content">
    <?php 
		the_content();
		
		wp_link_pages('before=<div class="subpage_nav"><strong>' . __('Pages', 'cmsmasters') . ':</strong>&link_before= [ &link_after= ] &after=</div>');
	?>
	</div>
	<?php 
	if ($blog_post_tags && get_the_tags()) {
		cmsms_tags(get_the_ID(), 'post', 'post');
	}
	?>
</article>