<?php
/**
 * Plugin Name: Meta Math
 * Plugin URI: https://github.com/monoxide13/WP-Meta-Math
 * Description: Plugin used to do math with meta values based on taxonomy.
 * Version: 0.2
 * Author: Monoxide13
 * Author URI: http://www.monoxide13.com
 */

// DEFINES
define ('MM_VERSION', '0.2');
define ('MM_PLUGIN_DIR' , plugin_dir_path(__FILE__));
define ('MM_PLUGIN_URL' , plugin_dir_url(__FILE__));
define ('MM_PLUGIN_LOCATION' , __FILE__);

// INCLUDES
require_once(MM_PLUGIN_DIR . 'php/includes.php');
require_once(MM_PLUGIN_DIR . 'php/activation.php');
require_once(MM_PLUGIN_DIR . 'php/admin.php');
require_once(MM_PLUGIN_DIR . 'php/shortcodes.php');

