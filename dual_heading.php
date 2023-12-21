<?php
/**
 * Plugin Name: Elementor Dual Heading
 * Description: Custom Elementor Dual Heading.
 * Plugin URI:
 * Version:     1.0.0
 * Author:      Developed By Rifat
 * Author URI:
 * Text Domain: dualHeading
 *
 * Elementor tested up to: 3.16.0
 * Elementor Pro tested up to: 3.16.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function elementor_dual_heading() {

    // Load plugin file
    require_once( __DIR__ . '/includes/plugin.php' );

    // Run the plugin
    \Elementor_Dual_Heading\Plugin::instance();

}
add_action( 'plugins_loaded', 'elementor_dual_heading' );