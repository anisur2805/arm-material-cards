<?php
/**
 * Plugin Name:       Material Cards
 * Plugin URI:        https://github.com/anisur2805/arm-material-cards
 * Description:       Material Cards 
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Anisur Rahman
 * Author URI:        https://github.com/anisur2805
 * License:           GPL v2 or later
 * Text Domain:       arm-cards
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function arm_material_cards() {
    // Load plugin file
    require_once(__DIR__ . '/widgets-loader.php' );

    // Run plugin file
    \ARM_Material_Cards\Plugin::instance();
}
add_action('plugins_loaded', 'arm_material_cards');