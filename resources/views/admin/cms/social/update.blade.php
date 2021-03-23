
  @extends('layouts.master')

  @section('custom-css')
 <link href="{{ URL::asset('css/settings.css') }}" rel="stylesheet" type="text/css" />
  @endsection
  @section('meta_page_title','Admin | Tenantden')
  @section('content')
  <div class="container-fluid banner-update settings-page mt-3">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Tenantden Homepage Social Settings</h4>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-12">
            <div class="card application-card">
                <div class="card-body">
                	<div class="row">
                		<div class="banner-page-section col-md-12">             	
		                    <form id="homepage-social">
		                        <div class="settings-form">
		                        	<div class="row no-margin">
									    <input type="hidden" name="social_id" value="{{@$social->id}}" id="social_id">
                                        <div class="mb-3 col-md-6">
		                                    <label class="col-form-label" for="name">Icon Name<span class="required">*</span></label>
									    	{!! Form::text('name',@$social->name,['class'=>'form-control required','id'=>'name']) !!}
									    	<label for="name" id="name-error" generated="true" class="is-invalid" style="display:none"></label>
		                                </div>
		                                <div class="mb-3 col-md-6">
		                                    <label class="col-form-label" for="icon_name">Social Media Icon<span class="required">*</span></label>
									    	{!! Form::text('icon_name',@$social->icon_name,['class'=>'form-control required','id'=>'icon_name']) !!}
									    	<small class="form-text text-muted">For better experience only use fonts-awesome icon, Need to be copy "fab fa-facebook-f" value. <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Click here</a>!</small>
									    	<label for="icon_name" id="icon_name-error" generated="true" class="is-invalid" style="display:none"></label>
		                                </div>
                                        <div class="mb-3 col-md-6">
		                                    <label class="col-form-label" for="redirect_url">Redirect Url<span class="required">*</span></label>
									    	{!! Form::url('redirect_url',@$social->redirect_url,['class'=>'form-control required','id'=>'rediect_url']) !!}
									    	<label for="redirect_url" id="redirect_url-error" generated="true" class="is-invalid" style="display:none"></label>
		                                </div>
		                                <div class="mb-3 col-md-6">
		                                    <label class="col-form-label" for="order">Icon Order<span class="required">*</span></label>
		                                    {!! Form::select('order', ['1'=>'First','2'=>'Second','3'=>'Third','4'=>'Fourth'], @$social->order, ['id'=>'order', 'class' => 'form-control selectpicker',  'title' => 'Select Order']); !!}
		                                    <label for="order" id="order-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" {{@$social->status=='0'?'':'checked'}} id="status" name="status">
                                                    <label class="custom-control-label" for="status">Mark as active</label>
                                                    <label id="status-error"  generated="true"class="is-invalid" style="display:none"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 mt-2 col-md-12 btn-group">
                                            <a href="{{ url()->previous() }}" class="btn btn-cancel btn-outline-primary">Cancel</a>
		                                  	<button type="submit"  class="btn btn-save btn-primary btn-submit" data-style="slide-down">Save</button>
		                                </div>
		                            </div>
		    					</div>
		                    </form>
		                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	</div>
@endsection
@section('plugin-script')
	
@endsection 
@section('custom-script')
<script>
$(document).ready(function(e){
	var l;
	$('#homepage-social').validate({
    errorClass: 'is-invalid',
    submitHandler: function(form) {
        l = Ladda.create( document.querySelector('#homepage-social .btn-submit') );
        l.start();
        $.ajax({
            url: "{{route('admin.cms.social.store')}}",
            method: "POST",
            dataType: 'json',
            data: $("#homepage-social").serialize(),
            success: function (resultData) {
                l.stop();
                if(!resultData.success) {
                    if(resultData.type === "validation-error")
                    {
                        $.each( resultData.error, function( key, value ) {
                            $('#'+key+'-error').show().html(value);
                            $('#'+key).addClass('is-invalid').focus();
                        });
                    }
                    else
                    {
                        var msg = resultData.error;
                        $.toast({
                            heading: 'Error',
                            text: msg,
                            icon: 'error',
                            position: 'top-right',
                            hideAfter: 5000,
                            loader: false,
                        })
                    }
                }
                else if(resultData.success)
                {
                    var msg = resultData.message;
                    $.toast({
                        heading: 'Success',
                        text: msg,
                        icon: 'success',
                        position: 'top-right',
                        hideAfter: 5000,
                        loader: false,
                    });
					window.location.replace("{{route('admin.cms.social')}}");	
				}
            },
            error: function (jqXHR, exception) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                }else if (jqXHR.status == 401) {
                    window.location.reload();
                }else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                l.stop();
                $.toast({
                    heading: 'Error',
                    text: msg,
                    icon: 'error',
                    position: 'top-right',
                    hideAfter: 5000,
                    loader: false,
                })
            }
        });
        return false;
    }
  });
});
 
</script>
@endsection 