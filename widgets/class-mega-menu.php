<?php

/**
 * Elementor Widget - Mega menu
 */

use Elementor\Widget_Base as Widget_Base;

class NM_MEGA_MENU extends Widget_Base
{
	/**
	 *  Widget name
	 */
	public function get_name()
	{
		return "nm_mega_menu";
	}

	/**
	 * Widget title
	 */
	public function get_title()
	{
		return "Mega Menu";
	}

	/**
	 * Widget Icon
	 */
	public function get_icon()
	{
		return "eicon-nav-menu";
	}

	/**
	 * Widget Categories
	 */
	public function get_categories()
	{
		return ['theme-elements'];
	}

	/**
	 * Widget Controls
	 */
	protected function _register_controls()
	{

		//Top Bar
		$this->start_controls_section(
			'nm_top_section',
			[
				'label' => __('Top Bar', 'nm_theme'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control('nm_notification', [
			'label' => __('Notification', 'nm_theme'),
			'label_block' => true,
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __('Free Shipping on All Orders', 'nm_theme'),
		]);

		$this->add_control('nm_login_register', [
			'label' => __('Login/Register', 'nm_theme'),
			'label_block' => true,
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __('Login/Register', 'nm_theme'),
		]);

		$this->add_control('nm_login_register_url', [
			'label' => __('Login/Register Link', 'nm_theme'),
			'label_block' => true,
			'type' => \Elementor\Controls_Manager::TEXT,
			'input_type' => 'url',
			'default' => esc_url(wp_login_url(get_permalink()))
		]);

		$this->end_controls_section();


		// Main Menu
		$this->start_controls_section(
			'nm_mega_menu_section',
			[
				'label' => __('Mega Menu', 'nm_theme'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'nm_mega_logo',
			[
				'label' => __('Add Logo', 'nm_theme'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

		//Menu add
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'menu_item',
			[
				'label' => __('Menu Label', 'nm_theme'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Home', 'nm_theme'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'menu_item_url',
			[
				'label' => __('Menu Link', 'nm_theme'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'url',
				'default' => __('#', 'nm_theme'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'menu_type',
			[
				'label' => __('Chose menu type', 'nm_theme'),
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'simple_item' => [
						'title' => __('Simple Item', 'nm_theme')
					],
					'mega_item' => [
						'title' => __('Mega Item', 'nm_theme')
					]
				],
				'default' => 'simple_item',
				'toggle' => true,
			]
		);


		$this->add_control(
			'nm_mega_menu_main_items',
			[
				'label' => __('Main Menu Items', 'nm_theme'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'menu_item' => __('Home', 'nm_theme'),
						'menu_item_url' => __('#', 'nm_theme'),
						'menu_type' => __('simple_item', 'nm_theme')
					]
				]
			]
		);

		$this->end_controls_section();


		//Mega menu products
		$this->start_controls_section(
			'nm_mega_menu_products',
			[
				'label' => __('Mega Menu Product', 'nm_theme'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Get Product Categories
		$product_cats = get_terms(array(
			'taxonomy' => 'product_cat',
			'hide_empty' => false,
		));

		foreach ($product_cats as $product_cat) $options[$product_cat->term_id] = $product_cat->name;

		$this->add_control(
			'nm_mega_menu_products_type',
			[
				'label' => __('Select Product Type', 'nm_theme'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => false,
				'options' => $options,
			]
		);

		$this->end_controls_section();


		//Styles
		$this->start_controls_section(
			'nm_mega_menu_style',
			[
				'label' => __('Styles', 'nm_theme'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Primary Color
		$this->add_control('nm_mega_primary', [
			'label' => __('Primary Color', 'nm_theme'),
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => __('#222', 'nm_theme'),
		]);

		// Secondary Color
		$this->add_control('nm_mega_secondary', [
			'label' => __('Secondary Color', 'nm_theme'),
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => __('#E42825', 'nm_theme'),
		]);

		//Fonts
		$this->add_control('nm_mega_fonts', [
			'label' => __('Fonts', 'nm_theme'),
			'type' => \Elementor\Controls_Manager::FONT,
			'default' => __('"Montserrat"' . ',' . ' sans-serif', 'nm_theme'),
		]);

		$this->end_controls_section();
	}

	/**
	 * Widget Display
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();

		//Styles
		$this->nm_mega_class($settings);
?>

		<!-- Notification -->
		<?php $this->nm_mega_top_bar($settings); ?>

		<nav class="sina-nav mobile-sidebar logo-center" data-top="0">
			<div class="container-fluid">

				<div class="sina-nav-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
						<i class="fa fa-bars"></i>
					</button>
					<a class="sina-brand" href="<?php echo home_url(); ?>">
						<!-- <h2>
					Sina-nav
				</h2>
				<p>Learn Something New</p> -->
						<img src="<?php echo $settings['nm_mega_logo']['url']; ?>" alt="" class="logo-primary">
						<img src="<?php echo $settings['nm_mega_logo']['url']; ?>" alt="" class="logo-secondary">
					</a>
				</div><!-- .sina-nav-header -->
				<?php
				$menu_items = $this->nm_mega_nav_items();
				if (is_array($menu_items) && !empty($menu_items)) :
				?>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="navbar-menu">
						<ul class="sina-menu" data-in="fadeInTop" data-out="fadeInOut">

							<?php
							foreach ($menu_items as $main_menu_item) :
								if (!$main_menu_item->menu_item_parent) :

									$child_menu_items = $this->nm_get_child_menu($main_menu_item->ID, $menu_items);
									$has_child = !empty($child_menu_items) && is_array($child_menu_items);

									if (!$has_child) { ?>
										<li><a href="<?php echo esc_url($main_menu_item->url) ?>"><?php echo esc_html($main_menu_item->title) ?></a></li>
									<?php } else { ?>
										<li class="dropdown menu-item-has-mega-menu">
											<a href="<?php echo esc_url($main_menu_item->url) ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo esc_html($main_menu_item->title) ?></a>
											<div class="mega-menu dropdown-menu">
												<ul class="mega-menu-row" role="menu">
													<li class="mega-menu-col col-md-4">
														<!-- <h4 class="mega-menu-col-title">Shop All</h4> -->
														<ul class="sub-menu">
															<?php foreach ($child_menu_items as $child_menu_item) : ?>
																<li><a href="<?php echo esc_url($child_menu_item->url) ?>"><?php echo esc_html($child_menu_item->title) ?></a></li>
															<?php endforeach; ?>
														</ul>
													</li>
													<li class="mega-menu-col col-md-8">
														<!-- Mega Menu product area -->
														<?php $this->nm_mega_products($settings); ?>
													</li>
												</ul><!-- end row -->
											</div>
										</li>
							<?php
									}
								endif;
							endforeach; ?>
						</ul>
					</div><!-- /.navbar-collapse -->
				<?php endif; ?>
			</div><!-- .container -->
		</nav>
	<?php
	}

	// Notification Bar
	public function nm_mega_top_bar($settings)
	{ ?>

		<div class="container-fluid nm-notofication">
			<div class="row">
				<div class="col-md-10 col-xs-8 text-center">
					<span><?php echo $settings['nm_notification']; ?></span>
				</div>

				<div class="col-md-2 col-xs-4 text-right nm-dnone-mobile">
					<a href="<?php echo $settings['nm_login_register_url']; ?>"><?php echo $settings['nm_login_register']; ?></a>
				</div>

				<div class="nm_user_login">
					<a href="#" class="woo_amc_open_active"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
					<a href="<?php echo $settings['nm_login_register_url']; ?>"><i class="fa fa-user-o" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>

	<?php }

	// Mega menu products
	public function nm_mega_products(array $settings)
	{ ?>
		<h4 class="mega-menu-col-title">Featured Products</h4>
		<div class="nm-shop-area">


			<?php
			$category = $settings['nm_mega_menu_products_type'];
			$category_all = ['tshirts', 'hoodies', 'accessories'];

			$args = [
				'post_type'      => 'product',
				'post_status'  => 'publish',
				'orderby' => 'publish_date',
				'posts_per_page' => 4,
			];

			if ($category != 'all') {
				$args['tax_query'] = [
					[
						'taxonomy' => 'product_cat',
						'field'    => 'term_id',
						'terms'    => $category,
					]
				];
			} else {
				$args['tax_query'] = [
					[
						'taxonomy' => 'product_cat',
						'field'    => 'term_id',
						'terms'    => $category_all,
					]
				];
			}

			$products = new WP_Query($args);

			if ($products->have_posts()) {
				while ($products->have_posts()) : $products->the_post();
					global $product; ?>

					<a href="<?php echo esc_url(get_the_permalink()); ?>" class="nm-shop">
						<div class="nm-shop-item">
							<div class="nm-shop-item-image">
								<?php if (has_post_thumbnail()) : ?>
									<img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="">
								<?php endif; ?>
							</div>
							<div class="nm-shop-item-details">
								<h4><?php echo $product->name; ?></h4>
								<div class="nm-shop-item-rating">
									<?php
									$average = $product->get_average_rating();
									$rating_left = 5 - $average;

									for ($i = 0; $i < round($average); $i++) {
										echo '<i class="fa fa-star" aria-hidden="true"></i>';
									}
									for ($i = 0; $i < round($rating_left); $i++) {
										echo '<i class="fa fa-star gray-star" aria-hidden="true"></i>';
									}
									?>

									<!-- <span>(422)</span> -->
									<?php

									$total_sell = $this->get_total_sell_product('2016-05-26', get_the_ID());
									if ($total_sell > 0) {
										echo '<span>(' . $total_sell . ')</span>';
									} else {
										echo '<span>(0)</span>';
									}
									?>

								</div>
								<div class="nm-shop-item-price">
									<?php
									$regular_price = $product->get_regular_price();
									$sell_price = $product->get_sale_price();

									if ($sell_price) { ?>
										Starting at <del><?php echo get_woocommerce_currency_symbol() . $regular_price; ?></del> <span><?php echo get_woocommerce_currency_symbol() . $regular_price; ?></span>
									<?php
									} else { ?>
										Starting at <span><?php echo get_woocommerce_currency_symbol() . $regular_price; ?></span>
									<?php } ?>

								</div>
							</div>
						</div>
					</a>
			<?php
				endwhile;
			}
			?>
		</div>
	<?php }

	// Mega Menu
	public function nm_mega_nav_items()
	{

		$locations = get_nav_menu_locations();
		$get_menu_id = $locations['nm_mega_menu'];
		$get_menu_items = wp_get_nav_menu_items($get_menu_id);

		return !empty($get_menu_items) ? $get_menu_items : '';
	}

	public function nm_get_child_menu($parent_id, $menu_items)
	{
		$child_menus = [];

		if (is_array($menu_items) && !empty($menu_items)) {
			foreach ($menu_items as $menu_item) {
				if (intval($menu_item->menu_item_parent) == $parent_id) {
					array_push($child_menus, $menu_item);
				}
			}
		}

		return $child_menus;
	}


	// Get total sell per product
	public function get_total_sell_product($date_from, $product_id)
	{
		global $wpdb;
		$date_to = date('Y-m-d');

		$sql = "
		SELECT COUNT(*) AS sale_count
		FROM {$wpdb->prefix}woocommerce_order_items AS order_items
		INNER JOIN {$wpdb->prefix}woocommerce_order_itemmeta AS order_meta ON order_items.order_item_id = order_meta.order_item_id
		INNER JOIN {$wpdb->posts} AS posts ON order_meta.meta_value = posts.ID
		WHERE order_items.order_item_type = 'line_item'
		AND order_meta.meta_key = '_product_id'
		AND order_meta.meta_value = %d
		AND order_items.order_id IN (
			SELECT posts.ID AS post_id
			FROM {$wpdb->posts} AS posts
			WHERE posts.post_type = 'shop_order'
				AND posts.post_status IN ('wc-completed','wc-processing')
				AND DATE(posts.post_date) BETWEEN %s AND %s
		)
		GROUP BY order_meta.meta_value";

		return $wpdb->get_var($wpdb->prepare($sql, $product_id, $date_from, $date_to));
	}

	//Elementor Styles
	public function nm_mega_class(array $settings)
	{

		$primanry = $settings['nm_mega_primary'];
		$secondary = $settings['nm_mega_secondary'];
		$fonts = $settings['nm_mega_fonts'];
	?>
		<style>
			.sina-nav .sina-menu>li>a,
			.sina-nav .sina-menu .mega-menu-col .sub-menu a,
			.woo_amc_head_title,
			.woo_amc_item_title a,
			.woo_amc_item_quanity_wrap input,
			.woo_amc_item_total_price,
			.nm_enjoy_product h4,
			.nm-product p a,
			.nm_cart_btn del,
			.nm-secure-checkout span {
				color: <?php echo $primanry; ?> !important;
				font-family: <?php echo $fonts; ?> !important;
			}

			.woo_amc_close i,
			.woo_amc_item_quanity_wrap i,
			.nm_user_login i,
			.woo_amc_item_wrap i,
			.nm_cart_btn:hover,
			.nm-shop-item-details:hover {
				color: <?php echo $primanry; ?>;
			}

			.nm-shop-item .nm-shop-item-details i.fa-star,
			.nm-shop-item .nm-shop-item-details i.fa-star {
				color: <?php echo $secondary; ?> !important;
			}

			.nm-notofication a,
			.nm-shop-item .nm-shop-item-details span,
			.nm-shop-item .nm-shop-item-details span {
				color: <?php echo $secondary; ?> !important;
				font-family: <?php echo $fonts; ?> !important;
			}

			.sina-nav-cta-btn a {
				border: 1px solid <?php echo $secondary; ?> !important;
				background: <?php echo $secondary; ?> !important;
				font-family: <?php echo $fonts; ?> !important;
			}

			.sina-menu-right>li>a:hover {
				border-bottom: 2px solid <?php echo $secondary; ?> !important;
			}

			.sina-nav-cta-btn a:hover,
			.sina-nav-cta-btn a:focus {
				border-color: <?php echo $secondary; ?> !important;
				color: <?php echo $secondary; ?> !important;
			}

			.mega-menu-col .active>a,
			/* .mega-menu-col a:hover, */

			.sub-menu a:hover,
			/* .sub-menu a:focus, */
			.sina-menu>li.sina-nav-cta-btn a:hover,
			/* .sina-menu>li.sina-nav-cta-btn a:focus, */
			.sina-menu li .active>a,
			.sina-menu li>a:focus,
			/* .sina-menu li a:hover */
			/* .sina-nav .sina-menu .mega-menu-col .sub-menu a:hover   */
			.sina-nav .menu-item-has-mega-menu.dropdown .mega-menu-col li>a:hover {
				color: <?php echo $secondary; ?> !important;
			}

			.nm-secure-checkout a {
				background: <?php echo $secondary; ?> !important;
				font-family: <?php echo $fonts; ?> !important;
			}

			.sina-menu>li.sina-nav-cta-btn a {
				border-color: <?php echo $secondary; ?> !important;
				background: <?php echo $secondary; ?> !important;
				font-family: <?php echo $fonts; ?> !important;
			}

			.nm-notofication,
			.nm-item-notification span,
			.nm_cart_btn,
			.nm-secure-checkout,
			.nm-shop-item-details {
				font-family: <?php echo $fonts; ?> !important;
			}
		</style>
<?php
	}
}
