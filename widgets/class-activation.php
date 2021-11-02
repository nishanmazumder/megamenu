<?php

/**
 * Elementor Widget Register
 */

final class Elementor_Widegets_Register
{

    public function init()
    {
        // Register Widgets
        add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets']);

        // Register Scripts
        $this->nm_mega_scripts();
    }

    public function includes()
    {
        require_once(plugin_dir_path(__FILE__) . 'class-mega-menu.php');
    }

    public function register_widgets()
    {
        $this->includes();
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \NM_MEGA_MENU());
    }

    public function nm_mega_scripts()
    {
        require_once(plugin_dir_path(__FILE__) . 'class-assets.php');
        $assets = new Assets();
    }
}
