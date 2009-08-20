<?php
/**
 * Handles the front end functions for the Hybrid Hook plugin.  The plugin assigns 
 * various settings and functions for most of the hooks in Hybrid.  The format of each
 * is $hook (textarea setting), $hook_priority (setting for the priority of the action), 
 * and $hook_php (setting for whether to exectue PHP).
 *
 * The formatting of the functions and settings matches the hook in Hybrid to make it easier
 * to loop through and call functions based on the hook. 
 *
 * @package HybridHook
 */

/* Add front end actions. */
add_action( 'init', 'hybrid_hook_load_actions' );

/**
 * Loads all the functions we're adding to the action hooks on the front end of the site.
 * Each hook/setting/function (names are the same) is added to an array.  We then loop 
 * through the array and call a function based off the hook if there's a setting for it.
 *
 * @since 0.2
 */
function hybrid_hook_load_actions() {

	/* Theme hook prefix. */
	$theme_prefix = 'hybrid';

	/* Plugin settings/functions prefix. */
	$plugin_prefix = 'hybrid_hook';

	/* Array of hooks. */
	$hooks = array( 
		'before_html',
		'after_html',
		'before_header',
		'header',
		'after_header',
		'before_page_nav',
		'after_page_nav',
		'before_container',
		'after_container',
		'before_content',
		'after_content',
		'before_entry', // 0.2
		'after_entry', // 0.2
		'after_single',
		'after_page',
		'before_primary',
		'after_primary',
		'before_secondary',
		'after_secondary',
		'before_subsidiary', // 0.2
		'after_subsidiary', // 0.2
		'before_footer',
		'footer',
		'after_footer'
	);

	/* Loop through each hook. If there's a setting saved for it, add the function that displays it to the actual action hook. */
	foreach ( $hooks as $hook ) {
		if ( hybrid_hook_get_setting( $hook ) )
			add_action( "{$theme_prefix}_{$hook}", 'hybrid_hook_execute_action', hybrid_hook_get_setting( "{$hook}_priority" ) );
	}
}

/**
 * Function for displaying individual actions.  This function grabs the value from the 
 * database, strips slashes, executes shortcodes, and executes PHP code (if the option 
 * is selected for the particular hook).  This function should only be called if there's a 
 * setting for $hook.
 *
 * @uses current_filter() Grabs the hook we're currently attaching our function to.
 * This allows us to only use this single function rather than coding individual functions
 * for each of our settings.
 *
 * @since 0.2
 * @param $hook string Setting to display based off its corresponding hook.
 */
function hybrid_hook_execute_action() {

	/* Grab the hook we're currently using. */
	$hook = current_filter();

	/* If there is no hook, return false. */
	if ( !$hook )
		return false;

	/* Remove the 'hybrid_' prefix from the hook name. */
	$hook = str_replace( 'hybrid_', '', $hook );

	/* Gets the setting value based on the action hook. */
	$value = hybrid_hook_get_setting( $hook );

	/* Execute shortcodes and strip slashes. */
	$value = do_shortcode( stripslashes( $value ) );

	/* Execute PHP if the user chose to do so for this content. */
	if ( hybrid_hook_get_setting( "{$hook}_php" ) )
		$value = hybrid_hook_execute_php( $value );

	echo $value;
}

/**
 * Executes PHP code.  This function should only be called if a user has specifically
 * checked the option to execute PHP for their function.
 *
 * @since 0.2
 * @param $value string Database value after it has went through stripslashes() and do_shortcode().
 * @return $value
 */
function hybrid_hook_execute_php( $value = '' ) {

	ob_start();
	eval( "?>$value<?php " );
	$value = ob_get_contents();
	ob_end_clean();

	return $value;
}

/**
 * Get a setting for the Hybrid Hook plugin.  Set $hybrid_hook_settings as
 * a global variable, so we're not having to use get_option() every time we need
 * to find a setting.
 *
 * @since 0.2
 * @global $hybrid_hook_settings Array of settings for the plugin.
 * @param $option string|int|array Specific Hybrid Hook setting we want to get.
 * @return $hybrid_hook_settings[$option] string|int|array Value of the setting input.
 */
function hybrid_hook_get_setting( $option = '' ) {
	global $hybrid_hook_settings;

	if ( !$option )
		return false;

	if ( !is_array( $hybrid_hook_settings ) )
		$hybrid_hook_settings = get_option( 'hybrid_hook_settings' );

	return $hybrid_hook_settings[$option];
}

?>