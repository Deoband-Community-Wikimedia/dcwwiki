<?php
/**
 * The template part for displaying content
 * @package Event Management
 * @subpackage event_management
 * @since 1.0
 */
?>

<?php $event_management_theme_lay = get_theme_mod( 'event_management_post_layouts','Layout 2');
if($event_management_theme_lay == 'Layout 1'){ 
	get_template_part('template-parts/Post-layouts/layout1'); 
}else if($event_management_theme_lay == 'Layout 2'){ 
	get_template_part('template-parts/Post-layouts/layout2'); 
}else if($event_management_theme_lay == 'Layout 3'){ 
	get_template_part('template-parts/Post-layouts/layout3'); 
}else{ 
	get_template_part('template-parts/Post-layouts/layout2'); 
}