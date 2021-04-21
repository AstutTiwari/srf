
  @extends('layouts.master')
	@section('plugin-css')
	<link href="{{ URL::asset('assets/libs/jquery-fancy-file-uploader/fancy-file-uploader/fancy_fileupload.css') }}" rel="stylesheet" type="text/css" />
	@endsection
  @section('custom-css')
 <link href="{{ URL::asset('css/settings.css') }}" rel="stylesheet" type="text/css" />
  @endsection
  @section('meta_page_title','Admin | Tenantden')
  @section('content')
  <div class="container-fluid banner-update settings-page mt-3">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Tenantden Homepage Product Banner Settings</h4>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-12">
            <div class="card application-card"> 
                <div class="card-body">
                	<div class="row">
                		<div class="banner-page-section col-md-12">             	
		                    <form id="homepage-banner">
		                        <div class="settings-form">
		                        	<div class="row no-margin">
										<input type="hidden" name="banner_id" value="{{@$banner->id}}" id="banner_id">
                                        <input type="hidden" name="image" id="image">
                                        <div class="mb-3 col-md-6">
		                                    <label class="col-form-label" for="title">Banner Title<span class="required">*</span></label>
											{!! Form::textarea('title',@$banner->title,['class'=>'form-control required','id'=>'title', 'rows' => 10, 'cols' => 30]) !!}
											<label for="title" id="title-error" generated="true" class="is-invalid" style="display:none"></label>
		                                </div>
                                        <div class="mb-3 col-md-6">
		                                    <label class="col-form-label" for="sub_title">Banner Sub Title<span class="required">*</span></label>
											{!! Form::textarea('sub_title',@$banner->sub_title,['class'=>'form-control required','id'=>'sub_title', 'rows' => 10, 'cols' => 30]) !!}
											<label for="sub_title" id="sub_title-error" generated="true" class="is-invalid" style="display:none"></label>
		                                </div>
		                                {{--<div class="mb-3 col-md-6">
		                                    <label class="col-form-label" for="slug">Banner Slug<span class="required">*</span></label>
											<button type="button" class="image-guide btn btn-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Product banner slug should be unique"><i class="mdi mdi-information-outline"></i></button>
                                            {!! Form::text('slug',@$banner->slug,['class'=>'form-control required','id'=>'slug']) !!}
											<label for="slug" id="slug-error" generated="true" class="is-invalid" style="display:none"></label>
		                                </div>
                                        <div class="mb-3 col-md-6">
		                                    <label class="col-form-label" for="order">Banner Order<span class="required">*</span></label>
		                                    	{!! Form::select('order', ['1'=>'First','2'=>'Second','3'=>'Third','4'=>'Fourth','5'=>'Fifth','6'=>'Sixth'], @$banner->order, ['id'=>'order', 'class' => 'form-control selectpicker',  'title' => 'Select Product Banner Order']); !!}
		                                    <label for="order" id="order-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>--}}
		                                <div class="form-group banner-change mb-3 col-md-6">
                                        	<label class="col-form-label" for="images">Upload Banner<span class="required">*</span></label>
                                        	<button type="button" class="image-guide btn btn-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="The Image ratio should be 2.327(W)*1(H) for better preview!"><i class="mdi mdi-information-outline"></i></button>
                                        	<input id="images" class="" type="file" name="images" accept=".jpg, .png, image/jpeg, image/png">
                                        	<label for="images" id="images-error" generated="true"class="is-invalid" style="display:none"></label>
                                            <ul class="warning-listing">
                                                <p><strong>Note:</strong></p>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>The Image ratio should be <strong>1650(W)*709(H)</strong> for better preview(1366*587)!!</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>The Image extension should be <strong>png,jpg,jpeg and less than 5 MB!!</strong></li>
                                            </ul>
                                        </div>
                                        
										<div class="form-group mt-4 col-md-6">
											@if(@$banner->url)         
            								    @php
            								    $image = 'storage/'.@$banner->url;
            								    @endphp        
            								@endif
                                            <ul class="single-upload" id="upload_image">
            									<li class="image-single">
            										<img src="{{ URL::asset($image)}}" id="uploaded_image" name="image_ids" alt="image" class="img-fluid img-thumbnail">
													<label for="image" id="image-error" generated="true"class="is-invalid" style="display:none"></label>
												</li>
											</ul>
                                        </div>
                                        
                                        <div class="mb-3 col-md-6">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox mt-4">
                                                    <input type="checkbox" class="custom-control-input" {{@$banner->status=='0'?'':'checked'}} id="status" name="status">
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
<script>
$(document).ready(function() {
	var l;
	$('#homepage-banner').validate({
    errorClass: 'is-invalid',
    ignore: [],
    debug: false,
    // rules: { 
    //     text:{
    //         required: function() 
    //         {
    //             CKEDITOR.instances.text.updateElement();
    //         },
    //         minlength:100
    //     }
    // },
    // messages:
    // {
    //     text:{
    //             required:"Please enter Text",
    //              minlength:"Please enter a least 20 character"
    //     }
    // }, 
    submitHandler: function(form) {
       // var text  = CKEDITOR.instances.text.document.getBody().getText().trim();
        // if(text=='')
        // {
        //     $('#text-error').show().html('Please enter the valid content');
        //     $('#text').addClass('is-invalid').focus();
        //     return false;
        // }
        l = Ladda.create( document.querySelector('#homepage-banner .btn-submit') );
        l.start();
        $.ajax({
            url: "{{route('admin.cms.product.banner.store')}}",
            method: "POST",
            dataType: 'json',
            data: $("#homepage-banner").serialize(),
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
					window.location.replace("{{route('admin.cms.product.banner')}}");	
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
	$('#images').FancyFileUpload({
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
                    $('#uploaded_image').attr('src',reader.result);
                    $("#image").val(reader.result);
                }
                reader.readAsDataURL(file);
                $(".ff_fileupload_queued").first().find('.ff_fileupload_remove_file').trigger('click');
            }
        }
    });
})
</script>
@endsection 