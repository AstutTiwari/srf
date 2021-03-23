@extends('layouts.master')
@section('custom-css')
<link href="{{ URL::asset('css/settings.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/css/home.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('meta_page_title','Contact Box 1 - Admin | Tenantden')
@section('content')
<div class="container-fluid banner-update settings-page mt-3">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <a class="back-btn" href="{{ url()->previous() }}"><i class="mdi mdi-keyboard-backspace"></i>Back</a>
                <h4 class="page-title"></h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card application-card admin-about">
                <div class="card-body">
                	<div class="row">
                		<div class="banner-page-section col-md-12">
		                    <form id="contact-support">
		                        <div class="settings-form">
		                        	<div class="row no-margin">
                                        <div class="mb-3 col-md-6">
		                                    <label class="col-form-label" for="support_email">Support Email<span class="required">*</span></label>
                                            <input type="text" class="form-control" name="support_email" id="support_email" value="{{@$support_contacts->support_email}}"/>
											<label for="title" id="title-error" generated="true" class="is-invalid" style="display:none"></label>
		                                </div>
										<div class="mb-3 col-md-6">
                                            <label class="col-form-label" for="support_contact_number">Support Contact Number<span class="required">*</span></label>
                                            <input type="text" class="form-control" name="support_contact_number" id="support_contact_number" value="{{@$support_contacts->support_contact_number}}"/>
										    <label for="text" id="text-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="col-form-label" for="subscribe_email">Subscriptions Email<span class="required">*</span></label>
                                            <input type="text" class="form-control" name="subscribe_email" id="subscribe_email" value="{{@$support_contacts->subscribe_email}}"/>
										    <label for="text" id="text-error" generated="true" class="is-invalid" style="display:none"></label>
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
<script type="text/javascript">
$(document).ready(function () {
    var l;
    $('#contact-support').validate({
    errorClass: 'is-invalid',
    submitHandler: function(form) {
        l = Ladda.create( document.querySelector('#contact-support .btn-submit') );
        l.start();
        $.ajax({
            url: "{{route('admin.cms.support.contactsUpdate')}}",
            method: "POST",
            dataType: 'json',
            data: $("#contact-support").serialize(),
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
                    });		}
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
