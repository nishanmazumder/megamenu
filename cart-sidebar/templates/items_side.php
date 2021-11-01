<?php foreach($items as $item => $values) {
    $_product =  wc_get_product( $values['data']->get_id() );
    $product_link = get_permalink( $values['data']->get_id() );
    $variations = wc_get_formatted_cart_item_data($values,true);
    ?>

    <div class="woo_amc_item_wrap">
    <div class="nm-item-notification"><span>Add 1 more and save extra 2.5%</span></div>
        <div class="woo_amc_item">
            <div class="woo_amc_item_delete" data-key="<?php echo $item; ?>">
            <i class="fa fa-trash-o" aria-hidden="true"></i>
            </div>
            <a href="<?php echo $product_link; ?>" class="woo_amc_item_img">
                <?php echo $_product->get_image(); ?>
            </a>
            <div class="woo_amc_item_content">
                <div class="woo_amc_item_title">
                    <a href="<?php echo $product_link; ?>"><?php echo $_product->get_title(); ?></a>
                </div>
                <?php if($variations){ ?>
                    <div class="woo_amc_item_dop">
                        <?php echo $variations; ?>
                    </div>
                <?php } ?>
                <!-- <div class="woo_amc_item_price_wrap">
                    <div class="woo_amc_item_price_label">Price:</div>
                    <?php // echo $_product->get_price_html(); ?>
                </div> -->
                <div class="woo_amc_item_quanity_wrap">
                    <div class="woo_amc_item_quanity_update woo_amc_item_quanity_minus" data-type="minus">
                    <i class="fa fa-minus" aria-hidden="true"></i>
                    </div>
                    <input data-key="<?php echo $item; ?>" type="text" class="woo_amc_item_quanity" value="<?php echo $values['quantity']; ?>">
                    <div class="woo_amc_item_quanity_update woo_amc_item_quanity_plus" data-type="plus">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="woo_amc_item_total_price">
                <?php echo wc_price( $values['line_total'] ); ?>
            </div>
            <div class="woo_amc_clear"></div>
        </div>
    </div>
<?php } ?>
