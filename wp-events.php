<?php
/**
 * WP Events
 *
 * @package           wp-events
 * @author            Léo Muniz
 * @copyright         2021 Léo Muniz
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       WPEvents
 * Plugin URI:        wpevents.com
 * Description:       WordPress plugin to manage events and ticketing.
 * Version:           1.0.0
 * Author:            Léo Muniz
 * Author URI:        leomuniz.com.br
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpevents
 * Domain Path:       /assets/languages
 */

namespace WPEvents;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Constants.
define( __NAMESPACE__ . '\PLUGIN_VER', '1.0.0' );
define( __NAMESPACE__ . '\PLUGIN_DIR', __DIR__ );
define( __NAMESPACE__ . '\PLUGIN_URL', plugin_dir_url( __FILE__ ) );
require_once 'includes/constants.php';

$autoloader = require_once 'includes/autoload.php';
$autoloader();

$eventos = new PostTypes\Eventos();


//Core\Plugin::get_instance();
