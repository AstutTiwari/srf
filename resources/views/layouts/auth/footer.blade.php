<footer id="footer">
    <div class="footer2 bg-dark">
        <div class="container">
            <div class="main-footer2">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="block-footer2">
                            <h2 class="title18 play-font white text-uppercase font-bold">newsletter</h2>
                            <p class="desc white opaci">Sign up to our newsletter to receive updates on the art of Coin.</p>
                            <form class="form-newsletter2 dark-style">
                                <input type="text" placeholder="EMAIL ADDRESS">
                                <input type="submit" value="Subscription">
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="block-footer2">
                            <div class="logo logo-footer2 text-center">
                                
                            <a href="#" ><img src="{{URL::asset('images/home/fashion/logo1a.png')}}" alt=""></a>
                                </a>
                            </div>
                            <h2 class="title18 play-font  white text-center text-uppercase font-bold">FOLLOW US ON</h2>
                            <div class="social-network-footer text-center">
                            @foreach($socials as $social)
                                <a href="{{$social->redirect_url}}" target="_blank" class="title12 white inline-block round"><i class="{{$social->icon_name}}"></i></a>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="block-footer2">
                            <!-- contact section -->
                            {!! $contact->text !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Main Footer -->
            <div class="footer-bottom2">
                <ul class="footer-menu text-uppercase text-center list-inline-block">
                    <li><a href="contact.html" class="white opaci">CONTACT US</a></li>
                    <li><a href="#" class="white opaci">SITEMAP</a></li>
                    <li><a href="#" class="white opaci">TERMS & CONDITIONS</a></li>
                    <li><a href="#" class="white opaci">RETURN POLICY</a></li>
                   
                    <li><a href="#" class="white opaci">Privacy &amp; Cookies</a></li>
                    <li><a href="about.html" class="white opaci">About Us</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<div class="wishlist-mask">
		<div class="wishlist-popup">
			<span class="popup-icon"><i class="fa fa-bullhorn" aria-hidden="true"></i></span>
			<p class="wishlist-alert">"Product" was added to wishlist</p>
			<div class="wishlist-button">
				<a href="#">Continue Shopping (<span class="wishlist-countdown">5</span>)</a>
				<a href="#">Go To Shopping Cart</a>
			</div>
		</div>
	</div>
	<!-- End Wishlist Mask -->
	<div id="loading">
		<div id="loading-center">
			<div id="loading-center-absolute">
				
				<div class="object" id="object_two"></div>
			</div>
		</div>
	</div>
	<!-- End Preload -->
	<div>
	<a href="#" class="scroll-top dark"><i class="fa fa-angle-up"></i></a>
	</div>
