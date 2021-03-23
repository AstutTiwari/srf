
@extends('layouts.master')
@section('plugin-css')
<link href="{{ URL::asset('assets/libs/jquery-fancy-file-uploader/fancy-file-uploader/fancy_fileupload.css') }}" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css" rel="stylesheet" type="text/css">
@endsection
@section('custom-css')
<link href="{{ URL::asset('css/settings.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('meta_page_title','Testimonial Amin | Tenantden')
@section('content')
<div class="container-fluid banner-update admin-about settings-page mt-3">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Tenantden Homepage Testimonial!</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card application-card">
                <div class="card-body">
                	<div class="row">
                		<div class="banner-page-section col-md-12">
		                    <form id="homepage-testimonial" enctype="multipart/form-data">
		                        <div class="settings-form">
		                        	<div class="row no-margin">
                                        <input type="hidden" name="testimonial_id" value="{{@$testimonial->id?$testimonial->id:0}}" id="testimoniall_id">
                                        <input type="hidden" name="image" id="image">
                                        <div class="mb-3 col-md-6">
		                                    <label class="col-form-label" for="name">User Name<span class="required">*</span></label>
									    	{!! Form::text('name',@$testimonial->name,['class'=>'form-control required','id'=>'name']) !!}
									    	<label for="name" id="name-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="col-form-label" for="rating">Rating<span class="required">*</span></label>
                                            <div id="rating"></div>
                                            <label for="rating" id="rating-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
		                                <div class="mb-3 col-md-12">
		                                    <label class="col-form-label" for="text">Text<span class="required">*</span></label>
											<textarea class="form-control required" name="text" id="text">{{@$testimonial->text}}</textarea>
										    <label for="text" id="text-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>

		                                <div class="mb-3 col-md-6">
		                                   <label class="col-form-label" for="logo">Logo<span class="required d-none">*</span></label>
											<input type="file" name="logo" id="logo" accept="image/jpeg, image/png">
										    <label for="logo" id="logo-error" generated="true" class="is-invalid" style="display:none"></label>
                                            <ul class="warning-listing">
                                                <p><strong>Note:</strong></p>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>The Image dimensions should be <strong>50*50</strong> for better preview!!</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>The Image extension should be <strong>png and less than 5 MB!!</strong></li>
                                            </ul>
                                        </div>
                                        <div class="mb-3 col-md-6">
		                                    <label class="col-form-label mt-2" for="text"><span class="required d-none">*</span></label>
                                            @if(isset($testimonial->path))
            							        @php
            							            $image = 'storage/'.$testimonial->path;
            							        @endphp
            							    @else
            							        @php
            							           $image = 'genral/dummy.png';
            							        @endphp
            							    @endif
										    <ul class="single-upload" id="upload_image">
            							    	<li class="image-single">
            							    	    <img src="{{ URL::asset($image) }}" id="uploaded_logo" name="uploaded_logo" alt="image" class="img-fluid img-thumbnail">
                                                    @if(!isset($testimonial->path))
                                                    <small class="form-text text-muted" id="logo_note">Profile image does't uploaded yet !</small>
                                                    @endif
                                                    <label for="logo_id" id="logo_id-error" generated="true"class="is-invalid" style="display:none"></label>
										    	</li>
										    </ul>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" {{@$testimonial->status=='0'?'':'checked'}} id="status" name="status">
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
<script type="text/javascript" src="{{ URL::asset('assets/libs/jquery-fancy-file-uploader/fancy-file-uploader/jquery.ui.widget.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/libs/jquery-fancy-file-uploader/fancy-file-uploader/jquery.fileupload.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/libs/jquery-fancy-file-uploader/fancy-file-uploader/jquery.iframe-transport.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/libs/jquery-fancy-file-uploader/fancy-file-uploader/jquery.fancy-fileupload.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endsection

@section('custom-script')
<script>
$(document).ready(function(e){
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
    $('#homepage-testimonial').validate({
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
                required:"This field is required.",
                minlength:"Please enter atleast 20 character"
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
        l = Ladda.create( document.querySelector('#homepage-testimonial .btn-submit') );
        l.start();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        var $rating = $("#rating").rateYo();
        $.ajax({
            url: "{{route('admin.cms.testimonial.store')}}",
            method: "POST",
            dataType: 'json',
            data: $("#homepage-testimonial").serialize()+"&rating="+$rating.rateYo("rating"),
            success: function (resultData) {
                l.stop();
                if(!resultData.success) {
                    if(resultData.type === "validation-error")
                    {
                        $.each( resultData.error, function( key, value ) {
                            $('#'+key+'-error').show().html(value);
                            $('#'+key).addClass('is-invalid').focus();
                            if(key=="image")
                            {
                                $('#logo-error').show().html(value);
                            }
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
					window.location.replace("{{route('admin.testimonial')}}");
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
$('#logo').FancyFileUpload({
    maxNumberOfFiles: 1,
    fileupload: {
        maxChunkSize: 10000000,
        retries : 1,
    },
    accept :['png','jpg','jpeg'], 
    added: function(e, data) {
        if (typeof(data.ff_info.errors[0]) !== "undefined") {
            return false;
        }
        if($(".ff_fileupload_queued").length > 1)
        {
            $(".ff_fileupload_queued").first().find('.ff_fileupload_remove_file').trigger('click');
        }
        var file = data.files[0];
        if(file)
        {
            var reader = new FileReader();
            reader.onload = function(){
                $("#uploaded_logo").attr("src", reader.result);
                $("#logo_note").addClass('d-none');
                $("#image").val(reader.result);
            }
            reader.readAsDataURL(file);
            $(".ff_fileupload_queued").first().find('.ff_fileupload_remove_file').trigger('click');
        }
    }
});
$("#rating").rateYo({
   fullStar: true,
   rating: "{{ @$testimonial->rating?$testimonial->rating:'5'}}",
});
</script>
@endsection
