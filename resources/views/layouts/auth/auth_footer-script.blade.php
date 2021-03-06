<!-- Vendor js -->
<script src="{{ URL::asset('/assets/js/vendor.min.js') }}"></script>

<!-- Plugins js-->
<script src="{{ URL::asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<script src="{{ URL::asset('/assets/libs/ladda/spin.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/ladda/ladda.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jquery-toast-plugin/jquery.toast.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
@yield('plugin-script')
<!-- App js-->
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
<script>
    var url  = "{{ URL::asset('') }}";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
        }
    });
    $('.selectpicker').selectpicker().change(function(){
        $(this).valid()
    });
</script>
@yield('custom-script')