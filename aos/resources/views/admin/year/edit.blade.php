@extends('layouts.admin.app')
@section('content')
<main>
    <div class="container-fluid site-width">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">{{ $title}}</h4></div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active"><a href="#">{{ $title}}</a></li>
                    </ol>
                </div>
                 <a href="{{ url('/admin/year/') }}" class="btn btn-success">Back</a><br>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <div id="cmn-respns"></div>
        <br>
        <!-- START: Card Data-->
        <div class="row">
            <div class="col-12 col-lg-12 mt-12">
                <div class="card">
                    <div class="card-header">                               
                        <h4 class="card-title">{{ $heading}}</h4>                                
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">                                           
                                <div class="col-12">
                                    @if(session()->has('message'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Details Update Successfull.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                    @endif

                                    <form method="POST" action="http://127.0.0.1:8000/admin/year/edit/{{ $year[0]->id }}" enctype="multipart/form-data">@csrf
                                        
                                        
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Year</label>
                                            <div class="col-sm-10">
                                                
                                                <input type="text" class="form-control" name="name" id="name" value="{{$year[0]->year}}" placeholder="Year">
                                            </div>
                                        </div>
                                        
                                        {{-- <input type="hidden" name="job_id" id="job_id" value="{{$year[0]->id}}">
                                        <div class="form-group row"> --}}
                                            <div class="col-sm-10">
                                                <input type="submit" class="btn btn-primary" value="Submit">  
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            
                </div>
            </div>
        </div>
        <!-- END: Card DATA-->
    </div>
</main>

@endsection