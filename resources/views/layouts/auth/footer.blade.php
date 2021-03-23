<!-- Footer Start -->
<footer class="footer front-end-footer">
    <div class="container-fluid">
        <div class="footer-top">
            <div class="row">
                <div class="col-md-4">
                    <p>Avoid scams in Rental Housing</p>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('home.index') }}"><img src="{{ URL::asset('images/only-white.png')}}" class="logo" alt=""></a>
                </div>
                <div class="col-md-4">
                    <p>Equal Housing Opportunity</p>
                </div>
            </div>
        </div>
        {{--<div class="row">
            <div class="col-md-6">Tenantden, Inc. © {{ date('Y') }}</div>
            <div class="col-md-6">  
                <div class="text-md-right footer-links d-sm-block">
                    <a href="{{route('home.service')}}">Terms of Service</a>
                    <a href="{{route('home.privacy_policy')}}">Privacy Policy</a>
                    <a href="{{route('home.faq')}}">Faq</a>
                </div> 
            </div>
        </div>--}}
    </div>
</footer>
<!-- end Footer -->