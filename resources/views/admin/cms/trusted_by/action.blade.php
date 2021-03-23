
@extends('layouts.master')
@section('plugin-css')
<link href="{{ URL::asset('assets/libs/jquery-fancy-file-uploader/fancy-file-uploader/fancy_fileupload.css') }}" rel="stylesheet" type="text/css" />
@endsection
 @section('custom-css')
<link href="{{ URL::asset('css/settings.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('meta_page_title','Trust By Amin | Tenantden')
@section('content')
<div class="container-fluid banner-update admin-about settings-page mt-3">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Tenantden Homepage Trusted By!</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card application-card">
                <div class="card-body">
                	<div class="row">
                		<div class="banner-page-section col-md-12">
		                    <form id="homepage-trusted_by">
		                        <div class="settings-form">
		                        	<div class="row no-margin">
                                        <input type="hidden" name="trusted_by_id" value="{{@$trusted_by->id?$trusted_by->id:0}}" id="trusted_by_id">
                                        <input type="hidden" name="image" id="image">
                                        <div class="mb-3 col-md-6">
		                                    <label class="col-form-label" for="name">Logo Name<span class="required">*</span></label>
									    	{!! Form::text('name',@$trusted_by->name,['class'=>'form-control required','id'=>'name']) !!}
									    	<label for="name" id="name-error" generated="true" class="is-invalid" style="display:none"></label>
		                                </div>
		                                <div class="mb-3 col-md-6">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox mt-4">
                                                    <input type="checkbox" class="custom-control-input" {{@$trusted_by->status=='0'?'':'checked'}} id="status" name="status">
                                                    <label class="custom-control-label" for="status">Mark as active</label>
                                                    <label id="status-error" generated="true"class="is-invalid" style="display:none"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
		                                   <label class="col-form-label" for="logo">Upload Logo<span class="required">*</span></label>
											<input id="logo" type="file" name="logo" id="logo" accept="image/jpeg, image/png">
										    <label for="logo" id="logo-error" generated="true" class="is-invalid" style="display:none"></label>
                                            <ul class="warning-listing">
                                                <p><strong>Note:</strong></p>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>The Image dimensions should be <strong>137*58</strong> for better preview!!</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>The Image extension should be <strong>png,jpg,jpeg and less than 5 MB!!</strong></li>
                                            </ul>
                                            <!-- <p><strong>Note:1)</strong> The Image dimensions should be 500*500 for better preview!!</p>
                                            <p class="ml-4"><strong>2)</strong> The Image extension should be png,jpg,jpeg and less then 5 MB!!</p> -->
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            @if(isset($trusted_by->path))
            							        @php
            							            $image = 'storage/'.$trusted_by->path;
            							        @endphp
            							    @else
            							        @php
            							           $image = 'genral/dummy.png';
            							        @endphp
            							    @endif
										    <ul class="single-upload mt-4" id="upload_image">
            							    	<li class="image-single">
            							    	    <img src="{{ URL::asset($image) }}" id="uploaded_logo" name="uploaded_logo" alt="image" class="img-fluid img-thumbnail">
                                                    @if(!isset($trusted_by->path))
                                                    <small class="form-text text-muted" id="logo_note">Trusted by logo does't uploaded yet !</small>
                                                    @endif
										    	</li>
										    </ul>
                                        </div>
                                        <div class="form-group mb-3 mt-2 col-md-12 btn-group">
                                            <a href="{{ url()->previous() }}" class="btn btn-cancel btn-outline-primary">Cancel</a>
		                                  	<button type="submit" class="btn btn-save btn-primary btn-submit" data-style="slide-down">Save</button>
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
@endsection
@section('custom-script')
<script>
$(document).ready(function(e){
	var l;
    $('#homepage-trusted_by').validate({
    errorClass: 'is-invalid',
    submitHandler: function(form) {
        var ID = '<?php echo @$trusted_by->id ?>';
        var image = $('#image').val();
        if( ID == '' && image == '')
        {
            $('#logo-error').show().html('Image field is required.');
            $('#logo-error').focus();
            return false;
        }
        else
        {
            $('#logo-error').text('');
            $('#logo-error').hide();
        }
        l = Ladda.create( document.querySelector('#homepage-trusted_by .btn-submit') );
        l.start();
        $.ajax({
            url: "{{route('admin.cms.trustedBy.store')}}",
            method: "POST",
            dataType: 'json',
            data: $("#homepage-trusted_by").serialize(),
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
                                $('#logo-error').addClass('is-invalid').focus();
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
					window.location.replace("{{route('admin.trustedBy')}}");
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
    fileupload: {
        maxChunkSize: 10000000,
        formData : {
            id: $('#temporary_id').val(),
        },
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
                $('#logo_note').addClass('d-none');
                $("#image").val(reader.result);
            }
            reader.readAsDataURL(file);
            $(".ff_fileupload_queued").first().find('.ff_fileupload_remove_file').trigger('click');
        }
    },
});
</script>
@endsection
