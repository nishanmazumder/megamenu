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

		$this->add_control('usc_apply_block_bg', [
			'label' => __('Apply Block Background', 'nm_theme'),
			'type' => \Elementor\Controls_Manager::COLOR,
			'default' => __('#131313', 'nm_theme'),
		]);

		$this->end_controls_section();
	}

	/**
	 * Widget Display
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display(); ?>

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

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-menu">
					<ul class="sina-menu" data-in="fadeInTop" data-out="fadeInOut">

						<?php
						if ($settings['nm_mega_menu_main_items']) :
							foreach ($settings['nm_mega_menu_main_items'] as $main_menu_items) :
								if ($main_menu_items['menu_type'] === 'mega_item') { ?>

									<li class="dropdown menu-item-has-mega-menu">
										<a href="<?php echo $main_menu_items['menu_item_url']; ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $main_menu_items['menu_item']; ?></a>
										<div class="mega-menu dropdown-menu">
											<ul class="mega-menu-row" role="menu">
												<li class="mega-menu-col col-md-4">
													<!-- <h4 class="mega-menu-col-title">Shop All</h4> -->
													<ul class="sub-menu">
														<li><a href="#">Shop All</a></li>
														<li><a href="#">CBD Gummies</a></li>
														<li><a href="#">CBD Oil</a></li>
														<li><a href="#">CBD</a></li>
														<li><a href="#">Category</a></li>
														<li><a href="#">CBD Esential</a></li>
														<li><a href="#">CBD Pet Products</a></li>
													</ul>
												</li>
												<li class="mega-menu-col col-md-8">
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
												</li>
											</ul><!-- end row -->
										</div>
									</li>

								<?php } else { ?>
									<li><a href="<?php echo $main_menu_items['menu_item_url']; ?>"><?php echo $main_menu_items['menu_item']; ?></a></li>
						<?php }
							endforeach;
						endif; ?>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- .container -->
		</nav>


<?php


	}

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
}
