<?php
/**
 * @package WordPress
 * @subpackage TryMee
 * @since TryMee 1.0
 * 
 * Blog Page Full Width Standard Post Format Template
 * Created by CMSMasters
 * 
 */


if (has_post_thumbnail()) { 
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
			cmsms_thumb(get_the_ID(), 'full-thumb', true, false, true, false, true, true, false);
		}
		
		cmsms_exc_cont();
		
		cmsms_more(get_the_ID());
	?>
</article>