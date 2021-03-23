
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
                    <div class="col-12 col-md-6 col-lg-4">
                        <a href="{{route('admin.service.genral')}}" class="dashboard-card card-box">
                            <div class="row">    
                                <div class="col-12">
                                    <div class="avatar-lg">
                                        <img src="{{ URL::asset('images/profile.png') }}"  />
                                    </div>
                                    <div class="text-left">
                                        <p>General</p>
                                    </div> 
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <a href="{{route('admin.service.card')}}" class="dashboard-card card-box">
                            <div class="row">    
                                <div class="col-12">
                                    <div class="avatar-lg">
                                        <img src="{{ URL::asset('images/profile.png') }}"  />
                                    </div>
                                    <div class="text-left">
                                        <p>Card list</p>
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