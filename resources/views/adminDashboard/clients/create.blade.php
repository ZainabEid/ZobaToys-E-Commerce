@extends('layouts.admin')

@section('tilte', 'Add New clients')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <!-- general form elements -->
            <div class="card card-primary">

                <div class="card-header with-border ">
                    <h3 class="card-title">@lang('site.add-new-client')</h3>
                </div>
                <!-- end of card-header -->

                @include('adminDashboard.includes.errors')

                <!-- form start -->
                <form method="POST" action="{{ route('adminDashboard.clients.store') }}">
                    @csrf
                    <div class="card-body">

                        {{-- name --}}
                        <div class="form-group">
                            <label for="name">@lang('site.name')</label>
                            <input type="name" class="form-control" name="name" placeholder=" @lang('site.enter-name')"
                                value="{{ old('name') }}">
                        </div>

                        {{-- phone --}}     
                        @for ($i = 0; $i < 2; $i++)
                            <div class="form-group">
                                <label for="phone">@lang('site.phone')</label>
                                <input type="text" class="form-control" name="phone[]"
                                    placeholder=" @lang('site.enter-phone')">
                            </div>
                        @endfor

                     

                        {{-- address --}}
                        <div class="form-group">
                            <label for="address">@lang('site.address')</label>
                            <input type="address" class="form-control" name="address"
                                placeholder=" @lang('site.enter-address')" value="{{ old('address') }}">
                        </div>


                    </div><!-- end of card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">@lang('site.submit')</button>
                    </div>
                </form>
            </div>
            <!--end of create new client card -->

        </div>
        <!--end of content wrapper -->
    </div>
    <!--end of content -->


    <!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
