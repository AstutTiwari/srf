
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
                <h4 class="page-title">Tenantden Homepage Service Settings</h4>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-12">
            <div class="card application-card admin-about">
                <div class="card-body">
              	    <div class="row">
              		    <div class="banner-page-section col-md-12">             	
  	                        <form id="homepage-service_card">
  	                            <div class="settings-form">
  	                                <div class="row no-margin">
                                        <input type="hidden" name="card_id" id="card_id" value="{{@$card_service->id?$card_service->id:0}}">
                                        <input type="hidden" name="logo_content" id="logo_content">
                                        <input type="hidden" name="hover_logo_content" id="hover_logo_content">
                                        <div class="mb-3 col-md-12">
  	                                        <label class="col-form-label" for="text">Title<span class="required">*</span></label>
  										    <input type="text" class="form-control required" name="title" id="title" value="{{@$card_service->title}}">
  										    <label for="title" id="title-error" generated="true" class="is-invalid" style="display:none"></label>
  	                                    </div>
                                        <div class="mb-3 col-md-12">
  	                                        <label class="col-form-label" for="text"> Text<span class="required">*</span></label>
  										    <textarea class="form-control required" name="text" id="text">{{@$card_service->text}}</textarea>
  									        <label for="text" id="text-error" generated="true" class="is-invalid" style="display:none"></label>
  	                                    </div>
                                        <div class="mb-3 icon-upload-group col-md-6">
                                            <div class="form-group">
    	                                        <label class="col-form-label" for="logo">Logo<span class="required">*</span></label>
    										    <input id="logo" class="" type="file" name="logo"  accept="image/jpeg, image/png">
    										    <label for="logo_content" id="logo_content-error" generated="true" class="is-invalid" style="display:none"></label>
                                                <ul class="warning-listing">
                                                    <p><strong>Note:</strong></p>
                                                    <li><i class="fa fa-check" aria-hidden="true"></i>The Image dimensions should be <strong>100*100</strong> for better preview!!</li>
                                                    <li><i class="fa fa-check" aria-hidden="true"></i>The Image extension should be <strong>png,jpg,jpeg and less than 5 MB!!</strong></li>
                                                </ul>
                                            </div>
                                            @if(@$card_service->logo_url)         
                                                @php
                                                $image = 'storage/'.@$card_service->logo_url;
                                                @endphp   
                                            @else
            							        @php
            							           $image = 'genral/dummy.png';
            							        @endphp     
                                            @endif
                                            <ul class="updated-logo common-logo-update">
                                                <li class="image-single">
                                                    <img src="{{ URL::asset($image)}}" id="logo_upload" name="logo_upload" alt="image" class="img-fluid img-thumbnail">
                                                    <label for="logo_upload" id="logo_upload-error" generated="true"class="is-invalid" style="display:none"></label>
                                                </li>
                                            </ul>
	                                    </div>
                                        <div class="mb-3 icon-upload-group col-md-6">
                                            <div class="form-group">
    	                                        <label class="col-form-label" for="hover_logo">Hover logo<span class="required">*</span></label>
    										    <input id="hover_logo" class="" type="file" name="hover_logo" accept="image/jpeg, image/png">
    										    <label for="hover_logo_content" id="hover_logo_content-error" generated="true" class="is-invalid" style="display:none"></label>
                                                <ul class="warning-listing">
                                                    <p><strong>Note:</strong></p>
                                                    <li><i class="fa fa-check" aria-hidden="true"></i>The Image dimensions should be <strong>100*100</strong> for better preview!!</li>
                                                    <li><i class="fa fa-check" aria-hidden="true"></i>The Image extension should be <strong>png,jpg,jpeg and less than 5 MB!!</strong></li>
                                                </ul>
                                            </div>
                                             @if(@$card_service->hover_logo_url)         
                                                @php
                                                    $image = 'storage/'.@$card_service->hover_logo_url;
                                                @endphp
                                            @else 
                                                @php
            							           $image = 'genral/dummy.png';
            							        @endphp       
                                            @endif
                                            <ul class="updated-hover-logo common-logo-update">
                                                <li class="image-single">
                                                    <img src="{{ URL::asset($image)}}" id="hover_logo_upload" name="hover_logo_upload" alt="image" class="img-fluid img-thumbnail">
                                                    <label for="hover_logo_upload" id="hover_logo_upload-error" generated="true"class="is-invalid" style="display:none"></label>
                                                </li>
                                            </ul> 
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" {{@$card_service->status=='0'?'':'checked'}} id="status" name="status">
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
    
    $('#homepage-service_card').validate({
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
        var ID = '<?php echo @$card_service->id ?>';
        var logo_content = $('#logo_content').val();
        var hover_logo_content = $('#hover_logo_content').val();
        if( ID == '' && logo_content == '')
        {
            $('#logo_content-error').show().html('Image field is required.');
            $('#logo_content-error').focus();
            return false;
        }
        else
        {
            $('#logo_content-error').text('');
            $('#logo_content-error').hide();
        }
        if( ID == '' && hover_logo_content == '')
        {
            $('#hover_logo_content-error').show().html('Image field is required.');
            $('#hover_logo_content-error').focus();
            return false;
        }
        else
        {
            $('#hover_logo_content-error').text('');
            $('#hover_logo_content-error').hide();
        }
        var text  = CKEDITOR.instances.text.document.getBody().getText().trim();
        if(text=='')
        {
            $('#text-error').show().html('Please enter the valid content');
            $('#text').addClass('is-invalid').focus();
            return false;
        }
        
        l = Ladda.create( document.querySelector('#homepage-service_card .btn-submit') );
        l.start();
        for (instance in CKEDITOR.instances) {
          CKEDITOR.instances[instance].updateElement();
        }
        
        $.ajax({
            url: "{{route('admin.service.card.store')}}",
            method: "POST",
            dataType: 'json',
            data: $("#homepage-service_card").serialize(), 
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
                window.location.replace("{{route('admin.service.card')}}");
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
                    $('#logo_upload').attr('src',reader.result);
                    $("#logo_content").val(reader.result);
                }
                reader.readAsDataURL(file);
                $(".ff_fileupload_queued").first().find('.ff_fileupload_remove_file').trigger('click');
            }
        }
    });
    $('#hover_logo').FancyFileUpload({
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
                    $('#hover_logo_upload').attr('src',reader.result);
                    $("#hover_logo_content").val(reader.result);
                }
                reader.readAsDataURL(file);
                $(".ff_fileupload_queued").first().find('.ff_fileupload_remove_file').trigger('click');
            }
        }
    });
});

</script>
@endsection 