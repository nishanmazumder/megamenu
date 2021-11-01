<?php
//Script
add_action('wp_enqueue_scripts', 'nm_megamenu_script');

//Ajax localize
// add_action('wp_ajax_btc_reg_form', 'btc_reg_form');
// add_action('wp_ajax_nopriv_btc_reg_form', 'btc_reg_form');

function nm_megamenu_script()
{
    wp_enqueue_style('nm-mega-bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css');
    wp_enqueue_style('nm-mega-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('nm-mega-animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');
    wp_enqueue_style('nm-mega-style', plugins_url('/assets/css/style.css', __FILE__));

    //wp_enqueue_script('jq-v2', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js', array('jquery'), '', true);
    wp_enqueue_script('nm-mega-bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js', array('jquery'), '', true);
    wp_enqueue_script('nm-mega-wow', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', array('jquery'), '', true);
    wp_enqueue_script('nm-mega-custom', plugins_url('/assets/js/custom.js', __FILE__), array('jquery'), '', true);

    //wp_localize_script('nmBtcCustom', 'btc_obj', array('ajax_url' => admin_url('admin-ajax.php')));
}
