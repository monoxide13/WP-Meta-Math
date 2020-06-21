<?php

require_once('includes.php');
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

function mm_getTermTaxIDsByTax($taxonomy){
	global $wpdb;
	if($taxonomy==null || $taxonomy=='')
		return null;
	$results = $wpdb->get_col("SELECT term_taxonomy_id FROM {$wpdb->prefix}term_taxonomy WHERE taxonomy like '$taxonomy'", 0);
	if($results===false)
		return null;
	return $results;
}

function mm_getTermTaxIDBySlug($taxonomy, $slug){
	global $wpdb;
	$result = $wpdb->get_col("SELECT tt.term_taxonomy_id FROM {$wpdb->prefix}term_taxonomy tt LEFT JOIN {$wpdb->prefix}terms trm on tt.term_id=trm.term_id WHERE tt.taxonomy LIKE '$taxonomy' AND trm.slug LIKE '$slug';",0);
	return $result[0];
}
function mm_getTaxonomyChildren($parent){
	global $wpdb;
	$result = $wpdb->get_col("SELECT term_taxonomy_id FROM {$wpdb->prefix}term_taxonomy WHERE parent=$parent;", 0);
	if($result===false){
		error_log("DB ERROR: ".__file__.__line__);
		$output[] = $parent;
	}elseif($result==false){
		$output[] = $parent;
	}else{
		$output[] = $parent;
		foreach($result as $child){
			$output = array_merge($output, mm_getTaxonomyChildren($child));
		}
	}
	return $output;
}

function mm_sumMeta($taxIDs, $meta_key){
	global $wpdb;
	$taxString='';
	if($taxIDs!=null){
		$taxString = ' AND tr.term_taxonomy_id IN (';
		$taxString .= implode(', ', $taxIDs);
		$taxString .= ')';
	}
	$query="SELECT tr.term_taxonomy_id, pm.post_id, pm.meta_key, pm.meta_value FROM {$wpdb->prefix}postmeta pm JOIN {$wpdb->prefix}term_relationships tr ON pm.post_id=tr.object_id WHERE pm.meta_key LIKE '$meta_key'$taxString;";
	$result = $wpdb->get_col($query, 3);
	return $result;
}
