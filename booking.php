<?php
/**
 * Booking Management System
 *
 * @package           PluginPackage
 * @author            Booking System Marketing
 * @copyright         2020 Booking system
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Change Marketing Booking System 
 * Plugin URI:        https://abc.com/plugin-name
 * Description:       Demo Booking System plugin
 * Version:           1.00
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            ABC enterprice
 * Author URI:        https://abc.com
 * Text Domain:       plugin-slug
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 **

/**
 * Activate the plugin.
 */

function pluginprefix_setup_post_type() {
    register_post_type( 'book', ['public' => true ] ); 
} 
add_action( 'init', 'pluginprefix_setup_post_type' );

/**
 * Activate the plugin.
 */
function pluginprefix_activate() { 
    // Trigger our function that registers the custom post type plugin.
    pluginprefix_setup_post_type(); 
    // Clear the permalinks after the post type has been registered.
    flush_rewrite_rules(); 
}
register_activation_hook( __FILE__, 'pluginprefix_activate' );

/**
 * Deactivation hook.
 */
function pluginprefix_deactivate() {
    // Unregister the post type, so the rules are no longer in memory.
    unregister_post_type( 'book' );
    // Clear the permalinks to remove our post type's rules from the database.
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'pluginprefix_deactivate' );
