<?php
/**
 * @package WordPress
 * @subpackage TryMee
 * @since TryMee 1.0
 * 
 * Blog Post Full Width Link Post Format Template
 * Created by CMSMasters
 * 
 */


global $blog_post_tags;

$post_link_text = get_post_meta(get_the_ID(), 'post_link_text', true);
$post_link_link = get_post_meta(get_the_ID(), 'post_link_link', true);

if ($post_link_text == '') {
    $post_link_text = __('Enter link text', 'cmsmasters');
}

if ($post_link_link == '') {
    $post_link_link = '#';
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-article'); ?>>
	<header class="entry-header">
		<h2 class="entry-title">
			<a href="<?php echo $post_link_link; ?>" target="_blank"><?php echo '[' . __('Link' ,'cmsmasters') . '] ' . $post_link_text; ?></a>
		</h2>
	</header>
	<footer class="entry-meta">
		<div class="double_divider"></div>
		<?php cmsms_meta('post', 'post'); ?>
	</footer>
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