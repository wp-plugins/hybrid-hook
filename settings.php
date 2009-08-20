<?php
/**
 * Handles the administration functions for the Hybrid Hook plugin.
 *
 * @package HybridHook
 */

/* Execute the admin stuff. */
hybrid_hook_admin_init();

/**
 * Initializes the admin functions for the plugin.
 * @since 0.2
 */
function hybrid_hook_admin_init() {
	add_action( 'admin_init', 'hybrid_hook_admin_init' );
	add_action( 'admin_init', 'hybrid_hook_register_settings' );
	add_action( 'admin_menu', 'hybrid_hook_settings_page_init' );
}

/**
 * Adds an additional menu item under the Themes/Appearance menu.
 * Loads actions specifically for the Hybrid Hook settings page.
 *
 * @since 0.2
 * @global $hybrid_hook_settings_page
 */
function hybrid_hook_settings_page_init() {
	global $hybrid_hook_settings_page;

	/* Add Hybrid Hook settings page. */
	$hybrid_hook_settings_page = add_theme_page( __('Hybrid Hook Settings', 'hook'), __('Hybrid Hook', 'hook'), 'edit_themes', 'hybrid-hook', 'hybrid_hook_settings_page' );

	/* Add media for the settings page. */
	add_action( "load-{$hybrid_hook_settings_page}", 'hybrid_hook_settings_page_media' );
	add_action( "admin_head-{$hybrid_hook_settings_page}", 'hybrid_hook_settings_page_scripts' );
}

/**
 * Registers the Hybrid Hook settings.
 * @uses register_setting() to add the settings to the database.
 *
 * @since 0.2
 */
function hybrid_hook_register_settings() {
	register_setting( 'hybrid_hook_plugin_settings', 'hybrid_hook_settings', 'hybrid_hook_settings_validate' );
}

/**
 * Function for validating the settings input.
 * @since 0.2
 */
function hybrid_hook_settings_validate( $input ) {
	return $input;
}

/**
 * Loads the HTML of the settings page.
 * @since 0.2
 */
function hybrid_hook_settings_page() {
	require_once( HYBRID_HOOK . '/settings-page.php' );
}

/**
 * Loads needed JavaScript files for handling the meta boxes on the settings page.
 * @since 0.2
 */
function hybrid_hook_settings_page_media() {
	wp_enqueue_script( 'common' );
	wp_enqueue_script( 'wp-lists' );
	wp_enqueue_script( 'postbox' );
}

/**
 * Loads JavaScript for handling the open/closed state of each meta box.
 *
 * @since 0.2
 * @global $hybrid_hook_settings_page The path of the settings page.
 */
function hybrid_hook_settings_page_scripts() {
	global $hybrid_hook_settings_page;
	?>
	<script type="text/javascript">
		//<![CDATA[
		jQuery(document).ready( function($) {
			$('.if-js-closed').removeClass('if-js-closed').addClass('closed');
			postboxes.add_postbox_toggles( '<?php echo $hybrid_hook_settings_page; ?>' );
		});
		//]]>
	</script>
	<?php
}

?>