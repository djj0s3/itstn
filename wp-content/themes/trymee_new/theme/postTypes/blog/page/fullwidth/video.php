<?php
/**
 * @package WordPress
 * @subpackage TryMee
 * @since TryMee 1.0
 * 
 * Blog Page Full Width Video Post Format Template
 * Created by CMSMasters
 * 
 */


$post_video_link = explode(',', str_replace(' ', '', get_post_meta(get_the_ID(), 'post_video_link', true)));

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php cmsms_heading(get_the_ID()); ?>
	</header>
	<?php 
		if ($post_video_link[0] != '') {
			$try_link = explode(':', $post_video_link[0], 2);
			
			if ($try_link[0] != 'http') {
				foreach ($post_video_link as $post_video) {
					$link = explode(':', $post_video, 2);

					if ($link[0] != 'http') {
						$video_link[$link[0]] = $link[1];
					}
				}

				if (has_post_thumbnail()) {
					$poster = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full-thumb');
					
					$video_link['poster'] = $poster[0];
				}
				
				echo cmsmastersSingleVideoPlayer($video_link);
			} else {
				echo '<div class="resizable_block">' . 
					get_video_iframe($post_video_link[0]) . 
				'</div>';
			}
		}
	?>
	<footer class="entry-meta">
		<div class="double_divider"></div>
		<?php cmsms_meta(); ?>
	</footer>
	<?php 
		cmsms_exc_cont();
		
		cmsms_more(get_the_ID());
    ?>
</article>