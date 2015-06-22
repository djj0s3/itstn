<?php
/**
 * @package WordPress
 * @subpackage TryMee
 * @since TryMee 1.0
 * 
 * Blog Page with Sidebar Quote Post Format Template
 * Created by CMSMasters
 * 
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<blockquote>
		<?php 
			if (has_excerpt()) {
				echo '<p>' . get_the_excerpt() . '</p>';
			} else {
				echo '<p>' . __('Enter post excerpt', 'cmsmasters') . '</p>';
			}
		?>
		</blockquote>
		<div class="entry-content">
		<?php 
			if (get_the_content('') != '') { 
				global $more;
				
				$more = 0;
				
				echo '<p>' . get_the_content('') . '</p>';
			}
		?>
		</div>
	</header>
	<footer class="entry-meta">
		<div class="double_divider"></div>
		<div class="post_inner">
			<?php cmsms_meta(); ?>
		</div>
	</footer>
</article>