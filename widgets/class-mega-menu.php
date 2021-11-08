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
				'label' => __('Notification', 'nm_theme'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control('nm_notification', [
			'label' => __('Notification Text', 'nm_theme'),
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
				'label' => __('Navigation', 'nm_theme'),
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

		$menus = ['mega-menu-left' => "Menu Left", 'mega-menu-center' => 'Menu Center', 'mega-menu-right' => 'Menu Right'];
		$this->add_control(
			'nm_mega_menu_position',
			[
				'label' => __('Menu Position', 'nm_theme'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'multiple' => false,
				'default' => 'mega-menu-left',
				'options' => $menus,
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
				'label' => __('Select Product', 'nm_theme'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => false,
				'options' => $options,
			]
		);

		$this->end_controls_section();


		//Cart
		$this->start_controls_section(
			'nm_mega_cart_area',
			[
				'label' => __('Shoping Cart', 'nm_theme'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control('nm_cart_title', [
			'label' => __('Cart Title', 'nm_theme'),
			'label_block' => true,
			'type' => \Elementor\Controls_Manager::TEXT,
			//'input_type' => 'url',
			'default' => 'Shopping Cart'
		]);

		$this->add_control('nm_cart_button', [
			'label' => __('Cart Button text', 'nm_theme'),
			'label_block' => true,
			'type' => \Elementor\Controls_Manager::TEXT,
			//'input_type' => 'url',
			'default' => 'Secure Checkout'
		]);

		$cart_sidebar = ['cart-left' => "Left", 'cart-right' => 'Right'];
		$this->add_control(
			'nm_cart_position',
			[
				'label' => __('Cart Sidebar Position', 'nm_theme'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'multiple' => false,
				'default' => 'cart-right',
				'options' => $cart_sidebar,
			]
		);

		$this->add_control(
			'nm_mega_cart_icon',
			[
				'label' => __('Cart Icon', 'text-domain'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-shopping-cart',
					'library' => 'solid',
				],
			]
		);

		$this->add_control(
			'nm_mega_user_icon',
			[
				'label' => __('User Icon', 'text-domain'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-user',
					'library' => 'solid',
				],
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
			'label' => __('Primary Text Color', 'nm_theme'),
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => __('#222', 'nm_theme'),
		]);

		// Secondary Color
		$this->add_control('nm_mega_secondary', [
			'label' => __('Secondary Text Color + Hover', 'nm_theme'),
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => __('#E42825', 'nm_theme'),
		]);

		$this->add_control('nm_mega_menu_item_hover', [
			'label' => __('Mega Menu Item Hover', 'nm_theme'),
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => __('#ddd', 'nm_theme'),
		]);

		//Fonts
		$this->add_control('nm_mega_fonts', [
			'label' => __('Global Fonts', 'nm_theme'),
			'type' => \Elementor\Controls_Manager::FONT,
			'default' => __('"Montserrat"' . ',' . ' sans-serif', 'nm_theme'),
		]);

		$this->add_control(
			'nm_cart_item_trash',
			[
				'label' => __('Delete Icon size', 'nm_theme'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 10,
				'max' => 20,
				'step' => 5,
				'default' => 15,
			]
		);

		// Header Background
		$this->add_control('nm_mega_menu_bg', [
			'label' => __('Header Background', 'nm_theme'),
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => __('#fff', 'nm_theme'),
		]);

		// Dropdown Background
		$this->add_control('nm_mega_menu_drop_bg', [
			'label' => __('Dropdown Menu Background', 'nm_theme'),
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => __('#fff', 'nm_theme'),
		]);

		// Cart Background
		$this->add_control('nm_cart_bg', [
			'label' => __('Cart Background', 'nm_theme'),
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => __('#FAFAFA', 'nm_theme'),
		]);

		$this->add_control(
			'nm_cart_notification_title',
			[
				'label' => __('Discount notification', 'nm_theme'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);


		$this->add_control('nm_cart_notification_color', [
			'label' => __('Notification Color', 'nm_theme'),
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => __('#fff', 'nm_theme'),
		]);

		$this->add_control('nm_cart_notification_bg_start', [
			'label' => __('To Start', 'nm_theme'),
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => __('rgba(255, 0, 0, 1)', 'nm_theme'),
		]);

		$this->add_control('nm_cart_notification_bg_end', [
			'label' => __('To End', 'nm_theme'),
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => __('#c5c575', 'nm_theme'),
		]);

		$this->end_controls_section();
	}

	/**
	 * Widget Display
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();

		// Cart Info
		//$this->nm_get_cart_info($settings);


		// Mega menu
		if ($settings['nm_mega_menu_position'] === 'mega-menu-left') {
			$this->nm_mega_menu_left($settings);
		} elseif ($settings['nm_mega_menu_position'] === 'mega-menu-center') {
			$this->nm_mega_menu_center($settings);
		} else {
			$this->nm_mega_menu_right($settings);
		}

		//Styles
		$this->nm_mega_class($settings);
	}

	// Notification Bar
	public function nm_mega_top_bar($settings)
	{
?>
		<div class="container-fluid nm-notofication">
			<div class="row no-gutters">
				<div class="col-md-10 col-xs-8 text-center">
					<span><?php echo $settings['nm_notification']; ?></span>
				</div>

				<div class="col-md-2 col-xs-4 text-right nm-dnone-mobile">
					<a href="<?php echo $settings['nm_login_register_url']; ?>"><?php echo $settings['nm_login_register']; ?></a>
				</div>

				<div class="nm_user_login">
					<a href="#" class="woo_amc_open_active">
						<?php \Elementor\Icons_Manager::render_icon($settings['nm_mega_cart_icon'], ['aria-hidden' => 'true']); ?>
						<span class="cart-customlocation"><?php WC()->cart->get_cart_contents_count; ?></span>
					</a>
					<a href="<?php echo $settings['nm_login_register_url']; ?>"><?php \Elementor\Icons_Manager::render_icon($settings['nm_mega_user_icon'], ['aria-hidden' => 'true']); ?></i></a>
				</div>
			</div>
		</div>

	<?php }

	// Mega menu LEFT
	public function nm_mega_menu_left($settings)
	{
	?>
		<nav class="sina-nav mobile-sidebar logo-center" data-top="0">
			<?php $this->nm_mega_top_bar($settings); ?>
			<div class="container-fluid">
				<div class="sina-nav-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
						<i class="fa fa-bars"></i>
					</button>
					<a class="sina-brand" href="<?php echo home_url(); ?>">
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
						<div class="nm_cart_area">
							<a href="javascript:void(0)" class="woo_amc_open_active nm_cart">
								<?php \Elementor\Icons_Manager::render_icon($settings['nm_mega_cart_icon'], ['aria-hidden' => 'true']); ?>
								<!-- <span class="mini-cart-count"></span> -->
								<span class="cart-customlocation"><?php WC()->cart->get_cart_contents_count; ?></span>
							</a>
						</div>
					</div><!-- /.navbar-collapse -->
				<?php endif; ?>
			</div><!-- .container -->
		</nav>
	<?php }

	// Mega menu CENTER
	public function nm_mega_menu_center(array $settings)
	{ ?>
		<nav class="sina-nav mobile-sidebar logo-center nm-mega-center" data-top="0">
			<?php $this->nm_mega_top_bar($settings); ?>
			<div class="container-fluid">
				<div class="sina-nav-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
						<i class="fa fa-bars"></i>
					</button>
					<a class="sina-brand" href="<?php echo home_url(); ?>">
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
						<div class="clearfix"></div>
						<div class="nm_cart_area">
							<a href="javascript:void(0)" class="woo_amc_open_active nm_cart">
								<?php \Elementor\Icons_Manager::render_icon($settings['nm_mega_cart_icon'], ['aria-hidden' => 'true']); ?>
								<span class="cart-customlocation"><?php WC()->cart->get_cart_contents_count; ?></span>
							</a>
						</div>
					</div><!-- /.navbar-collapse -->
				<?php endif; ?>
			</div><!-- .container -->
		</nav>
	<?php }

	// Mega menu RIGHT
	public function nm_mega_menu_right(array $settings)
	{ ?>
		<nav class="sina-nav mobile-sidebar nm-mega-right" data-top="0">
			<?php $this->nm_mega_top_bar($settings); ?>
			<div class="container-fluid">
				<div class="sina-nav-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
						<i class="fa fa-bars"></i>
					</button>
					<a class="sina-brand" href="<?php echo home_url(); ?>">
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
						<div class="nm_cart_area">
							<a href="javascript:void(0)" class="woo_amc_open_active nm_cart">
								<?php \Elementor\Icons_Manager::render_icon($settings['nm_mega_cart_icon'], ['aria-hidden' => 'true']); ?>
								<span class="cart-customlocation"><?php WC()->cart->get_cart_contents_count; ?></span>
							</a>
						</div>
					</div><!-- /.navbar-collapse -->
				<?php endif; ?>
			</div><!-- .container -->
		</nav>
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
			wp_reset_postdata();
			?>
		</div>
	<?php }

	// Mega Menu items
	public function nm_mega_nav_items()
	{

		$locations = get_nav_menu_locations();
		$get_menu_id = $locations['nm_mega_menu'];
		$get_menu_items = wp_get_nav_menu_items($get_menu_id);

		return !empty($get_menu_items) ? $get_menu_items : '';
	}

	// Cart Title & Button
	public function nm_get_cart_info(array $settings)
	{
		global $wpdb;

		$cart_title = $settings['nm_cart_title'];
		$cart_button = $settings['nm_cart_button'];

		if (isset($cart_title)) {

			$wpdb->update(
				'nm_cart_table',
				array(
					'nm_cart_title' => $cart_title,
				),
				array('id' => 0),
				array(
					'%s'
				),
				array('%d')
			);
		}

		if (isset($cart_button)) {

			$wpdb->update(
				'nm_cart_table',
				array(
					'nm_cart_button' => $cart_button,
				),
				array('id' => 0),
				array(
					'%s'
				),
				array('%d')
			);
		}
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
		$mega_menu_item_hover = $settings['nm_mega_menu_item_hover'];
		$background = $settings['nm_mega_menu_bg'];
		$background_hover = $settings['nm_mega_menu_bg_hover'];
		$background_drop = $settings['nm_mega_menu_drop_bg'];
		$background_cart = $settings['nm_cart_bg'];
		$fonts = $settings['nm_mega_fonts'];
	?>
		<style>
			.nm-notofication a,
			.nm-notofication span,
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
			.nm-shop-item-details:hover,
			.nm_cart,
			.nm_user_login a {
				color: <?php echo $primanry; ?>;
			}

			.nm-shop-item .nm-shop-item-details i.fa-star,
			.nm-shop-item .nm-shop-item-details i.fa-star,
			.nm_cart_area i:hover {
				color: <?php echo $secondary; ?> !important;
			}

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

			.sina-menu>li:hover {
				background: <?php echo $mega_menu_item_hover; ?>;
			}

			.sina-menu>li>a:hover {
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
				color: #fff;
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

			.sina-nav {
				background: <?php echo $background; ?> !important;

			}

			.dropdown-menu {
				background: <?php echo $background_drop; ?> !important;
			}

			.woo_amc_container,
			.woo_amc_head,
			.nm-secure-checkout {
				background: <?php echo $background_cart; ?> !important;
			}

			.nm-item-notification {
				background-image: linear-gradient(to right, <?php echo $settings['nm_cart_notification_bg_start']; ?>, <?php echo $settings['nm_cart_notification_bg_end']; ?>);
			}

			.nm-item-notification span {
				color: <?php echo $settings['nm_cart_notification_color']; ?>;
			}

			.woo_amc_item_wrap i {
				font-size: <?php echo $settings['nm_cart_item_trash']; ?>px;
			}

			<?php
			if ($settings['nm_cart_position'] === 'cart-right') { ?>
			
			.woo_amc_container_wrap {
				right: 0 !important;
			}

			<?php }
			
			if ($settings['nm_cart_position'] === 'cart-left') {?>
				
			.woo_amc_container_wrap {
				left: 0 !important;
			}

			<?php } ?>
		</style>

<?php
	}
}
