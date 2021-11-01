<?php

//User Registration Form
add_shortcode('nm_mega', 'nm_mega_menu_el');

function nm_mega_menu_el()
{

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
				<a href="#"><i class="fa fa-user-o" aria-hidden="true"></i></a>
			</div>
		</div>
	</div>
	<nav class="sina-nav mobile-sidebar logo-center" data-top="0">
		<div class="container-fluid">

			<div class="search-box">
				<form role="search" method="get" action="#">
					<span class="search-addon close-search"><i class="fa fa-times"></i></span>
					<div class="search-input">
						<input type="search" class="form-control" placeholder="Search here" value="" name="">
					</div>
					<span class="search-addon search-icon"><i class="fa fa-search"></i></span>
				</form>
			</div><!-- .search-box -->

			<div class="sina-nav-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
					<i class="fa fa-bars"></i>
				</button>
				<a class="sina-brand" href="#">
					<!-- <h2>
					Sina-nav
				</h2>
				<p>Learn Something New</p> -->
					<img src="<?php echo get_template_directory_uri(); ?>/assets/mega/assets/img/royal_logo_1.svg" alt="" class="logo-primary">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/mega/assets/img/royal_logo_1.svg" alt="" class="logo-secondary">
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
													<img src="<?php echo get_template_directory_uri(); ?>/assets/mega/assets/img/oil_nat_1000-300x300.jpg.webp" alt="">
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
													<img src="<?php echo get_template_directory_uri(); ?>/assets/mega/assets/img/oil_nat_1000-300x300.jpg.webp" alt="">
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
													<img src="<?php echo get_template_directory_uri(); ?>/assets/mega/assets/img/oil_nat_1000-300x300.jpg.webp" alt="">
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
													<img src="<?php echo get_template_directory_uri(); ?>/assets/mega/assets/img/oil_nat_1000-300x300.jpg.webp" alt="">
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
					<!-- <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
						<ul class="dropdown-menu">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
								<ul class="dropdown-menu">
									<li><a href="#">Custom Menu</a></li>
									<li><a href="#">Custom Menu</a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
										<ul class="dropdown-menu">
											<li><a href="#">Custom Menu</a></li>
											<li><a href="#">Custom Menu</a></li>
											<li><a href="#">Custom Menu</a></li>
										</ul>
									</li>
									<li><a href="#">Custom Menu</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
								<ul class="dropdown-menu">
									<li><a href="#">Custom Menu</a></li>
									<li><a href="#">Custom Menu</a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
										<ul class="dropdown-menu">
											<li><a href="#">Custom Menu</a></li>
											<li><a href="#">Custom Menu</a></li>
											<li><a href="#">Custom Menu</a></li>
										</ul>
									</li>
									<li><a href="#">Custom Menu</a></li>
								</ul>
							</li>
							<li><a href="#">Custom Menu</a></li>
							<li><a href="#">Custom Menu<p class="description">This is Description</p></a>
							</li>
						</ul>
					</li> -->
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- .container -->
	</nav>


<?php
}