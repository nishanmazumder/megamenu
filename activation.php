<?php

/**
 * Elementor Widget Register
 */

final class Elementor_Widegets_Register
{
    
    public function init()
    {
        // Register widgets
        add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets']);
    }

    public function includes()
    {
        require_once(plugin_dir_path(__FILE__) . '/widgets/class-mega-menu.php');
    }

    public function register_widgets()
    {
        $this->includes();
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \NM_MEGA_MENU());
    }
}
