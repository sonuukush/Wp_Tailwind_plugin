<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class My_Tailwind_Plugin_Admin {
    public function add_admin_menu() {
        add_action('admin_menu', array($this, 'create_admin_menu'));
    }

    public function create_admin_menu() {
        add_menu_page(
            'My Tailwind Plugin', 
            'Tailwind Plugin', 
            'manage_options', 
            'my-tailwind-plugin', 
            array($this, 'display_admin_page'), // Callback function
            'dashicons-admin-generic', 
            6 
        );
    }

    public function display_admin_page() {
        echo '<div class="wrap">';
        echo '<h1>My Tailwind Plugin listing</h1>';
        echo '<div id="my-tailwind-plugin-listing"></div>';
        echo '</div>';
    }

    public function register_admin_actions() {
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));
        add_action('wp_ajax_my_tailwind_plugin_fetch_data', array($this, 'fetch_data'));
    }

    public function enqueue_admin_scripts() {
        wp_enqueue_script('my-tailwind-plugin-admin', plugins_url('../admin.js', __FILE__), array('jquery'), '1.0', true);
        wp_localize_script('my-tailwind-plugin-admin', 'MyTailwindPlugin', array('ajax_url' => admin_url('admin-ajax.php')));
    }

    public function fetch_data() {
        // fetch PHP API 
        $response = wp_remote_get(rest_url('my-tailwind-plugin/v1/data'));

        if (is_wp_error($response)) {
            wp_send_json_error($response->get_error_message());
        }

        $data = json_decode(wp_remote_retrieve_body($response), true);
        wp_send_json_success($data);
    }
}
?>
