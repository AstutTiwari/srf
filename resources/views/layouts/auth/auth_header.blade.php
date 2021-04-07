<div class="header-section outer-header"> 
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
        <div class="container-fluid">
            <div class="row">
                <a href="{{ route('home.index') }}" class="navbar-brand">
                <img src="{{ URL::asset('images/logo-black.png')}}" class="logo" alt="">
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto tanden-navbar">
                        {{--<li class="nav-item">
                            <a href="{{route('home.index')}}" class="nav-item nav-link active">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#about-us" class="nav-item nav-link scroll-to-sec">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="#deals-sec" class="nav-item nav-link scroll-to-sec">Features</a>
                        </li>
                        <li class="nav-item">
                            <a href="#service-sec" class="nav-item nav-link scroll-to-sec">Services</a>
                        </li>--}}
                        {{--<li class="nav-item">
                            <a href="{{route('home.document')}}" class="nav-item nav-link">Document Center</a>
                        </li>--}}
                        @guest
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-item nav-link btn-login"><i class="las la-user-plus"></i>Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-item active nav-link btn-login"><i class="las la-user"></i>Sign In</a>
                        </li>
                        @else
                        {{--<li class="nav-item">
                            @if(Auth::user()->hasRole("Property Manager") || Auth::user()->hasRole("Property Owner"))
                            <a href="{{ route('dashboard.index') }}" class="nav-item nav-link btn-login"><i class="las la-user-plus"></i>Dashboard</a>
                            @elseif(Auth::user()->hasRole("Tenant") )
                            <a href="{{ route('tenant.dashboard.index') }}" class="nav-item nav-link btn-login"><i class="mdi mdi-account-plus"></i>Dashboard</a>
                            @elseif(Auth::user()->hasRole("Vendor") )
                            <a href="{{ route('supplier.dashboard') }}" class="nav-item nav-link btn-login"><i class="mdi mdi-account-plus"></i>Dashboard</a>
                            @elseif(Auth::user()->hasRole("Admin") ) 
                            <a href="{{ route('admin.dashboard') }}" class="nav-item nav-link btn-login"><i class="mdi mdi-account-plus"></i>Dashboard</a>
                            @endif
                        </li>--}}
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-item nav-link btn-login" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="mdi mdi-account-outline"></i>Logout</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>