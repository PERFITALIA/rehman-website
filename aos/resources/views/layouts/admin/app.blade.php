<!--Start Head-->
@include('layouts.admin.head')
<!--End Head-->

<!-- START: Header-->
@include('layouts.admin.header')

<!--End Header-->


<!-- START: Main Menu-->
<div class="sidebar">
    <div class="site-width">
        <!-- START: Menu-->
        @include('layouts.admin.sidebar')
        <!-- END: Menu-->
        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0 ml-auto">
            <li class="breadcrumb-item"><a href="#">Application</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
</div>
<!-- END: Main Menu-->
@yield('content')

<!--Start Foot -->
@include('layouts.admin.foot')
<!--End Foot -->


<!-- Start Footer -->

@include('layouts.admin.footer')
<!-- End Footer-->