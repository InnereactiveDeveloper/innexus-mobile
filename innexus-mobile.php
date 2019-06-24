<?php
/**
 *
 * @link https://www.getinnexus.com
 * @since 1.0.1
 * @package XMOB
 *
 * Plugin Name: Innexus Mobile
 * Plugin URI: https://www.getinnexus.com
 * Description: Innexus Mobile
 * Author: Innexus by Innereactive
 * Author URI: https://www.getinnexus.com
 * Version: 1.1.1
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Define global constants.
 *
 * @since 1.0
 */
// Plugin version.
if ( ! defined( 'XMOB_VERSION' ) ) {
	define( 'XMOB_VERSION', '1.0' );
}

if ( ! defined( 'XMOB_NAME' ) ) {
	define( 'XMOB_NAME', trim( dirname( plugin_basename( __FILE__ ) ), '/' ) );
}

if ( ! defined( 'XMOB_DIR' ) ) {
	define( 'XMOB_DIR', WP_PLUGIN_DIR . '/' . XMOB_NAME );
}

if ( ! defined( 'XMOB_URL' ) ) {
	define( 'XMOB_URL', WP_PLUGIN_URL . '/' . XMOB_NAME );
}

/**
 * Mobile
 */
require_once( XMOB_DIR . '/mobile/index.php' );
require_once( XMOB_DIR . '/mobile/fields.php' );
require_once( XMOB_DIR . '/distribute/BFIGitHubPluginUploader.php' );
if ( is_admin() ) {
    new BFIGitHubPluginUpdater( __FILE__, 'InnereactiveDeveloper', "innexus-mobile" );
}
