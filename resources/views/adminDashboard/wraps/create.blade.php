@extends('layouts.admin')

@section('tilte', 'Add New wraps')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <!-- general form elements -->
            <div class="card card-primary">

                <div class="card-header with-border ">
                    <h3 class="card-title">@lang('site.add-new-wrap')</h3>
                </div>
                <!-- end of card-header -->

                @include('adminDashboard.includes.errors')

                <!-- form start -->
                <form method="POST" action="{{ route('adminDashboard.wraps.store') }}">
                    @csrf
                    <div class="card-body">

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
                                    {{-- description --}}
                                    <label for="{{ $locale }}[description]">@lang('site.'.$locale.'.description')</label>
                                    <input type="text" class="form-control" name="{{ $locale }}[description]"
                                        placeholder=" @lang('site.enter-description')"
                                        value="{{ old($locale . '.description') }}">
                                </div>
                            @endforeach

                        </div>


                    </div><!-- end of card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">@lang('site.submit')</button>
                    </div>
                </form>
            </div>
            <!--end of create new wrap card -->

        </div>
        <!--end of content wrapper -->
    </div>
    <!--end of content -->


    <!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
