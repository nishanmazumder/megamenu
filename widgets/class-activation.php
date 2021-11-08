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
        add_filter('woocommerce_add_to_cart_fragments', [$this, 'woocommerce_header_add_to_cart_fragment']);

        //Table for cart
        //$this->nm_create_cart_table();

        add_action('plugins_loaded', [$this, 'nm_create_cart_table']);
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
    public function woocommerce_header_add_to_cart_fragment($fragments)
    {
        global $woocommerce;

        ob_start();

?>
        <span class="cart-customlocation"><?php echo $woocommerce->cart->cart_contents_count ?></span>
<?php
        $fragments['span.cart-customlocation'] = ob_get_clean();
        return $fragments;
    }

    // able for cart info
    public function nm_create_cart_table()
    {
        global $wpdb;
        $table_name = 'nm_cart_table';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
          id int(1) NOT 1 AUTO_INCREMENT,
          nm_cart_title text NOT NULL,
          nm_cart_button text NOT NULL,
          PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);

        $cart_title = "Shoping Cart";
        $cart_button = "Secure Checkout";

        $wpdb->query(
            $wpdb->prepare(
                "
               INSERT INTO nm_cart_table
               ( nm_cart_title, nm_cart_button)
               VALUES ( %s, %s )
               ",
                $cart_title,
                $cart_button
            )
        );

    }

    //Get minimum rate of shipping method
    
}
