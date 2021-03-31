
  @extends('layouts.master')
  @section('custom-css')
  <link href="{{ URL::asset('css/dashboard-inner.css') }}" rel="stylesheet" type="text/css" />
  @endsection
  @section('meta_page_title','Admin | Tenantden')
  @section('content')
  <div class="content">
        <div class="dashboard-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <a href="{{route('admin.cms.banner')}}" class="dashboard-card card-box">
                            <div class="row">    
                                <div class="col-12">
                                    <div class="avatar-lg">
                                        <img src="{{ URL::asset('images/slide.png') }}"  />
                                    </div>
                                    <div class="text-left">
                                        <p>Banner Manage </p>
                                    </div> 
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <a href="{{route('admin.cms.social')}}" class="dashboard-card card-box">
                            <div class="row">    
                                <div class="col-12">
                                    <div class="avatar-lg">
                                        <img src="{{ URL::asset('images/share.png') }}"  />
                                    </div>
                                    <div class="text-left">
                                        <p>Social Manage </p>
                                    </div> 
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <a href="{{route('admin.cms.product.banner')}}" class="dashboard-card card-box">
                            <div class="row">    
                                <div class="col-12">
                                    <div class="avatar-lg">
                                        <img src="{{ URL::asset('images/question.png') }}"  />
                                    </div>
                                    <div class="text-left">
                                        <p>Product Banner </p>
                                    </div> 
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <a href="#" class="dashboard-card card-box">
                            <div class="row">    
                                <div class="col-12">
                                    <div class="avatar-lg">
                                        <img src="{{ URL::asset('images/book.png') }}"  />
                                    </div>
                                    <div class="text-left">
                                        <p>Managing Instruction</p>
                                    </div> 
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <a href="#" class="dashboard-card card-box">
                            <div class="row">    
                                <div class="col-12">
                                    <div class="avatar-lg">
                                        <img src="{{ URL::asset('images/book.png') }}"  />
                                    </div>
                                    <div class="text-left">
                                        <p>Service Instruction</p>
                                    </div> 
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <a href="{{ route('admin.contact')}}" class="dashboard-card card-box">
                            <div class="row">    
                                <div class="col-12">
                                    <div class="avatar-lg">
                                        <img src="{{ URL::asset('images/contact-us.png') }}"  />
                                    </div>
                                    <div class="text-left">
                                        <p>Contact us</p>
                                    </div> 
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <a href="#" class="dashboard-card card-box">
                            <div class="row">    
                                <div class="col-12">
                                    <div class="avatar-lg">
                                        <img src="{{ URL::asset('images/customer-satisfaction.png') }}"  />
                                    </div>
                                    <div class="text-left">
                                        <p>Testimonial</p>
                                    </div> 
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <a href="#" class="dashboard-card card-box">
                            <div class="row">    
                                <div class="col-12">
                                    <div class="avatar-lg">
                                        <img src="{{ URL::asset('images/ribbon.png') }}"  />
                                    </div>
                                    <div class="text-left">
                                        <p>Trusted By</p>
                                    </div> 
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>  
  @endsection
  @section('plugin-script')

  @endsection