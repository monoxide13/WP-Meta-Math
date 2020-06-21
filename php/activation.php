<?php

function meta_math_activation(){
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
}
register_activation_hook(MM_PLUGIN_LOCATION, 'meta_math_activation' );

function meta_math_deactivation(){
}
register_deactivation_hook(MM_PLUGIN_LOCATION, 'meta_math_deactivation');


