
    <script src="{{ URL::asset('/assets/js/libs/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/libs/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/libs/jquery.fancybox.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/libs/jquery-ui.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/libs/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/libs/jquery.jcarousellite.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/libs/jquery.mCustomScrollbar.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/libs/jquery.elevatezoom.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/libs/popup.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/libs/timecircles.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/libs/wow.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/theme.js') }}"></script>
     <script type="text/javascript" src="https://www.bullionvault.com/banners/live_price_widget.js"></script>
     <script src="{{ URL::asset('/assets/js/popup.js')}}"></script>

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

<script type="text/javascript">
		var options = {
			referrerID: "SHRIRAM123",
			size: "250x250",
			bullion: "gold",
			currency: "USD",
			weightUnit: "KG"
		};
		new BullionVaultPriceWidget('banner1', options);
	</script> 
@yield('custom-script')