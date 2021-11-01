<div class="woo_amc_bg"></div>
<div class="woo_amc_container_wrap woo_amc_container_wrap_<?php echo $options['cart_type']; ?>">
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
                    <h4>People also enjoy</h4>
                    <div class="nm-product-area">
                        <div class="nm-product">
                            <img src="<?php echo plugins_url(); ?>/Mega Menu - Elementor/assets/img/oil_nat_1000-300x300.jpg.webp" alt="">
                            <p>Full Spectrum CBD Oil 500mg - Natural</p>
                            <a href="#">Add - <del>15</del>16</a>
                        </div>

                        <div class="nm-product">
                        <img src="<?php echo plugins_url(); ?>/Mega Menu - Elementor/assets/img/oil_nat_1000-300x300.jpg.webp" alt="">
                            <p>Full Spectrum CBD Oil 500mg - Natural</p>
                            <a href="#">Add - <del>15</del>16</a>
                        </div>

                        <div class="nm-product">
                        <img src="<?php echo plugins_url(); ?>/Mega Menu - Elementor/assets/img/oil_nat_1000-300x300.jpg.webp" alt="">
                            <p>Full Spectrum CBD Oil 500mg - Natural</p>
                            <a href="#">Add - <del>15</del>16</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="nm-secure-checkout woo_amc_footer">
            <span>You've unlocked <b>FREE Priority Shipping!</b></span>
            <div class="nm-subtotal">
                <span>Subtotal</span>
                <span><?php echo $cart_total; ?></span>
            </div>
            <a href="<?php echo get_permalink(wc_get_page_id('cart')); ?>"><i class="fa fa-lock" aria-hidden="true"></i>Secure Chekout</a>
            <p>Taxes are calculated at checkout</p>
        </div>

        <!-- <a href="<?php //echo get_permalink(wc_get_page_id('cart')); ?>" class="woo_amc_footer">
            <div class="woo_amc_center woo_amc_flex">
                <div class="woo_amc_footer_w50 woo_amc_flex">
                    <div class="woo_amc_footer_lines">
                        <div class="woo_amc_footer_products">
                            <div class="woo_amc_label"><?php //echo $options['cart_footer_products_label']; ?></div>
                            <div class="woo_amc_value"><?php //echo $cart_count; ?></div>
                        </div>
                        <div class="woo_amc_footer_total">
                            <div class="woo_amc_label"><?php //echo $options['cart_footer_total_label']; ?></div>
                            <div class="woo_amc_value"><?php //echo $cart_total; ?></div>
                        </div>
                    </div>
                </div>
                <div class="woo_amc_footer_w50 woo_amc_flex">
                    <div class="woo_amc_footer_link"><?php //echo $options['cart_footer_link_text']; ?></div>
                </div>
            </div>
        </a> -->

    </div>
</div>