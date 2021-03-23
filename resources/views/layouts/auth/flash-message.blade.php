@if( Session::has('message') && Session::get('type') == "success" )
<script>
$(function(){
  $.toast({
    heading: 'Success',
    text: "{{ Session::get('message') }}",
    icon: 'success',
    position: 'top-right',
    loader: false,
  });
});
</script>
@endif
@if( Session::has('message') && Session::get('type') == "error" )
<script>
$(function(){
  $.toast({
    heading: 'Error',
    text: "{{ Session::get('message') }}",
    icon: 'error',
    position: 'top-right',
    loader: false,
  });
});
</script>
@endif