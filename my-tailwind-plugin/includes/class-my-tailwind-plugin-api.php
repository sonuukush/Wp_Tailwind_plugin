<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class My_Tailwind_Plugin_API {
    public function register_routes() {
        add_action('rest_api_init', function () {
            register_rest_route('my-tailwind-plugin/v1', '/data', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_data'),
            ));
        });
    }

    public function get_data() {
       $data = array(
            array('id' => 1, 'name' => 'RIcky', 'role' => 'Administrator', 'email' => 'RIcky@example.com'),
            array('id' => 2, 'name' => 'Aman', 'role' => 'Editor', 'email' => 'Aman@example.com'),
            array('id' => 3, 'name' => 'Dev', 'role' => 'Subscriber', 'email' => 'Dev@example.com'),
        );
        return rest_ensure_response($data);
    }
}
?>
