<div class="topnav shadow-lg">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg admin-nav topnav-menu">
            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-tachometer-alt mr-1"></i>Dashboard
                        </a>
                    </li>
                    {{--<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-users mr-1"></i>User<div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                            <a href="{{route('admin.property.user',['type'=>'user'])}}" class="dropdown-item">All Users</a>
                            <a href="{{route('admin.property.user',['type'=>'admin'])}}" class="dropdown-item">Admin</a>
                            <a href="{{route('admin.property.user',['type'=>'tenant'])}}" class="dropdown-item">Tenant</a>
                            <a href="{{route('admin.property.user',['type'=>'manager'])}}" class="dropdown-item">Property Manager</a>
                            <a href="{{route('admin.property.user',['type'=>'owner'])}}" class="dropdown-item">Property Owner</a>
                            <a href="{{route('admin.vendor')}}" class="dropdown-item">Vendor</a>
                        </div>
                    </li>--}}
                    {{--<li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-archway mr-1"></i>Properties
                        </a>
                    </li>--}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-chalkboard mr-1"></i>Cms<div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                            <a href="{{route('admin.cms.index')}}" class="dropdown-item">Home Page</a>
                            <a href="{{route('admin.product')}}" class="dropdown-item">Product</a>
                            <a href="{{route('admin.subproduct')}}" class="dropdown-item">Sub Product</a>
                            <a href="{{route('admin.popularproduct')}}" class="dropdown-item">Popular Product</a>
                            <a href="{{route('admin.category')}}" class="dropdown-item">Category</a>
                            <a href="#" class="dropdown-item">Terms of Service</a>
                            <a href="#" class="dropdown-item">Privacy Policy</a>
                            {{--<a href="{{route('admin.expense')}}" class="dropdown-item">Expense</a>--}}
                            <a href="#" class="dropdown-item">Support Page</a>
                        </div>
                    </li>
                    {{--<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-book-account mr-1"></i>Accounting<div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                            <a href="#" class="dropdown-item">Vendor Category</a>
                            <a href="#" class="dropdown-item">Received Amount</a>
                            <a href="#" class="dropdown-item">Expense Income List</a>
                        </div>
                    </li>--}}
                    {{--<li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-headset mr-1"></i>Inquiries
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi-email-send mr-1"></i>Compose Mail
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi-file-document-outline mr-1"></i>Document Center
                        </a>
                    </li>--}}
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-cog fa-fw mr-1"></i>General Settings
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
