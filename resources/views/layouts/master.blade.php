<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" /> 
        <title>@yield('meta_page_title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0"/>
        <meta content="description" name="Manage one or multiple property types using TenantDen property management solution. Here you can find the best real estate deals & tenant management services." />
        <meta content="Coderthemes" name="author" />
        <meta name="keywords" content="property management solution,rental property management software,tenant management software,online rental application,best online rental application,online apartment rental application,rental management solutions,best real estate deals,best place to find real estate deals,tenant screening services">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        @include('layouts.head-script')
    </head>

    <body data-layout-mode="horizontal" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>
      <div class="spinner-overlay d-none">
        <div class="spinner-border text-primary m-2" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
        <!-- Begin page -->
        <div id="wrapper">
          @include('layouts.header') 
         
            @include('layouts.topbar-admin')
         
          <div class="content-page">
            @yield('content')
            @include('layouts.footer')
          </div>
        </div>
      <!-- Begin page -->
      @include('layouts.footer-script')
      @include('layouts.flash-message')
    </body>
</html>
