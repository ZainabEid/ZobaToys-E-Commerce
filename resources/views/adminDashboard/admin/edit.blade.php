@extends('layouts.admin')

@section('tilte', 'Edit Admins')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <!-- general form elements -->
            <div class="card card-primary">

                <div class="card-header with-border ">
                    <h3 class="card-title">@lang('site.add-new-admin')</h3>
                </div>
                <!-- end of card-header -->

                @include('adminDashboard.includes.errors')

                <!-- form start -->
                <form method="POST" action="{{ route('adminDashboard.admin.update', $admin->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        {{-- name --}}
                        <div class="form-group">
                            <label for="name">@lang('site.name')</label>
                            <input type="name" class="form-control" name="name" id="name"
                                placeholder=" @lang('site.enter-name')" value="{{ old('name') ?? $admin->name  }}">
                        </div>
                        {{-- email --}}
                        <div class="form-group">
                            <label for="email">@lang('site.email')</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="@lang('site.enter-email')" value="{{ old('email') ?? $admin->email }}">
                        </div>
                        {{-- phone --}}
                        <div class="form-group">
                            <label for="phone">@lang('site.phone')</label>
                            <input type="phone" class="form-control" name="phone" id="phone"
                                placeholder="@lang('site.phone')" value="{{ old('phone') ??  $admin->phone}}">
                        </div>
                        
                        {{-- photo --}}
                        <div class="form-group">
                            <label for="photo">@lang('site.photo')</label>

                            <div class="custom-file">
                                <input type="file" class="custom-file-input photo" id="photo" name="photo">
                                <label class="custom-file-label" for="photo"> @lang('site.choose-photo') </label>
                            </div>

                        </div>

                        <div class="form-group">
                            <img src="{{ $admin->image_path }}" alt="image"
                                class="rounded-circle img-thumbnail photo-preview " id="photo-preview">
                        </div>

                       
                    </div><!-- end of card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-edit">@lang('site.edit')</button>
                    </div>
                </form>
            </div>
            <!--end of create new admin card -->

        </div><!--end of content wrapper -->
    </div><!--end of content -->

    
    <!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
