
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
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/css/popup.css')}}" media="all"/>
    
    <script src="/js/google-places.js "></script>
    
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyApxu4FD8reY77Xr9FzmBQZpvyU0VoBmqE"></script>

<script>
    jQuery(document).ready(function() {
        $("#google-reviews").googlePlaces({
            placeId: 'ChIJK8jCTKAZDTkRvap-4oV7-OQ',
            render: ['reviews'],
            min_rating: 1,
            max_rows: 3
        });
    });
</script>
    

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
