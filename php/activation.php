<?php

function custom_records_activation(){
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
}
register_activation_hook(CR_PLUGIN_LOCATION, 'custom_records_activation' );

function custom_records_deactivation(){
}
register_deactivation_hook(CR_PLUGIN_LOCATION, 'custom_records_deactivation');


