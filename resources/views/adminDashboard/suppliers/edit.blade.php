@extends('layouts.admin')

@section('tilte', 'Edit suppliers')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <!-- general form elements -->
            <div class="card card-primary">

                <div class="card-header with-border ">
                    <h3 class="card-title">@lang('site.edit-supplier')</h3>
                </div>
                <!-- end of card-header -->

                @include('adminDashboard.includes.errors')

                <!-- form start -->
                <form method="POST" action="{{ route('adminDashboard.suppliers.update', $supplier->id) }}">
                    @csrf
                    @method('put')
                    <div class="card-body">

                        {{-- name --}}
                        <div class="form-group">
                            <label for="name">@lang('site.name')</label>
                            <input type="name" class="form-control" name="name" placeholder=" @lang('site.enter-name')"
                                value="{{ $supplier->name }}">
                        </div>
                        
                        {{-- phone --}}
                        @for ($i = 0; $i < 2; $i++)
                            <div class="form-group">
                                <label for="phone">@lang('site.phone')</label>
                                <input type="text" class="form-control" name="phone[]" 
                                    value="{{ $supplier->phone[$i] ?? ''}}"
                                    placeholder=" @lang('site.enter-phone')">
                            </div>
                        @endfor

                        {{-- address --}}
                        <div class="form-group">
                            <label for="address">@lang('site.address')</label>
                            <input type="address" class="form-control" name="address"
                                placeholder=" @lang('site.enter-address')" value="{{ $supplier->address }}">
                        </div>

                        
                        {{-- supplies --}}
                        <div class="form-group">
                            <label for="supplies">@lang('site.supplies')</label>
                            <input type="supplies" class="form-control" name="supplies"
                                placeholder=" @lang('site.enter-supplies')" value="{{ $supplier->supplies}}">
                        </div>

                        
                        {{-- description --}}
                        <div class="form-group">
                            <label for="description">@lang('site.description')</label>
                            <input type="description" class="form-control" name="description"
                                placeholder=" @lang('site.enter-description')" value="{{ $supplier->description }}">
                        </div>

                    </div><!-- end of card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-edit">@lang('site.edit')</button>
                    </div>
                </form>
            </div>
            <!--end of create new supplier card -->

        </div>
        <!--end of content wrapper -->
    </div>
    <!--end of content -->


    <!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
