@extends('layouts.admin')

@section('tilte', 'Edit supplies')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <!-- general form elements -->
            <div class="card card-primary">

                <div class="card-header with-border ">
                    <h3 class="card-title">@lang('site.edit-supply')</h3>
                </div>
                <!-- end of card-header -->

                @include('adminDashboard.includes.errors')

                <!-- form start -->
                <form method="POST" action="{{ route('adminDashboard.supplies.update', $supply->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')


                    <div class="card-body">

                        <!-- supplier select -->
                        <div class="form-group">
                            <label>@lang('site.supplier')</label>
                            <select name="supplier_id" class="form-control">

                                <option value="">@lang('site.choose-supplier')</option>

                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}"
                                        {{ old('supplier_id') == $supplier->id || $supply->supplier_id == $supplier->id ? 'selected' : '' }}>
                                        {{ $supplier->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <!-- group select -->
                        <div class="form-group">
                            <label>@lang('site.group')</label>
                            <select name="group_id" class="form-control">

                                <option value="">@lang('site.choose-group')</option>

                                @foreach ($groups as $group)
                                    <option value="{{ $group->id }}"
                                        {{ old('group_id') == $group->id || $supply->group_id == $group->id ? 'selected' : '' }}>
                                        {{ $group->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>


                         {{-- name --}}
                         <div class="form-group">
                             <label for="name">@lang('site.name')</label>
                             <input type="name" class="form-control" name="name"
                                 placeholder=" @lang('site.enter-name')"
                                 value="{{ old('name') ?? $supply->name }}">
                         </div>

                          {{-- color --}}
                          <div class="form-group">
                              <label for="color">@lang('site.color')</label>
                              <input type="text" class="form-control" name="color"
                                  placeholder=" @lang('site.enter-color')"
                                  value="{{ old('color') ?? $supply->color }}">
                          </div>

                          {{-- purchase_price --}}
                        <div class="form-group">
                            <label for="purchase_price">@lang('site.purchase-price')</label>
                            <input type="number" step="00.01" class="form-control" name="purchase_price"
                                placeholder=" @lang('site.enter-purchase-price')"
                                value="{{ old('purchase_price') ?? $supply->purchase_price }}">
                        </div>

                         {{-- description --}}
                         <div class="form-group">
                             <label for="description">@lang('site.description')</label>
                             <textarea class="form-control ckeditor" id="editor1" name="description"
                                 placeholder=" @lang('site.enter-description')">{{ old('description') ?? $supply->description }}</textarea>
                         </div>
                         <hr>

                       
                        {{-- image [input:file class = "photo"]
                        --}}
                        <div class="form-group">
                            <h5>@lang('site.image')</h5>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input photo" name="image">
                                <label class="custom-file-label" for="image"> @lang('site.choose-image') </label>
                            </div>

                        </div>

                        {{-- image preview [img class = "photo-preview"]
                        --}}
                        <div class="form-group d-flex ">
                            <img class="rounded float-left img-thumbnail photo-preview" style="width: 100px"
                                src="{{ $supply->image_path }}">
                        </div>

                        {{-- Stock --}}
                        <div class="form-group">
                            <label for="stock">@lang('site.stock')</label>
                            <input type="number" class="form-control" name="stock" placeholder=" @lang('site.enter-stock')"
                                value="{{ old('stock') ?? $supply->stock }}">
                        </div>

                         {{-- stock_unit --}}
                         <div class="form-group">
                            <label for="stock_unit">@lang('site.supply-stock_unit')</label>
                            <input type="text" class="form-control" name="stock_unit"
                                placeholder=" @lang('site.enter-stock_unit')" value="{{ old('stock_unit') ?? $supply->stock_unit }}">
                        </div>

                    </div><!-- end of card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">@lang('site.edit')</button>
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
