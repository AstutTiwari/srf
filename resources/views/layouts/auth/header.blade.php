<header id="header">
		<div class="top-header bg-dark">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="hot-news pull-left">
						    	<div class="logo logo1 pull-left">
							
								<a href="index.html" class="product-thumb-link zoom-thumb"><img src="images/home/fashion/logo.png" alt=""></a>		
								
							</div>
						
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<ul class="top-total-info list-inline-block pull-right">
							<li>
								<p class="desc white call-phone title12"><i class="fa fa-volume-control-phone"></i><span class="title14">Call: {{$contact->contact_number}}</span></p>
							</li>
							<li>
								<div class="top-social-network">
								@foreach($socials as $social)
                                	<a href="{{$social->redirect_url}}" target="_blank" class="title12 white inline-block round"><i class="{{$social->icon_name}}"></i></a>
                            	@endforeach
								</div>
							</li>
							<li>
								<a href="#" class="title12 white link-account"><i class="fa fa-user"></i><span class="title14">My Account</span></a>
							</li>
						</ul>
						
					</div>
					<form method="get" class="search-form form-round">
								<div class="dropdown-box">
									<a href="javascript:void(0)" class="dropdown-link">All Categories</a>
									<ul class="list-none dropdown-list">
										
										<li><a href="#">Accessories</a></li>
										<li><a href="#">Fashion</a></li>
										
										<li><a href="#">Jewelry</a></li>
									</ul>
								</div>
								<input type="text" name="s" placeholder="Search for product...">
								<div class="submit-form">
									<input type="submit" value="">
								</div>
							</form>
				</div>
			</div>
		</div>
		<!-- End Top Header -->
		<div class="header2 bg-dark">
			
			<!-- End Main Nav -->
			<div class="header-nav2">
				<div class="container">
					<div class="row">
						<div class="col-md-9 col-sm-8 col-xs-12 ">
							<nav class="main-nav main-nav1 pull-left dark-style">
								<ul>
								<!--<li class="menu-item-has-children has-mega-menu">
										<a href="#">Rings</a>
										<div class="mega-menu">
											<div class="content-mega-menu">
												<div class="row">
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div class="mega-menu-home">
															<h2 class="title18 play-font font-italic dark">Popular Ring Types </h2>
															<ul class="list-none">
																<li><a href="#" class="silver">Daily Wear<span class="title12">(Light version)</span></a></li>
																<li><a href="#" class="silver">Men<span class="title12">(Dark version)</span></a></li>
																<li><a href="#" class="silver">Women</a></li>
																<li><a href="#" class="silver">Engagement</a></li>
																<li><a href="#" class="silver">Cocktail</a></li>
																<li><a href="#" class="silver">Office Wear</a></li>
																</ul>
														</div>
													</div>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div class="mega-menu-home">
															<h2 class="title18 play-font font-italic dark">Home Glasses</h2>
															<ul class="list-none">
																<li><a href="home-glasses-light.html" class="silver">Light version Demo</a></li>
																<li><a href="home-glasses-dark.html" class="silver">Dark version Demo</a></li>
															</ul>
														</div>
														<div class="mega-menu-home">
															<h2 class="title18 play-font font-italic dark">Home Watch</h2>
															<ul class="list-none">
																<li><a href="home-watches-light.html" class="silver">Light version Demo</a></li>
																<li><a href="home-watches-dark.html" class="silver">Dark version Demo</a></li>
															</ul>
														</div>
														<div class="mega-menu-home">
															<h2 class="title18 play-font font-italic dark">Home Fashion</h2>
															<ul class="list-none">
																<li><a href="home-fashion-light.html" class="silver">Light version Demo</a></li>
																<li><a href="home-fashion-dark.html" class="silver">Dark version Demo</a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
									</li> -->
									<li class="menu-item-has-children has-mega-menu">
										<a href="#">Ring</a>
										<div class="mega-menu full-mega-menu">
											<div class="content-mega-menu">
												<div class="row">
													<div class="col-md-3 col-sm-4 col-xs-12">
														<div class="mega-list-cat">
															<h2 class="title18 play-font font-bold dark">Popular Ring Types</h2>
															<ul class="list-none">
															
																@foreach($rings as $ring)
																	<li><a href="#">{{@$ring->slug}}</a></li> 
																@endforeach
															</ul>
														</div>
													</div> 
													<div class="col-md-3 col-sm-4 col-xs-12">
														<div class="mega-list-cat">
															<h2 class="title18 play-font font-bold dark">By Price Range</h2>
															<ul class="list-none">
																<li><a href="#">Below 10000</a></li>
																<li><a href="#">10000-20000</a></li>
																<li><a href="#">20000-30000</a></li>
																<li><a href="#">30000-40000</a></li>
																<li><a href="#">40000-50000</a></li>
																<li><a href="#">50000 & Above</a></li>
																
															</ul>
														</div>
													</div>
													<div class="col-md-3 col-sm-4 col-xs-12">
														<div class="mega-list-cat">
															<h2 class="title18 play-font font-bold dark">By Metals & Stones</h2>
															<ul class="list-none">
																<li><a href="#">Diamond</a></li>
																<li><a href="#">Gold</a></li>
																<li><a href="#">Gemstone</a></li>
																<li><a href="#">Silver</a></li>
															</ul>
														</div>
													</div>
													
													<div class="col-md-3 hidden-sm col-xs-12">
														<div class="mega-menu-thumb banner-adv zoom-image line-scale"><a href="#" class="adv-thumb-link"><img src="images/blog/menu.jpg" alt=""></a></div>
													</div>
												</div>
											</div>
										</div>
									</li>
									<li class="menu-item-has-children has-mega-menu">
										<a href="#">Ear Ring</a>
										<div class="mega-menu full-mega-menu">
											<div class="content-mega-menu">
												<div class="row">
													<div class="col-md-4 col-sm-4 col-xs-12">
														<div class="mega-list-cat">
															<h2 class="title18 play-font font-bold dark">Popular EarRing Types</h2>
															<ul class="list-none">
															@foreach($erings as $ering)
																<li><a href="#">{{@$ering->slug}}</a></li> 
															@endforeach
															</ul>
														</div>
													</div> 
													<div class="col-md-4 col-sm-4 col-xs-12">
														<div class="mega-list-cat">
															<h2 class="title18 play-font font-bold dark">By Design</h2>
															<ul class="list-none">
																<li><a href="#">Heart</a></li>
																<li><a href="#">Oval</a></li>
																<li><a href="#">Round</a></li>
																<li><a href="#">Square</a></li>
																<li><a href="#">Triangle</a></li>
																<li><a href="#">Leaves & FLowers</a></li>
																
															</ul>
														</div>
													</div>
													<div class="col-md-4 col-sm-4 col-xs-12">
														<div class="mega-list-cat">
															<h2 class="title18 play-font font-bold dark">By Price Range</h2>
															<ul class="list-none">
																<li><a href="#">Below 10000</a></li>
																<li><a href="#">10000-20000</a></li>
																<li><a href="#">20000-30000</a></li>
																<li><a href="#">30000-40000</a></li>
																<li><a href="#">40000-50000</a></li>
																<li><a href="#">50000 & Above</a></li>
																
															</ul>
														</div>
													
													
													</div>
												</div>
											</div>
										</div>
									</li>
	<li class="menu-item-has-children has-mega-menu">
										<a href="#">Shop By Category</a>
										<div class="mega-menu full-mega-menu">
											<div class="content-mega-menu">
												<div class="row">
													<div class="col-md-3 col-sm-4 col-xs-12">
														<div class="mega-list-cat">
															<h2 class="title18 play-font font-bold dark">Shop By Metal & Stones</h2>
															<ul class="list-none">
																<li><a href="#">Daily Wear</a></li> 
																<li><a href="#">Office Wear</a></li>
																<li><a href="#">Men</a></li>
																<li><a href="#">Women</a></li>
																<li><a href="#">Engagement</a></li>
																<li><a href="#">Cocktail</a></li>
															</ul>
														</div>
													</div> 
													<div class="col-md-3 col-sm-4 col-xs-12">
														<div class="mega-list-cat">
															<h2 class="title18 play-font font-bold dark">By Price Range</h2>
															<ul class="list-none">
																<li><a href="#">Below 10000</a></li>
																<li><a href="#">10000-20000</a></li>
																<li><a href="#">20000-30000</a></li>
																<li><a href="#">30000-40000</a></li>
																<li><a href="#">40000-50000</a></li>
																<li><a href="#">50000 & Above</a></li>
																
															</ul>
														</div>
													</div>
													<div class="col-md-3 col-sm-4 col-xs-12">
														<div class="mega-list-cat">
															<h2 class="title18 play-font font-bold dark">By Metals & Stones</h2>
															<ul class="list-none">
																<li><a href="#">Diamond</a></li>
																<li><a href="#">Gold</a></li>
																<li><a href="#">Gemstone</a></li>
																<li><a href="#">Silver</a></li>
																
															</ul>
														</div>
													</div>
													
													<div class="col-md-3 hidden-sm col-xs-12">
														<div class="mega-menu-thumb banner-adv zoom-image line-scale"><a href="#" class="adv-thumb-link"><img src="images/blog/menu.jpg" alt=""></a></div>
													</div>
												</div>
											</div>
										</div>
									</li>

											
											<li><a href="#">Gift Card</a></li>
											
										</ul>
									
									<!-- <li class="menu-item-has-children">
										<a href="blog.html">Blog</a>
										<ul class="sub-menu">
											<li><a href="blog-list.html">Blog List</a></li>
											<li><a href="blog.html">Blog List Large</a></li>
											<li><a href="blog-grid.html">Blog Grid</a></li>
											<li><a href="single.html">Blog Single</a></li>
										</ul>
									</li> -->
								</ul>
								<a href="#" class="toggle-mobile-menu"><span></span></a>
							</nav>
							<!-- End Main Nav -->
						</div>
						<div class="col-md-3 col-sm-4 col-xs-12">
							<ul class="wrap-cart-top2 list-inline-block pull-right">
								<li>
									<a href="#" class="title18 compare-link" title="Compare"><span class="white"><i class="icon ion-ios-loop-strong"></i></span></a>
								</li>
								<li>
									<a href="#" class="title18 wishlist-link" title="Wishlist"><span class="white"><i class="icon ion-android-favorite-outline"></i></span><sup class="title10 round white bg-dark">0</sup></a>
								</li>
								<li>
									<div class="mini-cart-box mini-cart1 aside-box dark-style">
										<a class="mini-cart-link" href="cart.html" title="Cart">
											<span class="mini-cart-icon title18 white"><i class="icon ion-bag"></i></span>
											<span class="mini-cart-text">
												<span class="mini-cart-number">4</span>
												<span class="mini-cart-total-price hidden">₹80.00</span>
											</span>
										</a>
										<div class="mini-cart-content text-left">
											<h2 class="title18 font-bold">(4) ITEMS IN MY CART</h2>
											<div class="list-mini-cart-item">
												<div class="product-mini-cart table-custom">
													<div class="product-thumb">
														<a href="detail.html" class="product-thumb-link"><img alt="" src="images/photos/glasses/dl-store-glasse-01.jpg"></a>
													</div>
													<div class="product-info">
														<h3 class="title14 product-title play-font"><a href="#">D&L SO REAL POP SUNGLASSES pink</a></h3>
														<div class="mini-cart-qty">
															<span>1 x ₹40.00</span>
														</div>
													</div>
													<div class="product-delete text-right">
														<a href="#" class="remove-product"><i class="fa fa-trash"></i></a>
													</div>
												</div>
												<div class="product-mini-cart table-custom">
													<div class="product-thumb">
														<a href="detail.html" class="product-thumb-link"><img alt="" src="images/photos/glasses/dl-store-glasse-03.jpg"></a>
													</div>
													<div class="product-info">
														<h3 class="title14 product-title play-font"><a href="#">D&L SO REAL POP SUNGLASSES Yellow</a></h3>
														<div class="mini-cart-qty">
															<span>1 x ₹40.00</span>
														</div>
													</div>
													<div class="product-delete text-right">
														<a href="#" class="remove-product"><i class="fa fa-trash"></i></a>
													</div>
												</div>
												<div class="product-mini-cart table-custom">
													<div class="product-thumb">
														<a href="detail.html" class="product-thumb-link"><img alt="" src="images/photos/glasses/dl-store-glasse-10.jpg"></a>
													</div>
													<div class="product-info">
														<h3 class="title14 product-title play-font"><a href="#">D&L SO REAL POP SUNGLASSES black</a></h3>
														<div class="mini-cart-qty">
															<span>1 x ₹40.00</span>
														</div>
													</div>
													<div class="product-delete text-right">
														<a href="#" class="remove-product"><i class="fa fa-trash"></i></a>
													</div>
												</div>
												<div class="product-mini-cart table-custom">
													<div class="product-thumb">
														<a href="detail.html" class="product-thumb-link"><img alt="" src="images/photos/glasses/dl-store-glasse-02.jpg"></a>
													</div>
													<div class="product-info">
														<h3 class="title14 product-title play-font"><a href="#">D&L so real pop sunglass blue</a></h3>
														<div class="mini-cart-qty">
															<span>1 x ₹40.00</span>
														</div>
													</div>
													<div class="product-delete text-right">
														<a href="#" class="remove-product"><i class="fa fa-trash"></i></a>
													</div>
												</div>
											</div>
											<div class="mini-cart-total text-uppercase title18 font-bold clearfix">
												<span class="pull-left">TOTAL</span>
												<strong class="pull-right color play-font mini-cart-total-price">₹160.00</strong>
											</div>
											<div class="mini-cart-button">
												<a class="mini-cart-view shop-button" href="#">View cart </a>
												<a class="mini-cart-checkout shop-button" href="#">Checkout</a>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- End Header Nav -->
		</div>
	</header>