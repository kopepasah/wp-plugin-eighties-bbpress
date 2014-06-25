<?php
/**
 * Compatibility
 *
 * @package Eighties Add-on - bbPress
 *
 * This file contains functionality checks if
 * both bbPress and Eighties are active.
 */

/**
 * Admin init for the add-on.
 *
 * @since 1.0.0
 */
function eighties_bbpress_admin_init() {
	/**
	 * If Eightes is not the current template or
	 * bbPress is not currently active, unset the
	 * activate parameter, throw a notice and then
	 * deactivate the plugin.
	*/
	if ( get_template() != 'eighties' || ! is_plugin_active( 'bbpress/bbpress.php' ) ) {
		/**
		 * Prevents WordPress from showing a notice when
		 * the plugin was activated.
		*/
		unset( $_GET['activate'] );

		/**
		 * Adds a notice that the Eightes theme or bbPress
		 * is required in order to use this plugin.
		*/
		add_action( 'admin_notices', 'eighties_bbpress_admin_init_notices' );

		/**
		 * Deactivates the plugin, as Eighties or bbPress
		 * is not currently active.
		*/
		deactivate_plugins( EIGHTIES_BBPRESS_BASENAME );
	}
}
add_action( 'admin_init', 'eighties_bbpress_admin_init' );

/**
 * Admin notices used in the admin_init hook
 * above.
 *
 * @since 1.0.0
 */
function eighties_bbpress_admin_init_notices() {
	/**
	 * Notice for the case that Eighties theme
	 * is not the current template.
	*/
	if ( get_template() != 'eighties' ) {
		?>
			<div class="error">
				<p><?php echo sprintf( __( 'Eighties Add-on - bbPress has been deactivated as it requires %sEightes theme%s. You must download, install and activate the theme before activating this add-on.', 'LION' ), '<a href="' . esc_url( "http://eighties.me" ) . '" target="_blank">', '</a>' ) ?></p>
			</div>
		<?php
	} else if ( ! is_plugin_active( 'bbpress/bbpress.php' ) ) {
		?>
			<div class="error">
				<p><?php echo sprintf( __( 'Eighties Add-on - bbPress has been deactivated as it requires %sbbPress plugin%s. You must download, install and activate the plugin before activating this add-on.', 'LION' ), '<a href="' . esc_url( "http://bbpress.org" ) . '" target="_blank">', '</a>' ) ?></p>
			</div>
		<?php
	}
}