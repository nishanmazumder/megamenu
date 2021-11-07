<div class="woo_amc_bg"></div>
<div class="woo_amc_container_wrap">
    <div class="woo_amc_container woo_amc_container_side">
        <div class="woo_amc_head">
            <div class="woo_amc_head_title woo_amc_center"><?php echo $options['cart_header_title']; ?></div>
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
                                        <a href="#">Add - <del><?php echo get_woocommerce_currency_symbol() . $regular_price; ?></del><?php echo get_woocommerce_currency_symbol() . $sell_price; ?></a>
                                    <?php
                                    } else { ?>
                                        <a class="nm_cart_btn" href="<?php echo $product->add_to_cart_url(); ?>">Add - <?php echo get_woocommerce_currency_symbol() . $regular_price; ?></a>
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

        <div class="nm-secure-checkout woo_amc_footer">
            <span>You've unlocked <b>FREE Priority Shipping!</b></span>
            <div class="nm-subtotal woo_amc_footer_total">
                <span>Subtotal</span>
                <span class="woo_amc_value"><?php echo $cart_total; ?></span>
            </div>
            <a href="<?php echo get_permalink(wc_get_page_id('cart')); ?>"><i class="fa fa-lock" aria-hidden="true"></i>Secure Chekout</a>
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