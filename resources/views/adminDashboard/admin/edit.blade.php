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
                <form method="POST" action="{{ route('admin.update', $admin->id) }}">
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
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="photo" id="photo">
                                    <label class="custom-file-label" for="photo">@lang('site.upload-photo')</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="" name="">@lang('site.upload')</span>
                                </div>
                            </div>
                        </div>

                        {{-- permission tabs --}}
                        <div class="form-group card-tabs">

                            <label>@lang('site.permissions')</label>

                            @php
                            $models = ['admins','customers','products','suppliers', 'production_cycles', ];  
                            $maps = ['read','create','update','delete', ];  
                            @endphp

                            {{-- nav tabs --}}
                            <ul class="nav nav-tabs" role="tablist">

                                @foreach ($models as $index=>$model)
                                <li class="nav-item">
                                    <a class="nav-link {{ ($index == 0 )? 'active' : '' }}" data-toggle="tab"
                                        href="#{{ $model }}" role="tab" 
                                        aria-selected="true">@lang('site.'.$model)</a>
                                </li>
                                @endforeach
                               
                            </ul>

                            {{-- tab content : checkboxes --}}
                            <div class="tab-content" >

                                @foreach ($models as $index=>$model)
                                <div class="tab-pane {{ ($index == 0) ? 'active': '' }}" id="{{ $model }}" role="tabpanel">

                                    @foreach ($maps as $map)
                                    
                                    <div class="form-check">
                                        <label class="form-check-label" for="{{ $map }}">
                                            <input type="checkbox" class="form-check-input" name="permissions[]"  {{ $admin->hasPermission($map.'_'.$model) ? 'checked' : ''  }} value="{{ $map.'_'.$model }}" id="{{ $map }}">
                                            @lang('site.'.$map) @lang('site.'.$model.(($map != 'read' ) ? '-single' : ''))
                                        </label>
                                    </div>
                                    
                                    @endforeach
                                    
                                </div>
                                @endforeach
                                    
                            </div><!--end of tab content-->
                            
                        </div><!--end of permission tabs-->
                        

                       
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
