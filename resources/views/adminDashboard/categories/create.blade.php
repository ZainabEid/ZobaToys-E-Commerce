@extends('layouts.admin')

@section('tilte', 'Add New categories')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <!-- general form elements -->
            <div class="card card-primary">

                <div class="card-header with-border ">
                    <h3 class="card-title">@lang('site.add-new-category')</h3>
                </div>
                <!-- end of card-header -->

                @include('adminDashboard.includes.errors')

                <!-- form start -->
                <form method="POST" action="{{ route('adminDashboard.categories.store') }}">
                    @csrf
                    <div class="card-body">                       
                        {{-- wrap select --}}
                      <div class="form-group">
                        <label>@lang('site.category-wrap')</label>
                        <select name="wrap_id" class="form-control">
                            
                            <option value="">@lang('site.choose-category-wrap')</option>

                            @foreach ($wraps as $wrap)
                            <option value="{{ $wrap->id }}" {{ old('wrap_id') == $wrap->id ?  'selected' : '' }}>{{ $wrap->name }}</option>
                            @endforeach
                          
                        </select>
                      </div>

                        {{-- language tabs --}}
                        <div class="form-group">
                            <ul class="nav nav-tabs nav-linetriangle no-hover-bg nav-justified">
                                @foreach (config('translatable.locales') as $index => $locale)
                                    <li class="nav-item">
                                        <a class="nav-link {{ $index == 0 ? 'active' : '' }}" id="active-tab3" data-toggle="tab"
                                            href="#{{ $locale }}" aria-controls="active3"
                                            aria-expanded="true">@lang('site.'.$locale.'.'.$locale)</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        {{-- language input fields for name and description --}}
                        <div class="tab-content px-1 pt-1">
                            @foreach (config('translatable.locales') as $index => $locale)

                                <div role="tabpanel" class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="{{ $locale }}"
                                    aria-labelledby="active-tab3" aria-expanded="{{ $index == 0 ? true : false }}">
                                    {{-- name --}}
                                    <label for="{{ $locale }}[name]">@lang('site.'.$locale.'.name')</label>
                                    <input type="text" class="form-control" name="{{ $locale }}[name]"
                                        placeholder=" @lang('site.enter-name')" value="{{ old($locale . '.name') }}">
                                   
                                </div>
                            @endforeach

                        </div>


                    </div><!-- end of card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">@lang('site.submit')</button>
                    </div>
                </form>
            </div>
            <!--end of create new category card -->

        </div>
        <!--end of content wrapper -->
    </div>
    <!--end of content -->


    <!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
