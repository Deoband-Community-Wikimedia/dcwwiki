<?php
/**
 * The plugin premium page.
 *
 * @link       https://shapedplugin.com/
 * @since      2.0.0
 * @package    WP_Team
 * @subpackage WP_Team/includes
 * @author     ShapedPlugin <support@shapedplugin.com>
 */

namespace ShapedPlugin\WPTeam\Admin\Helper;

/**
 * Team Premium class
 */
class Team_Premium {

	/**
	 * Add SubMenu Page
	 */
	public function premium_page() {
		$landing_page = 'https://getwpteam.com/pricing/?ref=1';
		add_submenu_page( 'edit.php?post_type=sptp_member', __( 'WP Team Premium', 'team-free' ), '<span class="sp-go-pro-icon"></span>Go Pro', 'manage_options', $landing_page );
	}
}
