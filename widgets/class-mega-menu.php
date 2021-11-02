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
		return "Mega Menu & Cart";
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
		//Application Information
		$this->start_controls_section(
			'usc_banner',
			[
				'label' => __('Usc Banner', 'nm_theme'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control('usc_banner_title', [
			'label' => __('Banner Title', 'nm_theme'),
			'label_block' => true,
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __('MASTER OF STUDIES IN LAW AT USC GOULD', 'nm_theme'),
		]);

		$this->add_control('usc_banner_subtitle', [
			'label' => __('Banner Subtitle', 'nm_theme'),
			'label_block' => true,
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __('Earn your degree at a fully accredited,', 'nm_theme'),
		]);

		$this->add_control('usc_banner_subtitle_2', [
			'label' => __('Banner Second Subtitle', 'nm_theme'),
			'label_block' => true,
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __('TOP-RANKED LAW SCHOOL.', 'nm_theme'),
		]);

		$this->add_control('usc_banner_des', [
			'label' => __('Banner Content', 'nm_theme'),
			'label_block' => true,
			'type' => \Elementor\Controls_Manager::WYSIWYG,
			'default' => __('The online Master of Studies in Law (MSL) degree offers experienced', 'nm_theme'),
		]);

		$this->add_control(
			'banner_icon_image',
			[
				'label' => __('Icon Image', 'nm_theme'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

		$this->end_controls_section();

		// Apply Online
		$this->start_controls_section(
			'usc_apply_form',
			[
				'label' => __('Application Form', 'nm_theme'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control('usc_apply_form_title', [
			'label' => __('Form Title', 'nm_theme'),
			'label_block' => true,
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __('THE FUTURE STARTS TODAY', 'nm_theme'),
		]);

		$this->add_control('usc_apply_form_phone', [
			'label' => __('Phone Number', 'nm_theme'),
			'label_block' => true,
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __('(213) 821-5916', 'nm_theme'),
		]);

		$this->add_control('usc_apply_form_button', [
			'label' => __('Form Button', 'nm_theme'),
			'label_block' => true,
			'type' => \Elementor\Controls_Manager::TEXT,
			'default' => __('REQUEST INFORMATION', 'nm_theme'),
		]);

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
					<span>Free Shipping on All Orders</span>
				</div>

				<div class="col-md-2 col-xs-4 text-right nm-dnone-mobile">
					<a href="#">Login/Register</a>
				</div>

				<div class="nm_user_login">
					<a href="#" class="woo_amc_open_active"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
					<a href="#"><i class="fa fa-user-o" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
		<nav class="sina-nav mobile-sidebar logo-center" data-top="0">
			<div class="container-fluid">

				<div class="sina-nav-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
						<i class="fa fa-bars"></i>
					</button>
					<a class="sina-brand" href="#">
						<!-- <h2>
					Sina-nav
				</h2>
				<p>Learn Something New</p> -->
						<img src="<?php echo plugin_dir_url(__FILE__); ?>/assets/img/royal_logo_1.svg" alt="" class="logo-primary">
						<img src="<?php echo plugin_dir_url(__FILE__); ?>/assets/img/royal_logo_1.svg" alt="" class="logo-secondary">
					</a>
				</div><!-- .sina-nav-header -->

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-menu">
					<ul class="sina-menu" data-in="fadeInTop" data-out="fadeInOut">
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
						<li><a href="#">Learn</a></li>
						<li><a href="#">About</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- .container -->
		</nav>


<?php


	}
}
