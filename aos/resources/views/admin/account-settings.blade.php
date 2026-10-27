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
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <div id="cmn-respns"></div>

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
                                    @if(session()->has('error'))
                                        <span class="alert alert-danger">
                                            <strong>{{ session()->get('error') }}</strong>
                                        </span>
                                    @endif
                                    @if(session()->has('success'))
                                        <span class="alert alert-success">
                                            <strong>{{ session()->get('success') }}</strong>
                                        </span>
                                    @endif

                                    <form method="POST"  action="{{ route('change_password') }}" enctype="multipart/form-data">@csrf
                                        
                                        
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Current Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" id="current_password" placeholder="Old Password" required>
                                                 @error('current_password')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror
                                            </div>
                                           
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">New Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="New Password" required>
                                                @error('password')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror
                                            </div>
                                            
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Confirm Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
                                                @error('password_confirmation')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror
                                            </div>
                                            
                                        </div>                                                
                                        
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
                <div class="card">
                  <div class="card-header">                               
                      <h4 class="card-title">Password For Download Documents</h4>                                
                  </div>
                  <div class="card-content">
                      <div class="card-body">
                          <div class="row">                                           
                              <div class="col-12">
                                  @if(session()->has('error'))
                                      <span class="alert alert-danger">
                                          <strong>{{ session()->get('error') }}</strong>
                                      </span>
                                  @endif
                                  @if(session()->has('success'))
                                      <span class="alert alert-success">
                                          <strong>{{ session()->get('success') }}</strong>
                                      </span>
                                  @endif

                                  <form method="POST"  action="{{ route('change_password_frontend') }}" enctype="multipart/form-data">@csrf
                                      
                                      
                                      <div class="form-group row">
                                                                                    
                                         
                                      </div>
                                      <div class="form-group row">
                                          <label for="email" class="col-sm-2 col-form-label">New Password</label>
                                          <div class="col-sm-10">
                                              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_doc" id="password" placeholder="New Password" required>
                                              @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                              @enderror
                                          </div>
                                          
                                      </div>
                                      <div class="form-group row">
                                          <label for="email" class="col-sm-2 col-form-label">Confirm Password</label>
                                          <div class="col-sm-10">
                                              <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation_doc" id="password_confirmation" placeholder="Confirm Password" required>
                                              @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                              @enderror
                                          </div>
                                          
                                      </div>                                                
                                      
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