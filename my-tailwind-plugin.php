<?php
/*
Plugin Name: My Tailwind Plugin
Description: A WordPress plugin using Tailwind CSS for demonstration.
Version: 1.0
Author: Sonu kumar
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Include dependencies.
require_once plugin_dir_path(__FILE__) . 'includes/class-my-tailwind-plugin-dependencies.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-my-tailwind-plugin-admin.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-my-tailwind-plugin-api.php';

// Initialize the plugin.
function my_tailwind_plugin_init() {
    $dependencies = new My_Tailwind_Plugin_Dependencies();
    $dependencies->register_dependencies();

    $admin = new My_Tailwind_Plugin_Admin();
    $admin->add_admin_menu();
    $admin->register_admin_actions();

    $api = new My_Tailwind_Plugin_API();
    $api->register_routes();
}
add_action('plugins_loaded', 'my_tailwind_plugin_init');
