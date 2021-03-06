@extends('layouts.admin')

@section('tilte', 'Show products')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">

                                {{-- title: show products data --}}
                                <div class="mb-2">
                                    <h3 class="card-title"><strong>@lang('site.show-products-data')</strong>
                                        <small>{{ $products->total() }}</small></h3>
                                </div>

                                {{-- search field & select Category & add button--}}
                                <div class="d-flex">
                                    <div class="d-flex" style="width:80%">

                                        <form action="{{ route('adminDashboard.products.index') }}" method="get" class="form-inline">
                                            {{-- Search input field--}}
                                            <input type="text" name="search" class="form-control float-right"
                                                placeholder="@lang('site.search')" value="{{ request()->search }}">

                                            {{-- Select By Category --}}
                                            <select name="category_id" id="" class="form-control">
                                                <option value="" > @lang('site.all-categories')</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ request()->category_id == $category->id ? 'selected' : '' }}> {{ $category->translate( app()->getLocale() )->name }}</option>
                                                @endforeach
                                            </select>

                                            {{-- Select By in_sale --}}
                                            <select name="in_sale" id="" class="form-control">
                                                <option value="true" {{ request()->in_sale_id == 'true' ? 'selected' : '' }}>@lang('site.in-sale')</option>
                                                <option value="false" {{ request()->in_sale_id == 'false' ? 'selected' : '' }}> @lang('site.not-in-sale')</option>
                                            </select>

                                            {{-- Search button--}}
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i class="fas fa-search">
                                                        @lang('site.search')</i></button>
                                            </div>

                                        </form>
                                    </div>

                                    {{-- add new product Button--}}
                                    <div class="input-group-append">

                                        @if (auth()->user()->hasPermission('create_products'))
                                            <a href="{{ route('adminDashboard.products.create') }}" class="btn btn-info "><i
                                                    class="fas fa-plus"></i> @lang('site.create')
                                            </a>
                                        @else
                                            <a href="#" class="btn btn-info disabled btn-sm"><i class="fas fa-plus"></i>
                                                @lang('site.create')
                                            </a>
                                        @endif

                                    </div>

                                </div>

                            </div>
                            <!-- end of card-header -->

                            <!-- start card-body -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>@lang('site.index')</th>
                                            <th>@lang('site.category')</th>
                                            <th>@lang('site.name')</th>
                                            <th>@lang('site.description')</th>
                                            <th>@lang('site.image')</th>
                                            <th>@lang('site.perchase-price')</th>
                                            <th>@lang('site.in-sale')</th>
                                            <th>@lang('site.sale')</th>
                                            <th>@lang('site.sale-price')</th>
                                            <th>@lang('site.profit-percentage')</th>
                                            <th>@lang('site.stock')</th>
                                            <th>@lang('site.edit-product')</th>
                                        </tr>
                                    </thead>

                                    @if ($products->count() > 0)
                                        @php
                                        $locale = app()->getLocale();
                                        @endphp

                                        <tbody>
                                            @foreach ($products as $index => $product)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        @foreach ($product->categories as $index=>$category)
                                                            @if ($index>0)
                                                            ,
                                                            @endif
                                                            {{ $category->name }}
                                                        @endforeach
                                                       </td>
                                                    <td>{{ $product->translate($locale)->name ?? $product->name }}</td>
                                                    <td>{!! $product->translate($locale)->description ?? $product->description !!}</td>
                                                    <td>
                                                        <div class="d-flex flex-column">
                                                            <img class="rounded img-thumbnail" style="width: 100px" 
                                                            src="{{ $product->productimages()->first()->image_path ?? '' }}" alt="{{ $product->name }}">
                                                            <a href="{{ route('adminDashboard.products.show',$product->id   ) }}" class="btn btn-info">
                                                                 @lang('site.show-product-images')
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>{{ $product->perchase_price }}</td>
                                                    <td>
                                                        @if ($product->in_sale)
                                                            <a href="{{ route('adminDashboard.products.change_in_sale',[ 'false', $product->id]) }}" 
                                                                class="in-sale btn btn-sm round btn-success">
                                                                @lang('site.in-sale')
                                                            </a >
                                                        @else
                                                            <a href="{{ route('adminDashboard.products.change_in_sale',[ 'true', $product->id]) }}" 
                                                                class="btn btn-sm round btn-outline-success">
                                                                @lang('site.not-in-sale')
                                                            </a >
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $product->sale }}
                                                        @if ($product->in_sale)
                                                            <a href="#"
                                                            class="show-change-sale"
                                                            data-id="{{ $product->id }}"
                                                            data-sale="{{ $product->sale}}"
                                                            {{-- data-url="{{ route('adminDashboard.products.show_change_sale', $product->id) }}" --}}
                                                            {{-- data-method="get" --}}
                                                            >
                                                            <i class="fa fa-pen"></i>
                                                        </a>
                                                        @endif
                                                        
                                                        <div  class="change-sale"
                                                              style="display:none; flex-direction: column; align-items: center;" >
                                                          {{-- managed in js: when click in the link show input field --}}
                                                            <form class="change-sale-form"  method="POST"action="{{ route('adminDashboard.products.change_sale',$product) }}">
                                                                @method('PUT')
                                                                @csrf
                                                                <input type="number" name="sale" value="{{  old('sale') ?? $product->sale }}" min="10" max="90">
                                                                <button type="submit">change sale</button>
                                                            </form>
                                                            
                                                        </div>
                                                        
                                                    </td>
                                                    <td>{{ $product->sale_price }}</td>
                                                    <td>{{ $product->profit_percentage }} %</td>
                                                    <td>{{ $product->stock }}</td>
                                                    <td>

                                                        {{-- edit button --}}
                                                        @if (auth()
                                                            ->user()
                                                            ->hasPermission('update_products'))
                                                            <a href="{{ route('adminDashboard.products.edit', $product->id) }}"
                                                                class="btn btn-info btn-sm"><i class="fas fa-edit"></i>
                                                                @lang('site.edit')</a>
                                                        @else
                                                            <a href="#" class="btn btn-info disabled btn-sm"><i
                                                                    class="fas fa-edit"></i> @lang('site.edit')</a>
                                                        @endif


                                                        {{-- delete button --}}
                                                        @if (auth()
                                                            ->user()
                                                            ->hasPermission('delete_products'))

                                                            <form class="delete" method="POST"
                                                                action="{{ route('adminDashboard.products.destroy', $product->id) }}"
                                                                style="display: inline-block">

                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit" class="btn btn-danger btn-sm">
                                                                    <i class="fas fa-trash"></i> @lang('site.delete')
                                                                </button>
                                                            </form>

                                                        @else

                                                            <button class="btn btn-danger disabled btn-sm"><i
                                                                    class="fas fa-trash"></i> @lang('site.delete')</button>

                                                        @endif


                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    @else
                                        <h2> @lang('site.data-not-found')</h2>
                                    @endif

                                </table>
                                {{ $products->appends(request()->query())->links() }}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->

            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection
