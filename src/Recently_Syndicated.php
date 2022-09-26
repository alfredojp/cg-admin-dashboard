<?php
/**
 * Adding recently syndicated posts to WP Admin Dashboard
 *
 * @package      CG_Admin_Dashboard
 * @author       Łukasz Radziejewski (Capgemini MACS PL)
 * @copyright    Capgemini MACS PL
 * @license      GPL-2.0-or-later
 */

namespace CG_Admin_Dashboard;

class Recently_Syndicated {

	/**
	 * Create the function to output the content of our Recently Syndicated Posts Dashboard Widget.
	 */
	public function render() {
		echo esc_html__( 'List of recently syndicated posts:', 'cg-admin-dashboard' );
		
		// TODO Post MVP: add query to get recently syndicated posts.
		?>
		<p><em>[ Syndication Plugin comming soon ]</em></p>
		<?php
	}

	/**
	 * Add a widget to the WP Dashboard.
	 */
	public function register() {

		add_meta_box(
			'cg_recently_syndicated', // Widget slug.
			esc_html__( 'Recently syndicated', 'cg-admin-dashboard' ), // Title.
			[ $this, 'render' ], // Display function.
			'dashboard',
			'side',
			'high'
		);
	}
}
