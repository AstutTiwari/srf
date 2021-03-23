<script src="{{ URL::asset('assets/js/vendor.min.js') }}"></script>

<!-- Plugins js-->
<script src="{{ URL::asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<script src="{{ URL::asset('assets/libs/ladda/spin.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/ladda/ladda.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/jquery-toast-plugin/jquery.toast.min.js') }}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

<script src="{{ URL::asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('js/idle.js') }}" type="text/javascript" ></script>

@yield('plugin-script')
<!-- App js-->
<script src="{{ URL::asset('js/app.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
<script>
    var url  = "{{ URL::asset('') }}";

    @if(Auth::check())
        var thePath = window.location.pathname;
        var lastItem = thePath.substring(thePath.lastIndexOf('/') + 1)
        var idleTime = parseInt({{ env('SESSION_LIFETIME') }})*60000;

        if (lastItem != "login") {
            var idle = new IdleJs({
                idle: idleTime, // idle time in ms
                events: ['mousemove', 'keydown', 'mousedown', 'touchstart'], // events that will trigger the idle resetter
                onIdle: function() {
                    document.getElementById('logout-form').submit();
                }, // callback function to be executed after idle time
            });
            idle.start();
        }
    @endif

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    @if(Route::currentRouteName() != "chat")
    $('.selectpicker').selectpicker().change(function(){
        $(this).valid()
    });
    @endif
    $(document).ready(function() {
        var my_id = "{{ Auth::id() }}";
    });

</script>
@yield('custom-script')
