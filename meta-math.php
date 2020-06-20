<?php
/**
 * Plugin Name: Meta Math
 * Plugin URI: http://www.monoxide13.com/meta-math
 * Description: Plugin used to do math with meta values based on taxonomy.
 * Version: 0.1
 * Author: Monoxide13
 * Author URI: http://www.monoxide13.com
 */

// DEFINES
define ('MM_VERSION', '0.1');
define ('MM_PLUGIN_DIR' , plugin_dir_path(__FILE__));
define ('MM_PLUGIN_URL' , plugin_dir_url(__FILE__));
define ('MM_PLUGIN_LOCATION' , __FILE__);

// INCLUDES
require_once(MM_PLUGIN_DIR . 'php/includes.php');
require_once(MM_PLUGIN_DIR . 'php/activation.php');
require_once(MM_PLUGIN_DIR . 'php/settings-menu.php');
require_once(MM_PLUGIN_DIR . 'php/shortcodes.php');

