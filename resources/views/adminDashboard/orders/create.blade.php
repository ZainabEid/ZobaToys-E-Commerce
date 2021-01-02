@extends('layouts.admin')

@section('tilte', 'Choose the Client')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <!-- general form elements -->
            <div class="card card-primary">

                <div class="card-header with-border ">
                    <h3 class="card-title"><strong>@lang('site.choose-client')</strong></h3>
                </div>
                <!-- end of card-header -->

                @include('adminDashboard.includes.errors')

                <!-- form start -->
                <form method="POST" action="{{ route('adminDashboard.orders.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <!-- client select -->
                      <div class="form-group">
                        <label>@lang('site.client')</label>
                        <select name="client_id" class="form-control">
                            
                            <option value="">@lang('site.choose-client')</option>

                            @foreach ($clients as $client)
                            <option value="{{ $client->id }}" {{ old('client_id') == $client->id ?  'selected' : '' }}>{{ $client->name }}</option>
                            @endforeach
                          
                        </select>
                      </div>
                       
                       
                        
                      
                    </div><!-- end of card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">@lang('site.add-order')</button>
                    </div>
                </form>
            </div>
            <!--end of create new order card -->

        </div>
        <!--end of content wrapper -->
    </div>
    <!--end of content -->


    <!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
