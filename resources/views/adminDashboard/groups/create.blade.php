@extends('layouts.admin')

@section('tilte', 'Add New groups')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <!-- general form elements -->
            <div class="card card-primary">

                <div class="card-header with-border ">
                    <h3 class="card-title">@lang('site.add-new-group')</h3>
                </div>
                <!-- end of card-header -->

                @include('adminDashboard.includes.errors')

                <!-- form start -->
                <form method="POST" action="{{ route('adminDashboard.groups.store') }}">
                    @csrf
                    <div class="card-body">

                        {{-- name --}}
                            <div class="form-group">
                                <label for="name">@lang('site.name')</label>
                                <input type="name" class="form-control" name="name"
                                    placeholder=" @lang('site.enter-name')" value="{{ old('name') }}">
                            </div>

                         {{-- description --}}
                         <div class="form-group">
                            <label for="description">@lang('site.description')</label>
                            <input type="description" class="form-control" name="description"
                                placeholder=" @lang('site.enter-description')" value="{{ old('description') }}">
                        </div>    


                    </div><!-- end of card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">@lang('site.submit')</button>
                    </div>
                </form>
            </div>
            <!--end of create new group card -->

        </div>
        <!--end of content wrapper -->
    </div>
    <!--end of content -->


    <!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
