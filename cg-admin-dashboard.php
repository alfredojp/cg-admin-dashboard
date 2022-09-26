<?php
/**
 * Capgemini Admin Dashboard
 *
 * This file should only use syntax available in PHP 5.6 or later.
 *
 * @package      CG_Admin_Dashboard
 * @author       Łukasz Radziejewski (Capgemini MACS PL)
 * @copyright    2020 Capgemini
 * @license      GPLv2
 *
 * @wordpress-plugin
 * Plugin Name:       CG Admin Dashboard
 * Plugin URI:        https://github.com/wpcomvip/capgemini
 * Description:       Admin Dashboard manager
 * Version:           0.1.0
 * Author:            Capgemini MACS PL
 * Text Domain:       cg-admin-dashboard
 * License:           GPL-2.0-or-later
 * Requires PHP:      7.1
 * Requires WP:       4.7
 */

namespace CG_Admin_Dashboard;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Class to show recently updated posts in WP Dashboard.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/Recently_Updated.php';

/**
 * Class to show recently syndicated posts in WP Dashboard.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/Recently_Syndicated.php';

/**
 * Class to remove unused widgets.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/Remover.php';

/**
 * Initializes the plugin.
 */
function run() {

	$recently_updated    = new Recently_Updated();
	$recently_syndicated = new Recently_Syndicated();
	$remover             = new Remover();
	
	// Register Dashboard Widget for recently updated posts.
	add_action( 'wp_dashboard_setup', [ $recently_updated, 'register' ], 10, 1 );

	// Register Dashboard Widget for recently syndicated posts.
	add_action( 'wp_dashboard_setup', [ $recently_syndicated, 'register' ], 10, 1 );

	// Remove unused Dashboard Widgets.
	add_action( 'wp_dashboard_setup', [ $remover, 'remove_dashboard_widgets' ], 10, 1 );

}
run();
