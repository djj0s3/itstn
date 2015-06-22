<?php 
/**
 * @package WordPress
 * @subpackage TryMee
 * @since TryMee 1.0
 */


define('DOING_AJAX', true);
define('WP_ADMIN', true);

require_once('../../../../../../../wp-load.php');
require_once('../../../../../../../wp-admin/includes/admin.php');

do_action('admin_init');

if (!is_user_logged_in()) {
	die(__('You must be logged in to access this script', 'cmsmasters') . '.');
}

if (!isset($cmsmasters_shortcode_audio)) {
	$cmsmasters_shortcode_audio = new CMSMastersAudio();
}

?>
(function () {
	tinymce.create('tinymce.plugins.<?php echo $cmsmasters_shortcode_audio->buttonName; ?>', {
        init : function (c, url) {
			c.addButton('<?php echo $cmsmasters_shortcode_audio->buttonName; ?>', { 
				title : '<?php echo $cmsmasters_shortcode_audio->buttonTitle; ?>', 
				type : 'splitbutton',
				onclick : function () { 
					return false;
				}, 
				menu : [ <?php 
					$out = '';
					
                    foreach ($cmsmasters_shortcode_audio->buttonArray as $val) { 
                        $out .= '{ ' . 
                            "text : '" . $val[0] . "', " . 
                            "onclick : function () { " . 
								"tb_show('" . __('CMSMasters', 'cmsmasters') . " " . $val[0] . " " . __('Shortcode', 'cmsmasters') . "', '#TB_inline'); " . 
								"jQuery('#TB_ajaxContent').load('" . CMSMASTERS_ADMIN_TINYMCE . "/" . $cmsmasters_shortcode_audio->buttonName . "/editor_plugin_popup.php?type=" . $val[1] . "&content=' + tinyMCE.activeEditor.selection.getContent( { format : 'html' } ).replace(/ /g, '+'));" . 
								"jQuery('#TB_ajaxContent').css( { " . 
									"width : jQuery('#TB_ajaxContent').parent().width() - 30, " . 
									"height : jQuery('#TB_ajaxContent').parent().height() - 47 " . 
								'} );' . 
							'} ' . 
						'}, ';
                    } 
					
					echo substr($out, 0, -2);
                ?> ] 
			} );
        } ,
		createControl : function (n, c) {
            return null;
		} , 
		getInfo : function () {
			return {
				longname : '<?php echo $cmsmasters_shortcode_audio->buttonTitle . ' ' . __('Shortcode Selector', 'cmsmasters'); ?>',
				author : '<?php _e('CMSMasters', 'cmsmasters'); ?>',
				authorurl : 'http://cmsmasters.net',
				infourl : 'http://cmsmasters.net',
				version : '1.0'
			};
		}
	} );
	
	tinymce.PluginManager.add('<?php echo $cmsmasters_shortcode_audio->buttonName; ?>', tinymce.plugins.<?php echo $cmsmasters_shortcode_audio->buttonName; ?>);
} )();
