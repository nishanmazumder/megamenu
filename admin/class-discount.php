<?php

/**
 * Product Discount
 **/

//Create the section beneath the products tab
add_filter('woocommerce_get_sections_products', 'nm_discount_add_section');
function nm_discount_add_section($sections)
{
    $sections['nm_discount'] = __('Discount', 'nm_theme');
    return $sections;
}

/**
 * Add settings to the specific section we created before
 */

add_filter('woocommerce_get_settings_products', 'nm_discount_all_settings', 10, 2);
function nm_discount_all_settings($settings, $current_section)
{
    /**
     * Check the current section is what we want
     **/
    if ($current_section == 'nm_discount') {
        $settings_slider = array();
        // Add Title to the Settings
        $settings_slider[] = array(
            'name' => __('Add your coupon to set discount', 'nm_theme'),
            'type' => 'title',
            'desc' => __('The following options are used to discount for selected product', 'nm_theme'),
            'id' => 'nm_discount'
        );

        // Add second text field option
        $settings_slider[] = array(
            'name'     => __('Coupon Code', 'nm_theme'),
            'id'       => 'nm_discount_code',
            'type'     => 'text',
            // 'desc'     => __('Any title you want can be added to your slider with this option!', 'nm_theme'),
        );

        $settings_slider[] = array('type' => 'sectionend', 'id' => 'nm_discount');
        return $settings_slider;

        /**
         * If not, return the standard settings
         **/
    } else {
        return $settings;
    }
}


// add_filter( 'wc_add_to_cart_message_html', 'empty_wc_add_to_cart_message');
// function empty_wc_add_to_cart_message( $message, $products ) { 
//     return ''; 
// }; 