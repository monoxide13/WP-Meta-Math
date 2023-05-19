<?php
require_once( ABSPATH . 'wp-admin/includes/upgrade.php');

function meta_math_activation(){
	// Register settings
	// IF OPTIONS DON'T EXIST, THEN SET TO NULL.
	$options = get_option('meta_math_settings');
	if(!array_key_exists('posttype_field', $options)){
		$options['posttype_field'] = '';
		update_option('meta_math_settings', $options);
	}
	if(!array_key_exists('taxonomy_field', $options)){
		$options['taxonomy_field'] = '';
		update_option('meta_math_settings', $options);
	}
	

//	$options['meta_math_posttype_field']='';
//	$options['meta_math_taxonomy_field']='';
}

register_activation_hook(MM_PLUGIN_LOCATION, 'meta_math_activation' );

function meta_math_deactivation(){
}
register_deactivation_hook(MM_PLUGIN_LOCATION, 'meta_math_deactivation');

