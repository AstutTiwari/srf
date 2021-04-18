
@extends('layouts.master')
@section('plugin-css')
<link href="{{ URL::asset('assets/libs/jquery-fancy-file-uploader/fancy-file-uploader/fancy_fileupload.css') }}" rel="stylesheet" type="text/css" />
@endsection
 @section('custom-css')
<link href="{{ URL::asset('css/settings.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('meta_page_title','Product Create | Tenantden')
@section('content')
<div class="container-fluid banner-update admin-about settings-page mt-3">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Sub Product Create</h4>
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
		                                    <label class="col-form-label" for="slug">Name<span class="required">*</span></label>
									    	{!! Form::text('slug','',['class'=>'form-control required','id'=>'slug']) !!}
									    	<label for="slug" id="slug-error" generated="true" class="is-invalid" style="display:none"></label>
		                                </div>
                                        <div class="mb-3 col-md-6">
		                                    <label class="col-form-label" for="parent_id">Parent Category<span class="required">*</span></label>
									    	{!! Form::select('parent_id',$product,'',['class'=>'form-control selectpicker required','data-live-search' => "true",'data-size' => "4",'id'=>'parent_id']) !!}
									    	<label for="parent_id" id="parent_id-error" generated="true" class="is-invalid" style="display:none"></label>
		                                </div>
                                        <div class="mb-3 col-md-6">
		                                    <label class="col-form-label" for="title">Title<span class="required">*</span></label>
											{!! Form::textarea('title','',['class'=>'form-control required','id'=>'title', 'rows' => 10, 'cols' => 30]) !!}
											<label for="title" id="title-error" generated="true" class="is-invalid" style="display:none"></label>
		                                </div>
		                                <div class="mb-3 col-md-6">
		                                    <label class="col-form-label" for="sub_title">Sub Title<span class="required">*</span></label>
											{!! Form::textarea('sub_title','',['class'=>'form-control required','id'=>'sub_title', 'rows' => 10, 'cols' => 30]) !!}
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
                                                    <input type="checkbox" class="custom-control-input" checked id="status" name="status">
                                                    <label class="custom-control-label" for="status">Mark as active</label>
                                                    <label id="status-error" generated="true"class="is-invalid" style="display:none"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="form-inner-title col-12">Product Detail</p> 
                                        <div class="mb-3 col-md-2">
                                            <label class="col-form-label" for="metal_type">Metal Type</label>
                                            {!! Form::select('metal_type',$metals,'',['class'=>'form-control selectpicker','data-live-search' => "true",'data-size' => "4",'id'=>'metal_type']) !!}
                                            <label for="metal_type" id="metal_type-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="col-form-label" for="purity">Purity</label>
                                            {!! Form::number('purity','',['class'=>'form-control','id'=>'purity']) !!}
                                            <label for="purity" id="purity-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="col-form-label" for="seq_no">Sequence Number</label>
                                            {!! Form::text('seq_no','',['class'=>'form-control','id'=>'seq_no']) !!}
                                            <label for="seq_no" id="seq_no-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="col-form-label" for="design_no">Design Number</label>
                                            {!! Form::text('design_no','',['class'=>'form-control','id'=>'design_no']) !!}
                                            <label for="design_no" id="design_no-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="col-form-label" for="g_wt">G Wait</label>
                                            {!! Form::number('g_wt','',['class'=>'form-control','id'=>'g_wt']) !!}
                                            <label for="g_wt" id="g_wt-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="col-form-label" for="n_wt">N Wait</label>
                                            {!! Form::number('n_wt','',['class'=>'form-control','id'=>'n_wt']) !!}
                                            <label for="n_wt" id="n_wt-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="col-form-label" for="diamand_wt">Diamond Wait</label>
                                            {!! Form::number('diamand_wt','',['class'=>'form-control','id'=>'diamand_wt']) !!}
                                            <label for="diamand_wt" id="diamand_wt-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="col-form-label" for="diamand_pics">Diamond Pics</label>
                                            {!! Form::number('diamand_pics','',['class'=>'form-control','id'=>'diamand_pics']) !!}
                                            <label for="diamand_pics" id="diamand_pics-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="col-form-label" for="color_stone_wt">Color Stone Weight</label>
                                            {!! Form::number('color_stone_wt','',['class'=>'form-control','id'=>'color_stone_wt']) !!}
                                            <label for="color_stone_wt" id="color_stone_wt-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="col-form-label" for="clarity">Clarity</label>
                                            {!! Form::text('clarity','',['class'=>'form-control','id'=>'clarity']) !!}
                                            <label for="clarity" id="clarity-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="col-form-label" for="color_id">Color</label>
                                            {!! Form::select('color_id',$color,'',['class'=>'form-control selectpicker','data-live-search' => "true",'data-size' => "4",'id'=>'color_id']) !!}
                                            <label for="color_id" id="color_id-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="col-form-label" for="quality">Quality</label>
                                            {!! Form::text('quality','',['class'=>'form-control','id'=>'quality']) !!}
                                            <label for="quality" id="quality-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="col-form-label" for="shape_id">Shape</label>
                                            {!! Form::select('shape_id',$shape,'',['class'=>'form-control selectpicker','data-live-search' => "true",'data-size' => "4",'id'=>'shape_id']) !!}
                                            <label for="shape_id" id="shape_id-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="col-form-label" for="size">Size</label>
                                            {!! Form::text('size','',['class'=>'form-control','id'=>'size']) !!}
                                            <label for="size" id="size-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="col-form-label" for="metal_rate">Metal Rate</label>
                                            {!! Form::text('metal_rate','',['class'=>'form-control','id'=>'metal_rate']) !!}
                                            <label for="metal_rate" id="metal_rate-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="col-form-label" for="polish_charges">Polish Charges</label>
                                            {!! Form::text('polish_charges','',['class'=>'form-control','id'=>'polish_charges']) !!}
                                            <label for="polish_charges" id="polish_charges-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="col-form-label" for="making_charges">Making Charges</label>
                                            {!! Form::number('making_charges','',['class'=>'form-control','id'=>'making_charges']) !!}
                                            <label for="making_charges" id="making_charges-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="col-form-label" for="metal_value">Metal Value</label>
                                            {!! Form::text('metal_value','',['class'=>'form-control','id'=>'metal_value']) !!}
                                            <label for="metal_value" id="metal_value-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="col-form-label" for="diamond_value">Diamond Value</label>
                                            {!! Form::text('diamond_value','',['class'=>'form-control','id'=>'diamond_value']) !!}
                                            <label for="diamond_value" id="diamond_value-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="col-form-label" for="labour_value">Labour Value</label>
                                            {!! Form::text('labour_value','',['class'=>'form-control','id'=>'labour_value']) !!}
                                            <label for="labour_value" id="labour_value-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="col-form-label" for="diamond_handling_charge">Diamond Handling</label>
                                            {!! Form::text('diamond_handling_charge','',['class'=>'form-control','id'=>'diamond_handling_charge']) !!}
                                            <label for="diamond_handling_charge" id="diamond_handling_charge-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="col-form-label" for="total_value">Total Value</label>
                                            {!! Form::text('total_value','',['class'=>'form-control','id'=>'total_value']) !!}
                                            <label for="total_value" id="total_value-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="col-form-label" for="discount_value">Discount Value</label>
                                            {!! Form::text('discount_value','',['class'=>'form-control','id'=>'discount_value']) !!}
                                            <label for="discount_value" id="discount_value-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="col-form-label" for="final_value">Final Value</label>
                                            {!! Form::text('final_value','',['class'=>'form-control','id'=>'final_value']) !!}
                                            <label for="final_value" id="final_value-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="col-form-label" for="gst">Gst</label>
                                            {!! Form::text('gst','',['class'=>'form-control','id'=>'gst']) !!}
                                            <label for="gst" id="gst-error" generated="true" class="is-invalid" style="display:none"></label>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <label class="col-form-label" for="rate">Rate</label>
                                            {!! Form::select('rate',['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'],'',['class'=>'form-control selectpicker','id'=>'rate']) !!}
                                            <label for="rate" id="rate-error" generated="true" class="is-invalid" style="display:none"></label>
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
           url: "{{route('admin.subproduct.create.store')}}",
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
					window.location.replace("{{route('admin.subproduct')}}");
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
