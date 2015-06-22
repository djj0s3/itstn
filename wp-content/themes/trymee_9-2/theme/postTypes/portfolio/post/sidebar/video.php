<?php
/**
 * @package WordPress
 * @subpackage TryMee
 * @since TryMee 1.0
 * 
 * Portfolio Project with Sidebar Video Project Format Template
 * Created by CMSMasters
 * 
 */


global $portfolio_post_tags;

$project_tags = get_the_terms(get_the_ID(), 'pt-tags');

$project_video_link = explode(',', str_replace(' ', '', get_post_meta(get_the_ID(), 'project_video_link', true)));

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(array('format-video', 'project')); ?>>
	<header class="entry-header">
		<?php cmsms_heading(get_the_ID()); ?>
	</header>
	<footer class="entry-meta">
		<div class="double_divider"></div>
		<?php cmsms_meta('project', 'post', get_the_ID(), 'pt-sort-categ'); ?>
	</footer>
<?php 
    if ($project_video_link[0] != '') {
        $try_link = explode(':', $project_video_link[0], 2);
		
        if ($try_link[0] != 'http') {
			foreach ($project_video_link as $post_video) {
				$link = explode(':', $post_video, 2);
				
				if ($link[0] != 'http') {
					$video_link[$link[0]] = $link[1];
				}
			}
			
			if (has_post_thumbnail()) {
				$image_link = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'post-thumbnail', false);
				$video_link['poster'] = $image_link[0];
			}
			
			echo cmsmastersSingleVideoPlayer($video_link);
		} else {
			echo '<div class="resizable_block">' . 
				get_video_iframe($project_video_link[0]) . 
			'</div>';
		}
	} elseif (has_post_thumbnail()) {
		cmsms_thumb(get_the_ID(), 'post-thumbnail', false, 'prettyPhoto', true, true, true, true, false, 'full');
    }
	
	if (get_the_content() != '') {
		echo '<div class="entry-content">';
		
		the_content();
		
		wp_link_pages('before=<div class="subpage_nav"><strong>' . __('Pages', 'cmsmasters') . ':</strong>&link_before= [ &link_after= ] &after=</div>');
		
		echo '</div>';
	} else {
		echo '<br />' . 
		'<br />';
	}
	
	if ($portfolio_post_tags && $project_tags) {
		cmsms_tags(get_the_ID(), 'project', 'post', 'slider', 'pt-tags');
	}
?>
</article>