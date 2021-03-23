@extends('layouts.auth.master')
@section('custom-css')
<link href="{{ URL::asset('/css/custom.css') }}" rel="stylesheet" type="text/css" />
@endsection 
@section('meta_page_title','Register | Tenantden')
@section('content')

<div class="auth-fluid">
    <div class="auth-fluid-form-box">
        <div class="align-items-center d-flex h-100">
            <div class="card-body">
                <div class="row">
                    <div class="title-top">
                        <h2 class="mt-0">Register Here</h2>
                        <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute</p>
                    </div>
                </div>
                <form method="POST" action="{{route('register')}}" id="Signup" >
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <label for="firstname">First Name<span class="required">*</span></label>
                            <input class="form-control required @error('firstname') is-invalid @enderror" name="firstname" type="text" id="firstname" value="{{ old('firstname') }}"  placeholder="Enter your first name" >
                            <label id="firstname-error" class="is-invalid" for="firstname" style="@error('firstname')display: block @enderror">@error('firstname'){{ $message }}@enderror</label>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name<span class="required">*</span></label>
                            <input class="form-control required  @error('lastname') is-invalid @enderror" name="lastname" type="text" id="lastname" value="{{ old('lastname') }}" placeholder="Enter your last name" >
                            <label id="lastname-error" class="is-invalid" for="lastname" style="@error('lastname')display: block @enderror">@error('lastname'){{ $message }}@enderror</label>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="email">Email address<span class="required">*</span></label>
                            <input class="form-control required email @error('email') is-invalid @enderror" name="email" type="email" id="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Enter your email">
                            <label id="email-error" class="is-invalid" for="email" style="@error('email')display: block @enderror">@error('email'){{ $message }}@enderror</label>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number<span class="required">*</span></label>
                            <input class="form-control required @error('phone') is-invalid @enderror" name="phone" type="text" id="phone" placeholder="Enter your phone number" >
                            <label id="phone-error" class="is-invalid" for="phone" style="@error('phone')display: block @enderror">@error('phone'){{ $message }}@enderror</label>
                        </div>
                    </div> 
                    <div class="row">                           
                        <div class="form-group">
                            <label for="password">Password<span class="required">*</span></label>
                            <div class="input-group input-group-merge">
                                <input type="password" name="password" id="password" class="form-control required @error('password') is-invalid @enderror" placeholder="Enter your password">
                                <div class="input-group-append" data-password="false">
                                    <div class="input-group-text">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </div>
                            <label id="password-error" class="is-invalid" for="password" style="@error('password')display: block @enderror">@error('password'){{ $message }}@enderror</label>
                        </div>
                        <div class="form-group">
                              <label for="password-confirm" class="control-label">Confirm Password</label>
                              <input id="password-confirm" type="password" name="password_confirmation" placeholder="Enter your password again" class="form-control required" name="password_confirmation" required="required">
                              <label for="password-confirm" id="password-confirm-error" generated="true" class="error" style="display:none;"></label>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-center">
                        <button  type="submit" class="btn btn-primary waves-effect waves-light btn-block btn-submit" data-style="slide-down"> Sign Up </button>
                    </div>
                </form>
                <footer class="footer footer-alt">
                    <p class="text-muted">Already have account? <a href="{{route('login')}}" class="text-muted ml-1"><b>Sign In</b></a></p>
                </footer>

            </div>
        </div>
    </div>
    <div class="auth-fluid-right text-center d-none">
        <div class="logo-center-right">
            {{--<a href="{{ route('home.index') }}" class="logo text-center">
                <span class="logo-lg">
                    <img src="{{ URL::asset('images/only-white.png')}}" alt="" height="22">
                </span>
            </a>--}}
            <!-- <h3 class="logo-title">TenantDen</h3> -->
        </div>
            <div class="col-12">
                <div class="steps-all">
                    <h2 class="main-title">Easy, fast, powerful and FREE* for landlords!</h2>
                    <h3 class="title-sm"><i class="mdi mdi-format-quote-open"></i>Being a landlord is about to get way better.
                    <i class="mdi mdi-format-quote-close"></i></h3>
                    <div class="steps" >
                        <div class="left-steps">
                            <i class="mdi mdi-file-tree"></i>
                        </div>
                        <div class="right-steps">
                            <h4 class="inner-step-title">Rental Marketing</h4>
                            <p class="step-content">At the click of a button, fill your property faster by marketing it on dozens of rental listing websites for free.</p>
                        </div>
                    </div>
                    <div class="steps" >
                        <div class="left-steps">
                            <i class="mdi mdi-desktop-mac"></i>                                    
                        </div>
                        <div class="right-steps">
                            <h4 class="inner-step-title">Online Application</h4>
                            <p class="step-content">Collect renter applications with ease. Interested renters can apply to your property online in minutes.</p>
                        </div>
                    </div>
                    <div class="steps" > 
                        <div class="left-steps">
                            <i class="mdi mdi-account-search"></i>
                        </div>
                        <div class="right-steps">
                            <h4 class="inner-step-title">Tenant Screening</h4>
                            <p class="step-content">Lease with confidence by knowing a renter's credit score, criminal history, past evictions, and more.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="text-small Condition-text d-none"><span>*</span>Free for 60 days then $2.00 per unit/per month</p>
</div>
@endsection
@section('plugin-script')

@endsection
@section('custom-script')
<script type="text/javascript">
 $(document).ready(function() {
    $("#Signup").validate({
        errorClass: 'is-invalid',
        submitHandler: function(form) {
            var l = Ladda.create( document.querySelector('#Signup .btn-submit' ) );
            l.start();
            return true;
        }
    });
 });
</script>
@endsection