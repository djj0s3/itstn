<?php
/**
 * @package WordPress
 * @subpackage TryMee
 * @since TryMee 1.0
 * 
 * CSS 3 Rules for IE < 9
 * Created by CMSMasters
 * 
 */


header('Content-type: text/css');
require('../../../../wp-load.php');

?>
#slide_top, 
#bottom, 
span.dropcap2, 
.cmsms_plus,  
.cmsmsLike, 
.cmsms_slider_parent, 
#slider, 
a.cmsms_prev_slide span, 
a.cmsms_next_slide span, 
a.cmsms_close_video, 
ul.cmsms_slides_nav li a, 
.cmsms_content_slider_parent ul.cmsms_slides_nav li a {behavior:url(<?php echo get_template_directory_uri(); ?>/css/styles/pie.htc);}
