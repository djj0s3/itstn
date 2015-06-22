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

if (!isset($cmsmasters_shortcode_column)) {
    $cmsmasters_shortcode_column = new CMSMastersColumn();
}

?>
(function () {
    tinymce.create('tinymce.plugins.<?php echo $cmsmasters_shortcode_column->buttonName; ?>', {
        init : function (c, url) {
			c.addButton('<?php echo $cmsmasters_shortcode_column->buttonName; ?>', { 
				title : '<?php echo $cmsmasters_shortcode_column->buttonTitle; ?>', 
				type : 'splitbutton',
				onclick : function () { 
					return false;
				}, 
				menu : [ <?php 
					$out = '';
					
                    foreach ($cmsmasters_shortcode_column->buttonArray as $val) { 
                        $out .= '{ ' . 
                            "text : '" . $val[0] . "', " . 
                            "onclick : function () { " . 
								"if (tinyMCE.activeEditor.selection.getContent() !== '') { " . 
									"tinyMCE.activeEditor.selection.setContent('[" . $val[1] . "]' + tinyMCE.activeEditor.selection.getContent() + '[/" . $val[1] . "]'); " . 
								'} else { ' . 
									"tinyMCE.activeEditor.selection.setContent('[" . $val[1] . "]" . __('Insert you text here', 'cmsmasters') . '...' . "[/" . $val[1] . "]'); " . 
								'} ' . 
								"edInsertContent('', '[" . $val[1] . "]" . __('Insert you text here', 'cmsmasters') . '...' . "[/" . $val[1] . "]');" . 
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
                longname : '<?php echo $cmsmasters_shortcode_column->buttonTitle . ' ' . __('Shortcode Selector', 'cmsmasters'); ?>',
                author : '<?php _e('CMSMasters', 'cmsmasters'); ?>',
                authorurl : 'http://cmsmasters.net',
                infourl : 'http://cmsmasters.net',
                version : '1.0'
            };
        }
    } );
    
    tinymce.PluginManager.add('<?php echo $cmsmasters_shortcode_column->buttonName; ?>', tinymce.plugins.<?php echo $cmsmasters_shortcode_column->buttonName; ?>);
} )();
