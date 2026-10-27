
@extends('layouts.admin.app')

@section('content')
<main>
<div class="container-fluid site-width">
    <!-- START: Breadcrumbs-->
    <div class="row ">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0">{{ $title }}</h4></div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                   <li class="breadcrumb-item active"><a href="#">{{ $title }}</a></li>
                </ol>
            </div>
            <a href="{{ url('/admin/nrc_policy/add') }}" class="btn btn-primary">Add</a>
        </div>
    </div>
    <!-- END: Breadcrumbs-->

    <!-- START: Card Data-->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-header  justify-content-between align-items-center">                               
                    <h4 class="card-title">{{ $heading }}</h4> 
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="nrc" class="display table dataTable table-striped table-bordered" >
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Link</th>
                                    <th>Year</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div> 

        </div>                  
    </div>

</main>  


@endsection
