
@extends('layouts.master')
@section('plugin-css')
<link href="{{ URL::asset('assets/libs/jquery-fancy-file-uploader/fancy-file-uploader/fancy_fileupload.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('custom-css')
<link href="{{ URL::asset('css/settings.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('/css/home.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('meta_page_title','Category | Shriram')
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
		                    <form id="category_section">
		                        <div class="settings-form">
		                        	<div class="row no-margin">
                                        <div class="mb-3 col-md-6">
                                            <input type="hidden" name="banner_image" id="banner_image">
		                                    <label class="col-form-label" for="name">Name<span class="required">*</span></label>
                                            <input type="text" name="name" class="form-control" id="name"/>
											<label for="name" id="name-error" generated="true" class="is-invalid" style="display:none"></label>
		                                </div>
										<div class="mb-3 col-md-6">
		                                    <label class="col-form-label" for="slug">Slug<span class="required">*</span></label>
											<input type="text" name="slug" class="form-control" id="slug"/>
											<label for="slug" id="slug-error" generated="true" class="is-invalid" style="display:none"></label>
		                                </div>
                                        <div class="form-group banner-change mb-3 col-md-6">
                                        	<label class="col-form-label" for="banner">Upload Banner<span class="required">*</span></label>
                                        	<button type="button" class="image-guide btn btn-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="The Image ratio should be 2.327(W)*1(H) for better preview!"><i class="mdi mdi-information-outline"></i></button>
                                        	<input id="banner" class="" type="file" name="banner" accept=".jpg, .png, image/jpeg, image/png">
                                        	<label for="banner" id="banner-error" generated="true"class="is-invalid" style="display:none"></label>
                                            <ul class="warning-listing">
                                                <p><strong>Note:</strong></p>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>The Image ratio should be <strong>1650(W)*709(H)</strong> for better preview(1366*587)!!</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>The Image extension should be <strong>png,jpg,jpeg and less than 5 MB!!</strong></li>
                                            </ul>
                                        </div>
                                        <div class="form-group mt-4 col-md-6 upload_banner d-none">
											<ul class="single-upload" id="upload_banner">
            									<li class="image-single">
            										<img src="" id="uploaded_banner" name="image_ids" alt="image" class="img-fluid img-thumbnail">
													<label for="uploaded_banner" id="banner_image-error" generated="true"class="is-invalid" style="display:none"></label>
												</li>
											</ul>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox mt-4">
                                                    <input type="checkbox" class="custom-control-input" {{@$category->status=='0'?'':'checked'}} id="status" name="status">
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
<script type="text/javascript" src="{{ URL::asset('assets/libs/jquery-fancy-file-uploader/fancy-file-uploader/jquery.ui.widget.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/libs/jquery-fancy-file-uploader/fancy-file-uploader/jquery.fileupload.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/libs/jquery-fancy-file-uploader/fancy-file-uploader/jquery.iframe-transport.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/libs/jquery-fancy-file-uploader/fancy-file-uploader/jquery.fancy-fileupload.js') }}"></script>
@endsection
@section('custom-script')
<script type="text/javascript">
$(document).ready(function () {
    
    var l;
    $('#category_section').validate({
    errorClass: 'is-invalid',
    ignore: [],
    debug: false,
    submitHandler: function(form) {
        l = Ladda.create( document.querySelector('#category_section .btn-submit') );
        l.start();
        $.ajax({
            url: "{{route('admin.category.create.store')}}",
            method: "POST",
            dataType: 'json',
            data: $("#category_section").serialize(),
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
                    window.location.replace("{{route('admin.category')}}");		
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
$('#banner').FancyFileUpload({
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
                $('.upload_banner').removeClass('d-none');
                $("#uploaded_banner").attr("src", reader.result);
                $("#banner_image").val(reader.result);
            }
            reader.readAsDataURL(file);
            $(".ff_fileupload_queued").first().find('.ff_fileupload_remove_file').trigger('click');
        }
    },
});
</script>
@endsection 