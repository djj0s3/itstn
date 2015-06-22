<?php
/**
 * @package WordPress
 * @subpackage TryMee
 * @since TryMee 1.0
 * 
 * Blog Page with Sidebar Aside Post Format Template
 * Created by CMSMasters
 * 
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php 
			if (has_excerpt()) {
				echo '<p>' . get_the_excerpt() . '</p>';
			} else {
				global $more;
				
				$more = 0;
				
				echo '<p>' . get_the_content('') . '</p>';
			}
		?>
	</header>
	<footer class="entry-meta">
		<div class="double_divider"></div>
		<div class="post_inner">
			<?php cmsms_meta(); ?>
		</div>
	</footer>
</article>