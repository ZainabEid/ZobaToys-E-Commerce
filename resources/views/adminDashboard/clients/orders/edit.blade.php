@extends('layouts.admin')

@section('tilte', 'Add New orders')

@section('content')
    {{-- content --}}
    <div class="app-content content">
        <div class="content-wrapper">

            <h1 class="">@lang('site.add-new-order')</h1>

            {{-- row of two cards --}}
            <div class="row">

                {{-- categories and products --}}
                <div class="col-md-6">
                    <div class="card ">

                        <div class="card-header with-border">
                            <h4 class="mt-4"> @lang('site.categories')
                                <small>( {{ $categories->first()->products_total }}
                                    @lang('site.products'))
                                </small>
                            </h4>
                        </div>

                        {{-- if there is caregories show them --}}
                        @if ($categories->count() > 0)

                            <div id="accordionWrap1">

                                @foreach ($categories as $index => $category)

                                    <div class="card mb-0 accordion collapse-icon accordion-icon-rotate">

                                        {{-- category title --}}
                                        <a class="card-header info collapsed" href="#accordion{{ $category->id }}"
                                            id=" heading{{ $category->id }}" data-toggle="collapse" aria-expanded="false"
                                            aria-controls="accordion{{ $category->id }}">

                                            <div class="card-title lead">
                                                {{ $category->name }}
                                            </div>
                                        </a>

                                        {{-- products table --}}
                                        <div class="collapse" id="accordion{{ $category->id }}" role="tabpanel"
                                            data-parent="#accordionWrap1" aria-labelledby=" heading{{ $category->name }} ">

                                            <div class="card-content">

                                                @if ($category->products->count() > 0)
                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>@lang('site.name')</th>
                                                                    <th>@lang('site.stock')</th>
                                                                    <th>@lang('site.price')</th>
                                                                    <th>@lang('site.add')</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($category->products as $product)
                                                                    <tr>
                                                                        <td>{{ $product->name }}</td>
                                                                        <td>{{ $product->stock }}</td>
                                                                        <td>{{ number_format($product->sale_price,2) }}</td>
                                                                        <td><a href="#"
                                                                                {{ $product->stock == 0 ? 'disabled' : '' }}
                                                                                class="btn btn-sm  {{ in_array($product->id, $order->product()->pluck('product_id')->toArray()) ? 'btn-default disabled' : 'btn-success add-product-btn'  }} "
                                                                                id="product-{{ $product->id }}"
                                                                                data-id="{{ $product->id }}"
                                                                                data-name="{{ $product->name }}"
                                                                                data-price="{{ $product->sale_price }}"
                                                                                data-stock="{{ $product->stock }}">
                                                                                <i class="fa fa-plus"></i></a></td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>

                                                        </table>
                                                    </div>
                                                @else
                                                    <h2> @lang('site.data-not-found')</h2>
                                                @endif

                                            </div>{{-- end of card content
                                            --}}

                                        </div>{{-- end of collaps tab panel
                                        --}}
                                    </div> {{-- end of card --}}

                                @endforeach

                                {{-- end of collaps {{ $category->name }}
                                --}}
                            </div>

                        @else
                            <h2> @lang('site.data-not-found')</h2>
                        @endif

                    </div>{{-- end of card --}}
                </div>{{-- end oc col-md-6 --}}


                {{-- order data --}}
                <div class="col-md-6">
                    <div class="card card-solid">

                         {{-- card header  --}}
                         <div class="card-header with-border">
                             <h3> @lang('site.order')</h3>
                            </div>
                            
                        {{-- card body  --}}
                        <form action="{{ route('adminDashboard.clients.orders.update' , ['client'=> $client->id, 'order' => $order->id]) }}" method="POST">
                            @csrf
                            @method('put')

                            @include('adminDashboard.includes.errors')


                            <div class="card-body table-responsive p-0">

                                <table class="table table-head-fixed text-nowrap">

                                    <thead>
                                        <tr>
                                            <th>@lang('site.product')</th>
                                            <th>@lang('site.quantity')</th>
                                            <th>@lang('site.price')</th>
                                            <th>@lang('site.delete')</th>
                                        </tr>
                                    </thead>


                                    <tbody class="order-list">

                                        
                                        @foreach ($order->product as $product)
                                            
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td><input type="number"  name="products[{{ $product->id }}][quantity]" data-price="{{ number_format($product->sale_price,2) }}" class="form-control product-quentity" value="{{ $product->pivot->quantity }}" min="1" max="{{ $product->stock }}"></td>
                                            <td class="product-price">{{ number_format( $product->sale_price * $product->pivot->quantity, 2 ) }}</td>
                                            <td>
                                                <a href="#" class="btn btn-danger btn-sm remove-product-btn"  data-id="{{ $product->id }}}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        @endforeach

                                    </tbody>

                                    {{-- table footer : total price --}}
                                    <tfoot>
                                        <div class="table-foot ">
                                            <div class="">
                                                <td colspan="3">
                                                    <h3> @lang('site.total')</h3>
                                                </td>
                                                <td colspan="1" class="total-price"></td>
                                            </div>

                                        </div>
                                    </tfoot>

                                    <h2> @lang('site.data-not-found')</h2>

                                </table>{{-- end of table --}}

                                {{-- card footer: add order button --}}
                                <div class="card-footer">
                                    <button type="submit"  class="btn btn-info w-100 " id="add-order-form-button">
                                        <i class="fa fa-plus"></i> @lang('site.edit-order')
                                    </button>
                                </div>{{-- end of card footer --}}

                            </div>{{-- end of card body --}}
                            
                        </form>


                    </div>
                </div>
            </div>

           

        </div>
        <!--end of content wrapper -->
    </div>
    <!--end of content -->


    <!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection