<?php #shortcodes.php
require_once('db_functions.php');

function meta_math_shortcode($atts){
	$options = get_option('meta_math_settings');
	$atts = shortcode_atts(
		array(
			'posttype' => $options['meta_math_posttype_field'], // Have option to set default
			'taxonomy' => $options['meta_math_taxonomy_field'], // Have option to set default
			'slug' => '',
			'meta' => '',
			'math' => 'sum',
		), $atts, 'meta-math');
	if($atts['meta'] == '')
		return '!META NOT DEFINED!';
	if($atts['taxonomy'] == ''){
		$term_taxonomy_ids = null;
	}elseif($atts['slug'] == ''){
		$term_taxonomy_ids = mm_getTermTaxIDsByTax($atts['taxonomy']);
	}else{
		$term_taxonomy_ids = mm_getTaxonomyChildren(mm_getTermTaxIDBySlug($atts['taxonomy'],$atts['slug']));
	}
	$result = mm_sumMeta($atts['posttype'], $term_taxonomy_ids, $atts['meta']);
	return array_sum($result);
}
add_shortcode('meta-math', 'meta_math_shortcode');

function post_meta_shortcode($atts){
	$atts = shortcode_atts(
		array(
			'meta' => '',
			'postid' => get_the_ID(),
		), $atts, 'post-meta');
	return get_post_meta($atts['postid'], $atts['meta'])[0];
}

add_shortcode('post-meta', 'post_meta_shortcode');
