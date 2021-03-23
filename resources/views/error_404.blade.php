
@extends(Auth::guest()?'layouts.auth.master':'layouts.master')
@section('meta_page_title','404 Not Found | Tenantden')
@section('content')
<div class="content erro-page">
    <!-- Start Content-->
    <div class="container-fluid">
        
        <div class="row justify-content-center">
            <div class="col-lg-6 col-xl-4 mb-4">
                <div class="error-text-box">
                    <svg viewBox="0 0 600 200">
                        <!-- Symbol-->
                        <symbol id="s-text">
                            <text text-anchor="middle" x="50%" y="50%" dy=".35em">404!</text>
                        </symbol>
                        <!-- Duplicate symbols-->
                        <use class="text" xlink:href="#s-text"></use>
                        <use class="text" xlink:href="#s-text"></use>
                        <use class="text" xlink:href="#s-text"></use>
                        <use class="text" xlink:href="#s-text"></use>
                        <use class="text" xlink:href="#s-text"></use>
                    </svg>
                </div>
                <div class="text-center">
                    <h3 class="mt-0 mb-2">Whoops! Property not found </h3>
                    <p class="text-muted mb-3">It's looking like you may have taken a wrong turn. Don't worry...
                        it happens to the best of us. You might want to check your internet connection.
                        Here's a little tip that might help you get back on track.</p>

                    
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->

        
    </div> <!-- container -->

</div> <!-- content -->
@endsection