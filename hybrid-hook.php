<?php
/** 
 * Plugin Name: Hybrid Hook
 * Plugin URI: http://themehybrid.com/themes/hybrid/hybrid-hook
 * Description: Gives you easy access to the Hybrid theme's hooks straight from your WordPress admin.  You can add <acronym title="Hypertext Markup Language">HTML</acronym>, shortcodes, <acronym title="Hypertext Preprocessor">PHP</acronym>, and/or JavaScript without having to dig into any theme files.
 * Version: 0.2
 * Author: Justin Tadlock
 * Author URI: http://justintadlock.com
 *
 * This plugin was created so that end users and non-developers could take advantage
 * of the Hybrid theme's extensive hook system.  It allows the input of XHTML, PHP, 
 * shortcodes, and JavaScript from the WordPress admin.  It's a way to work around 
 * having to learn how to use the WordPress plugin API and just add content anywhere.
 *
 * @copyright 2008 - 2009
 * @version 0.2
 * @author Justin Tadlock
 * @link http://justintadlock.com/archives/2008/04/13/cleaner-wordpress-gallery-plugin
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @package HybridHook
 */

/**
 * Yes, we're localizing the plugin.  This partly makes sure non-English
 * users can use it too.  To translate into your language use the
 * en_EN.po file as as guide.  Poedit is a good tool to for translating.
 * @link http://poedit.net
 *
 * @since 0.1
 */
load_plugin_textdomain( 'hook', false, '/hybrid-hook' );

/**
 * Make sure we get the correct directory.
 * @since 0.1
 */
if ( !defined( 'WP_CONTENT_DIR' ) )
	define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
if ( !defined( 'WP_PLUGIN_DIR' ) )
	define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );

/**
 * Define constant paths to the plugin folder.
 * @since 0.1
 */
define( HYBRID_HOOK, WP_PLUGIN_DIR . '/hybrid-hook' );

/* Load admin files if we're in the admin. */
if ( is_admin() )
	require_once( HYBRID_HOOK . '/settings.php' );

/* Load functions if we're on the front end of the site. */
else
	require_once( HYBRID_HOOK . '/add-actions.php' );

?>