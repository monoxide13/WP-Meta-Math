<?php

function meta_math_activation(){
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
	// Register settings
	$options['meta_math_posttype_field']='';
	$options['meta_math_taxonomy_field']='';
	update_option(meta_math_settings, $options);
}
register_activation_hook(MM_PLUGIN_LOCATION, 'meta_math_activation' );

function meta_math_deactivation(){
}
register_deactivation_hook(MM_PLUGIN_LOCATION, 'meta_math_deactivation');


