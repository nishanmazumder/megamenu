<div class="woo_amc_bg"></div>
<div class="woo_amc_container_wrap">
    <div class="woo_amc_container woo_amc_container_side">
        <div class="woo_amc_head">
            <?php

            global $wpdb;
            $results = $wpdb->get_results("SELECT * FROM nm_cart_table WHERE id = 0");

            foreach ($results as $result) {
                $cart_title = $result->nm_cart_title;
                $cart_btn = $result->nm_cart_button;
            }

            ?>
            <div class="woo_amc_head_title woo_amc_center"><?php echo $cart_title; ?></div>
            <div class="woo_amc_close">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
        </div>
        <div class="woo_amc_items_scroll">
            <div class="woo_amc_items_wrap woo_amc_center">
                <div class="woo_amc_items_loading">
                    <div class="lds-spinner">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <div class="woo_amc_items">
                    <?php require_once $template_items_path; ?>
                </div>

                <div class="nm_enjoy_product">
                    <h4><?php _e('People also enjoy', 'nm_theme'); ?></h4>
                    <div class="nm-product-area">

                        <?php

                        global $post;

                        $terms = wp_get_post_terms($post->ID, 'product_cat');
                        foreach ($terms as $term) $cats_array[] = $term->term_id;

                        $args = array(
                            'orderby' => 'rand',
                            'post__not_in' => array($post->ID),
                            'posts_per_page' => 3,
                            'no_found_rows' => 1,
                            'post_status' => 'publish',
                            'post_type' => 'product',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'id',
                                    'terms' => $cats_array
                                )
                            )
                        );

                        $products = new WP_Query($args);
                        
                        if ($products->have_posts()) { ?>
                            <?php while ($products->have_posts()) : $products->the_post();
                                global $product; ?>
                                <div class="nm-product">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?php echo esc_url(get_the_permalink()); ?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt=""></a>
                                    <?php endif; ?>
                                    <p><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo $product->get_name(); ?></a></p>

                                    <?php
                                    $regular_price = $product->get_regular_price();
                                    $sell_price = $product->get_sale_price();

                                    if ($sell_price) { ?>
                                        <a rel="nofollow" href="/?add-to-cart=<?php echo get_the_ID(); ?>" data-quantity="1" data-product_id="<?php echo get_the_ID(); ?>" data-product_sku="" class="add_to_cart_button ajax_add_to_cart">Add - <del><?php echo get_woocommerce_currency_symbol() . $regular_price; ?></del><?php echo get_woocommerce_currency_symbol() . $sell_price; ?></a>
                                    <?php
                                    } else { ?>

                                        <a rel="nofollow" href="/?add-to-cart=<?php echo get_the_ID(); ?>" data-quantity="1" data-product_id="<?php echo get_the_ID(); ?>" data-product_sku="" class="add_to_cart_button ajax_add_to_cart">Add - <?php echo get_woocommerce_currency_symbol() . $regular_price; ?></a>
                                    <?php } ?>




                                </div>
                            <?php endwhile;  ?>

                        <?php
                        }

                        wp_reset_postdata();

                        ?>
                    </div>
                </div>
            </div>
        </div>








        <?php

        $zone_ids = array_keys(array('') + WC_Shipping_Zones::get_zones());

        foreach ($zone_ids as $zone_id) {
            $shipping_zone = new WC_Shipping_Zone($zone_id);

            $shipping_methods = $shipping_zone->get_shipping_methods(true, 'values');

            foreach ($shipping_methods as  $shipping_method) {
                $min_amount[] = $shipping_method->min_amount;
            }
        }



        ?>

        <div id="cart_container">
            <a class="cart-contents" href="" title="<?php // _e('View your shopping cart'); ?>">
                <?php //echo WC()->cart->get_cart_total(); ?>
            </a>
        </div>

        <div class="nm-secure-checkout woo_amc_footer">
            <?php //if (floatval($cart_total_amount) >= floatval($min_amount[0])) : ?>
                <span>You've unlocked <b>FREE Priority Shipping!</b></span>
            <?php //endif; ?>







            <div class="nm-subtotal woo_amc_footer_total">
                <span>Subtotal</span>
                <span class="woo_amc_value"><?php echo $cart_total; ?></span>
            </div>
            <a href="<?php echo get_permalink(wc_get_page_id('cart')); ?>"><i class="fa fa-lock" aria-hidden="true"></i><?php echo $cart_btn; ?></a>
            <p>Taxes are calculated at checkout</p>
        </div>

        <!-- <a href="<?php //echo get_permalink(wc_get_page_id('cart')); 
                        ?>" class="woo_amc_footer">
            <div class="woo_amc_center woo_amc_flex">
                <div class="woo_amc_footer_w50 woo_amc_flex">
                    <div class="woo_amc_footer_lines">
                        <div class="woo_amc_footer_products">
                            <div class="woo_amc_label"><?php //echo $options['cart_footer_products_label']; 
                                                        ?></div>
                            <div class="woo_amc_value"><?php //echo $cart_count; 
                                                        ?></div>
                        </div>
                        <div class="woo_amc_footer_total">
                            <div class="woo_amc_label"><?php //echo $options['cart_footer_total_label']; 
                                                        ?></div>
                            <div class="woo_amc_value"><?php //echo $cart_total; 
                                                        ?></div>
                        </div>
                    </div>
                </div>
                <div class="woo_amc_footer_w50 woo_amc_flex">
                    <div class="woo_amc_footer_link"><?php //echo $options['cart_footer_link_text']; 
                                                        ?></div>
                </div>
            </div>
        </a> -->

    </div>
</div>