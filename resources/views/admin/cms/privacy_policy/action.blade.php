
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
                <h4 class="page-title">Tenantden Privacy Policy Settings</h4>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-12">
            <div class="card application-card">
                <div class="card-body">
                	<div class="row">
                		<div class="banner-page-section col-md-12">             	
		                    <form id="homepage-privacy_policy">
		                        <div class="settings-form">
		                        	<div class="row no-margin">
										<div class="mb-3 col-md-6">
		                                  <label class="col-form-label" for="text">Title</label>
											<input type="hidden" name="privacy_policy" value="{{@$privacy_policy->id?$privacy_policy->id:0}}">
                                            <input type="text" class="form-control" name="title" id="title" value="{{@$privacy_policy->title}}">
											<label for="title" id="title-error" generated="true" class="is-invalid" style="display:none"></label>
		                                </div>
                                        <div class="mb-3 col-md-12">
		                                  <label class="col-form-label" for="text">Text<span class="required">*</span></label>
											<textarea class="form-control required" name="text" id="text">{{@$privacy_policy->text}}</textarea>
										    <label for="text" id="text-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-6">                                        
                                            <label class="col-form-label" for="type">Type<span class="required">*</span></label>
                                             {!! Form::select('type', ['1'=>'Security','2'=>'Privacy','3'=>'Trust'], @$privacy_policy->type, ['id'=>'type', 'class' => 'form-control selectpicker required',  'title' => 'Select type', 'placeholder'=>'Select Faq Type']); !!}
                                            <label for="type" id="type-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox mt-4">
                                                    <input type="checkbox" class="custom-control-input" {{@$privacy_policy->status=='0'?'':'checked'}} id="status" name="status">
                                                    <label class="custom-control-label" for="status">Mark as active</label>
                                                    <label id="status-error" generated="true"class="is-invalid" style="display:none"></label>
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
$('#homepage-privacy_policy').validate({
errorClass: 'is-invalid',
ignore: [],
debug: false,
rules: { 
    text:{
        required: function() 
        {
            CKEDITOR.instances.text.updateElement();
        },
        minlength:100
    }
},
messages:
{
    text:{
            required:"Please enter Text",
             minlength:"Please enter a least 20 character"
    }
},
submitHandler: function(form) {
    var text  = CKEDITOR.instances.text.document.getBody().getText().trim();
    if(text=='')
    {
        $('#text-error').show().html('Please enter the valid content');
        $('#text').addClass('is-invalid').focus();
        return false;
    }
    l = Ladda.create( document.querySelector('#homepage-privacy_policy .btn-submit') );
    l.start();
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
    $.ajax({
        url: "{{route('admin.cms.privacy_policy.store')}}",
        method: "POST",
        dataType: 'json',
        data: $("#homepage-privacy_policy").serialize(),
        success: function (resultData) {
            l.stop();
            if(!resultData.success) {
                if(resultData.type === "validation-error")
                {
                    $.each( resultData.error, function( key, value ) {
                        $('#'+key+'-error').show().html(value);
                        $('#'+key).addClass('is-invalid');
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
                window.location.replace("{{route('admin.cms.privacy_policy.page')}}");	    }
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