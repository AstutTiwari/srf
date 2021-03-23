
  @extends('layouts.master')
  @section('custom-css')
  <link href="{{ URL::asset('css/dashboard-inner.css') }}" rel="stylesheet" type="text/css" />
  @endsection
  @section('meta_page_title','Admin | ShriRam')
  @section('content')
  <div class="content">
        <div class="dashboard-main admin-dashboard">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <a href="#" class="dashboard-card card-box">
                            <div class="row">    
                                <div class="col-12">
                                    <div class="avatar-lg">
                                        <img src="{{ URL::asset('images/profile.png') }}"  />
                                    </div>
                                    <div class="text-left">
                                        <p>User Management</p>
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
                                       <img src="{{ URL::asset('images/leases-big.png') }}"  />
                                    </div>
                                    <div class="text-left">
                                        <p>Total Ring : <span class="ml-2"></span></p>
                                    </div>
                                </div> 
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <a href="javascript:void(0);"  class="dashboard-card card-box" style="cursor: text;">
                            <div class="row">
                                <div class="col-12">
                                    <div class="avatar-lg">
                                       <img src="{{ URL::asset('images/comnication.png') }}"  />
                                    </div>
                                    <div class="text-left">
                                        <p>Total Ear Ring : </p>
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
                                       <img src="{{ URL::asset('images/comnication.png') }}"  />
                                    </div>
                                    <div class="text-left">
                                        <p>Today Order : <span class="ml-2"></span></p>
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
                                       <img src="{{ URL::asset('images/comnication.png') }}"  />
                                    </div>
                                    <div class="text-left">
                                        <p>Total Profit : <span class="ml-2"></span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <a href="javascript:void(0);" class="dashboard-card card-box" style="cursor: text;">
                            <div class="row">
                                <div class="col-12">
                                    <div class="avatar-lg">
                                       <img src="{{ URL::asset('images/pay.png') }}"  />
                                    </div>
                                    <div class="text-left">
                                        <p>Total Revenue : <span class="ml-2"></span></p>
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
                                       <img src="{{ URL::asset('images/mail.png') }}"  />
                                    </div>
                                    <div class="text-left">
                                        <p>Compose Mail</p>
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
                                       <img src="{{ URL::asset('images/file-up.png') }}"  />
                                    </div>
                                    <div class="text-left">
                                        <p>Document</p>
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