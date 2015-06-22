<?php 
/**
 * @package WordPress
 * @subpackage TryMee
 * @since TryMee 1.0
 * 
 * Custom Comments Template
 * Created by CMSMasters
 * 
 */


function mytheme_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<figure class="alignleft">
			<?php echo get_avatar($comment, $size = '100', $default = '<path_to_url>'); ?>
		</figure>
        <div id="comment-<?php comment_ID(); ?>" class="comment-body">
			<figure class="cms_avatar">
				<?php echo get_avatar($comment, $size = '55', $default = '<path_to_url>'); ?>
			</figure>
            <div class="ovh">
				<?php edit_comment_link(__('Edit', 'cmsmasters'), '<span class="fr">', '</span>'); ?>
				<h6 class="fl"><?php echo get_comment_author_link(); ?></h6>
				<div class="cl"></div>
			<?php 
				echo '<abbr class="published fl" title="' . get_comment_time('F d, Y') . ' ' . __('at', 'cmsmasters') . ' ' . get_comment_time('g:i a') . '">' . get_comment_time('F d, Y') . ' ' . __('at', 'cmsmasters') . ' ' . get_comment_time('g:i a') . '</abbr>';
                
                comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => __('Reply', 'cmsmasters'), 'before' => '<em class="fl">&nbsp; &#183; &nbsp;', 'after' => '</em>')));
			?>
            </div>
			<?php 
                comment_text();
                
                if ($comment->comment_approved == '0') {
                    echo '<p><em>' . __('Your comment is awaiting moderation.', 'cmsmasters') . '</em></p>';
                }
            ?>
        </div>
    <?php 
}

?>