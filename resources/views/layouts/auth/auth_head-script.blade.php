
<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.png') }}">
<!-- Plugins CSS -->
<link href="{{ URL::asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/ladda/ladda-themeless.min.css') }}" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/jquery-toast-plugin/jquery.toast.min.css') }}" rel="stylesheet" type="text/css" />
@yield('plugin-css')
<!-- App css -->
<link href="{{ URL::asset('/assets/css/bootstrap-creative.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
<link href="{{ URL::asset('/assets/css/app-creative.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

<!-- Font Family -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700%7cPlayfair+Display:400,700,400i,700i" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Muli:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<!-- icons -->
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
<link href="{{ URL::asset('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/css/frontend-header.css') }}" rel="stylesheet" type="text/css" />
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
