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

                       
                        @php
                           // $locales = config('translatable.locales') ;
                           // $locales=['ar','en','tr'];
                        @endphp

                      

                        {{-- name --}}
                        @foreach ( config('translatable.locales') as $locale )
                            <div class="form-group">
                                <label for="name">@lang('site.'.$locale.'.name')</label>
                                <input type="text" class="form-control" name="{{ $locale }}[name]"
                                    placeholder=" @lang('site.enter-name')" value="{{ old( $locale.'.name') }}">
                                <label for="name">@lang('site.'.$locale.'.description')</label>
                                <input type="text" class="form-control" name="{{ $locale }}[description]"
                                    placeholder=" @lang('site.enter-description')" value="{{ old( $locale.'.description') }}">
                            
                            </div>
                        @endforeach


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
