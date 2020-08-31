@extends('layouts.admin')

@section('tilte', 'Edit Ctegories')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <!-- general form elements -->
            <div class="card card-primary">

                <div class="card-header with-border ">
                    <h3 class="card-title">@lang('site.edit-category')</h3>
                </div>
                <!-- end of card-header -->

                @include('adminDashboard.includes.errors')

                <!-- form start -->
                <form method="POST" action="{{ route('adminDashboard.categories.update', $category->id) }}" >
                    @csrf
                    @method('put')
                    <div class="card-body">

                        {{-- name --}}
                        @foreach ( config('translatable.locales') as $locale )
                            <div class="form-group">
                                <label for="name">@lang('site.'.$locale.'.name')</label>
                                <input type="name" class="form-control" name="{{ $locale }}[name]"
                                    placeholder=" @lang('site.enter-name')" value="{{ $category->translate($locale)->name }}">
                            </div>
                        @endforeach

                    </div><!-- end of card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-edit">@lang('site.edit')</button>
                    </div>
                </form>
            </div>
            <!--end of create new category card -->

        </div><!--end of content wrapper -->
    </div><!--end of content -->

    
    <!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
