@extends('layouts.admin')

@section('tilte', 'Show Admin Profile')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <!-- show admin profile
                Left Col : 
                    row:
                        -  image 
                    row: 
                        - massage
                        - send mail
                Right Col: 
                    row:
                        - name
                        - mail
                        - mobile
                        - job
            -->

            <div class="row">
                <div class="col-4">
                    <div class="card">
    
                        <div class="card-body">
                            <div id="admin_photo">
                                <img class="d-block w-100" src="{{ $admin->image_path }}">
                            </div><!-- end of admin_photo -->
                        </div>
                    </div>
    
                </div>
    
                <div class="col-8">
                    <div class="card">
    
                        <div class="card-header">
                            <h1 class="card-title">@lang('site.profile')</h1>
                        </div>
                        <!-- end of .card-header -->
        
                        
                        <div class="card-body">
                            <div class="card-footer">
        
                                {{-- name --}}
                                <div class="row">
                                    <div class="col-md-4">
                                    @lang('site.name'):  
        
                                    </div>
                                    <div class="col-md-8">
                                        <p class="card-text">
                                            {{  $admin->name }}
            
                                        </p>
                                    </div>
                                </div>
        
                                
                                {{-- mail --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        @lang('site.email'):  
        
                                    </div>
                                    <div class="col-md-8">
                                        <p class="card-text">
                                         {{ $admin->email }}
                                        </p>
                                    </div>
                                </div>
                                
                                {{-- mobile --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        @lang('site.phone'):  
        
                                    </div>
                                    <div class="col-md-8">
                                        <p class="card-text">
                                            {{ $admin->phone }}
                                        </p>
                                    </div>
                                </div>
                                
                                
                                {{-- job --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        @lang('site.job'):  
        
                                    </div>
                                    <div class="col-md-8">
                                        <p class="card-text">
                                            {{ $admin->job }}
                                        </p>
                                    </div>
                                </div>
                                
        
                            </div><!-- end of card-footer -->
        
                        </div><!-- end of card-body -->
        
        
        
        
                    </div>
                    <!--end of show admin card -->
                </div>
            </div>
            
            

        </div>
        <!--end of content wrapper -->

    </div>
    <!--end of content -->

    <!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
