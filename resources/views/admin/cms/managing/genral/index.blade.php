
  @extends('layouts.master')
  @section('plugin-css')
	<link href="{{ URL::asset('assets/libs/jquery-fancy-file-uploader/fancy-file-uploader/fancy_fileupload.css') }}" rel="stylesheet" type="text/css" />
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
                <h4 class="page-title">Tenantden Homepage Managing Settings</h4>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-12">
            <div class="card application-card admin-about">
                <div class="card-body">
                	<div class="row">
                		<div class="banner-page-section col-md-12">             	
		                    <form id="homepage-manage_genral">
		                        <div class="settings-form">
		                        	<div class="row no-margin">
                                        <input type="hidden" name="image" id="image">
										<div class="mb-3 col-md-12">
		                                    <label class="col-form-label" for="title">Managing Title<span class="required">*</span></label>
											<input type="text" class="form-control required" name="title" id="title" value="{{@$manage_genral->title}}">
											<label for="title" id="title-error" generated="true" class="is-invalid" style="display:none"></label>
		                                </div>
                                        <div class="mb-3 col-md-12">
		                                    <label class="col-form-label" for="text">Managing Text<span class="required">*</span></label>
											<textarea class="form-control required" name="text" id="text">{{@$manage_genral->text}}</textarea>
										    <label for="text" id="text-error" generated="true" class="is-invalid" style="display:none"></label>
		                                </div>
										<div class="mb-3 col-md-6">
		                                    <label class="col-form-label" for="poster">Update Managing Poster<span class="required">*</span></label>
											<input id="poster" class="required" type="file" name="poster" id="poster" accept="image/jpeg, image/png">
											<label for="image" id="image-error" generated="true" class="is-invalid" style="display:none"></label>
                                            <ul class="warning-listing">
                                                <p><strong>Note:</strong></p>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>The Image dimensions should be <strong>560*603</strong> for better preview!!</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>The Image extension should be <strong>png,jpg,jpeg and less than 5 MB!!</strong></li>
                                            </ul>
                                        </div>
                                        <div class="mb-3 col-md-6">
		                                    <label class="col-form-label" for="text">Managing Poster<span class="required">*</span></label>
                                            @if(@$manage_genral->poster)  
                                                @php       
                							        $image = 'storage/'.@$manage_genral->poster;
                                                @endphp
                                            @endif
										    <ul class="single-upload" id="upload_image">
            							    	<li class="image-single"> 
            							    	    <img src="{{ URL::asset($image)}}" id="uploaded_poster" name="poster_id" alt="image" class="img-fluid img-thumbnail">
										    		<label for="poster_id" id="poster_id-error" generated="true"class="is-invalid" style="display:none"></label>
										    	</li>
										    </ul>
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
<script type="text/javascript" src="{{ URL::asset('assets/libs/jquery-fancy-file-uploader/fancy-file-uploader/jquery.ui.widget.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/libs/jquery-fancy-file-uploader/fancy-file-uploader/jquery.fileupload.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/libs/jquery-fancy-file-uploader/fancy-file-uploader/jquery.iframe-transport.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/libs/jquery-fancy-file-uploader/fancy-file-uploader/jquery.fancy-fileupload.js') }}"></script>
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
$('#homepage-manage_genral').validate({
errorClass: 'is-invalid',
submitHandler: function(form) {
    var text  = CKEDITOR.instances.text.document.getBody().getText().trim();
    if(text=='')
    {
        $('#text-error').show().html('Please enter the valid content');
        $('#text').addClass('is-invalid').focus();
        return false;
    }
    l = Ladda.create( document.querySelector('#homepage-manage_genral .btn-submit') );
    l.start();
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
    $.ajax({
        url: "{{route('admin.manage.genral.update')}}",
        method: "POST",
        dataType: 'json',
        data: $("#homepage-manage_genral").serialize(),
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
    $('#poster').FancyFileUpload({
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
                    $("#uploaded_poster").attr("src", reader.result);
                    $("#image").val(reader.result);
                }
                reader.readAsDataURL(file);
                $(".ff_fileupload_queued").first().find('.ff_fileupload_remove_file').trigger('click');
            }
        }
    });
});

</script>
@endsection 