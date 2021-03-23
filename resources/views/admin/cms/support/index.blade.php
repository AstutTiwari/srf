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
                        <a href="{{route('admin.cms.support.contact-box-first')}}" class="dashboard-card card-box">
                            <div class="row">
                                <div class="col-12">
                                    <div class="avatar-lg">
                                        <img src="{{ URL::asset('images/slide.png') }}"  />
                                    </div>
                                    <div class="text-left">
                                        <p>Contact Box 1</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <a href="{{route('admin.cms.support.contact-box-second')}}" class="dashboard-card card-box">
                            <div class="row">
                                <div class="col-12">
                                    <div class="avatar-lg">
                                        <img src="{{ URL::asset('images/share.png') }}"  />
                                    </div>
                                    <div class="text-left">
                                        <p>Contact Box 2</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <a href="{{route('admin.cms.support.contacts')}}" class="dashboard-card card-box">
                            <div class="row">
                                <div class="col-12">
                                    <div class="avatar-lg">
                                        <img src="{{ URL::asset('images/question.png') }}"  />
                                    </div>
                                    <div class="text-left">
                                        <p>Support Contacts</p>
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
