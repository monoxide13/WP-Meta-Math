<?php #admin.php

function meta_math_posttype_field_render(){
	$options = get_option('meta_math_settings');
	$postTypeList = get_post_types();
?>
	<select name='meta_math_settings[meta_math_posttype_field]'>;
	<option value='' <?php selected($options['meta_math_posttype_field'], '');?>>null</option>
<?php
	foreach($postTypeList as $postType){
		echo "<option value='$postType' ".selected($options['meta_math_posttype_field'], $postType).">$postType</option>";
	}
	echo "</select>";
}
function meta_math_taxonomy_field_render(){
	$options = get_option('meta_math_settings');
	$taxonomyList = get_taxonomies();
?>
	<select name='meta_math_settings[meta_math_taxonomy_field]'>;
	<option value='' <?php selected($options['meta_math_taxonomy_field'], '');?>>null</option>
<?php
	foreach($taxonomyList as $taxonomy){
		echo "<option value='$taxonomy' ".selected($options['meta_math_taxonomy_field'], $taxonomy).">$taxonomy</option>";
	}
	echo "</select>";
}

function meta_math_settings_init(){
	register_setting('pluginPage', 'meta_math_settings');
	add_settings_section(
		'meta_math_pluginPage_section',
		__('Defaults', 'meta_math_domain'),
		'meta_math_settings_section_callback',
		'pluginPage'
	);
	add_settings_field('meta_math_posttype_field',
		__('Default Post Type', 'meta_math_domain'),
		'meta_math_posttype_field_render',
		'pluginPage',
		'meta_math_pluginPage_section'
	);
	add_settings_field('meta_math_taxonomy_field',
		__('Default taxonomy', 'meta_math_domain'),
		'meta_math_taxonomy_field_render',
		'pluginPage',
		'meta_math_pluginPage_section'
	);
}

function meta_math_settings_section_callback(){
	echo __('Here you can set the default post type and taxonomy. These will be used unless a different one is defined in the shortcode. If \'null\' is selected, a value of \'\' will be set as default.', 'meta_math_domain');
}
add_action('admin_init', 'meta_math_settings_init');

function meta_math_options_page(){
	?>
	<form action='options.php' method='post'>
	<h2>meta-math</h2>
	<?php
	settings_fields('pluginPage');
	do_settings_sections('pluginPage');
	submit_button();
}

function meta_math_admin_menu(){
	add_options_page(
		'Meta Math Options',
		'Meta Math Options',
		'manage_options',
		'meta-math',
		'meta_math_options_page'
	);
}
add_action('admin_menu', 'meta_math_admin_menu');
