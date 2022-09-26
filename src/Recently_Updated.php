<?php
/**
 * Adding recently updated posts to WP Admin Dashboard
 *
 * @package      CG_Admin_Dashboard
 * @author       Łukasz Radziejewski (Capgemini MACS PL)
 * @copyright    Capgemini MACS PL
 * @license      GPL-2.0-or-later
 */

namespace CG_Admin_Dashboard;

class Recently_Updated {

	/**
	 * Create the function to output the content of our Recently Updated Posts Dashboard Widget.
	 */
	public function render() {

		$args = [
			'orderby'             => 'modified',
			'ignore_sticky_posts' => '1',
			'fields'              => 'ids',
			'post_status'         => 'any',
			'post_type'           => 'any',
		];

		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) {
			echo '<ul>';
			foreach ( $query->posts as $post ) {
				$content = ( '<li><span>' . get_the_modified_date( 'M j, Y g:i a', $post ) . '</span><a class="button-link" style="margin-left:30px" href="' . get_permalink( $post ) . '"> ' . get_the_title( $post ) . '</a></li>' );
				echo wp_kses(
					$content,
					[
						'a'    => [
							'href'  => [],
							'class' => [],
							'style' => [],
						],
						'li'   => [],
						'span' => [],
					]
				);
			}
			echo '<ul>';
			wp_reset_postdata();
		}
	}

	/**
	 * Add a widget to the WP Dashboard.
	 */
	public function register() {

		wp_add_dashboard_widget(
			'recently_updated_dashboard_widget_render', // Widget slug.
			esc_html__( 'Recently updated', 'cg-admin-dashboard' ), // Title.
			[ $this, 'render' ] // Display function.
		);
	}
}
