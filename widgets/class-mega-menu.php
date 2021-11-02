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

		//Main Menu
		$this->start_controls_section(
			'nm_mega_section',
			[
				'label' => __('Logo', 'nm_theme'),
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

		$this->end_controls_section();

		// Main Menu
		$this->start_controls_section(
			'nm_mega_menu_section',
			[
				'label' => __('Mega Menu', 'nm_theme'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

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

        // $repeater->add_control(
        //     'menu_item_content',
        //     [
        //         'label' => __('Menu Label List', 'nm_theme'),
        //         'type' => \Elementor\Controls_Manager::WYSIWYG,
        //         'default' => __('100 percent online — convenient', 'nm_theme'),
        //         'show_label' => false,
        //     ]
        // );

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
                    ]
                ]
            ]
        );

		$this->end_controls_section();
	}

	/**
	 * Widget Display
	 */
	protected function render()
	{
		$settings = $this->get_settings_for_display();
?>

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
					<?php if ($settings['nm_mega_menu_main_items']) : ?>
						<li class="dropdown menu-item-has-mega-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Shoap</a>
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
											<a href="#" class="nm-shop">
												<div class="nm-shop-item">
													<div class="nm-shop-item-image">
														<img src="<?php echo plugin_dir_url(__FILE__); ?>/assets/img/oil_nat_1000-300x300.jpg.webp" alt="">
													</div>
													<div class="nm-shop-item-details">
														<h4>Full Spectrum CBD Oil 1000mg</h4>
														<div class="nm-shop-item-rating">
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<span>(422)</span>
														</div>
														<div class="nm-shop-item-price">
															Starting at <b>$149</b> <span>$129</span>
														</div>
													</div>
												</div>
											</a>

											<a href="#" class="nm-shop">
												<div class="nm-shop-item">
													<div class="nm-shop-item-image">
														<img src="<?php echo plugin_dir_url(__FILE__); ?>/assets/img/oil_nat_1000-300x300.jpg.webp" alt="">
													</div>
													<div class="nm-shop-item-details">
														<h4>Full Spectrum CBD Oil 1000mg</h4>
														<div class="nm-shop-item-rating">
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<span>(422)</span>
														</div>
														<div class="nm-shop-item-price">
															Starting at <b>$149</b> <span>$129</span>
														</div>
													</div>
												</div>
											</a>

											<a href="#" class="nm-shop">
												<div class="nm-shop-item">
													<div class="nm-shop-item-image">
														<img src="<?php echo plugin_dir_url(__FILE__); ?>/assets/img/oil_nat_1000-300x300.jpg.webp" alt="">
													</div>
													<div class="nm-shop-item-details">
														<h4>Full Spectrum CBD Oil 1000mg</h4>
														<div class="nm-shop-item-rating">
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<span>(422)</span>
														</div>
														<div class="nm-shop-item-price">
															Starting at <b>$149</b> <span>$129</span>
														</div>
													</div>
												</div>
											</a>

											<a href="#" class="nm-shop">
												<div class="nm-shop-item">
													<div class="nm-shop-item-image">
														<img src="<?php echo plugin_dir_url(__FILE__); ?>/assets/img/oil_nat_1000-300x300.jpg.webp" alt="">
													</div>
													<div class="nm-shop-item-details">
														<h4>Full Spectrum CBD Oil 1000mg</h4>
														<div class="nm-shop-item-rating">
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<span>(422)</span>
														</div>
														<div class="nm-shop-item-price">
															Starting at <b>$149</b> <span>$129</span>
														</div>
													</div>
												</div>
											</a>
										</div>
									</li>
								</ul><!-- end row -->
							</div>
						</li>
						<?php foreach ($settings['nm_mega_menu_main_items'] as $main_menu_items) : ?>
						<li><a href="<?php echo $main_menu_items['menu_item_url']; ?>"><?php echo $main_menu_items['menu_item']; ?></a></li>

						<?php endforeach; 
					endif; ?>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- .container -->
		</nav>


<?php


	}
}
