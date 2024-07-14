<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
//newS
class My_Tailwind_Plugin_Dependencies {
    public function register_dependencies() {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_tailwind_css'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_tailwind_css'));
    }

    public function enqueue_tailwind_css() {
        wp_enqueue_style('tailwindcss', 'https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css', array(), '2.2.19');
    }

}
?>
