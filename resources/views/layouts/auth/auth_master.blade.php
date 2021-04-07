<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>@yield('meta_page_title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0"/>
        <meta content="description" name="@yield('meta_page_description')" />
        <meta content="Coderthemes" name="author" />
        <meta name="keywords" content="@yield('meta_page_keyword')">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        @include('layouts.auth.auth_head-script') 
        
    </head>

    
    <body class="auth-fluid-pages pb-0">  
        
            <div id="full-page-loader" class=""></div>
            @include('layouts.auth.auth_header')
            @yield('content')
            @include('layouts.auth.auth_footer')
            @include('layouts.auth.auth_footer-script')
            @include('layouts.auth.flash-message')
        
    </body>
</html>
