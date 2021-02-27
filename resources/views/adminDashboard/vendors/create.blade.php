@extends('layouts.admin')

@section('tilte', 'Add New Vendors')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <!-- general form elements -->
            <div class="card card-primary">

                <div class="card-header with-border ">
                    <h3 class="card-title">@lang('site.add-new-vendor')</h3>
                </div>
                <!-- end of card-header -->

                @include('adminDashboard.includes.errors')

                <!-- form start -->
                <form method="POST" action="{{ route('adminDashboard.vendors.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="card-body">

                        {{-- name --}}
                        <div class="form-group">
                            <label for="name">@lang('site.name')</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder=" @lang('site.enter-name')" value="{{ old('name') }}">
                        </div>

                         {{-- about --}}
                         <div class="form-group">
                            <label for="about">@lang('site.about')</label>
                            <input type="text" class="form-control" name="about" id="about"
                                placeholder="@lang('site.about')" value="{{ old('about') }}">
                        </div>

                         {{-- Logo --}}
                         <div class="form-group">
                            <label for="logo">@lang('site.logo')</label>

                            <div class="custom-file">
                                <input type="file" class="custom-file-input logo" id="logo" name="logo">
                                <label class="custom-file-label" for="logo"> @lang('site.choose-logo') </label>
                            </div>

                        </div>

                         {{-- address --}}
                         <div class="form-group">
                            <label for="address">@lang('site.address')</label>
                            <input type="text" class="form-control" name="address" id="address"
                                placeholder="@lang('site.address')" value="{{ old('address') }}">
                        </div>

                        {{-- phone --}}
                        <div class="form-group">
                            <label for="phone">@lang('site.phone')</label>
                            <input type="phone" class="form-control" name="phone" id="phone"
                                placeholder="@lang('site.phone')" value="{{ old('phone') }}">
                        </div>

                        {{-- select contact person --}}
                      <div class="form-group">
                        <label for="admin_id">@lang('site.contact-person')</label>
                        <select name="admin_id" class="form-control">
                            
                            <option value="">@lang('site.choose-contact-person')</option>

                            @foreach ($admins as $admin)
                            <option value="{{ $admin->id }}" {{ old('admin_id') == $admin->id ?  'selected' : '' }}> 
                                <div>
                                    <img src="{{ $admin->image_path}}" style="height:35px;">
                                    {{ $admin->name }}
                                </div>
                              
                            </option>
                            @endforeach
                        </select> 
                        <a href="{{route('admin.create') }}"> @lang('site.create-new-admin')</a>
                      </div>
                     

                    </div><!-- end of card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">@lang('site.submit')</button>
                    </div>
                </form>
            </div>
            <!--end of create new vendor card -->

        </div>
        <!--end of content wrapper -->
    </div>
    <!--end of content -->


    <!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
