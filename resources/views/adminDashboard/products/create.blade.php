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
                          <div class="row">
                            
                            @foreach ($wraps as  $index => $wrap)
                            <div class="col">
                                <label>{{ $wrap->name }}</label>
                                <select name="category_ids[]" class="form-control">
                                    
                                    <option value="">@lang('site.choose-category')</option>
        
                                    @foreach ($wrap->categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_ids.'.$index) == $category->id ?  'selected' : '' }}>{{ $category->translate(app_locale_language())->name ?? $category->name }}</option>
                                  
                                    @endforeach
                                    
                                </select>
                            </div>
                                @endforeach
                          </div>
                       
                       
                       
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
                                {{-- description --}}
                                <label for="{{ $locale }}[description]">@lang('site.'.$locale.'.description')</label>
                                <textarea class="form-control ckeditor" id="editor1" name="{{ $locale }}[description]" 
                                    placeholder=" @lang('site.'.$locale.'.enter-description')" >{{ old( $locale.'.description') }}</textarea>
                            </div>
                        @endforeach

                    </div>
                       
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

                        {{-- price management --}}
                        <div class="row">
                            {{-- perchase_price --}}
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="perchase_price">@lang('site.perchase-price')</label>
                                    <input type="number" step="00.01" class="form-control" name="perchase_price"
                                        placeholder=" @lang('site.enter-perchase-price')" value="{{ old('perchase_price') }}">
                                </div>
                            </div>

                            {{-- Price --}}
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="price">@lang('site.price')</label>
                                    <input type="number" step="00.01" class="form-control" name="price"
                                        placeholder=" @lang('site.enter-price')" value="{{ old('price') }}">
                                </div>
                            </div>

                            {{-- in_sale --}}
                            <div class="col-2">
                                <div class="form-group mt-1">
                                    <div class="row">
                                        <div class="col">
                                            <label>@lang('site.in-sale')</label> <br>
                                            <input type="checkbox" name="in_sale" value="1" id="switcherySize1" class="switchery" {{ old('in_sale') ?  'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- sale --}}
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="sale">@lang('site.sale')</label>
                                    <input type="number" step="01" class="form-control" name="sale" min="10" max="100"
                                        placeholder=" @lang('site.enter-sale-percentage')" value="{{ old('sale') }}">
                                </div>
                            </div>
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
