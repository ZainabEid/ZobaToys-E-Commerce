@extends('layouts.admin')

@section('tilte', 'Add New supply')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <!-- general form elements -->
            <div class="card card-primary">

                <div class="card-header with-border ">
                    <h3 class="card-title"><strong>@lang('site.add-new-supply')</strong></h3>
                </div>
                <!-- end of card-header -->

                @include('adminDashboard.includes.errors')

                <!-- form start -->
                <form method="POST" action="{{ route('adminDashboard.supplies.store') }}" enctype="multipart/form-data">
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
                        </div><!-- end of supplier sellect -->

                         <!-- group select -->
                         <div class="form-group">
                            <label>@lang('site.group')</label>
                            <select name="group_id" class="form-control">
                                
                                <option value="">@lang('site.choose-group')</option>

                                @foreach ($groups as $group)
                                <option value="{{ $group->id }}" {{ old('group_id') == $group->id ?  'selected' : '' }}>{{ $group->name }}</option>
                                @endforeach
                            
                            </select>
                        </div><!-- end of group sellect -->
                       
                       
                        <?php /*
                        @foreach ( config('translatable.locales') as $locale )
                        
                            {{-- name --}}
                            <label class="border-bottom" ><strong>@lang('site.'.$locale.'.supply')</strong></label>
                            <div class="form-group">
                                <label for="name">@lang('site.'.$locale.'.name')</label>
                                <input type="name" class="form-control" name="{{ $locale }}[name]"
                                    placeholder=" @lang('site.'.$locale.'.enter-name')" value="{{ old( $locale.'.name') }}">
                            </div>

                            {{-- description --}}
                            <div class="form-group">
                                <label for="description">@lang('site.'.$locale.'.description')</label>
                                <textarea class="form-control ckeditor" id="editor1" name="{{ $locale }}[description]" 
                                    placeholder=" @lang('site.'.$locale.'.enter-description')" >{{ old( $locale.'.description') }}</textarea>
                            </div>
                            <hr>
                        @endforeach
                        */ ?>

                        {{-- name --}}
                        <div class="form-group">
                            <label for="name">@lang('site.supply-name')</label>
                            <input type="name" class="form-control" name="name"
                                placeholder=" @lang('site.enter-supply-name')" value="{{ old('name') }}">
                        </div>

                        {{-- color --}}
                        <div class="form-group">
                            <label for="color">@lang('site.supply-color')</label>
                            <input type="text" class="form-control" name="color"
                                placeholder=" @lang('site.enter-supply-color')" value="{{ old('color') }}">
                        </div>

                        {{-- purchase_price --}}
                        <div class="form-group">
                            <label for="purchase_price">@lang('site.perchase-price')</label>
                            <input type="number" step="00.01" class="form-control" name="purchase_price"
                                placeholder=" @lang('site.enter-supply-purchase-price')" value="{{ old('purchase_price') }}">
                        </div>

                        {{-- description --}}
                        <div class="form-group">
                            <label for="description">@lang('site.supply-description')</label>
                            <textarea class="form-control ckeditor" id="editor1" name="description" 
                                placeholder=" @lang('site.enter-supply-description')" >{{ old('description') }}</textarea>
                        </div>
                        <hr>

                        {{-- image [input:file class = "photo"] --}}
                        <div class="form-group">
                            <h5>@lang('site.image')</h5>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input photo" name="image" >
                                <label class="custom-file-label" for="image" > @lang('site.choose-image') </label>
                            </div>
                            
                        </div>
                        
                        {{-- image preview [img class = "photo-preview"] --}}
                        <div class="form-group">
                            <img src="{{ asset('public/uploads/supply_images/default.png') }}" alt="image"
                                class="rounded img-thumbnail photo-preview">
                        </div>

                         {{-- Stock --}}
                         <div class="form-group">
                            <label for="stock">@lang('site.stock')</label>
                            <input type="number" class="form-control" name="stock"
                                placeholder=" @lang('site.enter-stock')" value="{{ old('stock') }}">
                        </div>

                           {{-- stock_unit --}}
                           <div class="form-group">
                            <label for="stock_unit">@lang('site.supply-stock_unit')</label>
                            <input type="text" class="form-control" name="stock_unit"
                                placeholder=" @lang('site.enter-stock_unit')" value="{{ old('stock_unit') }}">
                        </div>

                    </div><!-- end of card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">@lang('site.submit')</button>
                    </div>
                </form>
            </div>
            <!--end of create new supply card -->

        </div>
        <!--end of content wrapper -->
    </div>
    <!--end of content -->


    <!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
