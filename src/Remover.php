<?php
/**
 * Remove unused widgets from WP Admin Dashboard.
 *
 * @package      CG_Admin_Dashboard
 * @author       Łukasz Radziejewski (Capgemini MACS PL)
 * @copyright    Capgemini MACS PL
 * @license      GPL-2.0-or-later
 */

namespace CG_Admin_Dashboard;

class Remover {

	/**
	 * Remove unused widgets.
	 */
	public function remove_dashboard_widgets() {
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' ); // WordPress.com Blog.
		remove_action( 'welcome_panel', 'wp_welcome_panel' ); // Welcome Panel.
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' ); // Quick Dreft widget.
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' ); // Other WordPress News.
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' ); // Recent Comments.
		remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' ); // Site Health
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' ); // Default Dashboard Activity.
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' ); // At a glance.
	}
}
