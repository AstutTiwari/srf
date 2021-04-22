@extends('layouts.auth.master')
@section('content')


<section id="content" >
		<div class="banner-slider banner-jewelry2 bg-slider parallax-slider">
			<div class="wrap-item" data-navigation="true" data-transition="fade" data-itemscustom="[[0,1]]">
				@foreach($banners as $banner)
					@if($banner->url)         
				      @php
				        $image = 'storage/'.$banner->url;
				      @endphp        
				    @endif
				<div class="item-slider item-slider2">
					<div class="banner-thumb">
						<a href="#"><img src="{{ URL::asset($image)}}" alt="{{$banner->name}}" /></a>
					</div>
					<div class="banner-info animated text-center" data-animated="zoomIn">
						<h2 class="title48 play-font font-normal text-uppercase white">{{$banner->title}}</h2>
						<h3 class="title18 play-font font-italic white">{{$banner->sub_title}}</h3>
						<a href="#" class="border-button white title18">Shop now</a>
					</div>
				</div>
				@endforeach
			</div>
		</div>

		<!-- End Banner Slider -->
    <div class="container">
        <div class="list-banner-jewelry2">
		@if($product_banners['4']['slug']=="pendants")
			@if($product_banners['4']['url'])         
			@php
				$image = 'storage/'.$product_banners['4']['url'];
			@endphp        
			@endif
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					<div class="banner-adv zoom-image line-scale item-adv-jewelry2 style1">
						<a href="#" class="adv-thumb-link"><img src="{{ URL::asset($image)}}" alt="" /></a>
						<div class="banner-info">
							<h3 class="title60 play-font white text-uppercase">{{$product_banners['4']['title']}}</h3>
							<hr class="white" />
							<a href="#" class="link-arrow white wobble-horizontal">Shop now</a>
						</div>
					</div>
					@endif
					@if($product_banners['1']['slug']=="earing")
						@if($product_banners['1']['url'])         
						@php
							$image = 'storage/'.$product_banners['1']['url'];
						@endphp        
						@endif
					<div class="banner-adv item-adv-jewelry2 zoom-image line-scale style1">
						<a href="#" class="adv-thumb-link"><img src="{{ URL::asset($image)}}" alt="" /></a>
						<div class="banner-info">
							<h3 class="title60 play-font white text-uppercase">{{$product_banners['1']['title']}}</h3>
							<hr class="white" />
							<a href="#" class="link-arrow white wobble-horizontal">Shop now</a>
						</div>
					</div>
				</div>
				@endif
				@if($product_banners['5']['slug']=="rings")
				@if($product_banners['5']['url'])         
					@php
						$image = 'storage/'.$product_banners['5']['url'];
					@endphp        
				@endif
				<div class="col-sm-6 col-xs-12">
					<div class="banner-adv item-adv-jewelry2 zoom-image line-scale style1">
							<a href="#" class="adv-thumb-link"><img src="{{ URL::asset($image)}}" alt="" /></a>
						<div class="banner-info">
							<h3 class="title60 play-font white text-uppercase">{{$product_banners['5']['title']}}</h3>
							<a href="#" class="link-arrow white wobble-horizontal">Shop now</a>
						</div>
					</div>
				</div>
			</div>
			@endif
			@if($product_banners['2']['slug']=="jwekkery_customizaion")
			@if($product_banners['2']['url'])         
				@php
					$image = 'storage/'.$product_banners['2']['url'];
				@endphp        
			@endif
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					<div class="banner-adv item-adv-jewelry2 zoom-image line-scale style1">
						<a href="#" class="adv-thumb-link"><img src="{{ URL::asset($image)}}" alt="" /></a>
						<div class="banner-info">
							<h3 class="title30 white play-font text-uppercase">{{$product_banners['2']['title']}}</h3>
							<h4 class="title18 play-font font-italic white">Design Engineering</h4>
							<p class="desc white">Bringing forward a collection with an aesthetic appeal for a broad market while ensuring exceptional results is a challenge for any organization. Riva Precision provides a systematic approach to creating timeless designs that are consistently reproduced through the company’s in-house capabilities.</p>
							<a href="#" class="link-arrow white wobble-horizontal">Shop now</a>
						</div>
					</div>
				</div>
				@endif
				@if($product_banners['3']['slug']=="nospeins")
				@if($product_banners['3']['url'])         
					@php
						$image = 'storage/'.$product_banners['3']['url'];
					@endphp        
				@endif
				<div class="col-sm-6 col-xs-12">
					<div class="banner-adv zoom-image line-scale item-adv-jewelry2 style1">
						<a href="#" class="adv-thumb-link"><img src="{{ URL::asset($image)}}" alt="" /></a>
						<div class="banner-info">
							<h3 class="title60 play-font white text-uppercase">{{$product_banners['3']['title']}}</h3>
							<hr class="white" />
							<a href="#" class="link-arrow white wobble-horizontal">Shop now</a>
						</div>
					</div>
					@endif
					@if($product_banners['0']['slug']=="bangles")
					@if($product_banners['0']['url'])         
						@php
							$image = 'storage/'.$product_banners['0']['url'];
						@endphp        
					@endif
					<div class="banner-adv item-adv-jewelry2 zoom-image line-scale style1">
						<a href="#" class="adv-thumb-link"><img src="{{ URL::asset($image)}}" alt="" /></a>
						<div class="banner-info">
							<h3 class="title60 play-font white text-uppercase">{{$product_banners['0']['title']}}</h3>
							<h4 class="title18 play-font font-italic white opaci">Diamonds & Gold</h4>
							<hr class="white" />
							<a href="#" class="link-arrow white wobble-horizontal">Shop now</a>
						</div>
					</div>
				</div>
			</div>
			@endif
			
		</div>
	</div>
			
			<!-- End Adv -->
		
		
		<div class="product-bestsale-jewelry">
			<div class="container">
				<div class="title-box2 text-center">
					<h2 class="title24 dark play-font ">Best Selling Products</h2>
					<img src="images/home/jewelry2/line-black.png" alt="" />
				</div>
				<div class="box-best-seller9">
					<ul class="list-inline-block title-list-tab text-center style-white">
						<li class="active"><a href="#tab1" data-toggle="tab">Coins</a></li>
						<li><a href="#tab2" data-toggle="tab">Rings</a></li>
						<li><a href="#tab1" data-toggle="tab">Earrings</a></li>
					</ul>
					<div class="tab-content">
						<div id="tab1" class="tab-pane active">
							<div class="product-slider">
								<div class="wrap-item hide-navi" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1],[560,2],[768,3],[990,4]]">
								@foreach($products as $product)
									@if($product->banner_path)         
									@php
										$image = 'storage/'.$product->banner_path;
									@endphp        
									@endif
									<div class="item-product item-product4 text-center">
										<div class="product-thumb">
											<a href="#" class="product-thumb-link zoom-thumb"><img src="{{ URL::asset($image)}}" alt=""></a>
											<a href="quick-view.html" class="quickview-link fancybox.iframe title12 round white"><i class="fa fa-search"></i></a>
										</div>
										<div class="product-info">
											<h3 class="title14 product-title"><a href="#" class="black">{{$product->title}}</a></h3>
											<div class="product-price title14 play-font">
												<del class="silver">₹601.00</del>
												<ins class="black title18">₹400.67</ins>
											</div>
											<ul class="wrap-rating list-inline-block">
												<li>
													<div class="product-rate">
														<div class="product-rating" style="width:100%"></div>
													</div>
												</li>
												<li>
													<span class="rate-number silver">(5.0)</span>
												</li>
											</ul>
											<div class="product-extra-link4 title18">
												<a href="compare-product.html" class="compare-link inline-block black fancybox fancybox.iframe"><i class="icon ion-ios-loop-strong"></i><span class="title10 white text-uppercase">Compare</span></a>
												<a href="#" class="addcart-link black inline-block"><i class="icon ion-bag"></i><span class="title10 white text-uppercase">Add to cart</span></a>
												<a href="#" class="wishlist-link black inline-block"><i class="icon ion-android-favorite-outline"></i><span class="title10 white text-uppercase">Wishlist</span></a>
											</div>
										</div>
									</div>
								@endforeach
								</div>	
							</div>	
						</div>	
					</div>	
				</div>		
			</div>
		</div>
		<!-- End Best Seller -->
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-xs-12">
					<div class="banner-adv banner-countdown gray-image zoom-image jewelry-coundown2">
						<a href="#" class="adv-thumb-link"><img src="images/home/jewelry2/deal.jpg" alt="" /></a>
						<div class="banner-info text-center">
							
							<h3 class="title18 white font-italic play-font">Jwellery Engraving</h3>
							<h2 class="title30 white text-uppercase play-font">Engrave your design</h2>
							<div id="contact">Drop Your Design</div>

							<div id="contactForm">
                                    
							  <h1>Drop Your Design</h1>
							  <small>We'll get back to you as quickly as possible</small>
							  
							  <form action="#">
							    
							    <input placeholder="Drop Your Design" type="images" required />
							    <textarea placeholder="Comment"></textarea>
							    <input class="formBtn" type="submit" />
							    <input class="formBtn" type="reset" />
							  </form>
							</div>

						</div>
					</div>
				</div>
					<!-- End Banner -->
				
				<div class="col-sm-4 col-xs-12">
					<div class="banner-adv diamond-collect banner-adv2 zoom-rotate">
						<a href="#" class="adv-thumb-link"><img src="images/home/jewelry2/diamond.jpg" alt=""></a>
						<div class="banner-info">
							<h3 class="title18 dark font-italic play-font">Silver</h3>
							<h2 class="title30 dark text-uppercase play-font">collection</h2>
							<a href="#" class="link-arrow text-uppercase dark wobble-horizontal">Shop all</a>
						</div>
					</div>
				</div>
			</div>
		</div>	
			<!-- End List Cat -->
		
		<div class="product-featured-jewelry2">
			<div class="container">
				<div class="title-box2 text-center">
					<h2 class="title24 dark play-font">Latest Collection</h2>
					<img src="images/home/jewelry2/line-black.png" alt="" />
				</div>
				<div class="product-slider">
					<div class="wrap-item hide-navi" data-pagination="false" data-autoplay="true" data-itemscustom="[[0,1],[560,2],[768,3],[990,4]]">
					@foreach($products as $product)
						@if($product->banner_path)         
						@php
							$image = 'storage/'.$product->banner_path;
						@endphp        
						@endif
						<div class="item-product item-product4 text-center">
							<div class="product-thumb">
								<a href="#" class="product-thumb-link zoom-thumb"><img src="{{ URL::asset($image)}}" alt=""></a>
								<a href="quick-view.html" class="quickview-link fancybox.iframe title12 round white"><i class="fa fa-search"></i></a>
							</div>
							<div class="product-info">
								<h3 class="title14 product-title"><a href="#" class="black">{{$product->title}}</a></h3>
								<div class="product-price title14 play-font">
									<del class="silver">₹601.00</del>
									<ins class="black title18">₹400.67</ins>
								</div>
								<ul class="wrap-rating list-inline-block">
									<li>
										<div class="product-rate">
											<div class="product-rating" style="width:100%"></div>
										</div>
									</li>
									<li>
										<span class="rate-number silver">(5.0)</span>
									</li>
								</ul>
								<div class="product-extra-link4 title18">
									<a href="compare-product.html" class="compare-link inline-block black fancybox fancybox.iframe"><i class="icon ion-ios-loop-strong"></i><span class="title10 white text-uppercase">Compare</span></a>
									<a href="#" class="addcart-link black inline-block"><i class="icon ion-bag"></i><span class="title10 white text-uppercase">Add to cart</span></a>
									<a href="#" class="wishlist-link black inline-block"><i class="icon ion-android-favorite-outline"></i><span class="title10 white text-uppercase">Wishlist</span></a>
								</div>
							</div>
						</div>
					@endforeach
					</div>	
				</div>	
			</div>
		</div>
		<!-- End Featured Product -->
		<div class="banner-adv banner-countdown fade-out-in">
				<a href="#" class="adv-thumb-link"><img src="images/home/jewelry/banner1.jpg" alt="" /></a>
				<div class="banner-info text-center">
					<h2 class="title30 dark text-uppercase font-bold play-font">Wedding Jwellery</h2>
					<h2 class="title30 dark text-uppercase font-normal play-font">upto 60% off</h2>
					<a href="#" class="link-arrow dark wobble-horizontal">Shop all</a>
				</div>
			</div>
		
			<!-- End Wedding Jwelery Banner -->
			<div class="list-cat-jewelry2">
				<div class="title-box2 text-center">
					<h2 class="title24 white play-font">Popular Jwellery</h2>
					<img src="{{URL::asset('images/home/jewelry2/line-white.png')}}" alt="" />
			    	</div>
				<div class="list-cat2">
					<div class="row">
					@foreach($popular_products as $pp)
					@if($pp->banner_path)         
					@php
						$image = 'storage/'.$pp->banner_path;
					@endphp        
					@endif	
					<div class="col-sm-4 col-xs-12">
						<div class="item-cat-jewelry2 text-center">
							<a href="#" class="pop"><img src="{{ URL::asset($image)}}" alt="{{$pp->title}}" /></a>
							<h3 class="title18 play-font"><a href="#" class="white">{{$pp->title}}</a></h3>
							<img class="line-icon" src="{{URL::asset('images/home/jewelry2/line-white.png')}}" alt="" />
							<a href="#" class="opacity white text-uppercase wobble-top">Shop Now</a>
						</div>
					</div>
					@endforeach
				</div>
		   	</div>
		</div>
			<!-- End Popular Jwellery -->
		<div class="testimo-jewelry2 parallax" >
		   <div class="container">
			    <div class="row">
					<div class="col-sm-10 col-xs-12">
						<script defer async src='https://cdn.trustindex.io/loader.js?9413fed2259d254b6e5d6ecea6'></script>
					</div>
					<div class="col-sm-2 col-xs-12">
					<div id="banner1"></div>
				</div>
			</div>
		</div>
		</section>
		<div class="container">
		    <h2 class="title36 play-font  white text-center text-uppercase font-bold">Why Shriram Jewellers?</h2>
			<div class="list-service-footer">
				<ul class="list-none">
					<li><a href="#"><img src="{{URL::asset('images/home/jewelry2/icon1.png')}}" alt="" /></a> <span class="desc dark opaci">REMOTE CONSULTATION</span></li>
					<li><a href="#"><img src="{{URL::asset('images/home/jewelry2/icon2.png')}}" alt="" /></a> <span class="desc dark opaci">FREE AFTER CARE</span></li>
					<li><a href="#"><img src="{{URL::asset('images/home/jewelry2/icon3.png')}}" alt="" /></a> <span class="desc dark opaci">TESTED & CERTIFIED DIAMONDS</span></li>
					<li><a href="#"><img src="{{URL::asset('images/home/jewelry2/icon5.jpg')}}" alt="" /></a> <span class="desc dark opaci">HALLMARK JWELLERY</span></li>
					<li><a href="#"><img src="{{URL::asset('images/home/jewelry2/icon4.png')}}" alt="" /></a> <span class="desc dark opaci">GUARANTEED PAYBACK</span></li>
				</ul>
			</div>
		</div>
@endsection
