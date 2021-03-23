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
                <h4 class="page-title">Tenantden Homepage Settings</h4>
            </div> 
        </div>
    </div> 
    <div class="row"> 
        <div class="col-12">
            <div class="card application-card admin-about">
                <div class="card-body">
                	<div class="row">
                		<div class="banner-page-section col-md-12">             	
		                    <form id="homepage-about_us" name="homepage-about_us" enctype="multipart/form-data">
		                        <div class="settings-form">
		                        	<div class="row no-margin">
										<input type="hidden" name="poster_content" id="poster_content">
										<input type="hidden" name="video_content" id="video_content">
										<div class="mb-3 col-md-4">
		                                    <label class="col-form-label" for="total_experiance">Experience<span class="required">*</span></label>
											{!! Form::number('total_experiance',@$about_us->total_experiance,['class'=>'form-control required','id'=>'total_experiance','min'=>'0','step'=>'1','placeholder'=>'Enter Total Experiance']) !!}
											<label for="total_experiance" id="total_experiance-error" generated="true" class="is-invalid" style="display:none"></label>
										</div>
										<div class="mb-3 col-md-4">
		                                    <label class="col-form-label" for="total_happy_customer">Happy Customer<span class="required">*</span></label>
											{!! Form::number('total_happy_customer',@$about_us->total_happy_customer,['class'=>'form-control required','id'=>'total_happy_customer','placeholder'=>'Enter Total Happy Customer']) !!}
											<label for="total_happy_customer" id="total_happy_customer-error" generated="true" class="is-invalid" style="display:none"></label>
										</div>
										<div class="mb-3 col-md-4">
		                                    <label class="col-form-label" for="total_real_estate_agent">Real Estate Agent<span class="required">*</span></label>
											{!! Form::number('total_real_estate_agent',@$about_us->total_real_estate_agent,['class'=>'form-control required','id'=>'total_real_estate_agent','placeholder'=>'Enter Total Real State Agent']) !!}
											<label for="total_real_estate_agent" id="total_real_estate_agent-error" generated="true" class="is-invalid" style="display:none"></label>
		                                </div>
										<div class="mb-3 col-md-12">
		                            	    <label class="col-form-label" for="text">About Text<span class="required">*</span></label>
											<button type="button" class="image-guide btn btn-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Put upto 450 characters, otherwise design will not look good in frontend!"><i class="mdi mdi-information-outline"></i></button>
											<textarea class="form-control" name="text" id="text">{{@$about_us->text}}</textarea>
											<label for="text" id="text-error" generated="true" class="is-invalid" style="display:none"></label>
		                            	</div>
										<div class="mb-3 col-md-6">
		                                    <label class="col-form-label" for="text">Thumbnail Upload<span class="required">*</span></label>
											<button type="button" class="image-guide btn btn-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="The Image dimensions should be 580*506 for better preview!"><i class="mdi mdi-information-outline"></i></button>
											<input id="poster" class="" type="file" name="poster" accept="image/jpeg, image/png">
											<label for="poster_content" id="poster_content-error" generated="true" class="is-invalid" style="display:none"></label>
											<ul class="warning-listing">
                                                <p><strong>Note:</strong></p>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>The Image dimensions should be <strong>580*506</strong> for better preview!!</li>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>The Image extension should be <strong>png,jpg,jpeg and less than 5 MB!!</strong></li>
                                            </ul>
										</div>
										<div class="mb-3 col-md-6">
		                                  	<label class="col-form-label" for="text">Video Upload<span class="required">*</span></label>
                                      		<input id="video" type="file" name="video" accept="video/*">
											<label for="video_content" id="video_content-error" generated="true" class="is-invalid" style="display:none"></label>
											<ul class="warning-listing">
                                                <p><strong>Note:</strong></p>
                                                <li><i class="fa fa-check" aria-hidden="true"></i>The Video extension should be <strong>mp4 and less than 10 MB!!</strong></li>
                                            </ul>
										</div>
										<div class="mb-3 col-md-6">
		                                  	<label class="col-form-label" for="text">Video<span class="required">*</span></label>
											<div id="video_container">
												@if(@$about_us->poster_url)         
            							        @php
            							            $image = 'storage/'.@$about_us->poster_url;
            							        @endphp        
            							        @endif
	                    						<video id="video_click" width="400" height="200" poster="{{ URL::asset($image)}}"  class="video-bg"> 
	                    							@if(@$about_us->video_url)         
	            							        @php
	            							            $video = 'storage/'.@$about_us->video_url;
	            							        @endphp        
	            							        @endif
													<source src="{{ URL::asset($video)}}" id="video_url_section" type="video/mp4"> 
												</video>
                    							<button type="button" id="play_button"><i class="mdi mdi-play-circle-outline"></i></button>
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
var playButton = document.getElementById("play_button");
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
	$('#homepage-about_us').validate({
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
	        l = Ladda.create( document.querySelector('#homepage-about_us .btn-submit') );
	        l.start();
			for (instance in CKEDITOR.instances) {
		        CKEDITOR.instances[instance].updateElement();
		    }
	        $.ajax({
	            url: "{{route('admin.aboutUs.store')}}",
	            method: "POST",
	            dataType: 'json',
	            data: $("#homepage-about_us").serialize(),
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
	$('#video').FancyFileUpload({
        maxNumberOfFiles: 1,
        fileupload: {
            maxChunkSize: 10000000,
            retries : 1,
        },
		accept :['mp4'],
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
				var video = document.getElementById('video_click');
                reader.onload = function(){
                    $('#video_url_section').attr('src',reader.result);
                    $("#video_content").val(reader.result);
					video.load();
					video.play();
					playButton.innerHTML = "<i class='mdi mdi-pause-circle-outline'></i>";
                }
                reader.readAsDataURL(file);
                $(".ff_fileupload_queued").first().find('.ff_fileupload_remove_file').trigger('click');
            }
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
                    $('#video_click').attr('poster',reader.result);
                    $("#poster_content").val(reader.result);
                }
                reader.readAsDataURL(file);
                $(".ff_fileupload_queued").first().find('.ff_fileupload_remove_file').trigger('click');
            }
        }
    });
});


playButton.addEventListener("click", function() {
		
  	if (video_click.paused == true) {
  	  // Play the video
  	  	video_click.play();

  	  // Update the button text to 'Pause'
  	  	playButton.innerHTML = "<i class='mdi mdi-pause-circle-outline'></i>";
  	} else {
  	  // Pause the video
  	 	 video_click.pause();
		playButton.innerHTML = "<i class='mdi mdi-play-circle-outline'></i>";
  	}
});
</script>
@endsection 