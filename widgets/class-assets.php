<?php

/**
 * Mega menu scripts
 * 
 */

class Assets
{
    public function __construct()
    {
        $this->setup_hooks();
    }

    public function setup_hooks()
    {
        /***
         * Actions
         ***/
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
    }

    public function register_styles()
    {
        wp_enqueue_style('nm-mega-bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css');
        wp_enqueue_style('nm-mega-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.0/css/all.min.css');
        wp_enqueue_style('nm-mega-animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');
        wp_enqueue_style('nm-mega-style', plugins_url('../assets/css/style.css', __FILE__));
    }

    public function register_scripts()
    {
        //wp_enqueue_script('jq-v2', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js', array('jquery'), '', true);
        wp_enqueue_script('nm-mega-bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js', array('jquery'), '', true);
        wp_enqueue_script('nm-mega-wow', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', array('jquery'), '', true);
        wp_enqueue_script('nm-mega-custom', plugins_url('../assets/js/custom.js', __FILE__), array('jquery'), '', true);

        //wp_localize_script('nmBtcCustom', 'btc_obj', array('ajax_url' => admin_url('admin-ajax.php')));
    }
}
