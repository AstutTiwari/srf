
@extends('layouts.master')
@section('plugin-css')
<link href="{{ URL::asset('assets/libs/jquery-fancy-file-uploader/fancy-file-uploader/fancy_fileupload.css') }}" rel="stylesheet" type="text/css" />
@endsection
 @section('custom-css')
<link href="{{ URL::asset('css/settings.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('meta_page_title','Product Create | Shriram')
@section('content')
<div class="container-fluid banner-update admin-about settings-page mt-3">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Product Update</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card application-card">
                <div class="card-body">
                	<div class="row">
                		<div class="banner-page-section col-md-12">
		                    <form id="product-section">
		                        <div class="settings-form">
		                        	<div class="row no-margin">
                                        <div class="mb-3 col-md-6">
                                            <input type="hidden" name="banner_image" id="banner_image">
                                            <input type="hidden" name="product_id" id="product_id" value="{{@$product->id}}">
		                                    <label class="col-form-label" for="slug">Name<span class="required">*</span></label>
									    	{!! Form::text('slug',$product->slug,['class'=>'form-control required','id'=>'slug']) !!}
									    	<label for="slug" id="slug-error" generated="true" class="is-invalid" style="display:none"></label>
		                                </div>
                                        <div class="mb-3 col-md-6">
		                                    <label class="col-form-label" for="category_id">Category<span class="required">*</span></label>
									    	{!! Form::select('category_id',$category,$product->id,['class'=>'form-control selectpicker required','id'=>'category_id']) !!}
									    	<label for="category_id" id="category_id-error" generated="true" class="is-invalid" style="display:none"></label>
		                                </div>
                                        <div class="mb-3 col-md-6">
		                                    <label class="col-form-label" for="title">Title<span class="required">*</span></label>
											{!! Form::textarea('title',@$product->title,['class'=>'form-control required','id'=>'title', 'rows' => 10, 'cols' => 30]) !!}
											<label for="title" id="title-error" generated="true" class="is-invalid" style="display:none"></label>
		                                </div>
		                                <div class="mb-3 col-md-6">
		                                    <label class="col-form-label" for="sub_title">Sub Title<span class="required">*</span></label>
											{!! Form::textarea('sub_title',@$product->sub_title,['class'=>'form-control required','id'=>'sub_title', 'rows' => 10, 'cols' => 30]) !!}
											<label for="sub_title" id="sub_title-error" generated="true" class="is-invalid" style="display:none"></label>
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
                                        <div class="form-group mt-4 col-md-6 upload_banner {{@$product->banner_path?'':'d-none'}}">
											@if(@$product->banner_path)         
            								    @php
            								        $image = 'storage/'.@$product->banner_path;
            								    @endphp        
            								@endif
                                            <ul class="single-upload" id="upload_banner">
            									<li class="image-single">
            										<img src="{{ URL::asset(@$image)}}" id="uploaded_image" name="image_ids" alt="image" class="img-fluid img-thumbnail">
													<label for="image" id="image-error" generated="true"class="is-invalid" style="display:none"></label>
												</li>
											</ul>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox mt-4">
                                                    <input type="checkbox" class="custom-control-input" {{@$product->status=='0'?'':'checked'}} id="status" name="status">
                                                    <label class="custom-control-label" for="status">Mark as active</label>
                                                    <label id="status-error" generated="true"class="is-invalid" style="display:none"></label>
                                                </div>
                                            </div>
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
    $('#product-section').validate({
    errorClass: 'is-invalid',
    submitHandler: function(form) {
        l = Ladda.create( document.querySelector('#product-section .btn-submit') );
        l.start();
        $.ajax({
           url: "{{route('admin.popularproduct.update.store')}}",
            method: "POST",
            dataType: 'json',
            data: $("#product-section").serialize(),
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
					window.location.replace("{{route('admin.popularproduct')}}");
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
                $("#uploaded_image").attr("src", reader.result);
                $('#logo_note').addClass('d-none');
                $("#banner_image").val(reader.result);
            }
            reader.readAsDataURL(file);
            $(".ff_fileupload_queued").first().find('.ff_fileupload_remove_file').trigger('click');
        }
    },
});
</script>
@endsection
