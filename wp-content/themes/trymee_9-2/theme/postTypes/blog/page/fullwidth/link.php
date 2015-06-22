<?php
/**
 * @package WordPress
 * @subpackage TryMee
 * @since TryMee 1.0
 * 
 * Blog Page Full Width Link Post Format Template
 * Created by CMSMasters
 * 
 */


$post_link_text = get_post_meta(get_the_ID(), 'post_link_text', true);
$post_link_link = get_post_meta(get_the_ID(), 'post_link_link', true);

if ($post_link_text == '') {
    $post_link_text = __('Enter link text', 'cmsmasters');
}

if ($post_link_link == '') {
    $post_link_link = '#';
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="entry-title">
			<a href="<?php echo $post_link_link; ?>" target="_blank"><?php echo '[' . __('Link' ,'cmsmasters') . '] ' . $post_link_text; ?></a>
		</h2>
	</header>
	<footer class="entry-meta">
		<div class="double_divider"></div>
		<?php cmsms_meta(); ?>
	</footer>
	<?php 
		cmsms_exc_cont();
		
		cmsms_more(get_the_ID());
	?>
</article>