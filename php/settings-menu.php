<?php

// HTML for menu
// Ideal version is a jquery list of existing columns and a plus
// button simular to the pr_items style.
// No changes are made until save button on bottom is pushed.

function meta_math_settings_container_html(){
	if(!current_user_can('manage_options')){
		return;
	}
?>
	<div class="meta_math_settings_container">
	<h3>Meta Math</h3>
	No settings right now.
	</div>
<?php
}
function meta_math_options_page(){
	add_options_page(
		'Meta Math Options',
		'Meta Math Options',
		'manage_options',
		'meta_math',
		'meta_math_settings_container_html'
	);
}
//add_action('admin_menu', 'meta_math_options_page');
