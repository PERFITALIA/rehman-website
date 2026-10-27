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
                 <a href="{{ url('/admin/notice_of_agm/') }}" class="btn btn-success">Back</a><br>
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
                                    <form method="POST" id="add_notice" action="{{ route('NoticePost') }}">@csrf
                                        
                                      
                                        <div class="form-group row">
                                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Title" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="link" class="col-sm-2 col-form-label">Link</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="file" id="file">
                                            </div>
                                        </div>
                                        
                                            
                                        <div class="form-group row">
                                            <label for="years" class="col-sm-2 col-form-label">Year</label>
                                            <div class="col-sm-10">
                                                <select name="years" id="year" class="form-control">
                                                    @foreach ($yearData as $new)
                                                        <option>{{$new->year}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        
                                       <br>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Submit</button>  
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