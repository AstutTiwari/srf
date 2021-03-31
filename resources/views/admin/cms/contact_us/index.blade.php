
@extends('layouts.master')
@section('plugin-css')

@endsection
@section('custom-css')
<link href="{{ URL::asset('css/settings.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/css/home.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('meta_page_title','Admin | Tenantden')
@section('content')
<div class="container-fluid banner-update settings-page mt-3">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <a class="back-btn" href="{{ url()->previous() }}"><i class="mdi mdi-keyboard-backspace"></i>Back</a>
                <h4 class="page-title">Homepage Contact Us</h4>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-12">
            <div class="card application-card admin-about">
                <div class="card-body">
                	<div class="row">
                		<div class="banner-page-section col-md-12">             	
		                    <form id="homepage-contact_us">
		                        <div class="settings-form">
		                        	<div class="row no-margin">
                                        <div class="mb-3 col-md-6">
		                                    <label class="col-form-label" for="contact_number">Contact Number<span class="required">*</span></label>
											<input type="text" name="contact_number" id="contact_number" class="required form-control" value="{{@$contact_us->contact_number}}">
										    <label for="contact_number" id="contact_number-error" generated="true" class="is-invalid" style="display:none"></label>
		                                </div>
										<div class="mb-3 col-md-12">
		                                    <label class="col-form-label" for="text">Text<span class="required">*</span></label>
											<textarea class="form-control required" name="text" id="text">{{@$contact_us->text}}</textarea>
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
<script type="text/javascript" src="{{ URL::asset('assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection 
@section('custom-script')
<script type="text/javascript">
$(document).ready(function () {
    CKEDITOR.replace('text', {
      // Define the toolbar groups as it is a more accessible solution.
      toolbarGroups: [{
          "name": "basicstyles",
          "groups": ["basicstyles"]
        },
        {
          "name": "links",
          "groups": ["links"]
        },
        {
          "name": "paragraph",
          "groups": ["list", "blocks"]
        },
        {
          "name": "document",
          "groups": ["mode"]
        },
        {
          "name": "insert",
          "groups": ["insert"]
        },
        {
          "name": "styles",
          "groups": ["styles"]
        },
        {
          "name": "about",
          "groups": ["about"]
        }
      ],
      // Remove the redundant buttons from toolbar groups defined above.
      removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar,Image,Table'
    });
    var l;
    $('#homepage-contact_us').validate({
    errorClass: 'is-invalid',
    submitHandler: function(form) {
        var text  = CKEDITOR.instances.text.document.getBody().getText().trim();
        if(text=='')
        {
            $('#text-error').show().html('Please enter the valid content');
            $('#text').addClass('is-invalid').focus();
            return false;
        }
        l = Ladda.create( document.querySelector('#homepage-contact_us .btn-submit') );
        l.start();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        $.ajax({
            url: "{{route('admin.contactus.update')}}",
            method: "POST",
            dataType: 'json',
            data: $("#homepage-contact_us").serialize(),
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