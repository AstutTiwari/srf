@extends('layouts.auth.auth_master')
@section('custom-css')
<link href="{{ URL::asset('/css/custom.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('meta_page_title','Login | ShriRamJewellers')
@section('content')
<div class="auth-fluid">
    <div class="auth-fluid-form-box">
        <div class="align-items-center d-flex h-100"> 
            <div class="card-body">
                <h2 class="mt-0">Sign In</h2>
                <p class="text-muted mb-4">Enter your email address and password to access account.</p>
                <form method="POST" action="{{ route('login') }}" id="login">
                    @csrf
                    <div class="form-group full-width-group">
                        <label for="email">Email address<span class="required">*</span></label>
                        <input class="form-control required @error('email') is-invalid @enderror" name="email" type="email" id="email" placeholder="Enter your email">
                        <label id="email-error" class="is-invalid" for="email" style="@error('email')display: block @enderror">@error('email'){{ $message }}@enderror</label>
                    </div>
                    <div class="form-group full-width-group">
                        <a href="{!! route('password.request') !!}" class="text-muted float-right"><small>Forgot your password?</small></a>
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
                    <div class="form-group mb-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-center">
                        <button class="btn btn-primary btn-block btn-submit" data-style="slide-down" type="submit">Sign In </button>
                    </div>
                </form>
                <footer class="footer footer-alt">
                    <p class="text-muted">Don't have an account? <a href="register" class="text-muted ml-1"><b>Sign Up</b></a></p>
                </footer>
            </div>
        </div>
    </div>
    <div class="auth-fluid-right text-center d-none">
        <div class="logo-center-right">
            <a href="{{ route('home.index') }}" class="logo text-center">
                <span class="logo-lg">
                    <img src="{{ URL::asset('images/only-white.png')}}" alt="" height="22">
                </span>
            </a>
            <!-- <h3 class="logo-title">TenantDen</h3> -->
        </div>
        <h2 class="main-title">Easy, fast, powerful and FREE* for landlords!</h2>
        <h3 class="title-sm">
            <i class="mdi mdi-format-quote-open"></i>Being a landlord is about to get way better.
            <i class="mdi mdi-format-quote-close"></i>
        </h3>       
    </div>
    <p class="text-small Condition-text d-none"><span>*</span>Free for 60 days then $2.00 per unit/per month</p>
</div>
@endsection
@section('custom-script')
<script type="text/javascript">
    $("#login").validate({
        errorClass: 'is-invalid',
        submitHandler: function(form) {
            var l = Ladda.create( document.querySelector( '#login .btn-submit' ) );
            l.start();
            return true;
        }
    })
</script>
@endsection