@extends('layouts.admin')

@section('tilte', 'Edit Clients')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <!-- general form elements -->
            <div class="card card-primary">

                <div class="card-header with-border ">
                    <h3 class="card-title">@lang('site.edit-client')</h3>
                </div>
                <!-- end of card-header -->

                @include('adminDashboard.includes.errors')

                <!-- form start -->
                <form method="POST" action="{{ route('adminDashboard.clients.update', $client->id) }}">
                    @csrf
                    @method('put')
                    <div class="card-body">

                          {{-- surname --}}
                          <div class="form-group">

                            {{-- surname label --}}
                            <label class="form-control-label mb-xs-5">
                                @lang('site.surname') :
                            </label>

                            <div class=" form-control-valign">

                                {{-- MR. --}}
                                <label class="radio-inline">
                                    <span class="custom-radio">
                                        <input name="surname" type="radio" value="0" {{ $client->surname == 0 ? 'checked' : ''}}>
                                        <span></span>
                                    </span>
                                    @lang('site.MR').
                                </label>

                                {{-- MS. --}}
                                <label class="radio-inline">
                                    <span class="custom-radio">
                                        <input name="surname" type="radio" value="1"  {{ $client->surname == 1 ? 'checked' : '' }}>
                                        <span></span>
                                    </span>
                                    @lang('site.MS').
                                </label>
                            </div>
                        </div>

                        {{-- first_name --}}
                        <div class="form-group">
                            <label for="first_name">@lang('site.first_name')</label>
                            <input type="text" class="form-control" name="first_name" placeholder=" @lang('site.enter-first_name')"
                                value="{{ $client->first_name ?? old('first_name') }}">
                        </div>

                        {{-- last_name --}}
                        <div class="form-group">
                            <label for="last_name">@lang('site.last_name')</label>
                            <input type="text" class="form-control" name="last_name" placeholder=" @lang('site.enter-last_name')"
                                value="{{ $client->last_name ?? old('last_name') }}">
                        </div>
                         

                        {{-- phone --}}     
                        <div class="form-group">
                            <label for="phone">@lang('site.phone')</label>
                            <input type="text" class="form-control" name="phone"
                                placeholder=" @lang('site.enter-phone')" value="{{ $client->phone ?? old('phone') }}">
                        </div>

                        {{-- address --}}
                        <div class="form-group">
                            <label for="address">@lang('site.address')</label>
                            <input type="address" class="form-control" name="address"
                                placeholder=" @lang('site.enter-address')" value="{{ $client->address ?? old('address') }}">
                        </div>

                    </div><!-- end of card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-edit">@lang('site.edit')</button>
                    </div>
                </form>
            </div>
            <!--end of create new client card -->

        </div>
        <!--end of content wrapper -->
    </div>
    <!--end of content -->


    <!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
