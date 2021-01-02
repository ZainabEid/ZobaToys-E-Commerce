@extends('layouts.admin')

@section('tilte', 'Add New products')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <!-- general form elements -->
            <div class="card card-primary">

                <div class="card-header with-border ">
                    <h3 class="card-title"><strong>@lang('site.add-new-product')</strong></h3>
                </div>
                <!-- end of card-header -->

                @include('adminDashboard.includes.errors')

                <!-- form start -->
                <form method="POST" action="{{ route('adminDashboard.products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <!-- category select -->
                      <div class="form-group">
                        <label>@lang('site.category')</label>
                        <select name="category_id" class="form-control">
                            
                            <option value="">@lang('site.choose-category')</option>

                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ?  'selected' : '' }}>{{ $category->translate(app()->getLocale())->name }}</option>
                            @endforeach
                          
                        </select>
                      </div>
                       
                       
                        
                        @foreach ( config('translatable.locales') as $locale )
                        
                            {{-- name --}}
                            <label class="border-bottom" ><strong>@lang('site.'.$locale.'.product')</strong></label>
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

                        
                        @foreach ( config('translatable.locales') as $locale )
                            
                        @endforeach

                        {{-- image [input:file class = "photo"] --}}
                        <div class="form-group">
                            <h5>@lang('site.image')</h5>
                            <div class="custom-file">
                                <input type="file" multiple="multiple" class="custom-file-input photo" name="images[]" >
                                <label class="custom-file-label" for="image" > @lang('site.choose-image') </label>
                            </div>
                            
                        </div>
                        
                        {{-- image preview [img class = "photo-preview"] --}}
                        <div class="form-group">
                            <img src="{{ asset('public/uploads/product_images/default.png') }}" alt="image"
                                class="rounded img-thumbnail photo-preview">
                        </div>

                        {{-- perchase_price --}}
                        <div class="form-group">
                            <label for="perchase_price">@lang('site.perchase-price')</label>
                            <input type="number" step="00.01" class="form-control" name="perchase_price"
                                placeholder=" @lang('site.enter-perchase-price')" value="{{ old('perchase_price') }}">
                        </div>
                        
                        {{-- sale_price --}}
                        <div class="form-group">
                            <label for="sale_price">@lang('site.sale-price')</label>
                            <input type="number" step="00.01" class="form-control" name="sale_price"
                                placeholder=" @lang('site.enter-sale-price')" value="{{ old('sale_price') }}">
                        </div>

                         {{-- Stock --}}
                         <div class="form-group">
                            <label for="stock">@lang('site.stock')</label>
                            <input type="number" class="form-control" name="stock"
                                placeholder=" @lang('site.enter-stock')" value="{{ old('stock') }}">
                        </div>

                    </div><!-- end of card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">@lang('site.submit')</button>
                    </div>
                </form>
            </div>
            <!--end of create new product card -->

        </div>
        <!--end of content wrapper -->
    </div>
    <!--end of content -->


    <!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
