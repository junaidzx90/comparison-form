<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.fiverr.com/junaidzx90
 * @since             1.0.0
 * @package           Comparison_Form
 *
 * @wordpress-plugin
 * Plugin Name:       Comparison Form
 * Plugin URI:        https://www.fiverr.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.1
 * Author:            Developer Junayed
 * Author URI:        https://www.fiverr.com/junaidzx90
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       comparison-form
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'COMPARISON_FORM_VERSION', '1.0.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-comparison-form-activator.php
 */
function activate_comparison_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-comparison-form-activator.php';
	Comparison_Form_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-comparison-form-deactivator.php
 */
function deactivate_comparison_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-comparison-form-deactivator.php';
	Comparison_Form_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_comparison_form' );
register_deactivation_hook( __FILE__, 'deactivate_comparison_form' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-comparison-form.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_comparison_form() {

	$plugin = new Comparison_Form();
	$plugin->run();

}
run_comparison_form();
