@extends('layouts.admin')

@section('tilte', 'Add New Admins')

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
                <form method="POST" action="{{ route('adminDashboard.admin.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        {{-- name --}}
                        <div class="form-group">
                            <label for="name">@lang('site.name')</label>
                            <input type="name" class="form-control" name="name" id="name"
                                placeholder=" @lang('site.enter-name')" value="{{ old('name') }}">
                        </div>
                        {{-- email --}}
                        <div class="form-group">
                            <label for="email">@lang('site.email')</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="@lang('site.enter-email')" value="{{ old('email') }}">
                        </div>
                        {{-- phone --}}
                        <div class="form-group">
                            <label for="phone">@lang('site.phone')</label>
                            <input type="phone" class="form-control" name="phone" id="phone"
                                placeholder="@lang('site.phone')" value="{{ old('phone') }}">
                        </div>
                        {{-- password --}}
                        <div class="form-group">
                            <label for="password">@lang('site.password')</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="@lang('site.password')" value="{{ old('password') }}">
                        </div>

                        {{-- password_confirmation --}}
                        <div class="form-group">
                            <label for="password_confirmation">@lang('site.password_confirmation')</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                id="password_confirmation" placeholder="@lang('site.password')"
                                value="{{ old('password_confirmation') }}">
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
                            <img src="{{ asset('public/uploads/admin_images/default.jpg') }}" alt="image"
                                class="rounded-circle img-thumbnail photo-preview " id="photo-preview">
                        </div>


                        <!-- 
                                    1. website admin -> edit shop pages
                                    2. vendor admin -> access own his own data
                                    3. zoba-toys admin -> access production line


                                -->

                        {{-- permission tabs --}}
                        <div class="form-group card-tabs">

                            <label>@lang('site.permissions')</label>


                            <div class="form-check">

                                @foreach ($roles as $role_name => $role)
                                <ul class="nav">
                                    <li>
                                        <input type="radio" class="form-check-input" name="role" value="{{ $role }}">

                                    <label class="form-check-label">
                                        @lang('site.'.$role_name)
                                    </label>
                                    </li>
                                </ul>
                                    

                                @endforeach

                            </div>


                            <!-- {{-- old permision assignment --}}
                                    <div>

                                    @php
                                        $models = ['admins', 'vendors', 'wraps', 'categories', 'products', 'clients', 'orders', 'suppliers', 'purchases', 'supplies', 'groups', 'production_cycles'];
                                        $maps = ['read', 'create', 'update', 'delete'];
                                    @endphp

                                    {{-- nav tabs --}}
                                    <ul class="nav nav-tabs" role="tablist">

                                        @foreach ($models as $index => $model)
                                            <li class="nav-item">
                                                <a class="nav-link {{ $index == 0 ? 'active' : '' }}" data-toggle="tab"
                                                    href="#{{ $model }}" role="tab" aria-selected="true">@lang('site.'.$model)</a>
                                            </li>
                                        @endforeach

                                    </ul>

                                    {{-- tab content --}}
                                    <div class="tab-content">

                                        @foreach ($models as $index => $model)
                                            <div id="{{ $model }}" class="tab-pane {{ $index == 0 ? 'active' : '' }}"
                                                role="tabpanel">

                                                @foreach ($maps as $map)

                                                    <div class="form-check">
                                                        
                                                        <input type="checkbox" class="form-check-input" name="permissions[]"
                                                            value="{{ $map . '_' . $model }}">
                                                            
                                                        <label class="form-check-label">
                                                            @lang('site.'.$map) @lang('site.'.$model.(($map != 'read' ) ? '-single' : ''))
                                                        </label>
                                                        

                                                    </div>

                                                @endforeach

                                            </div>
                                        @endforeach

                                    </div>
                                    {{-- end of tab content --}}
                                    
                                    </div> 
                                --> {{-- End of old permision assignment --}}


                            {{-- end of card-body --}}
                        </div>

                        {{-- end of permission tabs --}}
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">@lang('site.submit')</button>
                        </div>
                </form>
            </div>
            <!--end of create new admin card -->

        </div>
        <!--end of content wrapper -->
    </div>
    <!--end of content -->


    <!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
