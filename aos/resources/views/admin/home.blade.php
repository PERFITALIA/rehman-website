@extends('layouts.admin.app')
@section('content')
<!-- START: Main Content-->
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Dashboard</h4></div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 mt-3">
                <div class="card">                            
                    <div class="card-content">
                        <div class="card-body"> 
                            <div class="d-flex"> 
                                <div class="media-body align-self-center ">
                                    <span class="mb-0 h5 font-w-600">Composition of CSR Committee</span><br>
                                </div>
                            </div>
                            <a href="{{ url('/admin/compostion_of_csr_committee') }}" class="btn btn-primary btn-sm d-block">View</a>    
                        </div>
                    </div>
                </div>
            </div>    
            <div class="col-12 col-md-4 mt-3">
                <div class="card">                            
                    <div class="card-content">
                        <div class="card-body"> 
                            <div class="d-flex"> 
                                <div class="media-body align-self-center ">
                                    <span class="mb-0 h5 font-w-600">CSR Policy</span><br>
                                </div>
                            </div>
                            <a href="{{ url('/admin/csr_policy') }}" class="btn btn-primary btn-sm d-block">View</a>    
                        </div>
                    </div>
                </div>
            </div>    
            <div class="col-12 col-md-4 mt-3">
                <div class="card">                            
                    <div class="card-content">
                        <div class="card-body"> 
                            <div class="d-flex"> 
                                <div class="media-body align-self-center ">
                                    <span class="mb-0 h5 font-w-600">Vigil Mechanism Policy</span><br>
                                </div>
                            </div>
                            <a href="{{ url('/admin/vigil_mechanism_policy') }}" class="btn btn-primary btn-sm d-block">View</a>    
                        </div>
                    </div>
                </div>
            </div>    
            <div class="col-12 col-md-4 mt-3">
                <div class="card">                            
                    <div class="card-content">
                        <div class="card-body"> 
                            <div class="d-flex"> 
                                <div class="media-body align-self-center ">
                                    <span class="mb-0 h5 font-w-600">NRC Policy</span><br>
                                </div>
                            </div>
                            <a href="{{ url('/admin/nrc_policy') }}" class="btn btn-primary btn-sm d-block">View</a>    
                        </div>
                    </div>
                </div>
            </div>    
            <div class="col-12 col-md-4 mt-3">
                <div class="card">                            
                    <div class="card-content">
                        <div class="card-body"> 
                            <div class="d-flex"> 
                                <div class="media-body align-self-center ">
                                    <span class="mb-0 h5 font-w-600">Code of Independent Director</span><br>
                                </div>
                            </div>
                            <a href="{{ url('/admin/code_of_independent_director') }}" class="btn btn-primary btn-sm d-block">View</a>    
                        </div>
                    </div>
                </div>
            </div>    
            <div class="col-12 col-md-4 mt-3">
                <div class="card">                            
                    <div class="card-content">
                        <div class="card-body"> 
                            <div class="d-flex"> 
                                <div class="media-body align-self-center ">
                                    <span class="mb-0 h5 font-w-600">Notice of AGM</span><br>
                                </div>
                            </div>
                            <a href="{{ url('/admin/notice_of_agm') }}" class="btn btn-primary btn-sm d-block">View</a>    
                        </div>
                    </div>
                </div>
            </div>    
            <div class="col-12 col-md-4 mt-3">
                <div class="card">                            
                    <div class="card-content">
                        <div class="card-body"> 
                            <div class="d-flex"> 
                                <div class="media-body align-self-center ">
                                    <span class="mb-0 h5 font-w-600">Annual Return</span><br>
                                </div>
                            </div>
                            <a href="{{ url('/admin/annual_return') }}" class="btn btn-primary btn-sm d-block">View</a>    
                        </div>
                    </div>
                </div>
            </div>    
        </div> 
    </div>    
</main>
<!-- END: Content-->
@endsection
