
@yield('plugin-css')

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/css/libs/font-awesome.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/css/libs/ionicons.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/css/libs/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/css/libs/bootstrap-theme.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/css/libs/jquery.fancybox.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/css/libs/jquery-ui.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/css/libs/owl.carousel.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/css/libs/owl.transitions.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/css/libs/jquery.mCustomScrollbar.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/css/libs/owl.theme.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/css/libs/animate.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/css/libs/hover.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/css/theme.css') }}" media="all"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/css/responsive.css') }}" media="all"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/css/browser.css') }}" media="all"/>

<style type="text/css">
	.error {
    color: red;
}
.custom-loader{
    background: #00000066;
    position: fixed;
    z-index: +999;
    height: 100%;
    width: 100%;
    background-image: url({{URL::asset('/assets/images/loading.gif')}});
    background-repeat: no-repeat;
    background-position: center;
}
.spinner-overlay {
    position: fixed;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
    z-index: 999;
}
</style>
@yield('custom-css')
