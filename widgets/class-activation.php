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

        // Register Mega menu
        add_action('init', [$this, 'nm_mega_menu_register']);

        //Register woocommerce tab for discount
        $this->nm_discount_admin();

        // Register Scripts
        $this->nm_mega_scripts();

        //Cart count
        add_filter('woocommerce_add_to_cart_fragments', [$this, 'nm_mega_cart_count']);
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

    public function nm_mega_menu_register()
    {
        register_nav_menu('nm_mega_menu', esc_html__('Mega Menu', 'nm_theme'));
    }

    public function nm_mega_scripts()
    {
        require_once(plugin_dir_path(__FILE__) . 'class-assets.php');
        $assets = new Assets();
    }

    public function nm_discount_admin()
    {
        require_once(plugin_dir_path(__FILE__) . '../admin/class-discount.php');
    }

    //Cart Count
    public function nm_mega_cart_count($fragments)
    {
        global $woocommerce;

        ob_start();
        $items_count = $woocommerce->cart->cart_contents_count;
?>
        <span id="mini-cart-count"><?php echo $items_count ? $items_count : '0'; ?></span>
<?php
        $fragments['.mini-cart-count'] = ob_get_clean();
        return $fragments;
    }
}
