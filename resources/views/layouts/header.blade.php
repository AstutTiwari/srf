<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-right mb-0">
            {{--@php
                $notifications = getNotification(Auth::user()->id);
            @endphp--}}
            <li class="dropdown notification-list topbar-dropdown">
                {{--<a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-bell noti-icon"></i>
                    <span class="badge badge-danger rounded-circle noti-icon-badge" id="notification_count_{{Auth::user()->id}}">{{$notifications->count()}}</span>
                </a>--}}
                {{--<div class="dropdown-menu dropdown-menu-right dropdown-lg">

                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                            <span class="float-right">
                                <a href="" class="text-dark d-none">
                                    <small>Clear All</small>
                                </a>
                            </span>Notifications
                        </h5>
                    </div>

                    <div class="noti-scroll" id="append_notification_{{Auth::user()->id}}" data-simplebar>
                        @if($notifications->count()>0)
                            @foreach($notifications as $notification)
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon">
                                        <span class="letter-only">{{logoText($notification->fromUser->firstname).logoText($notification->fromUser->lastname)}} </span>
                                    </div>
                                        <p class="notify-details">{{$notification->fromUser->firstname}} {{$notification->fromUser->lastname}}</p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>{{ $notification->message }}</small>
                                        <br/>
                                        <small class="text-mute float-right">{{ setChatDate($notification->created_at)}}</small>
                                    </p>
                                </a>
                            @endforeach
                            @else
                                <p class="text-center notify">No New Notifications </p>
                        @endif
                        
                    </div>

                    <!-- All-->
                    <a href="{{route('notification.list')}}" class="dropdown-item text-center text-primary notify-item notify-all {{($notifications->count()>0)?'':'d-none'}}">
                        View all
                        <!-- <i class="fe-arrow-right"></i> -->
                    </a>

                </div>--}}
            </li>
            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light pro-user-role" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <!-- <img src="{{ URL::asset('/assets/images/users/user-1.jpg')}}" alt="user-image" class="rounded-circle"> -->
                    <span class="letter-only">{{logoText(Auth::user()->firstname).logoText(Auth::user()->lastname)}} </span>
                    <span class="pro-user-name ml-1 ">
                        @if(Auth::user())
                        {!! Auth::user()->firstname." ".Auth::user()->lastname."<br><span>" .Auth::user()->roles->first()['name'] !!}</span>
                        @endif 
                    </span>
                        <i class="mdi mdi-chevron-down ml-1"></i>                    
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="#" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>My Account</span>
                    </a>
                    {{--
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock"></i>
                        <span>Lock Screen</span>
                    </a> --}}

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                            class="dropdown-item notify-item" >
                        <i class="fe-log-out"></i>
                        <span>{{ __('Logout') }}</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                </div>
            </li>
        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="index.html" class="logo logo-dark text-center">
                <span class="logo-sm">
                    <img src="{{ URL::asset('/images/logo-white.jpg')}}" alt="Logo" class="img-fluid">
                    <!-- <span class="logo-lg-text-light">UBold</span> -->
                </span>
                <span class="logo-lg">
                    <img src="{{ URL::asset('/images/logo-white.jpg')}}" alt="Logo" class="img-fluid">
                    <!-- <span class="logo-lg-text-light">U</span> -->
                </span>
            </a>

            <a href="{{ route('home.index') }}" class="logo logo-light text-center">
                <span class="logo-sm">
                    <img src="{{ URL::asset('/images/logo-white.jpg')}}" alt="Logo" class="img-fluid">
                </span>
                <span class="logo-lg">
                    <img src="{{ URL::asset('/images/logo-white.jpg')}}" alt="Logo" class="img-fluid">
                </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>

            <li>
                <!-- Mobile menu toggle (Horizontal Layout)-->
                <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>