@extends('layouts.admin')

@section('tilte', 'Choose the Supplier')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <!-- general form elements -->
            <div class="card card-primary">

                <div class="card-header with-border ">
                    <h3 class="card-title"><strong>@lang('site.choose-supplier')</strong></h3>
                </div>
                <!-- end of card-header -->

                @include('adminDashboard.includes.errors')

                <!-- form start -->
                <form method="POST" action="{{ route('adminDashboard.purchases.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <!-- supplier select -->
                      <div class="form-group">
                        <label>@lang('site.supplier')</label>
                        <select name="supplier_id" class="form-control">
                            
                            <option value="">@lang('site.choose-supplier')</option>

                            @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ?  'selected' : '' }}>{{ $supplier->name }}</option>
                            @endforeach
                          
                        </select>
                      </div>
                       
                       
                        
                      
                    </div><!-- end of card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">@lang('site.add-purchase')</button>
                    </div>
                </form>
            </div>
            <!--end of create new purchase card -->

        </div>
        <!--end of content wrapper -->
    </div>
    <!--end of content -->


    <!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
